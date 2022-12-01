<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/medical examination .php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare medical examination  object
$medicalexamination  = new medical examination ($db);

// set ID property of medical examination  to be edited
$medicalexamination ->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of medical examination  to be edited
$stmt = $medicalexamination ->read_single();

if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $medicalexamination _arr=array(
        "medical examination id" => $row['medical examination id'],
        "medical examination date" => $row['medical examination date'],
        "patient symptoms" => $row['patient symptoms'],
        "medical examination result	" => $row['medical examination result	'],
        "doctor id" => $row['doctor id'],
        
    );
}
// make it json format
print_r(json_encode($medicalexamination_arr));
?>