<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	function index()
	{
		$menu['title'] = 'Dashboard';
		$menu['menu'] = array('Dashboard', 'Performance');
		$this->load->library('menu', $menu);
		$data['menu'] = $this->menu->construirMenu();
		$this->load->view('headers', $menu);
		$this->load->view('dashboard', $data);
	}
}