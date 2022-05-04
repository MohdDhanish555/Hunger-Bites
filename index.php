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
    <title>HB | Dhanish</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- LOGO FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>

<body>
    <!-- todo= HEADER SECTION -->
    <header class="header">
        <div class="hdr-container">
            <nav class="nav">
                <ul class="nav-menu">
                    <li class="nav-list nav-active"><a href="#">Home</a> </li>
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
        <!-- todo = BANNER SECTION -->
        <section class="home-container" id="home">
            <div class="banner-details">
                <h1 class="main-title">The Best Of Mangalore</h1>
                <p class="sub-title">At Your Doorstep </p>
                <div class="home-btn"><a href="menu.php" > Order Now </a>
            </div>

                <div class="banner-svgs">
                    <div class="svg1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 483 483" class="svg-wh1">
                            <g fill="#1D2521">
                            <path d="M467.006 177.92c-.055-1.573-.469-3.321-1.233-4.755L407.006 62.877V10.5c0-5.799-4.701-10.5-10.5-10.5h-310c-5.799 0-10.5 4.701-10.5 10.5v52.375L17.228 173.164a10.476 10.476 0 0 0-1.22 4.938h-.014V472.5c0 5.799 4.701 10.5 10.5 10.5h430.012c5.799 0 10.5-4.701 10.5-10.5V177.92zM282.379 76l18.007 91.602H182.583L200.445 76h81.934zm19.391 112.602c-4.964 29.003-30.096 51.143-60.281 51.143-30.173 0-55.295-22.139-60.258-51.143H301.77zm143.331 0c-4.96 29.003-30.075 51.143-60.237 51.143-30.185 0-55.317-22.139-60.281-51.143h120.518zm-123.314-21L303.78 76h86.423l48.81 91.602H321.787zM97.006 55V21h289v34h-289zm-4.198 21h86.243l-17.863 91.602h-117.2L92.808 76zm65.582 112.602c-5.028 28.475-30.113 50.19-60.229 50.19s-55.201-21.715-60.23-50.19H158.39zM300 462H183V306h117v156zm21 0V295.5c0-5.799-4.701-10.5-10.5-10.5h-138c-5.799 0-10.5 4.701-10.5 10.5V462H36.994V232.743a82.558 82.558 0 0 0 3.101 3.255c15.485 15.344 36.106 23.794 58.065 23.794s42.58-8.45 58.065-23.794a81.625 81.625 0 0 0 13.525-17.672c14.067 25.281 40.944 42.418 71.737 42.418 30.752 0 57.597-17.081 71.688-42.294 14.091 25.213 40.936 42.294 71.688 42.294 24.262 0 46.092-10.645 61.143-27.528V462H321z"></path>
                           <path d="M202.494 386h22c5.799 0 10.5-4.701 10.5-10.5s-4.701-10.5-10.5-10.5h-22c-5.799 0-10.5 4.701-10.5 10.5s4.701 10.5 10.5 10.5z"></path>
                            </g>
                        </svg>
                    </div>
                    <img src="./assets/images/arrow.png" alt="arrow" class="arrow1">
                    <div class="svg2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 380.721 380.721" class="svg-wh2">
                            <g fill="#1D2521">
                                <path d="M58.727 281.236c.32-5.217.657-10.457 1.319-15.709 1.261-12.525 3.974-25.05 6.733-37.296a543.51 543.51 0 0 1 5.449-17.997c2.463-5.729 4.868-11.433 7.25-17.01 5.438-10.898 11.491-21.07 18.724-29.593 1.737-2.19 3.427-4.328 5.095-6.46 1.912-1.894 3.805-3.747 5.676-5.588 3.863-3.509 7.221-7.273 11.107-10.091 7.686-5.711 14.529-11.137 21.477-14.506 6.698-3.724 12.455-6.982 17.631-8.812 10.125-4.084 15.883-6.141 15.883-6.141s-4.915 3.893-13.502 10.207c-4.449 2.917-9.114 7.488-14.721 12.147-5.803 4.461-11.107 10.84-17.358 16.992-3.149 3.114-5.588 7.064-8.551 10.684-1.452 1.83-2.928 3.712-4.427 5.6a1225.858 1225.858 0 0 1-3.84 6.286c-5.537 8.208-9.673 17.858-13.995 27.664-1.748 5.1-3.566 10.283-5.391 15.534a371.593 371.593 0 0 1-4.16 16.476c-2.266 11.271-4.502 22.761-5.438 34.612-.68 4.287-1.022 8.633-1.383 12.979 94 .023 166.775.069 268.589.069.337-4.462.534-8.97.534-13.536 0-85.746-62.509-156.352-142.875-165.705 5.17-4.869 8.436-11.758 8.436-19.433-.023-14.692-11.921-26.612-26.631-26.612-14.715 0-26.652 11.92-26.652 26.642 0 7.668 3.265 14.558 8.464 19.426-80.396 9.353-142.869 79.96-142.869 165.706 0 4.543.168 9.027.5 13.467 9.935-.002 19.526-.002 28.926-.002zM0 291.135h380.721v33.59H0z" /> </g>
                        </svg>
                    </div>
                    <img src="./assets/images/arrow-dotted.png" alt="arrow" class="arrow2">
                    <div class="svg3">
                        <svg xmlns="http://www.w3.org/2000/svg"  viewbox="0 0 612.001 612" class="svg-wh3">
                            <path d="M604.131 440.17h-19.12V333.237c0-12.512-3.776-24.787-10.78-35.173l-47.92-70.975a62.99 62.99 0 0 0-52.169-27.698h-74.28c-8.734 0-15.737 7.082-15.737 15.738v225.043h-121.65c11.567 9.992 19.514 23.92 21.796 39.658H412.53c4.563-31.238 31.475-55.396 63.972-55.396 32.498 0 59.33 24.158 63.895 55.396h63.735c4.328 0 7.869-3.541 7.869-7.869V448.04c-.001-4.327-3.541-7.87-7.87-7.87zM525.76 312.227h-98.044a7.842 7.842 0 0 1-7.868-7.869v-54.372c0-4.328 3.541-7.869 7.868-7.869h59.724c2.597 0 4.957 1.259 6.452 3.305l38.32 54.451c3.619 5.194-.079 12.354-6.452 12.354zM476.502 440.17c-27.068 0-48.943 21.953-48.943 49.021 0 26.99 21.875 48.943 48.943 48.943 26.989 0 48.943-21.953 48.943-48.943 0-27.066-21.954-49.021-48.943-49.021zm0 73.495c-13.535 0-24.472-11.016-24.472-24.471 0-13.535 10.937-24.473 24.472-24.473 13.533 0 24.472 10.938 24.472 24.473 0 13.455-10.938 24.471-24.472 24.471zM68.434 440.17c-4.328 0-7.869 3.543-7.869 7.869v23.922c0 4.328 3.541 7.869 7.869 7.869h87.971c2.282-15.738 10.229-29.666 21.718-39.658H68.434v-.002zm151.864 0c-26.989 0-48.943 21.953-48.943 49.021 0 26.99 21.954 48.943 48.943 48.943 27.068 0 48.943-21.953 48.943-48.943.001-27.066-21.874-49.021-48.943-49.021zm0 73.495c-13.534 0-24.471-11.016-24.471-24.471 0-13.535 10.937-24.473 24.471-24.473s24.472 10.938 24.472 24.473c0 13.455-10.938 24.471-24.472 24.471zm117.716-363.06h-91.198c4.485 13.298 6.846 27.54 6.846 42.255 0 74.28-60.431 134.711-134.711 134.711-13.535 0-26.675-2.045-39.029-5.744v86.949c0 4.328 3.541 7.869 7.869 7.869h265.96c4.329 0 7.869-3.541 7.869-7.869V174.211c-.001-13.062-10.545-23.606-23.606-23.606zM118.969 73.866C53.264 73.866 0 127.129 0 192.834s53.264 118.969 118.969 118.969 118.97-53.264 118.97-118.969-53.265-118.968-118.97-118.968zm0 210.864c-50.752 0-91.896-41.143-91.896-91.896s41.144-91.896 91.896-91.896c50.753 0 91.896 41.144 91.896 91.896 0 50.753-41.143 91.896-91.896 91.896zm35.097-72.488c-1.014 0-2.052-.131-3.082-.407L112.641 201.5a11.808 11.808 0 0 1-8.729-11.396v-59.015c0-6.516 5.287-11.803 11.803-11.803 6.516 0 11.803 5.287 11.803 11.803v49.971l29.614 7.983c6.294 1.698 10.02 8.177 8.322 14.469-1.421 5.264-6.185 8.73-11.388 8.73z" fill="#1D2521" /> </svg>
                    </div>               
                </div>
            </div>
            <div class="banner-image">
                <img src="./assets/images/Daco1.png" alt="" class="home-image" >
            </div>
        </section>
        
        <!-- todo = TRENDING DISHES SECTION -->
        <section class="trend-container" id="trending" >
            <div class="trend-header">
            <span class="iconify trend-icon" data-icon="ci:trending-up" data-width="27" data-height="27"></span>
            <h2 class="trend-title">Trending this week</h2>
            <p class="trend-subtitle">6 dishes</p>
            </div>
            <div class="trend-cards owl-carousel owl-theme">
                <!-- card1 -->
                <div class="card">
                    <div class="card-image c1"></div>
                    <div class="card-details">
                        <p class="dish-name">Chicken Burger</p>
                        <p class="price">₹118.00</p>
                        <a href="menu.php"><button class="card-btn">Order now</button></a>
                    </div>
                </div>
                <!-- card2 -->
                <div class="card">
                    <div class="card-image c2">
                    </div>
                    <div class="card-details">
                        <p class="dish-name">Oreo Chocobites</p>
                        <p class="price">₹223.00</p>
                         <a href="menu.php"><button class="card-btn">Order now</button></a>   
                    </div>
                </div>
                <!-- card3 -->
                <div class="card">
                    <div class="card-image c3">
                    </div>
                    <div class="card-details">
                        <p class="dish-name">Malai Tikka Pizza</p>
                        <p class="price">₹369.00</p>
                         <a href="menu.php"><button class="card-btn">Order now</button></a>   
                    </div>
                </div>
                <!-- card4 -->
                <div class="card">
                    <div class="card-image c4"></div>
                    <div class="card-details">
                        <p class="dish-name">McSpicy Burger</p>
                        <p class="price">₹313.00</p>
                         <a href="menu.php"><button class="card-btn">Order now</button></a>   
                    </div>
                </div>
                  <!-- card5 -->
                  <div class="card">
                    <div class="card-image c5"></div>
                    <div class="card-details">
                        <p class="dish-name">Chicken Biryani</p>
                        <p class="price">₹150.00</p>
                         <a href="menu.php"><button class="card-btn">Order now</button></a>   
                    </div>
                </div>
                  <!-- card6 -->
                  <div class="card">
                    <div class="card-image c6"></div>
                    <div class="card-details">
                        <p class="dish-name">Sitaphal</p>
                        <p class="price">₹60.00</p>
                         <a href="menu.php"><button class="card-btn">Order now</button></a>   
                    </div>
                </div>
                <!-- card end -->
            </div>
        </section>

        <!-- todo = DOWNLOAD APP SECTION -->
        <section class="dwnld-container" id="app">
            <div class="dwnld-details">
                <h2 class="dwnld-title">Restaurants in your pocket</h2>
                <p class="dwnld-subtitle">Order from your favorite restaurants & track on the go, with the all new Hunger Bites app.</p>
                <div class="dwnld-stickers">
                    <img src="./assets/images/app1.png" alt="App Store" class="app1">
                    <img src="./assets/images/app2.png" alt="Play store" class="app2">
                </div>
            </div>
            <div class="mockup-phones">
                <img src="./assets/images/home_iphone12.png" alt="hunger bites app" class="phone1">
                <img src="./assets/images/home_iphone12.png" alt="hunger bites app" class="phone2">
            </div>
        </section>

        <!-- todo = CONTACT US SECTION -->
        <section class="contact-container" id="contact">
            <div class="contact-details">
                <h2 class="contact-title">24 Hours Customer Support</h2>
                <span class="iconify help-icon" data-icon="ri:customer-service-line"></span>
                <p class="contact-subtitle">Need help? Reach out to us right here, and we'll get back to you as soon as we can.</p>
            </div>
            <div class="contact-button">
                <a href="contact.php">Get Help</a>
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
                    <li><a href="contact.php"><span class="iconify-inline" data-icon="uil:angle-right"></span>Contact</a></li>
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
                        Quick Links
                    </li>
                    <li><a href="#home"><span class="iconify-inline" data-icon="uil:angle-right"></span>Home</a></li>
                    <li><a href="#trending"><span class="iconify-inline" data-icon="uil:angle-right"></span>Trending</a></li>
                    <li><a href="#app"><span class="iconify-inline" data-icon="uil:angle-right"></span>App</a></li>
                    <li><a href="#contact"><span class="iconify-inline" data-icon="uil:angle-right"></span>Support</a></li>
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
        
    <!-- SCRIPTS -->
    <!-- ICONS -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <!-- OWL CAROUSEL -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
    <script src="./assets/js/owl-carousel.js"></script>
   
</body>

</html>