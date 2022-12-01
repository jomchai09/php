<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/prescription data.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare prescription data object
$prescriptiondata = new prescription data($db);
 
// query prescription data
$stmt = $prescriptiondata->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // prescription datas array
    $prescriptiondatas_arr=array();
    $prescriptiondatas_arr["prescription datas"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $prescriptiondata_item=array(
            "prescription number" => $prescriptionnumber,
            "prescription date" => $prescriptiondate,
            "prescription details " => $prescriptiondetails,
            "id" => $id,
            
        );
        array_push($prescriptiondata_arr["prescription data"], $prescriptiondata_item);
    }
 
    echo json_encode($prescriptiondata_arr["prescription data"]);
}
else{
    echo json_encode(array());
}
?>