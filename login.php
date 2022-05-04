<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/user.css">
    <!-- LOGO FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
     <!-- todo = HEADER SECTION -->
     <header class="header">
        <div class="hdr-container">
            <nav class="nav">
                <ul class="nav-menu">
                    <li class="nav-list"><a href="index.php">Home</a> </li>
                    <li class="nav-list"><a href="contact.php">Contact Us</a> </li>
                    <!-- <li class="nav-list"><a href="#">Services</a> </li> -->
                </ul>
            </nav>
            <div class="main-logo">
            <p>Hunger Bites
                    <span class="iconify spoon-icon" data-icon="ion:restaurant-sharp" ></span></p>
            </div>
            <nav class="nav">
                <ul class="nav-menu">
                    <li class="nav-list"><a href="menu.php">Menu</a> </li>
                    <li class="nav-list"><a href="#">Login</a> </li>
                    <!-- <li class="nav-list"><a href="#">Signup</a> </li> -->
                </ul>
            </nav>
        </div>
    </header>
<?php
include("connection/connect.php"); 
error_reporting(0); 
session_start(); 
if(isset($_POST['submit']))  
{
	$username = $_POST['username'];  
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))   
     {
	$loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'"; //selecting matching records
	$result=mysqli_query($db, $loginquery); //executing
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row)) 
								{
                                    	$_SESSION["user_id"] = $row['u_id']; 
                                        $success="Logged in successfully !!";
										 header("refresh:1;url=menu.php"); 
	                            } 
							else
							    {
                                      	$message = "Invalid Username or Password!"; 
                                }
	 }
	
	
}
?>

    <main>
        <div class="login-container">
            <div class="login-svg-block">
                <img src="./assets/images/undraw_welcome_cats_thqn.svg" alt="welcome svg" class="welcome-svg">
            </div>
            <div class="login-block">
                    <h3 class="login-text">Login to your account</h3>
                    <span class="error-msg"><?php echo $message; ?></span> 
                    <span class="suxs-msg"><?php echo $success; ?></span>

                    <form action="" method="post"> 
                    <div class="login-details">
                        <input type="text" placeholder="Username"  name="username"/>
                        <input type="password" placeholder="Password" name="password"/>
                        <input type="submit" id="buttn" name="submit" value="Login" />
                    </div>
                    </form>
                    <p class="create-acc-link">Don't have an account? <a href="signup.php">Sign up</a></p>
            </div>
        </div>


    </main>
     <!-- todo = FOOTER SECTION -->
     <footer class="footer">
        <div class="footer-container">
            <div class="footer-list">
                <ul>
                    <li class="list-header">
                        Company
                    </li>
                    <li><a href=""><span class="iconify-inline" data-icon="uil:angle-right"></span>Contact</a></li>
                    <li><a href="./admin/index.php"><span class="iconify-inline" data-icon="uil:angle-right"></span>Admin Login</a></li>
                    <li><a href="HB-guidelines.html" target="_blank" ><span class="iconify-inline" data-icon="uil:angle-right"></span>Guidelines</a></li>
                </ul>
            </div>
            <div class="footer-list">
                <ul>
                    <li class="list-header">
                        Legal
                    </li>
                    <li><a href="HB-privacy.html" target="_blank" ><span class="iconify-inline" data-icon="uil:angle-right"></span>Privacy</a></li>
                    <li><a href="HB-terms.html"  target="_blank"><span class="iconify-inline" data-icon="uil:angle-right"></span>Terms</a></li>
                </ul>
            </div>
            <div class="footer-list">
                <ul>
                    <li class="list-header">
                        For Foodies
                    </li>
                    <li><a href="HB-conductcode.html" target="_blank" ><span class="iconify-inline" data-icon="uil:angle-right"></span>Code of conduct</a></li>
                    <li><a href="menu.php"><span class="iconify-inline" data-icon="uil:angle-right"></span>Restaurant</a></li>
                </ul>
            </div>
            <div class="footer-list">
                <p class="list-header list4-hdr">Social links</p>
                <div class="social-icons">
                   <a href="https://www.instagram.com/_the._.nish_/" target="_blank"><span class="iconify si" data-icon="uil:instagram-alt" data-width="30" data-height="30"></span></a> 
                   <a href="https://twitter.com/Dani87979593/" target="_blank"><span class="iconify si" data-icon="entypo-social:twitter-with-circle" data-width="30" data-height="30"></span></a> 
                   <a href="https://www.facebook.com/dhanish.mahammed" target="_blank"><span class="iconify si" data-icon="entypo-social:facebook-with-circle" data-width="30" data-height="30"></span></a> 
                </div>
                <div class="stickers">
                    <img src="./assets/images/app1.png" alt="App Store" class="app-store">
                    <img src="./assets/images/app2.png" alt="Play store" class="play-store">
                </div>
            </div>
        </div>
        <p class="copyright">Copyrights © 2021 Hunger Bites | <a href="https://github.com/MohdDhanish555/" target="_blank" class="git">  Mahammed Dhanish </a> </p>
    </footer>

    <!-- ICONS -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>  
</body>
</html>