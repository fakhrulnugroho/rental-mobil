<?php 

if(!defined('BASEPATH')) echo "Tidak bisa langsung mengakses halaman ini!";

class Controller {
	public function view($view, $data = []){
		if(isset($data)) extract($data);

		if(file_exists(V_PATH . DS . $view . '.php')) require_once V_PATH . DS . $view . '.php';
		else die('view tidak ditemukan!');
	}

	public function model($model){
		if(file_exists(M_PATH . DS . $model . '.php')) require_once M_PATH . DS . $model . '.php';
		else die('model tidak ditemukan!');

		return new $model();
	}

	public function addFunction($function){
		if(file_exists(F_PATH . DS . $function . '_function.php')) require_once F_PATH . DS . $function . '_function.php';
		else die('function tidak ditemukan!');
	}

	public function library($library){
		if(file_exists(L_PATH . DS . $library . '.php')) require_once L_PATH . DS . $library . '.php';
		else die('library tidak ditemukan!');

		return new $library();
	}
}