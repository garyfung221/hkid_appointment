<?php session_start(); ?>

<?php 
if(isset($_SESSION['username'])){



?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Panel</title>
    <meta name="robots" content="noindex" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5" />
    <link rel="stylesheet" href="styles/admin.css" />
    <link rel="stylesheet" href="styles/createuser_form.css" />
    <link rel="stylesheet" href="styles/adminnav.css" />
    <link rel="stylesheet" href="styles/calendar.css" type="text/css">

  </head>
  <body>
 

    <!-- Sidebar -->
    <div id="pgside">

      <div id="pguser">
        <img src="images/icon2.png"/>
        <i class="txt">Hello, <?php echo $_SESSION['username'];?></i>
      </div>

       <!-- Menu Items -->
      <a href="adminpanel_homepage.php" >
        <i class="ico">&#9737;</i>
        <i class="txt">Appointment</i>
      </a>
      <a href="adminpanel_addquotas.php" class="current">
      <i class="ico">&#9733;</i>
        <i class="txt">Add Quotas</i>
      </a>
      <a href="adminpanel_staffaccount.php">
        <i class="ico">&#9728;</i>
        <i class="txt">Staff Account</i>
      </a>

    </div>

    <!-- Main -->
    <main id="pgmain">
  

    <?php
//Connect database
include "db.php";
?>
      <ul class="menu">
        <li></li>
        <li></li>
        <li><a href="index.php">HomePage</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li class="slider"></li>
      </ul>

<br>
<?php include "calendar.php"?>

<?php
//To set the limitation of appointment date of next 7 days
$date = strtotime("+1 day");
$datePlus = strtotime("+7 day");
?>

<h3>Add the Appointment Quotas</h3>
      <form class="form" method="post" action="adminpanel_addquotas.php">
        <label for="app_quotas_date">Select Date</label>
        <input type="date" min="<?php echo date('Y-m-d',$date); ?>" max="<?php echo date('Y-m-d', $datePlus); ?>" name="app_quotas_date" required/>
        <label for="app_quotas">Quotas</label>
        <input type="number" name="app_quotas" value="16" readonly/>
        <br>
        <input type="submit" name="addquotas_btn" value="Add"/>
      </form>

      <?php include "addquotas_process.php" ?>

    </main>
  </body>
</html>

<?php 


}else{
  header('Location: index.php');
}
?>