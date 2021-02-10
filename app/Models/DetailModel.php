<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $table = 'detailtransaksi';
    protected $allowedFields = ['id_transaksi','id_user','id_barang','nama_barang','qty','harga'];


    public function getDetail($id_transaksi){
        $db      = \Config\Database::connect();
        $builder = $db->table('detailtransaksi');

        $builder->select('*');
        $builder->where('id_transaksi', $id_transaksi);
        // $query = $builder->get();

        // return $query;
    }
}