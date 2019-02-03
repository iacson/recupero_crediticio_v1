<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Performance extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');
		$this->load->model('Performance_model');
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
	$data = $this->Performance_model->getPerformance();
		
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
	
	public function getKPI()
	{
	$data = $this->Performance_model->getKPI();
		
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
	
	
	public function getAssign()
	{
	$data = $this->Performance_model->getAssign();
		
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
		
		function cellColor($cells,$color, $objPHPExcel){
			
			$objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'startcolor' => array('rgb' => $color)
			));
		}

		include APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php';
		include APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
		
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("");
		$objPHPExcel->getProperties()->setLastModifiedBy("");
		$objPHPExcel->getProperties()->setTitle("");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");
		
		$objPHPExcel->setActiveSheetIndex(0);
		
		$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
		$gdImage = imagecreatefromjpeg(FCPATH.'assets/img/logo_rc_ancho.jpg');
		$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
		$objDrawing->setName('Sample image');$objDrawing->setDescription('Recupero Crediticio');
		$objDrawing->setImageResource($gdImage);
		$objDrawing->setCoordinates('A3');
		$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
		$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
		$objDrawing->setHeight(100);
		$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());


		//Fecha Hora
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$date = date('m/d/Y h:i:s a', time());

		$objPHPExcel->getActiveSheet()->mergeCells('F3:J7');
		$objPHPExcel->getActiveSheet()->SetCellValue('A10', $date);
				
		$objPHPExcel->getActiveSheet()->mergeCells('M3:T7');
		$objPHPExcel->getActiveSheet()->SetCellValue('A10','Performance');


		$objPHPExcel->getActiveSheet()->mergeCells('A10:Q10');
		$objPHPExcel->getActiveSheet()->mergeCells('R10:AF10');
		$objPHPExcel->getActiveSheet()->mergeCells('AG10:AK10');
		$objPHPExcel->getActiveSheet()->mergeCells('AL10:AP10');
		$objPHPExcel->getActiveSheet()->mergeCells('AQ10:AS10');
		$objPHPExcel->getActiveSheet()->SetCellValue('A10','Logueo');
		$objPHPExcel->getActiveSheet()->SetCellValue('R10','Totales');
		$objPHPExcel->getActiveSheet()->SetCellValue('AG10','Calidades');
		$objPHPExcel->getActiveSheet()->SetCellValue('AL10','Auxiliares');
		$objPHPExcel->getActiveSheet()->SetCellValue('AQ10','Cantidad');
		cellColor('A10:AU10','2E9AFE', $objPHPExcel);
		$objPHPExcel->getActiveSheet()->getStyle("A10:AU10")->getFont()->setBold(true);
		
		$objPHPExcel->getActiveSheet()->SetCellValue('A11','idAgente');
		$objPHPExcel->getActiveSheet()->SetCellValue('B11','Int');
		$objPHPExcel->getActiveSheet()->SetCellValue('C11','Box');
		$objPHPExcel->getActiveSheet()->SetCellValue('D11','Agente');
		$objPHPExcel->getActiveSheet()->SetCellValue('E11','LogIn');
		$objPHPExcel->getActiveSheet()->SetCellValue('F11','LogOut');
		$objPHPExcel->getActiveSheet()->SetCellValue('G11','HoraPrimerLlamado');
		$objPHPExcel->getActiveSheet()->SetCellValue('H11','HoraUltimoLlamado');
		$objPHPExcel->getActiveSheet()->SetCellValue('I11','TiempoMuerto');
		$objPHPExcel->getActiveSheet()->SetCellValue('J11','TotalLogueo');
		$objPHPExcel->getActiveSheet()->SetCellValue('K11','TotalComunicacion');
		$objPHPExcel->getActiveSheet()->SetCellValue('L11','CantidadLLamdas');
		$objPHPExcel->getActiveSheet()->SetCellValue('M11','CuentasTadas');
		$objPHPExcel->getActiveSheet()->SetCellValue('N11','QMinCtas');
		$objPHPExcel->getActiveSheet()->SetCellValue('O11','CantidadGestiones');
		$objPHPExcel->getActiveSheet()->SetCellValue('P11','CtTitular');
		$objPHPExcel->getActiveSheet()->SetCellValue('Q11','CtFamiliar');
		$objPHPExcel->getActiveSheet()->SetCellValue('R11','CtTercero');
		$objPHPExcel->getActiveSheet()->SetCellValue('S11','Compromisos');
		$objPHPExcel->getActiveSheet()->SetCellValue('T11','Recupero');
		$objPHPExcel->getActiveSheet()->SetCellValue('U11','RecuperoCuotas');
		$objPHPExcel->getActiveSheet()->SetCellValue('V11','Cuponeras');
		$objPHPExcel->getActiveSheet()->SetCellValue('W11','TBreak');
		$objPHPExcel->getActiveSheet()->SetCellValue('X11','TBaño');
		$objPHPExcel->getActiveSheet()->SetCellValue('Y11','TCoach');
		$objPHPExcel->getActiveSheet()->SetCellValue('Z11','NoResponde');
		$objPHPExcel->getActiveSheet()->SetCellValue('AA11','Ocupado');
		$objPHPExcel->getActiveSheet()->SetCellValue('AB11','ImpContactar');
		$objPHPExcel->getActiveSheet()->SetCellValue('AC11','Cliente');
		$objPHPExcel->getActiveSheet()->SetCellValue('AD11','PopUp');
		$objPHPExcel->getActiveSheet()->SetCellValue('AE11','QSalientes');
		$objPHPExcel->getActiveSheet()->SetCellValue('AF11','QEntrantes');
		$objPHPExcel->getActiveSheet()->SetCellValue('AG11','TotalLlamados');
		$objPHPExcel->getActiveSheet()->SetCellValue('AH11','ParamLlamdas');
		$objPHPExcel->getActiveSheet()->SetCellValue('AI11','Supervisor');
		$objPHPExcel->getActiveSheet()->SetCellValue('AJ11','Qnrep');
		$objPHPExcel->getActiveSheet()->SetCellValue('AK11','MayorRep');
		$objPHPExcel->getActiveSheet()->SetCellValue('AL11','NroTelRep');
		$objPHPExcel->getActiveSheet()->SetCellValue('AM11','CantiRepInternos');
		$objPHPExcel->getActiveSheet()->SetCellValue('AN11','DurLlamInternos');
		$objPHPExcel->getActiveSheet()->SetCellValue('AO11','TNoMolestar');
		$objPHPExcel->getActiveSheet()->SetCellValue('AP11','PorcLlam');
		$objPHPExcel->getActiveSheet()->SetCellValue('AQ11','PorcGest');
		$objPHPExcel->getActiveSheet()->SetCellValue('AR11','PorcContact');
		$objPHPExcel->getActiveSheet()->SetCellValue('AS11','IndJust');
		
		$filename="Performance ".gmdate('y-m-d').".xls";
		$objPHPExcel->getActiveSheet()->setTitle('Performance');
		

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');

		header ('Expires: Mon, 26 Jul 2099 05:00:00 GMT');
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
		header ('Cache-Control: cache, must-revalidate');
		header ('Pragma: public');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$xlsData = $objWriter->save('php://output');

	}
}