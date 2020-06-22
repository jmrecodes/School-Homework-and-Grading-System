<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
	public function index($page = 'home') {
		$data['title'] = 'Welcome to SHGS';

		echo view('template/header', $data);
		echo view($page);
		echo view('template/footer');
	}

	public function login() {
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');

		$db = db_connect();
		$home = new \App\Models\Home($db, $username, $password);
		$user = $home->login();

		if ($user)
			$this->index('login');
		else {
			$this->index();
		}
	}

	//--------------------------------------------------------------------

}
