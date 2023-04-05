<?php

//Connect database
include "db.php";

//Captcha Validtion 
session_start();
    

//When the Submit button was clicked, execute the following:
if(isset($_POST['appointment_btn'])){

    $hkid = $_POST['hkid'];
    $check_digit = $_POST['check_digit'];
    $dob = $_POST['dob'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $enquiry_code = $_POST['enquiry_code'];

    //It combined the HKID and Check Digit into one variable
    $fullhkid = $hkid."(".$check_digit.")"; 

    //Regular expression

    //Set the variable to check is that all data format are correct , if incorrect it will into flase
    $allData_IsCorrect = true;
    $strmsg = "";
    
    //HKID , which allow the A-Z (Upper Case) and 0-9 number and the number length of 6 , that are the standard length format of HKID 
    if(!preg_match("/^[A-Z]{1}[0-9]{6}$/",$hkid)){
    $allData_IsCorrect = false;
    $strmsg = "The HKID input format is incorrect";
    }

    //Check Digit , which allow the A-Z (Upper Case) and 0-9 number
    if(!preg_match("/^[A-Z0-9]$/",$check_digit)){
        $allData_IsCorrect = false;
        $strmsg .= "The Check Digit input is incorrect , Please input the upper case";
    }

    //Check Date of Birth , which allow who are 100years old people 
    if(!preg_match("/(^(20|19)\d{2}).(\d{2}).(\d{2})$/",$dob)){
        $allDate_IsCorrect = false;
        $strmsg .= "The Date of Birth format is incorrect";
    }

    //Appointment Date , the format rule should be yyyy-mm-dd 
    if(!preg_match("/(^(20|19)\d{2}).(\d{2}).(\d{2})$/",$appointment_date)){
        $allDate_IsCorrect = false;
        $strmsg .= "The Date of Birth format is incorrect";
    }

    //Appointment Time, the range of appointment time period it should be interval 30 mins of each appointment
    if(!preg_match("/(^[0-1][0-7]:[0-3][0-0]$)/",$appointment_time)){
        $allDate_IsCorrect = false;
        $strmsg .= "The Time range is incorrect";
    }
    
    //Enquiry Code , it should be 4 digits numbers
    if(!preg_match("/^[0-9]{4}$/",$enquiry_code)){
        $allDate_IsCorrect = false;
        $strmsg .= "The Enquiry Code fomart incorrect";
    }

/*
   //Check the Data is that Correct

    if($allData_IsCorrect==1){
        echo "true";
    }else{
        echo "false";
    }
*/  

include "openssl_encrypt.php";

$appointment_full = false;

$encrypted_fullhkid=encryption($fullhkid,$key);

  //Captcha Validtion 
  $answer=$_SESSION["validationAnswer"];

  //prvent XSS
  $userInput=htmlspecialchars($_POST['validation'],ENT_QUOTES,'UTF-8');
  



  //Check the appointment quotas 
  $sql = $conn->prepare("SELECT * FROM appointment_quotas WHERE app_quotas_date = ?");
  $sql->bind_param("s",$appointment_date);
  $sql->execute();
  $result=$sql->get_result();
  
  //If the appointment quotas do not exist, return an alert
if($result->num_rows == 0){
  echo "This day's appointment does not exist. Please select another date!";
  echo "<br>";
  echo "<a href='index.php'>Click here to go back to the homepage!</a>";
  return 0;
}

  //If the appointment quotas is full , return and alert
  while($row = $result->fetch_assoc()){
    if($row['app_quotas']==0){
      $appointment_full =true;
      if($appointment_full==true){
        echo "This day's appointment is already full. Please select the other date ! ";
        echo "<br>";
        echo "<a href='index.php'>Click here to Go back HomePage !</a>";
        return 0;
      }
       
    }
    }
  
  
  //If Captch Validation and User Data Input are correct 
  if($answer == $userInput && $allData_IsCorrect == true){
      echo "Thank you!"."<br>"."Your appointment has been submitted and made.";
      echo "<br>";
      echo "<a href='index.php'>Click here to Go back HomePage !</a>";

      //Papared Statement
        $sql = $conn->prepare("INSERT INTO appointment_list (hkid,dob,app_date,app_time,enquiry_code) VALUES (?,?,?,?,?)");
        $sql->bind_param("sssss",$encrypted_fullhkid,$dob,$appointment_date,$appointment_time,$enquiry_code);
        $sql->execute();

        //If the appointment has the remaining quotas , subtract 1 of the selected date quotas and create an appointment
      $subtraction = 1;
      $sql = $conn->prepare("UPDATE appointment_quotas SET app_quotas = (app_quotas - ?) WHERE app_quotas_date = ?");
      $sql->bind_param("is",$subtraction,$appointment_date);
      $sql->execute();

/*

//Check the query is that work or not

echo "inserted!";

*/

    //If the Captcha Validation and User Data Input are both incorrect
  }else if($answer != $userInput && $allData_IsCorrect == false){
    echo "The Validation and Data Input Incorrect !";
    echo "<br>";
    echo "<a href='index.php'>Click here to Go back HomePage !</a>";
    //If only the Captcha Validation incorrect
  }else if($answer != $userInput){
    echo "The Validation Incorrect !";
    echo "<br>";
    echo "<a href='index.php'>Click here to Go back HomePage !</a>";
    //If only the User Data Input incorrect
  }else if($allData_IsCorrect == false){
    echo "The Data Input Incorrect !";
    echo "<br>";
    echo $strmsg;
    echo "<br>";
    echo "<a href='index.php'>Click here to Go back HomePage !</a>";
  }


}

?>
