<?php 

if(!defined('BASEPATH')) echo "Tidak bisa langsung mengakses halaman ini!";

function setSession($key, $value){
	$_SESSION[$key] = $value;
}

function checkSession($key){
	if(isset($_SESSION[$key])) return true;
	else return false;
}

function getSession($key, $unset = false){
	$session = $_SESSION[$key];
	if($unset) unset($_SESSION[$key]);
	return $session;
}