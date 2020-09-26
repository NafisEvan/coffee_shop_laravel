-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 07:10 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `username`, `password`, `phone`, `email`, `address`, `gender`, `image`, `membership`, `status`) VALUES
(1, 'Sadia', 'sd', '111', '01521432679', 'sadia@gmail.com', '28/4,airport road', 'Female', NULL, NULL, '1'),
(2, 'tousif salauddin', 'tousif', '555', '01521492649', 'tousif@hmail.com', 'qwerty', 'male', NULL, NULL, '1'),
(3, 'Nafis Evan', 'Evan', '666', '01685447380', 'evan@hotmail.com', '128/4 karwanbazar', 'Male', NULL, NULL, '1'),
(4, 'abdullah Shafi', 'ab', '111', '0152432689', 'ab@gmail.com', 'kuratoli', 'Male', NULL, NULL, '0'),
(5, 'Noor-e-lamia', 'lamia', '666', '01685447920', 'lm@hotmail.com', 'east nakhalpara', 'Female', NULL, NULL, '0'),
(6, 'jonas', 'jo', '999', '01521435689', 'jonus@gmail.com', 'berlin', 'Male', NULL, NULL, '1'),
(7, 'martha', 'mar', '566', '01685447350', 'martha2gmail.com', 'qwerty', 'Female', NULL, NULL, '1'),
(10, 'Thiago', 'Thiago Alcantara', '1234', '01685447380', 'thiago@gmail.com', 'Liverpool', 'Male', NULL, NULL, '0'),
(11, 'Test', 'ts', '123', '01685447380', 'test@gnaul.com', 'dddd', 'male', NULL, NULL, '0'),
(12, 'Adam', 'Ad', '123', '01521436589', 'adam@yahoo.com', 'Germany', 'Male', NULL, NULL, '1'),
(13, 'Evannahid', 'nahid', '123', '01685441236', 'nahid@gmail.com', 'farmgate', 'Male', NULL, NULL, '0'),
(14, 'Bartosz', 'barto', '123', '01521456326', 'bartosz@hotmail.com', 'germany', 'Male', NULL, NULL, '0'),
(15, 'Sadio Mane', 'Sadio', '123', '01685442369', 'sadio@gmail.com', 'Liverpool', 'Male', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suggested` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `price`, `discount_amount`, `status`, `ingredients`, `image`, `suggested`) VALUES
(1, 'Cappachino', '80', '40', 'available', 'Hot water,cocoa bin', NULL, 'yes'),
(2, 'Americano', '100', '50', 'available', 'Cocacoa bin,hot water', NULL, 'yes'),
(3, 'Cold Coffee', '90', '', 'available', 'Ice,cocoa bin,water\r\n\r\n\r\n', NULL, 'yes'),
(4, 'Hot Coffee', '70', '', 'available', 'Hot water with cocoa', NULL, 'No'),
(5, 'Black coffe', '80', '', 'available', 'Ice,cocoa,bin,water', NULL, 'Yes'),
(6, 'Mocha', '150', '', 'available', 'Ice,Cocoa,bin,water', NULL, 'Yes'),
(7, 'ESPRESSO', '250', '', 'available', 'Ice,cocoa,bin,water', NULL, 'Yes'),
(8, 'FRAPPE', '200', '', 'available', 'Hot water with cocoa', NULL, 'No'),
(9, 'IRISH COFFEE', '320', '', 'available', 'whiskey,Ice,cocoa bin,water', NULL, 'Yes'),
(10, 'CAPPUCCINO', '220', '', 'available', 'Ice,cocoa bin,water', NULL, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2020_09_22_064215_create_food_table', 3),
(5, '2020_09_22_070617_create_customer_table', 4),
(7, '2020_09_22_194814_create_users_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(123) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salary` int(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `userType` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `phone`, `address`, `gender`, `email`, `salary`, `image`, `userType`) VALUES
(1, 'Fardin  ahmed', 'fardin', '555', '01787990813', 'Basundhara R/A,Dhaka', 'male', 'fardinahsan84@gmail.co', 800, '', 'manager'),
(3, 'Abdullah Shafi', 'ab', 'aa', '01521432679', 'puran d', 'male', 'abcc@gmail.com', 1787990813, 'ab', 'admin'),
(15, 'Abdullah Shafi', 'aassss', 'aa', '01787990813', 'Dhaka', 'female', 'abdullahshafi66@gmail.com', 12, 'image.jpg', 'admin'),
(17, 'Abdullah Shafi', 'ssssss', 'aa', '01787990813', 'Dhaka', 'male', 'abdullahshafi66@gmail.com', 12, 'image.jpg', 'delivery_m'),
(18, 'evan', 'ev', '123', '11', '11', 'male', 'wvan@ka', 1111, 'image.jpg', 'manager'),
(20, 'nafismustafa', 'nafis', '555', 'qwweerrrrt', 'qweeee', 'male', 'adam@gmail', 500000, '', 'admin'),
(22, 'lamia', 'lm', '123', '01521432679', 'sddddd', 'female', '1@fsssss.com', 2222222, '2222222', 'admin'),
(23, 'liza', 'lz', '123444', '01521432679', 'sdsddadd', 'female', 'asdda@gjnajlan.com', 111111, '111111', 'manager'),
(24, 'samia', 'sam', '123456', '01685447380', 'sdsdsdad', 'female', 'evan@gmail.com', 12345, '12345', 'manager'),
(27, 'lamia', 'ts', '123', '01521432679', 'dddd', 'female', 'evannahid@yahoo.com', 666, '5555', 'admin'),
(28, 'evannnnn', 'e', '222222', '01521432679', 'sssss', 'male', 'n@gmail.com', 22222, '22222', 'delivery_m'),
(29, 'liza', 'lzzzzz', '123', '01685447380', 'sdddd', 'female', '100@fsssss.com', 1111111, '1.PNG', 'delivery_m'),
(30, 'lamia', 'aaaaaaaaaaaaaaaaaa', 'aaa', '01787990813', 'dddd', 'female', 'taaaaaaaaaaaaaaa@gmail.com', 11, '092320201712075f6b81e719842Lilac Snack.png', 'delivery_m'),
(32, 'tesatd', 'd', 'sdsad', '01564985612', 'dddd', 'male', 'sdasd@gmail.com', 2222, '092320201902005f6b9ba8c87acU1592567305.jpg', 'delivery_m'),
(33, 'sdsdsd', 'dsdsasdada', 'adadads', '0195195390', 'dsds', 'female', 'dadadsd@gmail.com', 2222, '092420200713565f6c4734ab6e0U1594357394.jpg', 'manager'),
(35, '46545646', 'ffdffd', 'fsdfsdfs', '01521432679', 'ddad', 'male', 'ffjkfuifbhiub@gmail.com', 22222, '092420200828515f6c58c36f44776d1683793814c6a8c1c5fca8a87e698.jpg', 'admin'),
(36, 'dddff', 'ffsfdf', '5', '01524692356', 'fee', 'female', 'fsf@hmkdm', 5, '092420200835205f6c5a48173dfIMG_0036.JPG', 'admin'),
(37, 'Cristiano Ronaldo', 'CR7', '123', '01521432679', 'portugal', 'male', 'cr7@gmail.com', 500000, '092420201417105f6caa66e8270wp5444468-cristiano-ronaldo-hd-wallpapers.jpg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_username_unique` (`username`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
