@extends('layout.app')
@section('body_class','home page-template page-template-templates page-template-blank page-template-templatesblank-php page page-id-1897 wp-custom-logo rtcl-no-js ehf-header ehf-footer ehf-template-classima ehf-stylesheet-classima header-style-2 footer-style-1 no-sidebar elementor-default elementor-kit-2161 elementor-page elementor-page-1897')
@section('content')
<style>
    .carousel-container {
    position: relative;
}
.centered-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(100, 100, 100, 0.4);
    padding: 40px;
    width: 100%;
}
    .zoom-effect {
        transition: transform 0.3s;
    }
    .zoom-effect:hover {
        transform: scale(1.1);
    }
</style>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
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
        <div class="centered-content">
            <div class="w-100">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <input type="text" class="form-control search" placeholder="Search.."/>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <input type="text" class="form-control search" placeholder="Search.."/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <input type="text" class="form-control search" placeholder="Search.."/>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1">
                    <button class="btn" style="background-color: rgb(148, 129, 93); color: white">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <br>
        <div class="container">
            <div class="row">
                @foreach ($categroy as $cat)
                    @if ($cat->parent_id == null)
                        <div class="col-lg-3 zoom-effect" style="height:200px ; background-image: url('{{ asset('uploads/categories/' . $cat->image) }}'); background-repeat: no-repeat; color: white;">
                            <h1 style="color: white">{{$cat->name}}</h1>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="container" style="margin-top: -25px">
            <h2>Featured Products</h2>
            <div class="row">
                @foreach ($products as $prd)
                <a href="{{ route('product.show', $prd->id) }}">
                    <div class="col-lg-3">
                        <div class="card">
                            <img src="{{ asset('uploads/products/' . $prd->images[0]) }}" class="card-img-top" alt="...">
                            <div class="card-body m-auto">
                                <h5 class="card-title">{{$prd->name}}</h5>
                                <h6 class="card-title">{{$prd->price}} د . ك</h6>
                                <a href="#" class="btn btn-dark">Select Options</a>
                            </div>
                        </div><br>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="container">
        <h2>Featured Ads</h2>
        <div class="row">
            @foreach ($ads as $ad)
            <div class="col-sm-3">
              <div class="card">
                @if ($ad->images && count($ad->images) > 0)
                <img src="{{ asset('uploads/advertisments/' . $ad->images[0]) }}" class="card-img-top" alt="...">
                @endif
                    <div class="card-body">
                    <h5 class="card-title">{{$ad->name}}</h5>
                    @if ($ad->category)
                    <h5 class="card-title">{{$ad->category['name']}}</h5>
                @endif
                  <p class="card-text">{{$ad->price}} د.ك</p>
                  @if ($ad->country)
                  <p class="card-text">{{$ad->country['name']}}</p>
                  @endif
                  <p class="card-text">Age: {{$ad->age}} Years</p>
                </div>
              </div><br>
            </div>
        @endforeach
        </div>
        </div>
@endsection
@section('script')
<script>
    function isMobileDevice() {
        return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
    }
    var currentLocation = window.location.href;
    var mobileRedirect = 'https://play.google.com/';
    var desktopRedirect = '/';
    var redirectKey = isMobileDevice() ? 'mobileRedirected' : 'desktopRedirected';
    var redirected = sessionStorage.getItem(redirectKey);
    if (!redirected && ((isMobileDevice() && currentLocation !== mobileRedirect) || (!isMobileDevice() && currentLocation !== desktopRedirect))) {
        sessionStorage.setItem(redirectKey, 'true');
        window.location.href = isMobileDevice() ? mobileRedirect : desktopRedirect;
    }
</script>
@endsection
