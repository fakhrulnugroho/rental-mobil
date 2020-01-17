<?php 

class C_Akun extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->akun = $this->model('M_Akun');
	}

	public function index(){
		$data = [
			'aktif' => 'akun',
			'judul' => 'Data Akun',
			'data_akun' => $this->akun->lihat(),
			'no' => 1
		];
		$this->view('akun/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('akun');

		if($_POST['password'] !== $_POST['password2']) {
			setSession('error', 'Password tidak sama!');
			redirect('akun');
		} else {
			// proses upload
			$upload_dir = BASEPATH . DS . 'uploads' . DS;
			$asal = $_FILES['foto']['tmp_name'];
			$ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
			$error = $_FILES['foto']['error'];

			$img_name = $this->req->post('nama');
			$img_name = $this->req->post('nama');
			$img_name = strtolower($img_name);
			$img_name = str_replace(' ', '-', $img_name);
			$img_name = $img_name . '-' . time();

			if($error == 0){
				if(file_exists($upload_dir . $img_name . '.' . $ekstensi)) unlink($upload_dir . $img_name . '.' . $ekstensi);
				
				if(move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)){
					$data = [
						'nama' => $this->req->post('nama'),
						'username' => $this->req->post('username'),
						'password' => password_hash($this->req->post('password'), PASSWORD_DEFAULT),
						'foto' => $img_name . '.' . $ekstensi,
					];

					if($this->akun->tambah($data)){
						setSession('success', 'Data berhasil ditambahkan!');
						redirect('akun');
					} else {
						setSession('error', 'Data gagal ditambahkan!');
						redirect('akun');
					}
				} else die('gagal upload gambar');
			} else die('gambar error');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->akun->cek($id)->num_rows == 0) redirect('akun');

		$gambar	= $this->akun->detail($id)->fetch_object()->foto;

		unlink(BASEPATH . DS . 'uploads' . DS . $gambar) or die('gagal hapus gambar!');
		if($this->akun->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('akun');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('akun');
		}
	}

	public function detail($id){
		if(!isset($id) || $this->akun->cek($id)->num_rows == 0) redirect('akun');

		$data = [
			'aktif' => 'akun',
			'judul' => 'Detail Akun',
			'akun' => $this->akun->detail($id)->fetch_object(),
		];

		$this->view('akun/detail', $data);
	}
}