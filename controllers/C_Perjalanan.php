<?php 

class C_Perjalanan extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->perjalanan = $this->model('M_Perjalanan');
	}

	public function index(){
		$data = [
			'aktif' => 'perjalanan',
			'judul' => 'Data Perjalanan',
			'data_perjalanan' => $this->perjalanan->lihat(),
			'no' => 1
		];
		$this->view('perjalanan/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('perjalanan');
		
		$data = [
			'asal' => $this->req->post('asal'),
			'tujuan' => $this->req->post('tujuan'),
			'jarak' => $this->req->post('jarak'),
		];

		if($this->perjalanan->tambah($data)){
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('perjalanan');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('perjalanan');
		}
	}

	public function ubah($id){
		if(!isset($id) || $this->perjalanan->cek($id)->num_rows == 0) redirect('perjalanan');

		$data = [
			'aktif' => 'perjalanan',
			'judul' => 'Ubah Perjalanan',
			'perjalanan' => $this->perjalanan->lihat_id($id)->fetch_object(),
		];
		$this->view('perjalanan/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->perjalanan->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('perjalanan');

		$data = [
			'asal' => $this->req->post('asal'),
			'tujuan' => $this->req->post('tujuan'),
			'jarak' => $this->req->post('jarak'),
		];
		if($this->perjalanan->ubah($data, $id)){
			setSession('success', 'Data berhasil diubah!');
			redirect('perjalanan');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('perjalanan');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->perjalanan->cek($id)->num_rows == 0) redirect('perjalanan');

		if($this->perjalanan->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('perjalanan');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('perjalanan');
		}
	}
}