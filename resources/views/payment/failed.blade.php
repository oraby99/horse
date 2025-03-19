<!DOCTYPE html>
<html>
<head><title>Payment Failed</title></head>
<body>
    <h1>Payment Failed</h1>
    <p>{{ session('error', 'Something went wrong.') }}</p>
    <a href="{{ route('cart') }}">Back to Cart</a>
</body>
</html>