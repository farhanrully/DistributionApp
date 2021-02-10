<?php namespace App\Controllers;

class About extends BaseController
{
	public function index()
	{
		$data=['judul'=>'About'];
		return view('About/about',$data);

	}

	//--------------------------------------------------------------------

}
