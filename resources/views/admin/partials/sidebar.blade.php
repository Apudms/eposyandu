<aside class="main-sidebar sidebar-dark-white elevation-4">
  <a href="/administrator" class="brand-link">
    <img src="https://pkk.kampung-purworejo.com/asset/images/favicon1.png" alt="logo" class="brand-image img-circle"
      style="opacity: .9">
    <span class="brand-text font-weight-light">ePosyandu</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <span class="h5 text-white">{{ Auth::user()->name }}</span>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        @if(Auth::user()->role == 'admin')
        <li class="nav-item">
          <a href="#" class="nav-link {{ Request::is('admin/anak*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Posyandu
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/anak" class="nav-link {{ Request::is('admin/anak*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/imunisasi" class="nav-link {{ Request::is('admin/imunisasi*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Imunisasi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/ibu-hamil" class="nav-link {{ Request::is('admin/ibu-hamil*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Ibu Hamil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/peserta-kb" class="nav-link {{ Request::is('admin/peserta-kb*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Peserta KB</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/kontrasepsi" class="nav-link {{ Request::is('admin/kontrasepsi*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kontrasepsi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/dusun" class="nav-link {{ Request::is('admin/dusun*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Dusun</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/kader" class="nav-link {{ Request::is('admin/kader*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kader</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/post" class="nav-link {{ Request::is('admin/post*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Post</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">PENGATURAN</li>
        <li class="nav-item">
          <a href="/admin/data-admin" class="nav-link {{ Request::is('admin/data-admin*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>Akun</p>
          </a>
        </li>
        @elseif(Auth::user()->role == 'kaderanak')
        <li class="nav-item">
          <a href="#" class="nav-link {{ Request::is('admin/anak*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Posyandu
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/anak" class="nav-link {{ Request::is('admin/anak*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak</p>
              </a>
            </li>
          </ul>
        </li>
        @elseif(Auth::user()->role == 'kaderibuhamil')
        <li class="nav-item">
          <a href="#" class="nav-link {{ Request::is('admin/anak*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Posyandu
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/ibu-hamil" class="nav-link {{ Request::is('admin/ibu-hamil*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Ibu Hamil</p>
              </a>
            </li>
          </ul>
        </li>
        @else
        <li class="nav-item">
          <a href="#" class="nav-link {{ Request::is('admin/anak*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Posyandu
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/peserta-kb" class="nav-link {{ Request::is('admin/peserta-kb*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Peserta KB</p>
              </a>
            </li>
          </ul>
        </li>
        @endif


        {{-- <li class="nav-item">
          <a href="#" class="nav-link {{ Request::is('admin/anak*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Posyandu
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/anak" class="nav-link {{ Request::is('admin/anak*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/imunisasi" class="nav-link {{ Request::is('admin/imunisasi*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Imunisasi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/ibu-hamil" class="nav-link {{ Request::is('admin/ibu-hamil*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Ibu Hamil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/peserta-kb" class="nav-link {{ Request::is('admin/peserta-kb*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Peserta KB</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/kontrasepsi" class="nav-link {{ Request::is('admin/kontrasepsi*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kontrasepsi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/dusun" class="nav-link {{ Request::is('admin/dusun*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Dusun</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/kader" class="nav-link {{ Request::is('admin/kader*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kader</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">PENGATURAN</li>
        <li class="nav-item">
          <a href="" class="nav-link {{ Request::is('admin/admin*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>Akun</p>
          </a>
        </li> --}}

      </ul>
    </nav>
  </div>
</aside>

