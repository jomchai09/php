<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/prescription data.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare prescription data object
$prescriptiondata = new prescription data($db);
 
// set prescription data property values
$prescriptiondata->prescriptionnumber = $_POST['prescription number'];
$prescriptiondata->prescriptiondate = $_POST['prescription date'];
$prescriptiondata->prescriptiondetails = base64_encode($_POST['prescription details']);
$prescriptiondata->id = $_POST['id'];

 
// create the prescription data
if($prescriptiondata->update()){
    $prescriptiondata_arr=array(
        "status" => true,
        "message" => "Successfully Updated!"
    );
}
else{
    $prescriptiondata_arr=array(
        "status" => false,
        "message" => "Email already exists!"
    );
}
print_r(json_encode($prescriptiondata_arr));
?>