<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Performance extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');
		$this->load->helper('url');
	}
	
	function index()
	{
		$menu['title'] = 'Performance';
		$menu['menu'] = array('Dashboard|fa-dashboard', 'Performance|fa-th');
		$this->load->library('menu', $menu);
		$data['menu'] = $this->menu->construirMenu();
		$this->load->view('headers', $menu);
		$this->load->view('performance', $data);
	}
}