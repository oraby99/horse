@extends('layout.app')

@section('body_class', 'product-detail-page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.3/viewer.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .product-image {
        max-height: 400px;
        object-fit: cover;
        border-radius: 12px;
    }

    .product-info {
        padding-top: 2rem;
    }

    .CartBtn {
        background-color: #ffc107;
        border: none;
        color: #000;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .CartBtn:hover {
        background-color: #e0a800;
    }

    .CartBtn .IconContainer {
        margin-left: 10px;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="row g-5">
        <!-- Product Image -->
        <div class="col-md-6">
            <img src="{{ asset('uploads/products/' . $product->images[0]) }}" class="img-fluid product-image image-viewer" alt="{{ $product->name }}">
        </div>

        <!-- Product Info -->
        <div class="col-md-6 product-info">
            <h2 class="fw-bold mb-3">{{ $product->name }}</h2>
            <h4 class="text-success mb-3">{{ $product->price }} KWD</h4>
            <p class="mb-4">{{ $product->description }}</p>

            <form action="{{ route('addToCart', $product) }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="price" value="{{ $product->price }}">

                <!-- Size Selector -->
                <div class="mb-3">
                    <label for="size" class="form-label">Select Size</label>
                    <select name="size" id="size" class="form-select" required>
                        <option value="">Choose size</option>
                        @foreach (explode(',', $product->size) as $size)
                            <option value="{{ $size }}">{{ $size }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Color Selector -->
                <div class="mb-3">
                    <label for="color" class="form-label">Select Color</label>
                    <select name="color" id="color" class="form-select" required>
                        <option value="">Choose color</option>
                        @foreach ($product->colors as $color)
                            <option value="{{ $color }}">{{ $color }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantity Input -->
                <div class="mb-4">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" id="quantity" name="qantity" class="form-control" value="1" min="1" required>
                </div>

                <!-- Add to Cart Button -->
                <button type="submit" class="CartBtn w-100">
                    Add to Cart
                    <span class="IconContainer">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="currentColor">
                            <path d="M0 24C0 10.7...z" />
                        </svg>
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.1/viewer.min.js"></script>
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
