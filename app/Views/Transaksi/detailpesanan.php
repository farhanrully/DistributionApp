<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container" style="margin-top: 20px; color :white">
    <div>
        <h2 class="judul">Detail Pesanan</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <?php foreach ($transaksi as $t) : ?>
                <table>
                    <thead>
                        <tr>
                            <th scope="col" style="width: 180px;"></th>
                            <th scope="col"></th>
                            <th scope="col" style="width: 720px;"></th>
                            <th scope="col" style="width: 400;"></th>
                            <th scope="col" style="width: 140px;"></th>
                            <th scope="col"></th>
                            <th scope="col" style="width: 100px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ID Transaksi</td>
                            <td>:</td>
                            <td><?= $t['id_transaksi']; ?></td>
                            <td></td>
                            <td>Tanggal Pesan</td>
                            <td>:</td>
                            <td style="text-align: right;"><?= date("d-m-y", strtotime($t['created_at'])); ?></td>
                        </tr>

                        <tr>
                            <td>Perkiraan Sampai</td>
                            <td>:</td>
                            <td><?= $t['sampai']; ?></td>
                            <td></td>
                            <td>Status Pesanan</td>
                            <td>:</td>
                            <td style="text-align: right;"><?= $t['progress']; ?></td>
                        </tr>
                        
                    <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-12">
            <table class="table table-success table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php //dd($detail); 
                    ?>
                    <?php foreach ($detail as $d) : ?>
                        <tr>
                            <td><?= $d['nama_barang']; ?></td>
                            <td><?= $d['qty']; ?></td>
                            <td><?= $d['harga']; ?></td>
                            <?php $subtotal = $d['qty'] * $d['harga'] ?>
                            <td><?= $subtotal; ?></td>
                            <?php //$grandtotal = $grandtotal + $subtotal;
                            ?>
                        <?php endforeach; ?>
                        </tr>
                        <?php foreach ($transaksi as $t) : ?>
                            <tr>
                                <td colspan="3" class="table-danger">Grand Total</td>
                                <td colspan="2" class="table-danger"><?= $t['grandtotal']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>