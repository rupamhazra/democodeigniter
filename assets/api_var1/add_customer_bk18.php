 <?php
  include_once("config/connection.php");
  if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'add_customer'){
         
 		 
		  
		   	$serviceName=$rawDataArray['#serviceName'];
		  	$cust_name = $rawDataArray['cust_name'];
			$cust_phone = $rawDataArray['cust_phone'];
			$image_1 = $rawDataArray['image_1'];
			$image_2 = $rawDataArray['image_2'];
			$image_3 = $rawDataArray['image_3'];
			$image_4 = $rawDataArray['image_4'];
			$image_5 = $rawDataArray['image_5'];
			$image_6 = $rawDataArray['image_6'];
			$image_7 = $rawDataArray['image_7'];
			$image_8 = $rawDataArray['image_8'];
			$timestamp = $rawDataArray['timestamp'];
			
			$error=0;
			//checking for Employee Code ////////////
			if($cust_name=='')
			{
				
					$msg="Customer Name No is Required";
					$error=1;
					
			}
			
			
			if($cust_phone=='')
			{
				
					$msg="Employee Phone Number is Required";
					$error=1;
					
			}

			if($cust_phone!='')
			{
				
				$count=mysql_num_rows(mysql_query("select cust_phone from `customer` where `cust_phone`=".mysql_real_escape_string($cust_phone)." and `d_status`='0'   "));
					if($count>0)
					{	
						$msg="Customer data Already Exists.Please Select Diffetrent Customer";
						$error=1;
					}
			}

		
		if($error==0){
		
		
		$upload_path = "images/";
		$images="";
		$upload_status=0;
		for($i=1;$i<=8;$i++)
		{
			
			
			if($_FILES['image_'.$i]['tmp_name']!='')
			{
			$image_name = $emp_id.'-'.time().'-'.rand(1000,9999).'.jpg';
				if($images=="")
				{
					$images=$image_name;
				}
				else
				{
					$images=$images.",".$image_name;
				}
				$target_path = $upload_path.$image_name;
			
				if(move_uploaded_file($_FILES['image_'.$i]['tmp_name'], $target_path))
				{
					$upload_status=1;
				}
				else
				{
					$upload_status=0;
					break;
				}
			}
		}
			
		
		
		
		
		
		if($upload_status==1)
		{
		
			$query="INSERT INTO `customer` SET cust_name='".$cust_name."', cust_phone='".$cust_phone."', emp_id='".$emp_id."' ";
			mysql_query($query);
			
			$account_id=mysql_insert_id();
					
			$msg = 'Successfully Registered';
			$response['details']= array();
			
			/*$qdocs=mysql_query("INSERT INTO `customer_documents` SET cust_id='".$account_id."', image_1='".$image_1."', image_2='".$image_2."', image_3='".$image_3."',image_4='".$image_4."',image_5='".$image_5."',image_6='".$image_6."',image_7='".$image_7."',image_8='".$image_8."', ");*/
			
			$upload_date=date("Y-m-d h:i:s");
			
			
			$qdocs=mysql_query("INSERT INTO `customer_documents` SET cust_id='".$account_id."', images='".$images."',date='".$upload_date."',pending_date='".$timestamp."' ");
			
			mysql_query($qdocs);
			
			$roowEmp = mysql_fetch_assoc($qcheck);
			$status=1;
			$msg = 'Succesfully Added Customer Details';
		}
		else 
		{
			$status=0;
			$msg = 'Error Uploading Data';  
				
		}
		 
 	}
	$output = array("#serviceName" => $serviceName, "status" => $status,"msg" => $msg);
 }else{
  		$output = array("#serviceERR"=>1);
 } 
 
  header('Content-Type: application/json');
    print json_encode($output);
  
   ?>