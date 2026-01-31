<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;

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
        $url = $this->baseUrl . '/checkouts';
        $data = "entityId=" . $this->entityId .
            "&amount=" . $payment->amount .
            "&currency=" . $payment->currency .
            "&paymentType=DB" .
            "&integrity=true";

        Log::info('Creating HyperPay checkout', ['url' => $url, 'data' => $data]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer ' . $this->accessToken
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $data = json_decode($responseData, true);

        $payment->payment_reference = $data['id'] ?? null;
        $payment->raw_response = $data;
        $payment->save();

        return $data ?? [];
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

        if (! $response->successful()) {
            return ['error' => 'verification_failed', 'status' => $response->status(), 'body' => $response->body()];
        }

        return $response->json() ?: [];
    }

    /**
     * Update Payment model after verification
     */
    public function updatePaymentStatus(Payment $payment, array $result)
    {
        $payment->transaction_id = $result['id'] ?? null;
        $payment->brand = $result['paymentBrand'] ?? null;

        $code = $result['result']['code'] ?? null;

        $isPaid = false;
        if (! empty($code) && is_string($code)) {
            if (preg_match('/^(000\.000|000\.100|000\.200)/', $code)) {
                $isPaid = true;
            }
        }

        $payment->status = $isPaid ? 'paid' : 'failed';

        $payment->raw_response = $result;
        $payment->save();

        return $payment;
    }
}
