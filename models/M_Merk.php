<?php 

class M_Merk extends Model{
	public function tambah($data){
		$query = $this->insert('tbl_merk', ['merk' => $data]);
		$query = $this->execute();
		return $query;
	}

	public function lihat(){
		$query = $this->get('tbl_merk');
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_merk', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($merk, $id){
		$query = $this->update('tbl_merk', ['merk' => $merk], ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_merk', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_merk', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}
}