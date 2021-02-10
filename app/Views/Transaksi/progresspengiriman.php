<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container" style="margin-top: 20px;">
<h2 class="judul" style="margin-bottom: 20px;"> Progress Pengiriman </h2>
    <div class="row">
        <div class="col-12">
            <table class="table table-success table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Perkiraan Sampai</th>
                        <th scope="col">Tujuan Shipping</th>                        
                        <th scope="col">Progress Pengiriman</th>
                        <th scope="col">Aksi</th>                        
                    </tr>
                </thead>
                <tbody>
                
                <?php foreach ($transaksi as $t) : ?>
                    <tr>                        
                        <td><?=$t['id_transaksi'];?></td>
                        <td><?=$t['sampai'];?></td>
                        <td><?=$t['alamat_toko'];?></td>
                        <td><?=$t['progress'];?></td>
                        <td>                            
                            <a href="<?= base_url() . '/Transaksi/aturprogress?id='.$t['id_transaksi'] ?>"><button type="button" class="btn btn-success">Update Progress</button></a>
                        
                        </td>                     
                     <?php endforeach; ?>
                    </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>