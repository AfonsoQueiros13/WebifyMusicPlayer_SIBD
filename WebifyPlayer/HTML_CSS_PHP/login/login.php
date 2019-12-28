<?php
session_start();

include('../header.php');
include('../iconmenu.php');
include('../footer.php');
 ?>

    <!-- <div id="signin"> -->
<<<<<<< HEAD
    <form action="../php_actions/action_login.php" method="post">
        <input type="text" name="email" placeholder="email"> <br>
        <input type="password" name="password" id="myInput" placeholder="password"> <br>
        <input type="checkbox" onclick="myFunction()">Show Password
        <script>
            function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";    
            } else {
                x.type = "password";
            }
            }
        </script>
        <input type="submit" value="Log in">
    </form>
    <!-- </div> -->

</body>

</html>
=======
    <div id="login">
      <form action="../php_actions/action_login.php" method="post">
          <input type="text" name="email" placeholder="email" value=<?php echo $_SESSION['value']?>> <br>
          <input type="password" name="password" placeholder="password"> <br>
          <input type="submit" value="Log in">
      </form>
    </div>
>>>>>>> REFORMAT
