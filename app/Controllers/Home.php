<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data=['judul'=>'Home'];
		return view('Home/home',$data);

	}

	//--------------------------------------------------------------------

}
