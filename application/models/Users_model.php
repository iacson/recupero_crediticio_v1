<?php

class Users_model extends CI_Model {
	
    function __construct() {
        parent::__construct();
    }
	
        function getUsers()
        {
                $sql = "
                        SELECT *
                        FROM plt_usuarios
                ";
                
                return $query = $this->db->query($sql)->result_array();
        }
}