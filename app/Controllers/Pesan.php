<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PesanModel;
use App\Models\DetailModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Pesan extends BaseController
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

    public function pesanan()
    {
        $readBarang = $this->Barang->findAll();
        $data = ['judul' => 'Pesan', 'barang' => $readBarang];
        return view('Pesan/pesan', $data);
    }

    public function qty()
    {
        $id = $_GET['id'];
        $readBarang = $this->Barang->find($id);
        $data = ['judul' => 'Qty', 'barang' => $readBarang];
        return view('Pesan/qty', $data);
    }

    public function pesanaction()
    {
        $pesan = [
            'id_user' => (session()->get('id')),
            'id_barang' => $this->request->getVar('idbarang'),
            'qty' => $this->request->getVar('qty'),
        ];
        $this->Pesan->save($pesan);
        //dd($pesan);
        return redirect()->to(base_url('/Pesan/pesanan'));
    }

    public function box()
    {
        $id_user = (session()->get('id'));

        $pesan = $this->Pesan->where('id_user', $id_user)->join('barang', 'barang.id = box.id_barang')->findAll();
        //dd($pesan);
        $data = ['judul' => 'Box Pesanan', 'pesan' => $pesan];
        //dd($pesan);
        return view('Pesan/box', $data);
    }

    public function edit()
    {
        $id_box = $_GET['id'];
        // dd($id_box);
        $readPesan = $this->Pesan->join('barang', 'barang.id = box.id_barang')->find($id_box);
        // dd($readPesan);        
        $data = ['judul' => 'Edit Qty', 'pesan' => $readPesan];
        return view('Pesan/edit', $data);
    }

    public function editqtyaction()
    {
        $id_user = (session()->get('id'));
        //     echo $this->request->getVar('id');        
        $Tambah = [
            'id_box' => $this->request->getVar('id_box'),
            'id_user' => $id_user,
            'id_barang' => $this->request->getVar('id_barang'),
            'qty' => $this->request->getVar('qty'),
        ];
        $this->Pesan->save($Tambah);
        ($Tambah);
        return redirect()->to(base_url('/Pesan/box'));
    }

    public function hapus()
    {
        $id_box = $_GET['id'];
        //dd($id_box);
        $this->Pesan->delete($id_box);
        return redirect()->to(base_url('/Pesan/box'));
    }

    public function orderaction()
    {
        $id_user = (session()->get('id'));
        $grandtotal = $_GET['total'];
        //dd($grandtotal);
        $pesan = $this->Pesan->where('id_user', $id_user)->join('barang', 'barang.id = box.id_barang')->findAll();

        $user = $this->User->find($id_user);
        //dd($user);
        
        $jumlah_transaksi = $user['jumlah_transaksi'] + 1;
        $tambahtransaksi = [
            'id_transaksi' => $user['id'] . $jumlah_transaksi,
            'id_user' => $id_user,
            'nama_pemesan' => $user['nama'],
            'nama_toko' => $user['toko'],
            'alamat_toko' => $user['alamat'],
            'grandtotal' => $grandtotal
        ];
        $this->Transaksi->save($tambahtransaksi);
        foreach ($pesan as $dataPesan) {
            $data = [
                'id_transaksi' => $user['id'] . $jumlah_transaksi,
                'id_user' => $id_user,
                'id_barang' => $dataPesan['id_barang'],
                'nama_barang' => $dataPesan['nama'],
                'qty' => $dataPesan['qty'],
                'harga' => $dataPesan['harga'],
            ];
            $this->Detail->save($data);
        }

        $updateTransaksi = [
            'jumlah_transaksi' => $jumlah_transaksi,
        ];

        $this->User->updateJumlahTransaksi($user['id'], $updateTransaksi);

        // $this->User->set($user);
        // $this->User->update($user['id'], $updateTransaksi);
      
        $this->Pesan->hapusBox($user['id']);
        return redirect()->to(base_url('/Transaksi/progressuser'));    
    }
}
