<?php
session_start();
    if(isset($_POST['appointment_btn'])){

  
$answer=$_SESSION["validationAnswer"];
$userInput=$_POST['validation'];

if($answer == $userInput){
    echo "Thank you! Your appointment has been submitted and made.";
    echo "<br>";
    echo "<a href='index.php'>Click here to Go back HomePage !</a>";
}else{
  echo "The Validation Incorrect !";
  echo "<br>";
  echo "<a href='index.php'>Click here to Go back HomePage !</a>";

}
}
?>
