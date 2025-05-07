@extends('layout.app')
@section('body_class','home page-template')
@section('content')
<style>
    .hero-section {
        position: relative;
        height: 600px;
        overflow: hidden;
    }
    .carousel-inner {
        height: 600px;
    }
    .carousel-inner .carousel-item img {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
    .search-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        max-width: 1200px;
        background: rgba(255, 255, 255, 0.95);
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }
    .search-container .form-control {
        height: 50px;
        border-radius: 25px;
        border: 1px solid #ddd;
        padding: 0 20px;
    }
    .search-btn {
        height: 50px;
        border-radius: 25px;
        background-color: #c1a872;
        border: none;
        padding: 0 30px;
        transition: all 0.3s ease;
    }
    .search-btn:hover {
        background-color: #94815d;
    }
    
    /* Categories Section */
    .categories-section {
        padding: 4rem 0;
        background-color: #f8f9fa;
    }
    .category-card {
        height: 300px;
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .category-card:hover {
        transform: translateY(-5px);
    }
    .category-overlay {
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.7) 100%);
    }
    
    /* Featured Sections */
    .featured-section {
        padding: 4rem 0;
    }
    .section-title {
        position: relative;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
    }
    .section-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background-color: #c1a872;
    }
    .product-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        margin-bottom: 1.5rem;
    }
    .product-card:hover {
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .product-card img {
        height: 250px;
        object-fit: cover;
    }
</style>

<!-- Hero Section with Carousel -->
<div class="hero-section">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="assets/images/pedramezzati_a_commercial_poster_for_website_horse_training__bl_cdf22caf-b057-4e99-ac58-5e0873f96a43-1 (1).png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="assets/images/pedramezzati_a_commercial_poster_for_website_horse_training_col_dfd363ab-5eda-4820-b553-890f51ec89e2-1 (1).png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="assets/images/pedramezzati_a_commercial_poster_for_website_horse_training__bl_dd359dc4-ea5e-4e4e-95ef-d9e5842996f4.png" alt="Third slide">
            </div>
        </div>
    </div>
    
    <!-- Search Container -->
    <div class="search-container">
        <div class="row g-3">
            <div class="col-lg-4">
                <input type="text" class="form-control" placeholder="@lang('lang.search_category')">
            </div>
            <div class="col-lg-3">
                <input type="text" class="form-control" placeholder="@lang('lang.location')">
            </div>
            <div class="col-lg-4">
                <input type="text" class="form-control" placeholder="@lang('lang.keywords')">
            </div>
            <div class="col-lg-1">
                <button class="btn search-btn w-100">
                    <i class="fas fa-search text-white"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Categories Section -->
<div class="categories-section">
    <div class="container">
        <h2 class="section-title">@lang('lang.browse_categories')</h2>
        <div class="row">
            @foreach ($categroy as $cat)
                @if ($cat->parent_id == null)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="category-card">
                            <img src="{{ asset('uploads/categories/' . $cat->image) }}" 
                                 alt="{{$cat->name}}" 
                                 class="w-100 h-100 object-fit-cover">
                            <div class="category-overlay position-absolute w-100 h-100 top-0 start-0">
                                <div class="position-absolute bottom-0 w-100 p-3 text-white">
                                    <h4 class="mb-0">{{$cat->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<!-- Featured Products Section -->
<div class="featured-section">
    <div class="container">
        <h2 class="section-title">@lang('lang.featured_products')</h2>
        <div class="row g-4">
            @foreach ($products as $prd)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('product.show', $prd->id) }}" class="text-decoration-none">
                        <div class="product-card card h-100">
                            <img src="{{ asset('uploads/products/' . $prd->images[0]) }}" class="card-img-top" alt="{{$prd->name}}">
                            <div class="card-body">
                                <h5 class="card-title text-dark">{{$prd->name}}</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary mb-0">{{$prd->price}} د.ك</h6>
                                    <button class="btn btn-outline-dark btn-sm">@lang('lang.view_details')</button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
</div>

<!-- Featured Ads Section -->
<div class="featured-section bg-light">
    <div class="container">
        <h2 class="section-title">@lang('lang.featured_ads')</h2>
        <div class="row">
            @foreach ($ads as $ad)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card card">
                        @if ($ad->images && count($ad->images) > 0)
                            <img src="{{ asset('uploads/advertisments/' . $ad->images[0]) }}" class="card-img-top" alt="{{$ad->name}}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$ad->name}}</h5>
                            @if ($ad->category)
                                <p class="text-muted mb-2">{{$ad->category['name']}}</p>
                            @endif
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="text-primary mb-0">{{$ad->price}} د.ك</h6>
                                <span class="badge bg-secondary">{{$ad->age}} @lang('lang.years')</span>
                            </div>
                            @if ($ad->country)
                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> {{$ad->country['name']}}</small>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
