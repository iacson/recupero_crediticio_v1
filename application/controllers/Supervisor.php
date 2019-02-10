<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supervisor extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');
		$this->load->model('Supervisor_model');		
		$this->load->helper('url');
		
		// 		$this->checkPermisos("Users", "3");
	}

	function index()
	{
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$menu['title'] = 'Supervisor';
		$menu['menu'] = array('Dashboard|fa-dashboard', 'Performance|fa-th');

		$this->load->library('menu', $menu);
		$data['menu'] = $this->menu->construirMenu();
		$this->load->view('headers', $menu);
		$this->load->view('supervisor', $data);
		$this->load->view('modal/modal_supervisor_delete', $data);
		$this->load->view('modal/modal_supervisor_edit', $data);
		$this->load->view('modal/modal_supervisor_refresh', $data);
		$this->load->view('modal/modal_supervisor_add', $data);
	}
	

	public function getSupervisor()
	{
	$data = $this->Supervisor_model->getSupervisor();
		
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


	function supervisor_add()
	{
		$is_ajax = $this->input->is_ajax_request();
		
		if($is_ajax){
			
			$status = TRUE;		
			
			$IdSupervisor    = $this->input->post('IdSupervisor');
			$Supervisor 	= $this->input->post('Supervisor');
			// $birthday     = $this->input->post('birthday');
			// $email     = $this->input->post('email');
			// $job     = $this->input->post('job');
			// $profile     = $this->input->post('profile');
			// $user     = $this->input->post('user');

			$data = array(
				'IdSupervisor'			=> $IdSupervisor,
				'Supervisor'  	=> $Supervisor
				// 'birthday'    	=> $birthday,
				// 'email'    		=> $email,
				// 'job'    		=> $job,
				// 'profile'    	=> $profile,
				// 'user'    		=> $user
			);
					
			$response = $this->Crud_model->insertData('plt_supervisor', $data);
			
			if(!$response){ $status = FALSE; }
			
			if($status)
			{
				$response = array(
					'message' => 'Usuario agregado correctamente.',
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
	
	function supervisor_edit()
	{
		$is_ajax = $this->input->is_ajax_request();
		
		if($is_ajax){
			
			$status = TRUE;		

			$IdSupervisor 			= $this->input->post('IdSupervisor');
			$Supervisor				= $this->input->post('Supervisor');
			// $lastname	= $this->input->post('lastname');
			// $birthday	= $this->input->post('birthday');
			// $email		= $this->input->post('email');
			// $job		= $this->input->post('job');
			// $profile	= $this->input->post('profile');
					
			$data = array(
				'IdSupervisor'			=> $IdSupervisor,
				'Supervisor'			=> $Supervisor
				// 'lastname'  	=> $lastname,
				// 'birthday'    	=> $birthday,
				// 'email'    		=> $email,
				// 'job'    		=> $job,
				// 'profile'    	=> $profile
			);
					
			$response = $this->Crud_model->updateData('plt_supervisor', 'id', $id, $data);
			
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
	
	function supervisor_delete()
	{
		$is_ajax = $this->input->is_ajax_request();
		
		if($is_ajax){
			
			$status = TRUE;		
			
			$id = $this->input->post('id');
			$id = $this->input->post('id');

			$data = array(
				'id' => $id
			);
					
			$response = $this->Crud_model->deleteData('plt_supervisor', 'id', $id);
			
			if(!$response){ $status = FALSE; }
			if($status)
			{
				$response = array(
					'message' => 'Supervisor eliminado.',
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
	
	function supervisor_reset_psw()
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
		
			$response = $this->Crud_model->updateData('plt_supervisor', 'id', $id, $data);
			
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
	
	function supervisor_existe()
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
	
		$response = $this->Crud_model->countData('plt_supervisor', $field, $id);

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