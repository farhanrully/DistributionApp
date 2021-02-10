<?php

namespace App\Models;

use CodeIgniter\Model;

class RestokModel extends Model
{
    protected $table = 'restok';
    protected $useTimestamps = true;
    protected $allowedFields = ['created_at','updated_at','nama','stoklama','restok','stokbaru','harga','biaya','aset_tambahan','aset'];
}