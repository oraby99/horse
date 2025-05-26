@extends('layout.app')
@section('body_class','rtcl_listing-template-default single single-rtcl_listing postid-2068 wp-custom-logo rtcl rtcl-page rtcl-single-no-sidebar rtcl-no-js ehf-header ehf-footer ehf-template-classima ehf-stylesheet-classima header-style-2 footer-style-1 banner-enabled has-sidebar right-sidebar elementor-default elementor-kit-2161')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.3/viewer.min.css" integrity="sha512-zdX1vpRJc7+VHCUJcExqoI7yuYbSFAbSWxscAoLF0KoUPvMSAK09BaOZ47UFdP4ABSXpevKfcD0MTVxvh0jLHQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .rtcl img.rtcl-thumbnail{
        max-height: 350px;
    }
    .ad-image {
        max-height: 400px;
        width: 100%;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 15px;
    }
    .ad-info-item {
        margin-bottom: 15px;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 5px;
    }
    .ad-info-label {
        font-weight: bold;
        color: #495057;
    }
    .favorite-btn {
        background-color: #dc3545;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .favorite-btn:hover {
        background-color: #c82333;
    }
    .contact-btn {
        background-color: #28a745;
        border: none;
        color: white;
        padding: 15px 30px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
        margin-top: 10px;
    }
    .contact-btn:hover {
        background-color: #218838;
    }
    .status-badge {
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 12px;
        font-weight: bold;
    }
    .status-active {
        background-color: #28a745;
        color: white;
    }
    .status-inactive {
        background-color: #6c757d;
        color: white;
    }
    .status-sold {
        background-color: #dc3545;
        color: white;
    }
    .image-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 10px;
        margin-top: 15px;
    }
    .gallery-image {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 5px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color 0.3s;
    }
    .gallery-image:hover {
        border-color: #007bff;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <!-- Main Advertisement Content -->
        <div class="col-lg-8">
            <br>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    @if($advertisement->is_sold)
                        <span class="status-badge status-sold">SOLD</span>
                    @elseif($advertisement->is_active)
                        <span class="status-badge status-active">ACTIVE</span>
                    @else
                        <span class="status-badge status-inactive">INACTIVE</span>
                    @endif
                </div>
            </div>

            <!-- Main Image -->
            @if($advertisement->images && count($advertisement->images) > 0)
                <img src="{{ asset('uploads/advertisments/' . $advertisement->images[0]) }}" 
                     class="ad-image image-viewer" 
                     alt="{{ $advertisement->name }}">
                
                <!-- Image Gallery -->
                @if(count($advertisement->images) > 1)
                    <div class="image-gallery">
                        @foreach($advertisement->images as $index => $image)
                            @if($index > 0) <!-- Skip first image as it's already shown as main -->
                                <img src="{{ asset('uploads/advertisments/' . $image) }}" 
                                     class="gallery-image image-viewer" 
                                     alt="{{ $advertisement->name }}">
                            @endif
                        @endforeach
                    </div>
                @endif
            @endif

            <!-- Videos Section -->
            @if($advertisement->videos && count($advertisement->videos) > 0)
                <div class="mt-4">
                    <h5>Videos</h5>
                    <div class="row">
                        @foreach($advertisement->videos as $video)
                            <div class="col-md-6 mb-3">
                                <video controls style="width: 100%; max-height: 300px;">
                                    <source src="{{ asset('uploads/advertisements/videos/' . $video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Description -->
            <div class="mt-4">
                <h5>Description</h5>
                <p class="text-justify">{{ $advertisement->description }}</p>
            </div>
        </div>

        <!-- Sidebar with Advertisement Details -->
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 30px;">
                <!-- Price -->
                <div class="ad-info-item text-center">
                <h4>{{ $advertisement->name }}</h4>

                    <h3 class="text-primary mb-0">
                        @if($advertisement->country)
                            {{ $advertisement->country->sign }}{{ number_format($advertisement->getPriceInCurrency($advertisement->country->sign, $advertisement->price), 2) }}
                        @else
                            ${{ number_format($advertisement->price, 2) }}
                        @endif
                    </h3>
                </div>

                <!-- Advertisement Details -->
                <div class="ad-info-item">
                    <div class="ad-info-label">Category:</div>
                    <div>{{ $advertisement->category->name ?? 'N/A' }}</div>
                </div>

                @if($advertisement->type)
                    <div class="ad-info-item">
                        <div class="ad-info-label">Type:</div>
                        <div>{{ ucfirst($advertisement->type) }}</div>
                    </div>
                @endif

                @if($advertisement->age)
                    <div class="ad-info-item">
                        <div class="ad-info-label">Age:</div>
                        <div>{{ $advertisement->age }} years</div>
                    </div>
                @endif

                @if($advertisement->location)
                    <div class="ad-info-item">
                        <div class="ad-info-label">Location:</div>
                        <div>{{ $advertisement->location }}</div>
                    </div>
                @endif

                @if($advertisement->country)
                    <div class="ad-info-item">
                        <div class="ad-info-label">Country:</div>
                        <div>{{ $advertisement->country->name }}</div>
                    </div>
                @endif

                <!-- Posted Date -->
                <div class="ad-info-item">
                    <div class="ad-info-label">Posted:</div>
                    <div>{{ $advertisement->created_at->diffForHumans() }}</div>
                </div>

                <!-- Seller Information -->
                <div class="ad-info-item">
                    <div class="ad-info-label">Seller:</div>
                    <div>{{ $advertisement->user->name ?? 'Unknown' }}</div>
                </div>

                @if($advertisement->phone)
                    <div class="ad-info-item">
                        <div class="ad-info-label">Phone:</div>
                        <div>{{ $advertisement->phone }}</div>
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="mt-4">
                    @auth
                        @if(auth()->id() !== $advertisement->user_id)
                            <button type="button" 
                                    class="favorite-btn w-100 mb-2" 
                                    onclick="addFavourite({{ $advertisement->id }})">
                                <i class="fas fa-heart"></i> Add to Favorites
                            </button>
                        @endif
                    @endauth

                    @if($advertisement->phone)
                        <a href="tel:{{ $advertisement->phone }}" class="contact-btn text-decoration-none">
                            <i class="fas fa-phone"></i> Contact Seller
                        </a>
                    @endif

                    @if($advertisement->user && $advertisement->user->email)
                        <a href="mailto:{{ $advertisement->user->email }}" 
                           class="contact-btn text-decoration-none mt-2">
                            <i class="fas fa-envelope"></i> Send Email
                        </a>
                    @endif
                </div>

                <!-- Share Section -->
                <div class="ad-info-item mt-3">
                    <div class="ad-info-label mb-2">Share this ad:</div>
                    <div class="d-flex gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                           target="_blank" class="btn btn-primary btn-sm">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($advertisement->name) }}" 
                           target="_blank" class="btn btn-info btn-sm">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($advertisement->name . ' - ' . request()->fullUrl()) }}" 
                           target="_blank" class="btn btn-success btn-sm">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Advertisements -->
    @if(isset($relatedAds) && $relatedAds->count() > 0)
        <div class="row mt-5">
            <div class="col-12">
                <h4>Related Advertisements</h4>
                <div class="row">
                    @foreach($relatedAds as $relatedAd)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card">
                                @if($relatedAd->images && count($relatedAd->images) > 0)
                                    <img src="{{ asset('uploads/advertisements/' . $relatedAd->images[0]) }}" 
                                         class="card-img-top" 
                                         style="height: 200px; object-fit: cover;" 
                                         alt="{{ $relatedAd->name }}">
                                @endif
                                <div class="card-body">
                                    <h6 class="card-title">{{ Str::limit($relatedAd->name, 50) }}</h6>
                                    <p class="card-text text-primary font-weight-bold">
                                        @if($relatedAd->country)
                                            {{ $relatedAd->country->sign }}{{ number_format($relatedAd->getPriceInCurrency($relatedAd->country->sign, $relatedAd->price), 2) }}
                                        @else
                                            ${{ number_format($relatedAd->price, 2) }}
                                        @endif
                                    </p>
                                    <a href="{{ route('advertisement.show', $relatedAd->id) }}" 
                                       class="btn btn-outline-primary btn-sm">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.1/viewer.min.js"></script>
<script>
    $(document).ready(function() {
        const imageElements = document.querySelectorAll('.image-viewer');
        imageElements.forEach((element) => {
            new Viewer(element);
        });
    });

    function addFavourite(id) {
        $.ajax({
            type: 'GET',
            url: "{{ route('ads.fav.create') }}",
            data: {id: id},
            dataType: 'JSON',
            success: function (results) {
                toastr.success('Advertisement Added To Favourite', 'Success');
            },
            error: function(result) {
                console.log(result);
                toastr.error('Error Occurred', 'Error');
            }
        });
    }
</script>
@endsection