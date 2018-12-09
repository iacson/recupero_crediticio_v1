<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Performance extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	function index()
	{
		$menu['title'] = 'Performance';
		$menu['menu'] = array('Dashboard', 'Performance');
		$this->load->library('menu', $menu);
		$data['menu'] = $this->menu->construirMenu();
		$this->load->view('headers', $menu);
		$this->load->view('performance', $data);
	}
}