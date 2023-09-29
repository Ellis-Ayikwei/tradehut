-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4022:4022
-- Generation Time: Sep 29, 2023 at 06:41 AM
-- Server version: 8.0.32
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tradehut`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `attribute_id` int NOT NULL,
  `attribute_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attribute_id`, `attribute_name`) VALUES
(1, 'Color'),
(2, 'Size'),
(3, 'Material'),
(4, 'Voltage'),
(5, 'Wattage'),
(6, 'PlugType'),
(7, 'Weight'),
(8, 'Dimensions'),
(9, 'OperatingSystem'),
(10, 'Capacity'),
(11, 'Resolution'),
(12, 'Speed'),
(13, 'Style'),
(14, 'Pattern'),
(15, 'CPU	'),
(16, 'Storage Capacity'),
(17, 'RAM Capacity'),
(19, 'Generation');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `value_id` int NOT NULL,
  `attribute_id` int DEFAULT NULL,
  `value_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`value_id`, `attribute_id`, `value_name`) VALUES
(1, 1, 'Red'),
(2, 1, 'Blue'),
(3, 1, 'Green'),
(4, 1, 'Yellow'),
(5, 1, 'Black'),
(6, 1, 'White'),
(7, 1, 'Purple'),
(8, 1, 'Orange'),
(9, 1, 'Pink'),
(10, 1, 'Brown'),
(11, 1, 'Gray'),
(12, 2, 'Small'),
(13, 2, 'Medium'),
(14, 2, 'Large'),
(15, 2, 'XL'),
(16, 2, 'XXL'),
(17, 2, 'xsmall'),
(18, 3, 'Cotton'),
(19, 3, 'Polyester'),
(20, 3, 'Leather'),
(21, 3, 'Metal'),
(22, 3, 'Plastic'),
(23, 3, 'Wood'),
(24, 3, 'Glass'),
(25, 3, 'Ceramic'),
(26, 4, '110V'),
(27, 4, '220V'),
(28, 4, '240V'),
(29, 4, '12V'),
(30, 4, '24V'),
(31, 4, '48V'),
(32, 5, '100W'),
(33, 5, '200W'),
(34, 5, '300W'),
(35, 5, '500W'),
(36, 5, '64W'),
(37, 6, 'Type A'),
(38, 6, 'Type B'),
(39, 6, 'Type C'),
(40, 6, 'Type D'),
(41, 6, 'Type E'),
(42, 6, 'Type F'),
(43, 7, 'Type F'),
(44, 7, 'Type F'),
(45, 7, '0.5'),
(46, 7, '1'),
(48, 7, '1.5'),
(49, 7, '2'),
(51, 7, '2.5'),
(52, 7, '3'),
(53, 7, '4'),
(54, 7, '5'),
(55, 7, '10'),
(56, 7, '15'),
(57, 7, '20'),
(58, 7, '25'),
(59, 8, '25'),
(60, 8, '10x10x10 cm'),
(61, 8, '20x20x20 cm'),
(62, 8, '30x30x30 cm'),
(63, 8, '50x50x50 cm'),
(64, 9, 'Windows'),
(65, 9, 'macOS'),
(66, 9, 'Linux'),
(67, 9, 'Android'),
(68, 9, 'iOS'),
(69, 9, 'Chrome OS'),
(70, 10, '256GB'),
(71, 10, '512GB'),
(72, 10, '1TB'),
(73, 10, '2TB'),
(74, 10, '4TB'),
(75, 10, '2GB'),
(76, 10, '4GB'),
(77, 10, '8GB'),
(78, 10, '16GB'),
(79, 10, '32GB'),
(80, 10, '64GB'),
(81, 10, '128GB'),
(82, 11, '720p'),
(83, 11, '1080p'),
(84, 11, '4K'),
(85, 11, '8K'),
(86, 12, '1 GHz'),
(87, 12, '1.9 GHz'),
(88, 12, '2.0 GHz'),
(89, 12, '2.4 GHz'),
(90, 12, '3.0 GHz'),
(91, 12, '4.0 GHz'),
(92, 13, 'Casual'),
(93, 13, 'Formal'),
(94, 13, 'Sporty'),
(95, 13, 'Vintage'),
(96, 13, 'Bohemian'),
(97, 14, 'Solid'),
(98, 14, 'Striped'),
(99, 14, 'Floral'),
(100, 14, 'Checkered'),
(101, 14, 'Polka Dot'),
(102, 15, 'Intel Core i3'),
(103, 15, 'Intel Core i5'),
(104, 15, 'Intel Core i7'),
(105, 15, 'Intel Core i9'),
(106, 15, 'Intel Pentium'),
(107, 15, 'Intel Celeron'),
(108, 15, 'Intel Xeon'),
(109, 15, 'Intel Core 2 Duo'),
(110, 15, 'Intel Core 2 Quad'),
(111, 15, 'Intel Dual-Core Xeon'),
(112, 17, '3GB'),
(113, 17, '2GB'),
(114, 17, '4GB'),
(115, 17, '8GB'),
(116, 17, '16GB'),
(117, 17, '32GB'),
(118, 17, '64GB'),
(119, 17, '128GB');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int NOT NULL,
  `CategoryID` int DEFAULT NULL,
  `BrandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `CategoryID`, `BrandName`) VALUES
(1, 1, 'mtn '),
(2, 1, 'Cisco'),
(3, 1, 'Huawei'),
(4, 1, 'Netgear'),
(5, 1, 'TP-Link'),
(6, 1, 'D-Link'),
(7, 1, 'Linksys'),
(8, 1, 'Juniper Networks'),
(9, 1, 'Aruba (a Hewlett Packard Enterprise company)'),
(10, 1, 'Ubiquiti Networks'),
(11, 1, 'SonicWall'),
(12, 2, 'Dell'),
(13, 2, 'HP (Hewlett-Packard)'),
(14, 2, 'Lenovo'),
(15, 2, 'ASUS'),
(16, 2, 'Acer'),
(17, 2, 'Logitech'),
(18, 2, 'Microsoft (Surface)'),
(19, 2, 'Toshiba'),
(20, 2, ' MSI'),
(21, 2, 'Alienware (a subsidiary of Dell)'),
(22, 1, 'Belkin'),
(23, 1, 'Anker'),
(24, 1, 'Sony (headphones and accessories)'),
(25, 1, 'JBL'),
(26, 1, 'Bose'),
(27, 1, 'Sennheiser'),
(28, 1, 'Apple (accessories)'),
(29, 1, 'Samsung (accessories)'),
(30, 1, 'OtterBox'),
(31, 1, 'Incase'),
(32, 4, 'Samsung (appliances)'),
(33, 4, 'LG Electronics (appliances)'),
(34, 4, 'Whirlpool'),
(35, 4, 'Bosch'),
(36, 4, 'Electrolux'),
(37, 4, 'Panasonic (home appliances)'),
(38, 4, 'KitchenAid'),
(39, 4, 'GE Appliances'),
(40, 4, 'Dyson'),
(41, 4, 'Shark (vacuums and appliances)'),
(42, 5, 'Paper Mate'),
(43, 5, 'BIC'),
(44, 5, 'Sharpie'),
(45, 5, 'Pilot'),
(46, 5, 'Staedtler'),
(47, 5, 'Faber-Castell'),
(48, 5, 'Crayola'),
(49, 5, 'Moleskine'),
(50, 5, 'Avery'),
(51, 5, 'Post-it (3M)'),
(52, 6, ' Philips'),
(53, 6, 'Panasonic (electronics)'),
(54, 6, ' Sony (electronics)'),
(55, 6, 'General Electric (GE)'),
(56, 6, ' Siemens'),
(57, 6, 'Honeywell'),
(58, 6, 'Schneider Electric'),
(59, 6, 'ABB'),
(60, 6, 'Eaton'),
(61, 6, 'Emerson Electric'),
(62, 7, 'Nike'),
(63, 7, 'Adidas'),
(64, 7, 'Gucci'),
(65, 7, 'H&M'),
(66, 7, 'Zara'),
(67, 7, 'Levi\\\'s'),
(68, 7, 'Chanel'),
(69, 7, 'Prada'),
(70, 7, 'Ralph Lauren'),
(71, 7, 'Calvin Klein'),
(72, 8, 'DeWalt'),
(73, 8, 'Bosch (tools)'),
(74, 8, 'Makita'),
(75, 8, 'Milwaukee Tool'),
(76, 8, 'Stanley Black & Decker (Stanley, Black & Decker, Craftsman)'),
(77, 8, 'Ridgid'),
(78, 8, 'Snap-on'),
(79, 8, 'Hilti'),
(80, 8, 'Ryobi'),
(81, 8, ' Hitachi (now part of Metabo HPT)'),
(82, 9, 'AMD'),
(83, 9, 'NVIDIA'),
(84, 9, 'Texas Instruments (TI)'),
(85, 9, 'Broadcom'),
(86, 9, 'Micron'),
(87, 9, 'ON Semiconductor'),
(88, 9, 'STMicroelectronics'),
(89, 9, 'Analog Devices'),
(90, 9, 'NXP Semiconductors'),
(91, 10, 'Canon'),
(92, 10, 'Nikon'),
(93, 10, 'Sony (cameras'),
(94, 10, 'Panasonic (cameras)'),
(95, 10, 'Fujifilm'),
(96, 10, 'Olympus'),
(97, 12, 'Leica'),
(98, 10, 'GoPro'),
(99, 10, 'DJI (drones and cameras)'),
(100, 10, 'Sigma (camera lenses)'),
(101, 11, 'Fitbit'),
(102, 11, 'Garmin'),
(103, 11, 'Apple (Apple Watch and Health apps)'),
(104, 11, 'Samsung (fitness wearables)'),
(105, 11, 'Polar'),
(106, 11, ' Bowflex (Nautilus)'),
(107, 11, 'Precor'),
(108, 11, 'Life Fitness'),
(109, 11, 'Peloton'),
(110, 11, 'MyFitnessPal (Under Armour)'),
(111, 12, 'Apple'),
(112, 12, 'Samsung'),
(113, 12, 'Google'),
(114, 12, 'OnePlus'),
(115, 12, 'Xiaomi'),
(116, 12, 'Oppo'),
(117, 12, 'Vivo'),
(118, 12, 'Sony'),
(119, 12, 'LG'),
(120, 12, 'Nokia'),
(121, 12, 'Motorola'),
(122, 12, 'HTC'),
(123, 12, 'BlackBerry'),
(124, 12, 'ZTE'),
(125, 12, 'Alcatel'),
(126, 12, 'Realme'),
(127, 12, 'Meizu'),
(128, 13, 'Harman Kardon'),
(129, 13, 'Sonos'),
(130, 13, 'Yamaha'),
(131, 13, 'Bang & Olufsen'),
(132, 13, 'Klipsch'),
(133, 13, 'Polk Audio'),
(134, 13, 'Denon'),
(135, 13, 'Marshall'),
(136, 13, 'Pioneer'),
(137, 13, 'Vizio'),
(138, 13, 'KEF'),
(139, 13, 'Bowers & Wilkins'),
(140, 13, 'Creative'),
(141, 13, 'Edifier'),
(142, 13, 'Onkyo'),
(143, 13, 'Focal'),
(144, 13, 'Audio-Technica');

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

CREATE TABLE `cartitems` (
  `CartItemID` int NOT NULL,
  `CartID` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `Quantity` int DEFAULT '1',
  `totalproductprice` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cartitems`
--

INSERT INTO `cartitems` (`CartItemID`, `CartID`, `product_id`, `Quantity`, `totalproductprice`) VALUES
(28, NULL, 4, 1, 0),
(29, NULL, 3, 5, 0),
(30, NULL, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `CartID` int NOT NULL,
  `CustomerID` int DEFAULT NULL,
  `CreatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Networking and Connectivity'),
(2, 'Computing and Peripherals'),
(3, 'Accessories and Connectivity'),
(4, 'Home Appliances'),
(5, 'Stationary'),
(6, 'Electricals'),
(7, 'Clothing and Apparel'),
(8, 'Tools'),
(9, 'Electronic Components and parts'),
(10, 'Photography'),
(11, 'Health And Fitness'),
(12, 'Mobile Phones and Accesories'),
(13, 'Speakers And Sounds');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` text,
  `Phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `DiscountID` int NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Description` text,
  `DiscountType` enum('Percentage','FixedAmount') NOT NULL,
  `Value` decimal(10,2) NOT NULL,
  `ValidFrom` date DEFAULT NULL,
  `ValidTo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `FavoriteID` int NOT NULL,
  `CustomerID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `AddedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `ManufacturerID` int NOT NULL,
  `ManufacturerName` varchar(255) NOT NULL,
  `Address` text,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Website` varchar(255) DEFAULT NULL,
  `ContactPerson` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int NOT NULL,
  `CustomerID` int DEFAULT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TotalAmount` decimal(10,2) NOT NULL,
  `Is_delivered` enum('Delivered','Not Delivered') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `AddressID` int DEFAULT NULL,
  `Pay_Mode` enum('COD','MM','CP','CRYPTO') NOT NULL,
  `phone` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `CustomerID`, `OrderDate`, `TotalAmount`, `Is_delivered`, `AddressID`, `Pay_Mode`, `phone`) VALUES
(1, NULL, '2023-09-28 12:46:37', '8000.00', NULL, NULL, 'COD', 248138722),
(2, NULL, '2023-09-28 12:48:54', '8000.00', NULL, NULL, 'COD', 248138722),
(3, NULL, '2023-09-28 13:13:03', '700500.00', NULL, NULL, 'COD', 248138722),
(4, NULL, '2023-09-28 13:22:22', '500.00', NULL, NULL, 'MM', 248138722);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `unite_price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `unite_price`, `quantity`, `sub_total`) VALUES
(1, 2, 31, 'iphone7', '500.00', 16, '8000.00'),
(2, 3, NULL, 'iphone7', '500.00', 1, '500.00'),
(3, 3, 22, 'iphone', '0.00', 1, '0.00'),
(4, 3, NULL, 'Apple lappi', '700000.00', 1, '700000.00'),
(5, 4, 31, 'iphone7', '500.00', 1, '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PaymentID` int NOT NULL,
  `OrderID` int DEFAULT NULL,
  `PaymentDate` datetime NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `PaymentStatus` enum('Pending','Completed','Failed') NOT NULL,
  `PaymentMethod` varchar(50) NOT NULL,
  `TransactionID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `variant_id` int DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `price` decimal(10,2) NOT NULL,
  `stockquantity` int NOT NULL,
  `category_id` int NOT NULL,
  `Sub_category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `Main_product_image` varchar(500) DEFAULT NULL,
  `2nd_product_image` varchar(500) DEFAULT NULL,
  `3rd_product_image` varchar(500) DEFAULT NULL,
  `4th_product_image` varchar(500) DEFAULT NULL,
  `Main_product_video` varchar(500) DEFAULT NULL,
  `2nd_product_video` varchar(500) DEFAULT NULL,
  `3rd_product_video` varchar(500) DEFAULT NULL,
  `4th_product_video` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `variant_id`, `product_name`, `description`, `price`, `stockquantity`, `category_id`, `Sub_category_id`, `brand_id`, `Main_product_image`, `2nd_product_image`, `3rd_product_image`, `4th_product_image`, `Main_product_video`, `2nd_product_video`, `3rd_product_video`, `4th_product_video`) VALUES
(20, NULL, 'iphone', 'cbhjbac', '400.00', 200, 1, 1, 2, '', '', '', '', '', '', '', ''),
(21, NULL, 'iphone', 'sdfgdf', '0.00', 444, 1, 1, 3, '', '', '', '', '', '', '', ''),
(22, NULL, 'iphone', 'sdfgdf', '0.00', 444, 1, 1, 3, '', '', '', '', '', '', '', ''),
(23, NULL, 'iphone', 'sdfgdf', '0.00', 444, 1, 1, 3, '', '', '', '', '', '', '', ''),
(24, NULL, 'iphone', 'sdfgdf', '0.00', 444, 1, 1, 3, '', '', '', '', '', '', '', ''),
(25, NULL, 'iphone', 'sdfgdf', '0.00', 444, 1, 1, 3, '', '', '', '', '', '', '', ''),
(26, NULL, 'iphone', 'sdfgdf', '0.00', 444, 1, 1, 3, '', '', '', '', '', '', '', ''),
(27, NULL, 'iphone', 'sdfgdf', '0.00', 444, 1, 1, 3, '', '', '', '', '', '', '', ''),
(28, NULL, 'iphone', 'sdfgdf', '0.00', 444, 1, 1, 3, '', '', '', '', '', '', '', ''),
(29, NULL, 'iphone', 'sdfgdf', '0.00', 444, 1, 1, 3, '', '', '', '', '', '', '', ''),
(30, NULL, 'iphone', 'sdfgdf', '0.00', 444, 1, 1, 3, '', '', '', '', '', '', '', ''),
(31, NULL, 'iphone7', 'fnhgfdhfgh', '500.00', 500, 5, 99, 47, 'uploads/mobile (1).png', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `productvariants`
--

CREATE TABLE `productvariants` (
  `variant_id` int NOT NULL,
  `ProductID` int DEFAULT NULL,
  `VariantName` varchar(255) NOT NULL,
  `SKU` varchar(50) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `StockQuantity` int NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `attribute_vlaues` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restocking`
--

CREATE TABLE `restocking` (
  `RestockID` int NOT NULL,
  `SupplierID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `Quantity` int NOT NULL,
  `RestockDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ReviewID` int NOT NULL,
  `ProductID` int DEFAULT NULL,
  `CustomerID` int DEFAULT NULL,
  `Rating` int NOT NULL,
  `Comment` text,
  `ReviewDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shippingaddresses`
--

CREATE TABLE `shippingaddresses` (
  `AddressID` int NOT NULL,
  `CustomerID` int DEFAULT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) DEFAULT NULL,
  `PostalCode` varchar(20) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shippingmethods`
--

CREATE TABLE `shippingmethods` (
  `ShippingMethodID` int NOT NULL,
  `MethodName` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skus`
--

CREATE TABLE `skus` (
  `sku_id` int NOT NULL,
  `sku_value` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `unit_amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `Sub_category_id` int NOT NULL,
  `Sub_category_name` varchar(255) NOT NULL,
  `CategoryID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`Sub_category_id`, `Sub_category_name`, `CategoryID`) VALUES
(1, 'Modems', 1),
(2, 'Wi-Fi Extenders', 1),
(3, 'Routers', 1),
(4, 'Switches', 1),
(5, 'Network Accessories', 1),
(6, 'Cables', 1),
(7, 'Laptops', 2),
(8, 'Desktop Computers', 2),
(9, 'Monitors', 2),
(10, 'Keyboards and Mice', 2),
(11, 'Printers', 2),
(12, 'USB Cables', 1),
(13, 'Chargers', 1),
(14, 'Adapters', 1),
(15, 'HDMI Cables', 1),
(16, 'Power Banks', 1),
(17, 'Cable Management Accessories', 1),
(18, 'Refrigerators', 4),
(19, 'Washing Machines', 4),
(20, 'Microwaves', 4),
(21, 'Dishwashers', 4),
(22, 'Air Conditioners', 4),
(23, 'Exercise and Physical Activity', 11),
(24, 'Nutrition', 11),
(25, 'Mental Health and Mindfulness', 11),
(26, 'Disease Prevention and Management', 11),
(27, 'Sports and Athletics', 11),
(28, 'Wellness and Holistic Health', 11),
(29, 'Weight Management', 11),
(30, 'Fitness Equipment and Gear', 11),
(31, 'Health Education and Coaching', 11),
(32, 'Community and Social Fitness', 11),
(33, 'Recovery and Rehabilitation', 11),
(34, 'Cameras', 10),
(35, 'Lenses', 10),
(36, 'Camera Accessories', 10),
(37, 'Lighting Equipment', 10),
(38, 'Photography Studio Gear', 10),
(39, 'Camera Supports and Stabilizers', 10),
(40, 'Memory Cards and Storage', 10),
(41, 'Camera Cleaning and Maintenance', 10),
(42, 'Photography Software', 10),
(43, 'Photography Books and Education', 10),
(44, 'Camera Drones and Accessories', 10),
(45, 'Camera and Lens Care', 10),
(46, 'Photography Apparel', 10),
(47, 'Camera Accessories for Smartphone Photography', 10),
(48, 'Screens and Displays', 9),
(49, 'Semiconductors', 9),
(50, 'Capacitors', 9),
(51, 'Resistors', 9),
(52, 'Hand Tools', 8),
(53, 'Power Tools', 8),
(54, 'Cutting Tools', 8),
(55, 'Measuring and Layout Tools', 8),
(56, 'Fastening Tools', 8),
(57, 'Woodworking Tools', 8),
(58, 'Metalworking Tools', 8),
(59, 'Gardening and Landscaping Tools', 8),
(60, 'Automotive Tools', 8),
(61, 'Construction and Masonry Tools', 8),
(62, 'Plumbing Tools', 8),
(63, 'Electrical Tools', 8),
(64, 'Painting and Decorating Tools', 8),
(65, 'Masonry and Tile Tools', 8),
(66, 'Automotive Repair Tools', 8),
(67, 'Welding and Soldering Tools', 8),
(68, 'Tops', 7),
(69, 'Bottoms', 7),
(70, 'Outerwear', 7),
(71, 'Dresses', 7),
(72, 'Activewear', 7),
(73, 'Swimwear', 7),
(74, 'Intimate Apparel', 7),
(75, 'Footwear', 7),
(76, 'Accessories', 7),
(77, 'Formalwear', 7),
(78, 'Uniforms', 7),
(79, 'Maternity Wear', 7),
(80, 'Kids\' and Baby Clothing', 7),
(81, 'Costumes and Cosplay', 7),
(82, 'Specialty Clothing', 7),
(83, 'Ethnic and Cultural Clothing', 7),
(84, 'Vintage and Retro Clothing', 7),
(85, 'Sustainable and Eco-Friendly Clothing', 7),
(86, 'Home Appliances', 6),
(87, 'Ssmall Kitchen Appliances', 6),
(88, 'Entertainment Electronics', 6),
(89, 'Computing and Office Electronics', 6),
(90, 'Smart Home Devices', 6),
(91, 'Batteries and Power Sources', 6),
(92, 'Electrical Wiring and Components', 6),
(93, 'Security Systems', 6),
(94, 'Industrial and Commercial Electrical Equipment', 6),
(95, 'Automotive Electricals', 6),
(96, 'Electrical Safety Equipment', 6),
(97, 'Pens', 5),
(98, 'Pencils', 5),
(99, 'Erasers', 5),
(100, 'Notebooks and Notepads', 5),
(101, 'Paper', 5),
(102, 'Folders and Binders', 5),
(103, 'Clips and Fasteners', 5),
(104, 'Adhesives', 5),
(105, 'Scissors and Cutting Tools', 5),
(106, 'Desk Accessories', 5),
(107, 'Calendars and Planners', 5),
(108, 'Stamps and Stamp Pads', 5),
(109, 'Envelopes', 5),
(110, 'Presentation Supplies', 5),
(111, 'Office Tools', 5),
(112, 'Art Supplies', 5),
(113, 'Craft Supplies', 5),
(114, 'Filing and Storage', 5),
(115, 'Smartphones', 12),
(116, 'Feature Phones', 12),
(117, 'Refurbished Phones', 12),
(118, 'Unlocked Phones', 12),
(119, 'Basic Phones', 12),
(120, 'Gaming Phones', 12),
(121, 'Rugged Phones', 12),
(122, 'Mobile Phone Cases and Covers', 12),
(123, 'Screen Protectors', 12),
(124, 'Mobile Phone Chargers and Cables', 12),
(125, 'Bluetooth Headsets and Earbuds', 12),
(126, 'Mobile Phone Batteries', 12),
(127, 'Mobile Phone Holders and Mounts', 12),
(128, 'Car Accessories for Mobile Phones', 12),
(129, 'Mobile Phone Signal Boosters', 12),
(130, 'Mobile Phone Repair Parts', 12),
(355, 'Bluetooth Speakers', 13),
(356, 'Home Speakers', 13),
(357, 'Computer Speakers', 13),
(358, 'Studio Monitors', 13),
(359, 'Soundbars', 13),
(360, 'Outdoor Speakers', 13),
(361, 'Wireless Speakers', 13),
(362, 'Portable Speakers', 13),
(363, 'Subwoofers', 13),
(364, 'Bookshelf Speakers', 13),
(365, 'Surround Sound Speakers', 13),
(366, 'Car Speakers', 13);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `SupplierID` int NOT NULL,
  `SupplierName` varchar(255) NOT NULL,
  `ContactName` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `Variant_ID` int NOT NULL,
  `VariantName` varchar(255) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Size` varchar(50) DEFAULT NULL,
  `Material` varchar(100) DEFAULT NULL,
  `Voltage` varchar(20) DEFAULT NULL,
  `Wattage` varchar(50) DEFAULT NULL,
  `PlugType` varchar(50) DEFAULT NULL,
  `Weight` decimal(50,0) DEFAULT NULL,
  `Dimensions` varchar(100) DEFAULT NULL,
  `OperatingSystem` varchar(50) DEFAULT NULL,
  `Capacity` varchar(50) DEFAULT NULL,
  `Resolution` varchar(50) DEFAULT NULL,
  `Speed` varchar(50) DEFAULT NULL,
  `Style` varchar(50) DEFAULT NULL,
  `Pattern` varchar(50) DEFAULT NULL,
  `Price` varchar(50) DEFAULT NULL,
  `SKU` varchar(50) DEFAULT NULL,
  `StockQuantity` int DEFAULT NULL,
  `CPU` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `varrr`
--

CREATE TABLE `varrr` (
  `varrr_id` int NOT NULL,
  `variant_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `value` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`value_id`),
  ADD KEY `attribute_id` (`attribute_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `fk_brands_category` (`CategoryID`);

--
-- Indexes for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`CartItemID`),
  ADD KEY `CartID` (`CartID`),
  ADD KEY `ProductID` (`product_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`DiscountID`),
  ADD UNIQUE KEY `Code` (`Code`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`FavoriteID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`ManufacturerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `OrderID` (`order_id`),
  ADD KEY `ProductID` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `CategoryID` (`category_id`),
  ADD KEY `fk_subcategory` (`Sub_category_id`),
  ADD KEY `fk_brands` (`brand_id`);

--
-- Indexes for table `productvariants`
--
ALTER TABLE `productvariants`
  ADD PRIMARY KEY (`variant_id`),
  ADD UNIQUE KEY `SKU` (`SKU`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `fk_variant_id` (`variant_id`);

--
-- Indexes for table `restocking`
--
ALTER TABLE `restocking`
  ADD PRIMARY KEY (`RestockID`),
  ADD KEY `SupplierID` (`SupplierID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `shippingaddresses`
--
ALTER TABLE `shippingaddresses`
  ADD PRIMARY KEY (`AddressID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `shippingmethods`
--
ALTER TABLE `shippingmethods`
  ADD PRIMARY KEY (`ShippingMethodID`);

--
-- Indexes for table `skus`
--
ALTER TABLE `skus`
  ADD PRIMARY KEY (`sku_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`Sub_category_id`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`Variant_ID`),
  ADD UNIQUE KEY `VariantName` (`VariantName`,`Color`,`Size`);

--
-- Indexes for table `varrr`
--
ALTER TABLE `varrr`
  ADD PRIMARY KEY (`varrr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attribute_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `value_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `cartitems`
--
ALTER TABLE `cartitems`
  MODIFY `CartItemID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `CartID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `DiscountID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `FavoriteID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `ManufacturerID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `productvariants`
--
ALTER TABLE `productvariants`
  MODIFY `variant_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restocking`
--
ALTER TABLE `restocking`
  MODIFY `RestockID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ReviewID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippingaddresses`
--
ALTER TABLE `shippingaddresses`
  MODIFY `AddressID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippingmethods`
--
ALTER TABLE `shippingmethods`
  MODIFY `ShippingMethodID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skus`
--
ALTER TABLE `skus`
  MODIFY `sku_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `Sub_category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SupplierID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `Variant_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `varrr`
--
ALTER TABLE `varrr`
  MODIFY `varrr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`attribute_id`);

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `fk_brands_category` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD CONSTRAINT `cartitems_ibfk_1` FOREIGN KEY (`CartID`) REFERENCES `carts` (`CartID`),
  ADD CONSTRAINT `cartitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`Order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`Order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_brands` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `fk_subcategory` FOREIGN KEY (`Sub_category_id`) REFERENCES `sub_category` (`Sub_category_id`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `productvariants`
--
ALTER TABLE `productvariants`
  ADD CONSTRAINT `fk_variant_id` FOREIGN KEY (`variant_id`) REFERENCES `productvariants` (`variant_id`),
  ADD CONSTRAINT `productvariants_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `restocking`
--
ALTER TABLE `restocking`
  ADD CONSTRAINT `restocking_ibfk_1` FOREIGN KEY (`SupplierID`) REFERENCES `suppliers` (`SupplierID`),
  ADD CONSTRAINT `restocking_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Constraints for table `shippingaddresses`
--
ALTER TABLE `shippingaddresses`
  ADD CONSTRAINT `shippingaddresses_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
