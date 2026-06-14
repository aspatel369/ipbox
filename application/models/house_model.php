<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class House_model extends CI_Model {

function get_Extensionsearch_house(){

//	 $sql = "SELECT a.extension from asterisk.users a where a.extension not in(select extension from ipbx.staff ) and a.extension not in(select a.extensions as extension from  house where FIND_IN_SET(a.extension,extension)) order by a.extension asc";
	 $sql = "SELECT a.extension from asterisk.users a where a.extension not in (select a.extension as extension from ipbx.house where FIND_IN_SET(a.extension,extensions)) order by a.extension asc";
	$query = $this->db->query($sql);
	return $query->result_array();
}



function create_House($data)
{
	$house = $data['housename'];
	$extension = $data['extension'];
	$callergroup = $data['callerName'];
	$from = $data['fromHour'].":".$data['fromMin'];
	$to = $data['toHour'].":".$data['toMin'];
	$status = $data['status'];

	$sql = "INSERT into house(house_name,caller_group,extensions,date_created,status)VALUES('$house','$callergroup','$extension',NOW(),'$status')";
	$query = $this->db->query($sql);
	//return $query;
	$this->insertcallingtime($house);
}
function insertcallingtime($house)
{
    $sql = "SELECT id from house WHERE house_name=?";
    $query = $this->db->query($sql, array($house));
    $result = $query->result_array();
	//var_dump($result);
	$houseid= $result[0]['id'];
	$from=$result[0]['from_time'];
	$to=$result[0]['to_time'];
	$sql = "INSERT into calling_time(from_time,to_time,house_id) VALUES('$from','$to','$houseid')";
	$query = $this->db->query($sql);
	return $query;
 }

function checkHouse_Name($name)
{
    $sql = "SELECT * from house WHERE house_name=?";
    $query = $this->db->query($sql, array($name));
    return $query->result_array();
 }

 function get_House_Details($limit, $start, $filter){

	$sql3="";
    if ($filter['housename'] != "") {
                $name = $filter['housename'];
				//$sql3 = "AND name = '$name'";
				$sql3 = "AND house_name like '$name%'";
                }
	$sql = "SELECT id,house_name,extensions,status from house WHERE id!='' $sql3  ORDER BY id desc LIMIT " . $start . " ," . $limit;
	$query = $this->db->query($sql);
	return $query->result_array();
}

function count_House_Details($filter){

	$sql2="";


	if ($filter['housename'] != "") {
                $name = $filter['housename'];
				$sql2 = "AND house_name='$name'";
                }
    
        		
	$sql = "SELECT COUNT(house_name)As cnt from house WHERE id!='' $sql2 ";
	$query = $this->db->query($sql);
	 $row = $query->row();
     return $row->cnt;
}
function gethouse_Details($id)
{
	$sql = "SELECT id,house_name,caller_group,status,extensions from house where id='$id'";
	$query = $this->db->query($sql);
	return $query->result_array();
}


function recordInserts($record)  {

	$sql = "INSERT into house(house_name,caller_group,status) values $record";
        $this->db->query($sql); 
    
    }  


 function house_Delete($id)
{
	$sql = "DELETE from house where id='$id'";
	$query = $this->db->query($sql);
	$this->TimeCondition_Delete($id);
	return $query;
}
 function TimeCondition_Delete($id)
{
	$sql = "DELETE from calling_time where house_id='$id'";
	$query = $this->db->query($sql);
}
 function Student_Check($id)
{
	$sql = "SELECT id FROM student WHERE house='$id'";
	$query = $this->db->query($sql);
	return $query->num_rows();
}
function update_HouseDetails($data)
{
	$id = $data['id'];
	$callergroup = $data['callerName'];
	$extension = $data['ext'];
	$status = $data['status'];
	$sql = "UPDATE house SET extensions = '$extension', status='$status' WHERE id=$id";
	$query = $this->db->query($sql);
	return $query;

}

function get_HouseDropdown()
{
	$sql = "SELECT id,house_name from house";
	$query = $this->db->query($sql);
	return $query->result_array();

}
function get_CallerGroupDropdown()
{
	$sql = "SELECT id,group_name from caller_group";
	$query = $this->db->query($sql);
	return $query->result_array();

}

function getPoints($data)
{
	$houseid = $data['house'];
	$sql = "SELECT points from v_house where house_id = '$houseid'";

	$query = $this->db->query($sql);
	return $query->result_array();
}

function get_House()
{
	$sql = "SELECT house_name from house";
	$query = $this->db->query($sql);
	return $query->result_array();
}

 function houseDropDown(){
        $sql = "SELECT house from student";
	$query = $this->db->query($sql);
	return $query->result_array();
    }
    function dupCheckingHouse($house)
    {
         $sql = "select caller_group from house where house_name='$house'";
      
    $query = $this->db->query($sql);
    
        if( $query->num_rows() > 0) {
    return false; } else {
    return true; }
    }

    function dupCheckingHouse_ext($ext)
    {
   
   echo $sql = "select a.id,b.id from house a,staff b where FIND_IN_SET($ext,a.extension) or FIND_IN_SET($ext,b.extension) ";      
   exit;
    $query = $this->db->query($sql);
    
        if( $query->num_rows() > 0) {
    return false; } else {
    return true; }
    }


     function phone_uploadHouse($record_insert)
    {
    	$name=$record_insert['name'];
    	$points=$record_insert['points'];
    	$ext=$record_insert['ext'];
    	$status=$record_insert['status'];
    
$sql = "insert into house(house_name,caller_group,extensions,status) values('$name','$points','$ext','$status') ON DUPLICATE KEY UPDATE house_name ='$name',points='$points',extensions='$ext',status='$status'";
    $query = $this->db->query($sql);
    
    }

}

