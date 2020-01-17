<?php 

class C_Mobil extends Controller{
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->merk = $this->model('M_Merk');
		$this->mobil = $this->model('M_Mobil');
	}

	public function index(){
		$data = [
			'aktif' => 'mobil',
			'judul' => 'Data Mobil',
			'data_merk' => $this->merk->lihat(),
			'data_mobil' => $this->mobil->lihat(),
			'no' => 1
		];
		$this->view('mobil/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('mobil');

		// proses upload
		$upload_dir = BASEPATH . DS . 'uploads' . DS;
		$asal = $_FILES['gambar']['tmp_name'];
		$ekstensi = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
		$error = $_FILES['gambar']['error'];

		$img_name = $this->req->post('nama');
		$img_name = $this->req->post('nama');
		$img_name = strtolower($img_name);
		$img_name = str_replace(' ', '-', $img_name);
		$img_name = $img_name . '-' . time();

		if($error == 0){
			if(file_exists($upload_dir . $img_name . '.' . $ekstensi)) unlink($upload_dir . $img_name . '.' . $ekstensi);
			
			if(move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)){
				$data = [
					'id_merk' => $this->req->post('id_merk'),
					'nama' => $this->req->post('nama'),
					'warna' => $this->req->post('warna'),
					'jumlah_kursi' => $this->req->post('jumlah_kursi'),
					'no_polisi' => $this->req->post('no_polisi'),
					'tahun_beli' => $this->req->post('tahun_beli'),
					'gambar' => $img_name . '.' . $ekstensi,
				];

				if($this->mobil->tambah($data)){
					setSession('success', 'Data berhasil ditambahkan!');
					redirect('mobil');
				} else {
					setSession('error', 'Data gagal ditambahkan!');
					redirect('mobil');
				}
			} else die('gagal upload gambar');
		} else die('gambar error');
	}

	public function detail($id){
		if(!isset($id) || $this->mobil->cek($id)->num_rows == 0) redirect('mobil');

		$data = [
			'aktif' => 'mobil',
			'judul' => 'Detail Mobil',
			'mobil' => $this->mobil->detail($id)->fetch_object(),
		];

		$this->view('mobil/detail', $data);
	}

	public function ubah($id){
		if(!isset($id) || $this->mobil->cek($id)->num_rows == 0) redirect('mobil');

		$data = [
			'aktif' => 'mobil',
			'judul' => 'Ubah Mobil',
			'mobil' => $this->mobil->lihat_id($id)->fetch_object(),
			'data_merk' => $this->merk->lihat(),
		];
		$this->view('mobil/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->mobil->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('mobil');

		$upload_dir = BASEPATH . DS . 'uploads' . DS;
		$asal = $_FILES['gambar']['tmp_name'];
		$ekstensi = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
		$error = $_FILES['gambar']['error'];

		$img_name = $this->req->post('nama');
		$img_name = $this->req->post('nama');
		$img_name = strtolower($img_name);
		$img_name = str_replace(' ', '-', $img_name);
		$img_name = $img_name . '-' . time();

		$data = [
			'id_merk' => $this->req->post('id_merk'),
			'nama' => $this->req->post('nama'),
			'warna' => $this->req->post('warna'),
			'jumlah_kursi' => $this->req->post('jumlah_kursi'),
			'no_polisi' => $this->req->post('no_polisi'),
			'tahun_beli' => $this->req->post('tahun_beli'),
			'gambar' => $img_name . '.' . $ekstensi,
		];

		$gambar_sebelumnya = $this->mobil->detail($id)->fetch_object()->gambar;

		if($this->mobil->ubah($data, $id)){
			unlink($upload_dir . $gambar_sebelumnya) or die('gagal hapus gambar lama');
			if($error == 0){
				if(file_exists($upload_dir . $img_name . '.' . $ekstensi)) unlink($upload_dir . $img_name . '.' . $ekstensi);
			
				if(move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)){
					setSession('success', 'Data berhasil diubah!');
					redirect('mobil');
				} else die('gagal upload gambar');
			} else die('gambar error');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('mobil');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->mobil->cek($id)->num_rows == 0) redirect('mobil');

		$gambar	= $this->mobil->detail($id)->fetch_object()->gambar;
		unlink(BASEPATH . DS . 'uploads' . DS . $gambar) or die('gagal hapus gambar!');
		if($this->mobil->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('mobil');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('mobil');
		}
	}
}