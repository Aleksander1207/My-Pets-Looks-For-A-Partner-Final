<?php
require_once "config.php";

/*if(isset($_SESSION['access_token']))
{
    $db=mysqli_connect("localhost","root","","authentication");

    $sql="INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
    header("location:home.php");
    exit();
}*/

try 
{
    $accessToken=$helper->getAccessToken();

}
catch(\Facebook\Exceptions\FacebookResponseException $e)
{

    echo "Response Exception: ".$e->getMessage();
    exit();
}
catch(\Facebook\Exceptions\FacebookSDKException $e)
{
    echo "SDK Exception: ".$e->getMessage();
    exit();
}

//if we do not get accessToken we go back to register
if(!$accessToken)
{
    header("location:register.php");
    exit();
}

//here we get long-lived accessToken because it usually lasts for about an hour

$oAuth2Client=$FB->getOAuth2Client();

if(!$accessToken->isLongLived())
{
    $accessToken=$oAuth2Client->getLongLivedAccessToken($accessToken);
}

$response=$FB->get("/me?fields=id,first_name,last_name,email,picture.type(large)",$accessToken);
$userData=$response->getGraphNode()->asArray();

//echo"<pre>";
//var_dump($userData);

$username=$userData['first_name'] . "  " .$userData['last_name'];
$email=$userData['email'];
$picture=$userData['picture'];
$password="";
//echo $username;
//echo $email;

//connect to database
$db=mysqli_connect("localhost","root","","authentication");

$sql="INSERT INTO users(username,email,password,picture) VALUES('$username','$email','$password','$picture')";
$result=mysqli_query($db,$sql);
if($result)
{
    //echo '<script type=text/javascript>alert("Data Saved!");</script>';
    $_SESSION['userData']=$userData;
    $_SESSION['access_token']=(string) $accessToken;
    $_SESSION['username']=$username;
    $_SESSION['picture']=$picture;
    header("location:home.php");
    exit();
}
else
{
    echo '<script type=text/javascript>alert("Data Not Saved!");</script>';

}



?>