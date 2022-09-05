<?php
session_start();
$a_validation_number = rand(2,20);
$b_validation_number = rand(1,10);

$randomOperators = array("*","+","-");
$symobls = rand(0,count($randomOperators)-1);
$symobls = $randomOperators[$symobls];
$validationAnswer = 0;
if($symobls=="*"){
  $validationAnswer = $a_validation_number * $b_validation_number;
  $_SESSION["validationAnswer"] = $validationAnswer;
}elseif($symobls=="-"){
  $validationAnswer = $a_validation_number - $b_validation_number;
  $_SESSION["validationAnswer"] = $validationAnswer;
}elseif($symobls=="+"){
  $validationAnswer = $a_validation_number + $b_validation_number;
  $_SESSION["validationAnswer"] = $validationAnswer;
}

?>