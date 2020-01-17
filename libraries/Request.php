<?php 

if(!defined('BASEPATH')) echo "Tidak bisa langsung mengakses halaman ini!";

class Request {
	public function post($post){
		if(isset($_POST[$post])) return $_POST[$post];
		else die("index {$post} tidak diketahui");
	}

	public function get($get){
		if(isset($_GET[$get])) return $_GET[$get];
		else die("index {$get} tidak diketahui");
	}
}