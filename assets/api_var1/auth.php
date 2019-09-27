<?php
include_once("config/connection.php");
if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'login'){
 
$username 		= $rawDataArray['username'];
$password 		= $rawDataArray['password'];
$serviceName 	= $rawDataArray['#serviceName'];

$enc_password	=md5($password);

$response['details']= array();
$error			=0;


$sql			= "SELECT  * from app_user where `username`='$username ' and password='$enc_password' and is_active='1'";
$res			=  mysqli_query($con,$sql);

if(mysqli_num_rows($res)>0)
{
$row			=  mysqli_fetch_array($res);
$status=1;
$msg="Login Successfully";
$output = array("#serviceName" => $serviceName, "request_status" => $status,  "msg" => $msg, "user_id" => $row['id'],
		"username" => $row['username'], "email"=>$row['email'], "first_name"=>$row['first_name'],"last_name"=>$row['last_name'], "token"=>$row['token']);
}
else
{
	$status=0;
	$msg="Please check your username and password";
	$output = array("#serviceName" => $serviceName, "request_status" => $status,  "msg" => $msg, "token"=>$token);
}

}

header('Content-Type: application/json');
print json_encode($output);
?>