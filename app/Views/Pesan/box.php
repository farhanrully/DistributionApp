<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container" style="margin-top: 20px;">
<h2 class="judul" style="margin-bottom: 20px;"> Box Pesanan </h2>
    <div class="row">
        <div class="col-12">
            <table class="table table-success table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Aksi</th>                        
                    </tr>
                </thead>
                <tbody>
                <?php $grandtotal = 0; ?>
                <?php foreach ($pesan as $p) : ?>
                    <tr>                        
                        <td><?=$p['nama'];?></td>
                        <td><?=$p['qty'];?></td>
                        <td><?=$p['harga'];?></td>
                        <?php $subtotal = $p['qty']*$p['harga'] ?>
                        <td><?=$subtotal;?></td>
                        <td>                            
                            <a href="<?= base_url() . '/Pesan/edit?id='.$p['id_box'] ?>"><button type="button" class="btn btn-success">Edit</button></a>
                            <a href="<?= base_url() . '/Pesan/hapus?id='.$p['id_box'] ?>"><button type="button" class="btn btn-danger">Hapus</i></button></a>
                        </td>
                     <?php $grandtotal = $grandtotal + $subtotal;?>
                     <?php endforeach; ?>
                    </tr>
                
                   <tr>
                   <td colspan="3" class="table-danger">Grand Total</td>
                   <td colspan="2" class="table-danger"><?= $grandtotal ?></td>
                   </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="text-center my-4">
    <a href="<?= base_url() . '/Pesan/orderaction/?total='.$grandtotal ?>"><button class="btn btn-danger">Order</button></a>
</div>

<?= $this->endSection(); ?>