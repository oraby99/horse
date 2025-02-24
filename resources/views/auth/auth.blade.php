@extends('layout.app')
@section('body_class','page-template-default page page-id-8 wp-custom-logo rtcl-account rtcl-page rtcl-no-js ehf-header ehf-footer ehf-template-classima ehf-stylesheet-classima header-style-2 footer-style-1 banner-enabled has-sidebar left-sidebar elementor-default elementor-kit-2161 elementor-page elementor-page-8')
@section('css')
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
                                                <div id="rtcl-user-login-wrapper"
                                                    class="have-registration-form">


                                                    <div class="rtcl-login-form-wrap">
                                                        <h2>@lang('lang.login')</h2>
                                                        <form id="rtcl-login-form" action="{{route('login')}}" class="form-horizontal"
                                                            method="post">
                                                            @csrf
                                                            <label for="">@lang('lang.phone') <span style="color: red">*</span></label>

                                                            <div class="phone-input-container mb-3">

                                                                <img src="{{asset('assets/kuwait.png')}}" alt="Kuwait Flag" class="country-flag">
                                                                {{-- <span class="country-code">+965</span> --}}
                                                                <input type="tel" id="phone" name="phone"  class="phone-input" />
                                                            </div>
                                                            @error('phone')
                                                            <span style="color: red">{{$message}}</span>
                                                        @enderror

                                                            <div class="rtcl-form-group">
                                                                <label for="rtcl-user-pass"
                                                                    class="rtcl-field-label">
                                                                    @lang('lang.password') <strong
                                                                        class="rtcl-required">*</strong>
                                                                </label>
                                                                <input type="password" name="password"
                                                                    id="rtcl-user-pass"
                                                                    autocomplete="current-password"
                                                                    class="rtcl-form-control" required>
                                                            </div>


                                                            <div class="rtcl-form-group">
                                                                <div id="rtcl-login-g-recaptcha"></div>
                                                                <div id="rtcl-login-g-recaptcha-message"></div>
                                                            </div>

                                                            <div
                                                                class="rtcl-form-group rtcl-login-form-submit-wrap">

                                                                <button type="submit" name="rtcl-login"
                                                                    class="btn" value="login">
                                                                    @lang('lang.login') </button>
                                                                <div class="form-check">
                                                                    <input type="checkbox" name="rememberme"
                                                                        id="rtcl-rememberme"  value="forever">
                                                                    <label class="form-check-label"
                                                                        for="rtcl-rememberme">
                                                                        @lang('lang.remember_me') </label>
                                                                </div>

                                                                @if (Session::has('error'))
                                                                    <span  style="color: red">@lang('lang.login_error')</span>
                                                                @endif
                                                            </div>
                                                            <div
                                                                class="rtcl-form-group rtcl-form-group-no-margin-bottom">
                                                                <p class="rtcl-forgot-password">
                                                                    <a href="{{route('forget-password.view')}}">@lang('lang.forget_password')?</a>
                                                                </p>
                                                            </div>
                                                            {{-- <input type="hidden" id="rtcl-login-nonce"
                                                                name="rtcl-login-nonce"
                                                                value="abb556a2cc"><input type="hidden"
                                                                name="_wp_http_referer"
                                                                value="/alfuraij/my-account/?simply_static_page=842"><input
                                                                type="hidden" name="redirect_to"
                                                                value="https://codedhosting.com/alfuraij/my-account/?simply_static_page=842"> --}}
                                                        </form>
                                                    </div>

                                                    <div class="rtcl-registration-form-wrap">

                                                        <h2>@lang('lang.register')</h2>

                                                        <form id="rtcl-register-form" action="{{route('register')}}" class="form-horizontal"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            {{-- <div class="rtcl-form-group phone-row">
                                                                <label for="rtcl-reg-phone"
                                                                    class="rtcl-field-label phone-label">
                                                                    Phone Number </label>
                                                                <input type="text" name="phone" value="{{old('phone')}}"
                                                                    id="rtcl-reg-phone"
                                                                    class="rtcl-form-control">

                                                                @error('phone')
                                                                    <span style="color: red">{{$message}}</span>
                                                                @enderror
                                                            </div> --}}
                                                            <label for="">@lang('lang.phone') <span style="color: red">*</span></label>

                                                            <div class="phone-input-container mb-3">

                                                                <img src="{{asset('assets/kuwait.png')}}" alt="Kuwait Flag" class="country-flag">
                                                                {{-- <span class="country-code">+965</span> --}}
                                                                <input type="tel" id="register-phone" name="phone"  class="phone-input" />
                                                            </div>
                                                            @error('phone')
                                                                <span style="color: red">{{$message}}</span>
                                                            @enderror

                                                            <div class="rtcl-form-group">
                                                                <label for="rtcl-reg-username"
                                                                    class="rtcl-field-label">
                                                                    @lang('lang.full_name') <strong
                                                                        class="rtcl-required">*</strong>
                                                                </label>
                                                                <input type="text" name="name" value="{{old('name')}}"
                                                                    autocomplete="name"
                                                                    id="rtcl-reg-username"
                                                                    class="rtcl-form-control" required>
                                                                {{-- <span class="help-block">Username cannot be
                                                                    changed.</span> --}}


                                                                @error('name')
                                                                    <span style="color: red">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                               <div class="rtcl-form-group">
                                                                <label for="rtcl-reg-email"
                                                                    class="rtcl-field-label">
                                                                    @lang('lang.email') <span class="text-muted">(@lang('lang.optional'))</span>
                                                                </label>
                                                                <input type="email" name="email" value="{{old('email')}}"
                                                                    autocomplete="email" id="rtcl-reg-email"
                                                                    class="rtcl-form-control" >


                                                                    @error('email')
                                                                        <span style="color: red">{{$message}}</span>
                                                                    @enderror
                                                            </div>

                                                            <div class="rtcl-form-group">
                                                                <label for="rtcl-reg-password"
                                                                    class="rtcl-field-label">
                                                                    @lang('lang.password') <strong
                                                                        class="rtcl-required">*</strong>
                                                                </label>
                                                                <input type="password" name="password"
                                                                    id="rtcl-reg-password"
                                                                    autocomplete="new-password"
                                                                    class="rtcl-form-control rtcl-password"
                                                                    required>


                                                                @error('password')
                                                                    <span style="color: red">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="rtcl-form-group">
                                                                <label for="rtcl-reg-confirm-password"
                                                                    class="rtcl-field-label">
                                                                    @lang('lang.password_confirmation') <strong
                                                                        class="rtcl-required">*</strong>
                                                                </label>
                                                                <div class="confirm-password-wrap">
                                                                    <input type="password" name="password_confirmation"
                                                                        id="rtcl-reg-confirm-password"
                                                                        class="rtcl-form-control"
                                                                        autocomplete="off"
                                                                        data-rule-equalto="#rtcl-reg-password"
                                                                        data-msg-equalto="Password does not match."
                                                                        required>
                                                                    <span class="rtcl-checkmark"></span>
                                                                </div>
                                                            </div>


                                                            <div class="form-group rtcl-privacy-policy-wrap">
                                                                <div class="form-check">
                                                                    <input id="rtcl-privacy-policy"
                                                                        name="rtcl_privacy_policy"
                                                                        type="checkbox" class="form-check-input"
                                                                        required>
                                                                    <label class="form-check-label"
                                                                        for="rtcl-privacy-policy">
                                                                        <p>@lang('lang.personal_data') <a
                                                                                href="#"
                                                                                class="rtcl-privacy-policy-link"
                                                                                target="_blank">@lang('lang.privacy_policy')</a>.</p>
                                                                    </label>
                                                                    <div class="with-errors help-block"
                                                                        data-error="This field is required">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="rtcl-registration-terms-conditions">
                                                                <div class="rtcl-form-group">
                                                                    <div class="form-check">
                                                                        <input  type="checkbox"
                                                                            class="form-check-input"
                                                                            name="rtcl_terms_conditions"
                                                                            id="rtcl-terms-conditions" required>
                                                                        <label class="form-check-label"
                                                                            for="rtcl-terms-conditions">
                                                                            @lang('lang.Ihave_read_and_agree_to_the_website')
                                                                            <a href="#"
                                                                                class="rtcl-terms-and-conditions-link"
                                                                                target="_blank">@lang('lang.terms_and_conditions')</a>. </label>
                                                                        <div class="with-errors help-block"
                                                                            data-error="This field is required">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="rtcl-form-group rtcl-form-group-no-margin-bottom">
                                                                <div id="rtcl-registration-g-recaptcha"></div>
                                                                <div id="rtcl-registration-g-recaptcha-message">
                                                                </div>
                                                                <input type="submit" name="rtcl-register"
                                                                    class="btn" value="@lang('lang.register')">
                                                            </div>
                                                            {{-- <input type="hidden" id="rtcl-register-nonce"
                                                                name="rtcl-register-nonce"
                                                                value="4ae1cffc85"><input type="hidden"
                                                                name="_wp_http_referer"
                                                                value="/alfuraij/my-account/?simply_static_page=842"><input
                                                                type="hidden" name="redirect_to"
                                                                value="https://codedhosting.com/alfuraij/my-account/?simply_static_page=842">
                                                        </form> --}}

                                                    </div>

                                                </div>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Include jQuery -->

<script>
    $(document).ready(function () {
        $('input[name="type"]').change(function () {
            if ($(this).val() === 'company') {
                $('#license-input').show();
            } else {
                $('#license-input').hide();
            }
        });
    });
</script>

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

    document.getElementById('register-phone').addEventListener('focus', function (e) {
        if (e.target.value === '') {
            e.target.value = '+965';
        }
    });
    document.getElementById('register-phone').addEventListener('blur', function (e) {
        if (e.target.value === '+965') {
            e.target.value = '';
        }
    });
</script>
@endsection
