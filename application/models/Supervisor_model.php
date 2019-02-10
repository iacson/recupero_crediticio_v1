<?php

class Supervisor_model extends CI_Model {
	
    function __construct() {
        parent::__construct();
    }
	
	function getSupervisor()
	{
		 $sql = "
                        SELECT *
                        FROM plt_supervisor
                ";
		
		return $query = $this->db->query($sql)->result_array();
	}
}