<?php
error_reporting(0);
date_default_timezone_set('Asia/Calcutta');
//connection code to db local

 

$host		= "localhost";
$user		= "shyamjth_citizen";
$pass		= "qwerty123456789";
$dbname		= "shyamjth_citizenapps";



$con = mysqli_connect($host, $user, $pass, $dbname);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  


/*print_r($row);
mysqli_free_result($result);
// Check connection


$sql	= "SELECT * from `auth_user`";
$res	= mysqli_query($sql) or die(mysqli_error());
$row	= mysqli_fetch_array($res);
*/

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
$rawDataArray = $_POST;

 



