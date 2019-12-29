<?php
session_start();

include('../header.php');
include('../iconmenu.php');


$id=$_SESSION['id'];


 ?>
  <div id="rest">
    <h1><?php echo($_SESSION['username'])?></h1>

    <h2> Change Profile Picture </h2>
    <br>
      <form action="../php_actions/action_upload.php" method="post" enctype="multipart/form-data">
                    Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit"  name="submit">
      </form>
  </div>


<?php include('../footer.php'); ?>
