-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 09:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quicktira`
--

-- --------------------------------------------------------

--
-- Table structure for table `convo`
--

CREATE TABLE `convo` (
  `convo_id` int(11) NOT NULL,
  `tenant_id` int(11) DEFAULT NULL,
  `landlord_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `convo`
--

INSERT INTO `convo` (`convo_id`, `tenant_id`, `landlord_id`) VALUES
(23, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `favorite_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`favorite_id`, `post_id`, `user_id`) VALUES
(21, 17, 7),
(22, 18, 7),
(23, 21, 8),
(24, 20, 8),
(51, 26, 2),
(64, 20, 2),
(65, 24, 2),
(66, 30, 2),
(67, 17, 2),
(68, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `landlords`
--

CREATE TABLE `landlords` (
  `account_id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landlords`
--

INSERT INTO `landlords` (`account_id`, `fullname`, `email`, `username`, `password`, `contact`, `account_type`, `profile_picture`) VALUES
(1, 'belle catada', 'belle@gmail.com', 'belle', '123', '09039897185', 'landlord', '672307da73fe3.jpg'),
(2, 'joy boy', 'joyboy@gmail.com', 'joyboy', '123', '09099897185', 'landlord', '67230717c89c4.jpg'),
(3, 'conan gray', 'conan@gmail.com', 'conan', '123', '09099897185', 'landlord', '6723082e31dc1.jpg'),
(4, 'peppa bunyi', 'peppa@gmail.com', 'peppa', '123', '09099897185', 'landlord', 'Anya spy x family.jfif'),
(5, 'rose marie', 'rose@gmail.com', 'rose', '123', '09099897185', 'landlord', '67188941cdf61.jfif'),
(6, 'aisen rodis', 'aisen@gmail.com', 'aisen', '123', '09099897185', 'landlord', '6724ae52eb7f4.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `like_react`
--

CREATE TABLE `like_react` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like_react`
--

INSERT INTO `like_react` (`like_id`, `post_id`, `user_id`) VALUES
(67, 18, 7),
(69, 19, 7),
(70, 21, 7),
(72, 17, 7),
(73, 19, 8),
(74, 18, 8),
(75, 21, 8),
(76, 22, 8),
(77, 23, 8),
(80, 17, 9),
(81, 18, 9),
(82, 19, 9),
(83, 22, 9),
(84, 21, 9),
(89, 20, 2),
(94, 20, 8),
(101, 26, 2),
(102, 24, 2),
(103, 25, 2),
(106, 19, 2),
(120, 27, 7),
(122, 21, 2),
(123, 18, 2),
(124, 17, 2),
(125, 28, 2),
(126, 23, 2),
(127, 30, 2),
(128, 35, 2),
(129, 20, 7),
(130, 22, 7),
(132, 24, 7),
(133, 28, 7),
(134, 30, 7),
(135, 35, 7),
(136, 26, 7);

-- --------------------------------------------------------

--
-- Table structure for table `post_property`
--

CREATE TABLE `post_property` (
  `post_id` int(11) NOT NULL,
  `landlord_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_images` varchar(255) DEFAULT NULL,
  `post_price` int(11) DEFAULT NULL,
  `post_description` text DEFAULT NULL,
  `post_location` varchar(255) DEFAULT NULL,
  `room_count` int(11) DEFAULT NULL,
  `bathroom_count` int(11) DEFAULT NULL,
  `sqr_meters` int(11) DEFAULT NULL,
  `post_created_at` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `post_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_property`
--

INSERT INTO `post_property` (`post_id`, `landlord_id`, `post_title`, `post_images`, `post_price`, `post_description`, `post_location`, `room_count`, `bathroom_count`, `sqr_meters`, `post_created_at`, `address`, `post_status`) VALUES
(17, 1, 'house for rent', 'image_671456e759e362.10199526.jfif', 5000, 'Welcome to your new home! This spacious and inviting 3-bedroom, 2-bathroom house is perfect for families and professionals alike. With an open-concept living and dining area, it’s designed for comfort and entertaining. The well-equipped kitchen features modern appliances, ample storage, and a breakfast nook for casual dining.\r\n\r\nThe master bedroom boasts an ensuite bathroom and generous closet space, while the two additional bedrooms are bright and versatile—ideal for children, guests, or a home office. Enjoy your private backyard, perfect for outdoor relaxation or gatherings.\r\n\r\nLocated in a quiet, friendly neighborhood, this home offers easy access to local parks, schools, and shopping. With convenient public transport options nearby, commuting is a breeze.\r\n\r\nDon\'t miss this opportunity to make this charming house your home! Contact us today to schedule a viewing.', 'trece', 3, 2, 200, '10/20/24', 'lot 3 blk 2', 'active'),
(18, 4, 'looking for tenant', 'image_671457ae1db719.21987452.jfif', 7000, 'This cozy 2-bedroom, 1-bathroom house is ready for you! Enjoy an open living area, a modern kitchen, and a private backyard. Located in a quiet neighborhood close to parks and shops. Perfect for families or professionals.\r\n\r\nContact us today to schedule a viewing!', 'indang', 2, 1, 300, '10/20/24', 'lot 5 blk 3', 'active'),
(19, 2, 'rent this house', 'image_6714588f4ed740.31139763.jfif', 4500, 'Charming 3-bedroom, 2-bathroom home available for rent. Features a spacious living area, updated kitchen, and a nice backyard. Conveniently located near parks and shopping. Ideal for families or anyone looking for comfort.', 'lapidario', 1, 1, 300, '10/20/24', 'lot 1 blk 1', 'active'),
(20, 3, 'modern house for rent', 'image_6714593acfdc82.77139991.jfif', 11000, 'Discover this sleek 3-bedroom, 2-bathroom home designed for contemporary living. Enjoy an open layout with stylish finishes, a gourmet kitchen with stainless steel appliances, and a spacious living area that flows into a private backyard. Located in a vibrant neighborhood with easy access to shops and parks. Perfect for those seeking a stylish and convenient lifestyle.', 'lapidario', 3, 2, 500, '10/20/24', 'lot 3  blk 5', 'active'),
(21, 1, '3 bedroom for rent', 'image_67145998027b65.48433875.jfif', 8000, 'Step into this modern 3-bedroom, 2-bathroom house featuring an open floor plan and sleek design. Enjoy a bright living space, a gourmet kitchen with high-end appliances, and a lovely backyard perfect for relaxing. Situated in a desirable neighborhood close to amenities. Ideal for those looking for comfort and style.', 'trece', 3, 1, 100, '10/20/24', 'lot 5 blk 5', 'active'),
(22, 5, 'new house for rent', 'image_67145a047c3c19.53401511.jfif', 9000, 'Step into this modern 3-bedroom, 2-bathroom house featuring an open floor plan and sleek design. Enjoy a bright living space, a gourmet kitchen with high-end appliances, and a lovely backyard perfect for relaxing. Situated in a desirable neighborhood close to amenities. Ideal for those looking for comfort and style.', 'indang', 1, 1, 400, '10/20/24', 'lot 1 blk 6', 'active'),
(23, 3, 'house for rent', 'image_67146ea67f72a4.24301722.jfif', 10000, 'hahahahahahhahahaha', 'lapidario', 1, 1, 400, '10/20/24', 'lot 6 blk 8', 'active'),
(24, 1, 'house for rent haha', 'image_6716137a124bf5.75155174.jfif', 9000, 'wala akong maisip', 'trece', 2, 1, 400, '10/21/24', 'lot 6 blk 1', 'active'),
(25, 2, 'post', 'image_671617935319e6.66872391.jfif', 8000, 'asdasdas', 'lapidario', 2, 1, 100, '10/21/24', 'lot 4 blk 2', 'active'),
(26, 5, 'new house', 'image_67161848518692.81918156.jfif', 11000, 'wala akong maisip ', 'indang', 3, 1, 500, '10/21/24', 'lot 4 blk 4', 'active'),
(27, 1, 'post 3', 'image_6717b1f8634441.00536151.jfif', 7000, 'adffafasfasfasfaffffff', 'lapidario', 11, 1, 100, '10/22/24', 'blk 2 lot 3', 'active'),
(28, 3, 'yfttyrfty', 'image_671882c1e048a6.88621894.jfif', 565, 'yggyjyg', 'trece', 1, 1, 78778, '10/23/24', 'uyfuugyy', 'active'),
(29, 1, 'post 9', 'image_6723014a8db9e2.24614996.jpg', 9000, 'adasd adas das das da', 'trece', 1, 1, 100, '10/31/24', 'lot 4 blk 4', 'active'),
(30, 2, 'lf tenant', 'image_672302a335ffe2.51864126.jpg', 7000, 'dadasdasdsad', 'trece', 1, 1, 100, '10/31/24', 'lot 4 blk 4', 'active'),
(35, 2, 'dadsa', 'image_67230650bf0f26.75997413.jpg', 11000, 'asdasda', 'trece', 1, 1, 100, '10/31/24', 'lot 4 blk 4', 'active'),
(36, 6, 'modern house for rent', 'image_6724aec6f20d36.87449323.jfif', 15000, 'anfkaskljfv aufkoafk akufasf aj fao  aok ia ', 'indang', 4, 4, 300, '11/01/24', 'lot 4 blk 4', 'active'),
(37, 6, 'new post', 'image_6725fa9881a905.75458208.jfif', 7000, 'sadasdasd', 'lapidario', 1, 1, 100, '11/02/24', 'lot 4 blk 4', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `property_post_pictures`
--

CREATE TABLE `property_post_pictures` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_post_pictures`
--

INSERT INTO `property_post_pictures` (`id`, `post_id`, `image_name`) VALUES
(35, 17, 'image_671456e759fb45.24692269.jfif'),
(36, 17, 'image_671456e75a0ea8.93740435.jfif'),
(37, 18, 'image_671457ae1dd544.69789268.jfif'),
(38, 18, 'image_671457ae1df131.96930950.jfif'),
(39, 18, 'image_671457ae1e0c99.23702201.jfif'),
(40, 19, 'image_6714588f4eef09.54899044.jfif'),
(41, 19, 'image_6714588f4f0478.72642348.jfif'),
(42, 19, 'image_6714588f50e756.37530412.jfif'),
(43, 20, 'image_6714593acff3f6.05073638.jfif'),
(44, 20, 'image_6714593ad00725.48120240.jfif'),
(45, 20, 'image_6714593ad01a42.54636247.jfif'),
(46, 21, 'image_671459980293e2.42697218.jfif'),
(47, 21, 'image_6714599802ade5.60913359.jfif'),
(48, 21, 'image_671459980498e4.04733310.jfif'),
(49, 22, 'image_67145a047c56d4.64576874.jfif'),
(50, 22, 'image_67145a047c7197.32790606.jfif'),
(51, 22, 'image_67145a047c8b05.95361735.jfif'),
(52, 22, 'image_67145a047ca4f7.03270245.jfif'),
(53, 23, 'image_67146ea67f89c9.85429314.jfif'),
(54, 23, 'image_67146ea67f9c98.00924788.jfif'),
(55, 23, 'image_67146ea67fb395.30828531.jfif'),
(56, 24, 'image_6716137a126606.96360377.jfif'),
(57, 24, 'image_6716137a127aa4.51555367.jfif'),
(60, 25, 'image_671617935333d7.55886898.jfif'),
(61, 25, 'image_671617935347a0.36745801.jfif'),
(62, 25, 'image_67161793535bd6.41735686.jfif'),
(63, 26, 'image_6716184851a265.34082668.jfif'),
(64, 26, 'image_6716184851c0c5.95600388.jfif'),
(65, 26, 'image_6716184851d526.70273227.jfif'),
(66, 27, 'image_6717b1f8635cd9.09588046.jfif'),
(67, 27, 'image_6717b1f8637687.73403356.jfif'),
(68, 27, 'image_6717b1f8639024.95555695.jfif'),
(69, 28, 'image_671882c1e05fd1.23977457.jfif'),
(70, 28, 'image_671882c1e073a8.07413304.jfif'),
(71, 29, 'image_6723014a8dd292.29988079.jfif'),
(72, 29, 'image_6723014a8dedc1.55629717.jfif'),
(73, 29, 'image_6723014a8e07a2.26433375.jfif'),
(74, 30, 'image_672302a3361745.71910436.jfif'),
(75, 30, 'image_672302a3362a80.78247854.jfif'),
(76, 30, 'image_672302a3363ea8.77925530.jfif'),
(77, 31, 'image_672302c35e6c47.76603773.jpg'),
(78, 32, 'image_6723037e4b2e42.53085200.jpg'),
(79, 33, 'image_672303ea4d1cd6.34376249.jpg'),
(80, 34, 'image_672305c15512f6.09563625.jpg'),
(81, 35, 'image_67230650bf26f6.51666684.jfif'),
(82, 35, 'image_67230650bf3aa8.45798083.jfif'),
(83, 35, 'image_67230650bf5320.17623425.jfif'),
(84, 36, 'image_6724aec6f23105.41120616.jfif'),
(85, 36, 'image_6724aec6f25095.50087174.jfif'),
(86, 36, 'image_6724aec6f26d15.22737096.jfif'),
(87, 37, 'image_6725fa9881c5b4.90254050.jfif'),
(88, 37, 'image_6725fa9881df30.58988840.jfif'),
(89, 37, 'image_6725fa9881f9f3.14573911.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `account_id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`account_id`, `fullname`, `email`, `username`, `password`, `contact`, `account_type`, `profile_picture`) VALUES
(2, 'krelian quimson', 'quimsonkrelian@gmail.com', 'krel', '123', '09099897185', 'tenant', '6722ffec2d1a4.jpg'),
(5, 'josh velayo', 'josh@gmail.com', 'josh', '123', '09099897185', 'tenant', 'profile4.jpg'),
(7, 'ian rodis', 'ian@gmail.com', 'ian', '123', '09099897185', 'tenant', 'profile5.jpg'),
(8, 'john doe', 'johndoe@gmail.com', 'john', '123', '09099897185', 'tenant', 'image-men-service-techniques-02.jpg'),
(9, 'rainrix rodis', 'rainrix@gmail.com', 'rainrix', '123', '09099897185', 'tenant', 'profile6.jpg'),
(10, 'lulu rodis', 'lulu@gmail.com', 'lulu', '123', '09099897185', 'tenant', 'DEFAULT_PROFILE.png'),
(11, '11 11', '11@gmail.com', '11', '11', '09099897185', 'tenant', 'DEFAULT_PROFILE.png'),
(12, '22 22', '22@gmail.com', '12', '22', '09099897185', 'tenant', 'DEFAULT_PROFILE.png'),
(13, 'loyd dela cruz', 'loyd@gmail.com', 'loyd', '1234', '09099897185', 'tenant', 'DEFAULT_PROFILE.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `convo`
--
ALTER TABLE `convo`
  ADD PRIMARY KEY (`convo_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`favorite_id`);

--
-- Indexes for table `landlords`
--
ALTER TABLE `landlords`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `like_react`
--
ALTER TABLE `like_react`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `post_property`
--
ALTER TABLE `post_property`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `property_post_pictures`
--
ALTER TABLE `property_post_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `convo`
--
ALTER TABLE `convo`
  MODIFY `convo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `landlords`
--
ALTER TABLE `landlords`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `like_react`
--
ALTER TABLE `like_react`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `post_property`
--
ALTER TABLE `post_property`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `property_post_pictures`
--
ALTER TABLE `property_post_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
