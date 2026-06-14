<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class User extends CI_Model {

function verify_Login($data){

	$userName = $data['username'];
	$passWord = $data['password'];

	$sql = "SELECT id,username from login where BINARY username = '$userName' AND password = md5('$passWord') limit 1";
	$query = $this->db->query($sql);
	return $query->result_array();
	}


function get_Extension(){

	 $sql = "SELECT extension from asterisk.users where extension not in(select extension from staff ) and extension not in(select extension from house) order by extension+0 ASC";
	$query = $this->db->query($sql);
	return $query->result_array();
}
function get_Extensionsearch(){

	$sql = "SELECT distinct extension from staff";
	$query = $this->db->query($sql);
	return $query->result_array();
}

function get_Extensionsearch_house(){

	 $sql = "SELECT a.extension from asterisk.users a where a.extension not in(select extension from mayo.staff ) and a.extension not in(select a.extension as extension from  mayo.house where FIND_IN_SET(a.extension,extension)) order by a.extension asc";
	$query = $this->db->query($sql);
	return $query->result_array();
}



function createStaff_Details($data){

	$name = $data['name'];
	$extension = $data['extension'];

	$sql = "INSERT into staff(name,extension)VALUES('$name',$extension) ";
	$query = $this->db->query($sql);
	return $query;

}
function get_Staff_Details($limit, $start, $filter){
	$sql2="";
	$sql3="";

	if ($filter['extension'] != "") {
                $phone = $filter['extension'];
				$sql2 = "AND extension = (SELECT extension from asterisk.users where extension='$phone')";
                }
    if ($filter['name'] != "") {
                $name = $filter['name'];
				//$sql3 = "AND name = '$name'";
				$sql3 = "AND name like '$name%'";
                }
	//  $sql = "SELECT id,name,(SELECT extension from asterisk.users where extension='$phone' ) as extension from staff WHERE id!='' $sql2 $sql3  ORDER BY id ASC LIMIT " . $start . " ," . $limit;
	  $sql = "SELECT id,name, extension from staff WHERE id!='' $sql2 $sql3  ORDER BY id ASC LIMIT " . $start . " ," . $limit;
	$query = $this->db->query($sql);
	return $query->result_array();
}

function count_Staff_Details($filter){

	$sql2="";
	$sql3="";

	if ($filter['extension'] != "") {
                $phone = $filter['extension'];
				$sql2 = "AND extension = (SELECT extension from asterisk.users where extension='$phone')";
                }
    if ($filter['name'] != "") {
                $name = $filter['name'];
				$sql3 = "AND name = '$name'";
                }
        		
	$sql = "SELECT COUNT(name)As cnt from staff WHERE id!='' $sql2 $sql3";
	$query = $this->db->query($sql);
	 $row = $query->row();
     return $row->cnt;
}

function getstudent_Details($id)
{
	$sql = "SELECT id,name,extension from staff where id='$id'";
	$query = $this->db->query($sql);
	return $query->result_array();
}

function staff_Delete($id)
{
	$sql = "DELETE from staff where id='$id'";
	$query = $this->db->query($sql);
	return $query;
}
function create_House($data)
{
	$house = $data['housename'];
	$point = $data['points'];
	$extension = $data['extension'];
	$from = $data['fromHour'].":".$data['fromMin'];
	$to = $data['toHour'].":".$data['toMin'];
	$status = $data['status'];

	$sql = "INSERT into house(name,points,extension,from_time,to_time,created_datetime,status)VALUES('$house','$point','$extension','$from','$to',NOW(),'$status')";

	$query = $this->db->query($sql);
	return $query;
}
function checkHouse_Name($name)
{
    $sql = "SELECT * from house WHERE name=?";
    $query = $this->db->query($sql, array($name));
    return $query->result_array();
 }

 function get_House_Details($limit, $start, $filter){

	$sql3="";
    if ($filter['housename'] != "") {
                $name = $filter['housename'];
				//$sql3 = "AND name = '$name'";
				$sql3 = "AND name like '$name%'";
                }
	$sql = "SELECT id,name,points,extension,from_time,to_time,status from house WHERE id!='' $sql3  ORDER BY id desc LIMIT " . $start . " ," . $limit;
	$query = $this->db->query($sql);
	return $query->result_array();
}

function count_House_Details($filter){

	$sql2="";


	if ($filter['housename'] != "") {
                $name = $filter['housename'];
				$sql2 = "AND name='$name'";
                }
    
        		
	$sql = "SELECT COUNT(name)As cnt from house WHERE id!='' $sql2 ";
	$query = $this->db->query($sql);
	 $row = $query->row();
     return $row->cnt;
}
function gethouse_Details($id)
{
	$sql = "SELECT id,name,points,status,extension,from_time,to_time from house where id='$id'";
	$query = $this->db->query($sql);
	return $query->result_array();
}

// function extensionGetAsterisk()
// {
// 	$sql = "SELECT distinct extension from asterisk.users";
// 	$query = $this->db->query($sql);
// 	return $query->result_array();
// }



function recordInserts($record)  {

	$sql = "INSERT into house(name,points,status) values $record";
        $this->db->query($sql); 
    
    }  

function studentRecordInserts($record)  {
        
          $sql = "INSERT into student(name,roll_no,pin_number,house,option1,option2,option3,option4,option5) values $record";
        $this->db->query($sql);
    }  


 function house_Delete($id)
{
	$sql = "DELETE from house where id='$id'";
	$query = $this->db->query($sql);
	return $query;
}

function update_HouseDetails($data)
{
	$id = $data['id'];
	$points = $data['points'];
	$extension = $data['ext'];
	$editfromHour = $data['editfromHour'].":".$data['editfromMin'];
	$edittoHour = $data['edittoHour'].":".$data['edittoMin'];
	$status = $data['status'];

	$sql = "UPDATE house SET points='$points',extension = '$extension',from_time ='$editfromHour',to_time = '$edittoHour',status='$status' WHERE id=$id";
	$query = $this->db->query($sql);
	return $query;

}

function get_HouseDropdown()
{
	$sql = "SELECT name from house";
	$query = $this->db->query($sql);
	return $query->result_array();

}

function getPoints($data)
{
	$house = $data['houseName'];
	$sql = "SELECT points from house where name = '$house'";

	$query = $this->db->query($sql);
	return $query->result_array();
}

function create_StudentDetails($data)
{
	$name = $data['studentName'];
	$rollnumber = $data['rollNumber'];
	$pinNumber = $data['pinNumber'];
	$houseName = $data['houseName'];
	$totalPoints = $data['totalPoints'];
	$studentPoints = $data['points'];
	$points = $data['splittedPoint'];
	$one = $data['one'];
	$two = $data['two'];
	$three = $data['three'];
	$four = $data['four'];
	$five = $data['five'];
	$status = $data['status'];

	 $sql = "INSERT INTO student(name,roll_no,pin_number,house,points,total_points,week_points,available_points,option1,option2,option3,option4,option5,created_datetime,status)VALUES('$name','$rollnumber','$pinNumber','$houseName','$studentPoints','$totalPoints','$points','$totalPoints','$one','$two','$three','$four','$five',NOW(),'$status')";

	$query = $this->db->query($sql);
	return $query;
}
function get_House()
{
	$sql = "SELECT name from house";
	$query = $this->db->query($sql);
	return $query->result_array();
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
				$sql4 = "AND house = (SELECT name from house where name='$house')";
                }
	
	$sql = "SELECT id,name,roll_no,house,week_points,spent_points from student WHERE id!='' $sql2 $sql3 $sql4  ORDER BY id desc LIMIT " . $start . " ," . $limit;
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
				 $sql4 = "AND house = (SELECT name from house where name='$house')";
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
				$sql4 = "AND house = (SELECT name from house where name='$house')";
                }
	$sql = "SELECT name,roll_no,house,total_points,week_points,option1,option2,option3,option4,option5 from student WHERE id!='' $sql2 $sql3 $sql4  ORDER BY id ASC";
	$query = $this->db->query($sql);
	return $query->result_array();
}
public function insertOrUpdate($data) {
		$status = false;
		if(isset($data['id']) && $data['id'] > 0) {

			$id = $data['id'];
			unset($data['id']);

			$status = $this->db->where('user_id', $id)->update('login', $data);
		}
		else {
			$status = $this->db->insert('login', $data);
		}
		return $status;
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
				 $sql4 = "AND name = (SELECT name from house where name='$house')";
                }
        		
	$sql = "SELECT COUNT(name)As cnt from student WHERE id!='' $sql2 $sql3 $sql4";
	$query = $this->db->query($sql);
	 $row = $query->row();
     return $row->cnt;
}

function getStudent_EditValues($id){

$sql = "SELECT id,name,roll_no,pin_number,house,points,point_minus,option1,option2,option3,option4,option5,status,total_points,week_points,spent_points,available_points from student WHERE id=$id";
    	$query = $this->db->query($sql);
    	return $query->result_array();

    }

    function update_StudentDetails($data)
    {

   		$id = $data['id'];
		$name = $data['name'] ;
		$rollno = $data['rollnumber'];
		$pinno = $data['pinno'];
		$house = $data['house'];
		$Minus = $data['pointsMinus'];
		$editadd = $data['editadd'];
		$editminus = $data['editminus'];
		


		$total_points = $data['total_points'];
		$week_points = $data['weekPts'];
		$spent_points = $data['spent_points'];
		$available_points = $data['available_points'];
		$total = $total_points;
		$weekNew = $week_points;
		$available = $available_points;
		$points = '';
		$pointsMinus = '';
		if($editadd == 'on'){
			
			$total = $total_points + $Minus;
			 $available = $available_points + $Minus;
			 //$weekdays = $total/4;
			  //$weekold = round($weekdays);
			 ///$weekNew = $weekold - $spent_points;
			 $weekNew = $week_points + $Minus;
			 $points = $Minus;

		} 
		else if($editminus == 'on') {

			$total = $total_points - $Minus;
			 $available = $available_points - $Minus;			 			
			 //$weekdays = $Minus/4;
			  //$weekold = round($weekdays);
			 //$weekNew = $week_points - $weekold ;
			 $weekNew = $week_points - $Minus;
			$pointsMinus = $Minus;

		}
		$one = $data['one'];
		$two = $data['two'];
		$three = $data['three'];
		$four = $data['four'];
		$five = $data['five'];
		$status = $data['status'];

	 $sql = "UPDATE student SET name='$name',roll_no='$rollno',pin_number='$pinno',house='$house',points = '$points',point_minus = '$pointsMinus',total_points = '$total',week_points = '$weekNew',available_points = '$available',option1='$one',option2='$two',option3='$three',option4='$four',option5='$five',status = '$status' WHERE id=$id";
	
	$query = $this->db->query($sql);
	return $query;

    }

 function student_Delete($id)
{
	$sql = "DELETE from student where id='$id'";
	$query = $this->db->query($sql);
	return $query;
}



function password_update($password,$id){

	 $sql = "UPDATE login set password = md5('$password') WHERE id=$id";
	$query = $this->db->query($sql);
	return $query;


}

function check_psswd($password,$id){

	$sql = "select password from login WHERE password=md5('$password') and id=$id";
	$query = $this->db->query($sql);
	return $query->num_rows();


}

function report_count($filter){

	$sql2="";
	$sql3="";
	$sql4="";
	$sql5="";

          if(!empty($filter['from_date'])){
		$fdate = $filter['from_date'];	      
	      if(!empty($filter['to_date'])){
		$tdate = $filter['to_date'];
				} 	
          }	
          if(@($filter['from_date']) && @($filter['to_date'])){				
			$sql2 = "AND date(call_datetime) BETWEEN '$fdate' AND '$tdate'";
			}

			if ($filter['student_id'] != "") {
                $roll = $filter['student_id'];
				 $sql3 = "AND student_id = '$roll'";
                }
          if ($filter['source'] != "") {
                $source = $filter['source'];
				 $sql4 = "AND source = '$source'";
                }

               if ($filter['status'] != "") {
               	if($filter['status'] == 'UNANSWERED'){
               	  $status = "";
				  $sql5 = "AND status = '$status'";

               	} else {
                $status = $filter['status'];
				 $sql5 = "AND status = '$status'";
				}
                }
        		
	  $sql = "SELECT COUNT(*)As cnt from call_report WHERE id!='' $sql2 $sql3 $sql4 $sql5 ORDER BY id DESC";
	$query = $this->db->query($sql);
	$row = $query->row();
     return $row->cnt;
     
}



function report_exportdetails($filter){
	$sql2="";
	$sql3="";
	$sql4="";
	$sql5="";

	     if(!empty($filter['from_date'])){
		$fdate = $filter['from_date'];	      
	      if(!empty($filter['to_date'])){
		$tdate = $filter['to_date'];
				} 	
          }	
          if(@($filter['from_date']) && @($filter['to_date'])){				
			$sql2 = "AND date(call_datetime) BETWEEN '$fdate' AND '$tdate'";
			}
			if ($filter['student_id'] != "") {
                $roll = $filter['student_id'];
				 $sql3 = "AND student_id like '$roll%'";
                }

            if ($filter['source'] != "") {
                $source = $filter['source'];
				 $sql4 = "AND source = '$source'";
                }

                if ($filter['status'] != "") {
               	if($filter['status'] == 'UNANSWERED'){
               	  $status = "";
				  $sql5 = "AND status = '$status'";

               	} else {
                $status = $filter['status'];
				 $sql5 = "AND status = '$status'";
				}
                }
                

	$sql = "SELECT call_datetime,student_id,phone_number,source,status,duration,floor((time_to_sec(duration)/59)+1) as spentpoints from call_report WHERE id!='' $sql2 $sql3 $sql4 $sql5  ORDER BY id DESC";
	$query = $this->db->query($sql);
	return $query->result_array();
}

function get_report_Details($limit, $start, $filter){
	$sql2="";
	$sql3="";
	$sql4="";
	$sql5="";

	     if(!empty($filter['from_date'])){
		$fdate = $filter['from_date'];	      
	      if(!empty($filter['to_date'])){
		$tdate = $filter['to_date'];
				} 	
          }	
         if(@($filter['from_date']) && @($filter['to_date'])){				
			$sql2 = "AND date(call_datetime) BETWEEN '$fdate' AND '$tdate'";
			}
			if ($filter['student_id'] != "") {
                $roll = $filter['student_id'];
				 //$sql3 = "AND student_id = '$roll'";
                $sql3 = "AND student_id like '$roll%'";
                }
         if ($filter['source'] != "") {
                $source = $filter['source'];
				 $sql4 = "AND source = '$source'";
                }

            if ($filter['status'] != "") {
               	if($filter['status'] == 'UNANSWERED'){
               	  $status = "";
				  $sql5 = "AND status = '$status'";

               	} else {
                $status = $filter['status'];
				 $sql5 = "AND status = '$status'";
				}
            }
			else {
            $status = 'ANSWERED';
			$sql5 = "AND status = '$status'";
			}

	 $sql = "SELECT DATE_FORMAT(call_datetime,'%d %b %h:%i %p') as call_datetime,student_id,phone_number,source,duration,time_to_sec(duration) as duration1,status from call_report WHERE id!='' $sql2 $sql3 $sql4 $sql5 ORDER BY id DESC LIMIT " . $start . " ," . $limit;
	$query = $this->db->query($sql);
	return $query->result_array();
}

function sourceDropDown(){
        $sql = "SELECT distinct source from call_report";
	$query = $this->db->query($sql);
	return $query->result_array();
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

 function checkStaffName($name)
{
    $sql = "SELECT * from staff WHERE name=?";
    $query = $this->db->query($sql, array($name));
    return $query->result_array();
 }

 function checkExtension($name)
{
    $sql = "SELECT * from staff WHERE extension=?";
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
        $sql = "select name,pin_number,house,option1,option2,option3,option4,option5 from student where roll_no='$roll'";
      
    $query = $this->db->query($sql);
    
        if( $query->num_rows() > 0) {
    return false; } else {
    return true; }
    }

    function dupCheckingHouse($house)
    {
         $sql = "select points from house where name='$house'";
      
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

    $totalPoints = $record_insert['totalPoints'];
    $week_points = $record_insert['week_points'];   
    

     $sql = "insert into student(name,roll_no,pin_number,house,option1,option2,option3,option4,option5,points,status,total_points,week_points,available_points) values('$name','$roll','$pin','$house','$opt1','$opt2','$opt3','$opt4','$opt5','$points','$status','$totalPoints','$week_points','$totalPoints') ON DUPLICATE KEY UPDATE name ='$name',roll_no='$roll',pin_number='$pin',house='$house',option1='$opt1',option2='$opt2',option3='$opt3',option4='$opt4',option5='$opt5',points='$points',status='$status',total_points='$totalPoints',week_points='$week_points',available_points='$totalPoints'";

    $query = $this->db->query($sql);
    
    }

    function phone_uploadHouse($record_insert)
    {
    	$name=$record_insert['name'];
    	$points=$record_insert['points'];
    	$ext=$record_insert['ext'];
    	$status=$record_insert['status'];
    
$sql = "insert into house(name,points,extension,status) values('$name','$points','$ext','$status') ON DUPLICATE KEY UPDATE name ='$name',points='$points',extension='$ext',status='$status'";
    $query = $this->db->query($sql);
    
    }
     function update_StaffDetails($data)
    {

   		$id = $data['id'];
		$name = $data['name'] ;
		$ext = $data['extension'];
		

	$sql = "UPDATE staff SET name='$name',extension='$ext' WHERE id=$id";
	$query = $this->db->query($sql);
	return $query;

    }

}
















