<?php
function send_sms($mobno,$msg){
	
$username = urlencode('ssilalit');
$password = urlencode('Shyam20@15');
$numbers = $mobno;
$sender = urlencode('SSTEEL');
$message = urlencode($msg);

// Prepare data for POST request


$data ='user='.$username.'&pass='.$password.'&sender='.$sender."&phone=".$numbers."&text=".$message."&priority=ndnd&stype=normal";
 // Send the GET request with cURL
 $ch = curl_init('http://bhashsms.com/api/sendmsg.php?'.$data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
return $response;
}
 
?>