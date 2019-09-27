 <?php
  include_once("config/connection.php");
  if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'notification'){
          $serviceName=$rawDataArray['#serviceName'];
 		  $response['details']= array();
		  
		  /*echo "SELECT * notification_employee WHERE emp_id='".$emp_id."' ";
		  die;*/
		  
		
		 $qcheck=mysql_query("SELECT * FROM notification_employee WHERE emp_id='".$emp_id."' ");
		 $count=mysql_num_rows($qcheck);
			 
		 if($count>0){
		while($roowEmp = mysql_fetch_assoc($qcheck))
		{
		
		$data=array();
 		
 		$data['emp_id'] = $roowEmp['emp_id'];
 		$data['notify_text'] = $roowEmp['notify_text'];
 		
		
		
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