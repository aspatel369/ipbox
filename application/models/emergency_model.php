<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Emergency_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($id = "0") {
		$sql = "SELECT 		s.*, h.house_name 
				FROM 		emergency s 
				INNER JOIN	house h ON h.id = s.house_id";

		if($id > 0) {
			$sql .= " WHERE s.id = $id ";
		}

		$sql .= " ORDER BY s.id DESC ";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function insertOrUpdate($data) {
		$status = false;
		$house_id = $data['house_id'];

		$sql = "SELECT * FROM emergency WHERE house_id = $house_id";
		$query = $this->db->query($sql);
		$result = $query->row_array();

		if(!empty($result)) {
			$status = $this->db->where('house_id', $house_id)->update('emergency', $data);
		} 
		else {
			$status = $this->db->insert('emergency', $data);
		}
		return $status;
	}

	public function delete($id) {
		$sql = "DELETE FROM emergency WHERE house_id = $id";
		return $this->db->query($sql);
	}
}