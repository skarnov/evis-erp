-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2020 at 06:07 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evistech_full_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `admin_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_level` tinyint(1) NOT NULL,
  `admin_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_date_time`, `admin_level`, `admin_status`) VALUES
(1, 'Admin', 'admin@evis.com', 'ibranarnov', '2015-12-22 15:06:36', 1, 1),
(3, 'Accountant', 'accountant@evis.com', 'hasan_mehedi007', '2016-02-23 05:16:58', 3, 1),
(4, 'Inventory', 'inventory@evis.com', 'hasan_mehedi007', '2016-02-23 05:18:56', 4, 1),
(5, 'Factory', 'factory@evis.com', 'hasan_mehedi007', '2016-02-23 05:18:56', 5, 1),
(6, 'Communication', 'com@evis.com', 'hasan_mehedi007', '2016-02-23 05:19:15', 6, 1),
(7, 'Sales Man', 'sales@evis.com', 'hasan_mehedi007', '2016-02-23 05:26:51', 7, 1),
(8, 'Mehedi Hasan', 'amhnt007@gmail.com', 'hasan_mehedi007', '2019-11-22 19:08:24', 1, 1),
(9, 'Shoaib', 'mehedi.cse049@gmail.com', 'hasan_mehedi007', '2019-11-22 19:10:04', 2, 1),
(10, 'Mehedi Hasan', 'fact@evis.com', 'hasan_mehedi007', '2019-11-22 19:31:54', 5, 1),
(11, 'Owner', 'admin@erp.com', 'admin@132', '2019-11-22 19:34:26', 1, 1),
(12, 'HRM', 'hrm@erp.com', 'admin@132', '2019-11-22 19:35:14', 2, 1),
(13, 'Account Manager', 'account@erp.com', 'admin@132', '2019-11-22 19:36:06', 3, 1),
(14, 'Inventory Manager', 'inventory@erp.com', 'admin@132', '2019-11-22 19:36:58', 4, 1),
(15, 'Communication Manager', 'com@erp.com', 'admin@132', '2019-11-22 19:37:38', 6, 1),
(16, 'Factory Manager', 'fact@erp.com', 'admin@132', '2019-11-22 19:38:16', 5, 1),
(17, 'Sales Manager', 'sales@erp.com', 'admin@132', '2019-11-22 19:38:57', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campaign`
--

CREATE TABLE `tbl_campaign` (
  `campaign_id` int(2) NOT NULL,
  `campaign_name` varchar(50) NOT NULL,
  `campaign_due` float(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_campaign`
--

INSERT INTO `tbl_campaign` (`campaign_id`, `campaign_name`, `campaign_due`) VALUES
(1, 'Facebook Marketing', 0.00),
(2, 'Google Adsance ', 0.00),
(3, 'Newspaper Advertisement ', 0.00),
(4, 'TV Commercial ', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashbook`
--

CREATE TABLE `tbl_cashbook` (
  `cashbook_id` int(10) NOT NULL,
  `cashbook_entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `received_amount` float(10,2) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `current_balance` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cashbook`
--

INSERT INTO `tbl_cashbook` (`cashbook_id`, `cashbook_entry_time`, `received_amount`, `paid_amount`, `current_balance`) VALUES
(1, '2019-10-20 18:24:37', 0.00, 5.00, -5.00),
(2, '2019-10-20 18:29:28', 0.00, 75000.00, -75005.00),
(3, '2019-10-20 18:58:33', 0.00, 250.00, -75255.00),
(4, '2019-10-20 19:02:55', 250000.00, 0.00, 174745.00),
(5, '2019-10-20 19:04:38', 0.00, 150000.00, 24745.00),
(6, '2019-10-23 15:41:16', 0.00, 750000.00, -725255.00),
(7, '2019-10-23 15:44:20', 0.00, 18500.00, -743755.00),
(8, '2019-10-23 15:53:38', 0.00, 17500.00, -761255.00),
(9, '2019-10-26 13:27:29', 0.00, 1900000.00, -2661255.00),
(10, '2019-10-26 13:32:07', 0.00, 1900000.00, -4561255.00),
(11, '2019-10-26 13:37:21', 0.00, 1900000.00, -6461255.00),
(12, '2019-10-26 14:09:05', 0.00, 500.00, -6461755.00),
(13, '2019-10-26 17:12:48', 0.00, 1000.00, -6462755.00),
(14, '2019-10-26 17:15:18', 0.00, 50000.00, -6512755.00),
(15, '2019-10-26 18:15:47', 0.00, 500.00, -6513255.00),
(16, '2019-10-26 18:16:10', 0.00, 45000.00, -6558255.00),
(17, '2019-11-02 03:53:52', 0.00, 25850.00, -6584105.00),
(18, '2019-11-02 03:56:41', 0.00, 25850.00, -6609955.00),
(19, '2019-11-02 04:14:36', 0.00, 30770000.00, -37379956.00),
(20, '2019-11-02 04:18:22', 0.00, 30770000.00, -68149952.00),
(21, '2019-11-02 04:20:57', 0.00, 30770000.00, -98919952.00),
(22, '2019-11-02 04:51:29', 0.00, 30770000.00, -100000000.00),
(23, '2019-11-02 04:54:12', 0.00, 30770000.00, -100000000.00),
(24, '2019-11-02 04:56:07', 0.00, 30770000.00, -100000000.00),
(25, '2019-11-02 05:14:14', 0.00, 9031000.00, -100000000.00),
(26, '2019-11-02 05:17:30', 0.00, 9031000.00, -100000000.00),
(27, '2019-11-02 05:19:20', 0.00, 9031000.00, -100000000.00),
(28, '2019-11-02 05:20:16', 0.00, 9031000.00, -100000000.00),
(29, '2019-11-02 05:29:24', 0.00, 100000000.00, -100000000.00),
(30, '2019-11-02 05:35:18', 0.00, 100000000.00, -100000000.00),
(31, '2019-11-02 06:26:09', 0.00, 505.00, -100000000.00),
(33, '2019-11-02 09:12:25', 10000.00, 0.00, -99990000.00),
(34, '2019-11-02 11:24:19', 1010.00, 0.00, -99988992.00),
(35, '2019-11-02 11:29:56', 10000.00, 0.00, -99978992.00),
(36, '2019-11-02 13:08:42', 0.00, 75000.00, -100000000.00),
(37, '2019-11-02 13:40:27', 2000.00, 0.00, -99998000.00),
(38, '2019-11-02 14:05:38', 2000.00, 0.00, -99996000.00),
(39, '2019-11-02 14:34:35', 5000.00, 0.00, -99991000.00),
(40, '2019-11-02 15:12:20', 0.00, 100000.00, -100000000.00),
(41, '2019-11-06 15:34:27', 0.00, 0.00, -100000000.00),
(42, '2019-11-06 15:38:05', 0.00, 18500.00, -100000000.00),
(43, '2019-11-06 17:23:05', 0.00, 750000.00, -100000000.00),
(44, '2019-11-06 17:28:14', 0.00, 9031000.00, -100000000.00),
(45, '2019-11-06 17:41:59', 0.00, 25850.00, -100000000.00),
(46, '2019-11-15 08:42:41', 3000.00, 0.00, -99997000.00),
(47, '2019-11-20 18:15:02', 0.00, 15000.00, -100000000.00),
(48, '2019-11-22 07:09:12', 1000.00, 0.00, -99999000.00),
(49, '2019-11-22 19:11:53', 0.00, 5000.00, -100000000.00),
(50, '2019-12-02 12:08:11', 1650.00, 0.00, -99998352.00),
(51, '2019-12-02 14:31:39', 502.00, 0.00, -99997848.00),
(52, '2019-12-02 14:36:55', 1010.00, 0.00, -99996840.00),
(53, '2019-12-02 14:45:01', 857.00, 0.00, -99995984.00),
(54, '2019-12-02 14:47:36', 500.00, 0.00, -99995488.00),
(55, '2019-12-02 14:54:39', 655.00, 0.00, -99994832.00),
(56, '2019-12-02 14:56:06', 355.00, 0.00, -99994480.00),
(57, '2019-12-02 14:58:29', 502.00, 0.00, -99993976.00),
(58, '2019-12-02 15:01:38', 1500.00, 0.00, -99992480.00),
(59, '2019-12-02 15:03:44', 355.00, 0.00, -99992128.00),
(60, '2019-12-02 15:04:59', 500.00, 0.00, -99991632.00),
(61, '2019-12-02 15:06:04', 355.00, 0.00, -99991280.00),
(62, '2019-12-02 15:07:17', 502.00, 0.00, -99990776.00),
(63, '2019-12-02 15:12:12', 150.00, 0.00, -99990624.00),
(64, '2019-12-02 15:13:06', 650.00, 0.00, -99989976.00),
(65, '2019-12-02 15:15:00', 5312.00, 0.00, -99984664.00),
(66, '2019-12-02 15:44:47', 16000.00, 0.00, -99968664.00),
(67, '2019-12-02 15:47:48', 12000.00, 0.00, -99956664.00),
(68, '2019-12-02 15:51:39', 50000.00, 0.00, -99906664.00),
(69, '2019-12-02 16:16:19', 0.00, 750000.00, -100000000.00),
(70, '2019-12-02 16:19:42', 0.00, 1200000.00, -100000000.00),
(71, '2019-12-02 16:24:00', 0.00, 1400000.00, -100000000.00),
(72, '2019-12-02 17:16:32', 0.00, 1500000.00, -100000000.00),
(73, '2019-12-02 17:18:12', 0.00, 1350000.00, -100000000.00),
(74, '2019-12-02 17:19:37', 0.00, 1650000.00, -100000000.00),
(75, '2019-12-02 17:22:18', 0.00, 1100000.00, -100000000.00),
(76, '2019-12-05 15:59:29', 1500.00, 0.00, -99998496.00),
(77, '2019-12-05 16:02:13', 1800.00, 0.00, -99996696.00),
(78, '2019-12-06 09:03:55', 650.00, 0.00, -99996048.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_status`) VALUES
(1, 'Uncategorized', 0),
(2, 'Men', 1),
(3, 'Women', 1),
(4, 'Electronic Devices', 1),
(5, 'Backpack', 1),
(6, 'Watches', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `chat_id` int(10) NOT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `customer_message` text,
  `shop_id` int(2) DEFAULT NULL,
  `shop_message` text,
  `admin_message` text,
  `show_status` tinyint(1) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`chat_id`, `customer_id`, `customer_message`, `shop_id`, `shop_message`, `admin_message`, `show_status`, `time`) VALUES
(1, 5, 'Hi', NULL, NULL, NULL, 0, '2019-11-02 14:16:56'),
(2, 5, 'How are you', NULL, NULL, NULL, 0, '2019-11-02 14:17:07'),
(3, 5, 'My product number is 007', NULL, NULL, NULL, 0, '2019-11-02 14:17:30'),
(4, 5, 'Product color is Red', NULL, NULL, NULL, 0, '2019-11-02 14:18:22'),
(5, 5, NULL, NULL, NULL, 'Your order number please', 0, '2019-11-02 14:18:49'),
(6, NULL, NULL, 2, 'Hi', NULL, 0, '2019-11-02 14:25:33'),
(7, NULL, NULL, 2, 'How about my order', NULL, 0, '2019-11-02 14:25:49'),
(8, 5, 'Hello', NULL, NULL, NULL, 0, '2019-11-04 11:42:04'),
(9, 5, 'Hi', NULL, NULL, NULL, 0, '2019-11-04 11:42:11'),
(10, 5, 'What', NULL, NULL, NULL, 0, '2019-11-04 11:42:21'),
(11, 5, 'What about next project', NULL, NULL, NULL, 0, '2019-11-04 11:42:41'),
(12, 5, 'Next', NULL, NULL, NULL, 0, '2019-11-04 11:42:56'),
(13, NULL, NULL, 2, 'hi', NULL, 0, '2019-11-04 11:48:48'),
(14, NULL, NULL, 2, 'hi', NULL, 0, '2019-11-04 11:48:48'),
(15, NULL, NULL, 2, 'hi', NULL, 0, '2019-11-04 11:48:59'),
(16, NULL, NULL, 2, 'hi', NULL, 0, '2019-11-04 11:48:59'),
(17, 5, 'Thanks', NULL, NULL, NULL, 0, '2019-11-04 11:49:07'),
(18, NULL, NULL, 2, 'good', NULL, 0, '2019-11-04 11:49:31'),
(19, 7, 'Hlw', NULL, NULL, NULL, 0, '2019-11-06 16:02:31'),
(20, 7, NULL, NULL, NULL, 'How are you', 0, '2019-11-06 16:03:05'),
(21, 7, 'Whats up', NULL, NULL, NULL, 0, '2019-11-06 16:03:52'),
(22, 8, NULL, NULL, NULL, 'Hello', 0, '2019-11-15 08:48:44'),
(23, 8, 'hi there', NULL, NULL, NULL, 0, '2019-11-15 08:49:02'),
(24, 6, NULL, NULL, NULL, 'hi', 0, '2019-11-22 19:13:46'),
(25, 8, 'gbjh', NULL, NULL, NULL, 0, '2019-12-06 09:01:45'),
(26, 8, 'Thank You', NULL, NULL, NULL, 0, '2019-12-06 09:02:07'),
(27, 8, NULL, NULL, NULL, 'welcome', 0, '2019-12-06 09:02:28'),
(28, 9, 'hi', NULL, NULL, NULL, 0, '2020-01-17 06:12:22'),
(29, 9, NULL, NULL, NULL, 'Hello', 0, '2020-01-17 06:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(64) NOT NULL,
  `customer_mobile` varchar(11) NOT NULL,
  `customer_address` text NOT NULL,
  `member_since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_mobile`, `customer_address`, `member_since`, `customer_status`) VALUES
(5, 'Sk Arnov', 'sk.obydullah@gmail.com', '111111', '01611698715', 'House: 30, Block B, Road 77, Dhaka 1216', '2019-11-02 11:16:54', 1),
(7, 'Ibran', 'ibran_i@yahoo.com', '1234567', '01728139249', 'Mirpu, Dhaka  ', '2019-11-06 16:00:38', 1),
(8, 'Husne Farah', 'hsn@gmail.com', '111111', '01718675643', '', '2019-11-15 08:46:28', 1),
(9, 'Masud', 'mosharrof@expectapparel.com', '111111', '01723670262', 'Dhaka', '2020-01-17 06:08:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery`
--

CREATE TABLE `tbl_delivery` (
  `delivery_id` int(10) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `sale_id` int(10) NOT NULL,
  `delivery_start_time` varchar(11) NOT NULL,
  `delivery_end_time` varchar(11) NOT NULL,
  `delivery_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_delivery`
--

INSERT INTO `tbl_delivery` (`delivery_id`, `employee_id`, `sale_id`, `delivery_start_time`, `delivery_end_time`, `delivery_status`) VALUES
(1, 3, 1, ' 20-10-2019', ' 20-10-2019', 1),
(2, 2, 1, ' 20-10-2019', ' 21-10-2019', 1),
(3, 4, 4, ' 02-11-2019', ' 02-11-2019', 1),
(4, 4, 4, ' 02-11-2019', ' 02-11-2019', 1),
(5, 4, 4, ' 02-11-2019', ' 02-11-2019', 1),
(6, 4, 4, ' 02-11-2019', ' 02-11-2019', 1),
(7, 4, 4, ' 02-11-2019', ' 02-11-2019', 0),
(8, 3, 4, ' 02-11-2019', ' 02-11-2019', 1),
(9, 3, 1, ' 20-11-2019', ' 20-11-2019', 1),
(10, 4, 1, ' 23-11-2019', ' 23-11-2019', 1),
(11, 4, 1, ' 23-11-2019', ' 23-11-2019', 1),
(12, 4, 6, ' 02-12-2019', ' 02-12-2019', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `employee_id` int(5) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `employee_image` varchar(200) NOT NULL,
  `employee_join_date` varchar(11) NOT NULL,
  `employee_designation` varchar(100) NOT NULL,
  `employee_security_number` varchar(50) NOT NULL,
  `employee_salary` float(10,2) NOT NULL,
  `employee_salary_due` float(10,2) NOT NULL,
  `employee_mobile_number` varchar(11) NOT NULL,
  `employee_office_number` varchar(11) NOT NULL,
  `employee_education` text NOT NULL,
  `employee_experience` text NOT NULL,
  `employee_resignation_date` varchar(11) NOT NULL,
  `employee_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`employee_id`, `employee_name`, `employee_image`, `employee_join_date`, `employee_designation`, `employee_security_number`, `employee_salary`, `employee_salary_due`, `employee_mobile_number`, `employee_office_number`, `employee_education`, `employee_experience`, `employee_resignation_date`, `employee_status`) VALUES
(3, 'Mehedi Hasan', 'img/employee_image/download.jpg', ' 31-07-2019', 'Manager', '180305523', 50000.00, -5000.00, '01676240077', '96548264', 'M.Sc. in CSE', '4', '', 1),
(4, 'Md Rahim', 'img/employee_image/rahim.jpg', ' 16-10-2019', '', '', 100000.00, 5000.00, '01718985635', '', '', '', ' 16-10-2019', 1),
(5, 'Al Mehedi Hasan', 'img/employee_image/67d5115181f92bf935fe2b36ff21be5d_thumb.png', ' 15-11-2019', 'CSE', '180305523', 75003.00, 0.00, '+8801676***', '+9238******', 'M.Sc. in CSE', '2+', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE `tbl_expense` (
  `expense_id` int(10) NOT NULL,
  `expense_category` int(2) NOT NULL,
  `net_expense` float(10,2) NOT NULL,
  `expense_paid_amount` float(10,2) NOT NULL,
  `expense_payable` float(10,2) NOT NULL,
  `expense_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_id` int(10) DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  `marketing_id` int(3) DEFAULT NULL,
  `salary_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expense`
--

INSERT INTO `tbl_expense` (`expense_id`, `expense_category`, `net_expense`, `expense_paid_amount`, `expense_payable`, `expense_time`, `transaction_id`, `product_id`, `marketing_id`, `salary_id`) VALUES
(1, 3, 10.00, 5.00, 5.00, '2019-10-20 18:24:36', NULL, NULL, 1, NULL),
(2, 4, 100000.00, 75000.00, 25000.00, '2019-10-20 18:29:28', NULL, NULL, NULL, 1),
(3, 3, 250.00, 250.00, 0.00, '2019-10-20 18:58:33', NULL, NULL, 2, NULL),
(4, 2, 250000.00, 150000.00, 100000.00, '2019-10-20 19:04:38', NULL, NULL, NULL, NULL),
(5, 2, 0.00, 750000.00, 0.00, '2019-10-23 15:41:16', NULL, 1, NULL, NULL),
(6, 2, 0.00, 18500.00, 0.00, '2019-10-23 15:44:20', NULL, 2, NULL, NULL),
(7, 2, 0.00, 17500.00, 0.00, '2019-10-23 15:53:38', NULL, 3, NULL, NULL),
(8, 2, 0.00, 1900000.00, 0.00, '2019-10-26 13:27:29', NULL, 4, NULL, NULL),
(9, 2, 0.00, 1900000.00, 0.00, '2019-10-26 13:32:07', NULL, 5, NULL, NULL),
(10, 2, 0.00, 1900000.00, 0.00, '2019-10-26 13:37:21', NULL, 6, NULL, NULL),
(11, 1, 500.00, 500.00, 0.00, '2019-10-26 14:09:05', 1, NULL, NULL, NULL),
(12, 1, 5000.00, 1000.00, 4000.00, '2019-10-26 17:12:48', 2, NULL, NULL, NULL),
(13, 1, 50000.00, 50000.00, 0.00, '2019-10-26 17:30:30', NULL, NULL, NULL, NULL),
(14, 1, 4000.00, 500.00, 3500.00, '2019-10-26 18:15:47', 4, NULL, NULL, NULL),
(15, 1, 50000.00, 45000.00, 8500.00, '2019-10-26 18:16:10', 5, NULL, NULL, NULL),
(16, 2, 0.00, 25850.00, 0.00, '2019-11-02 03:53:52', NULL, 7, NULL, NULL),
(17, 2, 0.00, 25850.00, 0.00, '2019-11-02 03:56:41', NULL, 8, NULL, NULL),
(18, 2, 0.00, 30770000.00, 0.00, '2019-11-02 04:14:36', NULL, 9, NULL, NULL),
(19, 2, 0.00, 30770000.00, 0.00, '2019-11-02 04:18:22', NULL, 10, NULL, NULL),
(20, 2, 0.00, 30770000.00, 0.00, '2019-11-02 04:20:57', NULL, 11, NULL, NULL),
(21, 2, 0.00, 30770000.00, 0.00, '2019-11-02 04:51:29', NULL, 12, NULL, NULL),
(22, 2, 0.00, 30770000.00, 0.00, '2019-11-02 04:54:12', NULL, 13, NULL, NULL),
(23, 2, 0.00, 30770000.00, 0.00, '2019-11-02 04:56:07', NULL, 14, NULL, NULL),
(24, 2, 0.00, 9031000.00, 0.00, '2019-11-02 05:14:14', NULL, 15, NULL, NULL),
(25, 2, 0.00, 9031000.00, 0.00, '2019-11-02 05:17:30', NULL, 16, NULL, NULL),
(26, 2, 0.00, 9031000.00, 0.00, '2019-11-02 05:19:20', NULL, 17, NULL, NULL),
(27, 2, 0.00, 9031000.00, 0.00, '2019-11-02 05:20:16', NULL, 18, NULL, NULL),
(28, 2, 0.00, 100000000.00, 0.00, '2019-11-02 05:29:24', NULL, 19, NULL, NULL),
(29, 2, 0.00, 100000000.00, 0.00, '2019-11-02 05:35:18', NULL, 20, NULL, NULL),
(30, 3, 500.00, 505.00, 0.00, '2019-11-02 06:26:09', NULL, NULL, 3, NULL),
(31, 4, 50000.00, 75000.00, 0.00, '2019-11-02 13:08:42', NULL, NULL, NULL, 2),
(32, 3, 100000.00, 100000.00, 0.00, '2019-11-02 15:12:20', NULL, NULL, NULL, NULL),
(33, 2, 0.00, 0.00, 0.00, '2019-11-06 15:34:27', NULL, 21, NULL, NULL),
(34, 2, 0.00, 18500.00, 0.00, '2019-11-06 15:38:05', NULL, 22, NULL, NULL),
(35, 2, 0.00, 750000.00, 0.00, '2019-11-06 17:23:05', NULL, 23, NULL, NULL),
(36, 2, 0.00, 9031000.00, 0.00, '2019-11-06 17:28:14', NULL, 24, NULL, NULL),
(37, 2, 0.00, 25850.00, 0.00, '2019-11-06 17:41:59', NULL, 25, NULL, NULL),
(38, 4, 10000.00, 15000.00, -5000.00, '2019-11-20 18:15:02', NULL, NULL, NULL, 3),
(39, 4, 10000.00, 5000.00, 5000.00, '2019-11-22 19:11:53', NULL, NULL, NULL, 4),
(40, 2, 0.00, 750000.00, 0.00, '2019-12-02 16:16:19', NULL, 26, NULL, NULL),
(41, 2, 0.00, 1200000.00, 0.00, '2019-12-02 16:19:42', NULL, 27, NULL, NULL),
(42, 2, 0.00, 1400000.00, 0.00, '2019-12-02 16:24:00', NULL, 28, NULL, NULL),
(43, 2, 0.00, 1500000.00, 0.00, '2019-12-02 17:16:32', NULL, 29, NULL, NULL),
(44, 2, 0.00, 1350000.00, 0.00, '2019-12-02 17:18:12', NULL, 30, NULL, NULL),
(45, 2, 0.00, 1650000.00, 0.00, '2019-12-02 17:19:37', NULL, 31, NULL, NULL),
(46, 2, 0.00, 1100000.00, 0.00, '2019-12-02 17:22:18', NULL, 32, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense_category`
--

CREATE TABLE `tbl_expense_category` (
  `expense_category` int(2) NOT NULL,
  `expense_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expense_category`
--

INSERT INTO `tbl_expense_category` (`expense_category`, `expense_category_name`) VALUES
(1, 'Supplier Paid'),
(2, 'New Product'),
(3, 'New Promotion'),
(4, 'Salary Paid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_income`
--

CREATE TABLE `tbl_income` (
  `income_id` int(10) NOT NULL,
  `income_category` int(2) NOT NULL,
  `net_income` float(10,2) DEFAULT NULL,
  `income_received_amount` float(10,2) DEFAULT NULL,
  `income_receivable` float(10,2) DEFAULT NULL,
  `income_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sale_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_income`
--

INSERT INTO `tbl_income` (`income_id`, `income_category`, `net_income`, `income_received_amount`, `income_receivable`, `income_time`, `sale_id`) VALUES
(1, 1, 1250000.00, 250000.00, 1000000.00, '2019-10-20 19:02:55', 0),
(3, 1, NULL, 8000.00, 1000.00, '2019-11-02 09:12:25', 2),
(6, 4, 5000.00, 5000.00, 0.00, '2019-11-02 14:34:35', 0),
(7, 1, NULL, -749700.00, 200.00, '2019-11-22 07:09:12', 5),
(8, 1, NULL, -99998496.00, NULL, '2019-12-02 12:08:11', 6),
(9, 1, NULL, -99999496.00, NULL, '2019-12-02 14:31:38', 7),
(10, 1, NULL, -1899345.00, NULL, '2019-12-02 14:36:54', 8),
(11, 1, NULL, -1899645.00, NULL, '2019-12-02 14:43:40', 9),
(12, 1, NULL, -1899645.00, NULL, '2019-12-02 14:45:01', 10),
(13, 1, NULL, -60087500.00, NULL, '2019-12-02 14:47:36', 11),
(14, 1, NULL, -1899345.00, NULL, '2019-12-02 14:54:39', 12),
(15, 1, NULL, -1899645.00, NULL, '2019-12-02 14:56:06', 13),
(16, 1, NULL, -99999496.00, NULL, '2019-12-02 14:58:29', 14),
(17, 1, NULL, -99998496.00, NULL, '2019-12-02 15:01:38', 15),
(18, 1, NULL, -1899645.00, NULL, '2019-12-02 15:03:43', 16),
(19, 1, NULL, -60087500.00, NULL, '2019-12-02 15:04:59', 17),
(20, 1, NULL, -1899645.00, NULL, '2019-12-02 15:06:04', 18),
(21, 1, NULL, -99999496.00, NULL, '2019-12-02 15:07:17', 19),
(22, 1, NULL, -749850.00, NULL, '2019-12-02 15:12:12', 20),
(23, 1, NULL, -60087500.00, NULL, '2019-12-02 15:13:06', 21),
(24, 1, NULL, -1899345.00, NULL, '2019-12-02 15:15:00', 22),
(25, 1, NULL, -9015000.00, NULL, '2019-12-02 15:44:46', 23),
(26, 1, NULL, -9019000.00, NULL, '2019-12-02 15:47:48', 24),
(27, 1, NULL, -99980000.00, NULL, '2019-12-02 15:51:38', 25),
(28, 1, NULL, -99998496.00, NULL, '2019-12-05 15:59:28', 26),
(29, 1, NULL, -1098200.00, NULL, '2019-12-05 16:02:12', 27),
(30, 1, NULL, -60087500.00, NULL, '2019-12-06 09:03:54', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_income_category`
--

CREATE TABLE `tbl_income_category` (
  `income_category` int(2) NOT NULL,
  `income_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_income_category`
--

INSERT INTO `tbl_income_category` (`income_category`, `income_category_name`) VALUES
(1, 'Product Sale'),
(2, 'Shop Paid'),
(3, 'Donation'),
(4, 'Capital Invest');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturer`
--

CREATE TABLE `tbl_manufacturer` (
  `manufacturer_id` int(2) NOT NULL,
  `manufacturer_name` varchar(30) NOT NULL,
  `manufacturer_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_manufacturer`
--

INSERT INTO `tbl_manufacturer` (`manufacturer_id`, `manufacturer_name`, `manufacturer_status`) VALUES
(1, 'Own Manufactured', 1),
(2, 'Samsung', 1),
(3, 'Apple', 1),
(4, 'Huawei', 1),
(5, 'Nokia', 1),
(6, 'Xiaomi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturing`
--

CREATE TABLE `tbl_manufacturing` (
  `manufacturing_id` int(5) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `quantity` float(10,2) NOT NULL,
  `cost_per_product` float(10,2) NOT NULL,
  `estimate_profit_per_product` float(10,2) NOT NULL,
  `manufacturing_note` text,
  `manufacturing_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_manufacturing`
--

INSERT INTO `tbl_manufacturing` (`manufacturing_id`, `product_name`, `quantity`, `cost_per_product`, `estimate_profit_per_product`, `manufacturing_note`, `manufacturing_time`) VALUES
(1, 'T- Shirt', 5000.00, 120.00, 17.00, '', '2019-10-17 16:20:56'),
(2, 'Jeans', 100.00, 150.00, 20.00, '', '2019-10-17 16:22:27'),
(3, 'Shoe', 100.00, 120.00, 25.00, '<p>Total Manufacture</p>', '2019-10-20 18:52:20'),
(4, 'Shirt', 4000.00, 450.00, 300.00, '', '2019-10-26 13:18:21'),
(5, 'Sharee', 1000.00, 9000.00, 1000.00, '', '2019-10-26 14:00:27'),
(6, 'Watch', 50.00, 500.00, 1200.00, '', '2019-10-26 14:01:31'),
(7, 'Backpack', 5000.00, 6000.00, 2000.00, '', '2019-10-26 14:04:33'),
(8, 'Mobile', 14000.00, 8000.00, 6000.00, '', '2019-10-26 14:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marketing`
--

CREATE TABLE `tbl_marketing` (
  `marketing_id` int(3) NOT NULL,
  `product_id` int(10) NOT NULL,
  `campaign_id` int(2) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `campaign_cost` float(10,2) NOT NULL,
  `paid` float(10,2) NOT NULL,
  `due` float(10,2) NOT NULL,
  `campaign_start` varchar(11) NOT NULL,
  `campaign_end` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_marketing`
--

INSERT INTO `tbl_marketing` (`marketing_id`, `product_id`, `campaign_id`, `employee_id`, `campaign_cost`, `paid`, `due`, `campaign_start`, `campaign_end`) VALUES
(1, 0, 1, 3, 10.00, 5.00, 5.00, ' 20-10-2019', '21-10-2019'),
(2, 0, 2, 3, 250.00, 250.00, 0.00, ' 20-10-2019', ' 20-10-2019'),
(3, 20, 1, 3, 500.00, 505.00, 0.00, ' 02-11-2019', ' 02-11-2020');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_month`
--

CREATE TABLE `tbl_month` (
  `month_id` int(2) NOT NULL,
  `month_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_month`
--

INSERT INTO `tbl_month` (`month_id`, `month_name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(5) NOT NULL,
  `notification_type` varchar(200) NOT NULL,
  `notification_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notification_status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `notification_type`, `notification_time`, `notification_status`) VALUES
(1, 'M/S LabTrio paid by 500', '2019-10-26 14:09:05', 0),
(2, 'M/S LabTrio paid by 1000', '2019-10-26 17:12:48', 0),
(3, 'M/S LabTrio paid by 50000', '2019-10-26 17:15:18', 0),
(4, 'NR Group paid by 500', '2019-10-26 18:15:47', 0),
(5, 'NR Group paid by 45000', '2019-10-26 18:16:10', 0),
(6, 'Bhai Bhai send by 2000', '2019-11-02 13:40:27', 0),
(7, 'Aree send by 2000', '2019-11-02 14:05:38', 0),
(8, 'Bhai Bhai send by 3000', '2019-11-15 08:42:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_planning`
--

CREATE TABLE `tbl_planning` (
  `planning_id` int(5) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `quantity` float(10,2) NOT NULL,
  `cost_per_product` float(10,2) NOT NULL,
  `estimate_profit_per_product` float(10,2) NOT NULL,
  `planning_note` text,
  `planning_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_planning`
--

INSERT INTO `tbl_planning` (`planning_id`, `product_name`, `quantity`, `cost_per_product`, `estimate_profit_per_product`, `planning_note`, `planning_time`) VALUES
(1, 'T- Shirt', 300.00, 100.00, 20.00, '', '2019-10-17 16:17:17'),
(2, 'Jeans', 200.00, 150.00, 20.00, '', '2019-10-17 16:18:08'),
(3, 'Shoe', 100.00, 120.00, 25.00, '<p>Genuine Leather</p>', '2019-10-20 18:48:47'),
(4, 'Shirt', 5000.00, 350.00, 200.00, '<h2>New Product For 2020</h2>', '2019-10-26 13:15:06'),
(5, 'Watch', 700.00, 200.00, 300.00, '', '2019-10-26 13:55:21'),
(6, 'Backpack', 100.00, 600.00, 200.00, '', '2019-10-26 13:55:40'),
(7, 'Mobile', 14000.00, 8000.00, 6000.00, '', '2019-10-26 13:56:34'),
(8, 'Sharee', 7000.00, 9000.00, 1000.00, '', '2019-10-26 13:59:01'),
(9, 'Shoe', 10.00, 15.00, 2.00, '', '2019-11-20 18:09:08'),
(10, 'MOBILE', 10.00, 100.00, 10.00, '', '2019-11-22 12:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_barcode` varchar(50) NOT NULL,
  `product_sku` varchar(50) NOT NULL,
  `category_id` int(3) NOT NULL,
  `subcategory_id` int(3) NOT NULL,
  `supplier_id` int(3) NOT NULL,
  `manufacturer_id` int(2) NOT NULL,
  `product_summery` text NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `product_quantity` varchar(10) NOT NULL,
  `product_net_price` float(10,2) NOT NULL,
  `product_selling_price` float(10,2) NOT NULL,
  `product_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_barcode`, `product_sku`, `category_id`, `subcategory_id`, `supplier_id`, `manufacturer_id`, `product_summery`, `product_image`, `product_quantity`, `product_net_price`, `product_selling_price`, `product_status`) VALUES
(1, 'T- Shirt', 'tshirt', 'TSU87', 2, 2, 0, 1, '', 'img/product_image/Blue_Tshirt_thumb.jpg', '4994', 750000.00, 150.00, 1),
(2, 'Jeans', 'jeans', 'jeans', 2, 6, 0, 1, '', 'img/product_image/32937_serge_straight_pulse_19_1_thumb.jpg', '111', 60088000.00, 500.00, 1),
(3, 'Shoe', 'SH65', 'JH76', 2, 18, 0, 1, '', 'img/product_image/0002319_sprint-mens-sneaker_thumb.jpg', '95', 100000000.00, 1500.00, 1),
(4, 'Formal Blue Shirt', 'R43', 'GH21', 2, 4, 0, 1, '', 'img/product_image/nxznp_thumb.jpg', '3994', 100000000.00, 502.00, 1),
(5, 'White Printed Shirt', 'HTR4', 'DF32J', 2, 4, 0, 1, '', 'img/product_image/1560825977271169007_thumb.jpg', '3992', 1900000.00, 355.00, 1),
(6, 'Casual Shirt', 'F45', 'FR3', 2, 4, 0, 1, '', 'img/product_image/ce_s_casual_zn2384_544_2_3031_7_260_4_tk_1890_-_copy_thumb.jpg', '3996', 1900000.00, 655.00, 1),
(7, 'Analog Watch', 'WT54', 'WT', 6, 19, 2, 1, '', 'img/product_image/30-great-watches-to-buy-in-2019-luxury-watches-Corum-Heritage-Lab-Slider-June-2019-10_thumb.jpg', '50.00', 0.00, 1000.00, 1),
(8, 'Smart Watch', 'HYUY', 'TY', 6, 20, 0, 1, '', 'img/product_image/images.jpg', '50.00', 0.00, 1200.00, 1),
(9, 'Fashion Backpack', 'KL4', 'RT3', 5, 21, 0, 1, '', 'img/product_image/herschel-supply-co-little-america-mid-volume-grey-tan-synthetic-leather_1__2_thumb.jpg', '4998', 0.00, 8000.00, 1),
(10, 'Black Backpack', 'TY65', 'JKU76', 5, 21, 0, 1, '', 'img/product_image/images_thumb.jpg', '5000.00', 0.00, 10000.00, 1),
(11, 'Yellow Backpack', 'GH', 'F5', 5, 21, 0, 1, '', 'img/product_image/thumb_thumb.jpg', '5000.00', 0.00, 7000.00, 1),
(12, 'Anti Theft Backpack', 'G3D', 'NJ7', 5, 22, 0, 1, '', 'img/product_image/f8c33470c5dde4c6791ab15912fefd89_thumb.jpg', '5000.00', 100000000.00, 6500.00, 1),
(13, 'Modren Backpack', 'LK76', 'TR543', 5, 22, 0, 1, '', 'img/product_image/95c428290740c6363773962cc84ece8b_thumb.jpg', '5000.00', 100000000.00, 8500.00, 1),
(14, 'Anti Treft Backpack', 'Y7U', 'BG5', 5, 22, 0, 1, '', 'img/product_image/07b04fc6187c2320f2339d3e1910a77c_thumb.jpg', '5000.00', 0.00, 15000.00, 1),
(15, 'Sharee', 'SH659', 'MKJ', 3, 9, 0, 1, '', 'img/product_image/4e4f4b6fbb74ec724099a12fae43dbcd_thumb.jpg', '998', 9031000.00, 16000.00, 1),
(16, 'Classic Sharee', 'H65R', 'PLK8', 3, 9, 0, 1, '', 'img/product_image/901763a83239a111de88ca6d7b218e50_thumb.jpg', '1000.00', 100000000.00, 12000.00, 1),
(17, 'Red Sharee', 'U7', 'P0U', 3, 9, 0, 1, '', 'img/product_image/1fbc08c23e83f9240fbe9234536ed06d_thumb.jpg', '999', 100000000.00, 20000.00, 1),
(18, 'Printed Sharee', 'LU9', 'NH98', 3, 9, 0, 1, '', 'img/product_image/48f07ce338acc8f1162121275a81515b_thumb.jpg', '999', 0.00, 14000.00, 1),
(19, 'Android Mobile', 'JY54', 'J7', 4, 14, 0, 1, '', 'img/product_image/51ed92771f2f6024801df58b27a363fb_thumb.jpg', '13999', 100000000.00, 10000.00, 1),
(20, 'iMobile', 'MB', 'MB2', 4, 14, 0, 1, '', 'img/product_image/cbd30a01ae7ae4ec86ece0e6c3c7a492_thumb.jpg', '14000.00', 0.00, 60000.00, 1),
(21, 'T- Shirt', '', '', 2, 2, 0, 1, '', 'img/product_image/d64944f2238d74e7ed889822ea884aee_thumb.jpg', '5000.00', 0.00, 30000.00, 1),
(22, 'Jeans', 'DRT', 'JNKC', 2, 2, 0, 1, '', 'img/product_image/34107c80f4d64c0630b9ad03d3fd3a26_thumb.jpg', '100.00', 18500.00, 300.00, 1),
(23, 'T- Shirt', 'HLOW', 'PPM', 2, 2, 0, 1, '', 'img/product_image/0d0adcdfe89b06c0820a7a8e8efe93aa_thumb.jpg', '4999', 750000.00, 300.00, 1),
(24, 'Sharee', 'KFO', 'JLO', 3, 9, 0, 1, '', 'img/product_image/358f65094fd237f96fda877ae0ff0ae5_thumb.jpg', '999', 0.00, 12000.00, 1),
(25, 'Watch', 'WOP', 'NPL', 2, 19, 0, 1, '', 'img/product_image/59ef95c0ee6de4ec9509bfb1b1df6e4c_thumb.jpg', '49', 25850.00, 900.00, 1),
(26, 'Sky polo ', '4', '', 2, 3, 0, 1, '', 'img/product_image/d70e5c8adaa9a162a6b526286035e1c0_thumb.jpg', '1500', 0.00, 700.00, 1),
(27, 'Giordano ', '', '', 2, 2, 0, 1, '', 'img/product_image/bf25889e31b2e082919bdacb3a090766_thumb.jpg', '2000', 1200000.00, 900.00, 0),
(28, '', '', '', 2, 3, 0, 1, '', 'img/product_image/4396913125e670c7b8e9419ee47c4138_thumb.jpg', '2000', 1400000.00, 1000.00, 0),
(29, '', '', '', 2, 3, 0, 1, '', 'img/product_image/ce0e94f15dc24114c4460f9cc7137538_thumb.jpg', '1500', 1500000.00, 1500.00, 0),
(30, '', '', '', 2, 3, 0, 1, '', 'img/product_image/291378bdc0b8d9b52a062dd10a3eb142_thumb.jpg', '1500', 1350000.00, 1200.00, 0),
(31, '', '', '', 2, 3, 0, 1, '', 'img/product_image/17ddaa4b2beccbe01735257da03195b9_thumb.jpg', '1500', 1650000.00, 1800.00, 0),
(32, 'Classical Stripped polo', '', '', 2, 3, 0, 1, '', 'img/product_image/1de63e783e9a0478809bcef9be49bc65_thumb.jpg', '999', 1100000.00, 1800.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary`
--

CREATE TABLE `tbl_salary` (
  `salary_id` int(10) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `month_id` int(2) NOT NULL,
  `year_id` int(2) NOT NULL,
  `salary_paid_date` varchar(11) NOT NULL,
  `salary_amount_due` float(10,2) NOT NULL,
  `salary_amount_paid` float(10,2) NOT NULL,
  `salary_amount_balance` float(10,2) NOT NULL,
  `comment` text NOT NULL,
  `salary_entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_salary`
--

INSERT INTO `tbl_salary` (`salary_id`, `employee_id`, `month_id`, `year_id`, `salary_paid_date`, `salary_amount_due`, `salary_amount_paid`, `salary_amount_balance`, `comment`, `salary_entry_date`) VALUES
(1, 3, 10, 4, ' 20-10-2019', 25000.00, 75000.00, 100000.00, '', '2019-10-20 18:29:28'),
(2, 3, 9, 4, ' 02-11-2019', 0.00, 75000.00, 50000.00, '', '2019-11-02 13:08:42'),
(3, 3, 10, 4, ' 20-11-2019', -5000.00, 15000.00, 10000.00, '', '2019-11-20 18:15:02'),
(4, 4, 11, 4, ' 22-11-2019', 5000.00, 5000.00, 10000.00, '', '2019-11-22 19:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

CREATE TABLE `tbl_sale` (
  `sale_id` int(10) NOT NULL,
  `shop_id` int(2) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `payment_type` tinyint(1) DEFAULT NULL,
  `sale_due` float(10,2) NOT NULL,
  `sale_paid` float(10,2) NOT NULL,
  `paid_status` tinyint(1) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sale`
--

INSERT INTO `tbl_sale` (`sale_id`, `shop_id`, `customer_id`, `payment_type`, `sale_due`, `sale_paid`, `paid_status`, `time`) VALUES
(2, 1, NULL, NULL, 1000.00, 10000.00, 0, '2019-11-02 09:12:25'),
(5, 2, NULL, NULL, 200.00, 1000.00, 0, '2019-11-22 07:09:11'),
(6, NULL, 5, 1, 0.00, 1650.00, 0, '2019-12-02 12:08:11'),
(7, NULL, 5, 1, 0.00, 502.00, 0, '2019-12-02 14:31:38'),
(8, NULL, 5, 1, 0.00, 1010.00, 0, '2019-12-02 14:36:54'),
(9, NULL, 5, 1, 0.00, 857.00, 0, '2019-12-02 14:43:40'),
(10, NULL, 5, 1, 0.00, 857.00, 0, '2019-12-02 14:45:01'),
(11, NULL, 5, 1, 0.00, 500.00, 0, '2019-12-02 14:47:36'),
(12, NULL, 5, 1, 0.00, 655.00, 0, '2019-12-02 14:54:39'),
(13, NULL, 5, 1, 0.00, 355.00, 0, '2019-12-02 14:56:06'),
(14, NULL, 5, 1, 0.00, 502.00, 0, '2019-12-02 14:58:29'),
(15, NULL, 5, 1, 0.00, 1500.00, 0, '2019-12-02 15:01:38'),
(16, NULL, 5, 1, 0.00, 355.00, 0, '2019-12-02 15:03:43'),
(17, NULL, 5, 1, 0.00, 500.00, 0, '2019-12-02 15:04:59'),
(18, NULL, 5, 1, 0.00, 355.00, 0, '2019-12-02 15:06:04'),
(19, NULL, 5, 1, 0.00, 502.00, 0, '2019-12-02 15:07:17'),
(20, NULL, 5, 1, 0.00, 150.00, 0, '2019-12-02 15:12:12'),
(21, NULL, 5, 1, 0.00, 650.00, 0, '2019-12-02 15:13:05'),
(22, NULL, 5, 1, 0.00, 5312.00, 0, '2019-12-02 15:15:00'),
(23, NULL, 5, 1, 0.00, 16000.00, 0, '2019-12-02 15:44:46'),
(24, NULL, 5, 1, 0.00, 12000.00, 0, '2019-12-02 15:47:47'),
(25, NULL, 5, 1, 0.00, 50000.00, 0, '2019-12-02 15:51:38'),
(26, NULL, 5, 1, 0.00, 1500.00, 0, '2019-12-05 15:59:28'),
(27, NULL, 5, 1, 0.00, 1800.00, 0, '2019-12-05 16:02:12'),
(28, NULL, 5, 1, 0.00, 650.00, 0, '2019-12-06 09:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_details`
--

CREATE TABLE `tbl_sale_details` (
  `sale_details_id` int(10) NOT NULL,
  `sale_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `sale_name` varchar(50) NOT NULL,
  `sale_quantity` varchar(10) NOT NULL,
  `sale_unit_total` float(10,2) NOT NULL,
  `sale_total` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sale_details`
--

INSERT INTO `tbl_sale_details` (`sale_details_id`, `sale_id`, `product_id`, `sale_name`, `sale_quantity`, `sale_unit_total`, `sale_total`) VALUES
(2, 2, 9, 'Fashion Backpack', '1', 8000.00, 8000.00),
(3, 3, 5, 'White Printed Shirt', '1', 355.00, 355.00),
(4, 3, 6, 'Casual Shirt', '1', 655.00, 655.00),
(5, 4, 19, 'Android Mobile', '1', 10000.00, 10000.00),
(6, 5, 25, 'Watch', '1', 900.00, 900.00),
(7, 5, 23, 'T- Shirt', '1', 300.00, 300.00),
(8, 6, 1, 'T- Shirt', '1', 150.00, 150.00),
(9, 6, 3, 'Shoe', '1', 1500.00, 1500.00),
(10, 7, 4, 'Formal Blue Shirt', '1', 502.00, 502.00),
(11, 8, 5, 'White Printed Shirt', '1', 355.00, 355.00),
(12, 8, 6, 'Casual Shirt', '1', 655.00, 655.00),
(13, 9, 4, 'Formal Blue Shirt', '1', 502.00, 502.00),
(14, 9, 5, 'White Printed Shirt', '1', 355.00, 355.00),
(15, 10, 4, 'Formal Blue Shirt', '1', 502.00, 502.00),
(16, 10, 5, 'White Printed Shirt', '1', 355.00, 355.00),
(17, 11, 2, 'Jeans', '1', 500.00, 500.00),
(18, 12, 6, 'Casual Shirt', '1', 655.00, 655.00),
(19, 13, 5, 'White Printed Shirt', '1', 355.00, 355.00),
(20, 14, 4, 'Formal Blue Shirt', '1', 502.00, 502.00),
(21, 15, 3, 'Shoe', '1', 1500.00, 1500.00),
(22, 16, 5, 'White Printed Shirt', '1', 355.00, 355.00),
(23, 17, 2, 'Jeans', '1', 500.00, 500.00),
(24, 18, 5, 'White Printed Shirt', '1', 355.00, 355.00),
(25, 19, 4, 'Formal Blue Shirt', '1', 502.00, 502.00),
(26, 20, 1, 'T- Shirt', '1', 150.00, 150.00),
(27, 21, 1, 'T- Shirt', '1', 150.00, 150.00),
(28, 21, 2, 'Jeans', '1', 500.00, 500.00),
(29, 22, 1, 'T- Shirt', '2', 150.00, 300.00),
(30, 22, 2, 'Jeans', '1', 500.00, 500.00),
(31, 22, 3, 'Shoe', '2', 1500.00, 3000.00),
(32, 22, 4, 'Formal Blue Shirt', '1', 502.00, 502.00),
(33, 22, 5, 'White Printed Shirt', '1', 355.00, 355.00),
(34, 22, 6, 'Casual Shirt', '1', 655.00, 655.00),
(35, 23, 15, 'Sharee', '1', 16000.00, 16000.00),
(36, 24, 24, 'Sharee', '1', 12000.00, 12000.00),
(37, 25, 18, 'Printed Sharee', '1', 14000.00, 14000.00),
(38, 25, 15, 'Sharee', '1', 16000.00, 16000.00),
(39, 25, 17, 'Red Sharee', '1', 20000.00, 20000.00),
(40, 26, 3, 'Shoe', '1', 1500.00, 1500.00),
(41, 27, 32, 'Classical Stripped polo', '1', 1800.00, 1800.00),
(42, 28, 1, 'T- Shirt', '1', 150.00, 150.00),
(43, 28, 2, 'Jeans', '1', 500.00, 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(7) NOT NULL,
  `manufacturing_id` int(5) NOT NULL,
  `employee_cost` float(10,2) NOT NULL,
  `marketing_cost` float(10,2) NOT NULL,
  `utility_cost` float(10,2) NOT NULL,
  `product_delivery_cost` float(10,2) NOT NULL,
  `other_cost` float(10,2) NOT NULL,
  `service_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `manufacturing_id`, `employee_cost`, `marketing_cost`, `utility_cost`, `product_delivery_cost`, `other_cost`, `service_note`) VALUES
(1, 2, 15.00, 7.00, 3.00, 5.00, 5.00, '<p>Total Product Cost</p>'),
(2, 3, 25.00, 15.00, 5.00, 5.00, 5.00, '<p>Total Cost</p>'),
(3, 1, 12.00, 3.00, 5.00, 5.00, 5.00, ''),
(4, 4, 5.00, 5.00, 5.00, 5.00, 5.00, ''),
(5, 5, 3.00, 3.00, 2.00, 22.00, 1.00, ''),
(6, 6, 4.00, 2.00, 4.00, 5.00, 2.00, ''),
(7, 7, 78.00, 5.00, 4.00, 64.00, 3.00, ''),
(8, 8, 3000.00, 32.00, 12.00, 6.00, 450.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(2) NOT NULL,
  `shop_due` float(10,2) NOT NULL,
  `shop_name` varchar(30) NOT NULL,
  `shop_image` varchar(200) NOT NULL,
  `shop_address` text NOT NULL,
  `shop_mobile_number` varchar(11) NOT NULL,
  `shop_email` varchar(50) NOT NULL,
  `shop_password` varchar(64) NOT NULL,
  `shop_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shop_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_due`, `shop_name`, `shop_image`, `shop_address`, `shop_mobile_number`, `shop_email`, `shop_password`, `shop_date_time`, `shop_status`) VALUES
(1, 0.00, 'Aree', 'img/shop_image/virtual_assitant_thumb.jpg', '<p>Shop: 71, New Market Avenue, Dhaka 1216</p>', '01711000000', 'admin@evis.com', 'ibranarnov', '2019-10-20 18:32:04', 1),
(2, 200.00, 'Bhai Bhai', 'img/shop_image/c7f70650c489d04dfdc24e99dfabfa38_thumb.jpg', '', '01718287698', 'bhai@gmail.com', '111111', '2019-11-02 13:39:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop_transaction`
--

CREATE TABLE `tbl_shop_transaction` (
  `transaction_id` int(10) NOT NULL,
  `shop_id` int(2) NOT NULL,
  `balance` float(10,2) NOT NULL,
  `receive` float(10,2) NOT NULL,
  `due` float(10,2) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(3) NOT NULL,
  `category_id` int(3) NOT NULL,
  `subcategory_name` varchar(30) NOT NULL,
  `subcategory_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `category_id`, `subcategory_name`, `subcategory_status`) VALUES
(1, 1, 'Uncategorized', 0),
(2, 2, 'T-Shirt', 1),
(3, 2, 'Polos', 1),
(4, 2, 'Shirts', 1),
(5, 2, 'Trousers', 1),
(6, 2, 'Jeans', 1),
(7, 2, 'Innerwear', 1),
(8, 2, 'Sportswear', 1),
(9, 3, 'Saree', 1),
(10, 3, 'Shalwar Kameez', 1),
(11, 3, 'Unstitched Fabric', 1),
(12, 3, 'Wedding Wear', 1),
(13, 3, 'Kurtis', 1),
(14, 4, 'Mobile', 1),
(15, 4, 'Tablet', 1),
(16, 4, 'Laptop', 1),
(17, 4, 'DSLR', 1),
(18, 2, 'Footwear', 1),
(19, 6, 'Analog', 1),
(20, 6, 'Smart', 1),
(21, 5, 'Office', 1),
(22, 5, 'Business', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `supplier_id` int(3) NOT NULL,
  `supplier_due` float(10,2) NOT NULL DEFAULT '0.00',
  `supplier_name` varchar(50) NOT NULL,
  `agent_name` varchar(50) NOT NULL,
  `supplier_email` varchar(50) NOT NULL,
  `supplier_password` varchar(64) NOT NULL,
  `supplier_mobile` varchar(11) NOT NULL,
  `supplier_image` varchar(200) NOT NULL,
  `supplier_address` varchar(200) NOT NULL,
  `supplier_note` text,
  `supplier_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplier_id`, `supplier_due`, `supplier_name`, `agent_name`, `supplier_email`, `supplier_password`, `supplier_mobile`, `supplier_image`, `supplier_address`, `supplier_note`, `supplier_status`) VALUES
(1, 4000.00, 'M/S LabTrio', 'Mr. Anonda', '', '', '01718283476', '', '', '', 1),
(2, 8500.00, 'NR Group', 'Mr. Byomkesh', '', '', '01716384958', 'img/supplier_image/CNRG01_thumb.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_transaction`
--

CREATE TABLE `tbl_supplier_transaction` (
  `transaction_id` int(10) NOT NULL,
  `supplier_id` int(3) NOT NULL,
  `balance` float(10,2) NOT NULL,
  `paid` float(10,2) NOT NULL,
  `due` float(10,2) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_supplier_transaction`
--

INSERT INTO `tbl_supplier_transaction` (`transaction_id`, `supplier_id`, `balance`, `paid`, `due`, `time`) VALUES
(1, 1, 500.00, 500.00, 0.00, '2019-10-26 14:09:05'),
(2, 1, 5000.00, 1000.00, 4000.00, '2019-10-26 17:12:48'),
(3, 1, 50000.00, 50000.00, 4000.00, '2019-10-26 17:28:58'),
(4, 2, 4000.00, 500.00, 3500.00, '2019-10-26 18:15:47'),
(5, 2, 50000.00, 45000.00, 8500.00, '2019-10-26 18:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `task_id` int(5) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `task_name` varchar(200) NOT NULL,
  `task_start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`task_id`, `employee_id`, `task_name`, `task_start_time`, `task_status`) VALUES
(1, 3, 'Campaign Manager', '2019-10-20 18:24:37', 1),
(2, 3, 'Campaign Manager', '2019-10-20 18:58:33', 1),
(3, 3, 'Campaign Manager', '2019-11-02 06:26:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `price` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE `tbl_year` (
  `year_id` int(2) NOT NULL,
  `year_name` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`year_id`, `year_name`) VALUES
(1, '2016'),
(2, '2017'),
(3, '2018'),
(4, '2019'),
(5, '2020'),
(6, '2021'),
(7, '2022'),
(8, '2023'),
(9, '2024'),
(10, '2025'),
(11, '2026'),
(12, '2027'),
(13, '2028'),
(14, '2029');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_campaign`
--
ALTER TABLE `tbl_campaign`
  ADD PRIMARY KEY (`campaign_id`);

--
-- Indexes for table `tbl_cashbook`
--
ALTER TABLE `tbl_cashbook`
  ADD PRIMARY KEY (`cashbook_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `tbl_expense_category`
--
ALTER TABLE `tbl_expense_category`
  ADD PRIMARY KEY (`expense_category`);

--
-- Indexes for table `tbl_income`
--
ALTER TABLE `tbl_income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `tbl_income_category`
--
ALTER TABLE `tbl_income_category`
  ADD PRIMARY KEY (`income_category`);

--
-- Indexes for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `tbl_manufacturing`
--
ALTER TABLE `tbl_manufacturing`
  ADD PRIMARY KEY (`manufacturing_id`);

--
-- Indexes for table `tbl_marketing`
--
ALTER TABLE `tbl_marketing`
  ADD PRIMARY KEY (`marketing_id`);

--
-- Indexes for table `tbl_month`
--
ALTER TABLE `tbl_month`
  ADD PRIMARY KEY (`month_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tbl_planning`
--
ALTER TABLE `tbl_planning`
  ADD PRIMARY KEY (`planning_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `tbl_sale_details`
--
ALTER TABLE `tbl_sale_details`
  ADD PRIMARY KEY (`sale_details_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_shop_transaction`
--
ALTER TABLE `tbl_shop_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tbl_supplier_transaction`
--
ALTER TABLE `tbl_supplier_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- Indexes for table `tbl_year`
--
ALTER TABLE `tbl_year`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_campaign`
--
ALTER TABLE `tbl_campaign`
  MODIFY `campaign_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cashbook`
--
ALTER TABLE `tbl_cashbook`
  MODIFY `cashbook_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `chat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  MODIFY `delivery_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  MODIFY `expense_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_expense_category`
--
ALTER TABLE `tbl_expense_category`
  MODIFY `expense_category` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_income`
--
ALTER TABLE `tbl_income`
  MODIFY `income_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_income_category`
--
ALTER TABLE `tbl_income_category`
  MODIFY `income_category` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  MODIFY `manufacturer_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_manufacturing`
--
ALTER TABLE `tbl_manufacturing`
  MODIFY `manufacturing_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_marketing`
--
ALTER TABLE `tbl_marketing`
  MODIFY `marketing_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_month`
--
ALTER TABLE `tbl_month`
  MODIFY `month_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_planning`
--
ALTER TABLE `tbl_planning`
  MODIFY `planning_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  MODIFY `salary_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  MODIFY `sale_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_sale_details`
--
ALTER TABLE `tbl_sale_details`
  MODIFY `sale_details_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_shop_transaction`
--
ALTER TABLE `tbl_shop_transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplier_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_supplier_transaction`
--
ALTER TABLE `tbl_supplier_transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `task_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_year`
--
ALTER TABLE `tbl_year`
  MODIFY `year_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
