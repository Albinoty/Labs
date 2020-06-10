<!DOCTYPE html>
<html lang="en">
<head>
	<title>Labs - Design Studio</title>
	<meta charset="UTF-8">
	<meta name="description" content="Labs - Design Studio">
	<meta name="keywords" content="lab, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	{{-- <link href="img/favicon.ico" rel="shortcut icon"/> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader">
			<img src="{{isset($home) ? '/storage/'.$home->logo : '/img/logo.png'}}" alt="">
			<h2>Loading.....</h2>
		</div>
	</div>

	@yield('content')
	

		<!-- Footer section end -->

    <!--====== Javascripts & Jquery ======-->
    <script src="{{asset('js/app.js')}}"></script>
	
	</body>
</html>
