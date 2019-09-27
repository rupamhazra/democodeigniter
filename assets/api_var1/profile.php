 <?php
  include_once("config/connection.php");
  if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'profile'){
          $serviceName=$rawDataArray['#serviceName'];
 		  $response['details']= array();
		  
		/*  echo "SELECT * from employee where 1 and `emp_id`='".$emp_id."'";
		  die;*/
		  
		 $qcheck=mysql_query("SELECT * from employee as e LEFT JOIN area AS a ON e.area_id=a.id where 1 and e.`emp_id`='".$emp_id."' ");
			 
		 if(mysql_num_rows($qcheck)>0){
		$roowEmp = mysql_fetch_assoc($qcheck);
		
 		 
		 
		$data=array();
 		$data['emp_id'] = $roowEmp['emp_id'];
 		$data['emp_name'] = $roowEmp['emp_name'];
 		$data['emp_code'] = $roowEmp['emp_code'];
 		$data['area_id'] = $roowEmp['area_id'];
 		$data['mobile_no'] = $roowEmp['mobile_no'];
		$data['area_name'] = $roowEmp['area_name'];
		$data['area_address'] = $roowEmp['area_address'];
		$data['pincode'] = $roowEmp['pincode'];
		
		
	 
 		array_push($response['details'], $data);		 
		 

		$status=1;
		  
		 }else{
		 
		  $status=0;
		 }   
	
		 $output = array("#serviceName" => $serviceName, "status" => $status,  "details" => $response['details']);
		 
 }else{
  		$output = array("#serviceERR"=>1);
 } 
 
  header('Content-Type: application/json');
    print json_encode($output);
  
   ?>