<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container" style="margin-top: 20px;">
<h2 class="judul" style="margin-bottom: 20px;"> Daftar Barang </h2>
    <div class="row">
        <div class="col-12">
            <table class="table table-success table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>                        
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($barang as $b) : ?>
                    <tr>                        
                        <td><?=$b['nama'];?></td>
                        <td><?=$b['harga'];?></td>
                        <td>                              
                            <a href="<?= base_url() . '/Pesan/qty/?id='.$b['id'] ?>"><button type="button" class="btn btn-primary">Pesan</i></button>
                        </td>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>