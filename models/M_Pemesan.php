<?php 

class M_Pemesan extends Model {
	public function lihat(){
		$query = $this->get('tbl_pemesan', ['nama', 'jenis_kelamin', 'id']);
		$query = $this->execute();
		return $query;
	}

	public function tambah($data){
		$query = $this->insert('tbl_pemesan', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_pemesan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($data, $id){
		$query = $this->update('tbl_pemesan', $data, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_pemesan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function detail($id){
		$query = $this->get_where('tbl_pemesan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_pemesan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}
}