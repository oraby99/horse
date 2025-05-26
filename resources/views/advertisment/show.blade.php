@extends('layout.app')

@section('body_class', 'product-detail-enhanced')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.3/viewer.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .product-container {
        padding: 3rem 1rem;
    }

    .product-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        background: #fff;
    }

    .product-image {
        max-height: 450px;
        width: 100%;
        object-fit: cover;
        border-radius: 15px;
    }

    .product-title {
        font-size: 2rem;
        font-weight: 700;
    }

    .product-price {
        font-size: 1.5rem;
        color: #28a745;
        font-weight: 600;
    }

    .product-description {
        font-size: 1rem;
        color: #555;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .CartBtn {
        background-color: #555;
        color: #fff;
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 600;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        transition: background-color 0.3s ease;
    }

    .CartBtn:hover {
        background-color: #e85c50;
    }

    .form-select,
    .form-control {
        border-radius: 10px;
    }
</style>
@endsection

@section('content')
<div class="container product-container">
    <div class="card product-card">
        <div class="row g-0">
            <!-- Product Image -->
            <div class="col-lg-6 p-4">
                <img src="{{ asset('uploads/products/' . $product->images[0]) }}" class="product-image image-viewer" alt="{{ $product->name }}">
            </div>

            <!-- Product Info -->
            <div class="col-lg-6 p-5">
                <h1 class="product-title">{{ $product->name }}</h1>
                <p class="product-price mt-3">{{ $product->price }} د.ك</p>
                <p class="product-description mt-3 mb-4">{{ $product->description }}</p>

                <form action="{{ route('addToCart', $product) }}" method="POST">
                    @csrf
                    @method('POST')

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">

                    <!-- Size -->
                    <div class="mb-3">
                        <label for="size" class="form-label">Select Size</label>
                        <select name="size" id="size" class="form-select" required>
                            <option value="">Choose size</option>
                            @foreach (explode(',', $product->size) as $size)
                                <option value="{{ $size }}">{{ $size }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Color -->
                    <div class="mb-3">
                        <label for="color" class="form-label">Select Color</label>
                        <select id="color" name="color" class="form-select js-color-select">
                            @foreach ($product->colors as $color)
                                <option value="{{ $color }}" data-color="{{ $color }}">{{ $color }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-4">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="qantity" id="quantity" class="form-control" value="1" min="1" required>
                    </div>

                    <!-- Add to Cart -->
                    <button type="submit" class="CartBtn w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .485.379L2.89 5H14.5a.5.5 0 0 1 .49.598l-1.5 7A.5.5 0 0 1 13 13H4a.5.5 0 0 1-.49-.402L1.61 3H.5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                       @lang('lang.addtocart')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.1/viewer.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function formatColorOption(state) {
        if (!state.id) return state.text;
        return $('<span><span style="display:inline-block;width:15px;height:15px;background-color:' + state.element.dataset.color + ';border-radius:50%;margin-right:10px;"></span>' + state.text + '</span>');
    }

    $('.js-color-select').select2({
        templateResult: formatColorOption,
        templateSelection: formatColorOption,
        minimumResultsForSearch: -1 // hide search
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.image-viewer').forEach(img => new Viewer(img));
    });

    function addFavourite(id) {
        $.ajax({
            type: 'GET',
            url: "{{ route('ads.fav.create') }}",
            data: { id },
            dataType: 'JSON',
            success: () => toastr.success('Advertisement added to favourites.'),
            error: () => toastr.error('An error occurred.')
        });
    }
</script>
@endsection
