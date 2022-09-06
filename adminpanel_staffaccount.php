<?php include "db.php";?>

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
  </head>
  <body>
 

    <!-- Sidebar -->
    <div id="pgside">

      <div id="pguser">
      <img src="images/icon2.png"/>
        <i class="txt">Hello, <?php echo $_SESSION['username'];?></i>
      </div>

      <!-- Menu Items -->
      <a href="adminpanel_homepage.php">
        <i class="ico">&#9737;</i>
        <i class="txt">Appointment</i>
      </a>
      <a href="adminpanel_addquotas.php">
      <i class="ico">&#9733;</i>
        <i class="txt">Add Quotas</i>
      </a>
      <a href="adminpanel_staffaccount.php" class="current">
        <i class="ico">&#9728;</i>
        <i class="txt">Staff Account</i>
      </a>

    </div>

    <!-- Main -->
    <main id="pgmain">
  
      <!--Nav bar-->
      <ul class="menu">
        <li></li>
        <li></li>
        <li><a href="index.php">HomePage</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li class="slider"></li>
      </ul>
<br>
      <h3>Create the Staff Account</h3>
      <form class="form" method="post" action="adminpanel_staffaccount.php">
        <label for="staff_username">Username</label>
        <input type="text" id="staff_username" name="staff_username"/>
  
        <label for="staff_password">Password</label>
        <input type="password" name="staff_password" id="myInput"/>
        <br>
        Show Password<input type="checkbox" onclick="passwordVisibility()">
  
        <input type="submit" name="create_staff_btn" value="Create"/>
      </form>
    </main>

    <!--button to show the password-->
    <script>
      function passwordVisibility() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
      </script>
      

  </body>
</html>


<?php 
if(isset($_POST['create_staff_btn'])){
  //prvent the XSS (Cross-site scripting)
  $staff_username = htmlspecialchars($_POST['staff_username'],ENT_QUOTES,'UTF-8');
  $staff_password = htmlspecialchars($_POST['staff_password'],ENT_QUOTES,'UTF-8');

  //prepare statement
  $search_sql = $conn->prepare("SELECT * FROM staff_account WHERE username = ?");
  $search_sql->bind_param("s",$staff_username);
  $search_sql->execute();
  $search_sql->store_result();

  if($search_sql->num_rows > 0){
    echo "The user name is aldready exist , Please use the other user name ! ";
  }else{
    $salt = generateSalt(16);
    $passwordhash = hash("sha512",$salt.$staff_password);
  }

  $insert_sql = $conn->prepare("INSERT INTO staff_account (username,salt,hash_password) VALUES (?,?,?)");
  $insert_sql->bind_param("sss",$staff_username,$salt,$passwordhash);
  if($salt!=null){
  $insert_sql->execute();
  echo"Staff Account Added !";
}else{
  
  return 0;
}
}

}else{
  header('Location: index.php');
}

function generateSalt($length){
  $rand_str = "";
  $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";

  for($i = 0; $i < $length; $i++) 
  {
      $rand_str = $rand_str . $chars[rand(0, strlen($chars) - 1)];
  } 

  return $rand_str;
}
?>
