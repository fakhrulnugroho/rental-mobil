<?php 

if(!defined('BASEPATH')) echo "Tidak bisa langsung mengakses halaman ini!";

class Database {
	public function __construct(){
		$this->_koneksi = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if($this->_koneksi->connect_error) die('gagal konek!');
	}
	
	public function query($query){
		return $this->_koneksi->query($query);
	}

	public function error(){
		return $this->_koneksi->error;
	}

}