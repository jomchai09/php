<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/medical examination .php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare medical examination  object
$medicalexamination  = new medical examination ($db);
 
// query medical examination 
$stmt = $medicalexamination ->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // medical examination s array
    $medicalexaminations_arr=array();
    $medicalexaminations_arr["medical examination "]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $medicalexamination_item=array(
            "medical examinationid" => $medicalexaminationid,
            "medical examination date	" => $medicalexaminationdate,
            "patient symptoms" => $patientsymptoms,
            "medical examination result" => $medicalexaminationresult,
            "doctor id	" => $doctorid,
            
        );
        array_push($medicalexaminations_arr["medical examination "], $medicalexamination_item);
    }
 
    echo json_encode($medicalexaminations_arr["medical examination "]);
}
else{
    echo json_encode(array());
}
?>