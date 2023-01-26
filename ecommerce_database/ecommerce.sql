-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 26, 2023 at 06:26 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_link` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `category_image`, `category_link`) VALUES
(1, 'perfumes', 'Men and Woman fragrances. \r\nSmells fresh and unique\r\nbecause our secret is experimentation.\r\n', '/SSP1/FortuneNdlovu_Ecommerce/img/fragrance.jpg', '/SSP1/FortuneNdlovu_Ecommerce/perfumes.php'),
(2, 'helmets', 'The best overall helmets.\r\nGet your very own that lasts\r\nlong because the material is\r\nstrong and unique.', '/SSP1/FortuneNdlovu_Ecommerce/img/helmet.jpg', '/SSP1/FortuneNdlovu_Ecommerce/helmets.php'),
(3, 'cups', 'Perfectly molded cups, for your morning coffee. Get your very own cup. ', '/SSP1/FortuneNdlovu_Ecommerce/img/cups.jpg', '/SSP1/FortuneNdlovu_Ecommerce/cups.php'),
(4, 'books', 'Interesting books that would have you up late at night reading. Get yourself\r\na book that you can add to your collection or to start your collection.', '/SSP1/FortuneNdlovu_Ecommerce/img/books.jpg', '/SSP1/FortuneNdlovu_Ecommerce/books.php'),
(5, 'crystal glass', 'A perfectly crafted crystal glass, for your morning glass of water or any other \r\nglass item you can think of\r\nwe have got it.', '/SSP1/FortuneNdlovu_Ecommerce/img/glass.jpg', '/SSP1/FortuneNdlovu_Ecommerce/cglass.php'),
(6, 'movies', 'The most watched DVD movies that are cool.\r\nGet yourself a full collection of your favourite childhood DVD\'s to watch anytime.\r\nWe have what you need.', '/SSP1/FortuneNdlovu_Ecommerce/img/movies.jpg', '/SSP1/FortuneNdlovu_Ecommerce/movies.php');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_brandname` varchar(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `category_product_featured` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_price`, `product_brandname`, `product_image`, `product_description`, `category_product_featured`) VALUES
(1, 'Fragrance', '200', 'fragrance', '/SSP1/FortuneNdlovu_Ecommerce/img/fragrance.jpg', 'Fresh fragrance', 'fragrance'),
(2, 'Lux', '300', 'lux', '/SSP1/FortuneNdlovu_Ecommerce/img/lux.jpg', 'Lux for luxery', 'fragrance'),
(3, 'Libre', '300', 'libre', '/SSP1/FortuneNdlovu_Ecommerce/img/libre.png', 'Libre for reliable freshness.', 'fragrance'),
(4, 'Eternity', '400', 'eternity', '/ssp1/FortuneNdlovu_Ecommerce/img/eternity.jpg', 'Eternity fragrance greatness.', 'fragrance'),
(5, 'Chanel', '600', 'chanel', '/ssp1/FortuneNdlovu_Ecommerce/img/chanel.jpg', 'Chanel rich long-lasting freshness', 'fragrance'),
(6, 'Pinkvilla', '300', 'pinkvilla', '/ssp1/FortuneNdlovu_Ecommerce/img/pinkvilla.jpg', 'Pinkvilla for the win.', 'fragrance'),
(7, 'Azzurri GAA Helmet', '20', 'Azzurri ', '/SSP1/FortuneNdlovu_Ecommerce/img/azzurri.jpeg', 'Comfortable GAA Helmet', 'helmet'),
(8, 'Azzurri Custom Helmet', '40', 'azzurri', '/SSP1/FortuneNdlovu_Ecommerce/img/azzurriCustom.jpg', 'Get your own custom GAA Helmet', 'helmet'),
(9, 'Cooper Helmet', '20', 'cooper', '/SSP1/FortuneNdlovu_Ecommerce/img/cooperHelmets.jpeg', 'Comfortable grip to the head.', 'helmet'),
(10, 'Green predator', '30', 'predator', '/SSP1/FortuneNdlovu_Ecommerce/img/predator.jpg', 'Predator green helmet', 'helmet'),
(11, 'Off-White ', '45', 'predator', '/SSP1/FortuneNdlovu_Ecommerce/img/offWhite Predator.jpg', 'Off-White Helmet', 'helmet'),
(12, 'Orange Predator', '20', 'Orange Predator', '/SSP1/FortuneNdlovu_Ecommerce/img/orangepredator.jpg', 'Orange Predator', 'helmet'),
(13, 'Cup', '5', 'cup', '/SSP1/FortuneNdlovu_Ecommerce/img/cups.jpg', 'Cup for coffee', 'cup'),
(15, 'cuppa', '5', 'cuppa', '/SSP1/FortuneNdlovu_Ecommerce/img/cups.jpg', 'cuppa for you', 'cup'),
(16, 'form image', '0', 'fi', '/SSP1/FortuneNdlovu_Ecommerce/img/formImg.jpg', 'image of a cart, phone cards and green tick.', ''),
(17, 'Off White Cup', '40', 'offwhite', '/SSP1/FortuneNdlovu_Ecommerce/img/offwhitemug.jpg', 'Be your self', 'cup'),
(18, 'Orange Cup', '40', 'Orange cup', '/SSP1/FortuneNdlovu_Ecommerce/img/orangecup.jpg', 'Orange cup for you', 'cup'),
(20, 'Random Book', '10', 'book', '/SSP1/FortuneNdlovu_Ecommerce/img/books.jpg', 'Intresting read', 'book'),
(21, 'Wimpy Kid', '12', 'wimpy kid', '/SSP1/FortuneNdlovu_Ecommerce/img/wimpykid.jpg', 'Quick read for you', 'book'),
(22, 'Wimpy kid', '12', 'wimpy kid ', '/SSP1/FortuneNdlovu_Ecommerce/img/wimpykid2.jpg', 'Also a quick read', 'book'),
(23, 'HTML ', '20', 'HTML', '/SSP1/FortuneNdlovu_Ecommerce/img/htmlbook.jpg', 'Learn HTML quick', 'book'),
(24, 'CSS', '20', 'css', '/SSP1/FortuneNdlovu_Ecommerce/img/css.jpg', 'Learn css', 'book'),
(25, 'JavaScript', '20', 'js', '/SSP1/FortuneNdlovu_Ecommerce/img/javascript.jpg', 'Learn JavaScript quick', 'book'),
(26, 'Glass', '30', 'glass', '/SSP1/FortuneNdlovu_Ecommerce/img/glass.jpg', 'Clear glass', 'glass'),
(27, 'Gradient Glass', '10', 'Gradient Glass', '/SSP1/FortuneNdlovu_Ecommerce/img/gradientglass.jpg', 'Cool glass', 'glass'),
(28, 'Wine Glass', '30', 'wine', '/SSP1/FortuneNdlovu_Ecommerce/img/wineglass.jpg', 'Wine glass for you', 'glass'),
(29, 'Wine Glass', '20', 'wg', '/SSP1/FortuneNdlovu_Ecommerce/img/wineglass.jpg', 'Perfect glass', 'glass'),
(30, 'Window', '20', 'window', '/SSP1/FortuneNdlovu_Ecommerce/img/window.jpeg', 'Just a window', 'glass'),
(31, 'Gradient Glass', '23', 'Gradient Glass', '/SSP1/FortuneNdlovu_Ecommerce/img/gradientglass.jpg', 'Cool glass', 'glass'),
(32, 'Avatar ', '5', 'avatar', '/SSP1/FortuneNdlovu_Ecommerce/img/avatarDVD.jpg', 'Avatar DVD', 'movie'),
(33, 'BadBoys', '5', 'bd', '/SSP1/FortuneNdlovu_Ecommerce/img/badboysDVD.jpg', 'BadBoys DVD', 'movie'),
(34, 'CatFish', '5', 'CatFish', '/SSP1/FortuneNdlovu_Ecommerce/img/CATFISHDVD.jpg', 'CatFish DVD', 'movie'),
(35, 'Cinderella', '5', 'Cinderella', '/SSP1/FortuneNdlovu_Ecommerce/img/cinderellaDVD.jpg', 'Cinderella DVD', 'movie'),
(36, 'Shrek', '5', 'Shrek', '/SSP1/FortuneNdlovu_Ecommerce/img/SHREKDVD.jpg', 'Shrek DVD', 'movie'),
(37, 'Cars', '5', 'Cars', '/SSP1/FortuneNdlovu_Ecommerce/img/CARSDVD.jpg', 'Cars DVD', 'movie');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'john', 'd6b4e84ee7f31d88617a6b60421451272ebf1a3a');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
