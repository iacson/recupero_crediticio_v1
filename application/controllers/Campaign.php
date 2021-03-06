<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaign extends CI_Controller {
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
		
		$menu['title'] = 'Campaign';
		$menu['menu'] = array('Dashboard|fa-dashboard', 'Performance|fa-th');

		$this->load->library('menu', $menu);
		$data['menu'] = $this->menu->construirMenu();
		$this->load->view('headers', $menu);
		$this->load->view('campaign', $data);
		$this->load->view('modal/modal_campaign_delete', $data);
		$this->load->view('modal/modal_campaign_edit', $data);
		$this->load->view('modal/modal_campaign_add', $data);
	}
	// tuviejaentanga

	function campaign_add()
	{
		$is_ajax = $this->input->is_ajax_request();
		
		if($is_ajax){
			
			$status = TRUE;		
			
			$IdCampana		= $this->input->post('IdCampana');
			$Campana 		= $this->input->post('Campana');
			// $birthday     = $this->input->post('birthday');
			// $email     = $this->input->post('email');
			// $job     = $this->input->post('job');
			// $profile     = $this->input->post('profile');
			// $user     = $this->input->post('user');

			$data = array(
				'IdCampana'			=> $IdCampana,
				'Campana'  			=> $Campana
				// 'birthday'    	=> $birthday,
				// 'email'    		=> $email,
				// 'job'    		=> $job,
				// 'profile'    	=> $profile,
				// 'user'    		=> $user
			);


					
			$response = $this->Crud_model->insertData('plt_campanas', $data);
			
			if(!$response){ $status = FALSE; }
			
			if($status)
			{
				$response = array(
					'message' => 'Campaña agregado correctamente.',
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
	
	function campaign_edit()
	{
		$is_ajax = $this->input->is_ajax_request();
		
		if($is_ajax){
			
			$status = TRUE;		
			
			$IdCampana			= $this->input->post('IdCampana');
			$Campana			= $this->input->post('Campana');
			// $lastname	= $this->input->post('lastname');
			// $birthday	= $this->input->post('birthday');
			// $email		= $this->input->post('email');
			// $job		= $this->input->post('job');
			// $profile	= $this->input->post('profile');
					




			$data = array(
				'IdCampana'			=> $IdCampana,
				'Campana'			=> $Campana
				// 'lastname'  	=> $lastname,
				// 'birthday'    	=> $birthday,
				// 'email'    		=> $email,
				// 'job'    		=> $job,
				// 'profile'    	=> $profile
			);
					
			$response = $this->Crud_model->updateData('plt_campanas', 'id', $id, $data);
			
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
	
	function campaign_delete()
	{
		$is_ajax = $this->input->is_ajax_request();
		
		if($is_ajax){
			
			$status = TRUE;		
			
			$id = $this->input->post('id');
			$id = $this->input->post('id');

			$data = array(
				'id' => $id
			);
					
			$response = $this->Crud_model->deleteData('plt_campanas', 'id', $id);
			
			if(!$response){ $status = FALSE; }
			if($status)
			{
				$response = array(
					'message' => 'Campaña eliminado.',
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
	
	// function campaign_reset_psw()
	// {
	// 	$is_ajax = $this->input->is_ajax_request();
		
	// 	if($is_ajax){
			
	// 		$status = TRUE;		
			
	// 		$id 	= $this->input->post('id');
	// 		$psw 	= rand (100000, 999999);

	// 		$data = array(
	// 			'id' 		=> $id,
	// 			'password' 	=> $psw
	// 		);
		
	// 		$response = $this->Crud_model->updateData('usuarios', 'id', $id, $data);
			
	// 		if(!$response){ $status = FALSE; }
	// 		if($status)
	// 		{
	// 			$response = array(
	// 				'message' => 'Password reiniciada.',
	// 				'type'    => 'success'
	// 			);
	// 		}
	// 		else
	// 		{
	// 			$response = array(
	// 				'message' => 'Error, verifique los datos.',
	// 				'type'    => 'warn'
	// 			);
	// 		}

	// 		echo json_encode($response);
	// 		die;
	// 	}
	// 	else
	// 	{
	// 		$response = array(
	// 			'message' => 'Error de seguridad.',
	// 			'type'    => 'warn'
	// 		);
			
	// 		echo json_encode($response);
	// 		die;
	// 	}
	// }
	
	function campaign_existe()
	{		
		$type = $this->input->get('type');
		
		if($type == 'id'){

			$field 	= 'id';
			$id 	= $this->input->get('id');

		} else {
			$field 	= 'campaign';
			$id 	= $this->input->get('campaign');				
		}
		
		$data = array(
			$field => $id
		);
	
		$response = $this->Crud_model->countData('plt_campanas', $field, $id);

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