<?=$this->extend('template/template');?>
<?=$this->section('content');?>

<div class="user">
        <div>
        	<h2 class="login">Login</h2>
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h5>Warning !!!</h5>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="data">
                <div class="group">
                	<form method="POST" action="<?= base_url('User/proseslogin') ?>">
                    <label style="font-size: 3;">Email Address</label>
                    <input type="text" name="email" placeholder="username or email">
                </div>
                <div class="group">
                    <label style="font-size: 3;">Password</label>
                    <input type="password" name="pass" placeholder="password">
                </div>
                <span style="font-size: 2;">Didn't have any account?</span>
                <a href="<?=base_url() . '/user/signup'?>" style="color:white"><span style="font-size: 2;">Sign Up</span></a>
                <div class="text-center my-2">
                    <input type="submit" class="btn btn-danger" value="Login">
                </div>
            </form>
        </div>
    </div>

<?=$this->endSection();?>