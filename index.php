<?php
$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST"){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$company = $json->result->parameters->Company;
	$today = $json->result->parameters->date;
	$date = new date();

	/*if($today < $date)
	{
		
	}
	else
	{
		$speech = $today;
	}*/
	$speech = $company.$today;

	$response = new\stdClass();
	$response->speech="";
	$response->displayText="";
	$response->source="webhook";
	echo json_encode($response);

}else
{
	echo "Method not aloowed";
}


?>