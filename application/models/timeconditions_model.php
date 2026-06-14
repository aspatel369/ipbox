<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Timeconditions_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($id = "0") {
		$sql = "SELECT 	    s.* ,
                            GROUP_CONCAT(h.house_name SEPARATOR ', ') AS house_names
				FROM 	    v_house_calling_time s 
                LEFT JOIN   house h 
                                ON FIND_IN_SET(h.id, s.house_name) ";

		if($id > 0) {
			$sql .= " WHERE s.id = $id ";
		}

		$sql .= " GROUP BY s.id, s.house_name 
                  ORDER BY s.id DESC ";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function insertOrUpdate($data) {
		$status = false;
		if(isset($data['id']) && $data['id'] > 0) {

			$id = $data['id'];
			unset($data['id']);

			$status = $this->db->where('id', $id)->update('v_house_calling_time', $data);
		}
		else {
			$status = $this->db->insert('v_house_calling_time', $data);
            $insert_id = $this->db->insert_id();
		}
		return ['status'=>$status, 'insert_id'=>$insert_id];
	}

	public function delete($id) {
		$sql = "DELETE FROM v_house_calling_time WHERE id = $id";
		return $this->db->query($sql);
	}
}