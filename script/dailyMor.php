<?php
date_default_timezone_set('Asia/Kolkata');
$date = date('d-m-y h:i:s');
echo $date;
$JobText_sms= "RMS Chail - Nalanda ( Morning ), Power is on, System Online Date : ".$date ;
	
		$url = "https://192.168.3.6/api/send_sms";  // Comment it out to get from DB. 
		$postfields = array
		(
		'text' => $JobText_sms.'#param#',
		'param' => Array
		(
			array('number' => '9826397010', 'text_param' => array(''), 'user_id' => '2')
		)
		);   
		$content = json_encode($postfields);
		
		$curl = curl_init($url);
$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY ) ;
		curl_setopt($curl, CURLOPT_HEADER, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json;"));
		curl_setopt($curl, CURLOPT_USERPWD, "admin:admin"); // Gateway username and password.
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		$json_response = curl_exec($curl);
		$HTTPstatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

echo "SMS Procedure End ";
echo $json_response;

?>

 
