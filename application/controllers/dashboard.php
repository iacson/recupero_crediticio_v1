<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');	
		$this->load->helper('url');
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
		$data = $this->Crud_model->getDataResultById('kpi', 'HABILITADO', 1);
		if(count($data) > 0)
		{
			$response = array(
				'message' => $data,
				'type'    => 'success'
			);
		}
		else
		{
			$response = array(
				'message' => 'Error, verifique los datos.',
				'type'    => 'warn'
			);
		}
		
		echo json_encode($response);
		die;
	}
}
?>