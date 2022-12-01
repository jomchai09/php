<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/prescription data.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare prescription data object
$prescriptiondata = new prescription data($db);

// set ID property of prescription data to be edited
$prescriptiondata->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of prescription data to be edited
$stmt = $prescription data->read_single();

if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $prescriptiondata_arr=array(
        
        "prescription number" => $row['prescription number'],
        "prescription date" => $row['prescription date'],
        "prescription detail" => $row['prescription detail'],
        "doctor id" => $row[' doctor id'],
        
    );
}
// make it json format
print_r(json_encode($prescriptiondata_arr));
?>