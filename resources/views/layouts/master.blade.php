<!DOCTYPE html>
<html lang="en">
<head>
	@include('includes.head')
	@yield('style')
</head>
<body>
	@include('includes.navbar')
	@yield('content')
	@yield('script')
</body>
</html>