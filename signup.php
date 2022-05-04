<!DOCTYPE html>
<html lang="en">
<?php

session_start(); 
error_reporting(0); 
include("connection/connect.php"); 
if(isset($_POST['submit'] )) 
{
     if(empty($_POST['firstname']) || 
   	    empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword']))
		{
			$message = "All fields must be Required!";
		}
	else
	{
	
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){  
       	
          echo "<script>alert('Password not match');</script>"; 
    }
	elseif(strlen($_POST['password']) < 6)  
	{
      echo "<script>alert('Password Must be >=6');</script>"; 
	}
	elseif(strlen($_POST['phone']) < 10)  
	{
      echo "<script>alert('Invalid phone number!');</script>"; 
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
          echo "<script>alert('Invalid email address please type a valid email!');</script>"; 
    }
	elseif(mysqli_num_rows($check_username) > 0) 
     {
       echo "<script>alert('Username Already exists!');</script>"; 
     }
	elseif(mysqli_num_rows($check_email) > 0) 
     {
       echo "<script>alert('Email Already exists!');</script>"; 
     }
	else{
       
	 
	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
	echo "<script>alert('Your account has been successfully created');</script>";
	header("refresh:0.1;url=login.php");
    }
	}

}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
                    
                </ul>
            </nav>
            <div class="main-logo">
            <p>Hunger Bites
                    <span class="iconify spoon-icon" data-icon="ion:restaurant-sharp" ></span></p>
            </div>
            <nav class="nav">
                <ul class="nav-menu">
                    <li class="nav-list"><a href="menu.php">Menu</a> </li>
                    <?php
						if(empty($_SESSION["user_id"])) // if user is not login
							{
								echo '<li class="nav-list"><a href="login.php">Login</a> </li>';
							}
						else
							{
                                echo  '<li class="nav-list"><a href="your_orders.php" >My Orders</a> </li>';
                                echo  '<li class="nav-list"><a href="logout.php">Logout
                                        <span class="iconify logout-icon" data-icon="websymbol:logout" style="color: #6c63ff;"></span></a>
                                        </li>';
							}

                    ?>
                </ul>
            </nav>
        </div>
    </header>

    <main>
    <div class="signup-container">
        <div class="signup-block">
            <h3 class="signup-text">Create Account
            <span class="iconify account-icon" data-icon="line-md:account-small" style="color: #6c63ff;"></span>
            </h3>
            <span class="error-msg"><?php echo $message; ?></span> 
            <form action="" method="post">
                <div class="signup-details">
                    <label for="exampleInputEmail1" class="s-uname">Username
                        <input  type="text" name="username" id="example-text-input"> </label>
                    <label for="exampleInputEmail1"  class="s-fname">First Name
                        <input type="text" name="firstname" id="example-text-input"> </label>
                    <label for="exampleInputEmail1" class="s-lname">Last Name
                        <input  type="text" name="lastname" id="example-text-input-2"> </label>
                    <label for="exampleInputEmail1" class="s-email">Email Address
                        <input type="text"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp"> </label>
                    <label for="exampleInputEmail1" class="s-phone">Phone number
                        <input  type="text" name="phone" id="example-tel-input-3"> </label>
                    <label for="exampleInputPassword1" class="s-pass">Password
                        <input type="password" name="password" id="exampleInputPassword1"> </label>
                    <label for="exampleInputPassword1" class="s-cpass">Confirm password
                        <input type="password" name="cpassword" id="exampleInputPassword2"> </label>
                    <label for="exampleTextarea" class="s-addr">Delivery Address
                        <textarea id="exampleTextarea"  name="address" rows="2"></textarea> </label>
                    <input type="submit" value="Signup" name="submit" class="btn theme-btn">
                </div>
            </form>
        </div>
        <div class="signup-svg-block">
            <img src="./assets/images/undraw_online_ad_re_ol62.svg" alt="" class="svg">            
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