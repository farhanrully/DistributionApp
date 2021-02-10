<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table = 'box';
    protected $primaryKey = 'id_box';
    protected $allowedFields = ['id_box','id_user', 'id_barang', 'qty'];

    public function getPesan($id_user)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('box');

        $builder->select('*');
        $builder->where('id_user', $id_user);
        $builder->join('barang', 'barang.id = box.id_barang','left');

        $query = $builder->get();

        return $query;

    }

    public function hapusBox($id_user){
        $db      = \Config\Database::connect();
        $builder = $db->table('box');

        $builder->select('*');
        $builder->where('id_user', $id_user);
        $builder->delete();
        }
}
