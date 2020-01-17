<?php 

if(!defined('BASEPATH')) echo "Tidak bisa langsung mengakses halaman ini!";

function base_url($path = null){
	if(isset($path)){
		$path = filter_var($path, FILTER_SANITIZE_URL);
		$path = rtrim($path, '/');

		return BASE_URL . $path;
	}

	return BASE_URL;
}

function redirect($path = null){
	if(isset($path)){
		$path = filter_var($path, FILTER_SANITIZE_URL);
		$path = rtrim($path, '/');

		header('Location: ' . BASE_URL . $path);
	} else header('Location: ' . BASE_URL);
}