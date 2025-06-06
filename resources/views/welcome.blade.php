@extends('layout.app')
@section('body_class','home page-template')
@section('content')
<style>
    .hero-section {
        position: relative;
        height: 400px; /* Reduced height */
        overflow: hidden;
    }
    .swiper {
        width: 100%;
        height: 100%;
    }
    .swiper-slide img {
        object-fit: cover;
        width: 100%;
        height: 100%;
        max-height: 400px; /* Ensure images fit within the reduced height */
    }
    .search-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%; /* Adjusted width for better responsiveness */
        max-width: 1200px;
        background: rgba(255, 255, 255, 0.95);
        padding: 1.5rem; /* Reduced padding */
        border-radius: 10px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        z-index: 10; /* Ensure it appears above the Swiper */
    }
    .search-container .form-control {
        height: 45px; /* Adjusted height */
        border-radius: 25px;
        border: 1px solid #ddd;
        padding: 0 20px;
    }
    .search-btn {
        height: 45px; /* Adjusted height */
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

    /* Add this CSS to fix category name visibility */
.categories-section {
    padding: 60px 0;
    background-color: #f8f9fa;
}

.section-title {
    text-align: center;
    margin-bottom: 50px;
    font-size: 2.5rem;
    font-weight: bold;
    color: #333;
}

.category-card {
    position: relative;
    height: 200px;
    border-radius: 15px;  
    overflow: hidden;
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.category-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.category-card:hover img {
    transform: scale(1.1);
}

.category-overlay {
    background: linear-gradient(
        to bottom, 
        transparent 0%, 
        rgba(0,0,0,0.3) 50%, 
        rgba(0,0,0,0.7) 100%
    );
    display: flex;
    align-items: flex-end;
    z-index: 1;
}

.category-overlay h4 {
    font-weight: bold;
    font-size: 1.2rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    margin: 0;
    z-index: 100;
    position: relative;
}

/* Alternative styling if you prefer dark text */
.category-overlay-light {
    background: linear-gradient(
        to bottom, 
        transparent 0%, 
        rgba(255,255,255,0.3) 50%, 
        rgba(255,255,255,0.9) 100%
    );
}

.category-overlay-light h4 {
    color: #333 !important;
    text-shadow: 1px 1px 2px rgba(255,255,255,0.8);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .category-card {
        height: 150px;
        margin-bottom: 20px;
    }
    
    .category-overlay h4 {
        font-size: 1rem;
    }
    
    .section-title {
        font-size: 2rem;
        margin-bottom: 30px;
    }
}
</style>

<!-- Hero Section with Swiper -->
<div class="hero-section">
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('assets/images/pedramezzati_a_commercial_poster_for_website_horse_training__bl_cdf22caf-b057-4e99-ac58-5e0873f96a43-1 (1).png') }}" alt="First slide" class="img-fluid">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('assets/images/pedramezzati_a_commercial_poster_for_website_horse_training__bl_cdf22caf-b057-4e99-ac58-5e0873f96a43-1.png') }}" alt="Second slide" class="img-fluid">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('assets/images/pedramezzati_a_commercial_poster_for_website_horse_training__bl_cdf22caf-b057-4e99-ac58-5e0873f96a43.png') }}" alt="Third slide" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Search Container -->
    <div class="search-container">
            <form action="{{route('home.main')}}" method="GET">

        <div class="row g-3">
            <div class="col-lg-11 col-md-6">
                <input type="text" class="form-control" name="key" placeholder="@lang('lang.search_category')">
            </div>
            <div class="col-lg-1 col-md-6">
                <button class="btn search-btn w-100">
                    <i class="fas fa-search text-white"></i>
                </button>
            </div>

        </div>
            </form>

    </div>
</div>

<!-- Include Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<!-- Include Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



<!-- Categories Section -->
<div class="categories-section">
    <div class="container">
        <h2 class="section-title">@lang('lang.categories')</h2>
        <div class="row">
            @foreach ($categroy as $cat)
                @if ($cat->parent_id == null)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{route('home.main')}}?category_id={{$cat->id}}">
                        <div class="category-card" style="position: relative; height: 200px; margin-bottom: 20px; border-radius: 10px; overflow: hidden;">
                            <img src="{{ asset('uploads/categories/' . $cat->image) }}" 
                                alt="{{$cat->name}}" 
                                style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.7)); padding: 20px;">
                                <h4 style="color: white; margin: 0; font-weight: bold; text-shadow: 1px 1px 2px rgba(0,0,0,0.8);">
                                    {{$cat->name}}
                                </h4>
                            </div>
                        </div>
                        </a>
                        
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- Featured Products Section -->
<div class="featured-section">
    <div class="container">
        <h2 class="section-title">@lang('lang.product_feature')</h2>
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
        
    </div>
</div>

<!-- Featured Ads Section -->
<!-- Featured Ads Section -->
<div class="featured-section bg-light">
    <div class="container">
        <h2 class="section-title">@lang('lang.ads_featured')</h2>
        <div class="row">
            @foreach ($ads as $ad)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{route('advertisment.show',$ad->id)}}">
                    <div class="product-card card">
                        @if ($ad->images && count($ad->images) > 0)
                            <img src="{{$ad->images[0] != null ?  asset('uploads/advertisments/' . $ad->images[0]) : asset('default.png') }}" class="card-img-top" alt="{{$ad->name}}">
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
                    </a>
                    
                </div>
            @endforeach
        </div>
        
    </div>
</div>
@endsection
