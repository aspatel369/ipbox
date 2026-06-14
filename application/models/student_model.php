<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Student_model extends CI_Model {


function create_StudentDetails($data)
{
	$name = $data['studentName'];
	$rollnumber = $data['rollNumber'];
	$pinNumber = $data['pinNumber'];
	$house = $data['house'];
	//$totalPoints = $data['totalPoints'];
	//$studentPoints = $data['points'];
	$points = $data['point'];
	$one = $data['one'];
	$two = $data['two'];
	$three = $data['three'];
	$four = $data['four'];
	$five = $data['five'];
	$status = $data['status'];
	$dob=$data['dob'];
	$sql = "INSERT INTO student(name,dob,roll_no,pin_no,house,available_balance,used_balance,option1,option2,option3,option4,option5,updated_on	,status)VALUES('$name','$dob','$rollnumber','$pinNumber','$house','$points',0,'$one','$two','$three','$four','$five',NOW(),'$status')";

	$query = $this->db->query($sql);
	return $query;
}

function get_Student_Details($limit, $start, $filter){
	$sql2="";
	$sql3="";
	$sql4="";

	if ($filter['searchname'] != "") {
                $name = $filter['searchname'];
				//$sql2 = "AND name = '$name'";
				$sql2 = "AND name like '$name%'";

                }
    if ($filter['searchnumber'] != "") {
                $number = $filter['searchnumber'];
				//$sql3 = "AND roll_no = '$number'";
				$sql3 = "AND roll_no like '$number%'";
                }
    if ($filter['searchhouse'] != "") {
                $house = $filter['searchhouse'];
				$sql4 = "AND house_name='$house'";
                }
	
	$sql = "SELECT id,name,roll_no,house_name,available_balance,used_balance from v_student WHERE id!='' $sql2 $sql3 $sql4  ORDER BY id desc LIMIT " . $start . " ," . $limit;
	$query = $this->db->query($sql);
	return $query->result_array();
}

function count_Student_Details($filter){

	$sql2="";
	$sql3="";
	$sql4="";

	if ($filter['searchname'] != "") {
                $name = $filter['searchname'];
				$sql2 = "AND name like'$name%'";
                }
    if ($filter['searchnumber'] != "") {
                $number = $filter['searchnumber'];
				$sql3 = "AND roll_no like '$number%'";
                }
    if ($filter['searchhouse'] != "") {
                $house = $filter['searchhouse'];
				 $sql4 = "AND house = (SELECT id from house where house_name='$house')";
                }
        		
	 $sql = "SELECT COUNT(name)As cnt from student WHERE id!='' $sql2 $sql3 $sql4";
	$query = $this->db->query($sql);
	 $row = $query->row();
     return $row->cnt;
}

function export_studentDetails($filter){
	$sql2="";
	$sql3="";
	$sql4="";

	if ($filter['searchname'] != "") {
                $name = $filter['searchname'];
				//$sql2 = "AND name = '$name'";
				$sql2 = "AND name like '$name%'";
                }
    if ($filter['searchnumber'] != "") {
                $number = $filter['searchnumber'];
				//$sql3 = "AND roll_no = '$number'";
				$sql3 = "AND roll_no like '$number%'";
                }
    if ($filter['searchhouse'] != "") {
                $house = $filter['searchhouse'];
				$sql4 = "AND house_name = '$house'";
                }
	$sql = "SELECT name,roll_no,house_name,available_balance,used_balance,option1,option2,option3,option4,option5 from v_student WHERE id!='' $sql2 $sql3 $sql4  ORDER BY id ASC";
	$query = $this->db->query($sql);
	return $query->result_array();
}

function export_studentDetails_count($filter){

	$sql2="";
	$sql3="";
	$sql4="";

	if ($filter['searchname'] != "") {
                $name = $filter['searchname'];
				$sql2 = "AND name = '$name'";
                }
    if ($filter['searchnumber'] != "") {
                $number = $filter['searchnumber'];
				$sql3 = "AND roll_no = '$number'";
                }
    if ($filter['searchhouse'] != "") {
                $house = $filter['searchhouse'];
				 $sql4 = "AND house = (SELECT id from house where house_name='$house')";
                }
        		
	$sql = "SELECT COUNT(name)As cnt from student WHERE id!='' $sql2 $sql3 $sql4";
	$query = $this->db->query($sql);
	 $row = $query->row();
     return $row->cnt;
}

function getStudent_EditValues($id){

$sql = "SELECT id,name,dob,roll_no,pin_no,house,option1,option2,option3,option4,option5,status,available_balance,used_balance from student WHERE id=$id";
    
		$query = $this->db->query($sql);
		
    	return ($query->result_array());

    }

    function update_StudentDetails($data)
    {

   		$id = $data['id'];
		$name = $data['name'] ;
		$rollno = $data['rollnumber'];
		$pinno = $data['pinno'];
		$house = $data['house'];
		//$Minus = $data['pointsMinus'];
		//$editadd = $data['editadd'];
		//$editminus = $data['editminus'];
		$add_points = $data['points'];
		$dob = $data['dob'];
		//$spent_points = $data['spent_points'];
		//$available_points = $data['available_points'];
		//$total = $total_points;
		//$weekNew = $week_points;
		//$available = $available_points;
		//$points = '';
		//$pointsMinus = '';
	//	if($editadd == 'on'){
			
		//	$total = $total_points + $Minus;
		//	 $available = $available_points + $Minus;
			 //$weekdays = $total/4;
			  //$weekold = round($weekdays);
			 ///$weekNew = $weekold - $spent_points;
		//	 $weekNew = $week_points + $Minus;
		//	 $points = $Minus;

	//	} 
		//else if($editminus == 'on') {

		//	$total = $total_points - $Minus;
		//	 $available = $available_points - $Minus;			 			
			 //$weekdays = $Minus/4;
			  //$weekold = round($weekdays);
			 //$weekNew = $week_points - $weekold ;
		//	 $weekNew = $week_points - $Minus;
		//	$pointsMinus = $Minus;

	//	}
		$one = $data['one'];
		$two = $data['two'];
		$three = $data['three'];
		$four = $data['four'];
		$five = $data['five'];
		$status = $data['status'];

	 $sql = "UPDATE student SET name='$name',dob='$dob',pin_no='$pinno',house='$house',available_balance = available_balance+$add_points,option1='$one',option2='$two',option3='$three',option4='$four',option5='$five',status = '$status' WHERE id=$id";
//	echo $sql; die;
	$query = $this->db->query($sql);
	return $query;

    }

 function student_Delete($id)
{
	$sql = "DELETE from student where id='$id'";
	$query = $this->db->query($sql);
	return $query;
}

    function checkStudent($name)
{
    $sql = "SELECT * from student WHERE roll_no=?";
    $query = $this->db->query($sql, array($name));
    return $query->result_array();
 }

 function CheckPinNum($name)
{
    $sql = "SELECT * from student WHERE pin_number=?";
    $query = $this->db->query($sql, array($name));
    return $query->result_array();
 }

 function houseDropDown(){
        $sql = "SELECT house from student";
	$query = $this->db->query($sql);
	return $query->result_array();
    }
    function checkStudentName($name)
{
    $sql = "SELECT * from student WHERE name=?";
    $query = $this->db->query($sql, array($name));
    return $query->result_array();
 }

 function editStudentName($name,$id)
{
    $sql = "SELECT * from student WHERE name=? and id!=?";
    $query = $this->db->query($sql, array($name,$id));
    return $query->result_array();
 }

 function dupChecking($roll)
    {
        $sql = "select name,pin_no,house,option1,option2,option3,option4,option5 from student where roll_no='$roll'";
   
    $query = $this->db->query($sql);
   echo $query->num_rows() ;
        if( $query->num_rows() > 0) {
   			 return false;
		} else {
			return true; }
	}


    function phone_upload($record_insert)
  {
    $name = $record_insert['name'];
    $roll = $record_insert['roll_no'];
    $pin = $record_insert['pin_number'];
    $house = $record_insert['house'];
    $opt1 = $record_insert['option1'];
    $opt2 = $record_insert['option2'];
    $opt3 = $record_insert['option3'];
    $opt4 = $record_insert['option4'];
    $opt5 = $record_insert['option5'];
    $points = $record_insert['points'];
    $status = $record_insert['status'];

    $sql = "insert into student(name,roll_no,pin_no,house,option1,option2,option3,option4,option5,available_balance,used_balance,status) values('$name','$roll','$pin','$house','$opt1','$opt2','$opt3','$opt4','$opt5','$points',0,'$status') ON DUPLICATE KEY UPDATE name ='$name',roll_no='$roll',pin_no='$pin',house='$house',option1='$opt1',option2='$opt2',option3='$opt3',option4='$opt4',option5='$opt5',available_balance='$points',status='$status'";

    $query = $this->db->query($sql);
    
    }
}















