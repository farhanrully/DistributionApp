<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container" style="margin-top: 20px;">
<h2 class="judul" style="margin-bottom: 20px;"> Aset Gudang </h2>
    <div class="row">
        <div class="col-12">
            <table class="table table-success table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aset</th>
                    </tr>
                </thead>
                <tbody>
                <?php $totalaset = 0; ?>
                <?php foreach ($barang as $b) : ?>
                    <tr>                        
                        <td><?=$b['id'];?></td>
                        <td><?=$b['nama'];?></td>
                        <td><?=$b['stok'];?></td>
                        <td><?=$b['harga'];?></td>                        
                        <td><?=$b['aset'];?></td>                      
                    </tr>
                    <?php $totalaset = $totalaset+$b['aset']; ?>
                   <?php endforeach; ?>
                   <tr>
                   <td colspan="4" class="table-danger">Aset Gudang Saat Ini</td>
                   <td colspan="1" class="table-danger"><?= $totalaset ?></td>
                   </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>