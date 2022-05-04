<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert() { 
      

    echo "<script>alert('Thankyou! Your Order Placed successfully!');</script>"; 
    echo "<script>window.location.replace('your_orders.php');</script>"; 
} 

if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{

										  
												foreach ($_SESSION["cart_item"] as $item)
												{
											
												$item_total += ($item["price"]*$item["quantity"]);
												
													if($_POST['submit'])
													{
						
													$SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";
						
														mysqli_query($db,$SQL);
														
                                                        
                                                        unset($_SESSION["cart_item"]);
                                                        unset($item["title"]);
                                                        unset($item["quantity"]);
                                                        unset($item["price"]);
														$success = "Thankyou! Your Order Placed successfully!";

                                                        function_alert();

														
														
													}
												}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/menu.css">
    <!-- LOGO FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
<!-- <script>
    function gettingOption()  onload="gettingOption()" {
        var currOpt = document.querySelector('input[name="mod"]:checked').value;
        if (currOpt == "paypal") {
            document.getElementById("paypal123").style.display = "block";
        }
        else if (currOpt == "COD") {
            document.getElementById("COD123").style.display = "block";
        }
    }
</script>  -->
    <div class="container">
	<span style="color:blue;">
		<?php echo $success; ?>
	</span>
    </div>
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
    <section class="steps-container btm-brdr"> 
        <a href="menu.php"><span class="number">1</span>Choose Restaurant </a>
        <a href="#"><span class="number">2</span>Pick your favorite food </a>
        <a href="#"><span class="number active">3</span>Order & Pay </a>
    </section>
        <div class="secure-text">
                <h1>Secure Checkout</h1>
        </div>
        <div class="checkout-container">
            <div class="auth-svg-block">
                <img src="./assets/images/undraw_authentication_fsn5.svg" alt="authentication logo" class="auth-svg">
            </div>
            <div class="order-summary-block">
			<form action="" method="post">
                <div class="order-summary-hdr">
                    <h3>Order Summary</h3>
                </div>
                <form method="post" action="#">
                <div class="item-total-block">
                    <p>Item Total</p>
                    <p><?php echo "₹".$item_total; ?></p>
                </div>
                <div class="delivery-fee-block">
                    <p>Delivery Fee</p>
                    <p>Free</p>
                </div>
                <div class="line-block"></div>
                <div class="to-pay-block">
                    <p>To pay</p>
                    <p><?php echo "₹".$item_total; ?></p>
                </div>
                <div class="payment-block">
                    <label class="cod-label">
                        <input type="radio" name="mod" id="radioStacked1" class="cod-input" value="COD"><span> Cash on delivery </span>
                    </label>
                    <div class="cod-dropdown COD" id="COD123">
                        <p><span class="iconify-inline" data-icon="bytesize:lightning" style="color: #6c63ff;"></span>
                            41,731 people used online payment options in the last hour. Pay online now for safe and contactless delivery</p>
                    </div>
                    <label class="atm-label">
                        <input type="radio" name="mod" id="radioStacked1"  class="atm-input"  value="paypal"><span>Debit/ATM Card</span> 
                    </label>
                    <div class="atm-dropdown paypal" id="paypal123">
                        <div class="dropdown-details">
                                <label >Card Holder
                                <input type="text" placeholder="Full Name" class="crd-hldr" ></label>
                               <label >Card Number
                                <input type="text" placeholder="•••• •••• •••• ••••" class="crd-nmbr" maxlength="16"></label>
                                <label >Expiry Date
                                <input type="text" placeholder="MM/YY" class="crd-dte" maxlength="5" pattern="[0-9][0-9]/[0-9][0-9]"></label>
                                <label >CVV
                                <input type="text" placeholder="•••" class="crd-cvv" maxlength="3" ></label>
                        </div>
                        <div class="debit-card">
                            <img src="./assets/images/debitcard.png" alt="debit card" class="visa">
                        </div>
                    </div>
                    <div class="payment-btn">
                        <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit"  class="p-btn" value="Place Order">
                    </div>            
                </div>
            </form>
            </div>
        </form>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./assets/js/toggle.js"></script> 
</body>
</html>
<?php
}
?>

