

<!DOCTYPE html>
<html lang="en-US">

<head>
  <title> Webify </title>
  <link rel="icon" type="image/gif/png" href="../../images/logo.png">
  <meta charset="UTF-8">
  <link href="../style.css" rel=stylesheet>
  <link href="layout.css" rel=stylesheet>
  <link href="../responsive.css" rel=stylesheet>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <!-- guest -->
  <?php

    if(isset($_SESSION['log'])==false){
   ?>
   <header>
       <img src="../../images/logo.png" alt="logo">
       <h1>Webify</h1>
       <div id="signup">
           <a href="../register/register.php">Register</a>
           <a href="../login/login.php">Login</a>
       </div>
   </header>
  <?php } ?>


  <!-- user logged in -->

  <?php
    if(isset($_SESSION['log'])==true){
   ?>
   <header>
     <img src="../../images/logo.png" alt="logo">
     <h1>Webify</h1>


    <div id="signup">

      <a href="../userprofile/user.php"><?php echo $_SESSION['username']; ?></a>

      <?php

      $id = $_SESSION['id'];
    
      $jpgphoto= "../../profile_pictures/profilephoto_user".$id.".jpg";
      ?>
     <?php if (file_exists($jpgphoto)) { ?>
       <img src=<?=$jpgphoto?> alt="Profile Photo" height="42" width="42">
     <?php } ?>

     <?php if (!file_exists($jpgphoto)) { ?>
       <img src=<?="../../images/profile.png"?> alt="Profile Photo" height="42" width="42">
     <?php } ?>


    </div>
   </header>
  <?php } ?>
