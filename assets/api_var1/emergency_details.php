<?php
include_once("config/connection.php");

  if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'emergency_details'){
		

		
			$upload_path = "images/";
			$user_id		= $rawDataArray['user_id'];
			$sql2="";
			$sql3="";
			
			if(isset($rawDataArray['em_name_1']))
			{
			$em_name_1 		= $rawDataArray['em_name_1'];
			$em_contact_1 	= $rawDataArray['em_contact_1'];
			$em_email_1 	= $rawDataArray['em_email_1'];
				$em_image_1 	= $_FILES['em_image_1']['name'];
				if($em_image_1!="")
				{
					$image_name	=time().$em_image_1;
					$target_path = $upload_path.$image_name;
					move_uploaded_file($_FILES['em_image_1']['tmp_name'], $target_path);
					$sql1="UPDATE `app_user` SET `emergency_contact_1`='$em_contact_1', emergency_email_1='$em_email_1', `emergency_name_1`='$em_name_1', emergency_image_1='$target_path'";
				}
			}
			
			if(isset($rawDataArray['em_name_2']))
			{
			$em_name_2		= $rawDataArray['em_name_2'];
			$em_contact_2 	= $rawDataArray['em_contact_2'];
			$em_email_2 	= $rawDataArray['em_email_2'];
				$em_image_2	= $_FILES['em_image_2']['name'];
				if($em_image_2!="")
				{
					$image_name2	=time().$em_image_2;
					$target_path2 = $upload_path.$image_name2;
					move_uploaded_file($_FILES['em_image_2']['tmp_name'], $target_path2);
					$sql2=" ,`emergency_contact_2`='$em_contact_2', emergency_email_2='$em_email_2', `emergency_name_2`='$em_name_2', emergency_image_2='$target_path' where `id`='$user_id'";
				}
				else
				{
					$sql2=" ,`emergency_contact_2`='$em_contact_2', emergency_email_2='$em_email_2', `emergency_name_2`='$em_name_2'";
				}
			}
			if(isset($rawDataArray['em_name_3']))
			{
			$em_name_3 		= $rawDataArray['em_name_3'];
			$em_contact_3 	= $rawDataArray['em_contact_3'];
			$em_email_3 	= $rawDataArray['em_email_3'];
				$em_image_3	= $_FILES['em_image_3']['name'];
				if($em_image_3!="")
				{
					$image_name3	=time().$em_image_3;
					$target_path = $upload_path.$image_name3;
					move_uploaded_file($_FILES['em_image_3']['tmp_name'], $target_path);
					$sql3=" ,`emergency_contact_3`='$em_contact_3', emergency_email_3='$em_email_3', `emergency_name_3`='$em_name_3', emergency_image_3='$target_path' where `id`='$user_id'";
				}
				else
				{
					$sql3=" ,`emergency_contact_3`='$em_contact_3', emergency_email_3='$em_email_3', `emergency_name_3`='$em_name_3'";
				}
			}
			$finl_qry=$sql1.$sql2.$sql3."  where `id`='$user_id'";
			
						$res=mysqli_query($con,$finl_qry);
			
			
			$sql			= "SELECT  * from app_user where id='$user_id'";
			
		
			$res			=  mysqli_query($con,$sql);
			
			
			$row			=  mysqli_fetch_array($res);
			$status=1;
			$msg="Updated Successfully";
			$output = array("#serviceName" => $serviceName, "request_status" => $status,  "msg" => $msg, "user_id" => $row['id'],
			"username" => $row['username'], "email"=>$row['email'], "first_name"=>$row['first_name'],"last_name"=>$row['last_name'], "token"=>$row['token'], "emergency_contact_1" => $row['emergency_contact_1'], "emergency_email_1"=>$row['emergency_email_1'], "emergency_image_1"=>$row['emergency_image_1'],"emergency_name_1"=>$row['emergency_name_1'], "emergency_contact_2" => $row['emergency_contact_2'], "emergency_email_2"=>$row['emergency_email_2'], "emergency_image_2"=>$row['emergency_image_2'],"emergency_name_2"=>$row['emergency_name_2'], "emergency_contact_3" => $row['emergency_contact_3'], "emergency_email_3"=>$row['emergency_email_3'], "emergency_image_3"=>$row['emergency_image_3'],              "emergency_name_3"=>$row['emergency_name_3']);
  }
  header('Content-Type: application/json');
   echo json_encode($output);
?>