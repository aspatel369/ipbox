<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Callergroup_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($id = "0") {
		$sql = "SELECT 	*
				FROM 	caller_group s ";

		if($id > 0) {
			$sql .= " WHERE s.id = $id ";
		}

		$sql .= " ORDER BY s.id DESC ";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function insertOrUpdate($data) {
		$status = false;
		if(isset($data['id']) && $data['id'] > 0) {

			$id = $data['id'];
			unset($data['id']);

			$status = $this->db->where('id', $id)->update('caller_group', $data);
		}
		else {
			$status = $this->db->insert('caller_group', $data);
		}
		return $status;
	}

	public function delete($id) {
		$sql = "DELETE FROM caller_group WHERE id = $id";
		return $this->db->query($sql);
	}
}