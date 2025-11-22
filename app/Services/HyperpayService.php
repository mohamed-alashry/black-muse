<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Payment;

class HyperpayService
{
    protected string $baseUrl;
    protected string $entityId;
    protected string $accessToken;
    protected string $currency = 'SAR';
    protected bool $isLive;

    public function __construct()
    {
        $mode = env('HYPERPAY_MODE', 'test'); // test or live

        $this->baseUrl = $mode === 'live'
            ? env('HYPERPAY_BASE_URL_LIVE')
            : env('HYPERPAY_BASE_URL_TEST');

        $this->entityId = env('HYPERPAY_ENTITY_ID');
        $this->accessToken = env('HYPERPAY_ACCESS_TOKEN');
    }

    /**
     * Generate Checkout ID for payment widget
     */
    public function createCheckout(Payment $payment)
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Bearer ' . $this->accessToken
        ])->post($this->baseUrl . '/checkouts', [
            'entityId' => $this->entityId,
            'amount' => $payment->amount,
            'currency' => $payment->currency,
            'paymentType' => 'DB',
            'integrity' => 'true',
        ]);

        $data = $response->json();
        $payment->payment_reference = $data['id'] ?? null;
        $payment->raw_response = $data;
        $payment->save();

        return $data;
    }

    /**
     * Verify payment after return from HyperPay
     */
    public function verifyPayment(string $checkoutId)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->accessToken
        ])->get($this->baseUrl . "/checkouts/{$checkoutId}/payment", [
            'entityId' => $this->entityId,
        ]);

        return $response->json();
    }

    /**
     * Update Payment model after verification
     */
    public function updatePaymentStatus(Payment $payment, array $result)
    {
        $payment->transaction_id = $result['id'] ?? null;
        $payment->brand = $result['paymentBrand'] ?? null;

        if (str_starts_with($result['result']['code'], '000.000')) {
            $payment->status = 'paid';
        } else {
            $payment->status = 'failed';
        }

        $payment->raw_response = $result;
        $payment->save();

        return $payment;
    }
}
