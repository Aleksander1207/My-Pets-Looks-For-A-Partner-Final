<?php

session_start();
//connect to database
$connection=mysqli_connect("localhost","root","","authentication");
if(isset($_SESSION['username']))
    {
        echo $_SESSION['username'];
        $username=$_SESSION['username'];
        $idpic=$_GET['edit'];
        $getpic="SELECT * FROM animals WHERE id='".$idpic."'" ;
        $res=$connection->query($getpic);
        $getpic1="SELECT * FROM animals";
        $res1=$connection->query($getpic1);
        /*if($res->num_rows>0)
        {   
            $row=$res->fetch_assoc();
            echo "<img src='".$row['image']."'>";
            echo "<div class='basicinfo'>";
                        echo"<p>".$row['type']."</p>";
                    echo "<h2>".$row['breed']."</h2>";
                echo "</div>";
                echo "<div>".$row['description']."</div>";

        }*/
    }
?>

<!Doctype html>
<html lang="en-US">
<head>
<title>Animal Ad</title>
<meta charset ="UTF-8">
<meta name="author" content="Aleksander Aleksiev">
<meta name="description" content="A Page For Your Pet">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="animal1.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="script.js"></script>
<script src="https://kit.fontawesome.com/36da6f5b98.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="top-nav-bar">

        <div class="search-box">

        <!--<i class="fa fa-bars" id="menu-btn" on-click="openmenu()"></i>
        <i class="fa fa-times" id="close-btn" on-click="closemenu()"></i>-->

            <a href="home.php"><img  class="logo" src="Pets/Images/logocolor.png"></a>

            <input type="text" class="form-control">

            <span class="input-group-text"> <i class="fas fa-search"></i></span>


        </div>

        <div class="menu-bar">
            <ul>
                <li><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="addpet.php"><i class="fa fa-plus-circle"></i>Add Pet</a></li>
                <li><a href="profile2.php"><i class="fa fa-user"></i>Your Profile</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a></li>
            </ul>
        </div>

    </div>

    <section>
 <?php
if($res->num_rows>0)
{   
    $row=$res->fetch_assoc();    
       echo" <div class='container'>";

            echo"<div class='row'>";

                echo "<div class='col-md-3'>";

                    echo"<div class='image-ad'>";
                            echo "<a href='animal.php?edit=$row[id]'><img src='".$row['image']."'></a>";
                    echo"</div>";

                echo"</div>";
                
           echo "</div>";
        echo"</div>";


    echo "<div class='basicinfo'>";
                echo"<p>".$row['type']."</p>";
                if($row['gender']="m")
                {
                    echo "<h2>A Male ".$row['breed']."</h2>";
                }
                else
                {
                    echo "<h2>A Female ".$row['breed']."</h2>";
                }
        echo "</div>";

        

        echo"<div class='container'>";
            echo"<div class='container-description'>";
            
            echo"<h4>Animal Description:</h4>";
            echo "<p>".$row['description']."</p>";
            
            
           echo" </div>";
             
        echo "</div>";

        echo "<div class='owner'>";
           echo" <div class='contacts'>
                    <h3>Contact The Owner:</h3>
                    <p>Phone: ".$row['phone']."</p>
                    <p>E-mail: ".$row['email']."</p>
                    <hr> 
            </div>

                <div class='address'>
                    <h3>Owner's Location:</h3>
                    <p>".$row['city']."</p>
                    <p>Street: ".$row['street']."</p>
                    <hr> 
                </div>
                               
            </div>

            <div class='uploaded'>
            <h4>Uploaded By:  ".$row['username']."</h4 >
            <h5>Date : ".$row['date']."</h5>
            </div>";
}
?>
    </section>

    
    <section class='description'>
<?php
if($res1->num_rows>0)
{
    
        echo"<div class='container'>

            <div class='title-box'>
                <h2>Similar Ads</h2>
            </div>";

                echo"<div class='row'>";
                while($row1=$res1->fetch_assoc())
                {
                            if($row1['username'] <> $_SESSION['username'] && $row1['type']==$row['type'] && $row1['id']!=$idpic )
                            {
                                echo"<div class='col-md-3'>";
                                    echo"<div class='product-top'>";
                                        echo"<a href='animal.php?edit=$row1[id]'><img  class='s' src='".$row1['image']."'></a>";
                                        if($row1['gender']=="m")
                                        {
                                        echo"<h2>A Male ".$row1['type']."</h2>";
                                        echo "<h5>".$row1['breed']."</h5>";
                                        }
                                        else
                                        {
                                            echo"<h2>A Female ".$row1['type']."</h2>";
                                            echo "<h5>".$row1['breed']."</h5>";
                                        }
                                    echo"</div>";
                                echo"</div>";      

                            }
                }
                echo"</div>";
        echo"</div>";
}       
?>
        
    </section>
    
</body> 
</html>