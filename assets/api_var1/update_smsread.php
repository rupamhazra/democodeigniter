 <?php
  include_once("config/connection.php");
  if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'update_sms_status'){
          $serviceName=$rawDataArray['#serviceName'];
 		  $response['details']= array();
		  
		  /*echo "SELECT * notification_employee WHERE emp_id='".$emp_id."' ";
		  die;*/
		  
		
		 $qcheck_update=mysql_query("UPDATE notification_employee SET sms_status='1'  WHERE emp_id='".$emp_id."' ");
		 
		 /*$qcheck=mysql_query("SELECT * FROM notification_employee WHERE emp_id='".$emp_id."' ");
		 
		 $count=mysql_num_rows($qcheck);
			 
		 if($count>0){
		while($roowEmp = mysql_fetch_assoc($qcheck))
		{
		
		$data=array();
 		
 		$data['emp_id'] = $roowEmp['emp_id'];
 		$data['notify_text'] = $roowEmp['notify_text'];
 		$data['sms_status'] = $roowEmp['sms_status'];
		$data['count'] = $count;
		
		
 		array_push($response['details'], $data);	
		}	 */
		
		if($qcheck_update===TRUE)
		{
		 

		$status=1;
		$msg="Success";
		  
		 }else{
		 
		  $status=0;
		  $msg="No records Found";
		 }   
	
		 $output = array("#serviceName" => $serviceName, "status" => $status,"msg"=>$msg);
		 
 }else{
  		$output = array("#serviceERR"=>1);
 } 
 
  header('Content-Type: application/json');
    print json_encode($output);
  
   ?>