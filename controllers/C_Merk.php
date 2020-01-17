<?php 

class C_Merk extends Controller {
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
	}

	public function index(){
		$data = [
			'aktif' => 'merk',
			'judul' => 'Data Merk',
			'data_merk' => $this->merk->lihat(),
			'no' => 1
		];
		$this->view('merk/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('merk');

		$merk = $this->req->post('merk');
		if($this->merk->tambah($merk)){
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('merk');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('merk');
		}
	}

	public function ubah($id){
		if(!isset($id) || $this->merk->cek($id)->num_rows == 0) redirect('merk');

		$data = [
			'aktif' => 'merk',
			'judul' => 'Ubah Merk',
			'merk' => $this->merk->lihat_id($id)->fetch_object(),
		];
		$this->view('merk/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->merk->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('merk');

		$merk = $this->req->post('merk');
		if($this->merk->ubah($merk, $id)){
			setSession('success', 'Data berhasil diubah!');
			redirect('merk');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('merk');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->merk->cek($id)->num_rows == 0) redirect('merk');

		if($this->merk->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('merk');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('merk');
		}
	}
}