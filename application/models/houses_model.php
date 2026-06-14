<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Houses_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($id = "0") {
		$sql = "SELECT 	    s.*, cg.group_name, cg.id as caller_group_id, 
                            e.phone, e.phtwo, e.phthree, e.phfour, e.phfive 
				FROM 	    house s 
                LEFT JOIN   caller_group cg ON cg.id = s.caller_group 
                LEFT JOIN   emergency e ON e.house_id = s.id ";

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

			$status = $this->db->where('id', $id)->update('house', $data);
		}
		else {
			$status = $this->db->insert('house', $data);
            $insert_id = $this->db->insert_id();
		}
		return ['status'=>$status, 'insert_id'=>$insert_id];
	}

	public function delete($id) {
		$sql = "DELETE FROM house WHERE id = $id";
		return $this->db->query($sql);
	}
}