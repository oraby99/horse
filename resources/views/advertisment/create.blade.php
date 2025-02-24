@extends('layout.app')
@section('body_class','page-template-default page page-id-6 logged-in admin-bar no-customize-support wp-custom-logo rtcl-form-page rtcl-page rtcl-no-js ehf-header ehf-footer ehf-template-classima ehf-stylesheet-classima header-style-2 footer-style-1 banner-enabled no-sidebar elementor-default elementor-kit-2161 elementor-page elementor-page-6')

@section('content')
<div id="primary" class="content-area classima-listing-archive rtcl h-100">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-12">
        <div class="site-content-block">
          <div class="main-content">
            <div id="post-6" class="post-6 page type-page status-publish">

              <div data-elementor-type="wp-page" data-elementor-id="6"
                class="elementor elementor-6" data-elementor-post-type="page">
                <section
                  class="elementor-section elementor-top-section elementor-element elementor-element-66fc0f66 elementor-section-boxed elementor-section-height-default elementor-section-height-default rt-parallax-bg-no"
                  data-id="66fc0f66" data-element_type="section">
                  <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5e4d1b36"
                      data-id="5e4d1b36" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-32d7563a elementor-widget elementor-widget-shortcode"
                          data-id="32d7563a" data-element_type="widget"
                          data-widget_type="shortcode.default">
                          <div class="elementor-widget-container">
                            <div class="elementor-shortcode">
                              <div class="rtcl">
                                <form method="post" action="{{route('storeadd')}}" id="ads_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="rtcl-listing-info-selecting classima-form">
                                      <div>
                                        <div class="classified-listing-form-title">
                                          <i class="fa fa-tags" aria-hidden="true"></i>
                                          <h3>Select Type</h3>
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-3 col-12">
                                            <label class="control-label">Ad Type<span>*</span></label>
                                          </div>
                                          <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                              <select class="rtcl-select2 form-control" id="rtcl-ad-type" name="type" >
                                                <option value="">--Select Type--</option>
                                                <option value="horse">horse</option>
                                                <option value="service">service</option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div id="rtcl-ad-category" style="display: none;">
                                        <div class="classified-listing-form-title">
                                          <i class="fa fa-tags" aria-hidden="true"></i>
                                          <h3>Select Category</h3>
                                        </div>
                                        <div class="rtcl-post-category">
                                          <div class="row" id="">
                                            <div class="col-sm-3 col-12">
                                              <label class="control-label">Category<span>*</span></label>
                                            </div>
                                            <div class="col-sm-9 col-12">
                                              <div class="form-group">
                                                <select class="rtcl-select2 form-control" name="category_id" >
                                                    <option value="">Select a Category</option>
                                                    @foreach ($categories as $category)
                                                        @if ($category->parent_id == 2)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div id="rtcl-ad-country" style="display: none;">
                                        <div class="row" id="">
                                          <div class="col-sm-3 col-12">
                                            <label class="control-label">Select
                                                Location<span>*</span></label>
                                          </div>
                                          <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <select  id="" name="country_id"
                                                class="rtcl-select2 rtcl-select form-control rtcl-map-field" >
                                                <option value="">
                                                  --Select
                                                  Location--
                                                </option>
                                                @foreach ($countries as $country )
                                                <option value="{{$country->id}}">
                                                    {{ $country->name}}
                                                </option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                    </div>

                                    <div id="rtcl-ad-age" style="display: none;">
                                        <div class="row" id="">
                                          <div class="col-sm-3 col-12">
                                            <label class="control-label">Select
                                                Age<span></span></label>
                                          </div>
                                          <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input   type="number" class="form-control" value="" name="age" id=""
                                                >
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="rtcl-ad-name" style="display: none;">
                                        <div class="row" id="">
                                          <div id="service-name" class="col-sm-3 col-12">
                                            <label class="control-label">service name<span></span></label>
                                          </div>
                                          <div id="horse-name"  class="col-sm-3 col-12">
                                            <label class="control-label">horse name<span></span></label>
                                          </div>
                                          <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input  type="text" class="form-control" value="" name="name" >
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="rtcl-ad-description-s" style="display: none;">
                                        <div class="row" id="">
                                          <div class="col-sm-3 col-12">
                                            <label class="control-label">description<span></span></label>
                                          </div>
                                          <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input  type="text" class="form-control" value="" name="description" id=""
                                                >
                                            </div>
                                          </div>
                                        </div>
                                    </div>


                                    <div id="rtcl-ad-description" style="display: none;">
                                        <div class="row" id="">
                                          <div class="col-sm-3 col-12">
                                            <label class="control-label">description<span></span></label>
                                          </div>
                                          <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input  type="text" class="form-control" value="" name="description" id="">
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="rtcl-ad-phone" style="display: none;">
                                        <div class="row" id="">
                                          <div class="col-sm-3 col-12">
                                            <label class="control-label">phone<span></span></label>
                                          </div>
                                          <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input required type="text" class="form-control" value="" name="phone" id="">
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="rtcl-ad-price" style="display: none;">
                                        <div class="row" id="">
                                          <div class="col-sm-3 col-12">
                                            <label class="control-label">price<span></span></label>
                                          </div>
                                          <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input required type="number" class="form-control" value="" name="price" id=""
                                                >
                                            </div>
                                          </div>
                                        </div>
                                    </div>

                                    <div id="rtcl-ad-image" style="display: none;">
                                        <div class="row" id="">
                                          <div class="col-sm-3 col-12">
                                            <label class="control-label">image<span></span></label>
                                          </div>
                                          <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input   type="file" class="form-control" value="" name="images" id=""
                                                >
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="rtcl-ad-video" style="display: none;">
                                        <div class="row" id="">
                                          <div class="col-sm-3 col-12">
                                            <label class="control-label">video<span></span></label>
                                          </div>
                                          <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input  type="file" class="form-control" value="" name="videos" id=""
                                                >
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div id="rtcl-ad-radio" style="display: none;margin-left: 45%" class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label">Ads Type<span>*</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-check form-check-inline">
                                                <input  class="form-check-input" type="radio" name="ads_type" id="normal" value="normal" checked>
                                                <label class="form-check-label" for="normal">Normal</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input  class="form-check-input" type="radio" name="ads_type" id="special" value="special">
                                                <label class="form-check-label" for="special">Special</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="rtcl-ad-radio-s" style="display: none;margin-left: 45%" class="row" >
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label">Ads Type<span>*</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-check form-check-inline">
                                                <input  class="form-check-input" type="radio" name="ads_type" id="normal" value="normal" checked>
                                                <label class="form-check-label" for="normal">Normal</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input  class="form-check-input" type="radio" name="ads_type" id="special" value="special">
                                                <label class="form-check-label" for="special">Special</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <input  type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                                    <div class="row">
                                      <div class="col-md-9" id="form-content">
                                        </div>
                                    </div>
                                    <div id="rtcl-ad-submit-s" style="display: none; margin-left: 55%" class="row">
                                        <div class="col-md-9" id="form-content">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                    <div id="rtcl-ad-submit" style="display: none; margin-left: 55%" class="row">
                                        <div class="col-md-9" id="form-content">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
@section('script')
<script>
    const typeSelect            = document.getElementById("rtcl-ad-type");
    const categorySelection     = document.getElementById("rtcl-ad-category");
    const ageSelection          = document.getElementById("rtcl-ad-age");
    const nameSelection         = document.getElementById("rtcl-ad-name");
    const servicename           = document.getElementById("service-name");
    const horsename             = document.getElementById("horse-name");
    const countrySelection      = document.getElementById("rtcl-ad-country");
    const descriptionSelection  = document.getElementById("rtcl-ad-description");
    const descriptionsSelection = document.getElementById("rtcl-ad-description-s");
    const phoneSelection        = document.getElementById("rtcl-ad-phone");
    const priceSelection        = document.getElementById("rtcl-ad-price");
    const imageSelection        = document.getElementById("rtcl-ad-image");
    const videoSelection        = document.getElementById("rtcl-ad-video");
    const radioSelection        = document.getElementById("rtcl-ad-radio");
    const radiosSelection       = document.getElementById("rtcl-ad-radio-s");
    const submitSelection       = document.getElementById("rtcl-ad-submit");
    const submitsSelection      = document.getElementById("rtcl-ad-submit-s");
    typeSelect.addEventListener("change", function() {
      if (this.value === "horse") {
        categorySelection.style.display     = "block";
        ageSelection.style.display          = "block";
        nameSelection.style.display         = "block";
        servicename.style.display           = "none";
        horsename.style.display             = "block";
        countrySelection.style.display      = "block";
        descriptionSelection.style.display  = "block";
        descriptionsSelection.style.display = "none";
        phoneSelection.style.display        = "block";
        priceSelection.style.display        = "block";
        imageSelection.style.display        = "block";
        videoSelection.style.display        = "block";
        submitSelection.style.display       = "none";
        submitsSelection.style.display      = "block";
        radioSelection.style.display        = "none";
        radiosSelection.style.display       = "block";
      } else if (this.value === "service"){
        categorySelection.style.display     = "none";
        ageSelection.style.display          = "none";
        nameSelection.style.display         = "block";
        servicename.style.display           = "block";
        horsename.style.display             = "none";
        countrySelection.style.display      = "block";
        descriptionSelection.style.display  = "block";
        descriptionsSelection.style.display = "none";
        phoneSelection.style.display        = "block";
        priceSelection.style.display        = "block";
        imageSelection.style.display        = "block";
        videoSelection.style.display        = "block";
        submitSelection.style.display       = "block";
        submitsSelection.style.display      = "none";
        radioSelection.style.display        = "block";
        radiosSelection.style.display       = "none";
      }
    });
  </script>
@endsection
