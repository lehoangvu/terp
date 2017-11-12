<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ApiBaseController extends MY_Controller{
	function __construct(){
		parent::__construct();

		header('Access-Control-Allow-Origin: *');  
		header('Content-Type: application/json');
		sleep(1);

		$this->load->library('doctrine');
		$this->em = $this->doctrine->em;

	}

	public function response($data){
		echo json_encode($data);
		$this->em->getConnection()->close();
	}

	public function getQuery($key) {
		$data = $_GET;
		if(isset($data[$key])) return $data[$key];
		return null;
	}

	public function getParram($key) {
		$data = $_POST;
		if(isset($data[$key])) return $data[$key];
		return null;
	}

	public function getRequest($key) {
		$q = $this->getQuery($key);
		if($q) return $q;
		return $this->getParram($key);
	}

}