<?php
$servername = "localhost";
$username = "root";
$password = "Ibm@2308";
$database = "ipbx";

$con = mysql_connect($servername,$username,$password);
mysql_select_db($database)or die(mysql_error()); 
//echo 'Hello';
if(!$con)
{
    echo mysql_error();
	die;
} 

    $call = "SELECT student_id,time_to_sec(TIMEDIFF(NOW(),answered_time)) as duration,live_channel from aster_live_calls where status = 'CONNECT' ";    
    $call1 = mysql_query($call);

     while ($row1 = mysql_fetch_array($call1)) {
      $studentId = $row1['student_id'];
      $duration = $row1['duration'];
      $live_channel = $row1['live_channel'];
    print_r($row1);
	
    $checkWeek = "SELECT id,available_balance,(available_balance*60-60) seconds from student where roll_no = '$studentId'";
    $checkWeek1 = mysql_query($checkWeek);

   $row = mysql_fetch_array($checkWeek1);
   //print_r($row);

      $studentId1 = $row['id'];
      //$totalPts = $row['total_points'];
      $weekPts = $row['available_balance'];
     // $availablePts = $row['available_balance'];    
      $seconds = $row['seconds'];    
   //   $flag = $row['flag'];    
    

     if($weekPts > 1){
	 $check_bal=$seconds-$duration;
	 echo $check_bal;
		if ($check_bal<=0){
		echo 'Balance run out';
        $hangupSql = "INSERT INTO aster_manager(entry_date, status, response, server_ip, channel, action, callerid, cmd_line_b, cmd_line_c, cmd_line_d, cmd_line_e, cmd_line_f) VALUES (NOW(),'NEW','N','192.168.3.234','','Hangup','','Channel: $live_channel','Context: student','','Priority: 1','Async: yes')";
         $hangupSql1 = mysql_query($hangupSql);
		
		}
      } else {
	echo 'less then one point'	; 
       $hangupSql = "INSERT INTO aster_manager(entry_date, status, response, server_ip, channel, action, callerid, cmd_line_b, cmd_line_c, cmd_line_d, cmd_line_e, cmd_line_f) VALUES (NOW(),'NEW','N','192.168.3.234','','Hangup','','Channel: $live_channel','Context: student','','Priority: 1','Async: yes')";
	  
          $hangupSql1 = mysql_query($hangupSql);
     }
   }
$call5 = "Delete from aster_live_calls where TIMEDIFF(NOW(),datetime) > '00:25:00' ";    
    $call6 = mysql_query($call5);

$call7 = "Delete from aster_live_calls where status = 'DIALING' AND TIMEDIFF(NOW(),datetime) > '00:01:30' ";    
    $call8 = mysql_query($call7);
?>
