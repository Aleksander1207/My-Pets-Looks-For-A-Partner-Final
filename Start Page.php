<?php
?>

<!Doctype html>
<html lang="en-US">
<head>
<title>Index.html</title>
<meta charset ="UTF-8">
<meta name="author" content="Aleksander Aleksiev">
<meta name="description" content="A Page Your Pet">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="index3.css">
<script src="js.js"></script>
</head>
<body>
        <div class="nav-bar">

            <div class="nav-logo">
                <h1>My Pet <br>Looks For A Partner</h1>
                <img src="Pets\Images\logocolor.png">
            </div>

            <div class="nav-links" id="mobileMenu">

            <ul>
            <a href="register.php"><li>Sign Up</li></a>
                <a href="login.php"><li>Log In</li></a>
                <a href="#about"><li>About Us</li></a>
            </ul>

            </div>

            <img src="Pets\Images\menu-icon.png" class="menu-icon" on-click="showMenu()">
        </div>

        <div class="hero">
            <h1>Do You Have A Pet?<br>Are you trying to find him a partner?</h1>
            
            <div class="btn">
            <span></span><span></span><span></span><span></span>
                <a  class="read" href="#text"><p >Read More</p></a>

            
                
            </div>


        </div>

        <section id="text">
                        <p class="top">Hi There,</p>
                        <p class="info">If you have an animal whose breed is rare and you struggle to find him a partner,
                         this is the page for you.
                        There are lots of different breeds you are not aware of.So this site will help you find the appropriate one for your pet.
                        With plenty of advertisements you can find what you are searching for.</p>
                        <p class="steps">Steps are easy:</p>

            <div class="steplist">
                 <ul>
                     <li>Create An Account</li>
                     <li>Make An Ad For Your Own Pet</li>
                     <li>Upload It, So Other People Can See It</li>
                     <li>Contact With Other Owners </li>
                     <li>Meet Your Pets</li>
                </ul> 
            </div>

            </section>

            <footer id="about">
                <h2>Some information about the creator:</h2>
                <p>Name:Aleksander Aleksiev</p>
                <p>E-Mail:aleksander.aleksiev12@abv.bg</p>
                <p>School:High School Of Matematics "Akad. Kiril Popov"</p>
            </footer>
</body>
</html>