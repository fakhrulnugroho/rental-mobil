<?php 

class C_Pemesan extends Controller{
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->pemesan = $this->model('M_Pemesan');
	}

	public function index(){
		$data = [
			'aktif' => 'pemesan',
			'judul' => 'Data Pemesan',
			'data_pemesan' => $this->pemesan->lihat(),
			'no' => 1
		];
		$this->view('pemesan/index', $data);
	}

	public function detail($id){
		if(!isset($id) || $this->pemesan->cek($id)->num_rows == 0) redirect('pemesan');

		$data = [
			'aktif' => 'pemesan',
			'judul' => 'Detail Pemesan',
			'pemesan' => $this->pemesan->detail($id)->fetch_object(),
		];

		$this->view('pemesan/detail', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('pemesan');

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
					'alamat' => $this->req->post('alamat'),
					'jenis_kelamin' => $this->req->post('jenis_kelamin'),
					'foto' => $img_name . '.' . $ekstensi,
				];

				if($this->pemesan->tambah($data)){
					setSession('success', 'Data berhasil ditambahkan!');
					redirect('pemesan');
				} else {
					setSession('error', 'Data gagal ditambahkan!');
					redirect('pemesan');
				}
			} else die('gagal upload gambar');
		} else die('gambar error');
	}

	public function hapus($id = null){
		if(!isset($id) || $this->pemesan->cek($id)->num_rows == 0) redirect('pemesan');

		$gambar	= $this->pemesan->detail($id)->fetch_object()->foto;

		unlink(BASEPATH . DS . 'uploads' . DS . $gambar) or die('gagal hapus gambar!');
		if($this->pemesan->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('pemesan');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('pemesan');
		}
	}

	public function ubah($id){
		if(!isset($id) || $this->pemesan->cek($id)->num_rows == 0) redirect('pemesan');

		$data = [
			'aktif' => 'pemesan',
			'judul' => 'Ubah Pemesan',
			'pemesan' => $this->pemesan->lihat_id($id)->fetch_object(),
		];
		$this->view('pemesan/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->pemesan->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('pemesan');

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
					'alamat' => $this->req->post('alamat'),
					'jenis_kelamin' => $this->req->post('jenis_kelamin'),
					'foto' => $img_name . '.' . $ekstensi,
				];

				if($this->pemesan->ubah($data, $id)){
					setSession('success', 'Data berhasil diubah!');
					redirect('pemesan');
				} else {
					setSession('error', 'Data gagal diubah!');
					redirect('pemesan');
				}
			} else die('gagal upload gambar');
		} else die('gambar error');
	}
}