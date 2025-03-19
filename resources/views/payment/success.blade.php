<!DOCTYPE html>
<html>
<head><title>Payment Success</title></head>
<body>
    <h1>Payment Successful!</h1>
    <p>Order ID: {{ $data['orderReferenceNumber'] ?? 'N/A' }}</p>
    <a href="{{ route('cart') }}">Back to Cart</a>
</body>
</html>