<?php session_start(); ?>
<?php include "db.php";?>

<link rel="stylesheet" href="styles/login.css" type="text/css">

<body class="align">

  <div class="grid">

  <?php
  if(isset($_SESSION['username'])){
    header('Location: adminpanel_homepage.php');
  }else{

  
?>

    <form action="staff_login.php" method="POST" class="form login">

      <div class="form__field">
        <label for="login__username"><svg class="icon">
            <use xlink:href="#icon-user"></use>
          </svg><span class="hidden">Username</span></label>
        <input autocomplete="username" id="login__username" type="text" name="username" class="form__input" placeholder="Username" required>
      </div>

      <div class="form__field">
        <label for="login__password"><svg class="icon">
            <use xlink:href="#icon-lock"></use>
          </svg><span class="hidden">Password</span></label>
        <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
      </div>

      <div class="form__field">
        <input type="submit" name="staff_submit" value="Sign In">
      </div>

    </form>

    <p class="text--center"><a href="index.php">HomePage</a> <svg class="icon">
        <use xlink:href="#icon-arrow-right"></use>
      </svg></p>

  </div>

</body>

<?php 
if(isset($_POST['staff_submit'])){

    $username=htmlspecialchars($_POST['username'],ENT_QUOTES,'UTF-8');
    $password=htmlspecialchars($_POST['password'],ENT_QUOTES,'UTF-8');


    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $search_sql = $conn->prepare("SELECT salt, hash_password FROM staff_account WHERE username = ?");
    $search_sql->bind_param("s",$username);
    $search_sql->execute();
    $search_sql->store_result();

    if($search_sql->num_rows > 0 ){
        $search_sql->bind_result($salt, $hash_password);
        $search_sql->fetch();

        $passwordhash = hash("sha512",$salt . $password);

        if(strcmp($hash_password,$passwordhash)==0){
            $_SESSION['username'] = $username;
            header('Location: adminpanel_homepage.php');
        }else{
            echo "<h2>The password is wrong, authentication failed</h2>";
        }
    }else{
        echo "<h2>User name not exist, authentication failed</h2>";
    }

    /*
    //testing 
    
    if($username=="a" && $password=="1"){
        header('Location: adminpanel_homepage.php');
    }
    */
}

}

?>