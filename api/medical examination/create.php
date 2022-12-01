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
$medicalexamination ->name = $_POST['medical examination id'];
$medicalexamination ->age = $_POST['medical examination date'];
$medicalexamination ->patiensymptoms = base64_encode($_POST['patien symptoms']);
$medicalexamination ->medicalexaminationresult = $_POST['medical examination result'];
$medicalexamination ->doctorid = $_POST['dovtor id'];


// create the medical examination 
if($medicalexamination->create()){
    $medicalexamination_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "medical examination id" => $medicalexamination ->medicalexaminationid,
        "medical examination date" => $medicalexamination ->medicalexaminationdate,
        "patien symtoms" => $medicalexamination ->patiensymptoms,
        "doctor id" => $medicalexamination ->doctorid,
    );
}
else{
    $medicalexamination_arr=array(
        "status" => false,
        "message" => "Email already exists!"
    );
}
print_r(json_encode($medicalexamination_arr));
?>