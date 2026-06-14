<?php
 
class User_model extends CI_Model{
	private $table = 'v_student';
	function __construct(){
	parent::__construct();
	}

public function get_stats(){
    $this->db->group_by('house_name');
	$this->db->select('house_name, count(*) strength,SUM( CASE WHEN STATUS =  \'Active\' THEN 1 ELSE 0 END )Active,SUM( CASE WHEN STATUS =  \'Inactive\' THEN 1 ELSE 0 END ) Inactive');
    $query = $this->db->get($this->table);
    return $query->result_array();
}

}