<?php
include_once("config/connection.php");
if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'auth'){
 
$emp_code = $rawDataArray['username'];
$password = $rawDataArray['password'];
$serviceName = $rawDataArray['#serviceName'];
$device_id = $rawDataArray['device_id'];
$changePasswordReq=0;
$response['details']= array();
$error=0;
/*echo "SELECT emp_id,password,emp_name FROM employee WHERE  `emp_code`='".mysql_real_escape_string($emp_code)."' and password!='' and password ='".mysql_real_escape_string($password)."' and d_status=0 limit 0,1";
die;*/
/*$error=0;
		if($emp_code=='')
		{
				$msg="Employee code No is Required";
				$error=1;
		}
		if($password=='')
		{
				$msg="Password is Required";
				$error=1;
				
		}*/
		//print_r($rawDataArray);
	if($error==0)
	{
		$q=mysql_query("SELECT a.agency_name,a.id as agency_id,
		a.status as agency_status, 	e.emp_id,e.password,e.device_id,
		e.emp_name,e.area_id,e.mobile_no,e.status FROM employee as e
		LEFT JOIN admin as a on a.id = e.agency_id
		 WHERE  e.`emp_code`='".mysql_real_escape_string($emp_code)."' 
		 and e.d_status='0' limit 0,1");
		
		$rs=mysql_fetch_array($q);
		$count = mysql_num_rows($q); 
		$emp_id = $rs['emp_id'];
		$res_device_id = $rs['device_id'];
		//echo $rs['device_id'];."<br>";
		//echo $device_id ;
		//die;
	//echo count($rs);die;
		$status=0;
		$designation="";
			if($count>0){
			
			if($rs['agency_status']==1){
				if($rs['password']==$password){
				/////////////set change password option flag//////////////
					if($rs['status']==1)
					{
						if($emp_code=="empAm47539")
						{
							$status=1;
							$msg = 'Successfully Login Account';
							$token = base64_encode($rs['emp_id'].'|SnapUpApi');
						}
						else if($res_device_id==0)
						{
							$devidIdUpdate="UPDATE `employee` SET device_id='".$device_id."' WHERE emp_code='".$emp_code."'";
							mysql_query($devidIdUpdate);
							$status=1;
							$msg = 'Successfully Login Account';
							$token = base64_encode($rs['emp_id'].'|SnapUpApi');
							
						}
						else if($res_device_id!=0){
							$device_sql =mysql_query("select * from employee where device_id='".$device_id."' and emp_code='".$emp_code."'");
							//echo "select * from employee where device_id='".$device_id."' and emp_code='".$emp_code."'";
							$count_device = mysql_num_rows($device_sql); 
							if($count_device>0)
							{
								$status=1;
								$msg = 'Successfully Login Account';
								$token = base64_encode($rs['emp_id'].'|SnapUpApi');	
							}
							else
							{
								$status=0;
								$msg = 'Device ID does not match';
								$token="";
							}
							
						}
						//$res_device_id = $rs['device_id'];
						else if($res_device_id!=(string)$device_id){
							$status=0;
							$msg = 'Device ID does not match';
							$token="";
						}
					
					}
					else
					{
						$status=0;
						$msg = 'User is InActive';
						$token="";
					}
				}else{
					$status=0;
					$msg = 'Invalid Password';
					$token="";
				}
			}
			else{
					$status=0;
					$msg = 'Agency is Inactive';
					$token="";
			}
			}
			else{
				
					$status=0;
					$msg = 'username is Invalid';
					$token="";
			}
			
		
			$output = array("#serviceName" => $serviceName, "status" => $status,  "msg" => $msg, "emp_id" => $rs['emp_id'],
			"emp_name" => $rs['emp_name'],"area_id"=>$rs['area_id'],"mobile_no"=>$rs['mobile_no'],"token"=>$token,
			"agency_name"=>$rs['agency_name'],"agency_id"=>$rs['agency_id'],"device_id"=>$rs['device_id']);
				
			
	}
	else
	{
		$status=0;
		$output = array("#serviceName" => $serviceName, "status" => $status,"msg" => $msg );
	}
}
else{
$output = array("#serviceERR"=>1,"msg" => $msg, "rawDataArray" => $rawDataArray['#serviceName'] );
} 
//print_r($output);
//echo "test yhe site";
//die;
header('Content-Type: application/json');
print json_encode($output);
?>