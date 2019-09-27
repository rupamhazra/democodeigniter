 <?php
  include_once("config/connection.php");
  if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'customer_details'){
          $serviceName=$rawDataArray['#serviceName'];
		  $cust_id=$rawDataArray['cust_id'];
 		  $response['details']= array();
		  
		  //echo "SELECT cust_id,images,date FROM customer_documents WHERE cust_id='".$cust_id."' and d_status='0' ";
		 
		  
		 $qcheck=mysql_query("SELECT cust_id,images,date,pending_date FROM customer_documents WHERE cust_id='".$cust_id."' and d_status='0' ");
			 
		 if(mysql_num_rows($qcheck)>0){
		while($roowEmp = mysql_fetch_assoc($qcheck))
		{
		
		$data=array();
		$images=explode(",",$roowEmp['images']);
		$images_arr=array();
		foreach($images as $image)
		{
			array_push($images_arr, "http://shyamfuture.com/SnapupApp/api/images/".$image);
			
		}
 		$data['cust_id'] = $roowEmp['cust_id'];
 		$data['date'] = $roowEmp['pending_date'];
		$data['images'] = $images_arr;
 		
	
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