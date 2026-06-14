<?php 


  $host = "localhost";
  $user = "root";
  $pass = "dbasterisk";
  $databaseName = "ipbx";
  $tableName = "v_student_info";
  
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);

  $result = mysql_query('SELECT count(*) total FROM v_student_info where status=\'Active\'GROUP BY house');          //query
  //$array = mysql_fetch_array($result);
  while($row = mysql_fetch_array($result)) {
    $array[] = (int)$row['total'];
	}
  echo json_encode($array);

?>