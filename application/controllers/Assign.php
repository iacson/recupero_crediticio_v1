<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assign extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');
		$this->load->model('Assign_model');	
		$this->load->helper('url');
		
	}

	function index()
	{
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$menu['title'] = 'Assign';
		$menu['menu'] = array('Dashboard|fa-dashboard', 'Performance|fa-th');

		$this->load->library('menu', $menu);
		$data['menu'] = $this->menu->construirMenu();
		$this->load->view('headers', $menu);
		$this->load->view('assign', $data);
		$this->load->view('modal/modal_assign_add', $data);
		$this->load->view('modal/modal_assign_edit', $data);
		$this->load->view('modal/modal_assign_delete', $data);
		
	}
	

public function getAssign()
	{
	$data = $this->Assign_model->getAssign();
		
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

	public function getAssignById()
	{
	$Id		= $this->input->get('Id');
	$data = $this->Crud_model->getDataResultById('plt_asignaciones', 'idAgente', $Id);
		
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

	function assign_add()
	{
		$is_ajax = $this->input->is_ajax_request();
		
		if($is_ajax){
			
			$status = TRUE;		
			
			$IdAgente		= $this->input->post('IdAgente');
			$IdJefeOp		= $this->input->post('IdJefeOp');
			$IdSupervisor	= $this->input->post('IdSupervisor');
			$IdCampana		= $this->input->post('IdCampana');
			$PercRecupero	= $this->input->post('PercRecupero');
			// $profile     = $this->input->post('profile');
			// $user     = $this->input->post('user');

			$data = array(
				'IdAgente'			=> $IdAgente,
				'IdJefeOp'  		=> $IdJefeOp,
				'IdSupervisor '    	=> $IdSupervisor ,
				'IdCampana'    		=> $IdCampana,
				'PercRecupero' 		=> $PercRecupero
				// 'profile'    	=> $profile,
				// 'user'    		=> $user
			);
					
			$response = $this->Crud_model->insertData('plt_assign', $data);
			
			if(!$response){ $status = FALSE; }
			
			if($status)
			{
				$response = array(
					'message' => 'Asignación agregada correctamente.',
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
		else
		{
			$response = array(
				'message' => 'Error, token revocado.',
				'type'    => 'warn'
			);
			
			echo json_encode($response);
			die;
		}
	}
	
	function assign_edit()
	{
		$is_ajax = $this->input->is_ajax_request();
		
		if($is_ajax){
			
			$status = TRUE;		
			
			// $id			= $this->input->post('id');
			$IdAgente		= $this->input->post('IdAgente');
			$IdJefeOp		= $this->input->post('IdJefeOp');
			$IdSupervisor 	= $this->input->post('IdSupervisor');
			$IdCampana 		= $this->input->post('IdCampana');
			$PercRecupero	= $this->input->post('PercRecupero');
		
					
			$data = array(
				// 'id'			=> $id,
				'IdAgente'			=> $IdAgente,
				'IdJefeOp'  		=> $IdJefeOp,
				'IdSupervisor'    	=> $IdSupervisor,
				'IdCampana'    		=> $IdCampana,
				'PercRecupero'    	=> $PercRecupero
				// 'PercRecupero'    	=> $profile
			);
					
			$response = $this->Crud_model->updateData('plt_assign', 'id', $id, $data);
			
			if(!$response){ $status = FALSE; }
			
			if($status)
			{
				$response = array(
					'message' => 'Cambios guardados.',
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
		else
		{
			$response = array(
				'message' => 'Error, token revocado.',
				'type'    => 'warn'
			);
			
			echo json_encode($response);
			die;
		}
	}
	
	function assign_delete()
	{
		$is_ajax = $this->input->is_ajax_request();
		
		if($is_ajax){
			
			$status = TRUE;		
			
			$id = $this->input->post('id');
			$id = $this->input->post('id');

			$data = array(
				'id' => $id
			);
					
			$response = $this->Crud_model->deleteData('plt_assign', 'id', $id);
			
			if(!$response){ $status = FALSE; }
			if($status)
			{
				$response = array(
					'message' => 'Asignación eliminada.',
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
		else
		{
			$response = array(
				'message' => 'Error de seguridad.',
				'type'    => 'warn'
			);
			
			echo json_encode($response);
			die;
		}
	}
	
	function assign_reset_psw()
	{
		$is_ajax = $this->input->is_ajax_request();
		
		if($is_ajax){
			
			$status = TRUE;		
			
			$id 	= $this->input->post('id');
			$psw 	= rand (100000, 999999);

			$data = array(
				'id' 		=> $id,
				'password' 	=> $psw
			);
		
			$response = $this->Crud_model->updateData('plt_assign', 'id', $id, $data);
			
			if(!$response){ $status = FALSE; }
			if($status)
			{
				$response = array(
					'message' => 'Password reiniciada.',
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
		else
		{
			$response = array(
				'message' => 'Error de seguridad.',
				'type'    => 'warn'
			);
			
			echo json_encode($response);
			die;
		}
	}
	
	function assign_existe()
	{		
		$type = $this->input->get('type');
		
		if($type == 'email'){

			$field 	= 'email';
			$id 	= $this->input->get('email');

		} else {
			$field 	= 'user';
			$id 	= $this->input->get('user');				
		}
		
		$data = array(
			$field => $id
		);
	
		$response = $this->Crud_model->countData('plt_assign', $field, $id);

		if($response == 0){
			$existe = FALSE;
		} else {
			$existe = TRUE;
		}
		
		echo json_encode($existe);
		die;
	}
}
?>