<?php

namespace App\Controllers;

use App\Models\RestokModel;

class Restok extends BaseController
{
    protected $Restok;
    public function __construct()
    {
        $this->Restok = new RestokModel();
    }

    public function restok(){
        $readRestok = $this->Restok->findAll();
        dd($readRestok);    
        // return view('Barang/pengelolaan', $data);
    }
}