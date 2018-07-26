<?php
$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST"){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	

	/*$input = $json->result->action;
	
	if($input == "input.company")
	{
	*/	
	$company = $json->result->parameters->companie;
	$date = $json->result->parameters->toDate;
	$today = date('Y-m-d');
		
		if($date > $today)
		{
			$speech = "ไม่มีข้อมูล";
		}
		else
		{
			$speech = "นี่ค่ะ ข้อมูลบริษัท ". $company . " ของวัน " . $date;
		}
	}
	
	/*else if($input == "input.icecream")
	{
		
	$fv = $json->result->parameters->Flavor;
	$cg = $json->result->parameters->Cataegory;
	$nb = $json->result->parameters->number
		
		$speech = "นี่ค่ะไอศกรีม " . $fv ." " . $nb . " " . $cg;
	}*/

	
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
