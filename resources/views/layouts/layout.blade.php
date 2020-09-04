<!DOCTYPE html>
<html lang="en">
<head>
	<script src="{{asset('js/scrollreveal.min.js')}}"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

	<link rel="stylesheet" href="{{asset('css/app.min.css')}}">
	<title>🥇 Kubo store</title>
	<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
	<meta id="csrf_token" name="csrf-token" content="{{ csrf_token() }}">

</head>
@auth
<body ng-app="myApp" >
@else
<body class="login" >
@endauth
	<div id="app">
		@auth
			<input type="hidden" id="codUser" value="{{Auth::user()->id}}">
		@endauth
		@include('layouts.navbar')
		<section>
		   @yield('bodyApp')
		</section>
		
	</div>

	<script src="{{asset('js/popper.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>

		 <script>
          window.Laravel = <?php echo json_encode([
              'csrfToken' => csrf_token(),
          ]); ?>
        </script>

	<script src="{{asset('js/app.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>

</body>
</html>