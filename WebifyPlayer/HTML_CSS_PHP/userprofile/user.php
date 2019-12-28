<?php
session_start();

include('../header.php');
include('../iconmenu.php');
include('../footer.php');

$id=$_SESSION['id'];


 ?>
  <div id="rest">
    <h1><?echo($_SESSION['username'])?></h1>

    <h2> Change Profile Picture of User :  <?php echo($_SESSION['username'])?> </h2>
      <form action="../php_actions/action_upload.php" method="post" enctype="multipart/form-data">
                    Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit"  name="submit">
      </form>
  </div>
