<?php 

class C_Jenis_Bayar extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->j_bayar = $this->model('M_Jenis_Bayar');
	}

	public function index(){
		$data = [
			'aktif' => 'jenis_bayar',
			'judul' => 'Data Jenis Bayar',
			'data_jenis_bayar' => $this->j_bayar->lihat(),
			'no' => 1
		];
		$this->view('jenis_bayar/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('jenis_bayar');

		$jenis_bayar = $this->req->post('jenis_bayar');
		if($this->j_bayar->tambah($jenis_bayar)){
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('jenis_bayar');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('jenis_bayar');
		}
	}

	public function ubah($id){
		if(!isset($id) || $this->j_bayar->cek($id)->num_rows == 0) redirect('jenis_bayar');

		$data = [
			'aktif' => 'jenis_bayar',
			'judul' => 'Ubah Jenis Bayar',
			'jenis_bayar' => $this->j_bayar->lihat_id($id)->fetch_object(),
		];
		$this->view('jenis_bayar/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->j_bayar->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('jenis_bayar');

		$jenis_bayar = $this->req->post('jenis_bayar');
		if($this->j_bayar->ubah($jenis_bayar, $id)){
			setSession('success', 'Data berhasil diubah!');
			redirect('jenis_bayar');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('jenis_bayar');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->j_bayar->cek($id)->num_rows == 0) redirect('jenis_bayar');

		if($this->j_bayar->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('jenis_bayar');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('jenis_bayar');
		}
	}
}