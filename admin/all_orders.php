<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>All Orders</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/edit.css">
    <!-- LOGO FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">



</head>

<body class="fix-header fix-sidebar">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">

        <header class="header">
            <div class="hdr-container">
                <div class="main-logo">
                    <p class="hb-logo">Hunger Bites
                        <span class="iconify spoon-icon" data-icon="ion:restaurant-sharp"></span>
                    </p>
                </div>
            </div>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/3.png" alt="user" class="profile-pic" /></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <ul class="dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
            </li>
        </header>

        <div class="left-sidebar">

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                        <li class="nav-label">Log</li>
                        <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Restaurant</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_restaurant.php">All Restaurants</a></li>
                                <li><a href="add_restaurant.php">Add Restaurant</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">All menus</a></li>
                                <li><a href="add_menu.php">Add Menu</a></li>


                            </ul>
                        </li>
                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>

                    </ul>
                </nav>

            </div>

        </div>

        <div class="page-wrapper">



            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">


                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">All Orders</h4>
                                </div>

                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Title</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Reg-Date</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $sql = "SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id ";
                                            $query = mysqli_query($db, $sql);

                                            if (!mysqli_num_rows($query) > 0) {
                                                echo '<td colspan="8"><center>No Orders</center></td>';
                                            } else {
                                                while ($rows = mysqli_fetch_array($query)) {

                                            ?>
                                                    <?php
                                                    echo ' <tr>
																					           <td>' . $rows['username'] . '</td>
																								<td>' . $rows['title'] . '</td>
																								<td>' . $rows['quantity'] . '</td>
																								<td>₹' . $rows['price'] . '</td>
																								<td>' . $rows['address'] . '</td>';
                                                    ?>
                                                    <?php
                                                    $status = $rows['status'];
                                                    if ($status == "" or $status == "NULL") {
                                                    ?>
                                                        <td> <button type="button" class="btn btn-info pntr" style="font-weight:bold;"><span class="fa fa-bars" aria-hidden="true"> Dispatched</button></td>
                                                    <?php
                                                    }
                                                    if ($status == "in process") { ?>
                                                        <td> <button type="button" class="btn btn-warning pntr"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> On the way!</button></td>
                                                    <?php
                                                    }
                                                    if ($status == "closed") {
                                                    ?>
                                                        <td> <button type="button" class="btn btn-success pntr"><span class="fa fa-check-circle" aria-hidden="true"> Delivered</button></td>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($status == "rejected") {
                                                    ?>
                                                        <td> <button type="button" class="btn btn-danger pntr"> <i class="fa fa-close"></i> Cancelled</button></td>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    echo '	<td>' . $rows['date'] . '</td>';
                                                    ?>
                                                    <td>
                                                        <a href="delete_orders.php?order_del=<?php echo $rows['o_id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-flat btn-addon btn-xs m-b-10"><span class="iconify" data-icon="ic:outline-cancel" style="color: #ef3b0e;" data-width="26" data-height="24"></span></a>
                                                <?php
                                                    echo '<a href="view_order.php?user_upd=' . $rows['o_id'] . '" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5">Manage</a>
																									</td>
																									</tr>';
                                                }
                                            }


                                                ?>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>


    </div>

    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>


</body>

</html>