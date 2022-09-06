<?php
//Connect database
include "db.php";

if(isset($_POST['addquotas_btn'])){

    $addquotas_date = $_POST['app_quotas_date'];
    $addquotas_quotas = $_POST['app_quotas'];

    $search_sql = $conn->prepare("SELECT * FROM appointment_quotas WHERE app_quotas_date = ?");
    $search_sql->bind_param("s",$addquotas_date);
    $search_sql->execute();
    $search_sql->store_result();

    if($search_sql->num_rows > 0){
        echo "This Appointment date has already been added ! Please try to add another date.";
    }else{
        $insert_sql = $conn->prepare("INSERT INTO appointment_quotas (app_quotas_date,app_quotas) VALUES (?,?)");
        $insert_sql->bind_param("si",$addquotas_date,$addquotas_quotas);
        $insert_sql->execute();
        echo "ADDED";
    }
}

?>
