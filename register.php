<?php
require_once "config.php";

//Google
$loginUrl1=$gClient->createAuthUrl();

//Facebook
$redirectURL="http://localhost/fb-callback.php";
$permissions=['email'];

$loginUrl=$helper->getLoginUrl($redirectURL,$permissions);
//echo $loginUrl;

//connect to database
$db=mysqli_connect("localhost","root","","authentication");
$sql1="SELECT * FROM users";
$result=mysqli_query($db,$sql1);

if(isset($_POST['signup-button']))
{
    $check=false;
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];

    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
        if($row['username']==$username)
        {
            $_SESSION['message']="This username is already used!";
            
        }
        else
        {
            $check=true;
        }
        if($row['email']==$email)
        {
            $check=false;
            $_SESSION['message']="This email is already used!";
        }
    }

    if($password!=$password2)
    {
        $check=false;
        $_SESSION['message']="The two passwords do not match";
    }

    if($check)
    {
        $sql="INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
        mysqli_query($db,$sql);
        $_SESSION['username']=$username;
        header("location:home.php");//redirect to home page
    }
}
?>

<!Doctype html>
<html lang="en-US">
<head>
<title>Sign Up Form</title>
<meta charset ="UTF-8">
<meta name="author" content="Aleksander Aleksiev">
<meta name="description" content="A Page Your Pet">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="register.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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

                <div class="leftbox">
                    <form method="POST" action="register.php">
                        <h1>Sign Up</h1>
                        <input type="text" name="username" placeholder="Username">
                        <input type="text" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Password">

                        <input type="password" name="password2" placeholder="Retype Password">

                        <input type="submit" name="signup-button" value="Sign Up">

                    <p><a href="login.php" target="_top">Already have an account?</a></p>
                    </form>
                </div>

                <div class="rightbox">

                    <span class="sign">Sign In With<br>Social Network</span>
                    <form>
                        <input type="button"  onclick="window.location='<?php  echo $loginUrl?>';" value="Log In With Facebook" class='btn btn-primary' >
                        <input type="button"  onclick="window.location='<?php  echo $loginUrl1?>';" value="Log In With Google" class='btn btn-danger' >
                        <button class="social instagram">Log In With Instagram</button>
                    </form>

                </div>

                <div class="or">OR</div>

        </div>
        <img src="Pets/Images/logocolor.png" alt="logo">
</body>
</html>