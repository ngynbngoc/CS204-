-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 18, 2023 at 02:07 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itec_shopping-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `total_price` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_list`
--

DROP TABLE IF EXISTS `cart_list`;
CREATE TABLE IF NOT EXISTS `cart_list` (
  `card_id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  KEY `card_id_fk` (`card_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `seller_id_fk` (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_img`, `price`, `description`, `seller_id`) VALUES
(1, 'GLOSS BOMB HEAT UNIVERSAL LIP LUMINIZER + PLUMPER- Glass Slipper', 'images/image1.png', 26, 'FOR THE FULL EFFECT.\r\nPLUMPER-LOOKING LIPS, IRRESISTIBLE SHINE.', 1),
(2, 'INVISIMATTE INSTANT SETTING + BLOTTING POWDER', 'images/image2.png', 36, 'VERSATILE FINISHING POWDER FOR ALL.\r\nBLURS, CONTROLS SHINE, EXTENDS MAKEUP WEAR.', 1),
(3, 'FLYLINER LONGWEAR LIQUID EYELINER- In Big Truffle', 'images/image3.png', 24, 'SUPER-FLEX TIP, HYPER-SATURATED COLOR.\r\nFADEPROOF, WATER-RESISTANT LONGWEAR.', 1),
(4, 'MEGALAST LIQUID CATSUIT MATTE LIPSTICK- Give Me Mocha', 'images/image4.png', 5.49, 'Made with glammed out superpowers, it goes on glossy yet transforms into a high – pigmented matte finish with some serious staying power.', 2),
(5, 'MAGICAL FALSE LASHES', 'images/image5.png', 5.94, 'Made from the softest synthetic fibers with a flexible band for lightweight, comfortable wear, these lashes are easy to wear all day long.', 2),
(6, 'FIGHT DIRTY DETOX SETTING SPRAY', 'images/image6.png', 6.99, 'Just spray it on over your makeup and the ultra-fine mist sets your makeup while leaving a natural finish. Formulated with a nourishing blend of ingredients known to help clarify and tone the skin, this setting spray helps keep your skin clear and your makeup in place.', 2),
(7, 'Midnight Shadow palette- midnight snack', 'images/image7.png', 24, 'Create your own vivid illusions with this mix of six mattes and shimmers that you can wear from daylight to midnight. each curated palette is inspired by ari’s signature eye looks and features talc-free, ultra-blendable, silky formulas that deliver a lightweight feel and maximum color payoff. creamy, smooth application delivers optimal wear. the creative possibilities are limitless.', 3),
(8, 'Interstellar Highlighter Topper- miss jupiter', 'images/image8.png', 22, 'get a next level highlight with this weightless, multi-dimensional topper that can be used on your cheeks, eyes, and body. infused with vegetable-derived emollients, our silky, creamy powder formula glides on like a second skin, then melts upon application for a dewy, luminous highlight that stays smooth no matter where you wear it.', 3),
(9, 'OnCollar Matte Lipstick- wine n dine', 'images/image9.png', 19, 'This ultra-smooth matte formula glides on lips like a dream and delivers instant, rich, long lasting color that stays comfortably in place without drying out your pout.', 3),
(10, 'PSYCHEDELIC CIRCUS PALETTE', 'images/image10.png', 60, 'This 21-pan artistry palette will allow you to complete a full diva galaxy look with psychedelic shifting shimmers, glitters, and colorful mattes. This vortex of color rectangle palette sends you into an altered state preparing you for what is inside. 5 shimmers, 14 matte artistry shadows, and 2 mattes with shimmer.', 4),
(11, 'MAGIC STAR™ CONCEALER- ', 'images/image11.png', 12, 'Our unique creamy, high coverage liquid concealer formula comes in over 48 shades! What does it do? Helps even out skin tone. Has 20% pigment and can cover tattoos. The formula helps to reduce the appearance of fine lines and wrinkles. Increased wear time and a self-setting effect keeps you looking flawless for hours.', 4),
(12, 'STONED LIP PALM', 'images/image12.png', 18, 'Our sheer lip balm glides on like butter to give you a soft silky flush. Infused with Sativa Seed oil to elevate your lips hydration and suppleness. The satin finish offers a shine so subtle, you’ll look exactly like yourself, just enhanced. Perfect for laid back beauty. And as always, vegan & cruelty-free.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `id` int NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `seller_name`, `rate`) VALUES
(1, 'Fenty beauty', 4.9),
(2, 'wet n wild', 4.5),
(3, 'r.e.m beauty', 4.8),
(4, 'Jeffree Star Cosmetics', 4.9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cart_list`
--
ALTER TABLE `cart_list`
  ADD CONSTRAINT `cart_list_ibfk_1` FOREIGN KEY (`card_id`) REFERENCES `cart` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_list_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
