<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama','stok','harga_restok','harga','aset'];


public function updatestok($id_transaksi, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_transaksi', $id_transaksi);
        $builder->update($data);
    }
}