<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');	
		$this->load->helper('url');
	}

	function index()
	{
		$menu['title'] = 'Users';
		$menu['menu'] = array('Dashboard|fa-dashboard', 'Performance|fa-th');
		$this->load->library('menu', $menu);
		$data['menu'] = $this->menu->construirMenu();
		$this->load->view('headers', $menu);
		$this->load->view('users', $data);
		$this->load->view('modal/modal_user_delete');
		$this->load->view('modal/modal_user_edit');
		$this->load->view('modal/modal_user_refresh');
		$this->load->view('modal/modal_user_add');
	}
}
?>