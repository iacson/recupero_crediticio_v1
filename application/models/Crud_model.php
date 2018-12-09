<?php

class Crud_model extends CI_Model {
	
    function __construct() {
        parent::__construct();
    }
	
	function getData($table)
	{
		$query = $this->db->get($table)->result_array();
		return $query;
	}

	function getDataResultById($table, $field, $id)
	{
		$this->db->where($field, $id);
		$query = $this->db->get($table)->result_array();
		return $query;
	}

	function getOrderDataResultById($table, $field, $id, $order)
	{
		$this->db->order_by($order, 'asc');
		$this->db->where($field, $id);
		$query = $this->db->get($table)->result_array();
		return $query;
	}
	
	function getDataById($table, $field, $id)
	{
		$this->db->where($field, $id);
		$query = $this->db->get($table)->row_array();
		return $query;
	}

	function insertData($table, $data)
	{
		if(	$this->db->insert($table, $data) ){
			return true;
		}else{
			return false;
		}
	}
	
	function insertDataIdResponse($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	function updateData($table, $field, $id, $data)
	{
		$this->db->where($field, $id);
		if(	$this->db->update($table, $data) ){
			return true;
		}else{
			return false;
		}
	}

	function deleteData($table, $field, $id)
	{
		$this->db->where($field, $id);
		if(	$this->db->delete($table) ){
			return true;
		}else{
			return false;
		}
	}
	
	function countData($table, $field, $value)
	{
		$this->db->where($field, $value);
		$this->db->from($table);
		return $this->db->count_all_results();
	}

}