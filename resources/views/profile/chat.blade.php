@extends('layout.app')
@section('body_class','page-template-default page page-id-8 logged-in admin-bar no-customize-support wp-custom-logo rtcl-account rtcl-page rtcl-no-js ehf-header ehf-footer ehf-template-classima ehf-stylesheet-classima header-style-2 footer-style-1 banner-enabled has-sidebar left-sidebar elementor-default elementor-kit-2161 elementor-page elementor-page-8')
@section('css')
<style>
    
.chat-online {
    color: #34ce57
}

.chat-offline {
    color: #e4606d
}

.chat-messages {
    display: flex;
    flex-direction: column;
    max-height: 800px;
    overflow-y: scroll
}

.chat-message-left,
.chat-message-right {
    display: flex;
    flex-shrink: 0
}

.chat-message-left {
    margin-right: auto
}

.chat-message-right {
    flex-direction: row-reverse;
    margin-left: auto
}
.py-3 {
    padding-top: 1rem!important;
    padding-bottom: 1rem!important;
}
.px-4 {
    padding-right: 1.5rem!important;
    padding-left: 1.5rem!important;
}
.flex-grow-0 {
    flex-grow: 0!important;
}
.border-top {
    border-top: 1px solid #dee2e6!important;
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
                                                        <h3>My Account</h3>
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
                                                                    href="{{route('profile.main')}}">Dashboard</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--listings">
                                                                <a
                                                                    href="{{route('profile.listing')}}">My
                                                                    Listings</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--favourites">
                                                                <a
                                                                    href="{{route('profile.favourite')}}">Favourites</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--chat is-active rtcl-chat-unread-count">
                                                                <a
                                                                    href="{{route('profile.chat')}}">Chat</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--payments">
                                                                <a
                                                                    href="{{route('profile.payment')}}">Payments</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--edit-account">
                                                                <a
                                                                    href="{{route('profile.payment')}}">Account
                                                                    Details</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--logout">
                                                                <a
                                                                    href="{{route('logout')}}">Logout</a>
                                                            </li>
                                                        </ul>
                                                    </nav>

                                                </div>
                                                <div class="rtcl-MyAccount-wrap">

                                                    <nav class="rtcl-MyAccount-navigation">
                                                        <h3>My Account</h3>
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
                                                                    href="{{route('profile.main')}}">Dashboard</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--listings">
                                                                <a
                                                                    href="{{route('profile.listing')}}">My
                                                                    Listings</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--favourites">
                                                                <a
                                                                    href="{{route('profile.favourite')}}">Favourites</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--chat is-active rtcl-chat-unread-count">
                                                                <a
                                                                    href="{{route('profile.chat')}}">Chat</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--payments">
                                                                <a
                                                                    href="{{route('profile.payment')}}">Payments</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--edit-account">
                                                                <a
                                                                    href="{{route('profile.payment')}}">Account
                                                                    Details</a>
                                                            </li>
                                                            <li
                                                                class="rtcl-MyAccount-navigation-link rtcl-MyAccount-navigation-link--logout">
                                                                <a
                                                                    href="{{route('logout')}}">Logout</a>
                                                            </li>
                                                        </ul>
                                                    </nav>


                                                    <div class="rtcl-MyAccount-content">
                                                        <div class="rtcl-chat-content-wrapper">
                                                            <div id="rtcl-user-chat-wrap"></div>
                                                            <div class="container p-4">

                                                                <h1 class="h3 mb-3">@lang('lang.chat')</h1>
                                                        
                                                                <div class="card">
                                                                    <div class="row g-0">
                                                                        <div class="col-12 col-lg-5 col-xl-3 border-right">
                                                        
                                                                            <div class="px-4 d-none d-md-block">
                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="flex-grow-1">
                                                                                        <input type="text" class="form-control my-3" placeholder="Search...">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                        
                                                                           
                                                                            @foreach ($chats as $chat )
                                                                            @if($chat->user_to_id == auth()->user()->id)
                                                                            <a href="{{route('chats',$chat->id)}}" class="list-group-item list-group-item-action border-0">
                                                                                <div class="d-flex align-items-start">
                                                                                    <img src="
                                                                                    @if ($chat->user->image == null)
                                                                                    https://admin.alfuraij.com/assets/images/default.jpg
                                                                                    @else
                                                                                    https://admin.alfuraij.com/uploads/users/{{$chat->user->image}}
                                                                                    @endif
                                                                                    " class="rounded-circle mr-1" alt="Jennifer Chang" width="40" height="40">
                                                                                    <div class="flex-grow-1 ml-3">
                                                                                        {{$chat->user->name}}
                                                                                        {{-- <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div> --}}
                                                                                    </div>
                                                                                </div>
                                                                            </a>   
                                                                            @elseif ($chat->user_id == auth()->user()->id)
                                                                            <a href="{{route('chats',$chat->id)}}" class="list-group-item list-group-item-action border-0">
                                                                                <div class="d-flex align-items-start">
                                                                                    <img src="
                                                                                    @if ($chat->reciver->image == null)
                                                                                    https://admin.alfuraij.com/assets/images/default.jpg
                                                                                    @else
                                                                                    https://admin.alfuraij.com/uploads/users/{{$chat->reciver->image}}
                                                                                    @endif
                                                                                    " class="rounded-circle mr-1" alt="Jennifer Chang" width="40" height="40">
                                                                                    <div class="flex-grow-1 ml-3">
                                                                                        {{$chat->reciver->name}}
                                                                                        {{-- <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div> --}}
                                                                                    </div>
                                                                                </div>
                                                                            </a>   
                                                                            @endif
                                                                            
                                                                            @endforeach
                                                                           
                                                        
                                                                            <hr class="d-block d-lg-none mt-1 mb-0">
                                                                        </div>
                                                                        <div class="col-12 col-lg-7 col-xl-9">
                                                                            {{-- <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                                                                <div class="d-flex align-items-center py-1">
                                                                                    <div class="position-relative">
                                                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                                                    </div>
                                                                                    <div class="flex-grow-1 pl-3">
                                                                                        <strong>Sharon Lessman</strong>
                                                                                        <div class="text-muted small"><em>Typing...</em></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div> --}}
                                                        
                                                                            <div class="position-relative">
                                                                                {{-- <div class="chat-messages p-4">
                                                        
                                                                                    <div class="chat-message-right pb-4">
                                                                                        <div>
                                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                                                            <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                                                                                        </div>
                                                                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                                                            <div class="font-weight-bold mb-1">You</div>
                                                                                            Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                                                                                        </div>
                                                                                    </div>
                                                        
                                                                                    <div class="chat-message-left pb-4">
                                                                                        <div>
                                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                                                            <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                                                                        </div>
                                                                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                                                            <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                                                                            Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                                                                                        </div>
                                                                                    </div>
                                                        
                                                                                    <div class="chat-message-right mb-4">
                                                                                        <div>
                                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                                                            <div class="text-muted small text-nowrap mt-2">2:35 am</div>
                                                                                        </div>
                                                                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                                                            <div class="font-weight-bold mb-1">You</div>
                                                                                            Cum ea graeci tractatos.
                                                                                        </div>
                                                                                    </div>
                                                        
                                                                                    <div class="chat-message-left pb-4">
                                                                                        <div>
                                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                                                            <div class="text-muted small text-nowrap mt-2">2:36 am</div>
                                                                                        </div>
                                                                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                                                            <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                                                                            Sed pulvinar, massa vitae interdum pulvinar, risus lectus porttitor magna, vitae commodo lectus mauris et velit.
                                                                                            Proin ultricies placerat imperdiet. Morbi varius quam ac venenatis tempus.
                                                                                        </div>
                                                                                    </div>
                                                        
                                                                                    <div class="chat-message-left pb-4">
                                                                                        <div>
                                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                                                            <div class="text-muted small text-nowrap mt-2">2:37 am</div>
                                                                                        </div>
                                                                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                                                            <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                                                                            Cras pulvinar, sapien id vehicula aliquet, diam velit elementum orci.
                                                                                        </div>
                                                                                    </div>
                                                        
                                                                                    <div class="chat-message-right mb-4">
                                                                                        <div>
                                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                                                            <div class="text-muted small text-nowrap mt-2">2:38 am</div>
                                                                                        </div>
                                                                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                                                            <div class="font-weight-bold mb-1">You</div>
                                                                                            Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                                                                                        </div>
                                                                                    </div>
                                                        
                                                                                    <div class="chat-message-left pb-4">
                                                                                        <div>
                                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                                                            <div class="text-muted small text-nowrap mt-2">2:39 am</div>
                                                                                        </div>
                                                                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                                                            <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                                                                            Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                                                                                        </div>
                                                                                    </div>
                                                        
                                                                                    <div class="chat-message-right mb-4">
                                                                                        <div>
                                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                                                            <div class="text-muted small text-nowrap mt-2">2:40 am</div>
                                                                                        </div>
                                                                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                                                            <div class="font-weight-bold mb-1">You</div>
                                                                                            Cum ea graeci tractatos.
                                                                                        </div>
                                                                                    </div>
                                                        
                                                                                    <div class="chat-message-right mb-4">
                                                                                        <div>
                                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                                                            <div class="text-muted small text-nowrap mt-2">2:41 am</div>
                                                                                        </div>
                                                                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                                                            <div class="font-weight-bold mb-1">You</div>
                                                                                            Morbi finibus, lorem id placerat ullamcorper, nunc enim ultrices massa, id dignissim metus urna eget purus.
                                                                                        </div>
                                                                                    </div>
                                                        
                                                                                    <div class="chat-message-left pb-4">
                                                                                        <div>
                                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                                                            <div class="text-muted small text-nowrap mt-2">2:42 am</div>
                                                                                        </div>
                                                                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                                                            <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                                                                            Sed pulvinar, massa vitae interdum pulvinar, risus lectus porttitor magna, vitae commodo lectus mauris et velit.
                                                                                            Proin ultricies placerat imperdiet. Morbi varius quam ac venenatis tempus.
                                                                                        </div>
                                                                                    </div>
                                                        
                                                                                    <div class="chat-message-right mb-4">
                                                                                        <div>
                                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                                                            <div class="text-muted small text-nowrap mt-2">2:43 am</div>
                                                                                        </div>
                                                                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                                                            <div class="font-weight-bold mb-1">You</div>
                                                                                            Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                                                                                        </div>
                                                                                    </div>
                                                        
                                                                                    <div class="chat-message-left pb-4">
                                                                                        <div>
                                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                                                            <div class="text-muted small text-nowrap mt-2">2:44 am</div>
                                                                                        </div>
                                                                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                                                            <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                                                                            Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                                                                                        </div>
                                                                                    </div>
                                                        
                                                                                </div> --}}
                                                                               @lang('lang.select_conversetion')
                                                                        
                                                                            
                                                                            </div>
                                                        
                                                                            {{-- <div class="flex-grow-0 py-3 px-4 border-top">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control" placeholder="Type your message">
                                                                                    <button class="btn btn-primary">Send</button>
                                                                                </div>
                                                                            </div> --}}
                                                        
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