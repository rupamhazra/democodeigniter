<?php
include_once("config/connection.php");
$msg = "ssssss";
$output = array("#serviceName" => $serviceName,"msg" => $msg);

if(!empty($rawDataArray) && $rawDataArray['#serviceName'] == 'edit_customer'){
	
			
			$output = array("#serviceName" => $serviceName,"msg" => $msg);
}
/*else{
  		$output = array("#serviceERR"=>1);
 }*/ 
 header('Content-Type: application/json');
    print json_encode($output);
?>