<?php 


  $host = "localhost";
  $user = "root";
  $pass = "dbasterisk";
  $databaseName = "mayo";
  $tableName = "call_report";
  
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);

  $result = mysql_query('SELECT COUNT( * ) total FROM call_report WHERE status = \'ANSWERED\' AND call_datetime LIKE \'%2016-04-20%\'
						GROUP BY HOUR( call_datetime )');
  //$array = mysql_fetch_array($result);
  while($row = mysql_fetch_array($result)) {
    $array[] = (int)$row['total'];
	}
  echo json_encode($array);

?>