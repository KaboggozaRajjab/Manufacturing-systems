-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 01:21 PM
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
-- Database: `dataware_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(50) NOT NULL,
  `area_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`, `area_code`) VALUES
(1, 'Sarkhej', 'SRKJ'),
(2, 'Vastrapur', 'VSTR'),
(3, 'Maninagar', 'MNGR'),
(4, 'New Ranip', 'NRANIP'),
(5, 'Vejalpur', 'VJLP');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `cat_details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_details`) VALUES
(1, 'Fast Food', ''),
(2, 'Bread Buns', ''),
(3, 'Counter Cakes', ''),
(4, 'Deserts', ''),
(5, 'Rice', ''),
(9, 'Add On Items', ''),
(10, 'Cakes', ''),
(11, 'Cheese Cake', ''),
(12, 'Bags', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer details`
--

CREATE TABLE `customer details` (
  `cus_id` int(8) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `Location` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer details`
--

INSERT INTO `customer details` (`cus_id`, `FirstName`, `LastName`, `Contact`, `Location`, `username`, `password`) VALUES
(1, 'praise', 'aine', '0775614649', 'kawempe', 'praise', 'praise0'),
(1, 'praise', 'aine', '0775614649', 'kawempe', 'praise', 'praise0');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `quantity` int(30) NOT NULL,
  `unit_price` int(50) NOT NULL,
  `total_price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `product`, `quantity`, `unit_price`, `total_price`) VALUES
(1, 'Butter Puff', 6, 17, 100),
(3, 'Garlic Cheese Roll', 100, 40, 3957),
(4, 'Garlic Cheese Roll', 56, 40, 2216),
(5, 'Garlic Cheese Roll', 56, 40, 2216),
(6, 'Burger Bun 4 PCS', 67, 42, 2814),
(7, 'Butter Puff', 4, 17, 67),
(8, 'Butter Puff', 5, 17, 83);

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `dist_id` int(11) NOT NULL,
  `dist_name` varchar(25) NOT NULL,
  `dist_email` varchar(50) DEFAULT NULL,
  `dist_phone` varchar(10) NOT NULL,
  `dist_address` varchar(200) DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`dist_id`, `dist_name`, `dist_email`, `dist_phone`, `dist_address`, `area_id`, `username`, `password`) VALUES
(1, 'Nishant Shah', 'nishant45@gmail.com', '8980769792', 'Alpha Mall, Vastrapur, Ahmedabad', 0, 'norah', 'norah123'),
(2, 'Rahul Pandey', 'rahul431@gmail.com', '9099432197', 'Gota, S.G. Highway, Ahmedabad', 0, '', ''),
(3, 'Pawan Panchal', 'pawan.rocks@gmail.com', '7878025437', 'Modhera Stadium, Ahmedabad', 0, '', ''),
(4, 'Pushpak Patel', 'pushpak@gmail.com', '9012376544', 'Navrangpura, Ahmedabad', 0, '', ''),
(5, 'Haniket Patel', 'hanipatel@gmail.com', '8980745372', 'CTM, Ahmedabad', 0, '', ''),
(6, 'Vicence', 'vince@gmail.com', '0778655443', 'Kampala', 0, 'vince', 'vince123');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_amount` decimal(10,3) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `order_id`, `retailer_id`, `dist_id`, `date`, `total_amount`, `comments`) VALUES
(1, 2, 4, 3, '2015-04-28', '5119.500', ''),
(2, 1, 2, 5, '2015-04-28', '4780.150', ''),
(3, 3, 1, 1, '2015-04-28', '8891.680', ''),
(4, 4, 5, 4, '2015-04-28', '7888.960', ''),
(5, 5, 5, 1, '2020-12-07', '8919.880', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `invoice_items_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`invoice_items_id`, `invoice_id`, `product_id`, `quantity`) VALUES
(1, 1, 4, 20),
(2, 1, 5, 5),
(3, 1, 7, 10),
(4, 1, 9, 10),
(5, 1, 12, 6),
(6, 1, 14, 5),
(7, 2, 1, 20),
(8, 2, 2, 15),
(9, 2, 5, 10),
(10, 2, 8, 5),
(11, 2, 10, 8),
(12, 2, 11, 10),
(13, 2, 13, 2),
(14, 2, 15, 3),
(15, 3, 1, 2),
(16, 3, 2, 4),
(17, 3, 3, 3),
(18, 3, 4, 8),
(19, 3, 5, 10),
(20, 3, 6, 12),
(21, 3, 8, 4),
(22, 3, 11, 10),
(23, 3, 13, 3),
(24, 3, 14, 5),
(25, 3, 15, 6),
(26, 4, 2, 12),
(27, 4, 4, 30),
(28, 4, 8, 4),
(29, 4, 11, 20),
(30, 4, 14, 8);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `man_id` int(11) NOT NULL,
  `man_name` varchar(25) NOT NULL,
  `man_email` varchar(50) DEFAULT NULL,
  `man_phone` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`man_id`, `man_name`, `man_email`, `man_phone`, `username`, `password`) VALUES
(1, 'Sammy', 'sammy@gmail.com', '9890234510', 'sammy', 'suresh123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `total_amount` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `date`, `retailer_id`, `cus_id`, `approved`, `status`, `total_amount`) VALUES
(1, '2015-04-28', 2, 0, 1, 1, '4780.150'),
(2, '2015-04-28', 4, 0, 1, 1, '5119.500'),
(3, '2015-04-28', 1, 0, 1, 1, '8891.680'),
(4, '2015-04-28', 5, 0, 1, 1, '7888.960'),
(5, '2015-04-28', 5, 0, 1, 0, '8919.880'),
(6, '2020-12-07', 1, 0, 0, 0, '50.010'),
(7, '2022-09-20', 1, 0, 0, 0, '0.000'),
(8, '2022-10-03', 1, 0, 0, 0, '0.000'),
(9, '2022-10-03', 1, 0, 0, 0, '1120.000'),
(10, '2022-10-03', 1, 0, 0, 0, '0.000'),
(11, '2022-10-03', 1, 0, 0, 0, '0.000'),
(12, '2022-10-08', 1, 0, 0, 0, '200.040'),
(13, '2022-10-09', 1, 0, 0, 0, '0.000'),
(14, '2022-10-09', 1, 0, 0, 0, '0.000'),
(15, '2022-10-09', 1, 0, 0, 0, '0.000'),
(16, '2022-10-09', 1, 0, 0, 0, '0.000'),
(20, '2022-10-16', 1, 0, 0, 0, '0.000');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_items_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_items_id`, `order_id`, `pro_id`, `quantity`) VALUES
(1, 1, 1, 20),
(2, 1, 2, 15),
(3, 1, 5, 10),
(4, 1, 8, 5),
(5, 1, 10, 8),
(6, 1, 11, 10),
(7, 1, 13, 2),
(8, 1, 15, 3),
(9, 2, 4, 20),
(10, 2, 5, 5),
(11, 2, 7, 10),
(12, 2, 9, 10),
(13, 2, 12, 6),
(14, 2, 14, 5),
(15, 3, 1, 2),
(16, 3, 2, 4),
(17, 3, 3, 3),
(18, 3, 4, 8),
(19, 3, 5, 10),
(20, 3, 6, 12),
(21, 3, 8, 4),
(22, 3, 11, 10),
(23, 3, 13, 3),
(24, 3, 14, 5),
(25, 3, 15, 6),
(26, 4, 2, 12),
(27, 4, 4, 30),
(28, 4, 8, 4),
(29, 4, 11, 20),
(30, 4, 14, 8),
(31, 5, 1, 1),
(32, 5, 2, 3),
(33, 5, 3, 5),
(34, 5, 4, 15),
(35, 5, 6, 30),
(36, 5, 8, 45),
(37, 5, 12, 20),
(38, 5, 14, 5),
(39, 6, 1, 1),
(40, 6, 2, 2),
(41, 9, 12, 10),
(42, 12, 1, 5),
(43, 12, 2, 7),
(44, 13, 16, 3),
(45, 16, 15, 7),
(46, 20, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(25) NOT NULL,
  `pro_desc` decimal(10,3) DEFAULT NULL,
  `pro_price` decimal(10,3) NOT NULL,
  `unit` int(11) NOT NULL,
  `pro_cat` int(11) NOT NULL,
  `quantity` int(6) DEFAULT NULL,
  `bp` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_desc`, `pro_price`, `unit`, `pro_cat`, `quantity`, `bp`) VALUES
(1, 'Butter Puff', '30.000', '16.670', 2, 1, NULL, 1000),
(2, 'Corn Puff', '40.000', '16.670', 2, 1, NULL, NULL),
(3, 'Garlic Cheese Roll', '60.000', '39.570', 2, 1, NULL, NULL),
(4, 'Butter Stuffed Bun', '0.000', '42.000', 2, 1, NULL, NULL),
(5, 'Paneer Tikka S. Bun', '0.000', '52.500', 2, 1, NULL, NULL),
(6, 'Burger Bun 4 PCS', '0.000', '42.000', 2, 2, NULL, NULL),
(7, 'Hot Dog Bun 4 PCS', '0.000', '46.000', 2, 2, NULL, NULL),
(8, 'Garlic Lauf', '0.000', '47.230', 2, 2, NULL, NULL),
(9, 'Dabeli Bun 12 PCS', '0.000', '48.500', 2, 2, NULL, NULL),
(10, 'Pizza Base 4 PCS', '0.000', '35.650', 2, 2, NULL, NULL),
(11, 'Pizza Sauce', '0.000', '120.000', 1, 9, 60, NULL),
(12, 'Sweet Onion Sauce', '0.000', '112.000', 1, 9, 74, NULL),
(13, 'Strawberry Cake 1 KG', '0.000', '381.670', 1, 3, NULL, NULL),
(14, 'Choco Chips Cake 1 KG', '0.000', '480.000', 1, 3, NULL, NULL),
(15, 'Belgium Cake 1 KG', '0.000', '395.670', 1, 3, NULL, NULL),
(16, 'soup 34', '10.700', '23.000', 2, 5, 0, NULL),
(17, 'Rice', '0.000', '5000.000', 1, 1, 2, NULL),
(18, 'pilo', '0.000', '5600.000', 1, 3, 0, NULL),
(19, 'sugar', '0.000', '1000.000', 1, 1, 0, NULL),
(20, 'milk', '59.000', '50.000', 3, 9, 50, 60);

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `retailer_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `address` varchar(200) NOT NULL,
  `area_id` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`retailer_id`, `username`, `password`, `address`, `area_id`, `phone`, `email`) VALUES
(1, 'altaf', 'altaf123', 'Kampala,', 1, '9978454323', 'altafneva@gmail.com'),
(2, 'nayan', 'nayan123', 'Wakiso', 2, '9898906523', 'nayan@gmail.com'),
(3, 'nishit', 'nishit123', 'Arua', 3, '8980941941', 'nishit@gmail.com'),
(4, 'dharmil', 'dharmil123', 'Kanungu', 5, '7865340091', 'dharmil123@gmail.com'),
(5, 'rajesh', 'rajesh123', 'Tororo', 4, '7898902365', 'rajesh123@gmail.com'),
(6, 'webfffff', 'kwagala', 'jhgf', 1, '0789890235', 'k@gmail.com'),
(7, 'webfgh', 'kwagala', 'bnm', 2, '0789890235', 'k@gmail.com'),
(8, 'admin', 'admin123', '26776272', 1, '0789890235', 'k@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ret_products`
--

CREATE TABLE `ret_products` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `buying_price` int(50) NOT NULL,
  `selling_price` int(50) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `pro_desc` varchar(255) NOT NULL,
  `pro_cat` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ret_products`
--

INSERT INTO `ret_products` (`pro_id`, `pro_name`, `buying_price`, `selling_price`, `unit`, `pro_desc`, `pro_cat`, `quantity`) VALUES
(1, 'maize', 2000, 5000, 'KGS', '', 'Food item', 0);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(20) NOT NULL,
  `unit_details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unit_name`, `unit_details`) VALUES
(1, 'KG', 'Kilo Gram'),
(2, 'PCS', 'Pieces'),
(3, 'LTR', 'Litre');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `cus_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`cus_id`, `fname`, `lname`, `gender`, `address`, `phone`, `email`, `username`, `password`, `role`) VALUES
(1, 'Simon', 'Kabiito', 'select gen', 'Arua', '+256773619461', 'simonkabiito51@gmail.com', '+256773619461', 'Miche*l12345', ''),
(2, 'Simon', 'Kabiito', 'select gen', 'Arua', '+256773619461', 'simonkabiito51@gmail.com', '+256773619461', 'Miche*l1234', ''),
(3, 'Simon', 'Kabiito', 'select gen', 'Arua', '+256773619461', 'simonkabiito51@gmail.com', '+256773619461', 'Miche*l12345', 'customer'),
(4, 'praise', 'aine', 'Female', 'arua', '0775614648', 'praiseain2@gmail.com', 'praise', 'Praise123', 'customer'),
(5, 'Norah', 'Patrene', 'Female', 'Alaska', '0787524078', 'norahpatrene@gmail.com', 'patrene', 'Komurubug#1', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `wholesaler`
--

CREATE TABLE `wholesaler` (
  `who_id` int(11) NOT NULL,
  `who_name` varchar(25) NOT NULL,
  `who_email` varchar(50) NOT NULL,
  `who_phone` varchar(10) NOT NULL,
  `who_address` varchar(200) NOT NULL,
  `area_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wholesaler`
--

INSERT INTO `wholesaler` (`who_id`, `who_name`, `who_email`, `who_phone`, `who_address`, `area_id`, `username`, `password`) VALUES
(1, 'prosper', 'kwagala@gmail.com', '0766655778', 'luzira', 0, 'prossy', 'prossy123');

-- --------------------------------------------------------

--
-- Table structure for table `who_products`
--

CREATE TABLE `who_products` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(25) NOT NULL,
  `buying_price` int(25) NOT NULL,
  `selling_price` int(25) NOT NULL,
  `unit` varchar(11) NOT NULL,
  `pro_desc` varchar(25) NOT NULL,
  `pro_cat` varchar(11) NOT NULL,
  `quantity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `who_products`
--

INSERT INTO `who_products` (`pro_id`, `pro_name`, `buying_price`, `selling_price`, `unit`, `pro_desc`, `pro_cat`, `quantity`) VALUES
(4, 'millet', 3000, 10000, '0', '', '0', 0),
(5, 'sorghum', 5000, 6000, 'KGS', '', 'Food item', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`dist_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `retailer_id` (`retailer_id`),
  ADD KEY `dist_id` (`dist_id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`invoice_items_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`man_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `retailer_id` (`retailer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_items_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD UNIQUE KEY `bp` (`bp`),
  ADD UNIQUE KEY `bp_2` (`bp`),
  ADD KEY `unit` (`unit`),
  ADD KEY `pro_cat` (`pro_cat`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`retailer_id`),
  ADD KEY `area_code` (`area_id`),
  ADD KEY `area_id` (`area_id`),
  ADD KEY `area_id_2` (`area_id`),
  ADD KEY `area_id_3` (`area_id`),
  ADD KEY `area_id_4` (`area_id`);

--
-- Indexes for table `ret_products`
--
ALTER TABLE `ret_products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `wholesaler`
--
ALTER TABLE `wholesaler`
  ADD PRIMARY KEY (`who_id`);

--
-- Indexes for table `who_products`
--
ALTER TABLE `who_products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `unit` (`unit`),
  ADD KEY `pro_cat` (`pro_cat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `dist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `invoice_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `man_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `retailer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ret_products`
--
ALTER TABLE `ret_products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wholesaler`
--
ALTER TABLE `wholesaler`
  MODIFY `who_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `who_products`
--
ALTER TABLE `who_products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`retailer_id`) REFERENCES `retailer` (`retailer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`dist_id`) REFERENCES `distributor` (`dist_id`) ON UPDATE CASCADE;

--
-- Constraints for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD CONSTRAINT `invoice_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`pro_id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`retailer_id`) REFERENCES `retailer` (`retailer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`unit`) REFERENCES `unit` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`pro_cat`) REFERENCES `categories` (`cat_id`) ON UPDATE CASCADE;

--
-- Constraints for table `retailer`
--
ALTER TABLE `retailer`
  ADD CONSTRAINT `retailer_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
