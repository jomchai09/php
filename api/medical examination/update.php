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
$medicalexamination ->id = $_POST['medical examination id'];
$medicalexamination ->name = $_POST['medical examination date'];
$medicalexamination ->patientsymptoms = $_POST['patient symptoms'];
$medicalexamination ->medicalexaminationresult = base64_encode($_POST['medical examination result']);
$medicalexamination ->medicalexaminationresult	 = $_POST['medical examination result	'];
$medicalexamination ->doctor id	 = $_POST['doctor id'];

 
// create the medical examination 
if($medicalexamination->update()){
    $medicalexamination_arr=array(
        "status" => true,
        "message" => "Successfully Updated!"
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