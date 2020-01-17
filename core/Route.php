<?php 

if(!defined('BASEPATH')) echo "Tidak bisa langsung mengakses halaman ini!";

class Route {

	protected $_url;
	protected $_controller;
	protected $_method;
	protected $_params = [];

	public function __construct(){
		$this->_dispatchUrl();
		$this->_setController();
		$this->_setMethod();
		$this->_setParams();

		if(method_exists($this->_controller, $this->_method)) call_user_func_array([$this->_controller, $this->_method], $this->_params);
		else die('method tidak ditemukan!');
	}

	protected function _dispatchUrl(){
		$this->_url = isset($_GET['url']) ? $_GET['url'] : '';
		$this->_url = filter_var($this->_url, FILTER_SANITIZE_URL);
		$this->_url = rtrim($this->_url, '/');
		$this->_url = explode('/', $this->_url);
	}

	protected function _setController(){
		if($this->_url[0] != '') $this->_controller = 'C_' . ucfirst($this->_url[0]);
		else $this->_controller = DEFAULT_CONTROLLER;

		if(file_exists(C_PATH . DS . $this->_controller . '.php')) {
			require_once C_PATH . DS . $this->_controller . '.php';
			$this->_controller = new $this->_controller();
			unset($this->_url[0]);
		} else die('controller tidak ditemukan!');
	}

	protected function _setMethod(){
		if(isset($this->_url[1])) $this->_method = $this->_url[1];
		else $this->_method = 'index';

		if(method_exists($this->_controller, $this->_method)) unset($this->_url[1]);
	}

	protected function _setParams(){
		if(!empty($this->_url)) $this->_params = array_values($this->_url);
	}
}