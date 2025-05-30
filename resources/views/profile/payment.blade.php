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
                                                    <h4>Account Menu</h4>
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
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--listings ">
                                                                <a
                                                                    href="{{route('profile.listing')}}">@lang('lang.my_listing')</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--favourites">
                                                                <a
                                                                    href="{{route('profile.favourite')}}">@lang('lang.favourite')</a>
                                                            </li>
                                                            {{-- <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--chat rtcl-chat-unread-count">
                                                                <a
                                                                    href="{{route('profile.chat')}}">@lang('lang.chat')</a>
                                                            </li> --}}
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--payments is-active">
                                                                <a
                                                                    href="{{route('profile.payment')}}">@lang('lang.payment')</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--edit-account">
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
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--listings ">
                                                                <a
                                                                    href="{{route('profile.listing')}}">@lang('lang.my_listing')</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--favourites">
                                                                <a
                                                                    href="{{route('profile.favourite')}}">@lang('lang.favourite')</a>
                                                            </li>
                                                            {{-- <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--chat rtcl-chat-unread-count">
                                                                <a
                                                                    href="{{route('profile.chat')}}">@lang('lang.chat')</a>
                                                            </li> --}}
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--payments is-active">
                                                                <a
                                                                    href="{{route('profile.payment')}}">@lang('lang.payment')</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--edit-account">
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

                                                        <div class="rtcl-manage-my-listings">


                                                            <!-- header here -->
                                                            <div class="rtcl-action-wrap">
                                                                <div class="rtcl-my-listings-search-form">
                                                                    <form
                                                                        action="{{route('profile.listing')}}"
                                                                        class="form-inline">
                                                                        <input type="text" id="search-ml"
                                                                            name="q" class="rtcl-form-control"
                                                                            placeholder="Search by title"
                                                                            value="">
                                                                        <button type="submit">
                                                                            <svg width="21" height="21"
                                                                                viewBox="0 0 21 21" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M8.65429 17.2954C3.88229 17.2954 0 13.4161 0 8.64769C0 3.87933 3.88229 0 8.65429 0C13.4263 0 17.3086 3.87933 17.3086 8.64769C17.3086 13.4161 13.4263 17.2954 8.65429 17.2954ZM8.65429 1.63937C4.78693 1.63937 1.64062 4.78328 1.64062 8.64769C1.64062 12.5121 4.78693 15.656 8.65429 15.656C12.5216 15.656 15.668 12.5121 15.668 8.64769C15.668 4.78328 12.5216 1.63937 8.65429 1.63937ZM20.7598 20.76C21.0801 20.4398 21.0801 19.9208 20.7598 19.6007L17.0889 15.9326C16.7685 15.6125 16.2491 15.6125 15.9287 15.9326C15.6084 16.2527 15.6084 16.7718 15.9287 17.0919L19.5996 20.76C19.7598 20.92 19.9697 21 20.1797 21C20.3897 21 20.5995 20.92 20.7598 20.76Z"
                                                                                    fill="#646464" />
                                                                            </svg>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="rtcl-add-new-listing">
                                                                    {{-- <a href="{{route('addads')}}"
                                                                        class="btn btn-success">@lang('lang.add_ads')</a> --}}
                                                                </div>
                                                            </div>

                                                            <div class="rtcl-MyAccount-content-inner">
                                                                <table class="rtcl-my-listing-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>@lang('lang.images')</th>
                                                                            <th class="title-cell">@lang('lang.title')</th>
                                                                            <th
                                                                                class="price-cell list-on-responsive">
                                                                                @lang('lang.price')</th>
                                                                          
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                     @foreach ($order as $item )
                                                                     <tr>
                                                                        <td>
                                                                            <div class="listing-thumb">
                                                                                <a
                                                                                    href="https://codedhosting.com/alfuraij/listing/apartment-for-buy/"><img
                                                                                        loading="lazy"
                                                                                        decoding="async"
                                                                                        width="400"
                                                                                        height="280"
                                                                                        src="{{optional($item->product)->images != null ?  asset('uploads/products/' . optional($item->product)->images[0]) : asset('default.png') }}"
                                                                                        class="rtcl-thumbnail"
                                                                                        alt=""
                                                                                        title="" /></a>
                                                                            </div>
                                                                        </td>
                                                                        <td class="title-cell">
                                                                            <div class="rtcl-ad-details">
                                                                                <a class="listing-title"
                                                                                    href="">{{$item->order->order_number}}</a>
                                                                                <ul class="rtcl-meta">
                                                                                    <li>
                                                                                        <svg width="16"
                                                                                            height="16"
                                                                                            viewBox="0 0 16 16"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                fill-rule="evenodd"
                                                                                                clip-rule="evenodd"
                                                                                                d="M7.99941 1.60002C4.46479 1.60002 1.59941 4.4654 1.59941 8.00002C1.59941 11.5346 4.46479 14.4 7.99941 14.4C11.534 14.4 14.3994 11.5346 14.3994 8.00002C14.3994 4.4654 11.534 1.60002 7.99941 1.60002ZM0.399414 8.00002C0.399414 3.80266 3.80205 0.400024 7.99941 0.400024C12.1968 0.400024 15.5994 3.80266 15.5994 8.00002C15.5994 12.1974 12.1968 15.6 7.99941 15.6C3.80205 15.6 0.399414 12.1974 0.399414 8.00002ZM7.99941 3.20002C8.33078 3.20002 8.59941 3.46865 8.59941 3.80002V7.6292L11.0677 8.86337C11.3641 9.01156 11.4843 9.37196 11.3361 9.66835C11.1879 9.96474 10.8275 10.0848 10.5311 9.93668L7.73108 8.53668C7.52781 8.43505 7.39941 8.22729 7.39941 8.00002V3.80002C7.39941 3.46865 7.66804 3.20002 7.99941 3.20002Z"
                                                                                                fill="currentColor" />
                                                                                        </svg>
                                                                                        {{\Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}
                                                                                    </li>
                                                                                    <li>
                                                                                        <svg width="16"
                                                                                            height="16"
                                                                                            viewBox="0 0 16 16"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                fill-rule="evenodd"
                                                                                                clip-rule="evenodd"
                                                                                                d="M0.399414 1.00002C0.399414 0.668653 0.668044 0.400024 0.999414 0.400024H8.30189C8.46104 0.400024 8.61368 0.46326 8.72621 0.575815L15.0003 6.85154C15.384 7.23769 15.5994 7.76 15.5994 8.30441C15.5994 8.84881 15.384 9.37113 15.0003 9.75727L14.999 9.75853L9.76339 14.9955C9.57204 15.1871 9.34479 15.3392 9.09464 15.4429C8.84448 15.5466 8.57634 15.6 8.30554 15.6C8.03474 15.6 7.76659 15.5466 7.51644 15.4429C7.26649 15.3392 7.03941 15.1874 6.84815 14.996C6.8483 14.9961 6.84799 14.9958 6.84815 14.996L0.575342 8.72886C0.462703 8.61633 0.399414 8.46363 0.399414 8.30441V1.00002ZM1.59941 1.60002V8.05572L7.69631 14.1471C7.77623 14.2271 7.87162 14.2911 7.97607 14.3344C8.08052 14.3777 8.19247 14.4 8.30554 14.4C8.4186 14.4 8.53056 14.3777 8.635 14.3344C8.73945 14.2911 8.83436 14.2276 8.91428 14.1476L14.1491 8.91138C14.1493 8.91119 14.1489 8.91157 14.1491 8.91138C14.309 8.75015 14.3994 8.53162 14.3994 8.30441C14.3994 8.0772 14.3096 7.85924 14.1497 7.69801C14.1499 7.6982 14.1495 7.69782 14.1497 7.69801L8.05331 1.60002H1.59941ZM4.05065 4.65222C4.05065 4.32084 4.31928 4.05222 4.65065 4.05222H4.65795C4.98932 4.05222 5.25795 4.32084 5.25795 4.65222C5.25795 4.98359 4.98932 5.25222 4.65795 5.25222H4.65065C4.31928 5.25222 4.05065 4.98359 4.05065 4.65222Z"
                                                                                                fill="currentColor" />
                                                                                        </svg>
                                                                                        <a
                                                                                            href="{{route('product.show',optional($item->product)->id)}}">{{optional($item->product)->name }}</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <svg width="16"
                                                                                            height="12"
                                                                                            viewBox="0 0 16 12"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                fill-rule="evenodd"
                                                                                                clip-rule="evenodd"
                                                                                                d="M1.68652 6.00002C1.75679 6.11959 1.85087 6.27339 1.96807 6.45162C2.26198 6.89859 2.69741 7.49325 3.26297 8.08573C4.40426 9.28133 6.00763 10.4 7.99941 10.4C9.9912 10.4 11.5946 9.28133 12.7358 8.08573C13.3014 7.49325 13.7368 6.89859 14.0307 6.45162C14.1479 6.27339 14.242 6.11959 14.3123 6.00002C14.242 5.88045 14.1479 5.72666 14.0307 5.54843C13.7368 5.10146 13.3014 4.5068 12.7358 3.91431C11.5946 2.71868 9.9912 1.60002 7.99941 1.60002C6.00763 1.60002 4.40426 2.71868 3.26297 3.91431C2.69741 4.5068 2.26198 5.10146 1.96807 5.54843C1.85087 5.72666 1.75679 5.88045 1.68652 6.00002ZM14.9994 6.00002C15.5341 5.72781 15.534 5.72761 15.5339 5.72739L15.5329 5.72542L15.5307 5.7212L15.5235 5.70742C15.5175 5.6959 15.509 5.67975 15.4979 5.65928C15.4759 5.61834 15.4438 5.56009 15.402 5.48699C15.3183 5.34086 15.195 5.13494 15.0334 4.88912C14.7108 4.39859 14.2315 3.74325 13.6039 3.08574C12.3588 1.78137 10.4622 0.400024 7.99941 0.400024C5.53665 0.400024 3.64002 1.78137 2.39494 3.08574C1.76732 3.74325 1.28798 4.39859 0.96542 4.88912C0.803772 5.13494 0.680525 5.34086 0.596835 5.48699C0.554968 5.56009 0.522933 5.61834 0.500878 5.65928C0.489848 5.67975 0.481309 5.6959 0.475277 5.70742L0.468111 5.7212L0.465942 5.72542L0.465211 5.72684C0.465097 5.72706 0.464716 5.72781 0.999414 6.00002L0.464716 5.72781C0.377647 5.89884 0.377647 6.1012 0.464716 6.27223L0.999414 6.00002C0.464716 6.27223 0.464602 6.27201 0.464716 6.27223L0.465211 6.2732L0.465942 6.27463L0.468111 6.27885L0.475277 6.29263C0.481309 6.30415 0.489848 6.3203 0.500878 6.34077C0.522933 6.3817 0.554968 6.43996 0.596835 6.51306C0.680525 6.65919 0.803772 6.86511 0.96542 7.11093C1.28798 7.60146 1.76732 8.25683 2.39494 8.91433C3.64002 10.2186 5.53665 11.6 7.99941 11.6C10.4622 11.6 12.3588 10.2186 13.6039 8.91433C14.2315 8.25683 14.7108 7.60146 15.0334 7.11093C15.195 6.86511 15.3183 6.65919 15.402 6.51306C15.4438 6.43996 15.4759 6.3817 15.4979 6.34077C15.509 6.3203 15.5175 6.30415 15.5235 6.29263L15.5307 6.27885L15.5329 6.27463L15.5336 6.2732C15.5337 6.27298 15.5341 6.27223 14.9994 6.00002ZM14.9994 6.00002L15.5341 6.27223C15.6212 6.1012 15.621 5.89842 15.5339 5.72739L14.9994 6.00002ZM7.99941 4.72502C7.26618 4.72502 6.69032 5.30601 6.69032 6.00002C6.69032 6.69404 7.26618 7.27502 7.99941 7.27502C8.73264 7.27502 9.3085 6.69404 9.3085 6.00002C9.3085 5.30601 8.73264 4.72502 7.99941 4.72502ZM5.49032 6.00002C5.49032 4.62297 6.62392 3.52502 7.99941 3.52502C9.37491 3.52502 10.5085 4.62297 10.5085 6.00002C10.5085 7.37707 9.37491 8.47503 7.99941 8.47503C6.62392 8.47503 5.49032 7.37707 5.49032 6.00002Z"
                                                                                                fill="currentColor" />
                                                                                        </svg>
                                                                                      
                                                                                    </li>
                                                                                </ul>
                                                                                <div class="rtcl-listable">
                                                                                    <div
                                                                                        class="rtcl-listable-item">
                                                                                        <span
                                                                                            class="listable-label">Status</span>
                                                                                        <span
                                                                                            class="listable-value">
                                                                                            {{$item->order->order_status}}
                                                                                        </span>
                                                                                    </div>

                                                                                    <div
                                                                                        class="rtcl-listable-item">
                                                                                        <span
                                                                                            class="listable-label">Expires
                                                                                            on</span>
                                                                                        <span
                                                                                            class="listable-value">Never
                                                                                            Expires</span>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <span
                                                                                class="rtcl-my-listings-table-toggle-info">
                                                                                <span
                                                                                    class="rtcl-icon rtcl-icon-angle-down"></span>
                                                                            </span>
                                                                        </td>
                                                                        <td class="price-cell list-on-responsive"
                                                                            data-column="Price:">
                                                                            <div
                                                                                class="rtcl-price price-type-negotiable">
                                                                                <span
                                                                                    class="rtcl-price-amount amount">{{optional($item->order)->total}}<span
                                                                                        class="rtcl-price-currencySymbol">&#x62f;.&#x643;</span></span>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                     @endforeach

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- pagination here -->
                                                            <nav aria-label="Page navigation"
                                                                class="rtcl-global-pagination-wrap"
                                                                role="navigation">
                                                                <ul class="rtcl-pagination">

                                                                 @foreach ($order->getUrlRange(1, $order->lastPage()) as $page => $url)
                                                                    <li class="page-item {{ $page == $order->currentPage() ? 'active' : '' }}">
                                                                        <a href="{{$url}}"
                                                                            class="page-link">
                                                                            <span class="sr-only">Current
                                                                                Page</span>{{$page}}</a>
                                                                    </li>
                                                                @endforeach



                                                                </ul>
                                                            </nav>

                                                        </div>
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
