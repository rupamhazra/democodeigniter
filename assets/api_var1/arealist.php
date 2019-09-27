 <?php
  include_once("config/connection.php");
  if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'arealist'){
          $serviceName=$rawDataArray['#serviceName'];
 		  $response['details']= array();
		  
		/*  echo "SELECT * from employee where 1 and `emp_id`='".$emp_id."'";
		  die;*/
		  
		 $qcheck=mysql_query("SELECT id,area_name,area_address,pincode FROM area WHERE d_status='0' ");
			 
		 if(mysql_num_rows($qcheck)>0){
		while($roowEmp = mysql_fetch_assoc($qcheck))
		{
		
		$data=array();
 		$data['id'] = $roowEmp['id'];
 		$data['area_name'] = $roowEmp['area_name'];
 		$data['area_address'] = $roowEmp['area_address'];
 		$data['pincode'] = $roowEmp['pincode'];
		
		
 		array_push($response['details'], $data);	
		}	 
		 

		$status=1;
		$msg="Success";
		  
		 }else{
		 
		  $status=0;
		  $msg="No records Found";
		 }   
	
		 $output = array("#serviceName" => $serviceName, "status" => $status,"msg"=>$msg,  "details" => $response['details']);
		 
 }else{
  		$output = array("#serviceERR"=>1);
 } 
 
  header('Content-Type: application/json');
    print json_encode($output);
  
   ?>