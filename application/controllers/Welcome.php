<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public $em;
	function __construct(){
		parent::__construct();
		$this->load->library('doctrine');
		$this->load->library('Dx');
		$this->em = $this->doctrine->em;
	}
	// $params['key'] = '3td137h4ogmr7vw';
	// $params['secret'] = 's4obfh42j0mumgu';
	public function request_dropbox()
	{
		$params['key'] = '3td137h4ogmr7vw';
	  $params['secret'] = 's4obfh42j0mumgu';

	   $this->load->library('dropbox', $params);
	   $data = $this->dropbox->get_request_token(site_url("/access_dropbox"));
	   $this->session->set_userdata('token_secret', $data['token_secret']);
	   redirect($data['redirect']);
	}

	public function access_dropbox()
	{
		$params['key'] = '3td137h4ogmr7vw';
	  $params['secret'] = 's4obfh42j0mumgu';

	   $this->load->library('dropbox', $params);
	   echo $this->session->userdata('token_secret')."<br/>";
	   $oauth = $this->dropbox->get_access_token($this->session->userdata('token_secret'));

	   echo $oauth['oauth_token']."<br/>".$oauth['oauth_token_secret'];
// 	   dxhHI5UDEi8qQKi6
// 0doqn96lzf0zjdxh
// 2xi9r0234onrt0s
	}

	public function index()
	{
		$params['key'] = '3td137h4ogmr7vw';
	  $params['secret'] = 's4obfh42j0mumgu';
	  $params['access'] = array('oauth_token'=>'0doqn96lzf0zjdxh',
	                            'oauth_token_secret'=>'2xi9r0234onrt0s');

	  $this->load->library('dropbox', $params);
		$this->dropbox->create_folder('/dx');
	}
}
