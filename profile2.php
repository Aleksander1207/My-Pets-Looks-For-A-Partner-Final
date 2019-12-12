<?php
session_start();
$db=mysqli_connect("localhost","root","","authentication");

if($_SESSION['username']==true)
    {
        //echo '<script type="text/javascript"> alert("Hi") </script>';
        //unset($_SESSION['username']);
        echo $_SESSION['username'];
       $username=$_SESSION['username'];
       $query="SELECT * FROM `users` WHERE `username`='$username'";
       $result=mysqli_query($db,$query);
       $result1=mysqli_query($db,$query);
       $result2=mysqli_query($db,$query);


    } 
        /*while($info=mysqli_fetch_array($result))
        {
            //echo "<p class='username'>Username: ".$info['username']."</p>";
            echo "<p class='email'>E-mail: ".$info['email']."</p>";
        }*/
?>

<!Doctype html>
<html lang="en-US">
<head>
<title>Newest Ads</title>
<meta charset ="UTF-8">
<meta name="author" content="Aleksander Aleksiev">
<meta name="description" content="A Page For Your Pet">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="profile2.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="script.js"></script>
<script src="https://kit.fontawesome.com/36da6f5b98.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="top-nav-bar">

        <div class="search-box">


            <img  class="logo" src="Pets/Images/logocolor.png">

        </div>

        <div class="menu-bar">
            <ul>
            <li><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="addpet.php"><i class="fa fa-plus-circle"></i>Add Pet</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a></li>
            </ul>
        </div>

    </div>
    <section>
         <div class="profile-card">

        <div class="image-container">

                    <img src="Pets\Images\icon4.png" style="width:20%">

            <div class="title">
            <?php
                while($info=mysqli_fetch_array($result))
                {
                    echo "<h2 class='username'>".$info['username']."</h2>";
                    break;
                }
                ?>
            </div>

        </div>

        <div class="main-container">
            <?php
                while($info1=mysqli_fetch_array($result1))
                {
                    echo "<h4 class='email'>Email: ".$info1['email']."</h4>";
                }
            ?>
        </div>

    </div>
    </section>
</body>
</html>

    