<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $useTimestamps = true;
    protected $allowedFields = ['created_at','updated_at','id_transaksi','id_user','nama_pemesan','nama_toko','alamat_toko','packing','kirim','sampai','progress','grandtotal'];

    public function updatejadwal($id_transaksi, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_transaksi', $id_transaksi);
        $builder->update($data);
    }

    public function updateProgress($id_transaksi, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_transaksi', $id_transaksi);
        $builder->update($data);
    }   
}

