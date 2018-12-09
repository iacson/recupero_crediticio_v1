<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	function index()
	{
		$title['title'] = 'Dashboard';
		$this->load->library('menu', array('Dashboard', 'Performance'));
		$data['menu'] = $this->menu->construirMenu();
		$this->load->view('headers', $title);
		$this->load->view('home', $data);
	}
}