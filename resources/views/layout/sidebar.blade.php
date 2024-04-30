<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fa-solid fa-w"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Cafe<sup></sup></div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->  

  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-house-user"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('products') }}">
      <i class="fas fa-utensils"></i>
      <span>Menu</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('kategori') }}">
      <i class="fas fa-bars"></i>
      <span>Kategori</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('jenis') }}">
      <i class="fas fa-th-large"></i> 
      <span>Jenis</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('stok') }}">
     <i class="fas fa-sticky-note"></i>
      <span>Stok</span></a>
  </li>

    <li class="nav-item">
    <a class="nav-link" href="{{ route('meja') }}">
      <i class="fas fa-table"></i>
      <span>Meja</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('pelanggan') }}">
     <i class="fas fa-people-carry"></i>
      <span>Pelanggan</span></a>
  </li>
  
    <li class="nav-item">
    <a class="nav-link" href="{{ route('pemesanan') }}">
     <i class="fas fa-users"></i>
      <span>Pemesanan</span></a>
  </li>
<!-- 
      <li class="nav-item">
    <a class="nav-link" href="{{ route('produk_titipan') }}">
     <i class="fas fa-kiwi-bird"></i>
      <span>Produk Titipan</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('absensi') }}">
      <i class="fas fa-mosque"></i>
      <span>Absensi</span></a>
  </li> -->
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  
  
</ul>