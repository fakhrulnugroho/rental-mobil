<?php 

class M_Jenis_Bayar extends Model{
	public function tambah($data){
		$query = $this->insert('tbl_jenis_bayar', ['jenis_bayar' => $data]);
		$query = $this->execute();
		return $query;
	}

	public function lihat(){
		$query = $this->get('tbl_jenis_bayar');
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_jenis_bayar', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($jenis_bayar, $id){
		$query = $this->update('tbl_jenis_bayar', ['jenis_bayar' => $jenis_bayar], ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_jenis_bayar', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_jenis_bayar', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}
}