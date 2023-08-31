<!DOCTYPE html>
<html lang="en">

@include('public.partials.header')

<body>

	@include('public.partials.spinner')

	@include('public.partials.topbar')

	@include('public.partials.navbar')

	@yield('container')

	@include('public.partials.footer')

	<!-- Back to Top -->
	<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top">
		<i class="bi bi-arrow-up"></i>
	</a>

	@include('public.partials.javascript')
	@yield('diagram')

</body>

</html>