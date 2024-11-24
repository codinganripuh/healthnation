<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Result</title>
</head>
<body>

<h2>Payment Result: {{ $status }}</h2>

@if($status == 'Successful')
    <p>Thank you! Your payment was successful.</p>
@else
    <p>Sorry, your payment failed. Please try again.</p>
@endif

</body>
</html>