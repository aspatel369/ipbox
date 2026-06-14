<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Staff_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($id = "0") {
    	  $sql = "SELECT 
	                s.*,
	                l.username,
	                l.password,
	                l.id as login_id
	            FROM staff s
	            LEFT JOIN login l ON l.user_id = s.id";

	    if($id > 0) {
	        $sql .= " WHERE s.id = ".$id;
	    }

	    $sql .= " ORDER BY s.id DESC";

	    $query = $this->db->query($sql);

	    return $query->result_array();
		// $sql = "SELECT 	*
		// 		FROM 	staff s ";

		// if($id > 0) {
		// 	$sql .= " WHERE s.id = $id ";
		// }

		// $sql .= " ORDER BY s.id DESC ";

		// $query = $this->db->query($sql);
		// return $query->result_array();
	}

	public function insertOrUpdate($data) {
		$status = false;
		if(isset($data['id']) && $data['id'] > 0) {

			$id = $data['id'];
			unset($data['id']);

			$status = $this->db->where('id', $id)->update('staff', $data);
			        return $id; // return existing id

		}
		else {
			$this->db->insert('staff', $data);
			return $this->db->insert_id();
		}
		return $status;
	}

	public function delete($id) {
		$sql = "DELETE FROM staff WHERE id = $id";
		return $this->db->query($sql);
	}
}