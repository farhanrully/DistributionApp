<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PesanModel;
use App\Models\DetailModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Pembayaran extends BaseController
{
    protected $Barang;
    protected $Pesan;
    protected $Detail;
    protected $Transaksi;
    protected $User;

    public function __construct()
    {
        $this->Barang = new BarangModel();
        $this->Pesan = new PesanModel();
        $this->Detail = new DetailModel();
        $this->Transaksi = new TransaksiModel();
        $this->User = new UserModel();
    }

    public function listpembayaran(){
        $condition = [
            'Sampai',
            'Lunas',
		];

		$transaksi = $this->Transaksi->orWhereIn('progress',$condition)->findAll();
       // $readTransaksi = $this->Transaksi->findAll();        
        
       $data = ['judul' => 'Pembayaran', 'transaksi' => $transaksi];
        return view('Pembayaran/listpembayaran', $data);
    }

    public function uploadpembayaran(){
        $id_transaksi = $this->request->getVar('id');
        $progress = "Lunas";
        $updateProgress = [
            'progress' => $progress,
        ];
        $this->Transaksi->updateProgress($id_transaksi, $updateProgress);
        return redirect()->to(base_url('/Pembayaran/listpembayaran'));
    }
}