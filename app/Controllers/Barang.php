<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\RestokModel;

class Barang extends BaseController
{
    protected $Barang;
    protected $Restok;
    public function __construct()
    {
        $this->Barang = new BarangModel();
        $this->Restok = new RestokModel();
    }

    public function pengelolaan()
    {
        $readBarang = $this->Barang->findAll();
        $data = ['judul' => 'Pengelolaan Barang', 'barang' => $readBarang];
        return view('Barang/pengelolaan', $data);
    }

    public function tambah()
    {
        $data = ['judul' => 'Tambah Barang'];
        return view('Barang/tambah', $data);
    }

    public function tambahaction()
    {
        $Tambah = [
            'nama' => $this->request->getVar('namabarang'),
            'stok' => $this->request->getVar('stok'),
            'harga_restok' => $this->request->getVar('harga_restok'),
            'harga' => $this->request->getVar('harga'),
            'aset' => $this->request->getVar('aset'),
        ];
        $this->Barang->save($Tambah);
        //dd($Tambah);
        return redirect()->to(base_url('/Barang/pengelolaan'));
    }

    public function edit()
    {
        $id = $_GET['id'];
        $readBarang = $this->Barang->find($id);
        $data = ['judul' => 'Edit Barang', 'barang' => $readBarang];

        return view('Barang/edit', $data);
    }

    public function editaction()
    {
        //     echo $this->request->getVar('id');
        $stok = $this->request->getVar('stok');
        $harga = $this->request->getVar('harga');
        $aset = $stok * $harga;
        $Tambah = [
            'id' => $this->request->getVar('id'),
            'nama' => $this->request->getVar('namabarang'),
            'stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),
            'aset' => $aset,
        ];
        $this->Barang->save($Tambah);
        // dd($Tambah);
        return redirect()->to(base_url('/Barang/pengelolaan'));
    }

    public function hapus()
    {
        $id = $_GET['id'];
        $this->Barang->delete($id);
        return redirect()->to(base_url('/Barang/pengelolaan'));
    }

    public function restok()
    {
        $id = $_GET['id'];
        $readBarang = $this->Barang->find($id);
        $data = ['judul' => 'Restok Barang', 'barang' => $readBarang];

        return view('Barang/restok', $data);
    }

    public function restokaction()
    {
        $id = $this->request->getVar('id');
        $readBarang = $this->Barang->find($id);
        $stoktambah = $this->request->getVar('restok');
        $stokbaru = $readBarang['stok'] + $stoktambah;

        $harga = $readBarang['harga'];
        $aset = $stokbaru * $harga;
        $Tambah = [
            'id' => $id,
            'nama' => $readBarang['nama'],
            'stok' => $stokbaru,
            'harga_restok' => $readBarang['harga_restok'],
            'harga' => $readBarang['harga'],
            'aset' => $aset,
        ];
        $this->Barang->save($Tambah);
        // dd($Tambah);
        $asettambah = $stoktambah*$readBarang['harga'];
        $biaya = $stoktambah*$readBarang['harga_restok'];
        $restok = [           
            'nama' => $readBarang['nama'],
            'stoklama' => $readBarang['stok'],
            'restok' => $stoktambah,
            'stokbaru' => $stokbaru,
            'harga' => $readBarang['harga_restok'],
            'biaya' => $biaya,
            'aset_tambahan' => $asettambah,
            'aset' => $aset,
        ];
        $this->Restok->save($restok);
        return redirect()->to(base_url('/Barang/pengelolaan'));
    }


    //--------------------------------------------------------------------

}
