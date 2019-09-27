 <?php
  include_once("config/connection.php");
  include_once("sendsms.php");

  $rawDataArray = $_POST;
 
 $login_status=0;
  if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'forgotPassword'){
  
		  $serviceName = $rawDataArray['#serviceName'];
		  $mobile_no = $rawDataArray['mobile_no'];
		  
		  $response['details']= array();
		   
		  $qcheck=mysql_query("SELECT * from employee where 1 and `mobile_no`='".$mobile_no."' ");
		  
		  if(mysql_num_rows($qcheck)>0){
		  
			$roowEmp = mysql_fetch_assoc($qcheck);
			
			 
			 
			$data=array();
			
			
			$sendmsg_text="Your password is ".$roowEmp['password'];
			
			$data['sendmsg_text'] = $sendmsg_text;
			
			$msg="Your Password has been sent to the Registered mobile number";

			array_push($response['details'], $data);
					 
			//send_sms($roowEmp['mobile_no'],$sendmsg_text);
	
			$status=1;
			  
			 }
			 else{
			 
			  $status=0;
			  $msg="Not a Registered mobile number";
			 }  
		  
	 	$output = array("#serviceName" => $serviceName, "status" => $status,"msg"=>$msg);

 }
 else{
  		$output = array("#serviceERR"=>1);
 } 
  header('Content-Type: application/json');
    print json_encode($output);
  
   ?>