<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="signup">
    <form action="<?= base_url() . '/Pesan/pesanaction' ?>" method="POST">
        <div>
            <h2 class="login">Pesan Barang</h2>
        </div>
        <div class="data">
            <input type="hidden" name="idbarang" id="id" value="<?= $barang['id'] ?>">

            <div class="col">
                <label style="font-size: 3;">Nama Barang</label>
                <input type="text" name="namabarang" id="namabarang" class="form-control" value="<?= $barang['nama'] ?>" readonly>
            </div>

            <div class="col">
                <label style="font-size: 3;">Harga Barang</label>
                <input type="text" name="harga" id="harga" class="form-control" value="<?= $barang['harga'] ?>" readonly>
            </div>

            <div class="col">
                <label style="font-size: 3;">Jumlah Beli</label>
                <input type="text" name="qty" id="qty" class="form-control">
            </div>

            <div class="col">
                <div class="text-center my-4">
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </div>
            </div>
    </form>
</div>
</div>
</div>
</div>

<?= $this->endSection(); ?>