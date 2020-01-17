<?php 

if(!defined('BASEPATH')) echo "Tidak bisa langsung mengakses halaman ini!";

class C_Auth extends Controller{
	public function __construct(){
		$this->addFunction('url');
		if(isset($_SESSION['login'])) {
			header('Location: ' . base_url('dashboard'));
		}

		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->akun = $this->model('M_Akun');
	}
	
	public function index(){
		$this->view('login');
	}

	public function login(){
		if(!isset($_POST['login'])) redirect();
		else {
			$username = $this->req->post('username');
			$password = $this->req->post('password');

			$akun = $this->akun->cek_login($username);
			
			if($akun->num_rows > 0){
				$akun = $akun->fetch_object();
				if(password_verify($password, $akun->password)){
					setSession('login', [
						'auth' => true,
						'nama' => $akun->nama,
						'username' => $akun->username,
						'foto' => $akun->foto,
						'waktu' => date('d M Y H:i:s')
					]);
					redirect('dashboard');
				} else {
					setSession('error', 'Password salah!');
					redirect();
				}
			} else {
				setSession('error', 'Username tidak ditemukan!');
				redirect();
			}
		}
	}

	public function logout(){
		unset($_SESSION['login']);
		redirect();
	}
}