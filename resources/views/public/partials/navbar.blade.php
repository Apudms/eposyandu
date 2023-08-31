<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-3 py-3 py-lg-0">
  <a href="/" class="navbar-brand p-0">
    <h1 class="m-0 text-primary"><img src="https://pkk.kampung-purworejo.com/asset/logo/Lambang_Kabupaten_Lampung_Tengah2.png" style="width: 100px;height: 50px;">ePosyandu</h1>
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-0">
      <a href="{{ route('public.home') }}" class="nav-item nav-link {{ request()->routeIs('public.home') ? 'active' : '' }}">Halaman Utama</a>
      <a href="{{ route('public.about') }}" class="nav-item nav-link {{ request()->routeIs('public.about') ? 'active' : '' }}">Tentang</a>
      <a href="{{ route('public.petugas') }}" class="nav-item nav-link {{ request()->routeIs('public.petugas') ? 'active' : '' }}">Petugas</a>
      <div class="nav-item dropdown">
        <a href="" class="nav-link dropdown-toggle {{ request()->routeIs('public.data.anak') || request()->routeIs('public.data.ibuhamil') || request()->routeIs('public.data.pesertakb') ? 'active' : '' }}" data-bs-toggle="dropdown">Data Posyandu</a>
        <div class="dropdown-menu m-0">
          <a href="{{ route('public.data.anak') }}" class="dropdown-item {{ request()->routeIs('public.data.anak') ? 'active' : '' }}">Data Anak</a>
          <a href="{{ route('public.data.ibuhamil') }}" class="dropdown-item {{ request()->routeIs('public.data.ibuhamil') ? 'active' : '' }}">Data Ibu Hamil</a>
          <a href="{{ route('public.data.pesertakb') }}" class="dropdown-item {{ request()->routeIs('public.data.pesertakb') ? 'active' : '' }}">Data Peserta KB</a>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- Navbar End -->
