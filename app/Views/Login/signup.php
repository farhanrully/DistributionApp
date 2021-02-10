<?=$this->extend('template/template');?>
<?=$this->section('content');?>

<div class="signup">
<form action="<?=base_url() . '/user/signupaction'?>" method="POST">
    <div>
        <h2 class="login">Sign Up</h2>
    </div>
    <div class="data">

    <label style="font-size: 3;">Nama</label>
    <div class="col">
        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
    </div>

    <label style="font-size: 3;">Email</label>
    <div class="col">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
    </div>

    <label style="font-size: 3;">Password</label>
    <div class="col">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
    </div>

    <label for="inputAddress">Nama Toko</label>
    <div class="col">
        <input type="text" name="toko" id="toko" class="form-control" id="inputToko" placeholder="Nama Toko">
    </div>
    
    
    <label for="inputAddress2">Alamat Toko</label>
    <div class="col">
    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Lengkap Toko"></textarea>
  </div>
    
    <input type="hidden" name="role" id="role" value="customer" >
  
  <div class="col">
  <div class="text-center my-4">
          <button type="submit" class="btn btn-danger">Sign Up</button>
    </div>
    </div>
</form>
</div>
</div>
</div>
</div>
     <?=$this->endSection();?>