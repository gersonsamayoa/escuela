<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>@yield ('title', 'Home') | Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"}}">
	<link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

</head>
<body>
@include('admin.partials.nav')
	<div class="container">
	<h2>@yield('title')</h2>
	<h2>@yield('subtitle')</h2>
	</div>

<section class="container">
	@yield('content')
</section>

<script src="{{asset ('plugins/jquery/jquery.js')}}"></script>
<script src="{{asset ('plugins/jquery/dropdown.js')}}"></script>
<script src="{{asset ('plugins/bootstrap/js/bootstrap.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js" type="text/javascript"></script>

@yield('scripts')

</body>

<footer>
<p class="text-center">&copy; 2019 Sistema Realizado por <a href="#">Tech-Tools </a>.<br>gersonsamayoa@gmail.com</p>
</footer>
</html>
