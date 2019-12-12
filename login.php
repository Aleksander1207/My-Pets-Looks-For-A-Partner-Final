<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","authentication");
// Check connection

if(isset($_POST['login-btn']))
{
    $username =$_POST ['username'];
    $password =$_POST ['password'];

    //$password=md5($password);

   $sql="SELECT * FROM users WHERE username='$username' AND password='$password' ";
    $result=mysqli_query($db,$sql);

    if (mysqli_num_rows($result)==1)
    {
        $_SESSION['username']=$username;
        header("location:home.php");//redirect to home page
    } 
    else 
    {
        $_SESSION['message']="Username/Password combination incorrect";
    }


}
?>

<!Doctype html>
<html lang="en-US">
<head>
<title>Login Form Design</title>
<meta charset ="UTF-8">
<meta name="author" content="Aleksander Aleksiev">
<meta name="description" content="A Page Your Pet">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="login1.css">
</head>
<body>
<?php
    if(isset($_SESSION['message']))
    {
        echo "<div id='error_msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
?>
    <div class="loginbox">
        <img src="Pets\Images\icon4.png" class="icon">
        <h1>Login Here</h1>
        <form action="login.php" method="POST">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="login-btn" value="Login">
            <a href="#">Forgot your password?</a><br>
            <a href="register.php">Don't have an account?</a>

        </form>
    </div>
    <img src="Pets/Images/logocolor.png" alt="logo">
</body>
</html>