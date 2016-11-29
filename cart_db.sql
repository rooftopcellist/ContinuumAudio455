-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2016 at 02:29 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codexworld`
--



-- Drop Statements

DROP TABLE IF EXISTS products1;
DROP TABLE IF EXISTS order_items1;
DROP TABLE IF EXISTS orders1;
DROP TABLE IF EXISTS customers1;
DROP TABLE IF EXISTS Ca_Reg_User;
DROP TABLE IF EXISTS employee;




-- --------------------------------------------------------

-- Employee Table Entry

create table Ca_Reg_User
  (firstName      varchar(25),
   lastName       varchar(25),
   emailAddr      varchar(25) not null,
   pw             varchar(255) not null,
   manager   	  boolean,
   folder		  varchar(25),
   PRIMARY KEY (emailAddr)
  ) ENGINE=INNODB;
  
--   INSERT INTO Ca_Reg_User (firstName, lastName, emailAddr, pw, manager,folder) VALUES
--   	('Christian', 'Adams', 'rooftopcellist@gmail.com','reverse','1','rooftopcellistgmailcom');
-- INSERT INTO Ca_Reg_User (firstName, lastName, emailAddr, pw, manager,folder) VALUES
--   ('Alejandro', 'Pena', 'alejo95_02@hotmail.com','reverse','1','alejo95_02hotmailcom');

create table employee
	(e_id		int not null AUTO_INCREMENT,
	 fname		varchar(25) not null,
	 lname		varchar(25) not null,
	 address	varchar(35),
	 city		varchar(20),
	 state		varchar(20),
	 zip		numeric(5,0),
	 phone		numeric(10),
	 email		varchar(40),
	 manager 	boolean,
	 primary key (e_id)
	) ENGINE=INNODB;
	ALTER TABLE employee AUTO_INCREMENT=10000;

  INSERT INTO employee (fname, lname, address, city, state, zip, phone, email) VALUES
  	('Christian', 'Adams', '5006 Carleton Dr.', 'Wilmington', 'NC', 28403, 9192185080, 'rooftopcellist@gmail.com');
 INSERT INTO employee (fname, lname, address, city, state, zip, phone, email) VALUES
  ('Alejandro', 'Pena', '2608 oglesby dr', 'Wilmington', 'NC', 28403, 9102736388, 'alejo95_02.com');








--
-- Table structure for table `customers1`
--

CREATE TABLE IF NOT EXISTS `customers1` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Dumping data for table `customers1`
--

INSERT INTO `customers1` (`id`, `name`, `email`, `phone`, `address`, `created`, `modified`, `status`) VALUES
(1, 'Alejandro', 'alejo95_02@gmail.com', '9102736388', 'Wilmington, NC, USA', '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1');

INSERT INTO `customers1` (`id`, `name`, `email`, `phone`, `address`, `created`, `modified`, `status`) VALUES
(2, 'Missy', 'Biggers', '9197836388', 'Wilmington, NC, USA', '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders1`
--

CREATE TABLE IF NOT EXISTS `orders1` (
  `id` int(11) NOT NULL,
  `e_id` 		int NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items1`
--

CREATE TABLE IF NOT EXISTS `order_items1` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products1`
--

CREATE TABLE IF NOT EXISTS `products1` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products1`
--

INSERT INTO `products1` (`id`, `name`, `description`, `price`, `created`, `modified`, `status`) VALUES
(1, 'TwinVer.jpeg', 'Amp Brand: Fender 1000 watts', 75.00, '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1'),
(2, 'AmpegSVT.jpeg', 'Amp Brand: Ampeg. 2000 watts', 100.00, '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers1`
--
ALTER TABLE `customers1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders1`
--
ALTER TABLE `orders1`
  ADD PRIMARY KEY (`id`), ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items1`
--
ALTER TABLE `order_items1`
  ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products1`
--
ALTER TABLE `products1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers1`
--
ALTER TABLE `customers1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders1`
--
ALTER TABLE `orders1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_items1`
--
ALTER TABLE `order_items1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products1`
--
ALTER TABLE `products1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders1`
--
ALTER TABLE `orders1`
ADD CONSTRAINT `orders1_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers1` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items1`
--
ALTER TABLE `order_items1`
ADD CONSTRAINT `order_items1_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders1` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
