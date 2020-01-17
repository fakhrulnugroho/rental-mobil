<?php 

class M_Pesanan extends Model{
	public function tambah($data){
		$query = $this->insert('tbl_pesanan', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat(){
		$query = $this->setQuery("SELECT tbl_pesanan.id, tbl_pemesan.nama AS nama_pemesan, tbl_mobil.nama AS nama_mobil, tbl_jenis_bayar.jenis_bayar FROM tbl_pesanan INNER JOIN tbl_pemesan ON tbl_pesanan.id_pemesan = tbl_pemesan.id INNER JOIN tbl_mobil ON tbl_pesanan.id_mobil = tbl_mobil.id INNER JOIN tbl_jenis_bayar ON tbl_pesanan.id_jenis_bayar = tbl_jenis_bayar.id");
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_pesanan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($data, $id){
		$query = $this->update('tbl_pesanan', $data, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_pesanan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_pesanan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function detail($id){
		$query = $this->setQuery("SELECT tbl_pesanan.*, tbl_pemesan.nama AS nama_pemesan, tbl_mobil.nama AS nama_mobil, tbl_perjalanan.asal, tbl_perjalanan.tujuan, tbl_jenis_bayar.jenis_bayar FROM tbl_pesanan INNER JOIN tbl_pemesan ON tbl_pesanan.id_pemesan = tbl_pemesan.id INNER JOIN tbl_mobil ON tbl_pesanan.id_mobil = tbl_mobil.id INNER JOIN tbl_jenis_bayar ON tbl_pesanan.id_jenis_bayar = tbl_jenis_bayar.id INNER JOIN tbl_perjalanan ON tbl_pesanan.id_perjalanan = tbl_perjalanan.id WHERE tbl_pesanan.id = $id");
		$query = $this->execute();
		return $query;
	}
}