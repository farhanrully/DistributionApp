<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PesanModel;
use App\Models\DetailModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use App\Models\RestokModel;

class Laporan extends BaseController
{
    protected $Barang;
    protected $Pesan;
    protected $Detail;
    protected $Transaksi;
    protected $User;
    protected $Restok;

    public function __construct()
    {
        $this->Barang = new BarangModel();
        $this->Pesan = new PesanModel();
        $this->Detail = new DetailModel();
        $this->Transaksi = new TransaksiModel();
        $this->User = new UserModel();
        $this->Restok = new RestokModel();
    }

    public function aset()
    {
        $readBarang = $this->Barang->findAll();
        $data = ['judul' => 'Aset Gudang', 'barang' => $readBarang];
        return view('Laporan/aset', $data);
    }

    public function penjualan(){
        $condition = [
			'Lunas',
		];

		$transaksi = $this->Transaksi->orWhereIn('progress',$condition)->findAll();
       // $readTransaksi = $this->Transaksi->findAll();        
        
       $data = ['judul' => 'Daftar Pesanan', 'transaksi' => $transaksi];
        return view('Laporan/penjualan', $data);
    }

    public function detailpenjualan(){
        $id_transaksi = $_GET['id'];
        $detail = $this->Detail->where('id_transaksi', $id_transaksi)->findAll();
        //dd($detail);

        $transaksi = $this->Transaksi->where('id_transaksi', $id_transaksi)->findAll();
        //dd($transaksi);

        $data = ['judul' => 'Detail Penjualan', 'transaksi' => $transaksi, 'detail' => $detail];
        //dd($data);
        return view('Laporan/detailpenjualan', $data);
    }

    public function restok(){
        $readRestok = $this->Restok->findAll();
        $data = ['judul' => 'Laporan Restok', 'restok' => $readRestok];
        return view('Laporan/restok', $data);
    }

    public function perubahanaset(){
        $id = $_GET['id'];
        $readRestok = $this->Restok->find($id);
        $data = ['judul' => 'Perubahan Aset', 'restok' => $readRestok];
        //dd($data);
        return view('Laporan/perubahanaset', $data);
    
    }
}