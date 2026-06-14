<?php
 
class Welcome_model extends CI_Model{
	  private $table = 'v_student_info';
function __construct() {
parent::__construct();
}


public function get_stats(){
    $this->db->group_by('house');
	$this->db->select('house, count(*) strength,SUM( CASE WHEN STATUS =  \'Active\' THEN 1 ELSE 0 END )Active,SUM( CASE WHEN STATUS =  \'Inactive\' THEN 1 ELSE 0 END ) Inactive');
    $query = $this->db->get($this->table);
    return $query->result();
}
public function get_caller_group(){
    $this->db->group_by('caller_group');
	$this->db->select('caller_group, count(*) as total');
    $query = $this->db->get($this->table);
    return $query->result();
}

}