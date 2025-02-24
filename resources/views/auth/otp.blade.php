@extends('layout.app')
@section('body_class','page-template-default page page-id-8 wp-custom-logo rtcl-account rtcl-page rtcl-no-js ehf-header ehf-footer ehf-template-classima ehf-stylesheet-classima header-style-2 footer-style-1 banner-enabled has-sidebar left-sidebar elementor-default elementor-kit-2161 elementor-page elementor-page-8')
@section('content')
<div id="primary" class="content-area classima-myaccount">
    <div class="container">
        <div id="post-8" class="post-8 page type-page status-publish">

            <div data-elementor-type="wp-page" data-elementor-id="8" class="elementor elementor-8"
                data-elementor-post-type="page">
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-2e91ada3 elementor-section-boxed elementor-section-height-default elementor-section-height-default rt-parallax-bg-no"
                    data-id="2e91ada3" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-78c3e29f"
                            data-id="78c3e29f" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-50c3004f elementor-widget elementor-widget-shortcode"
                                    data-id="50c3004f" data-element_type="widget"
                                    data-widget_type="shortcode.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-shortcode">
                                            <div class="rtcl">
                                                <form id="rtcl-lost-password-form" action="{{route('forget-password.verify')}}" class="form-horizontal"
                                                    method="post">
                                                    @csrf

                                                    <p>Enter OTP Sent</p>
                                                    <div class="rtcl-form-group">
                                                        <label for="rtcl-user-login" class="rtcl-field-label">
                                                            OTP </label>
                                                        <input type="text" required name="otp"
                                                            id="rtcl-user-login" class="rtcl-form-control"
                                                            required />
                                                        @error('otp')
                                                            <span style="color: red">{{$message}}</span>
                                                        @enderror
                                                    </div>


                                                    <div class="rtcl-form-submit-wrap row">
                                                        <input type="submit" name="rtcl-lost-password"
                                                            class="btn" value="Submit" />


                                                            <p class="rtcl-forgot-password m-2">
                                                                <a href="{{route('resend-otp', $phone )}}">Resend OTP</a>
                                                            </p>
                                                    </div>
                                                    
                                                    {{-- <div
                                                    class="rtcl-form-group rtcl-form-group-no-margin-bottom">
                                                    
                                                    </div> --}}
                                                    <input type="hidden" id="rtcl-lost-password-nonce"
                                                        name="rtcl-lost-password-nonce"
                                                        value="b9995e888e" /><input type="hidden"
                                                        name="_wp_http_referer"
                                                        value="/alfuraij/my-account/lost-password/" />
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
@endsection