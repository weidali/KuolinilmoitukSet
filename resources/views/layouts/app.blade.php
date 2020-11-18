<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<title>@yield('title-block')</title>

		<link rel="stylesheet" href="/css/app.css">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<body>
		
		<div class="wrapper">
			@include('inc.header')
			<div class="container">				
				<div class="row">
					<div class="col-12">
						@auth
							@include('inc.nav')
						@endauth
						
						@yield('content')
					</div>
					<div class="col-8">
						
					</div>
				</div>
			</div>
			@include('inc.footer')
		</div>
		

		
	</body>
</html>
