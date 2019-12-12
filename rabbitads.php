<?php
session_start();

if(!isset($_SESSION['access_token']))
{
    header("location:register.php");
    exit();
}


//connect to database
$connection=mysqli_connect("localhost","root","","authentication");
if(isset($_SESSION['username']))
    {
        echo $_SESSION['username'];
        //unset($_SESSION['username']);
    }
    $sql="SELECT * FROM animals";
    $result=mysqli_query($connection,$sql);
    $username=$_SESSION['username'];

?>

<!Doctype html>
<html lang="en-US">
<head>
<title>Rabbit Ads</title>
<meta charset ="UTF-8">
<meta name="author" content="Aleksander Aleksiev">
<meta name="description" content="A Page For Your Pet">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="home1.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="script.js"></script>
<script src="https://kit.fontawesome.com/36da6f5b98.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="top-nav-bar">

        <div class="search-box">

        <i class="fa fa-bars" id="menu-btn" on-click="openmenu()"></i>
        <i class="fa fa-times" id="close-btn" on-click="closemenu()"></i>

            <img  class="logo" src="Pets/Images/logocolor.png">

            <input type="text" class="form-control">

            <span class="input-group-text"> <i class="fas fa-search"></i></span>


        </div>

        <div class="menu-bar">
            <ul>
                <li><a href="addpet.php"><i class="fa fa-plus-circle"></i>Add Pet</a></li>
                <li><a href="profile2.php"><i class="fa fa-user"></i>Your Profile</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a></li>
            </ul>
        </div>

    </div>

    <section class="header">
        <div class="side-menu" id="side-menu">
            <ul>
                <a href="home.php"><li>Newest Ads  <i class="fa fa-angle-right"></i></li></a>
                <a href="oldestads.php"><li>Oldest Ads  <i class="fa fa-angle-right"></i></li></a>
                <a href="dogads.php"><li>Dog Ads  <i class="fa fa-angle-right"></i></li></a>
                <a href="catads.php"><li>Cat Ads  <i class="fa fa-angle-right"></i></li></a>
                <a href="parrotads.php"><li>Parrot Ads  <i class="fa fa-angle-right"></i></li></a>
                <a href="hamsterads.php"><li>Hamster Ads  <i class="fa fa-angle-right"></i></li></a>
                <a href="rabbitads.php"><li>Rabbit Ads  <i class="fa fa-angle-right"></i></li></a>
            </ul>
        </div>

        <div class="slider">
                    <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="Pets/Images/cat.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                <img src="Pets/Images/golden1.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                <img src="Pets/Images/dogs2.jpeg" class="d-block w-100">
                </div>
            </div>
                <ol class="carousel-indicators">
                     <li data-target="#slider" data-slide-to="0" class="active"></li>
                    <li data-target="#slider" data-slide-to="1"></li>
                    <li data-target="#slider" data-slide-to="2"></li>
                </ol>
            </div>
        </div>
    </section>
    <!------Your Ads------->
    
    <section class="featured-categories">
        <div class="container">
                <div class="title-box">
                    <h2>Your Ads</h2>
                </div>

                <div class="row">
                    
                        <?php
                        if($result->num_rows>0)
                        {
                        while($row=$result->fetch_assoc())
                        {
                            if($row['username']==$username && $row['type']=="rabbit")
                            {
                                if($row['gender']=="m")
                                {
                                    echo"<div class='col-md-4'>";
                                        echo"<a href='animal.php?edit=$row[id]'><img class='image'  src='".$row['image']."'></a>";
                                            echo"<h2>A Male ".$row['type']."</h2>";
                                            echo "<h5>".$row['breed']."</h5>";
                                    echo"</div>";
                                    
                                   
                                }
                                else
                                {
                                    echo"<div class='col-md-4'>";
                                    echo"<a href='animal.php?edit=$row[id]'><img class='image' id='ooo' src='".$row['image']."'></a>";
                                    echo"<h2 class='typeh3'>A Female ".$row['type']."</h2>";
                                            echo "<h5 class='typeh5'>".$row['breed']."</h5>";
                                    echo"</div>";
                                }
                            }
                        }

                        }
                        ?>
                </div>

        </div>
        
    </section>
    <!--------All Ads---------->
    <section class="all-ads">

        <div class="container">

                <div class="title-box">
                    <h2>All Ads</h2>
                </div>

                <div class="row">
                    
                        <?php
                        $result1=mysqli_query($connection,$sql);
                        while($row1=mysqli_fetch_array($result1))
                        {
                            if($row1['type']=="rabbit")
                            {
                                if($row1['gender']=="m")
                                {
                                    echo"<div class='col-md-4'>";
                                    echo"<a href='animal.php?edit=$row1[id]'><img class='image' id='ooo' src='".$row1['image']."'></a>";
                                    echo"<h2>A Male ".$row1['type']."</h2>";
                                            echo "<h5>".$row1['breed']."</h5>";
                                    echo"</div>";
                                }
                                else
                                {
                                    echo"<div class='col-md-4'>";
                                    echo"<a href='animal.php?edit=$row1[id]'><img class='image' id='ooo' src='".$row1['image']."'></a>";
                                    echo"<h2 class='typeh3'>A Female ".$row1['type']."</h2>";
                                            echo "<h5 class='typeh5'>".$row1['breed']."</h5>";
                                    echo"</div>";
                                }
                            }
                        }
                        ?>
        
                </div>
        </div>

    </section>    
</body>
</html>