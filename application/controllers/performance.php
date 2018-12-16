<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Performance extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');
		$this->load->helper('url');
	}
	
	function index()
	{
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);

		$menu['title'] = 'Performance';
		$menu['menu'] = array('Dashboard|fa-dashboard', 'Performance|fa-th');
		$this->load->library('menu', $menu);
		$data['menu'] = $this->menu->construirMenu();
		$this->load->view('headers', $menu);
		$this->load->view('performance', $data);
	}
	
	public function getPerformance()
	{
		$data = $this->Crud_model->getData('performance');
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
	
	public function export_performance_xls(){
		include APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php';
		include APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
		
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("");
		$objPHPExcel->getProperties()->setLastModifiedBy("");
		$objPHPExcel->getProperties()->setTitle("");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");
		
		$objPHPExcel->setActiveSheetIndex(0);
		
		$objPHPExcel->getActiveSheet()->SetCellValue('A1','idAgente');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1','Int');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1','Box');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1','Agente');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1','LogIn');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1','LogOut');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1','HoraPrimerLlamado');
		$objPHPExcel->getActiveSheet()->SetCellValue('H1','HoraUltimoLlamado');
		$objPHPExcel->getActiveSheet()->SetCellValue('I1','TiempoMuerto');
		$objPHPExcel->getActiveSheet()->SetCellValue('J1','TotalLogueo');
		$objPHPExcel->getActiveSheet()->SetCellValue('K1','TotalComunicacion');
		$objPHPExcel->getActiveSheet()->SetCellValue('L1','CantidadLLamdas');
		$objPHPExcel->getActiveSheet()->SetCellValue('M1','CuentasTadas');
		$objPHPExcel->getActiveSheet()->SetCellValue('N1','QMinCtas');
		
		/*
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',CantidadGestiones;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',CtTitular;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',CtFamiliar;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',CtTercero;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',Compromisos;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',Recupero;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',RecuperoCuotas;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',Cuponeras;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',TBreak;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',TBaño;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',TCoach;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',NoResponde;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',Ocupado;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',ImpContactar;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',Cliente;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',PopUp;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',QSalientes;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',QEntrantes;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',TotalLlamados;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',ParamLlamdas;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',Supervisor;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',Qnrep;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',MayorRep;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',NroTelRep;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',CantiRepInternos;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',DurLlamInternos;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',TNoMolestar;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',PorcLlam;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',PorcGest;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',PorcContact;
		$objPHPExcel->getActiveSheet()->SetCellValue('A1',IndJust;
		*/
		
		$filename="Performance.xls";
		$objPHPExcel->getActiveSheet()->setTitle('Performance');
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		
		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$writer->save('php://output');
		
		exit;
	}
}