<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(empty($_SESSION['user_id']))  
{
	header('location:login.php');
}
else
{
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/user.css">
    <!-- LOGO FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
    <!-- todo= HEADER SECTION -->
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
                    <?php
						if(empty($_SESSION["user_id"])) // if user is not login
							{
								echo '<li class="nav-list"><a href="login.php">Login</a> </li>';
							}
						else
							{
                                echo  '<li class="nav-list"><a href="#" >My Orders</a> </li>';
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
        <!-- ORDERS SECTION -->
        <section>
            <div class="orders-container">
                <div class="orders-block">
                    <div class="order-header">
                        <h2>My Orders <span class="iconify-inline" data-icon="heroicons-outline:shopping-bag" style="color: gray;"></span></h2>
                    </div>
                    <?php 
				
                    $query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."'");
                    if(!mysqli_num_rows($query_res) > 0 )
                        {
                    ?>        
                            <span class="no-ordr-txt"> <?php echo 'You have No orders Placed yet.';?> </span>
                            <img src="./assets/images/sad-svgrepo-com.svg" alt="sad svg" class="sad-svg">
                    <?php        
                        }
                    else
                        {			           
                            while($row=mysqli_fetch_array($query_res))
                            {
                    ?>
                    <div class="orders-details">
                        <p class="ordr-name"><?php echo $row['title']; ?></p>
                        <p class="ordr-qty">Qty : <?php echo $row['quantity']; ?></p>
                        <p class="ordr-sts">Status : 
                                                    <?php 
                                                    $status=$row['status'];
                                                    if($status=="" or $status=="NULL")
                                                        {
                                                    ?>
                                                    <span style="color: #6c63ff;">Dispatched</span>
                                                    <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');">
                                                        <span class="iconify cancel-icon" data-icon="ic:outline-cancel" style="color: #ef3b0e;" data-width="25" data-height="20"></span></a>
                                                    <?php 
                                                        }
                                                    if($status=="in process")
                                                        { 
                                                    ?>
                                                    <span style="color: #f4ca16;">On the way!</span>
                                                    <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');">
                                                        <span class="iconify cancel-icon" data-icon="ic:outline-cancel" style="color: #ef3b0e;" data-width="25" data-height="20"></span></a>
                                                    <?php
                                                        }
                                                    if($status=="closed")
                                                        {
                                                    ?>
                                                    <span style="color: #059033;">Delivered</span>
                                                    <span class="iconify cancel-icon" data-icon="ion:checkmark-done-circle-outline" style="color: #059033;" data-width="25" data-height="20"></span>
                                                    <?php 
                                                        } 
                                                    if($status=="rejected")
                                                        {
                                                    ?>
                                                    <span style="color: #AA4A44;">Cancelled</span>
                                                    <span class="iconify cancel-icon" data-icon="ant-design:minus-circle-outlined" style="color: #AA4A44;" data-width="25" data-height="20"></span>
                                                    <?php 
                                                    } 
                                                    ?>
                        </p>
                        
                        <p class="ordr-date">Ordered on <?php echo $row['date']; ?></p>
                        <p class="ordr-price">₹<?php echo $row['price']; ?></p>
                    </div>
                    <?php 
                        }
                        }
                    ?>		
                </div>
                <div class="orders-svg-block">
                    <img src="./assets/images/undraw_Delivery_address_re_cjca.svg" alt="delivery svg" class="delivery-svg">
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
<?php
}
?>