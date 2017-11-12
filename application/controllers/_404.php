<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _404 extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('404');
	}
}
