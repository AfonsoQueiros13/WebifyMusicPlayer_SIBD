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
        <input type="text" name="password" placeholder="Password"> <br>
        <input type="submit" value="Register to Webify">
    </form>

</body>

</html>
