-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 08:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `subtitle` varchar(30) NOT NULL,
  `description` varchar(350) NOT NULL,
  `topseller` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `image`, `title`, `subtitle`, `description`, `topseller`) VALUES
(1, 'venice.jpg', 'Venice', 'Starting from $400 per night', 'Venice, a city in northeastern Italy, is known for its beautiful canals and romantic gondola rides. Visitors can enjoy exploring the historic city center, visiting St. Mark\'s Basilica and the Doge\'s Palace, and taking a boat tour of the Grand Canal.', 1),
(2, 'las-vegas.jpg', 'Las Vegas', 'Starting from $170 per night', 'Las Vegas, also known as the \"Entertainment Capital of the World,\" is famous for its casinos, shows, and nightlife. Visitors can enjoy exploring the Strip, visiting famous hotels like the Bellagio and the Venetian, and taking a helicopter tour of the Grand Canyon.\r\n              ', 1),
(3, 'chicago.jpg', 'Chicago', 'Starting from $120 per night', 'Chicago, the third-most populous city in the United States, is known for its iconic architecture, deep-dish pizza, and jazz music. Visitors can enjoy exploring the city\'s museums, taking a boat tour of Lake Michigan, and catching a Cubs game at Wrigley Field.', 0),
(4, 'los_angeles.jpg', 'Los Angeles', 'Starting from $220 per night', 'Los Angeles is a sprawling city located in Southern California, known for its mild weather, beaches, and entertainment industry. Visitors can explore famous landmarks such as the Hollywood sign, the Walk of Fame, and Universal Studios Hollywood. Other popular attractions include Venice Beach, the Getty Center, and the Griffith Observatory.\r\n       ', 0),
(5, 'new-york.jpg', 'New York', 'Starting from $150 per night', 'New York City is the most populous city in the United States, known for its famous landmarks such as the Statue of Liberty, Central Park, and Times Square. Visitors can experience world-class museums, art galleries, and cuisine, as well as shopping and entertainment.', 1),
(6, 'london.jpg', 'London', 'Starting from $250 per night', 'London, the capital city of England, is known for its iconic landmarks such as the Tower Bridge, the London Eye, and the Buckingham Palace. Visitors can enjoy exploring the city\'s museums, shopping at Oxford Street, and experiencing London\'s vibrant nightlife.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(350) NOT NULL,
  `list_price` double NOT NULL,
  `discount` double NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `code`, `name`, `description`, `list_price`, `discount`, `price`) VALUES
(1, 'venice', 'Venice', 'Venice, a city in northeastern Italy, is known for its beautiful canals and romantic gondola rides. Visitors can enjoy exploring the historic city center, visiting St. Mark&#039;s Basilica and the Doge&#039;s Palace, and taking a boat tour of the Grand Canal.', 738, 40, 442.8),
(2, 'lasvegas', 'Las Vegas', 'Las Vegas, also known as the &quot;Entertainment Capital of the World,&quot; is famous for its casinos, shows, and nightlife. Visitors can enjoy exploring the Strip, visiting famous hotels like the Bellagio and the Venetian, and taking a helicopter tour of the Grand Canyon.', 345, 20, 276),
(3, 'chicago', 'Chicago', 'Chicago, the third-most populous city in the United States, is known for its iconic architecture, deep-dish pizza, and jazz music. Visitors can enjoy exploring the city&#039;s museums, taking a boat tour of Lake Michigan, and catching a Cubs game at Wrigley Field.', 150, 10, 135),
(4, 'losangeles', 'Los Angeles', 'Los Angeles is a sprawling city located in Southern California, known for its mild weather, beaches, and entertainment industry. Visitors can explore famous landmarks such as the Hollywood sign, the Walk of Fame, and Universal Studios Hollywood. Other popular attractions include Venice Beach, the Getty Center, and the Griffith Observatory.', 880, 20, 704),
(5, 'newyork', 'New York', 'New York City is the most populous city in the United States, known for its famous landmarks such as the Statue of Liberty, Central Park, and Times Square. Visitors can experience world-class museums, art galleries, and cuisine, as well as shopping and entertainment.', 270, 45, 150),
(6, 'london', 'London', 'London, the capital city of England, is known for its iconic landmarks such as the Tower Bridge, the London Eye, and the Buckingham Palace. Visitors can enjoy exploring the city\'s museums, shopping at Oxford Street, and experiencing London\'s vibrant nightlife.', 550, 55, 250);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `login` varchar(100) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`login`, `hash`, `username`, `address`, `phone`) VALUES
('test', '$2y$10$chQnR/v7InXKWlb3EXBvIO.3sEAHh57k.derOxAouFDewH37UufNq', 'Tester User', 'Fire Street', '302-333-6533'),
('test2', '$2y$10$K4lC543srR4nLfjfeTHMQu8cPjUFTfHQHXgu0aaLvw/fJO6o9jQ4i', 'Test User2', 'Cold street', '302-922-7088'),
('zach4', '$2y$10$RbQKSyBDg5h668ccNeAqSeJz/t2d3V19rGhKRmyBfoX0BmalkaV8K', 'zach', '', ''),
('zzawodny', '$2y$10$sFA3Dbc6Ve3p1INHXd4OkuzIFMCb5RKrWqjbPUCJAP2RCVKXjJ.LG', 'Zachary Zawodny', '525', '302-283-2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
