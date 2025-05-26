@extends('layout.app')
@section('content')
<style>
    .cart-section {
        padding: 2rem 1rem;
    }

    .cart-table thead th {
        background-color: #343a40;
        color: white;
        text-align: center;
    }

    .cart-table td, .cart-table th {
        vertical-align: middle;
        text-align: center;
    }

    .quantity-control {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
    }

    .quantity-control button {
        padding: 0.25rem 0.75rem;
        border: none;
        background-color: #c1a872;
        color: white;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.2s ease-in-out;
    }

    .quantity-control button:hover {
        background-color: #a88f5a;
    }

    .checkout-section {
        margin-top: 2rem;
        padding: 1.5rem;
        background-color: #f8f9fa;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .checkout-section h4 {
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    @media (max-width: 768px) {
        .checkout-section {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
    }
</style>

<div class="container cart-section">
    <h2 class="mb-4">@lang('lang.shopping_cart')</h2>

    @if(count($cartItems) > 0)
    <div class="table-responsive">
        <table class="table cart-table table-bordered">
            <thead>
                <tr>
                    <th>@lang('lang.products')</th>
                    <th>@lang('lang.quantity')</th>
                    <th>@lang('lang.price')</th>
                    <th>@lang('lang.action')</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cartItems as $index => $cartItem)
                    @php 
                        
                      $itemTotal = $cartItem->qantity * $cartItem->total;
                    @endphp
                    <tr id="itemRow{{ $index }}">
                        <td>{{ $cartItem->product->name }}</td>
                        <td>
                            <div class="quantity-control">
                                <button type="button" onclick="updateQuantity({{ $index }}, -1)">-</button>
                                <span id="qty{{ $index }}">{{ $cartItem->qantity }}</span>
                                <button type="button" onclick="updateQuantity({{ $index }}, 1)">+</button>
                            </div>
                        </td>
                        <td>KWD<span id="itemTotal{{ $index }}">{{ number_format($itemTotal, 2) }}</span></td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="deleteCartItem({{ $cartItem->id }}, {{ $index }})">
                                @lang('lang.delete')
                            </button>
                        </td>
                    </tr>
                    <input type="hidden" id="price{{ $index }}" value="{{ $cartItem->total }}">
                    @php $total += $itemTotal; @endphp
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="checkout-section">
        <div>
            <h4>@lang('lang.total'): $<span id="cartTotal">{{ number_format($total, 2) }}</span></h4>
        </div>
        <form action="{{ route('pay') }}" method="POST">
            @csrf
            <input type="hidden" name="price" id="hiddenTotal" value="{{ $total }}">
            <input type="hidden" name="currency" value="KWD">
            <button type="submit" class="btn btn-success">@lang('lang.checkout')</button>
        </form>
    </div>
    @else
        <div class="alert alert-info">@lang('lang.no_items_in_cart')</div>
    @endif
</div>

<script>
    function updateQuantity(index, change) {
        const qtyEl = document.getElementById('qty' + index);
        const price = parseFloat(document.getElementById('price' + index).value);
        let quantity = parseInt(qtyEl.innerText);

        quantity += change;
        if (quantity < 1) return;

        qtyEl.innerText = quantity;
        const newTotal = (quantity * price).toFixed(2);
        document.getElementById('itemTotal' + index).innerText = newTotal;

        recalculateCartTotal();
    }

    function recalculateCartTotal() {
        let total = 0;
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach((row, idx) => {
            const itemTotal = parseFloat(document.getElementById('itemTotal' + idx)?.innerText || 0);
            total += itemTotal;
        });

        document.getElementById('cartTotal').innerText = total.toFixed(2);
        document.getElementById('hiddenTotal').value = total.toFixed(2);
    }

function deleteCartItem(itemId, index) {
        if (!confirm('@lang("lang.confirm_delete")')) return;

        fetch(`{{ url('/cart/delete/') }}/${itemId}`, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Failed to delete item.');
            return response.json();
        })
        .then(data => {
            document.getElementById('itemRow' + index).remove();
            recalculateCartTotal();
        })
        .catch(error => {
            alert('Something went wrong!');
            console.error(error);
        });
    }
</script>
@endsection
