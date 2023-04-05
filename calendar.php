
<?php
//Set the timezone in Hong Kong
date_default_timezone_set('Asia/Hong_Kong');

include "calendar_calculatequota_process.php";
?>


<h1>Appointment Calendar</h1>
   
   <strong><h5><?php echo "CURRENT DATE : " .date("l "). date("Y-m-d") . "<br>"; ?></h5></strong>
   <br>
   The representative colours meaning :
   <br>
   <br>
   Current day number : <span style="color:grey">Grey</span>
   <br>Full: <span style="color:red">Red</span> 
   <br>
   Remaining not many quotas: <span style="color:orange">Orange</span> 
   <br>
   Enough available: <span style="color:#1abc9c">Green</span>
   <br>
   <br>
   <div class="month">      
<ul>

 <li>
   September<br>
   <span style="font-size:18px"><?php echo date("Y") ?></span>
   
 </li>
</ul>
</div>

<ul class="weekdays">
<li>Mo</li>
<li>Tu</li>
<li>We</li>
<li>Th</li>
<li>Fr</li>
<li>Sa</li>
<li>Su</li>
</ul>

<ul class="days">  

<?php 
//cal current year , month , days and 
$month = date('m');
$year = date('Y');
$Days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
?>

<?php
//if i == current day , class="active" , else <li></li>
$currentDay =  date('d');

for($i = 1 ; $i <= $Days ; $i++){
    if($currentDay == $i){
        ?>
<li><span class="active"><?php echo $i ?></span></li>
        <?php
    }else{
      ?>
        <li><span class="<?php echo calquotas($i);?>"><?php echo $i ?></span></li>
      <?php
    }
?>


<?php   
}
?>

<br>