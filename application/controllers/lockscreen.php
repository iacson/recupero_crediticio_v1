<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lockscreen extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');	
		$this->load->helper('url');
	}

	function index(){
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);

		$this->load->view('lockscreen');
}}

// dklashdkjashd
}
?>