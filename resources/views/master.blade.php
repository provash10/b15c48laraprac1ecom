<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lecom Website</title>
	{{-- css cut & paste includes folder for use all pages --}}
	{{-- for css  --}}
	@include('includes.style')
</head>
<body>

	{{-- for header  --}}
	@include('includes.header')

    {{-- @yield('content') --}}
    <main>
         @yield('content')
    </main>


	{{-- for footer  --}}
	@include('includes.footer')

    {{-- for js script  --}}
	@include('includes.script')
	
</body>
</html>