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

    <style>

    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
    </style>

  </head>
  <body>
 

    <!-- Sidebar -->
    <div id="pgside">

      <div id="pguser">
        <img src="images/icon2.png"/>
        <i class="txt">Hello, <?php echo $_SESSION['username'];?></i>
      </div>

       <!-- Menu Items -->
      <a href="adminpanel_homepage.php" class="current">
        <i class="ico">&#9737;</i>
        <i class="txt">Appointment</i>
      </a>
      <a href="adminpanel_addquotas.php">
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


$sql = "SELECT * FROM appointment_list";
$result=$conn->query($sql);

if($result->num_rows>0){
    include "openssl_encrypt.php";
    ?>
    <table style="width:100%">
        <thead>
        <tr>
            <th>Appointment ID</th>
            <th>HKID</th>
            <th>Date of Birth</th>
            <th>Arrival Date</th>
            <th>Arrival Time</th>
            <th>Enquiry Code</th>
            <th>Appointment Created Date and Time</th>
        </tr>
        </thead>
    <?php
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['app_id']."</td>";
        echo "<td>".decryption($row['hkid'],$key)."</td>";
        echo "<td>".$row['dob']."</td>";
        echo "<td>".$row['app_date']."</td>";
        echo "<td>".$row['app_time']."</td>";
        echo "<td>".$row['enquiry_code']."</td>";
        echo "<td>".$row['created_time']."</td>";
        echo "</tr>";

    }
}

?>


      <ul class="menu">
        <li></li>
        <li></li>
        <li><a href="index.php">HomePage</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li class="slider"></li>
      </ul>

<br>
<h3>Appointment Details</h3>
    </main>
  </body>
</html>

<?php 


}else{
  header('Location: index.php');
}
?>