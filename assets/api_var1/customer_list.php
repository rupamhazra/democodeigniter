<?php
include_once("config/connection.php");
if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'customerlist'){
$serviceName=$rawDataArray['#serviceName'];
$response['details']= array();

  //echo "SELECT * from employee where 1 and `emp_id`='$emp_id'";
//die;
$sql = "SELECT cust_id,cust_name,cust_phone,status FROM customer WHERE emp_id=$emp_id and d_status='0' ";
$qcheck=mysql_query($sql);

if(mysql_num_rows($qcheck)>0){
while($roowEmp = mysql_fetch_assoc($qcheck))
{

$data=array();
$data['cust_id'] = $roowEmp['cust_id'];
$data['cust_name'] = $roowEmp['cust_name'];
$data['cust_phone'] = $roowEmp['cust_phone'];
$data['status'] = $roowEmp['status'];


array_push($response['details'], $data);	
}	 


$status=1;
$msg="Success";

}else{

$status=0;
$msg="No Records Found";
}   

$output = array("#serviceName" => $serviceName, "status" => $status, "msg"=>$msg, "details" => $response['details'],"token"=>$token,'myval'=>$myval);

}else{
$output = array("#serviceERR"=>1);
} 

header('Content-Type: application/json');
print json_encode($output);

?>