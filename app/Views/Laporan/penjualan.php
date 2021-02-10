<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container" style="margin-top: 20px;">
<h2 class="judul" style="margin-bottom: 20px;"> Laporan Penjualan </h2>
    <div class="row">
        <div class="col-12">
            <table class="table table-success table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Total Penjualan</th>
                        <th scope="col">Aksi</th>                        
                    </tr>
                </thead>
                <tbody>
                <?php $total = 0?>
                <?php foreach ($transaksi as $t) : ?>
                    <tr>                        
                        <td><?=$t['sampai'];?></td>
                        <td><?=$t['id_transaksi'];?></td>
                        <td><?=$t['grandtotal'];?></td>
                        <td>                            
                            <a href="<?= base_url() . '/Laporan/detailpenjualan?id='.$t['id_transaksi'] ?>"><button type="button" class="btn btn-success">Detail Penjualan</button></a>
                         <?php $total=$total+$t['grandtotal']; ?>   
                        </td>                     
                     <?php endforeach; ?>
                    </tr>
                    <tr>
                   <td colspan="2" class="table-danger">Total Penjualan</td>
                   <td colspan="3" class="table-danger"><?= $total ?></td>
                   </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>