<?php
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function showPaymentForm(Request $request)
    {
        $plan = $request->query('plan', 'monthly');
        $prices = [
            'monthly' => 100000,
            'middle_class' => 550000,
            'annual' => 1000000,
        ];

        $amount = $prices[$plan] ?? $prices['monthly'];

        return view('payment.form', compact('plan', 'amount'));
    }

    public function processPayment(Request $request)
    {
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $location = $request->input('location');
        $method = $request->input('method');
        $plan = $request->input('plan');
        $amount = $request->input('amount');

        $paymentStatus = $this->simulatePaymentProcess($amount);

        $payment = new Payment();
        $payment->first_name = $firstName;
        $payment->last_name = $lastName;
        $payment->location = $location;
        $payment->method = $method;
        $payment->plan = $plan;
        $payment->amount = $amount;
        $payment->status = $paymentStatus;
        $payment->save();

        return redirect()->route('payment.receipt', ['id' => $payment->id]);
    }

    public function paymentResult($status)
    {
        return view('payment.result', ['status' => $status]);
    }

    private function simulatePaymentProcess($amount)
    {
        if ($amount > 0) {
            return 'Successful';
        } else {
            return 'Failed';
        }
    }

    public function create()
    {
        return view('payment.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'email' => 'required|email',
            'method' => 'required|in:visa,mastercard,apple_pay',
            'plan' => 'required|in:monthly,middle_class,annually',
        ]);

        $amounts = [
            'monthly' => 100000,
            'middle_class' => 550000,
            'annually' => 1000000,
        ];
        $validated['amount'] = $amounts[$validated['plan']];

        $payment = Payment::create($validated);

        return redirect()->route('receipt', ['id' => $payment->id]);
    }

    public function receipt($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payment.receipt', compact('payment'));
    }

    public function showReceipt($id)
    {
        $payment = Payment::findOrFail($id);

        return view('payment.receipt', compact('payment'));
    }
}