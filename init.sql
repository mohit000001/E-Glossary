-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2008 at 08:42 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ngpmarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_system`
--

CREATE TABLE IF NOT EXISTS `login_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text,
  `userid` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `login_system`
--

INSERT INTO `login_system` (`id`, `login`, `userid`) VALUES
(17, 'bfasda6s4f5sd64g5dfghf15h45fgh15fg1hb,mohit@yahoo.com', 'mohit@yahoo.com'),
(19, 'bfasda6s4f5sd64g5dfghf15h45fgh15fg1hb,mohit@yahoo.com', 'mohit@yahoo.com'),
(21, 'bfasda6s4f5sd64g5dfghf15h45fgh15fg1hb,mohit@yahoo.com', 'mohit@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` text,
  `pro_qua` text,
  `address` text,
  `total` text,
  `pay_status` text,
  `pay_method` text,
  `dev_status` text,
  `order_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `pro_qua`, `address`, `total`, `pay_status`, `pay_method`, `dev_status`, `order_date`) VALUES
(2, 'raj167@gmail.com', ',1 kg gehu=4,1 kg rise=5', 'bulding no 20 pune maharastra india 330084', '313', 'done', 'offline', 'dilver successfully', '2008-08-21 09:57:14'),
(3, 'raj167@gmail.com', '1 kg sugar=15,', 'bulding no 20 pune maharastra india 330084', '1284', 'payment returned', 'offline', 'order cancelled', '2008-08-21 10:03:40'),
(4, 'raj167@gmail.com', '1 kg sugar=15', 'bulding no 20 pune maharastra india 330084', '1284', 'payment returned', 'online', 'order cancelled', '2008-08-21 10:05:11'),
(5, 'raj167@gmail.com', '1 kg mung dal=1', 'bulding no 20 pune maharastra india 330084', '176', 'done', 'offline', 'dilver successfully', '2008-08-21 10:06:39'),
(9, 'raj167@gmail.com', ',1 kg gehu=5,1 kg rise=13', 'bulding no 20 pune maharastra india 330084', '695', 'done', 'offline', 'dilver successfully', '2008-08-21 10:11:29'),
(14, 'raj167@gmail.com', 'bajaj hair oli=15,dove shampo=7,parashoot hair oli=6', 'bulding no 20 pune maharastra india 330084', '1034', 'payment returned', 'offline', 'order cancelled', '2008-08-21 10:21:13'),
(15, 'raj167@gmail.com', '1 kg gehu=1,1 kg rise=7,500gm red leban tea=14,500gm red leban tea=14,1 kg sugar=15,1 kg mung dal=7,1 kg rise=7,dettole=5,vimbar=13,dettole=5,wheel=14,fasiya face soap=6,harpick=4,parashoot hair oli=1,bhakti agarbatee=14,parle-g=14', 'sfsdbulding no 20 sadfsfsfsdfsdf', '10314', 'done', 'online', 'dilver successfully', '2008-08-22 01:30:52'),
(16, 'raj167@gmail.com', '1 kg gehu=1,1 kg rise=7,500gm red leban tea=14,500gm red leban tea=14,1 kg sugar=15,1 kg mung dal=7,1 kg rise=7,dettole=5,vimbar=13,dettole=5,wheel=14,fasiya face soap=6,harpick=4,parashoot hair oli=1,bhakti agarbatee=14,parle-g=14', 'sfsdbulding no 20 sadfsfsfsdfsdf', '10314', 'done', 'offline', 'dilver successfully', '2008-08-22 01:32:11'),
(17, 'raj167@gmail.com', '1 kg gehu=1,1 kg rise=1', 'bulding no 167 munakjsjd dsfsdf', '67', 'done', 'online', 'dilver successfully', '2008-08-22 02:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` text,
  `product_dis` text,
  `product_price` int(11) DEFAULT NULL,
  `product_avail` text,
  `off_price` text,
  `product_cat` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_dis`, `product_price`, `product_avail`, `off_price`, `product_cat`) VALUES
(2, '1 kg gehu', 'pure shudh gehu of india.no any dout to buy.', 22, '480', '26', 'kitchen'),
(3, '1 kg rise', 'pure quality rise of india and directly coming from farm.no any dout to buy.', 45, '744', '60', 'kitchen'),
(4, '1 kg mung dal', 'haldiram''s orignal mung dal best product in market', 109, '120', '120', 'kitchen'),
(5, '1 kg sugar', 'pure sugar no any health dout.no any dout to buy.', 42, '1680', '48', 'kitchen'),
(6, '500gm red leban tea', 'orignal tea of assam must buy best product ever.', 250, '444', '280', 'kitchen'),
(7, 'dettole', 'a brand product of india which nearly used by 90.02% people', 25, '181', '30', 'bathroom'),
(8, 'wheel', 'a best larget product of india which nearly used by 90.02% people', 10, '323', '13', 'bathroom'),
(9, 'vimbar', 'a shoap for house use which nearly used by 90.02% people', 14, '452', '17', 'bathroom'),
(10, 'fasiya face soap', 'a very good shoap used only for face washing', 42, '74', '47', 'bathroom'),
(11, 'harpick', 'a smooth product used for toilate cleaning', 76, '36', '84', 'bathroom'),
(12, 'fortune', 'this is a food oli used healthly for house food', 88, '166', '93', 'room'),
(13, 'm. d. h. marchi', 'a powerfull masala packect', 12, '848', '17', 'room'),
(14, 'm. d. h. haldi', 'a powerfull masala packect', 10, '666', '12', 'room'),
(15, 'm. d. h. dhaniya', 'a powerfull masala packect', 10, '785', '12', 'room'),
(16, 'horlex', 'a strong healthy product for better protine power', 30, '124', '35', 'room'),
(17, 'parashoot hair oli', 'hair oli used to maintain the healthy hair', 15, '209', '18', 'house'),
(18, 'dove shampo', 'a powerfull shampo used for healthy hair', 62, '228', '75', 'house'),
(19, 'bajaj hair oli', 'the hair oli in india ever', 34, '410', '55', 'house'),
(20, 'bhakti agarbatee', 'a sented shmooth agarbtee for worship', 4, '1008', '12', 'house'),
(21, 'parle-g', 'parle -g g means genius', 5, '517', '8', 'house');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `userid` text,
  `password` text,
  `gender` text,
  `birth` date DEFAULT NULL,
  `tc` text,
  `address` text,
  `ac_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `userid`, `password`, `gender`, `birth`, `tc`, `address`, `ac_date`) VALUES
(6, 'rajshighaniya', 'raj167@gmail.com', 'rajisking', 'male', '2004-11-11', 'accepted', 'bulding no 1 dfgdf dfg dfgd fdg dfg', '2008-08-21 10:38:23'),
(7, 'mohitswami', 'mohit167@gmail.com', 'dgdfgdfg', 'male', '1997-02-11', 'accepted', 'fgdf dfgdfg fgfd dgdfg dfgdf dfgdfg', '2008-08-21 11:24:38'),
(8, 'sdfsdf', 'mohit@yahoo.com', 'mohitlove', 'male', '1997-11-11', 'accepted', 'pl.no 576 , hiwri nagar near power house nagpur, maharastra india 4400445', '2008-08-22 01:35:42'),
(9, 'gfhjg ghj hg', 'rohit@gmail.com', 'h fgh f', 'male', '1997-12-11', 'accepted', 'fcghfd dfgh fdx hdfghdf gdfh  fg', '2008-08-22 02:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `temp_profile`
--

CREATE TABLE IF NOT EXISTS `temp_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `userid` text NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `password` text NOT NULL,
  `tc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
