@extends('layout.app')
@section('body_class','page-template-default page page-id-8 wp-custom-logo rtcl-account rtcl-page rtcl-no-js ehf-header ehf-footer ehf-template-classima ehf-stylesheet-classima header-style-2 footer-style-1 banner-enabled has-sidebar left-sidebar elementor-default elementor-kit-2161 elementor-page elementor-page-8')
@section('css')
<style>
    .phone-input-container {
    display: flex;
    align-items: center;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 5px;
    background-color: #fff;
}

.country-flag {
    width: 30px; /* Adjust as needed */
    height: auto;
    margin-right: 10px;
}

.country-code {
    margin-right: 10px;
    font-size: 16px;
    color: #333;
}

.phone-input {
    border: none;
    outline: none;
    flex-grow: 1;
}

</style>
@endsection
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
                                                <form id="rtcl-lost-password-form" action="{{route('send-otp')}}" class="form-horizontal"
                                                    method="post">
                                                    @csrf
                                                    <p>@lang('lang.lost_password_text')</p>
                                                    <div class="rtcl-form-group">
                                                        {{-- <label for="rtcl-user-login" class="rtcl-field-label">
                                                            Phone </label>
                                                        <input type="text" name="phone"
                                                            id="rtcl-user-login" class="rtcl-form-control"
                                                            required />
                                                        @error('phone')
                                                            <span style="color: red">{{$message}}</span>
                                                        @enderror --}}
                                                        <div class="phone-input-container">
                                                            <img src="{{asset('assets/kuwait.png')}}" alt="Kuwait Flag" class="country-flag">
                                                            {{-- <span class="country-code">+965</span> --}}
                                                            <input type="tel" id="phone" name="phone" placeholder="رقم الهاتف" class="phone-input" />
                                                        </div>
                                                        @error('phone')
                                                        <span style="color: red">{{$message}}</span>
                                                    @enderror
                                                    </div>


                                                    <div class="rtcl-form-submit-wrap">
                                                        <input type="submit" name="rtcl-lost-password"
                                                            class="btn" value="Send OTP" />
                                                    </div>
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
@section('script')
<script>
    document.getElementById('phone').addEventListener('focus', function (e) {
        if (e.target.value === '') {
            e.target.value = '+965';
        }
    });
    document.getElementById('phone').addEventListener('blur', function (e) {
        if (e.target.value === '+965') {
            e.target.value = '';
        }
    });
</script>
@endsection