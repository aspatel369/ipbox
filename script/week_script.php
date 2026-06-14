<?php
$servername = "localhost";
$username = "root";
$password = "Ibm@2308";
$database = "ipbx";

$con =@mysql_connect($servername,$username,$password);
mysql_select_db($database)or die(mysql_error());
if(!$con)
{
    echo mysql_error();
}
echo "Hello 1";
	$month= date("M");
 	$date = date("l");
	//$query = "SELECT a.id,a.roll_no,b.points,a.week_points as remainingpts from student a inner join house b on a.house=b.name where a.status='Active'";
	$query = "SELECT a.id,a.roll_no,b.`points` as credit_limit,a.available_balance as remainingpts,date_format(a.dob,'%d-%m') as dob  from student a inner join v_house b on a.`house`=b.`house_id` where a.status='Active' and FIND_IN_SET( '$month',`ActiveOn` )";
	//echo $query;
	$result = mysql_query($query);
	while($row=mysql_fetch_array($result))
	{
		echo "Hello 2";
		echo date("Y-m-d");
		echo date("h:i:sa");
		echo $month;  
		$pts = $row['remainingpts'];
		$id = $row['id'];
		$points=$row['credit_limit'];
		$roll_no=$row['roll_no'];
		$dob=$row['dob'];
		
		if($date == 'Sunday')
		{
			echo "Hello 3";
			$week_balance = $points/4;
			$balance = "INSERT INTO balance SET Pre_Balance=$pts, Added_Balance= $week_balance, roll_no='$roll_no',info='Weekly Balance updated'";
			mysql_query($balance);
			$sql2 = "UPDATE student SET available_balance=$week_balance+$pts WHERE id='$id'";
			mysql_query($sql2);
			echo "Hello 4";
		}
		/*if($dob == date("d-m"))
		{
				echo 'Happy Birthday';
			$week_balance = $points/4;
			$balance = "INSERT INTO Balance SET Pre_Balance=$pts, Added_Balance= $week_balance, roll_no='$roll_no'";
			mysql_query($balance);
			$sql2 = "UPDATE student SET available_balance=$week_balance+$pts,available_points=$week_balance+$pts WHERE id='$id'";
			mysql_query($sql2);
		}*/
		echo "Hello 5";
	}
echo "Hello 6";

?>
