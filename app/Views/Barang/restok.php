<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="signup">
    <form action="<?= base_url() . '/Barang/restokaction' ?>" method="POST">
        <div>
            <h2 class="login">Restok Barang</h2>
        </div>
        <div class="data">
            <input type="hidden" name="id" id="id" value="<?= $barang['id'] ?>">

            <div class="col">
                <label style="font-size: 3;">Nama Barang</label>
                <input type="text" name="namabarang" id="namabarang" class="form-control" value="<?= $barang['nama'] ?>" readonly>
            </div>
            <div class="col">
                <label style="font-size: 3;">Harga Restok Barang</label>
                <input type="text" name="harga_restok" id="harga_restok" class="form-control" value="<?= $barang['harga_restok'] ?>" readonly>
            </div>

            <div class="col">
                <label style="font-size: 3;">Jumlah Restok</label>
                <input type="text" name="restok" id="restok" class="form-control">
            </div>

            <input type="hidden" name="aset" id="aset" value="0">

            <div class="col">
                <div class="text-center my-4">
                    <button type="submit" class="btn btn-danger">Restok</button>
                </div>
            </div>
    </form>
</div>
</div>
</div>
</div>

<?= $this->endSection(); ?>