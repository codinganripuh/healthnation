<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
</head>
<body>
    <h1>Payment Success!</h1>
    <p>First Name: {{ $payment->first_name }}</p>
    <p>Last Name: {{ $payment->last_name }}</p>
    <p>Location: {{ $payment->location }}</p>
    <p>Plan: {{ $payment->plan }}</p>
    <p>Amount: Rp{{ number_format($payment->amount, 0, ',', '.') }}</p>
    <p>Method: {{ $payment->method }}</p>
    <p>Status: {{ $payment->status }}</p>
</body>
</html>