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
$prescriptiondata->id = $_POST['id'];
 
// remove the prescription data
if($prescriptiondata->delete()){
    $prescriptiondata_arr=array(
        "status" => true,
        "message" => "Successfully Removed!"
    );
}
else{
    $prescriptiondata_arr=array(
        "status" => false,
        "message" => "prescription data Cannot be deleted. may be he's assigned to a patient!"
    );
}
print_r(json_encode($prescription ata_arr));
?>