<?php
session_start();
if($_SESSION['username']==true)
{
    echo $_SESSION['username'];
}
//connect to database
$connection=mysqli_connect("localhost","root","","authentication");
$db=mysqli_select_db($connection,'authentication');

if(isset($_POST['insert']))
{

    $gender=$_POST['gender'];
    $username=$_SESSION['username'];
    $type=$_POST['type'];
    $breed=$_POST['breed'];
    $description=$_POST['description'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $street=$_POST['street'];

    $filename=$_FILES['uploadfile']['name'];
    $tempname=$_FILES['uploadfile']['tmp_name'];
    $folder="images/".$filename;
    move_uploaded_file($tempname,$folder);

    

    $query="INSERT INTO `animals`(`gender`,`username`,`type`,`breed`,`description`,`phone`,`email`,`city`,`street`,`image`) 
    VALUES ('$gender','$username','$type','$breed','$description','$phone','$email','$city','$street','$folder')";
    
     $query_run = mysqli_query($connection,$query);
        
           
        
    if($query_run)
    {
        
        echo '<script type="text/javascript"> alert("Data Saved") </script>';
    }
    else
    {
        echo '<script type="text/javascript"> alert("Data Not Saved") </script>';
    }
}

?>

<!Doctype html>
<html lang="en-US">
<head>
<title>Add A Pet</title>
<meta charset ="UTF-8">
<meta name="author" content="Aleksander Aleksiev">
<meta name="description" content="A Page Your Pet">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="addpet1.css">
<script src="https://kit.fontawesome.com/36da6f5b98.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</head>
<body>
        <div class="top-nav-bar">

            <div class="search-box">

                <i class="fa fa-bars" id="menu-btn" on-click="openmenu()"></i>
                <i class="fa fa-times" id="close-btn" on-click="closemenu()"></i>

                <a href="home.php"><img  class="logo" src="Pets/Images/logocolor.png"></a>

                <input type="text" class="form-control">

                <span class="input-group-text"> <i class="fas fa-search"></i></span>


            </div>

            <div class="menu-bar">
                <ul>
                    <li><a href="home.php"><i class="fa fa-home"></i></i>Home</a></li>
                    <li><a href="profile2.php"><i class="fa fa-user"></i>Your Profile</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a></li>
                </ul>
            </div>

        </div>

            <div class="headings">
            <h1 class="add">Add A Pet</h1>
            </div>

            <div class="image-holder">
                <img src="Pets/Images/dog1.jpg" alt="dog" class="dog">
                <img src="Pets/Images/hamster1.jpg" alt="hamster" class="hamster">
                <img src="Pets/Images/rabbit.jpg" alt="rabbit" class="rabbit">
                <img src="Pets/Images/cat2.png" alt="cat" class="cat">
                <img src="Pets/Images/parrots1.jpg" alt="parrots" class="parrots">

            </div>

<div class="choose">

    <form action="" method="POST" enctype="multipart/form-data">
    <h3 class="question">What is your animal?</h3>

        <label class="type">Type:</label><br><select name="type">
                <option value="">--Select--</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="parrot">Parrot</option>
                <option value="hamster">Hamster</option>
                <option value="rabbit">Rabbit</option>
        </select><br>


        <label class="gender">Gender:</label><br>

    <div class="male"><input type="radio" name="gender" value="m">Male</div>
    <div class="female"><input type="radio" name="gender" value="f">Female</div><br>
            
            
        
        <div class="breed">
            <label class="breedlabel">Add the breed of the animal:</label><br>
            <input type="text" name="breed" class="breedholder"placeholder="Add its breed here">
        </div>

            <div class="description">
            <input type="hidden" name="size" value="10000">
                <h3>Add a description of your pet:</h3>
                <textarea name="description" rows="10" cols="80" placeholder="Here you should write down some basic information about your pet.
                For example its name, age, does it have any vaccination as well as its main advantages and features.">    
                </textarea>
            </div>
    

           

        <div class="contact">
            <h3>Add ways of contacting you:</h3>
            
                <p class="phone">Phone Number:<input type="phone" name="phone"></p>
                <p class="email">E-mail:<input type="email" name="email"></p>
        </div>
    
        <div class="location">
            <h3>Add Your Location:</h3>
            <p class="city">City:<input type="text" name="city" class="city1"></p> 
            <p class="street">Street:<input type="text" name="street" class="street1"></p>
        </div>

            <div class="image">
                <h3>Add An Image</h3>
                <input type="file" name="uploadfile" value=""/>
            </div>

        <div class="add-btn">
            <input type="submit" name="insert" value="Add your pet">
        </div>
    </form>
</div>
</body>
</html>