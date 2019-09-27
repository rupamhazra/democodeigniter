<?php
include_once("config/connection.php");

  if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'create_user'){
		

			$serviceName	= $rawDataArray['#serviceName'];
			$first_name 	= $rawDataArray['first_name'];
			$last_name 		= $rawDataArray['last_name'];
			$email 			= trim($rawDataArray['email']);
			$password 		= md5($rawDataArray['password']);
			$contact 		= $rawDataArray['contact'];
			$adhaar_no 		= $rawDataArray['adhaar_no'];
			$address		= $rawDataArray['address'];
			
			$error="";
			
			$sql1		= "SELECT id from `app_user` where `email`='$email' OR username='$email'";
			$res1		= mysqli_query($con,$sql1);
			
			if(mysqli_num_rows($res1)>0)
			{
				$error="Email is already registered";
			}
			
			
			else if($error==0 && $contact!="")
			{
				$sql2		= "SELECT id from `app_user` where `contact`='$contact''";
			    $res2		= mysqli_query($con,$sql2);
			
				if(mysqli_num_rows($res2)>0)
				{
					$error="Contact number is allready registered";
				}
			}
			else if($error==0 && $adhaar_no!="")
			{
				$sql3		= "SELECT id from `app_user` where `adhaar_no`='$adhaar_no'";
			    $res3		= mysqli_query($con,$sql3);
			
				if(mysqli_num_rows($res3)>0)
				{
					$error="Adhar number is allready registered";
				}
			}
			
			//echo $error;
			//exit;
			
			if($error=="")
			{
				$token = base64_encode($id.'|citizen');
				$sql4="INSERT INTO `app_user` SET  `password`='$password', `is_superuser`='0', `username`='$email', `first_name`='$first_name', `last_name`='$last_name', `email`='$email', contact ='$contact', adhaar_no='$adhaar_no', `address`='$address', `is_staff`='0', `token`='$token'";
				
				$res4		= mysqli_query($con,$sql4);
				
				
				$id		= mysqli_insert_id($con);
				
				$msg			="Successfully Registered";
				
				$output = array("#serviceName" => $serviceName, "request_status" => '1',"msg" => $msg,  "user_id" => $id, "first_name"=>$first_name, "last_name"=>$last_name,"email"=>$email, "contact"=>$contact, "adhaar_no"=>$adhaar_no, "address"=>$address, "token"=>$token);
			}
			if($error!="")
			{
				$output = array("#serviceName" => $serviceName, "request_status" => 0,"msg" => $error,  "details" => $response['details']);
			}
			
  }

 
  header('Content-Type: application/json');
   echo json_encode($output);
  
?>