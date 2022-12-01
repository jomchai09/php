<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/member .php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare member  object
$member  = new member ($db);

// set ID property of member  to be edited
$member ->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of member  to be edited
$stmt = $member ->read_single();

if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $member _arr=array(
        "member id" => $row['member id'],
        "member name" => $row['member name'],
        "member" => $row['member address'],
        "phone" => $row['phone'],
        
        
    );
}
// make it json format
print_r(json_encode($member _arr));
?>