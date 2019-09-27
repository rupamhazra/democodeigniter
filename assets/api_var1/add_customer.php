 <?php
  include_once("config/connection.php");
  if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'add_customer'){
		  
		   //	print_r($rawDataArray);
			//die;
			$serviceName	= $rawDataArray['#serviceName'];
		  	$cust_name 		= $rawDataArray['cust_name'];
			$cust_phone 	= $rawDataArray['cust_phone'];
			if(isset($rawDataArray['area_id']))
			{
			$area_id 		= $rawDataArray['area_id'];
			}
			else
			{
				$area_id	= 0;
			}
			
			
			
			
			$image_type_1 = $rawDataArray['image_type_1'];
			$image_type_2 = $rawDataArray['image_type_2'];
			$image_type_3 = $rawDataArray['image_type_3'];
			$image_type_4 = $rawDataArray['image_type_4'];
			$image_type_5 = $rawDataArray['image_type_5'];
			$image_type_6 = $rawDataArray['image_type_6'];
			$image_type_7 = $rawDataArray['image_type_7'];
			$image_type_8 = $rawDataArray['image_type_8'];
			$cust_adhar_no = $rawDataArray['cust_adhar_no'];
			$cust_form_collector_no =$rawDataArray['cust_form_collector_no'];
			
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
			
			if($cust_phone!='')
			{
				
				$count=mysql_num_rows(mysql_query("select cust_phone from `customer` where 
				`cust_phone`=".mysql_real_escape_string($cust_phone)." and `d_status`='0'   "));
					if($count>0)
					{	
						$msg="Customer data Already Exists.Please Select Diffetrent Customer";
						$error=1;
					}
					
					$count=mysql_num_rows(mysql_query("select mobile_no from `employee` where 
					`mobile_no`=".mysql_real_escape_string($cust_phone)." and `d_status`='0'   "));
					if($count>0)
					{	
						$msg="Customer Phone No should not be same as employee Number";
						$error=1;
					}
		
			}
		
		if($error==0)
		{
			$upload_path = "images/";
			$images=array();
			$imageType= array();
			$upload_status=0;
		for($i=1;$i<=8;$i++)
		{
			if($_POST['image_type_'.$i]!='')
			{
				//$imageType = $_POST['image_type_'.$i];
				array_push($imageType,$_POST['image_type_'.$i]);
			if($_FILES['image_'.$i]['tmp_name']!='')
			{
				
			$image_name = $emp_id.'-'.time().'-'.rand(1000,9999).'.jpg';
				if(sizeof($images)==0)
				{
					$images[0]=$image_name;
				}
				else
				{
					//$images=$image_name;
					array_push($images,$image_name);
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
		}
		
		


		if($upload_status==1)
		{
	
	$query="INSERT INTO `customer` SET cust_name='".$cust_name."',`area_code`='".$area_id."', cust_phone='".$cust_phone."',cust_adhar_no ='".$cust_adhar_no."',cust_form_collector_no='".$cust_form_collector_no."',emp_id='".$emp_id."' ";
	//exit;
			mysql_query($query);
			
			$account_id=mysql_insert_id();
					
			$msg = 'Successfully Registered';
			$response['details']= array();
			
			/*$qdocs=mysql_query("INSERT INTO `customer_documents` SET cust_id='".$account_id."', image_1='".$image_1."', image_2='".$image_2."', image_3='".$image_3."',image_4='".$image_4."',image_5='".$image_5."',image_6='".$image_6."',image_7='".$image_7."',image_8='".$image_8."', ");*/
			
			$upload_date=date("Y-m-d h:i:s");
			//echo count($images); die;
			if(sizeof($images)>0)
			{
				for($i=0; $i<sizeof($images); $i++)
				{
					$qdocs="INSERT INTO `customer_documents_dtl` SET cust_id='".$account_id."', image_type='".$imageType[$i]."', 
					images='".$images[$i]."', date='".$upload_date."',pending_date='".$timestamp."',d_status='0' ";
					mysql_query($qdocs);
				}
				
			}
			//$roowEmp = mysql_fetch_assoc($qcheck);
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