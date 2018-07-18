<?php
$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST"){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$company = $json->result->parameters->companie;
	$date = $json->result->parameters->toDate;
	$today = new Date('18/17/2018');

	if($date > $today)
	{
		$speech = "ไม่มีข้อมูล";
	}
	else
	{
		$speech = "นี่ค่ะ ข้อมูลบริษัท ". $company . " ของวัน " . $date;
	}
	//$speech = $date . $today ;
	
	$response = new\stdClass();
	$response->speech= $speech;
	$response->displayText= $speech;
	$response->source="webhook";
	echo json_encode($response);

}
else
{
	echo "Method not aloowed";
}

?>
