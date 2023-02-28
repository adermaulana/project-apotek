  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bag"></i><span>Penjualan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/dashboard/penjualan/create">
              <i class="bi bi-circle"></i><span>Tambah Penjualan</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/penjualan">
              <i class="bi bi-circle"></i><span>Lihat Penjualan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-wallet"></i><span>Pembelian</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/dashboard/pembelian/create">
              <i class="bi bi-circle"></i><span>Tambah Pembelian</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/pembelian">
              <i class="bi bi-circle"></i><span>Lihat Pembelian</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="laporan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/dashboard/laporan">
              <i class="bi bi-circle"></i><span>Lihat Laporan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Laporan Nav -->

      @can('admin')
      <li class="nav-heading">Admin</li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-capsule"></i><span>Obat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/dashboard/obat/create">
              <i class="bi bi-circle"></i><span>Tambah Obat</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/obat">
              <i class="bi bi-circle"></i><span>Lihat Obat</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/obat/kadaluwarsa">
              <i class="bi bi-circle"></i><span>Obat Kadaluarsa</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/obat/habis">
              <i class="bi bi-circle"></i><span>Obat Habis</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-tags-fill"></i><span>Kategori & Unit</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/dashboard/categories/create">
              <i class="bi bi-circle"></i><span>Tambah Kategori</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/categories">
              <i class="bi bi-circle"></i><span>Lihat Kategori</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/unit/create">
              <i class="bi bi-circle"></i><span>Tambah Unit</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/unit">
              <i class="bi bi-circle"></i><span>Lihat Unit</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-building"></i><span>Pemasok</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/dashboard/pemasok/create">
              <i class="bi bi-circle"></i><span>Tambah Pemasok</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/pemasok">
              <i class="bi bi-circle"></i><span>Lihat Pemasok</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#kasir-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Data Pengelola</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="kasir-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/dashboard/user/create">
              <i class="bi bi-circle"></i><span>Tambah User</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/user">
              <i class="bi bi-circle"></i><span>Lihat User</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      @endcan('admin')
    </ul>

  </aside><!-- End Sidebar-->