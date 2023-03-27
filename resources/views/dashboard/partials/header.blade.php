  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    @auth
    <div class="d-flex align-items-center justify-content-between">
      <a href="/dashboard" class="logo d-flex align-items-center">
        <img src="/assets/img/medical-remove.png" alt="">
        <span class="d-none d-lg-block">Pharmacy</span>
      </a>
      @if( $title === 'Home' )
        <!-- Nothing is Impossible -->
      @else
      <i class="bi bi-list toggle-sidebar-btn"></i> 
      @endif
    </div><!-- End Logo -->
    @else
    <div class="d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <img src="/assets/img/medical-remove.png" alt="">
        <span class="d-none d-lg-block">Pharmacy</span>
      </a>
      <!-- <i class="bi bi-list toggle-sidebar-btn"></i> -->
    </div><!-- End Logo -->
    @endauth

    <nav class="header-nav ms-auto navbar navbar-expand-lg navbar-dark bg-gradient">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        @auth
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            @if($total_notif <= 0)
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              Tidak Ada Notifikasi.
            </li>
          </ul><!-- End Notification Dropdown Items -->
            @elseif($total_notif >= 1)
      <span class="badge bg-primary badge-number"> {{ $total_notif }} </span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              Ada {{ $total_notif  }} Notifkasi Terbaru
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            @foreach ( $kadaluwarsa as $kadaluwarsas)
            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
              <a style="color:black;" href="/dashboard/obat/kadaluwarsa">
                <h4>{{ $kadaluwarsas->obat->nama_obat }}</h4>
                <p>Obat Kadaluwarsa</p>
                <p>{{ $kadaluwarsas->created_at }}</p>
                </a>
              </div>
            </li>
            @endforeach
            @foreach ( $obat_habis as $obat)
            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
              <a style="color:black;" href="/dashboard/obat/habis">
                <h4>{{ $obat->nama_obat }}</h4>
                <p>Obat Habis</p>
                <p>{{ $obat->created_at }}</p>
                </a>
              </div>
            </li>
            @endforeach
          </ul><!-- End Notification Dropdown Items -->
      @endif
        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/assets/img/medical-remove.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Selamat Datang</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ auth()->user()->name }}</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li> -->
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/"><i class="bi bi-house"></i>Home</a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/dashboard"><i class="bi bi-list"></i>Dashboard</a>
            </li>
            <li>
              <form action="/logout" method="post" class="dropdown-item d-flex align-items-center">
              @csrf
                <i class="bi bi-box-arrow-right"></i>
                <button type="submit" class="dropdown-item">
                  Logout
                </button>
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      @else
      <li class="nav-item me-3 mt-1">
        <a style="color:#1d3557; font-family:poppins;" href="/" class="nav-link {{ ($title === 'Home') ? 'active' : '' }}"><i class="bi bi-house-door"></i>Home</a>
      </li>
      <li class="nav-item me-5 mt-1">
        <a style="color:#1d3557; font-family:poppins;" href="/login" class="nav-link {{ ($title === 'Lnogin') ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
      </li>
      @endauth
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->