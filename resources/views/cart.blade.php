<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <table class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th>product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php
        $totalPrice = 0;
      @endphp
      @foreach ($cartItems as $index => $cartItem)
      <tr id="item{{$index}}">
        <td>{{ $cartItem->product->name }}</td>
        <td id="qantity{{$index}}">{{ $cartItem->qantity }}</td>
        <td id="price{{$index}}">${{ $cartItem->price }}</td>
        <td>
          <form action="{{ route('removeItem', ['id' => $cartItem->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this item from the cart?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      </td>
            </tr>
      @php
        $totalPrice += $cartItem->qantity * $cartItem->total;
      @endphp
      @endforeach
    </tbody>
  </table>

  @if($totalPrice > 0)
  <div class="checkout-section">
    <h3>Total: $<span id="totalPrice">{{ $totalPrice }}</span></h3>
  </div>
@else
  <p>No items in cart.</p>
@endif
<form action="{{ route('paymenttap') }}" method="post">
@csrf
<div class="controls w-50">
<button class="btn main-btn" type="submit">{{__('Pay Now by Tap')}}
</button>
</div>
</form>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
