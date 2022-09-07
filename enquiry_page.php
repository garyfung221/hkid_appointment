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
     

      <!-- second area -->
      <h1>Appointment Form</h1>

      <?php include "formCaptchaValidation.php"?>


  
          <!-- content -->
    <section id="shout">
      <h1>IMPORTANT REMIND</h1>
      <p>1. Using the Date of Birth and Enquiry Code to check your appointment details.</p>
    </section>



 <!--Appointment Form-->
<div class="form-popup" id="myForm">
  <form method="post" action="confirm_enquiry.php" class="form-container">

  <!--That div make the input on the same line-->


    Date of Birth
    <div style="display: flex;">
    <label for="dob"><br></label>
    <br>
    <!--Date of Birth-->
    <input type="date" name="dob" value="2000-01-01" max="<?php echo date('Y-m-d'); ?>" required>

</div>



<br>

    <!--Enquiry Code-->
    <label for="enquiry_code">Enquiry Code<br></label>
    <input type="text" pattern="[0-9]{4}" placeholder="4-digit numbers" maxlength="4" name="enquiry_code" required>

    <br>

    <!--Captcha Validation-->
    <label for="validation">Validation<br></label>
    <input type="text" parttern="[0-9]" placeholder="<?php echo " $a_validation_number$symobls$b_validation_number = ? " ?>" name="validation" required>


    <button type="submit" name="enquiry_btn" class="btn">Click To Enquiry</button>
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
