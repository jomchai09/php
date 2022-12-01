<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/member .php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare member  object
$member  = new member ($db);
 
// set member  property values
$member ->id = $_POST['id'];
 
// remove the member 
if($member ->delete()){
    $member _arr=array(
        "status" => true,
        "message" => "Successfully Removed!"
    );
}
else{
    $member _arr=array(
        "status" => false,
        "message" => "member  Cannot be deleted. may be he's assigned to a patient!"
    );
}
print_r(json_encode($member _arr));
?>