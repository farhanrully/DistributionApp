<?=$this->extend('template/template');?>
<?=$this->section('content');?>
<?php if(session('email') == null) { ?>
<div class="welcome container">
	<p class="judul"> Selamat datang di website</p>
	<img src="<?= base_url('img/welcome.jpg') ;?>" width="100%">
</div>

<?php } else if (session()->get('role') == 'karyawan') { ?>
<div class="welcome container">
	<p>Karyawan datang di website</p>
	<img src="<?= base_url('img/welcome.jpg') ;?>" width="100%">
</div>

<?php } else if (session()->get('role') == 'customer') { ?>
<div class="welcome container">
	<p>Customer datang di website</p>
	<img src="<?= base_url('img/welcome.jpg') ;?>" width="100%">
</div>

<?php } else if (session()->get('role') == 'kepala') { ?>
<div class="welcome container">
	<p>Kepala datang di website</p>
	<img src="<?= base_url('img/welcome.jpg') ;?>" width="100%">
</div>
<?php } ?>

<?=$this->endSection();?>