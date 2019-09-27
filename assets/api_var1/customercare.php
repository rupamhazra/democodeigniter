<?php
  include_once("config/connection.php");
  if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'customer_care'){
          $serviceName=$rawDataArray['#serviceName'];
		  $agency_id =$rawDataArray['agency_id'];
		 
 		 $response['details']= array();
		
		 $qcheck=mysql_query("SELECT id,phone,address,email FROM admin WHERE status='1' And id=$agency_id");
			 
		if(mysql_num_rows($qcheck)>0){
		while($roowEmp = mysql_fetch_assoc($qcheck))
		{
		
		$data=array();
		
 		$data['phone'] = $roowEmp['phone'];
		$data['address'] = $roowEmp['email'];
		$data['agency_id'] = $roowEmp['id'];
 		array_push($response['details'], $data);	
		}	 
		 

		$status=1;
		$msg="Success";
		  
		 }
	
		 $output = array("#serviceName" => $serviceName, "status" => $status,"msg"=>$msg,  "details" => $response['details']);
		 
		 }
		 else
		 {
				$output = array("#serviceERR"=>1);
		 } 
 
    header('Content-Type: application/json');
    print json_encode($output);
   ?>