<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="signup">
    <form action="<?= base_url() . '/Pesan/editqtyaction' ?>" method="POST">
        <div>
            <h2 class="login">Edit Quantity</h2>
        </div>
        <div class="data">
            <input type="hidden" name="id_box" id="id_box" value="<?= $pesan['id_box'] ?>">
            <input type="hidden" name="id_barang" id="id_barang" value="<?= $pesan['id_barang'] ?>">
            <div class="col">
                <label style="font-size: 3;">Nama Barang</label>
                <input type="text" name="namabarang" id="namabarang" class="form-control" value="<?= $pesan['nama'] ?>" readonly>
            </div>

            <div class="col">
                <label style="font-size: 3;">Harga Jual Barang</label>
                <input type="text" name="harga" id="harga" class="form-control" value="<?= $pesan['harga']; ?>" readonly>
            </div>

            <div class="col">
                <label style="font-size: 3;">Quantity</label>
                <input type="text" name="qty" id="qty" class="form-control" value="<?= $pesan['qty']; ?>">
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