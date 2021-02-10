<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container" style="margin-top: 20px;">
<div>
        <h2 class="judul">Catatan Restok</h2>
    </div>
    <div class="row">
        <div class="col-12">

            <?php //dd($restok['id']); 
            ?>

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
                <tbody style="color: white;">
                    <?php //foreach ($restok as $r) : 
                    ?>
                    <tr>
                        <td>ID Catatan</td>
                        <td>:</td>
                        <td><?= $restok['id']; ?></td>
                        <td></td>
                        <td>Tanggal Restok</td>
                        <td>:</td>
                        <td style="text-align: right;"><?= date("d-m-y", strtotime($restok['created_at'])); ?></td>
                    </tr>
                    <tr>
                        <td>Nama Barang</td>
                        <td>:</td>
                        <td><?= $restok['nama']; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;"></td>
                    </tr>
                    <?php //endforeach; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <h2 class="judul" style="font-size: 18px;">Perubahan Stok</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-success table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Stok Lama</th>
                        <th scope="col">Jumlah Restok</th>
                        <th scope="col">Stok Baru</th>
                    </tr>
                </thead>
                <tbody>
                    <?php //foreach ($restok as $r) : 
                    ?>
                    <tr>
                        <td><?= $restok['stoklama']; ?></td>
                        <td><?= $restok['restok']; ?></td>
                        <td><?= $restok['stokbaru']; ?></td>
                    </tr>
                    <?php //endforeach; 
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <div>
        <h2 class="judul" style="font-size: 18px;">Biaya dan Aset</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-success table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Harga Restok</th>
                        <th scope="col">Biaya Restok</th>
                        <th scope="col">Aset Tambahan</th>
                        <th scope="col">Aset Baru</th>
                    </tr>
                </thead>
                <tbody>
                    <?php //foreach ($restok as $r) : 
                    ?>
                    <tr>
                        <td><?= $restok['harga']; ?></td>
                        <td><?= $restok['biaya']; ?></td>
                        <td><?= $restok['aset_tambahan']; ?></td>
                        <td><?= $restok['aset']; ?></td>
                    </tr>
                    <?php //endforeach; 
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>