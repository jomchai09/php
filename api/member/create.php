<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/member.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare member object
$member = new member($db);
 
// set member property values
$member->memberid = $_POST['member id'];
$member->membername = $_POST['member name'];

$member->memberaddress = $_POST['member address'];



// create the member
if($member->create()){
    $member_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        
        "member id" => $member->memberid,
        "member name" => $member->membername,
        "member address" => $member->memberaddress,
        
        "phone" => $member->phone
    );
}
else{
    $member_arr=array(
        "status" => false,
        "message" => "Email already exists!"
    );
}
print_r(json_encode($member_arr));
?>