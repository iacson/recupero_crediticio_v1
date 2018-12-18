<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');	
		$this->load->helper('url');
		
		// 		$this->checkPermisos("Users", "3");
	}

	function index()
	{
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$menu['title'] = 'Users';
		$menu['menu'] = array('Dashboard|fa-dashboard', 'Performance|fa-th');

		$this->load->library('menu', $menu);
		$data['menu'] = $this->menu->construirMenu();
		$this->load->view('headers', $menu);
		$this->load->view('users', $data);
		$this->load->view('modal/modal_user_delete', $data);
		$this->load->view('modal/modal_user_edit', $data);
		$this->load->view('modal/modal_user_refresh', $data);
		$this->load->view('modal/modal_user_add', $data);
	}
	
	function user_add()
	{
		$is_ajax = $this->input->is_ajax_request();
		
		if($is_ajax){
			
			$status = TRUE;		
			
			$name     = $this->input->post('name');
			$lastname 	= $this->input->post('lastname');
			$birthday     = $this->input->post('birthday');
			$email     = $this->input->post('email');
			$job     = $this->input->post('job');
			$profile     = $this->input->post('profile');
			$user     = $this->input->post('user');

			$data = array(
				'name'			=> $name,
				'lastname'  	=> $lastname,
				'birthday'    	=> $birthday,
				'email'    		=> $email,
				'job'    		=> $job,
				'profile'    	=> $profile,
				'user'    		=> $user
			);
					
			$response = $this->Crud_model->insertData('usuarios', $data);
			
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
	
	function user_edit()
	{
		$is_ajax = $this->input->is_ajax_request();
		
		if($is_ajax){
			
			$status = TRUE;		
			
			$id			= $this->input->post('id');
			$name		= $this->input->post('name');
			$lastname	= $this->input->post('lastname');
			$birthday	= $this->input->post('birthday');
			$email		= $this->input->post('email');
			$job		= $this->input->post('job');
			$profile	= $this->input->post('profile');
					
			$data = array(
				'id'			=> $id,
				'name'			=> $name,
				'lastname'  	=> $lastname,
				'birthday'    	=> $birthday,
				'email'    		=> $email,
				'job'    		=> $job,
				'profile'    	=> $profile
			);
					
			$response = $this->Crud_model->updateData('usuarios', 'id', $id, $data);
			
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
	
	function user_delete()
	{
		$is_ajax = $this->input->is_ajax_request();
		
		if($is_ajax){
			
			$status = TRUE;		
			
			$id = $this->input->post('id');
			$id = $this->input->post('id');

			$data = array(
				'id' => $id
			);
					
			$response = $this->Crud_model->deleteData('usuarios', 'id', $id);
			
			if(!$response){ $status = FALSE; }
			if($status)
			{
				$response = array(
					'message' => 'Usuario eliminado.',
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
	
	function user_reset_psw()
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
		
			$response = $this->Crud_model->updateData('usuarios', 'id', $id, $data);
			
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
	
	function user_existe()
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
	
		$response = $this->Crud_model->countData('usuarios', $field, $id);

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