<?php
error_reporting(0);
date_default_timezone_set('Asia/Calcutta');
//connection code to db local

 

$host="localhost";
$user="shyamjth_citizen";
$pass="citizen123$$";
$dbname="shyamjth_citizenapps";


$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$rawDataArray = $_POST;


 $headers =  apache_request_headers();
if(isset($headers['Authorization']))
{
 $token = explode(' ', $headers['Authorization']);
 $myval=base64_decode($token[1]);
}
else
{
	$token="";
}
 



