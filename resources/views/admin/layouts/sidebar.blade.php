<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="">Zahira Cell</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="">Zahira</a>
      </div>
      <ul class="sidebar-menu">
        {{-- dinamic active state untuk class active --}}
        <li class="@if (Request::segment(1) == 'admin' and Request::segment(2) == 'dashboard') active @endif">
          <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
        </li>
          <li class="menu-header">Menu</li>
          {{-- dinamic active state untuk class active --}}
          <li class="nav-item dropdown @if (Request::segment(1) == 'admin' and Request::segment(2) == 'produk') active @endif ">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-laptop"></i> <span>Produk</span></a>
            <ul class="dropdown-menu">
              {{-- dinamic active state untuk class active --}}
              <li class=" @if (Request::segment(1) == 'admin' and Request::segment(2) == 'produk' and Request::segment(3) == 'nomor') active @endif ">
                <a class="nav-link" href="{{ route('nomor.index') }}">Nomor Cantik</a>
              </li>
            </ul>
          </li>
          <li class="@if (Request::segment(2) == 'pelanggan') active @endif"><a class="nav-link" href="{{ route('pelanggan.index') }}"><i class="fas fa-users"></i> <span>Pelanggan</span></a></li>
          @can('akses_menu')
            <li class="@if (Request::segment(2) == 'toko') active @endif"><a class="nav-link" href="{{ route('toko.index') }}"><i class="fas fa-store"></i> <span>Informasi Toko</span></a></li>
            <li class="@if (Request::segment(2) == 'role') active @endif"><a class="nav-link" href="{{ route('role.index') }}"><i class="fas fa-user-tag"></i> <span>Role</span></a></li>
            <li class="@if (Request::segment(2) == 'user') active @endif"><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-user"></i> <span>User</span></a></li>
          @endcan
         
        </ul>
    </aside>
  </div>