<?php

namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController
{
	protected $UserModel;
	public function __construct()
	{
		$this->UserModel = new UserModel();
	}

	public function signup()
	{
		$data = ['judul' => 'Sign Up'];
		return view('Login/signup', $data);
	}

	public function signupaction()
	{
		$userSigup = [
			'nama' => $this->request->getVar('nama'),
			'email' => $this->request->getVar('email'),
			'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
			'toko' => $this->request->getVar('toko'),
			'alamat' => $this->request->getVar('alamat'),
			'role' => $this->request->getVar('role'),
		];
		//dd($userSigup);
		$this->UserModel->save($userSigup);
		return redirect()->to(base_url('/User/login'));
	}

	public function login()
	{
		$data = ['judul' => 'Login'];
		return view('Login/login', $data);
	}

	public function proseslogin(){
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('pass');

		$validate = $this->UserModel->validateLogin($email,$password);

		if ($validate != null) {
            if($validate['role'] == 'customer' || $validate['role'] == 'karyawan' || $validate['role'] == 'kepala') {
                $sessionData = [
                    'id' => $validate['id'],
                    'nama' => $validate['nama'],
					'email' => $validate['email'],
					'toko' => $validate['toko'],
                    'alamat' => $validate['alamat'],
                    'role' => $validate['role']
                ];
            }

            session()->set($sessionData);
            if ($validate['role'] == 'customer' || $validate['role'] == 'karyawan' || $validate['role'] == 'kepala') {
            	return redirect()->to(base_url('/Home'));
			}
        }
        session()->setFlashdata('error', 'Email atau Password salah');
        return redirect()->back()->withInput();
	}

	public function logout()
	{
		$data = array('id', 'nama','email','toko','alamat', 'role');
		session()->remove($data);
		session()->destroy();
		return redirect()->to(base_url('Home'));
	}

	//--------------------------------------------------------------------

}
