<?php
session_start();

include('../header.php');
include('../iconmenu.php');
include('../footer.php');



 ?>

    <!-- page content -->
    <!-- should have register form, sidebar to return to home and search,... -->
<<<<<<< HEAD

    <form action="../php_actions/action_register.php" method="POST">
        <input type="text" name="email" placeholder="E-mail"><br>
        <input type="text" name="nick" placeholder="Nickname"> <br>
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
    <script type="text/javascript">
        document.getElementById("txt_1").value = getSavedValue("txt_1");    // set the value to this input
        document.getElementById("txt_2").value = getSavedValue("txt_2");   // set the value to this input
        /* Here you can add more inputs to set value. if it's saved */

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
</script>

        <input type="submit" value="Register to Webify">
    </form>

</body>

</html>
=======
    <div id="register">
      <form action="../php_actions/action_register.php" method="POST">
          <input type="text" name="email" placeholder="e-mail" value=<?php echo $_SESSION['value'] ?>><br>
          <input type="text" name="nick" placeholder="nickname" value=<?php echo $_SESSION['nick'] ?> > <br>
          <input type="password" name="password" placeholder="password"> <br>
          <input type="submit" value="Register to Webify">
      </form>
    </div>
>>>>>>> REFORMAT
