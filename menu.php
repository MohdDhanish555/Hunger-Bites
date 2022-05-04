<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  
error_reporting(0);  
session_start(); 
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/menu.css">
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
                    <li class="nav-list"><a href="#">Menu</a> </li>
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
        <!-- STEPS SECTION -->
    <section class="steps-container"> 
        <a href="#"><span class="number active">1</span>Choose Restaurant </a>
        <a href="#"><span class="number">2</span>Pick your favorite food </a>
        <a href="#"><span class="number">3</span>Order & Pay </a>
    </section>

        <!-- BANNER SECTION -->
    <section>
        <div class="menu-banner"></div>
    </section>

        <!-- RESTAURANT SECTION -->
    <section>
        <div class="restaurant-container">
            <div class="rest-svg-block">
                <!-- <div class="top-txt">
                <h3 class="top">TOP</h3><h3 class="restaur"> RESTAUR </h3><h3 class="ants"> ANTS</h3>
                </div> -->
                <img src="./assets/images/undraw_map_1r69.svg" alt="map svg" class="map-svg">
            </div>
            <div class="restaurant-block">
                <div class="rest-header">
                    <h3>Restaurants</h3>
                </div>
            <?php $ress= mysqli_query($db,"select * from restaurant");
					while($rows=mysqli_fetch_array($ress))
					{
                        echo'<div class="rest-details">
                                <div class="details-block">
                                    <div class="image-block">
										<a href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Food logo" class="rest-image"></a>
                                    </div>
                                    <div class="text-block">  
									    <h4><a class="txt" href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h4> <span>'.$rows['address'].'</span>
                                    </div>
                                </div>
                                <div class="rest-button">
                                    <a href="dishes.php?res_id='.$rows['rs_id'].'" class="view-menu">View Menu
                                    </a>
                                </div>
                            </div>';
                    }
?>
</div>

        </div>
    </section>

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