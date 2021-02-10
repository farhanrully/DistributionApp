<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="updateprogress">
    <div>
        <h2 class="judul" style="font-size: 20px;">Rencana Pengiriman</h2>
    </div>
    <div class="data">
        <div class="row">
            <div class="col-12" style="color:seashell">
                <?php foreach ($transaksi as $t) : ?>
                    <table>
                        <thead>
                            <tr>
                                <th scope="col" style="width: 140px;"></th>
                                <th scope="col" style="width: 20px;"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ID Transaksi</td>
                                <td>:</td>
                                <td><?= $t['id_transaksi']; ?></td>
                            </tr>

                            <tr>
                                <td>Tanggal Packing</td>
                                <td>:</td>
                                <td><?= $t['packing']; ?></td>
                            </tr>

                            <tr>
                                <td>Tanggal Kirim</td>
                                <td>:</td>
                                <td><?= $t['kirim']; ?></td>
                            </tr>

                            <tr>
                                <td>Perkiraan Sampai</td>
                                <td>:</td>
                                <td><?= $t['sampai']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <form action="<?= base_url() . '/transaksi/updateprogressaction' ?>" method="POST">
    <h2 class="judul" style="font-size: 20px;">Update Progress</h2>
    <div class="formprogress">
        <input type="radio" id="packing" name="progress" value="Packing">
        <label for="packing">Packing</label><br>
        <input type="radio" id="shipping" name="progress" value="Shipping">
        <label for="Shipping">Shipping</label><br>
        <input type="radio" id="sampai" name="progress" value="Sampai">
        <label for="other">Sampai</label><br>        
        <?php foreach ($transaksi as $t) : ?>
        <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?=$t['id_transaksi']; ?>">
        <?php endforeach ?>
    </div>
        <div class="col">
            <div class="text-center my-4">
                <button type="submit" class="btn btn-danger">Simpan</button>
            </div>
</div>
                </div>


     
        
<?= $this->endSection(); ?>