<?php

class Performance_model extends CI_Model {
	
    function __construct() {
        parent::__construct();
    }
	
	function getPerformance()
	{
		$sql = "

	SELECT 
		0 AS `Ctas`,
		0 AS `MinCtas`,
		0 AS `CtasGest.`,
		0 AS `Gest.`,
		0 AS `ContactoTitular`,
		0 AS `PP`,
		0 AS `PercContacto`,
        T2.Nombre, 
        T2.Apellido, 
        T1.LogIn,
        T1.LogOut,
        SEC_TO_TIME(TIME_TO_SEC(LogOut) - TIME_TO_SEC(LogIn)) AS `TotalLogueo`,
        T3.PrimerLlamada, 
        T3.UltimaLlamada, 
        IFNULL(`Pop up`, 0)                                                                          AS Popup, 
        IFNULL(Salientes, 0)                                                                         AS Salientes, 
        IFNULL(Entrantes, 0)                                                                         AS Entrantes,
        (IFNULL(Salientes,0) + IFNULL(Entrantes,0))                 AS `TotalLlamadas`,
        FLOOR((TIME_TO_SEC(LogOut) - TIME_TO_SEC(LogIn)) / 180) AS `MinLlamadas`,
                CONCAT(
                        FORMAT (
                                (IFNULL(Salientes, 0) + IFNULL(Entrantes, 0)) / FLOOR((TIME_TO_SEC(LogOut) - TIME_TO_SEC(LogIn)) / 180) * 100
                        , 2)
                , '%') AS `PercLlamadas`,        
        SEC_TO_TIME(IFNULL(`Total Comunicacion`, 0)) AS `TotalComunicacion`,
        CONCAT(
                FORMAT (
                        (IFNULL(`Total Comunicacion`,0)) / ((TIME_TO_SEC(LogOut) - TIME_TO_SEC(LogIn))) * 100
                , 2)
        ,'%') AS `% Total Comunicacion`,
        SEC_TO_TIME(IFNULL(`Tiempo Ocioso`, 0)) AS `TiempoOcioso`,
        
        CONCAT(FORMAT(IFNULL(`Tiempo Ocioso`,0) / (TIME_TO_SEC(LogOut) - TIME_TO_SEC(LogIn)) * 100, 2), '%') AS `PercTiempoOcioso`,
        SEC_TO_TIME(IFNULL(`Tiempo Break`,0)) AS `TiempoBreak`,
        SEC_TO_TIME(IFNULL(`Tiempo Bano`,0)) AS `TiempoBano`,
        SEC_TO_TIME(IFNULL(`Tiempo Leader`,0)) AS `TiempoLeader`,
        SEC_TO_TIME(IFNULL(`Tiempo Coach`,0)) AS `TiempoCoach`,
        SEC_TO_TIME(IFNULL(`Tiempo Admin`,0)) AS `TiempoAdmin`,
        SEC_TO_TIME(IFNULL(`Tiempo Wsp`,0)) AS `TiempoWsp`,
        SEC_TO_TIME(IFNULL(`Tiempo Tipeo`,0)) AS `TiempoTipeo`,
        CONCAT(
                FORMAT (        
                        (IFNULL(`Total Comunicacion`, 0) + IFNULL(`Tiempo Admin`, 0) + IFNULL(`Tiempo Tipeo`,0))        / (TIME_TO_SEC(LogOut) - TIME_TO_SEC(LogIn)) * 100
                        , 2)
        , '%') AS `PercTotalProd`,
        IFNULL(`Max Repeteciones`, 0) AS `MaxRepeteciones`
        

        FROM(
                SELECT                 
                                                                IdAgente,
                                                                MIN(FechaHoraInicio) AS LogIn, 
                                                                MAX(fechahorafin) AS LogOut
                FROM telepromdb.logestados 
                WHERE DATE(FechaHoraInicio) = '2019-02-01'
                GROUP BY IdAgente) AS T1
                INNER JOIN usuarios as T2 ON (T1.IdAgente = T2.Id)
                INNER JOIN (
                SELECT IdAgente, 
                                MIN(FechaHoraInicio) AS PrimerLlamada, 
                                MAX(FechaHoraInicio) AS UltimaLlamada
                FROM telepromdb.logestados
                WHERE DATE(FechaHoraInicio) = '2019-02-01' AND IdEstado BETWEEN '120' AND '190'
                GROUP BY IdAgente) AS T3 ON (T3.IdAgente = T2.Id)
                
                LEFT JOIN (
                SELECT 
                        IdAgente,
                        COUNT(Id) AS `Pop up`
                FROM telepromdb.logestados
                WHERE IdEstado IN (120, 150) AND DATE(FechaHoraInicio) = '2019-02-01'
                GROUP BY IdAgente
                ) as T4 ON (T4.IdAgente = T2.Id)                        
                LEFT JOIN (
                SELECT 
                        IdAgente,
                        COUNT(Id) AS `Salientes`
                FROM telepromdb.logestados
                WHERE IdEstado IN (120, 130, 140) AND DATE(FechaHoraInicio) = '2019-02-01'
                GROUP BY IdAgente
                ) as T5 ON (T5.IdAgente = T2.Id)                                                
                
                LEFT JOIN (
                SELECT
                        IdAgente,
                        COUNT(Id) AS `Entrantes`
                FROM telepromdb.logestados
                WHERE IdEstado IN (150, 160, 170) AND DATE(FechaHoraInicio) = '2019-02-01'
                GROUP BY IdAgente
                ) as T6 ON (T6.IdAgente = T2.Id)
                
                LEFT JOIN (
                SELECT IdAgente, 
                        SUM(TComunicacion) AS `Total Comunicacion`
                FROM (SELECT
                                        IdAgente,
                                        TIME_TO_SEC(MAX(fechahorafin)) - TIME_TO_SEC(MIN(FechaHoraInicio)) AS TComunicacion
                                FROM telepromdb.logestados
                                WHERE DATE(FechaHoraInicio) = '2019-02-01' AND IdEstado BETWEEN 30 AND 190
                                GROUP BY IdAgente, FechaHoraInicio) AS TMP1
                GROUP BY IdAgente
                ) as T7 ON (T7.IdAgente = T2.Id)
                
                LEFT JOIN (
                SELECT IdAgente, 
                        SUM(TOcioso) AS `Tiempo Ocioso`
                FROM (SELECT
                                        IdAgente,
                                        TIME_TO_SEC(MAX(fechahorafin)) - TIME_TO_SEC(MIN(FechaHoraInicio)) AS TOcioso
                                FROM telepromdb.logestados
                                WHERE DATE(FechaHoraInicio) = '2019-02-01' AND IdEstado = 10
                                GROUP BY IdAgente, FechaHoraInicio) AS TMP2
                GROUP BY IdAgente
                ) as T8 ON (T8.IdAgente = T2.Id)
                
                LEFT JOIN (
                SELECT IdAgente, 
                        SUM(TBreak) AS `Tiempo Break`
                FROM (SELECT
                                        IdAgente,
                                        TIME_TO_SEC(MAX(fechahorafin)) - TIME_TO_SEC(MIN(FechaHoraInicio)) AS TBreak
                                FROM telepromdb.logestados
                                WHERE DATE(FechaHoraInicio) = '2019-02-01' AND IdEstado IN (263, 295)
                                GROUP BY IdAgente, FechaHoraInicio) AS TMP3
                GROUP BY IdAgente
                ) as T10 ON (T10.IdAgente = T2.Id)
                
                
                LEFT JOIN (
                SELECT IdAgente, 
                        SUM(TBano) AS `Tiempo Bano`
                FROM (SELECT
                                        IdAgente,
                                        TIME_TO_SEC(MAX(fechahorafin)) - TIME_TO_SEC(MIN(FechaHoraInicio)) AS TBano
                                FROM telepromdb.logestados
                                WHERE DATE(FechaHoraInicio) = '2019-02-01' AND IdEstado IN (264, 265)
                                GROUP BY IdAgente, FechaHoraInicio) AS TMP4
                GROUP BY IdAgente
                ) as T11 ON (T11.IdAgente = T2.Id)
                
                
                LEFT JOIN (
                SELECT IdAgente, 
                        SUM(TLeader) AS `Tiempo Leader`
                FROM (SELECT
                                        IdAgente,
                                        TIME_TO_SEC(MAX(fechahorafin)) - TIME_TO_SEC(MIN(FechaHoraInicio)) AS TLeader
                                FROM telepromdb.logestados
                                WHERE DATE(FechaHoraInicio) = '2019-02-01' AND IdEstado = 261
                                GROUP BY IdAgente, FechaHoraInicio) AS TMP5
                GROUP BY IdAgente
                ) as T12 ON (T12.IdAgente = T2.Id)
                                
                LEFT JOIN (
                SELECT IdAgente, 
                        SUM(TCoach) AS `Tiempo Coach`
                FROM (SELECT
                                        IdAgente,
                                        TIME_TO_SEC(MAX(fechahorafin)) - TIME_TO_SEC(MIN(FechaHoraInicio)) AS TCoach
                                FROM telepromdb.logestados
                                WHERE DATE(FechaHoraInicio) = '2019-02-01' AND IdEstado = 262
                                GROUP BY IdAgente, FechaHoraInicio) AS TMP6
                GROUP BY IdAgente
                ) as T13 ON (T13.IdAgente = T2.Id)
                
                                
                LEFT JOIN (
                SELECT IdAgente, 
                        SUM(TAdmin) AS `Tiempo Admin`
                FROM (SELECT
                                        IdAgente,
                                        TIME_TO_SEC(MAX(fechahorafin)) - TIME_TO_SEC(MIN(FechaHoraInicio)) AS TAdmin
                                FROM telepromdb.logestados
                                WHERE DATE(FechaHoraInicio) = '2019-02-01' AND IdEstado = 292
                                GROUP BY IdAgente, FechaHoraInicio) AS TMP7
                GROUP BY IdAgente
                ) as T14 ON (T14.IdAgente = T2.Id)                
                                
                LEFT JOIN (
                SELECT IdAgente, 
                        SUM(TWsp) AS `Tiempo Wsp`
                FROM (SELECT
                                        IdAgente,
                                        TIME_TO_SEC(MAX(fechahorafin)) - TIME_TO_SEC(MIN(FechaHoraInicio)) AS TWsp
                                FROM telepromdb.logestados
                                WHERE DATE(FechaHoraInicio) = '2019-02-01' AND IdEstado = 294
                                GROUP BY IdAgente, FechaHoraInicio) AS TMP8
                GROUP BY IdAgente
                ) as T15 ON (T15.IdAgente = T2.Id)
                                                
                LEFT JOIN (
                SELECT IdAgente, 
                        SUM(TTipeo) AS `Tiempo Tipeo`
                FROM (SELECT
                                        IdAgente,
                                        TIME_TO_SEC(MAX(fechahorafin)) - TIME_TO_SEC(MIN(FechaHoraInicio)) AS TTipeo
                                FROM telepromdb.logestados
                                WHERE DATE(FechaHoraInicio) = '2019-02-01' AND IdEstado = 200
                                GROUP BY IdAgente, FechaHoraInicio) AS TMP9
                GROUP BY IdAgente
                ) as T16 ON (T16.IdAgente = T2.Id)
                
                LEFT JOIN (
                SELECT 
                        MAX(CuentaDeTelefono) AS `Max Repeteciones`,
                        IdAgente
                        FROM (
                                SELECT 
                                        IdAgente, 
                                        Count(Telefono) AS CuentaDeTelefono
                                FROM logllamados
                                WHERE logllamados.Resultado = 'Atendieron' AND DATE(FechaHoraInicio) = '2019-02-01' AND (NOT ISNULL(Telefono)) AND TipoES = 'S'
                                GROUP BY IdAgente, Telefono
                        ) AS TMP12
                        GROUP BY IdAgente
                ) as T17 ON (T17.IdAgente = T2.Id)
		";
		
		return $query = $this->db->query($sql)->result_array();
	}
	
	
	function getKPI()
	{
		$sql = "
			SELECT `Popup`,
				Salientes,
				Entrantes,
				Entrantes + Salientes AS LlamadasTotales
			FROM (
				SELECT * FROM (
					SELECT
						COUNT(Id) AS `Popup` 
					FROM telepromdb.logestados 
				WHERE IdEstado IN (120, 150) AND DATE(FechaHoraInicio) = '2019-02-01') AS A
				CROSS JOIN (
					SELECT 
						COUNT(Id) AS `Salientes`
					FROM telepromdb.logestados 
					WHERE IdEstado IN (120, 130, 140) AND DATE(FechaHoraInicio) = '2019-02-01') AS B
				CROSS JOIN (
					SELECT 
						COUNT(Id) AS `Entrantes`
					FROM telepromdb.logestados 
					WHERE IdEstado IN (150, 160, 170) AND DATE(FechaHoraInicio) = '2019-02-01') AS C
			) AS D
		";
		
		return $query = $this->db->query($sql)->result_array();
	}

}