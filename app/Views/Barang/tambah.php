<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="signup">
    <form action="<?= base_url() . '/Barang/tambahaction' ?>" method="POST">
        <div>
            <h2 class="login">Tambah Barang</h2>
        </div>
        <div class="data">

            <div class="col">
                <label style="font-size: 3;">Nama Barang</label>
                <input type="text" name="namabarang" id="namabarang" class="form-control">
            </div>

            <div class="col">
                <label style="font-size: 3;">Harga Restok Barang</label>
                <input type="text" name="harga_restok" id="harga_restok" class="form-control">
            </div>

            <div class="col">
                <label style="font-size: 3;">Harga Jual Barang</label>
                <input type="text" name="harga" id="harga" class="form-control">
            </div>

            <input type="hidden" name="stok" id="stok" value="0">
            <input type="hidden" name="aset" id="aset" value="0">

            <div class="col">
                <div class="text-center my-4">
                    <button type="submit" class="btn btn-danger">Tambah</button>
                </div>
            </div>
    </form>
</div>
</div>
</div>
</div>

<?= $this->endSection(); ?>