@php
    $server = $_SERVER['REQUEST_URI'];
    $type = explode("/", $_SERVER['REQUEST_URI']);
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/{{$type[1]}}" class="brand-link">
      <img src="../storage/{{ $identitas->favicon }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ $identitas->nama_web }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../storage/{{ Auth::user()->foto }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/{{$type[1]}}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>
      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="/{{$type[1]}}" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1]) {{ __('active') }} @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Beranda
                </p>
            </a>
            </li>
            <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/post') {{ __('menu-open') }} @elseif($_SERVER['REQUEST_URI'] == '/'.$type[1].'/kategori') {{ __('menu-open') }} @elseif($_SERVER['REQUEST_URI'] == '/'.$type[1].'/tag') {{ __('menu-open') }} @endif">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                Post
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/{{$type[1]}}/post" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/post') {{ __('active') }} @elseif($_SERVER['REQUEST_URI'] == '/publishing/post') {{ __('active') }} @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Post</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="/{{$type[1]}}/kategori" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/kategori') {{ __('active') }} @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="/{{$type[1]}}/tag" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/tag') {{ __('active') }} @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tag/Label</p>
                </a>
                </li>
            </ul>
            <li class="nav-item">
            <a href="/{{$type[1]}}/halamanstatis" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/halamanstatis') {{ __('active') }} @endif">
                <i class="nav-icon fas fa-table"></i>
                <p>
                Halaman Statis
                </p>
            </a>
            </li>
            @if(Auth::user()->level == 'Admin')
            <li class="nav-item">
            <a href="/{{$type[1]}}/profil_pimpinan" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/profil_pimpinan') {{ __('active') }} @endif">
                <i class="nav-icon fas fa-user"></i>
                <p>
                Profil Pimpinan
                </p>
            </a>
            </li>
            @endif
            <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/slider') {{ __('menu-open') }} @elseif($_SERVER['REQUEST_URI'] == '/'.$type[1].'/album') {{ __('menu-open') }} @elseif($_SERVER['REQUEST_URI'] == '/'.$type[1].'/galeri') {{ __('menu-open') }} @endif">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-bullhorn"></i>
                    <p>
                    Media
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="/{{$type[1]}}/slider" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/slider') {{ __('active') }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Slider</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="/{{$type[1]}}/album" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/album') {{ __('active') }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Album</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="/{{$type[1]}}/galeri" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/galeri') {{ __('active') }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Galeri</p>
                    </a>
                    </li>
                </ul>
            </li>
            @if(Auth::user()->level == 'Admin')
            <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/homeline') {{ __('menu-open') }} @elseif($_SERVER['REQUEST_URI'] == '/'.$type[1].'/intro') {{ __('menu-open') }} @elseif($_SERVER['REQUEST_URI'] == '/'.$type[1].'/alur') {{ __('menu-open') }} @elseif($_SERVER['REQUEST_URI'] == '/'.$type[1].'/testimoni') {{ __('menu-open') }} @endif">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-pager"></i>
                    <p>
                    Halaman Beranda
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/{{$type[1]}}/homeline" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/homeline') {{ __('active') }} @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fitur Beranda</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/{{$type[1]}}/intro" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/intro') {{ __('active') }} @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fitur Intro Beranda</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/{{$type[1]}}/alur" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/alur') {{ __('active') }} @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Alur Camp</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/{{$type[1]}}/testimoni" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/testimoni') {{ __('active') }} @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Testimoni</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/data_pendaftar') {{ __('menu-open') }} @elseif($_SERVER['REQUEST_URI'] == '/'.$type[1].'/paket') {{ __('menu-open') }} @elseif($_SERVER['REQUEST_URI'] == '/'.$type[1].'/cara_pendaftaran') {{ __('menu-open') }} @elseif($_SERVER['REQUEST_URI'] == '/'.$type[1].'/ask') {{ __('menu-open') }} @elseif($_SERVER['REQUEST_URI'] == '/'.$type[1].'/data_pendaftarkonfirmasi') {{ __('menu-open') }} @endif">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                    Pendaftaran
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/{{$type[1]}}/paket" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/paket') {{ __('active') }} @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Paket Kursus</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/{{$type[1]}}/cara_pendaftaran" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/cara_pendaftaran') {{ __('active') }} @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cara Pendaftaran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/{{$type[1]}}/ask" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/ask') {{ __('active') }} @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pertanyaan</p>
                        </a>
                    </li>
                    <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/data_pendaftar') {{ __('menu-open') }} @elseif($_SERVER['REQUEST_URI'] == '/'.$type[1].'/data_pendaftarkonfirmasi') {{ __('menu-open') }} @endif">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Data Pendaftar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/{{$type[1]}}/data_pendaftar" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/data_pendaftar') {{ __('active') }} @endif">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Data Pendaftar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/{{$type[1]}}/data_pendaftarkonfirmasi" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/data_pendaftarkonfirmasi') {{ __('active') }} @endif">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Data Terkonfirmasi</p>
                            </a>
                        </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="/{{$type[1]}}/agenda" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/agenda') {{ __('active') }} @endif">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>
                    Agenda
                    </p>
                </a>
            </li>
            <li class="nav-item">
            <a href="/{{$type[1]}}/menu" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/menu') {{ __('active') }} @endif">
                <i class="nav-icon fas fa-th-large"></i>
                <p>
                Menu
                </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="/{{$type[1]}}/pengguna" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/pengguna') {{ __('active') }} @endif">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Manajemen User
                </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="/{{$type[1]}}/pengaturan" class="nav-link @if($_SERVER['REQUEST_URI'] == '/'.$type[1].'/pengaturan') {{ __('active') }} @endif">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                Pengaturan
                </p>
            </a>
            </li>
            @endif
            <li class="nav-item">
            <form action="/logout" method="post" class="d-none" id="logout_form">@csrf</form>
            <a onclick="$('#logout_form').submit()" class="nav-link" role="button">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Keluar        
                </p>
            </a>
            </li>
        </ul>
        </nav>
    </div>
</aside>