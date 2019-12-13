<!DOCTYPE html>
<html lang="en-US">

<head>
    <title> Webify </title>
    <link rel="icon" type="image/gif/png" href="../../images/logo.png">
    <meta charset="UTF-8">
    <link href="style.css" rel=stylesheet>
    <link href="layout.css" rel=stylesheet>
    <link href="responsive.css" rel=stylesheet>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>

    <header>
        <img src="../../images/logo.png" alt="logo">
        <h1> Webify </h1>

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

    <!-- <div id="signin"> -->
    <form action="../php_actions/action_login.php" method="post">
        <input type="text" name="email" placeholder="email"> <br>
        <input type="text" name="password" placeholder="password"> <br>
        <input type="submit" value="Log in">
    </form>
    <!-- </div> -->

</body>

</html>