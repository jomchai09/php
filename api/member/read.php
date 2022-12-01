<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/member .php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare member  object
$member  = new member ($db);
 
// query member 
$stmt = $member ->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // member s array
    $member s_arr=array();
    $member s_arr["member "]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $member _item=array(
            "id" => $id,
            "member name" => $membername,
            "member address" => $memberaddress,
            "phone" => $phone,
           
        );
        array_push($member s_arr["member"], $member _item);
    }
 
    echo json_encode($member s_arr["member"]);
}
else{
    echo json_encode(array());
}
?>