<!--header-->
<?php include "header.php"?>

<div class="wrapper row2">
  <div id="container" class="clear">
    <!-- website picture -->
    <section id="slider"><a href="#"><img src="images/website_picture.png" width="960" height="400"></a></section>

    <?php
//Set the timezone in Hong Kong
date_default_timezone_set('Asia/Hong_Kong');
?>

    <div id="homepage">
      <!-- first area -->
     
      <?php include "calendar.php"?>

      <!-- second area -->
      <h1>Appointment Form</h1>

      <?php include "formCaptchaValidation.php"?>


  
          <!-- content -->
    <section id="shout">
      <h1>IMPORTANT REMIND</h1>
      <p>1. The appointment is only accepted for up to the next 7 days.</p>
      <p>2. Range of appointment time period, It should be interval 30 mins of each appointment.</p>
      <p>3. Office hours are 10 am to 5:30pm.</p>
      <p>4. Enquiry Code (custom by yourself) is for the enquiry of the appointment record. Please save it.
    </section>



 <!--Appointment Form-->
<div class="form-popup" id="myForm">
  <form method="post" action="formSubmit.php" class="form-container">

  <!--That div make the input on the same line-->
  <div style="display: flex;">

  <mat-form-field>
    <!--HKID-->
    <label for="hkid">Hong Kong Identity Card Number</label>
    <input type="text" placeholder="e.g Y123456" pattern="^[A-Z]{1}[0-9]{6}$" name="hkid" size="70" required>
    </mat-form-field>

    <mat-form-field>
      <!--HKID Check Digit-->
    <label for="check_digit">Check Digit (Upper Case)</label>
    <input type="text" placeholder="( )" name="check_digit" pattern=".{1}" maxlength="1" size="30" required>
    </mat-form-field>
</div>

    Date of Birth
    <div style="display: flex;">
    <label for="dob"><br></label>
    <br>
    <!--Date of Birth-->
    <input type="date" name="dob" value="2000-01-01" max="<?php echo date('Y-m-d'); ?>" required>

</div>

<?php
//To set the limitation of appointment date of next 7 days
$date = strtotime("+1 day");
$datePlus = strtotime("+7 day");
?>

<br>

<!--Appointment Date-->
Appointment Date
<label for="appointment_date"><br></label>
<input type="date" min="<?php echo date('Y-m-d',$date); ?>" max="<?php echo date('Y-m-d', $datePlus); ?>" name="appointment_date" required>

<br>
<br>

<!--Appointment Time-->
Appointment Time <small>(Office hours are 10am to 5:30pm)</small>
<label for="appointment_time"><br></label>
    <input type="time" min="10:00" max="17:30" value="10:00" step="1800" placeholder="Select the Appointment Time" name="appointment_time" required>

<br>
    <br>
    
    <!--Enquiry Code-->
    <label for="enquiry_code">Enquiry Code<br></label>
    <input type="text" pattern="[0-9]{4}" placeholder="4-digit numbers" maxlength="4" name="enquiry_code" required>

    <br>

    <!--Captcha Validation-->
    <label for="validation">Validation<br></label>
    <input type="text" parttern="[0-9]" placeholder="<?php echo " $a_validation_number$symobls$b_validation_number = ? " ?>" name="validation" required>


    <button type="submit" name="appointment_btn" class="btn">Click To Appointment</button>
  </form>
</div>





      <!--end home page div-->
    </div>
    <!--end container-->
  </div> 
  <!--end wrapper div-->
</div>

<!--footer-->
<?php include "footer.php"?>
