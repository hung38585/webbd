<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Icon web -->
	<link rel="shortcut icon" href="{{asset('images/sam.jpg')}}">
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('usertemplate/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('usertemplate/css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('usertemplate/css/bootstrap.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('usertemplate/css/magnific-popup.css')}}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{asset('usertemplate/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('usertemplate/css/owl.theme.default.min.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('usertemplate/css/style.css')}}">

	<!-- Modernizr JS -->
	<script src="{{asset('usertemplate/js/modernizr-2.6.2.min.js')}}"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body id="bodycontent">
    <div class="fh5co-loader"></div>
	<div id="page">
		@include('client.shared.header')
		@yield('content')
		@include('client.shared.footer')
	</div>
    <div class="area-fixed">
		<!-- <a href="/" class="icon-fixed"><i class="fab fa-facebook-messenger"></i></a> -->
		<a href="{{ $infomation->facebook }}" target="_blank" class="icon-fixed"><i class="fab fa-facebook-square"></i></a>
    </div>    
    <div class="gototop js-top">
		<a href="#" class="js-gotop icon-fixed"><i class="icon-arrow-up"></i></a>
	</div>
</body> 
  <!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<!-- <script>
	window.fbAsyncInit = function() {
		FB.init({
			xfbml            : true,
			version          : 'v7.0'
		});
	};

	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script> -->
<!-- Your Chat Plugin code -->
<!-- <div class="fb-customerchat" attribution=setup_tool page_id="321356911300649" theme_color="#13cf13"></div> -->
<!-- jQuery -->
<script src="{{asset('usertemplate/js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('usertemplate/js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('usertemplate/js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('usertemplate/js/jquery.waypoints.min.js')}}"></script>
<!-- Carousel -->
<script src="{{asset('usertemplate/js/owl.carousel.min.js')}}"></script>
<!-- countTo -->
<script src="{{asset('usertemplate/js/jquery.countTo.js')}}"></script>

<!-- Stellar -->
<script src="{{asset('usertemplate/js/jquery.stellar.min.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('usertemplate/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('usertemplate/js/magnific-popup-options.js')}}"></script>

<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
<script src="{{asset('usertemplate/js/simplyCountdown.js')}}"></script>
<!-- Main -->
<script src="{{asset('usertemplate/js/main.js')}}"></script>

<script>
	var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

	// default example
	simplyCountdown('.simply-countdown-one', {
		year: d.getFullYear(),
		month: d.getMonth() + 1,
		day: d.getDate()
	});

	//jQuery example
	$('#simply-countdown-losange').simplyCountdown({
		year: d.getFullYear(),
		month: d.getMonth() + 1,
		day: d.getDate(),
		enableUtc: false
	});
	function changeLanguage(e) {
		if (e.value !== '') {
			window.location = '/change-language/' + e.value;
		}
	}
	window.onload = function() {
	@if(Session::has('website_language'))
		$('.change-language').val('{{ Session::get('website_language')}}');
	@endif
	};
</script>
</html>