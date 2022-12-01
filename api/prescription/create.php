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
$prescriptiondata->prescriptionnumber  = $_POST['prescription number '];
$prescriptiondata->prescriptiondate = $_POST['prescription date'];
$prescriptiondata->password = base64_encode($_POST['password']);
$prescriptiondata->prescriptiondetail = $_POST['prescription detail'];
$prescriptiondata->doctorid = $_POST['doctor id'];


// create the prescription data
if($prescriptiondata->create()){
    $prescriptiondata_arr=array(
        "status" => true,
        "messprescription date" => "Successfully Signup!",
        "id" => $prescriptiondata->id,
        "prescription number " => $prescriptiondata->prescriptionnumber ,
        "prescription date" => $prescriptiondata->prescriptiondate,
        "prescription detail" => $prescriptiondata->prescriptiondetail,
        
        "id" => $prescriptiondata->id
    );
}
else{
    $prescriptiondata_arr=array(
        "status" => false,
        "messprescription date" => "Email already exists!"
    );
}
print_r(json_encode($prescriptiondata_arr));
?>