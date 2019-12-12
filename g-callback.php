<?php
require_once("config.php");


if(isset($_SESSION['access_token']))
{
    $gClient->setAccessToken($_SESSION['access_token']);
}
else if (isset($_GET['code']))
{
    $token=$gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token']=$token;
}
else
{
    header("location:register.php");
    exit();
}

try
{
    $token=$gClient->fetchAccessTokenWithAuthCode($_GET['code']);
}
catch(\GoogleAPI\src\Google\Exception $e)
{
    echo "Exception: ".$e->getMessage();
    exit();
}

$oAuth= new Google_Service_Oauth2($gClient);
//creates an array with all data from the account
$userData=$oAuth->userinfo_v2_me->get();

//echo"<pre>";
//var_dump($userData);

$username=$userData['name'];
$email=$userData['email'];
$password="";
$picture=$userData['picture'];

//connect to database
$db=mysqli_connect("localhost","root","","authentication");

$sql="INSERT INTO users(username,email,password,picture) VALUES('$username','$email','$password','$picture')";
$result=mysqli_query($db,$sql);

if($result)
{

    //echo '<script type=text/javascript>alert("Data Saved!");</script>';
    $_SESSION['username']=$userData['name'];
    $_SESSION['email']=$userData['email'];
    $_SESSION['picture']=$userData['picture'];
    $_SESSION['userData']=$userData;
    header("location:home.php");
    exit();
}
else
{
    echo '<script type=text/javascript>alert("Data Not Saved!");</script>';
}




?>