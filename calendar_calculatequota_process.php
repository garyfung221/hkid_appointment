<?php
//Connect database
include "db.php";




function calquotas($date){

global $conn;

$date = "%$date";

$sql = $conn->prepare("SELECT * FROM appointment_quotas WHERE app_quotas_date LIKE ?");
$sql->bind_param("s",$date);
$sql->execute();
$result=$sql->get_result();

while($row = $result->fetch_assoc()){
    if($row['app_quotas']==0){
        return "full_background";
    }else if($row['app_quotas']<=8){
            return "almostfull_background";
        }else{
            return "available_background";
        }
        
    }
}


?>



