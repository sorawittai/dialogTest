<?php
$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST"){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	
	$Flavor = $json->result->parameters->Flavor;
	$input_ice =$json->result->action;
	$Cataegory = $json->result->parameters->Cataegory;
	$Number = $json->result->parameters->number
		

	$company = $json->result->parameters->companie;
	$input_com =$json->result->action;
	$date = $json->result->parameters->toDate;
	$today = date('Y-m-d');
	
	if($input_com == "input.company")
	{
		if($date > $today)
		{
			$speech = "ไม่มีข้อมูล";
		}
		else
		{
			$speech = "นี่ค่ะ ข้อมูลบริษัท ". $company . " ของวัน " . $date;
		}
	}
	
	else if($input_ice == "input.icecream")
	{
		$speech = "นี่ค่ะไอศกรีม " . $Flavor ." " . $Number . " " . $Category;
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
