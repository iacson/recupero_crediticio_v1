<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');	
		$this->load->model('Login_model');	
		$this->load->helper('url');
		$this->load->library('session');
	}

	function index(){
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$this->load->view('login');
	}
	
	public function Login(){
		
		$user = 		$this->input->post('user');
		$password = 	$this->input->post('password');
		
		$result = $this->Login_model->IsLogin($user, $password);
		
		echo 'probando';
		
	}
}
?>