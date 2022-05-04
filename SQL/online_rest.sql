-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 09:35 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', '', '2021-04-07 08:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(1, 1, 'Corn & Cheese', '4.1', '179.00', 'cornNcheese.jpg'),
(2, 1, 'Chicken Sausage', '4', '229.00', 'chicknsausage.jpg'),
(3, 1, 'Cheesy Comfort - Nonveg', '3.1', '249.00', 'cheesycomf.jpg'),
(4, 1, 'Triple Chicken Feast', '3.1', '399.00', 'triplchickn.jpg'),
(5, 1, 'Double Treat Box (Veg)', '4.2', '399.00', 'doubltrtbox.jpg'),
(6, 1, 'Malai Chicken Tikka', '3.5', '369.00', 'malaichickn.jpg'),
(7, 1, 'Baked Cheesy Momos', '2.8', '179.00', 'bakedmomos.jpg'),
(8, 1, 'Creamy Garlic Breadsticks', '4.1', '159.00', 'creamygarlic.jpg'),
(9, 2, 'Mutton Bamboo Special', '4.1', '490.00', 'muttbamb.jpg'),
(10, 2, 'Alfaham Mandi', '4.2', '480.00', 'alfhmmandi.jpg'),
(11, 2, 'Bamboo Chicken Biriyani', '3.5', '300.00', 'chckbryn.jpg'),
(12, 2, 'Chicken Tikka', '3.2', '260.00', 'chcktikka.jpg'),
(13, 2, 'Chicken Manchow Soup', '3.7', '120.00', 'machsoup.jpg'),
(14, 2, 'Prawns Soup', '3', '140.00', 'prwnsp.jpg'),
(15, 2, 'French Fries', '4.3', '170.00', 'frenchfrs.jpg'),
(16, 3, 'Tender Coconut 300g', '4.8', '223.00', 'coconut.jpg'),
(17, 3, 'Mango 300g', '4.1', '218.00', 'mango.jpg'),
(18, 3, 'Chocobite', '3.9', '60.00', 'chocobite.jpg'),
(19, 3, 'Sitaphal', '4.5', '60.00', 'sitaphal.jpg'),
(20, 3, 'Coffee Walnut 500g', '5', '298.00', 'cofeewalnt.jpg'),
(21, 3, 'Muskmelon 500g', '4.8', '296.00', 'muskmln.jpg'),
(22, 4, 'Paneer Butter Masala', '4.1', '120.00', 'paneerbttr.jpg'),
(23, 4, 'Chicken Biriyani', '4.3', '150.00', 'chckbryni.jpg'),
(24, 4, 'Mutton Biriyani', '4', '180.00', 'muttnbryni.jpg'),
(25, 4, 'Chicken Lollipop', '3.9', '160.00', 'chcklolpp.jpg'),
(26, 4, 'Veg Biriyani', '4.3', '150.00', 'vegbryni.jpg'),
(27, 4, 'Chicken Masala', '4', '160.00', 'chckmsla.jpg'),
(28, 5, 'McSpicy Fried Chicken', '3.9', '117.00', 'friedchckn.jpg'),
(29, 5, 'McChicken Burger', '4.2', '118.00', 'chknburgr.jpg'),
(30, 5, 'Chicken Maharaja Mac', '4.1', '219.00', 'mahrjmac.jpg'),
(31, 5, 'McSaver Chicken Meal', '4', '292.00', 'saverchckn.jpg'),
(32, 5, '2 McSpicy Burger + Coke(L)', '4.1', '313.00', 'spburgcoke.jpg'),
(33, 5, 'McChicken Meal(L)', '4.3', '272.00', 'chcknmeal.jpg'),
(34, 5, 'Big Spicy Chicken Wrap', '4.1', '204.00', 'chckwrap.jpg');


-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(1, 1, 'Pizza Hut', 'pizzahut@gmail.com', '9632061525', 'www.pizzahut.co.in', '11am', '10pm', 'Mon-Sun', 'Bharat Mall, Lalbagh', 'PizzaHut.jpg', '2021-04-09 09:18:19'),
(2, 2, 'Bamboo Restaurant', 'greenbamboo@gmail.com', '9148488283', 'www.bamboogreen.com', '12pm', '11pm', 'Mon-Thu', 'Bendoorwell circle, Kankanady', 'Bamboo.jpg', '2021-04-09 08:49:15'),
(3, 3, 'Naturals', 'naturals@gmail.com', '7899851984', 'www.naturalicecreams.in', '11am', '10.30pm', 'Mon-Sun', 'Kodialbail, Mangalore', 'Naturals.jpg', '2021-04-09 08:50:45'),
(4, 4, 'Danish Food Court', 'danishfc@gmail.com', '9060532200', 'www.danishfc.com', '11am', '11.30pm', 'Mon-Sat', ' Kankanady, Mangalore', 'Danish.jpg', '2021-04-09 08:51:48'),
(5, 4, "McDonald's", 'mcd@gmail.com', '8928304224', 'www.mcdonalds.com', '11am', '12am', 'Mon-Sat', ' Forum Mall, Attavar', 'McDonalds.jpg', '2021-04-09 08:51:48');


-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'Indian', '2021-04-07 08:45:20'),
(2, 'Italian', '2021-04-07 08:45:23'),
(3, 'Chinese', '2021-04-07 08:45:25'),
(4, 'American', '2021-04-07 08:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(1, 'SAL', 'Salman', 'Ansari', 'salman@gmail.com', '1324325445', 'a32de55ffd7a9c4101a0c5c8788b38ed', 'Mira Road', 1, '2021-04-07 08:43:49'),
(2, 'PAR', 'Parth', 'Desai', 'parth@gmail.com', '4325345332', 'bc28715006af20d0e961afd053a984d9', 'Vasai', 1, '2021-04-07 08:44:35'),
(3, 'HIT', 'Hitesh', 'Gosavi', 'hitesh@gmail.com', '4325345332', '58b2318af54435138065ee13dd8bea16', 'Malad', 1, '2021-04-07 08:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
