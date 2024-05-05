-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 08:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `123104618`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookorder`
--

CREATE TABLE `bookorder` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `quantity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookorder`
--

INSERT INTO `bookorder` (`id`, `user_id`, `book_id`, `quantity`) VALUES
(1, 8, 4, '1'),
(5, 8, 15, '1'),
(6, 8, 14, '1'),
(7, 8, 11, '2'),
(8, 8, 5, '1'),
(9, 8, 8, '2');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`) VALUES
(2, 'Conn', '123104618@umail.ucc.ie', 'book', 'Do u have \"Pride and Prejudice\"'),
(4, 'Ann', '731402783@qq.com', 'Hi', 'I can\'t find your address'),
(5, 'Siyang Fan', '731402783@qq.com', 'Hi', 'Do u have twitter or other social media  platform？');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category`, `title`, `author`, `price`, `quantity`, `img_path`) VALUES
(1, 'best_seller', 'The Lost Girls of Ireland', 'Wiggs, Susan', '5.99', '100', '/bookstore/img/The-Lost-Girls-of-Ireland-Kindle.jpg'),
(4, 'fiction', 'The Wife\'s Tale', 'Lansens, Lori', '4.99', '45', '/bookstore/img/20240503215950.png'),
(5, 'best_seller', 'Close To Death', 'Horowitz, Anthony', '16.99', '100', '/bookstore/img/20240503215228.png'),
(6, 'best_seller', 'Snowflake', 'Nealon, Louise', '9.99', '100', '/bookstore/img/20240503215452.png'),
(7, 'best_seller', 'Calamity of Souls', 'David Baldacci', '15.99', '90', '/bookstore/img/20240503215808.png'),
(8, 'best_seller', 'Poor', 'Katriona O\'sullivan', '14.30', '100', '/bookstore/img/20240503215857.png'),
(9, 'fiction', 'Tigers in Red Weather', 'Klaussmann, Liza', '5.99', '50', '/bookstore/img/20240503221414.png'),
(10, 'fiction', 'Villa America', 'Klaussmann, Lisa', '9.99', '50', '/bookstore/img/20240503221521.png'),
(11, 'fiction', 'Sugar, Baby', 'Saintclare, Celine', '13.00', '50', '/bookstore/img/20240503221652.png'),
(12, 'fiction', 'Gai-Jin', 'Clavell, James', '8.99', '50', '/bookstore/img/20240503221842.png'),
(13, 'nonfiction', 'The Creative Act: A Way of Being', 'Rubin, Rick', '29.99', '50', '/bookstore/img/20240503222037.png'),
(14, 'nonfiction', 'Meet the Artist Pablo Picasso', 'Geis, Patricia', '10.99', '20', '/bookstore/img/20240503222144.png'),
(15, 'nonfiction', 'The Surreal Life of Leonora Carrington', 'Moorhead, Joanna', '5.99', '20', '/bookstore/img/52479471419731.jpg'),
(16, 'nonfiction', 'Meet the Artist Vincent van Gogh', 'Geis, Patricia', '14.99', '30', '/bookstore/img/33464908120249.jpg'),
(17, 'nonfiction', 'Leonardo. The Complete Drawings', 'Nathan, Johannes', '26.00', '20', '/bookstore/img/39943887225122.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `isadmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `address`, `isadmin`) VALUES
(1, 'admin', '123', 'sia123@gmail.com', 'Apt21 Marian Place, Mardyke Walk, Cork City', 1),
(8, 'sia', '123', '731402783@qq.com', 'Apt26 Marian Place, Mardyke Walk, Cork City', 0),
(11, 'conn', '1234', 'fsy725@gmail.com', 'Apt22 Marian Place', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookorder`
--
ALTER TABLE `bookorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_customers` (`user_id`),
  ADD KEY `fk_orders_books` (`book_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookorder`
--
ALTER TABLE `bookorder`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookorder`
--
ALTER TABLE `bookorder`
  ADD CONSTRAINT `fk_orders_books` FOREIGN KEY (`book_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_orders_customers` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
