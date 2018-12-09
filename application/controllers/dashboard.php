<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');
	}
	
	function index()
	{
		$menu['title'] = 'Dashboard';
		$menu['menu'] = array('Dashboard|fa-dashboard', 'Performance|fa-th');
		$this->load->library('menu', $menu);
		$data['menu'] = $this->menu->construirMenu();
		$this->load->view('headers', $menu);
		$this->load->view('dashboard', $data);
	}
	
	public function getKPI()
	{
		$datos = $this->Crud_model->getData('usuarios');	
		
		foreach($datos as $kpi){
			echo $kpi['user'];
		}
	}	
}