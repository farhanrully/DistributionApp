<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container" style="margin-top: 20px;">
<h2 class="judul" style="margin-bottom: 20px;"> Pembayaran </h2>
    <div class="row">
        <div class="col-12">
            <table class="table table-success table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Tanggal Sampai</th>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Nama Toko</th>                        
                        <th scope="col">Progress Pesanan</th>
                        <th scope="col">Aksi</th>                        
                    </tr>
                </thead>
                <tbody>
                
                <?php foreach ($transaksi as $t) : ?>
                    <tr>                        
                        <td><?=$t['sampai'];?></td>
                        <td><?=$t['id_transaksi'];?></td>
                        <td><?=$t['nama_toko'];?></td>
                        <td><?=$t['progress'];?></td>
                        <td>                            
                            <a href="<?= base_url() . '/Pembayaran/uploadpembayaran?id='.$t['id_transaksi'] ?>"><button type="button" class="btn btn-success">Upload Bukti Pembayaran</button></a>                            
                        </td>                     
                     <?php endforeach; ?>
                    </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>