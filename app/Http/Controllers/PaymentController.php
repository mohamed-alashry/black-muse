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
     * Start payment and create booking + payment
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
            'action' => 'booking_down_payment',
        ]);

        // Step 3: Create HyperPay checkout
        $response = $this->hyperpay->createCheckout($payment);

        if (!isset($response['id'])) {
            return back()->with('error', 'Failed to initialize payment');
        }

        return view('site.payment.checkout', [
            'checkoutId' => $response['id'],
            'paymentId' => $payment->id,
            'redirectUrl' => route('payments.confirm'),
        ]);
    }

    /**
     * Start payment and create order + payment
     */
    public function checkoutOrder(Request $request)
    {
        // Step 1: Create Order with pending status
        $payable = $this->reservationService->storeOrder();

        // Step 2: Create Payment record
        $payment = $payable->payments()->create([
            'amount' => $payable->total_price,
            'currency' => 'SAR',
            'status' => 'pending',
            'action' => 'order_full_payment',
        ]);

        // Step 3: Create HyperPay checkout
        $response = $this->hyperpay->createCheckout($payment);

        if (!isset($response['id'])) {
            return back()->with('error', 'Failed to initialize payment');
        }

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

        $payment = Payment::where('payment_reference', $request->id)->first();

        if (!$payment) {
            return back()->with('error', 'Payment not found');
        }

        // Step 1: Verify payment
        $result = $this->hyperpay->verifyPayment($payment->payment_reference);

        // Step 2: Update payment status
        $payment = $this->hyperpay->updatePaymentStatus($payment, $result);

        $payable = $payment->payable;
        $payableType = strtolower(class_basename(get_class($payable))); // 'booking' or 'order'

        // Step 3: Update order/booking status
        if ($payment->status === 'paid') {
            if ($payableType === 'booking') {
                $this->reservationService->finalizeBookingAfterPayment($payable, $payment->action);
            } else {
                $payable->update([
                    'payment_status' => 'paid',
                    'status' => 'new'
                ]);
            }

            return redirect()->route("service.$payableType.show", $payable->id)->with('success', 'Payment successful.');
        } else {
            if ($payableType === 'booking' && $payment->action === 'booking_remaining_payment') {
                $payable->update([
                    'payment_status' => 'failed',
                ]);
            } else {
                // For down payment failure, we might want to cancel the booking
                $payable->update([
                    'payment_status' => 'failed',
                    'status' => 'canceled'
                ]);
            }

            return redirect()->route('site.profile', ['tab' => $payableType])->with('error', 'Payment failed. Please try again.');
        }
    }

    public function completeBooking($id)
    {
        // Step 1: Retrieve Booking
        $booking = Booking::findOrFail($id);

        if ($booking->payment_stage !== 'down_payment') {
            return back()->with('error', 'Booking is not eligible for completion.');
        }

        // Step 2: Create Payment record
        $payment = $booking->payments()->create([
            'amount' => $booking->remaining_amount,
            'currency' => 'SAR',
            'status' => 'pending',
            'action' => 'booking_remaining_payment',
        ]);

        // Step 3: Create HyperPay checkout
        $response = $this->hyperpay->createCheckout($payment);

        if (!isset($response['id'])) {
            return back()->with('error', 'Failed to initialize payment');
        }

        return view('site.payment.checkout', [
            'checkoutId' => $response['id'],
            'paymentId' => $payment->id,
            'redirectUrl' => route('payments.confirm'),
        ]);
    }
}
