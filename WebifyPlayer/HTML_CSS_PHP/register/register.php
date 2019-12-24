<!DOCTYPE html>
<html lang="en-US">

<head>
    <title> Webify </title>
    <link rel="icon" type="image/gif/png" href="../../images/logo.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="layout.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <!--  TOP BAR   -->
    <!-- should only have logo and title  -->
    <header>
        <img src="../../images/logo.png" alt="logo">
        <h1>Webify</h1>
        <div id="signup">
            <a href="../register/register.php">Register</a>
            <a href="../login/login.php">Login </a>
        </div>
    </header>

    <div id="sidebar-clone">
      <div id="sidebar">
        <ul>
            <li><i class="fa fa-home"></i><a href="../home/home.php">Home</a></li>
            <li><i class="fa fa-search"></i><a href="../search/search.php">Search</a></li>
        </ul>
      </div>
    </div>


    <!-- page content -->
    <!-- should have register form, sidebar to return to home and search,... -->

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
