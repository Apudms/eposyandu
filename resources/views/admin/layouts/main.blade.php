<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Posyandu | Dashboard</title>

	<!-- Favicon -->
	<link href="https://pkk.kampung-purworejo.com/asset/images/favicon1.png" rel="shortcut icon">

	@include('admin.partials.stylesheet')
  @yield('cssOpsi')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    @include('admin.partials.preloader')

    @include('admin.partials.navbar')

    @include('admin.partials.sidebar')

    @yield('container')

    @include('admin.partials.footer')

    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>

	@include('admin.partials.javascript')
  @yield('jsOpsi')

</body>

</html>