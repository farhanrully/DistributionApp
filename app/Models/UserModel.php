<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primarykey = 'id';
    protected $allowedFields = ['nama', 'email', 'password', 'toko', 'alamat', 'role'];

    public function validateLogin($email, $password)
    {
        $builder = $this->db->table($this->table);
        $builder->where('email', $email)->limit(1);
        $data = $builder->get();
        $result = $data->getRow();

        if ($result != null && password_verify($password, $result->password)) {
            $data = [
                'id'        => $result->id,
                'nama'      => $result->nama,
                'email'     => $result->email,
                'toko'     => $result->toko,
                'alamat'    => $result->alamat,
                'role'      => $result->role,
            ];
            return $data;
        }
        return array();
    }

    public function updateJumlahTransaksi($id, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);
        $builder->update($data);
    }
}
