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
                        <th scope="col">Stok</th>
                        <th scope="col">Harga</th>                        
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($barang as $b) : ?>
                    <tr>                        
                        <td><?=$b['nama'];?></td>
                        <td><?=$b['stok'];?></td>
                        <td><?=$b['harga'];?></td>
                        <td>                            
                            <a href="<?= base_url() . '/Barang/edit?id='.$b['id'] ?>"><button type="button" class="btn btn-success">Edit</button></a>
                            <a href="<?= base_url() . '/Barang/hapus?id='.$b['id'] ?>"><button type="button" class="btn btn-danger">Hapus</i></button></a>
                            <a href="<?= base_url() . '/Barang/restok?id='.$b['id'] ?>"><button type="button" class="btn btn-primary">Restok</i></button>
                        </td>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="text-center my-4">
    <a href="<?= base_url() . '/Barang/tambah' ?>"><button class="btn btn-danger">Tambah</button></a>
</div>

<?= $this->endSection(); ?>