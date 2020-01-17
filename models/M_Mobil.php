<?php 

class M_Mobil extends Model {
	public function lihat(){
		$query = $this->setQuery('SELECT nama, tbl_merk.merk AS merk, jumlah_kursi, tbl_mobil.id as id FROM tbl_mobil INNER JOIN tbl_merk ON tbl_merk.id = tbl_mobil.id_merk');
		$query = $this->execute();
		return $query;
	}

	public function tambah($data){
		$query = $this->insert('tbl_mobil', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->setQuery("SELECT *, tbl_mobil.id AS id_mobil, tbl_mobil.id_merk AS id_merk FROM tbl_mobil INNER JOIN tbl_merk ON tbl_merk.id = tbl_mobil.id_merk where tbl_mobil.id = $id");
		$query = $this->execute();
		return $query;
	}

	public function ubah($data, $id){
		$query = $this->update('tbl_mobil', $data, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_mobil', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function detail($id){
		$query = $this->setQuery("SELECT *, tbl_mobil.id AS id_mobil, tbl_mobil.id_merk AS id_merk FROM tbl_mobil INNER JOIN tbl_merk ON tbl_merk.id = tbl_mobil.id_merk where tbl_mobil.id = $id");
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_mobil', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}
}