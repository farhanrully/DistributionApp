<?php if(session('email') == null) { ?>
<nav class="navbar fixed navbar-expand-lg navbar-light bg-orange" style="background-color: #ff8000;">
  <a class="navbar-brand" href="#">   </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav w-100">
      <a class="nav-item nav-link active" href="<?=base_url() . '/home'?>">Home </a>
      <a class="nav-item nav-link active" href="<?=base_url() . '/about'?>">About</a>
      <?php if (base_url(uri_string())!=base_url() . '/user/login') { ?>
          <a class="nav-item nav-link active ml-auto" href="<?=base_url() . '/user/login'?>">Login</a>
      <?php } ?>      
    </div>
  </div>
</nav>
<?php } else if (session()->get('role') == 'karyawan') { ?>
<nav class="navbar fixed navbar-expand-lg navbar-light bg-orange" style="background-color: #ff8000;">
  <a class="navbar-brand" href="#">   </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav w-100">
      <a class="nav-item nav-link active" href="<?=base_url() . '/home'?>">Home </a>
      <a class="nav-item nav-link active" href="<?=base_url() . '/barang/pengelolaan'?>">Pengelolaan Barang</a>
      <a class="nav-item nav-link active" href="<?=base_url() . '/Transaksi/daftarpesanan'?>">Daftar Pesanan</a>
      <a class="nav-item nav-link active" href="<?=base_url() . '/Transaksi/progresspengiriman'?>">Progress Pengiriman</a>
      <a class="nav-item nav-link active" href="<?=base_url() . '/Pembayaran/listpembayaran'?>">Pembayaran</a>
      <a class="nav-item nav-link active ml-auto" href="<?=base_url() . '/user/logout'?>">Log Out</a>
    </div>
  </div>
</nav>
<?php } else if (session()->get('role') == 'customer') { ?>
<nav class="navbar fixed navbar-expand-lg navbar-light bg-orange" style="background-color: #ff8000;">
  <a class="navbar-brand" href="#">   </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav w-100">
      <a class="nav-item nav-link active" href="<?=base_url() . '/home'?>">Home </a>
      <a class="nav-item nav-link active" href="<?=base_url() . '/Pesan/pesanan'?>">Pesan</a>
      <a class="nav-item nav-link active" href="<?=base_url() . '/Pesan/box'?>">Box Pesanan</a>
      <a class="nav-item nav-link active" href="<?=base_url() . '/Transaksi/progressuser'?>">Progress Pesanan</a>
      <a class="nav-item nav-link active ml-auto" href="<?=base_url() . '/user/logout'?>">Log Out</a>
    </div>
  </div>
</nav>
<?php } else if (session()->get('role') == 'kepala') { ?>
<nav class="navbar fixed navbar-expand-lg navbar-light bg-orange" style="background-color: #ff8000;">
  <a class="navbar-brand" href="#">   </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav w-100">
      <a class="nav-item nav-link active" href="<?=base_url() . '/home'?>">Home </a>
      <a class="nav-item nav-link active" href="<?=base_url() . '/Laporan/penjualan'?>">Laporan Penjualan</a>
      <a class="nav-item nav-link active" href="<?=base_url() . '/Laporan/restok'?>">Laporan Restok</a>
      <a class="nav-item nav-link active" href="<?=base_url() . '/Laporan/aset'?>">Aset Gudang</a>
      <a class="nav-item nav-link active ml-auto" href="<?=base_url() . '/user/logout'?>">Log Out</a>
    </div>
  </div>
</nav>
<?php } ?>