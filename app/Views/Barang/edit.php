<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="signup">
    <form action="<?= base_url() . '/Barang/editaction' ?>" method="POST">
        <div>
            <h2 class="login">Edit Barang</h2>
        </div>
        <div class="data">
            <input type="hidden" name="id" id="id" value="<?= $barang['id'] ?>">

            <div class="col">
                <label style="font-size: 3;">Nama Barang</label>
                <input type="text" name="namabarang" id="namabarang" class="form-control" value="<?= $barang['nama'] ?>">
            </div>

            <div class="col">
                <label style="font-size: 3;">Stok</label>
                <input type="text" name="stok" id="stok" class="form-control" value="<?= $barang['stok']; ?>">
            </div>

            <div class="col">
                <label style="font-size: 3;">Harga Jual Barang</label>
                <input type="text" name="harga" id="harga" class="form-control" value="<?= $barang['harga']; ?>">
            </div>

            <input type="hidden" name="aset" id="aset" value="0">

            <div class="col">
                <div class="text-center my-4">
                    <button type="submit" class="btn btn-danger">Edit</button>
                </div>
            </div>
    </form>
</div>
</div>
</div>
</div>

<?= $this->endSection(); ?>