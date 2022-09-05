<?php
//Connect database
include "db.php";



//Captcha Validtion 
session_start();

if(isset($_POST['enquiry_btn'])){
    $dob = $_POST['dob'];
    $enquiry_code = $_POST['enquiry_code'];


    //Set the variable to check is that all data format are correct , if incorrect it will into flase
    $allData_IsCorrect = true;
    $strmsg = "";
    
    //Check Date of Birth , which allow who are 100years old people 
    if(!preg_match("/(^(20|19)\d{2}).(\d{2}).(\d{2})$/",$dob)){
        $allDate_IsCorrect = false;
        $strmsg .= "The Date of Birth format is incorrect";
    }

    //Enquiry Code , it should be 4 digits numbers
    if(!preg_match("/^[0-9]{4}$/",$enquiry_code)){
        $allDate_IsCorrect = false;
        $strmsg .= "The Enquiry Code fomart incorrect";
    }

     //Captcha Validtion 
  $answer=$_SESSION["validationAnswer"];
  $userInput=$_POST['validation'];

   //If Captch Validation and User Data Input are correct 
   if($answer == $userInput && $allData_IsCorrect == true){

    $sql = $conn->prepare("SELECT * FROM appointment_list where dob = ? AND enquiry_code = ?");
    $sql ->bind_param("ss",$dob,$enquiry_code);
    $sql->execute();
    $result=$sql->get_result();

    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){

            include "openssl_encrypt.php";
            decryption($row['hkid'],$key);

            echo "Your Appointment Details : "."<br>";
            echo "<br>";
            echo "Your HKID : ".substr_replace(decryption($row['hkid'],$key),"***",5)."<br>";
            echo "Appointment ID : ".$row['app_id']."<br>";
            echo "Arrival Date of Appointment : ".$row['app_date']."<br>";
            echo "Arrival Time of Appointment : ".$row['app_time']."<br>";
            echo "Appointment Created Date and Time : ".$row['created_time']."<br>";
            echo "<br>";
            echo "<a href='enquiry_page.php'>Click here to Go back  !</a>";
        }
    }else{
        echo "Appointment Not Found , Please input the correct data ! ";
        echo "<a href='enquiry_page.php'>Click here to Go back  !</a>";
    }

    
        }else{
            echo "The Validation Incorrect !";
            echo "<br>";
            echo "<a href='enquiry_page.php'>Click here to Go back HomePage !</a>";
        }
    
   

}


?>