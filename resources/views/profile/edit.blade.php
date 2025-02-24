@extends('layout.app')
@section('body_class','page-template-default page page-id-8 logged-in admin-bar no-customize-support wp-custom-logo rtcl-account rtcl-page rtcl-no-js ehf-header ehf-footer ehf-template-classima ehf-stylesheet-classima header-style-2 footer-style-1 banner-enabled has-sidebar left-sidebar elementor-default elementor-kit-2161 elementor-page elementor-page-8')
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
                                                <div class="rtcl-MyAccount-mobile-navbar">
                                                    <div class="rtcl-myaccount-logo">
                                                        <a href="https://codedhosting.com/alfuraij/">
                                                            <a class="light-logo"
                                                                href="https://codedhosting.com/alfuraij/">
                                                                <img decoding="async"
                                                                    src="https://codedhosting.com/alfuraij/wp-content/uploads/2021/04/logo-light.png"
                                                                    height="45" width="150"
                                                                    alt="Al Furaij Real Estate">
                                                            </a>
                                                        </a>
                                                    </div>
                                                    <div class="classima-MyAccount-open-menu"><span></span>
                                                    </div>
                                                    <div class="rtcl-MyAccount-open-menu"><span></span></div>
                                                </div>
                                                <div class="rtcl-MyAccount-wrap">
                                                    <nav class="rtcl-MyAccount-navigation">
                                                        <h3>@lang('lang.my_account')</h3>
                                                        <div class="rtcl-myaccount-logo">
                                                            <a class="light-logo"
                                                                href="https://codedhosting.com/alfuraij/">
                                                                <img loading="lazy" decoding="async"
                                                                    src="https://codedhosting.com/alfuraij/wp-content/uploads/2021/04/logo-light.png"
                                                                    height="45" width="150"
                                                                    alt="Al Furaij Real Estate">
                                                            </a>
                                                        </div>
                                                        <ul>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--dashboard">
                                                                <a
                                                                    href="{{route('profile.main')}}">@lang('lang.dashboard')</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--listings">
                                                                <a
                                                                    href="{{route('profile.listing')}}">@lang('lang.my_listing')</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--favourites">
                                                                <a
                                                                    href="{{route('profile.favourite')}}">@lang('lang.favourite')</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--chat rtcl-chat-unread-count">
                                                                <a
                                                                    href="{{route('profile.chat')}}">@lang('lang.chat')</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--payments">
                                                                <a
                                                                    href="{{route('profile.payment')}}">@lang('lang.payment')</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--edit-account is-active">
                                                                <a
                                                                    href="{{route('profile.edit')}}">@lang('lang.account_details')</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--logout">
                                                                <a
                                                                    href="{{route('logout')}}">@lang('lang.logout')</a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                    <div class="rtcl-MyAccount-content">
                                                        <form
                                                            class="rtcl-EditAccountForm rtcl-MyAccount-content-inner"
                                                            id="rtcl-user-account" action="{{route('profile.update')}}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <h3 class="rtcl-myaccount-content-title">@lang('lang.account_details')</h3>
                                                            <div class="rtcl-form-group-wrap">
                                                                <div class="rtcl-form-group">
                                                                    <label for="rtcl-first-name"
                                                                        class="rtcl-field-label">
                                                                         @lang('lang.full_name') </label>
                                                                    <div class="rtcl-field-col">
                                                                        <input type="text" name="name"
                                                                            id="rtcl-first-name" required value="{{auth()->user()->name}}"
                                                                            class="rtcl-form-control" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="id" id="id" value="{{auth()->user()->id}}">
                                                                <input type="hidden" name="access_token" id="access_token" value="{{auth()->user()->access_token}}">
                                                                <div class="rtcl-form-group">
                                                                    <label for="rtcl-email"
                                                                        class="rtcl-field-label">
                                                                        @lang('lang.email') <span
                                                                            class="require-star">*</span>
                                                                    </label>
                                                                    <div class="rtcl-field-col">
                                                                        <input type="email" name="email"
                                                                            id="rtcl-email"
                                                                            class="rtcl-form-control"
                                                                            value="{{auth()->user()->email}}" />
                                                                    </div>
                                                                </div>
                                                                <div class="rtcl-form-group">
                                                                    <label for="rtcl-last-name"
                                                                        class="rtcl-field-label">
                                                                       @lang('lang.phone') </label>
                                                                    <div class="rtcl-field-col">
                                                                        <input type="tel"
                                                                            required
                                                                            name="phone"
                                                                            id="rtcl-whatsapp-phone" value="{{auth()->user()->phone}}"
                                                                            class="rtcl-form-control" />
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="rtcl-form-group rtcl-no-field-group">
                                                                    <div class="form-check">
                                                                        <input type="hidden"
                                                                            name="change_password" value="0">
                                                                        <input type="checkbox"
                                                                            name="change_password"
                                                                            class="form-check-input"
                                                                            id="rtcl-change-password" value="1">
                                                                        <label class="form-check-label"
                                                                            for="rtcl-change-password">
                                                                           @lang('lang.change_password') </label>
                                                                    </div>
                                                                </div>
                                                                <div class="rtcl-form-group rtcl-password-fields"
                                                                    style="display: none;">
                                                                    <label for="password"
                                                                        class="rtcl-field-label">
                                                                        @lang('lang.password') <span
                                                                            class="require-star">*</span>
                                                                    </label>
                                                                    <div class="rtcl-field-col">
                                                                        <input type="password" name="password"
                                                                            id="password"
                                                                            class="rtcl-form-control rtcl-password"
                                                                            autocomplete="off"
                                                                            required="required" />
                                                                    </div>
                                                                </div>
                                                                <div class="rtcl-form-group rtcl-password-fields"
                                                                    style="display: none">
                                                                    <label for="password_confirm"
                                                                        class="rtcl-field-label">
                                                                        @lang('lang.password_confirmation') <span
                                                                            class="require-star">*</span>
                                                                    </label>
                                                                    <div class="rtcl-field-col">
                                                                        <input type="password" name="password_confirmation"
                                                                            id="password_confirm"
                                                                            class="rtcl-form-control"
                                                                            autocomplete="off"
                                                                            data-rule-equalTo="#password"
                                                                            data-msg-equalTo="Password does not match."
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rtcl-form-group rtcl-social-wrap-row">
                                                                <label for="rtcl-social"
                                                                    class="rtcl-field-label">
                                                                    @lang('lang.instegram_link') </label>
                                                                <div class="rtcl-field-col">
                                                                    <input type="text"
                                                                        name="instegram_link"
                                                                        id="rtcl-account-social-instegram"
                                                                        value="{{auth()->user()->instegram_link}}" placeholder=""
                                                                        class="rtcl-form-control" />
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="rtcl-form-group rtcl-profile-picture-row">
                                                                <label for="rtcl-profile-picture"
                                                                    class="rtcl-field-label">
                                                                    @lang('lang.images') <span
                                                                        class="require-star">*</span>
                                                                </label>
                                                                <div class="rtcl-field-col">
                                                                    <div class="rtcl-profile-picture-wrap mb-3">
                                                                        <input
                                                                        type="file"
                                                                        name="image"
                                                                        id="image"
                                                                        value=""
                                                                        onchange="readURL(this)"
                                                                        class="rtcl-form-control" />
                                                                    </div>
                                                                    @if (auth()->user()->image == null)
                                                                    <img alt='' src='https://secure.gravatar.com/avatar/b218d5f995cb5fd4652f6954eff6af3a?s=96&#038;d=mm&#038;r=g'/>
                                                                @else
                                                                    <img alt='' src='https://admin.alfuraij.com/public/uploads/users/{{ auth()->user()->image }}' class='avatar avatar-96 photo' height='96' width='96' />
                                                                @endif

                                                                </div>
                                                            </div>
                                                            <div class="rtcl-form-group">
                                                                <div class="rtcl-field-col">
                                                                     <button type="submit" class="btn submit-button" >Update Account</button>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" id="rtcl_user_account_nonce"
                                                                name="rtcl_user_account_nonce"
                                                                value="5028342c8b" /><input type="hidden"
                                                                name="_wp_http_referer"
                                                                value="/alfuraij/my-account/edit-account/" />
                                                            <div class="rtcl-response"></div>
                                                        </form>
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
{{-- <script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script> --}}
{{-- <script>
    $(document).ready(function(){

     $("#rtcl-user-account").submit(function(e){
         $(".submit-button").html('<i class="fa fa-spinner fa-spin"></i> Proccess...').prop('disabled', true);

         e.preventDefault();
         $.ajax({
             url:'https://admin.alfuraij.com/api/profile/update',
             header:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
             },
             type:'POST',
             data: new FormData(this),
             processData:false,
             contentType:false,
             success:function(data){
                 toastr.success(data.message);
                     $(".submit-button").html('Update Profile').prop('disabled', false);
             },

             error:function(data)
             {
                console.log(data);
                toastr.error(data.message);
                $(".submit-button").html('Update Profile').prop('disabled', false);
                 if(data.status == 422){
                     msg = data.responseJSON.errors
                     $.each(msg,function(key,value){
                         $(`.${key}_err`).text(value)
                         notyf.open({
                                 type: 'error',
                                 message: value
                             });
                     })
                 }


             }

         });
     });

     });

</script> --}}

@endsection
