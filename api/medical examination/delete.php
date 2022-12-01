<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/medical examination .php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare medical examination  object
$medicalexamination  = new medical examination ($db);
 
// set medical examination  property values
$medicalexamination ->id = $_POST['id'];
 
// remove the medical examination 
if($medicalexamination ->delete()){
    $medicalexamination _arr=array(
        "status" => true,
        "message" => "Successfully Removed!"
    );
}
else{
    $medicalexamination_arr=array(
        "status" => false,
        "message" => "medical examination  Cannot be deleted. may be he's assigned to a patient!"
    );
}
print_r(json_encode($medicalexamination _arr));
?>