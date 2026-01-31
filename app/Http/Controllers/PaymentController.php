<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Booking;
use App\Models\Payment;
use App\Services\HyperpayService;
use App\Services\ReservationService;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{

    public function __construct(
        private readonly HyperpayService $hyperpay,
        private readonly ReservationService $reservationService
    ) {}

    /**
     * Start payment and create order/booking + payment
     */
    public function checkoutBooking(Request $request)
    {
        // Step 1: Create Booking with pending status
        $payable = $this->reservationService->storeBooking();

        // Step 2: Create Payment record
        $payment = $payable->payments()->create([
            'amount' => $payable->paid_amount,
            'currency' => 'SAR',
            'status' => 'pending',
        ]);

        // Step 3: Build redirect URL for HyperPay
        // $redirectUrl = route('payments.confirm', [
        //     'id' => $payment->id,
        // ]) . '?checkoutId=';

        // Step 4: Create HyperPay checkout
        $response = $this->hyperpay->createCheckout($payment);

        if (!isset($response['id'])) {
            return back()->with('error', 'Failed to initialize payment');
        }

        Log::info(
            'Checkout created',
            [
                'payment_id' => $payment->id,
                'checkout_id' => $response['id'],
                'redirectUrl' => route('payments.confirm', [
                    'id' => $payment->id,
                    'checkoutId' => $response['id']
                ])
            ]
        );

        return view('site.payment.checkout', [
            'checkoutId' => $response['id'],
            'paymentId' => $payment->id,
            'redirectUrl' => route('payments.confirm'),
        ]);
    }

    /**
     * Confirm payment and update statuses
     */
    public function confirm(Request $request)
    {
        Log::info('Payment confirmation request', $request->all());
        $request->validate([
            'id' => 'required|string',
            'checkoutId' => 'required|string',
        ]);

        $payment = Payment::findOrFail($request->id);

        // Step 1: Verify payment
        $result = $this->hyperpay->verifyPayment($request->checkoutId);

        // Step 2: Update payment status
        $payment = $this->hyperpay->updatePaymentStatus($payment, $result);

        // Step 3: Update order/booking status
        if ($payment->status === 'paid') {
            $payment->payable->update(['status' => 'new']);
        }

        // Step 4: Show frontend page
        return view(
            $payment->status === 'paid'
                ? 'payments.success'
                : 'payments.failed',
            compact('payment')
        );
    }
}
