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
                                                        
                                                                            {{-- <div class="px-4 d-none d-md-block">
                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="flex-grow-1">
                                                                                        <input type="text" class="form-control my-3" placeholder="Search...">
                                                                                    </div>
                                                                                </div>
                                                                            </div> --}}
                                                        
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
                                                                            @if ($mainChat->user_id == auth()->user()->id)
                                                                            <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                                                                <div class="d-flex align-items-center py-1">
                                                                                    <div class="position-relative">
                                                                                        <img src="
                                                                                        @if ($mainChat->user->image == null)
                                                                                        https://admin.alfuraij.com/assets/images/default.jpg
                                                                                        @else
                                                                                        https://admin.alfuraij.com/uploads/users/{{$mainChat->user->image}}
                                                                                        @endif
                                                                                        " class="rounded-circle mr-1" alt="Jennifer Chang" width="40" height="40">
                                                                                    </div>
                                                                                    <div class="flex-grow-1 pl-3">
                                                                                        <strong>{{$mainChat->reciver->name}}</strong>
                                                                                        {{-- <div class="text-muted small"><em>Typing...</em></div> --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>    
                                                                            @else
                                                                            <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                                                                <div class="d-flex align-items-center py-1">
                                                                                    <div class="position-relative">
                                                                                        <img src="
                                                                                        @if ($mainChat->user->image == null)
                                                                                        https://admin.alfuraij.com/assets/images/default.jpg
                                                                                        @else
                                                                                        https://admin.alfuraij.com/uploads/users/{{$mainChat->user->image}}
                                                                                        @endif
                                                                                        " class="rounded-circle mr-1" alt="Jennifer Chang" width="40" height="40">
                                                                                    </div>
                                                                                    <div class="flex-grow-1 pl-3">
                                                                                        <strong>{{$mainChat->user->name}}</strong>
                                                                                        {{-- <div class="text-muted small"><em>Typing...</em></div> --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>    

                                                                            @endif
                                                                            
                                                        
                                                                            <div class="position-relative">
                                                                                <div class="chat-messages p-4"  id="chat-content">
                                                                                    @foreach ($messages as $message )
                                                                                    @if ($message->sender_id == auth()->user()->id)
                                                                                        <div class="chat-message-right pb-4">
                                                                                            <div>
                                                                                                <img src="
                                                                                                @if ($message->sender->image == null)
                                                                                                https://admin.alfuraij.com/assets/images/default.jpg
                                                                                                @else
                                                                                                https://admin.alfuraij.com/uploads/users/{{$message->sender->image}}
                                                                                                @endif
                                                                                                
                                                                                                "
                                                                                                 class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                                                                <div class="text-muted small text-nowrap mt-2">{{\Carbon\Carbon::parse($message->created_at)->format('g:i a')}}</div>
                                                                                            </div>
                                                                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                                                                <div class="font-weight-bold mb-1">You</div>
                                                                                                {{$message->message}}
                                                                                            </div>
                                                                                        </div>    
                                                                                    @else
                                                                                 
                                                                                    <div class="chat-message-left pb-4">
                                                                                        <div>
                                                                                            <img src="
                                                                                            @if ($message->sender->image == null)
                                                                                            https://admin.alfuraij.com/assets/images/default.jpg
                                                                                            @else
                                                                                            https://admin.alfuraij.com/uploads/users/{{$message->sender->image}}
                                                                                            @endif
                                                                                            
                                                                                            "
                                                                                             class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                                                            <div class="text-muted small text-nowrap mt-2">{{\Carbon\Carbon::parse($message->created_at)->format('g:i a')}}</div>
                                                                                        </div>
                                                                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                                                            <div class="font-weight-bold mb-1">You</div>
                                                                                            {{$message->message}}
                                                                                        </div>
                                                                                    </div>    
                                                                
                                                                                    @endif                                                        
                                                                                    
                                                                                    @endforeach
                                                                                
                                                                                    
                                                                                </div>
                                                                           
                                                                            
                                                                            </div>
                                                                            <form id="message-chat"  method="POST">
                                                                                <div class="flex-grow-0 py-3 px-4 border-top">
                                                                                    <div class="input-group">
                                                                                        <input type="hidden" name="chat_id" value="{{$mainChat->id}}" id="chat-id">
                                                                                        <input type="hidden" name="sender_id" value="{{auth()->user()->id}}" id="sender-id">
                                                                                        <input type="text" id="message" name="message" class="form-control" placeholder="Type your message">
                                                                                        <button id="send" class="btn btn-primary">Send</button>
                                                                                    </div>
                                                                                </div>
                                                                                @csrf
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
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    let chatId = $("#chat-id").val()
    let senderId = $("#sender-id").val()

     $(document).ready(function(){
      $("#message-chat").submit(function(e){
        e.preventDefault()
        $("#send").html('<i class="fa fa-spinner fa-spin"></i>').prop('disabled', true);

        let message = $("#message").val();
        // prepare data 
        // var form_data = new FormData()
        // form_data.append('message',message)
        // form_data.append('chat_id',chatId)
        // form_data.append('sender_id',senderId)




        $.ajax({
                url:'{{route('send-message')}}',
                header:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type:'POST',
                data:new FormData(this),
                processData:false,
                contentType:false,
                success:function(data){
                  console.log(data);
                    // if(data.status === true){
                    //   let senderMessage=''+`
                    //       <div class="media w-50 reverse mb-3">
                    //         <div class="media-body">
                    //           <div class="bg-primary rounded py-2 px-3 mb-2">
                    //             <p class="text-small mb-0 text-white">${data.data.message}</p>
                    //           </div>
                    //           <p class="small text-muted">${data.data.time}</p>
                    //         </div>
                    //       </div>               
                    //     `;
                        scrollToBottom()
                        // $("#chat-content").append(senderMessage)  
                        $("#message").val('')  
                        $("#send").html('<i class="fa fa-paper-plane"></i>').prop('disabled', false);

                    // }
                        
                        
                      
                },
                error:function(data)
                {
                  console.log(data);                    
                }

            });
      });
  });

  function scrollToBottom() {
      var chatContainer = document.getElementById('chat-content');
      chatContainer.scrollTop = chatContainer.scrollHeight;
  }

    Pusher.logToConsole = true;
    var pusher = new Pusher('320341d0c095a088f06b', {
      cluster: 'ap1'
    });
    var channel = pusher.subscribe(`chat.${chatId}`);
    channel.bind('chat.message', function(data) {
        console.log(data);
        console.log(senderId);
        //  toastr.info('New Advertisment Added', 'info');
        if(data.message.sender_id === senderId )
        {
            let senderMessage=''+`  
        <div class="chat-message-right pb-4">
            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                <div class="font-weight-bold mb-1">You</div>
                ${data.message.message}
            </div>
        </div> 
          `;
          $("#chat-content").append(senderMessage)
        }else{
            let senderMessage=''+`  
        <div class="chat-message-left pb-4">
            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                <div class="font-weight-bold mb-1">You</div>
                ${data.message.message}
            </div>
        </div> 
          `;
          $("#chat-content").append(senderMessage)
        }
        // console.log(senderMessage);
        
       
    });


   
</script>
@endsection