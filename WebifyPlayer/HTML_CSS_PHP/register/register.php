<?php
session_start();

include('../header.php');
include('../iconmenu.php');
include('../footer.php');

 ?>

    <!-- page content -->
    <!-- should have register form, sidebar to return to home and search,... -->
    <div id="register">
      <form action="../php_actions/action_register.php" id ="sub" method="POST" onClick="setTimeout('clearform()', 2000 );">
          <input type="text" id = "e_mail" name="email" placeholder="e-mail" onkeyup='saveValue(this);'><br>
          <input type="text" id = "nick_name" name="nick" placeholder="nickname" onkeyup='saveValue(this);'> <br>
          <input type="text" id= "pass"  name="password" placeholder="password" onkeyup='saveValue(this);'> <br>
          <input type="submit" value="Register to Webify">
      </form>
      <script>
            function myFunction() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";    
            } else {
                x.type = "password";
            }
            }
        </script>
        <script>
            function clearform() {
              $( "#register" ).click(function() {
              document.getElementById("e_mail").value = ""; //don't forget to set the textbox ID
              document.getElementById("nick_name").value = ""; //don't forget to set the textbox ID
              document.getElementById("pass").value = ""; //don't forget to set the textbox ID
              getSavedValue("e_mail") = "";
              getSavedValue("nick_name") = "";
              getSavedValue("pass") = "";
            }
          }
        </script>
    <script type="text/javascript">
        document.getElementById("e_mail").value = getSavedValue("e_mail");    // set the value to this input
        document.getElementById("nick_name").value = getSavedValue("nick_name");
        document.getElementById("pass").value = getSavedValue("pass");   // set the value to this input
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
    </div>
