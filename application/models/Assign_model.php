<?php

class Assign_model extends CI_Model {
	
    function __construct() {
        parent::__construct();
    }
	
	function getAssign()
	{
		$sql =" 
			SELECT 
				Id, 
				Nombre, 
				Apellido, 
				usuario, 
				IFNULL(PercRecupero, 0) 		AS PercRecupero, 
				IFNULL(Campana, 'S/A') 			AS Campana, 
				IFNULL(Supervisor, 'S/A') 		AS Supervisor, 
				IFNULL(JefeOp, 'S/A') 		AS JefeOp 
			from usuarios AS u

			INNER JOIN (
				SELECT DISTINCT
					IdAgente
				FROM logllamados
				WHERE DATE(FechaHoraInicio) >= '2019-02-01'
			) AS A ON (A.IdAgente = u.Id)

			LEFT JOIN (
				SELECT
					IdAgente, IdCampana, IdJefeOp, IdSupervisor, PercRecupero
				FROM plt_asignaciones
			) AS B ON (B.IdAgente = u.Id)

			LEFT JOIN (
				SELECT
					IdCampana, Campana
				FROM plt_campanas
			) AS C ON (C.IdCampana = B.IdCampana)

			LEFT JOIN (
				SELECT
					IdSupervisor, Supervisor
				FROM plt_supervisor
			) AS D ON (D.IdSupervisor = B.IdSupervisor)

			LEFT JOIN (
				SELECT
					IdJefeOp, JefeOp
				FROM plt_jefeop
			) AS E ON (E.IdJefeOp = B.IdJefeOp)
		";
		
		return $query = $this->db->query($sql)->result_array();
	}
}