<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container" style="margin-top: 20px;">
<h2 class="judul" style="margin-bottom: 20px;"> Laporan Restok </h2>
    <div class="row">
        <div class="col-12">
            <table class="table table-success table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Tanggal Restok</th>                                                 
                        <th scope="col">Nama Barang</th>                       
                        <th scope="col">Jumlah Restok</th>
                        <th scope="col">Harga Restok</th>
                        <th scope="col">Biaya Restok</th>
                        <th scope="col">Action</th>                        
                    </tr>
                </thead>
                <tbody>
                <?php $total = 0?>                
                <?php foreach ($restok as $r) : ?>
                    <tr>                        
                        <td><?= date("d-m-y", strtotime($r['created_at'])); ?></td>
                        <td><?=$r['nama'];?></td>
                        <td><?=$r['restok'];?></td>
                        <td><?=$r['harga'];?></td>
                        <td><?=$r['biaya'];?></td>
                        <td>                            
                            <a href="<?= base_url() . '/Laporan/perubahanaset?id='.$r['id'] ?>"><button type="button" class="btn btn-success">Perubahan Aset</button></a>                            
                        </td>                  
                    </tr>
                    <?php $total = $total+$r['biaya'];?>
                   <?php endforeach; ?>
                   <tr>
                   <td colspan="4" class="table-danger">Total Biaya Restok</td>
                   <td colspan="2" class="table-danger"><?= $total ?></td>
                   </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="text-center my-4">
    <a href="<?= base_url() . '/Barang/tambah' ?>"><button class="btn btn-danger">Tambah</button></a>
</div>

<?= $this->endSection(); ?>