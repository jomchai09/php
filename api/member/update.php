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
$member ->membername = $_POST['member name'];
$member ->memberaddress = $_POST['member address'];
$member ->password = base64_encode($_POST['password']);
$member ->phone = $_POST['phone'];


 
// create the member 
if($member ->update()){
    $member _arr=array(
        "status" => true,
        "message" => "Successfully Updated!"
    );
}
else{
    $member _arr=array(
        "status" => false,
        "message" => "Email already exists!"
    );
}
print_r(json_encode($member _arr));
?>