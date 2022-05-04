<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); 
error_reporting(0);
session_start();

include_once 'product-action.php'; 

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dishes</title>
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
    <section class="steps-container"> 
        <a href="menu.php"><span class="number">1</span>Choose Restaurant </a>
        <a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>"><span class="number active">2</span>Pick your favorite food </a>
        <a href="#"><span class="number">3</span>Order & Pay </a>
    </section>
    <?php $ress= mysqli_query($db,"select * from restaurant where rs_id='$_GET[res_id]'");
		  $rows=mysqli_fetch_array($ress);
	?>
    <!-- BANNER SECTION -->
    <section>
        <div class="dishes-banner">
            <div class="dish-rest-logo">
                <figure><?php echo '<img src="admin/Res_img/'.$rows['image'].'" alt="Restaurant logo" class="rest-image">'; ?></figure>
            </div>
            <div class="dish-rest-details">
                <h3><a href="#"><?php echo $rows['title']; ?></a></h3>
                <p><?php echo $rows['address']; ?></p>  
            </div>
        </div>
    </section>
    <!-- DISHES SECTION -->
    <section>
        <div class="dish-container">
            <div class="dish-cart">
                <div class="d-cart-header">
                    <h3>Your Cart <span class="iconify cart-icon" data-icon="bx:bx-cart" style="color: gray;"></span></h3>
                </div>
                <div class="padd">
                <?php
                    $item_total = 0;
                    foreach ($_SESSION["cart_item"] as $item)  
                    {
                ?>	
                    <div class="cart-dish-name">
                    <?php echo $item["title"]; ?>
                    <a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>" >
                        <span class="iconify" data-icon="ic:outline-cancel" style="color: #ef3b0e;"></span></a>
                    </div>

                    <div class="cart-dish-values">
                        <div>
                            <input type="text" value=<?php echo "₹".$item["price"]; ?> readonly class="dish-cart-price" id="exampleSelect1">
                        </div>
                        <div>
                            <input type="text" value='<?php echo $item["quantity"]; ?>' id="example-number-input" readonly class="dish-cart-qty">
                        </div>
                    </div>
                <?php
                    $item_total += ($item["price"]*$item["quantity"]); 
                    }
                ?>								  
                </div>
                <div class="d-cart-body">
                    <?php
                        if($item_total==0){
                    ?>
                        <img src="./assets/images/empty-cart.png" alt="empty-cart" class="empty-cart">
                        <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="checkout disabled">cart is empty</a>
                    <?php
                        }
                        else{   
                    ?>
                        <p>TOTAL</p>
                        <h3 class="rupees"><strong><?php echo "₹".$item_total; ?></strong></h3>
                        <p class="free-d">Free Delivery!!!</p>
                        <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="checkout active">Checkout</a>
                    <?php   
                        }
                    ?>
                </div>
            </div>
            <div class="dish-details">
                <div class="dish-header">
                    <h3>Menu</h3>
                </div>
                <div class="dish-body">
                <?php  
					$stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
					$stmt->execute();
					$products = $stmt->get_result();
                    $position = 0;
					if (!empty($products)) 
					{
						foreach($products as $product)
							{ $position = $position + 1;									 
				?>
                    <div class="dish-body-details">
						<form method="post" action='dishes.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                        <div class="flex-container">
                        <div class="dish-image-block">
                            <figure><?php echo '<img src="admin/Res_img/dishes/'.$product['img'].'" alt="Food logo" class="rest-image">'; ?></figure>
                        </div>
                        <div class="dish-text-block">
                            <h4><?php echo $product['title']; ?></h4>
                            <p class="rating rtng2"><?php echo $product['slogan']; ?><span class="iconify star-icon" data-icon="ant-design:star-filled"></span></p>
							<p class="dish-price" ><span>₹<?php echo $product['price']; ?></span></p>
                        </div>
                        <div class="dish-btn-block">
                            <div class="dish-qty-block">
                                <button class="minus-style disabled minus-btn<?php echo $position;?>" type="button" onclick="minusButton('<?php echo $position; ?>')" disabled>-</button>
                                <input type="text" id="quantity<?php echo $position; ?>" name="quantity" class="dish-qty" readonly value="1">
                                <button class="plus-btn" type="button" onclick="plusButton('<?php echo $position; ?>')">+</button>
                            </div>
                            <div class="add-block">
                                <input type="submit" class="add-btn" value="ADD" id="addAndIcon<?php echo $position;?>"> 
                                <label for="addAndIcon<?php echo $position;?>">
                                    <span class="iconify-inline add-icon" data-icon="akar-icons:circle-plus" style="color: #ef3b0e;"></span>
                                </label>
                            </div>
                        </div>
                        </div>
                        </form>
                    </div>
                <?php
						}
					}								
				?>
                </div>
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
    <script src="./assets/js/quantity.js"></script>  
</body>
</html>