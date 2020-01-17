<?php 

function partial($file, $data = null){
	if (isset($data)) {
		$data = $data;
	}
	require_once V_PATH . DS . '_partials' . DS . $file . '.php';
}