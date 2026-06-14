<?php
 
class Timecondition_model extends CI_Model{
	//private $table = 'calling_time';
	//private $callers = 'aster_live_calls';
	function __construct(){
	parent::__construct();
	}

public function get_stats(){
    $this->db->group_by('house_name');
	$this->db->select('house_name, count(*) strength,SUM( CASE WHEN STATUS =  \'Active\' THEN 1 ELSE 0 END )Active,SUM( CASE WHEN STATUS =  \'Inactive\' THEN 1 ELSE 0 END ) Inactive');
    $query = $this->db->get($this->table);
    return $query->result_array();
}
public function condition()
	{
		$this->db->select('id,`weekdays`,DATE_FORMAT(from_time,\'%h:%i %p\') as from_time,DATE_FORMAT(to_time,\'%h:%i %p\') as to_time,`house_name` as house_id',false);
		$this->db->from('v_house_calling_time');
		$this->db->order_by('house_id', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
function getCondition($id)
	{
		$this->db->select('id,`weekdays`,DATE_FORMAT(from_time,\'%h:%i %p\') as from_time,DATE_FORMAT(to_time,\'%h:%i %p\') as to_time,house_id',false);
		$this->db->from('calling_time');	
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
function update_TimeConditionDetails($data)
{
	$id = $data['id'];
	$house = $data['house'];
//	$extension = $data['ext'];
	//$editfromHour = $data['editfromHour'].":".$data['editfromMin'];
	$from =	date_format(date_create($data['editfrom']),'G:i:s');
	$to = date_format(date_create($data['editto']),'G:i:s');
	
	$weekdays=array();
	if ($data['chkmon']=="on"){
	$weekdays[]="Mon";
	}
	if($data['chktue']=="on"){
	$weekdays[]="Tue";
	}	
	if($data['chkwed']=="on"){
	$weekdays[]="Wed";
	}
	if($data['chkthu']=="on"){
	$weekdays[]="Thu";
	}
	if($data['chkfri']=="on"){
	$weekdays[]="Fri";
	}
	if($data['chksat']=="on"){
	$weekdays[]="Sat";
	}
	if($data['chksun']=="on"){
	$weekdays[]="Sun";
	}
$weekday  = implode(",", $weekdays);
	//echo $values;
	$sql = "UPDATE calling_time SET weekdays='$weekday', from_time ='$from', to_time = '$to' WHERE id=$id";
	$query = $this->db->query($sql);
	return $query;

}
	
	
}