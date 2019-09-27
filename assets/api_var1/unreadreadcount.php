 <?php
  include_once("config/connection.php");
  if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'unreadcount'){
          $serviceName=$rawDataArray['#serviceName'];
 		  $response['details']= array();
		  
		  /*echo "SELECT * notification_employee WHERE emp_id='".$emp_id."' ";
		  die;*/
		  
		
		 $qcheck=mysql_query("SELECT * FROM notification_employee WHERE emp_id='".$emp_id."' AND sms_status='0' ");
		 $count=mysql_num_rows($qcheck);
	
		$data=array();
 	
		$data['count'] = $count;
 		array_push($response['details'], $data);	

		$status=1;
		$msg="Success";
		   
	
		 $output = array("#serviceName" => $serviceName, "status" => $status,"msg"=>$msg,  "details" => $response['details']);
		 
 }else{
  		$output = array("#serviceERR"=>1);
 } 
 
  header('Content-Type: application/json');
    print json_encode($output);
  
   ?>