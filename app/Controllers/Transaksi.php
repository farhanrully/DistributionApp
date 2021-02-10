<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PesanModel;
use App\Models\DetailModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Transaksi extends BaseController
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

    public function daftarpesanan(){
        $condition = [
			'Belum Terverifikasi',
		];

		$transaksi = $this->Transaksi->orWhereIn('progress',$condition)->findAll();
       // $readTransaksi = $this->Transaksi->findAll();        
        
       $data = ['judul' => 'Daftar Pesanan', 'transaksi' => $transaksi];
        return view('Transaksi/daftarpesanan', $data);        
    }

    public function aturpesanan(){
        $id_transaksi = $_GET['id'];
        $detail = $this->Detail->where('id_transaksi', $id_transaksi)->findAll();
        //dd($detail);

        $transaksi = $this->Transaksi->where('id_transaksi', $id_transaksi)->findAll();
        //dd($transaksi);

        $data = ['judul' => 'Atur Pesanan', 'transaksi' => $transaksi, 'detail' => $detail];
        //dd($data);
        return view('Transaksi/aturpesanan', $data);
    }

    public function aturpesananaction(){
        $id = [
			'id_transaksi' => $this->request->getVar('id_transaksi'),
        ];        
        $id_transaksi = $id['id_transaksi'];
        $update = [
            'packing' => $this->request->getVar('packing'),
            'kirim' => $this->request->getVar('kirim'),
            'sampai' => $this->request->getVar('sampai'),
            'progress' => $this->request->getVar('progress')
        ];
        //dd($id_transaksi);
       $this->Transaksi->updatejadwal($id_transaksi, $update); 

      $detail = $this->Detail->where('id_transaksi', $id_transaksi)->findAll(); 
      //dd($detail);
      foreach ($detail as $d){
          $qtybeli = $d['qty'];
          $id_barang = $d['id_barang'];
          $barang = $this->Barang->find($id_barang);
          $stokakhir = $barang['stok']-$qtybeli;
          $asetakhir = $stokakhir*$barang['harga'];
          $data =[
            'id' => $barang['id'],
            'nama' => $barang['nama'],
            'stok' => $stokakhir,
            'harga' => $barang['harga'],
            'aset' => $asetakhir
          ];
          $this->Barang->save($data);
        }
      
        return redirect()->to(base_url('/Transaksi/daftarpesanan'));    
    }

    public function aturprogress(){
        $id_transaksi = $_GET['id'];
        $detail = $this->Detail->where('id_transaksi', $id_transaksi)->findAll();
        //dd($detail);

        $transaksi = $this->Transaksi->where('id_transaksi', $id_transaksi)->findAll();
        //dd($transaksi);

        $data = ['judul' => 'Update Progress', 'transaksi' => $transaksi, 'detail' => $detail];
        //dd($data);
        return view('Transaksi/updateprogress', $data);   
    }

    public function updateprogressaction(){             
        $id_transaksi = $this->request->getVar('id_transaksi');
        $progress = $this->request->getVar('progress');
        $updateProgress = [
            'progress' => $progress,
        ];
        $this->Transaksi->updateProgress($id_transaksi, $updateProgress);
        return redirect()->to(base_url('/Transaksi/progresspengiriman'));
    }

    public function progresspengiriman(){
        $condition = [
            'Terverifikasi',
            'Packing',
            'Shipping'
		];

		$transaksi = $this->Transaksi->orWhereIn('progress',$condition)->findAll();
       // $readTransaksi = $this->Transaksi->findAll();        
        
       $data = ['judul' => 'Progress Pengiriman', 'transaksi' => $transaksi];
        return view('Transaksi/progresspengiriman', $data);
    }

    public function progressuser(){
        $id_user = (session()->get('id'));
        $condition = [
            $id_user
        ];
        $condition2 = [
            'Lunas'
        ];
        $transaksi = $this->Transaksi->Where('id_user',$condition)->WhereNotIn('progress',$condition2)->findAll();
       
       // $readTransaksi = $this->Transaksi->findAll();        
        
       $data = ['judul' => 'Progress Pengiriman', 'transaksi' => $transaksi];
        return view('Transaksi/progressuser', $data);
    }

    public function detailpesanan(){
        $id_transaksi = $_GET['id'];
        $detail = $this->Detail->where('id_transaksi', $id_transaksi)->findAll();
        //dd($detail);

        $transaksi = $this->Transaksi->where('id_transaksi', $id_transaksi)->findAll();
        //dd($transaksi);

        $data = ['judul' => 'Atur Pesanan', 'transaksi' => $transaksi, 'detail' => $detail];
        //dd($data);
        return view('Transaksi/detailpesanan', $data);   
    }

} 