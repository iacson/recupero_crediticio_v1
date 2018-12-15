<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lockscreen extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');	
		$this->load->helper('url');
	}

	function index(){
//		$this->load->view('login', $data);
		$this->load->view('lockscreen');
	}
}
?>