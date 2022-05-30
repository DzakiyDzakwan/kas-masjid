<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="http://localhost/kas_masjid/" class="brand-link">
    <img src="{{asset('dist/img/masjid.jpg')}}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light"> Masjid Darul Ilmi</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="http://localhost/kas_masjid/" class="d-block">
          {{auth()->user()->nama}}
        </a>
        <span class="badge badge-success">
          {{auth()->user()->level}}
        </span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Level  -->
        
        {{-- ADMIN --}}
        <li class="nav-item">
          <a href="/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <span class="badge badge-primary right">3 Info</span>
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bell"></i>
            <p>
              Kas Masjid
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if (auth()->user()->level !== 'user')
              <li class="nav-item">
                <a href="/masjid/masuk" class="nav-link">
                  <i class="nav-icon far fa-circle text-success"></i>
                  <p>Pemasukan Kas Masjid</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/masjid/keluar" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>Pengeluaran Kas Masjid</p>
                </a>
              </li>
            @endif
            <li class="nav-item">
              <a href="/masjid/rekap" class="nav-link">
                <i class="nav-icon far fa-circle text-primary"></i>
                <p>Rekap Kas Masjid</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Kas Sosial
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            @if (auth()->user()->level !== 'user')
            <li class="nav-item">
              <a href="/sosial/masuk" class="nav-link">
                <i class="nav-icon far fa-circle text-success"></i>
                <p>Pemasukan Kas Sosial</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/sosial/keluar" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p>Pengeluaran Kas Sosial</p>
              </a>
            </li>
            @endif

            <li class="nav-item">
              <a href="/sosial/rekap" class="nav-link">
                <i class="nav-icon far fa-circle text-primary"></i>
                <p>Rekap Kas Sosial</p>
              </a>
            </li>
          </ul>
        </li>

        @if (auth()->user()->level !== 'user')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laporan Kas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/masjid/laporan" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Rekap Kas Masjid</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/sosial/laporan" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>Rekap Kas Sosial</p>
                </a>
              </li>
            </ul>
          </li>
        @endif


        <li class="nav-header">Settings</li>

        {{-- Admin --}}
        @if (auth()->user()->level === "admin")
        <li class="nav-item">
          <a href="/users" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
              Users
              <span class="badge badge-warning right">2 Level</span>
            </p>
          </a>
        </li>
        @endif
       
        <li class="nav-item">
          <form action="/logout" method="post" class="nav-link d-flex align-items-center">
            @csrf
            <i class="nav-icon far fa-circle text-danger"></i>
            <input type="submit" class="btn text-white p-0" value="Logout">
          </form>
        </li>
        </ul>

      

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>