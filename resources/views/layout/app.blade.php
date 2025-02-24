<!DOCTYPE html>
<html lang="{{app()->getLocale() === 'ar' ? 'ar' : 'en'}}" dir="{{app()->getLocale() === 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="./xmlrpc.php">
	<title>Horse Station</title>
	<meta name="robots" content="max-image-preview:large">
	<noscript>
		<style>
			#preloader {
				display: none;
			}
		</style>
	</noscript>
	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    @include('layout.head')

    @yield('css')
</head>
<body class="@yield('body_class')">
    <div id="page" class="hfeed site">
        @include('layout.nav')
        @yield('content')
        @include('layout.footer')
    </div>
	<a href="#" class="scrollToTop"><i class="fa fa-angle-double-up"></i></a>

    @include('layout.scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>



    @yield('script')
</body>

</html>
