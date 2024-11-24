<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/payment', function () {
    return view('payment.form');
});

Route::post('/process-payment', function (Request $request) {
    // validasi request
    $request->validate([
        'amount' => 'required|numeric',
        'method' => 'required|string',
    ]);

    // save payment ke database
    Payment::create([
        'amount' => $request->input('amount'),
        'method' => $request->input('method'),
    ]);

    return redirect('/')->with('success', 'Payment has been processed successfully!');
});

Route::get('/', function () {
    return view('pricing');
});

Route::get('/payment-details', [PaymentController::class, 'showPaymentForm']);
Route::post('/process-payment', [PaymentController::class, 'processPayment']);

Route::get('/payment', [PaymentController::class, 'create']);
Route::post('/payment', [PaymentController::class, 'store']);
Route::get('/receipt/{id}', [PaymentController::class, 'receipt']);

Route::get('/payment-receipt/{id}', [PaymentController::class, 'showReceipt'])->name('payment.receipt');