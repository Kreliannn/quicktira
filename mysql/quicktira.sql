-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 03:06 PM
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
-- Database: `quicktira`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_feedback`
--

CREATE TABLE `admin_feedback` (
  `message_id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `sender_fullname` varchar(255) DEFAULT NULL,
  `sender_email` varchar(255) DEFAULT NULL,
  `message_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_feedback`
--

INSERT INTO `admin_feedback` (`message_id`, `message`, `sender_fullname`, `sender_email`, `message_type`) VALUES
(1, 'i like the website ', 'krelian quimson', 'krelianquimson@gmail.com', 'read'),
(2, 'bla bla bla bla bla', 'marie badet', 'marie@gmail.com', 'read'),
(3, 'hello this is my feedback bla bal blaa', 'hazel anne', 'hazel@gmail.com', 'read'),
(4, 'ba;lkjfjlaksfjlavj ajvjlk ajkljv  jiaoj a ljkaj lkjfkaj klaj kj kaj kajkl faj k', 'justine doguiles', 'justine@gmail.com', 'read'),
(5, 'thankyou!! great service', 'ian rodis', 'ian@gmail.com', 'read'),
(6, 'asd asd asd ad asd as', 'joy krel', 'joy@gmail.com', 'read'),
(7, 'dasdasdsa', 'joy 123', 'dasda', 'read'),
(8, 'asdasda', 'loyd adsd', 'asdasd', 'read'),
(9, 'asdasdasdasdasda', 'gab camacho', 'asdasda', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `admin_report`
--

CREATE TABLE `admin_report` (
  `report_id` int(11) NOT NULL,
  `report_account_id` varchar(255) DEFAULT NULL,
  `report_account_fullname` varchar(255) DEFAULT NULL,
  `post_id` varchar(255) DEFAULT NULL,
  `report_message` varchar(255) DEFAULT NULL,
  `report_reason` varchar(255) DEFAULT NULL,
  `sender_fullname` varchar(255) DEFAULT NULL,
  `report_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_report`
--

INSERT INTO `admin_report` (`report_id`, `report_account_id`, `report_account_fullname`, `post_id`, `report_message`, `report_reason`, `sender_fullname`, `report_type`) VALUES
(1, '4', 'peppa bunyi', '18', 'this account is toxic', 'Misleading Photos', 'krelian quimson', 'read'),
(2, '3', 'conan gray', '20', 'bla bla bla', 'Violation of Terms', 'krelian quimson', 'read'),
(3, '2', 'joy boy', '25', 'kjnasfkjnasfnasf', 'Inappropriate Content', 'ian rodis', 'read'),
(4, '1', 'belle catada', '17', 'asfasfasfasfaf', 'Inaccurate Information ', 'krelian quimson', 'read'),
(5, '5', 'rose marie', '39', 'tangina ', 'Misleading Photos', 'krelian quimson', 'read');

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
(23, 2, 1),
(24, 2, 6);

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
(74, 37, 2),
(75, 40, 2);

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
  `profile_picture` varchar(255) DEFAULT NULL,
  `isRenting` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landlords`
--

INSERT INTO `landlords` (`account_id`, `fullname`, `email`, `username`, `password`, `contact`, `account_type`, `profile_picture`, `isRenting`) VALUES
(1, 'belle catada', 'belle@gmail.com', 'belle', '123', '09039897185', 'landlord', '672307da73fe3.jpg', NULL),
(2, 'joy boy', 'joyboy@gmail.com', 'joyboy', '123', '09099897185', 'landlord', '67230717c89c4.jpg', NULL),
(3, 'conan gray', 'conan@gmail.com', 'conan', '123', '09099897185', 'landlord', '6723082e31dc1.jpg', NULL),
(4, 'peppa bunyi', 'peppa@gmail.com', 'peppa', '123', '09099897185', 'landlord', 'Anya spy x family.jfif', NULL),
(5, 'rose marie', 'rose@gmail.com', 'rose', '123', '09099897185', 'landlord', '67188941cdf61.jfif', NULL),
(6, 'aisen rodis', 'aisen@gmail.com', 'aisen', '123', '09099897185', 'landlord', '6724ae52eb7f4.jfif', NULL),
(8, 'vince de la cruz', 'vince@gmail.com', 'vince', '123', '09099897185', 'landlord', 'DEFAULT_PROFILE.png', NULL);

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
(103, 25, 2),
(106, 19, 2),
(120, 27, 7),
(122, 21, 2),
(123, 18, 2),
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
(136, 26, 7),
(139, 24, 2),
(141, 17, 2),
(142, 24, 5),
(143, 38, 2),
(144, 36, 2),
(145, 40, 2),
(146, 39, 2);

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
  `post_status` varchar(255) DEFAULT NULL,
  `latitude` decimal(20,15) DEFAULT NULL,
  `longitude` decimal(20,15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_property`
--

INSERT INTO `post_property` (`post_id`, `landlord_id`, `post_title`, `post_images`, `post_price`, `post_description`, `post_location`, `room_count`, `bathroom_count`, `sqr_meters`, `post_created_at`, `address`, `post_status`, `latitude`, `longitude`) VALUES
(17, 1, 'house for rent', 'image_671456e759e362.10199526.jfif', 5000, 'Welcome to your new home! This spacious and inviting 3-bedroom, 2-bathroom house is perfect for families and professionals alike. With an open-concept living and dining area, it’s designed for comfort and entertaining. The well-equipped kitchen features modern appliances, ample storage, and a breakfast nook for casual dining.\r\n\r\nThe master bedroom boasts an ensuite bathroom and generous closet space, while the two additional bedrooms are bright and versatile—ideal for children, guests, or a home office. Enjoy your private backyard, perfect for outdoor relaxation or gatherings.\r\n\r\nLocated in a quiet, friendly neighborhood, this home offers easy access to local parks, schools, and shopping. With convenient public transport options nearby, commuting is a breeze.\r\n\r\nDon\'t miss this opportunity to make this charming house your home! Contact us today to schedule a viewing.', 'H2', 3, 2, 200, '10/20/24', 'lot 3 blk 2', 'inactive', 14.329839727773935, 120.958635807037370),
(18, 4, 'looking for tenant', 'image_671457ae1db719.21987452.jfif', 7000, 'This cozy 2-bedroom, 1-bathroom house is ready for you! Enjoy an open living area, a modern kitchen, and a private backyard. Located in a quiet neighborhood close to parks and shops. Perfect for families or professionals.\r\n\r\nContact us today to schedule a viewing!', 'San Lorenzo Ruiz', 2, 1, 300, '10/20/24', 'lot 5 blk 3', 'active', 14.309734840345463, 120.956382751464860),
(19, 2, 'rent this house', 'image_6714588f4ed740.31139763.jfif', 4500, 'Charming 3-bedroom, 2-bathroom home available for rent. Features a spacious living area, updated kitchen, and a nice backyard. Conveniently located near parks and shopping. Ideal for families or anyone looking for comfort.', 'San Mariano', 1, 1, 300, '10/20/24', 'lot 1 blk 1', 'active', 14.328633901124460, 120.975458621978770),
(20, 3, 'modern house for rent', 'image_6714593acfdc82.77139991.jfif', 11000, 'Discover this sleek 3-bedroom, 2-bathroom home designed for contemporary living. Enjoy an open layout with stylish finishes, a gourmet kitchen with stainless steel appliances, and a spacious living area that flows into a private backyard. Located in a vibrant neighborhood with easy access to shops and parks. Perfect for those seeking a stylish and convenient lifestyle.', 'H2', 3, 2, 500, '10/20/24', 'lot 3  blk 5', 'active', 14.330505008667672, 120.958743095397960),
(21, 1, '3 bedroom for rent', 'image_67145998027b65.48433875.jfif', 8000, 'Step into this modern 3-bedroom, 2-bathroom house featuring an open floor plan and sleek design. Enjoy a bright living space, a gourmet kitchen with high-end appliances, and a lovely backyard perfect for relaxing. Situated in a desirable neighborhood close to amenities. Ideal for those looking for comfort and style.', 'San Lorenzo Ruiz', 3, 1, 100, '10/20/24', 'lot 5 blk 5', 'active', 14.312001148305447, 120.957176685333270),
(22, 5, 'new house for rent', 'image_67145a047c3c19.53401511.jfif', 9000, 'Step into this modern 3-bedroom, 2-bathroom house featuring an open floor plan and sleek design. Enjoy a bright living space, a gourmet kitchen with high-end appliances, and a lovely backyard perfect for relaxing. Situated in a desirable neighborhood close to amenities. Ideal for those looking for comfort and style.', 'San Mariano', 1, 1, 400, '10/20/24', 'lot 1 blk 6', 'active', 14.328883383032048, 120.977861881256120),
(23, 3, 'house for rent', 'image_67146ea67f72a4.24301722.jfif', 10000, 'hahahahahahhahahaha', 'San Mariano', 1, 1, 400, '10/20/24', 'lot 6 blk 8', 'active', 14.330546588657997, 120.977067947387710),
(24, 1, 'house for rent haha', 'image_6716137a124bf5.75155174.jfif', 9000, 'wala akong maisip', 'San Mariano', 2, 1, 400, '10/21/24', 'lot 6 blk 1', 'inactive', 14.327178584466653, 120.976853370666520),
(25, 2, 'post', 'image_671617935319e6.66872391.jfif', 8000, 'asdasdas', 'H2', 2, 1, 100, '10/21/24', 'lot 4 blk 2', 'active', 14.331877144278488, 120.957026481628430),
(26, 5, 'new house', 'image_67161848518692.81918156.jfif', 11000, 'wala akong maisip ', 'San Mariano', 3, 1, 500, '10/21/24', 'lot 4 blk 4', 'active', 14.326679616581997, 120.980544090271010),
(27, 1, 'post 3', 'image_6717b1f8634441.00536151.jfif', 7000, 'adffafasfasfasfaffffff', 'San Mariano', 11, 1, 100, '10/22/24', 'blk 2 lot 3', 'active', 14.324954010759036, 120.979857444763200),
(28, 3, 'yfttyrfty', 'image_671882c1e048a6.88621894.jfif', 565, 'yggyjyg', 'San Lorenzo Ruiz', 1, 1, 78778, '10/23/24', 'uyfuugyy', 'active', 14.311003143948225, 120.961318016052260),
(29, 1, 'post 9', 'image_6723014a8db9e2.24614996.jpg', 9000, 'adasd adas das das da', 'San Mariano', 1, 1, 100, '10/31/24', 'lot 4 blk 4', 'inactive', 14.326367761090525, 120.977261066436780),
(30, 2, 'lf tenant', 'image_672302a335ffe2.51864126.jpg', 7000, 'dadasdasdsad', 'H2', 1, 1, 100, '10/31/24', 'lot 4 blk 4', 'active', 14.331295027165861, 120.958700180053730),
(35, 2, 'dadsa', 'image_67230650bf0f26.75997413.jpg', 11000, 'asdasda', 'San Lorenzo Ruiz', 1, 1, 100, '10/31/24', 'lot 4 blk 4', 'active', 14.310317013380180, 120.958657264709490),
(36, 6, 'modern house for rent', 'image_6724aec6f20d36.87449323.jfif', 15000, 'anfkaskljfv aufkoafk akufasf aj fao  aok ia ', 'San Mariano', 4, 4, 300, '11/01/24', 'lot 4 blk 4', 'active', 14.324704524481685, 120.978591442108170),
(37, 6, 'new post', 'image_6725fa9881a905.75458208.jfif', 7000, 'sadasdasd', 'H2', 1, 1, 100, '11/02/24', 'lot 4 blk 4', 'active', 14.330505008667672, 120.959558486938490),
(38, 6, 'lf tenant', 'image_67301012d35f61.70615620.jpg', 5000, 'modern house with 2 rooms and 1  cr good for 2 head', 'San Lorenzo Ruiz', 2, 1, 100, '11/10/24', 'blck 2 lot 12 phase 1', 'inactive', 14.310876281423013, 120.960213951766500);

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
(89, 37, 'image_6725fa9881f9f3.14573911.jfif'),
(90, 38, 'image_67301012d3af83.42007731.jpg'),
(91, 38, 'image_67301012d3fd04.54349397.jpg'),
(92, 38, 'image_67301012d43a90.57239407.jpg'),
(93, 39, 'image_67494ef4cb79d7.54239066.jpg'),
(94, 39, 'image_67494ef4cbf254.47292818.jpg'),
(95, 40, 'image_674950690e6e54.39668101.jpg'),
(96, 40, 'image_674950690eaa18.73279066.jpg'),
(97, 41, 'image_67495141d83330.96443754.jpg'),
(98, 41, 'image_67495141d881c7.58587188.jpg'),
(99, 42, 'image_674956647c2e80.12846770.jpg'),
(100, 43, 'image_674956a6a07714.74956064.jpg'),
(101, 43, 'image_674956a6a0c591.75981423.jpg'),
(102, 44, 'image_6749b72a443cf9.47095318.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `taken_property`
--

CREATE TABLE `taken_property` (
  `property_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `landlord_id` int(11) DEFAULT NULL,
  `tenant_id` int(11) DEFAULT NULL,
  `num_occupants` int(11) NOT NULL,
  `move_in_date` date NOT NULL,
  `deadline` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `taken_property`
--

INSERT INTO `taken_property` (`property_id`, `post_id`, `landlord_id`, `tenant_id`, `num_occupants`, `move_in_date`, `deadline`) VALUES
(2, 17, 1, 9, 2, '2024-11-17', '2024-12-17'),
(3, 24, 1, 5, 5, '2024-11-21', '2024-12-21'),
(6, 38, 6, 8, 1, '2024-11-29', '2024-12-29'),
(9, 29, 1, 2, 3, '2024-12-05', '2025-01-04');

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
  `profile_picture` varchar(255) DEFAULT NULL,
  `isRenting` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`account_id`, `fullname`, `email`, `username`, `password`, `contact`, `account_type`, `profile_picture`, `isRenting`) VALUES
(2, 'krelian quimson', 'quimsonkrelian@gmail.com', 'krel', '123', '09099897185', 'tenant', '6722ffec2d1a4.jpg', 'no'),
(5, 'josh velayo', 'josh@gmail.com', 'josh', '123', '09099897185', 'tenant', 'profile4.jpg', 'yes'),
(7, 'ian rodis', 'ian@gmail.com', 'ian', '123', '09099897185', 'tenant', 'profile5.jpg', 'yes'),
(8, 'john doe', 'johndoe@gmail.com', 'john', '123', '09099897185', 'tenant', 'image-men-service-techniques-02.jpg', 'no'),
(9, 'rainrix rodis', 'rainrix@gmail.com', 'rainrix', '123', '09099897185', 'tenant', 'profile6.jpg', 'no'),
(15, 'justine carolino', 'justine@gmail.com', 'justine', '123', '09099897185', 'tenant', 'DEFAULT_PROFILE.png', 'no'),
(18, 'marie landingin', 'marie@gmail.com', 'marie', '123', '09099897185', 'tenant', 'DEFAULT_PROFILE.png', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_applications`
--

CREATE TABLE `tenant_applications` (
  `apply_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `landlord_id` int(11) DEFAULT NULL,
  `tenant_id` int(11) DEFAULT NULL,
  `tenant_fullname` varchar(255) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `num_occupants` int(11) NOT NULL,
  `move_in_date` date NOT NULL,
  `employment_work` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tenant_applications`
--

INSERT INTO `tenant_applications` (`apply_id`, `post_id`, `landlord_id`, `tenant_id`, `tenant_fullname`, `contact_phone`, `contact_email`, `num_occupants`, `move_in_date`, `employment_work`) VALUES
(2, 17, 1, 7, 'ian rodis', '09099897185', 'ian@gmail.com', 1, '2024-11-17', 'N/A'),
(3, 17, 1, 9, 'rainrix rodis', '09099897185', 'rainrix@gmail.com', 2, '2024-11-17', 'N/A'),
(4, 24, 1, 5, 'josh velayo', '09099897185', 'josh@gmail.com', 5, '2024-11-21', 'N/A'),
(6, 38, 6, 8, 'john doe', '09099897185', 'johndoe@gmail.com', 2, '0000-00-00', 'N/A'),
(7, 21, 1, 8, 'john doe', '09099897185', 'johndoe@gmail.com', 1, '0000-00-00', 'N/A'),
(8, 38, 6, 8, 'john doe', '09099897185', 'johndoe@gmail.com', 1, '2024-11-29', 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_feedback`
--
ALTER TABLE `admin_feedback`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `admin_report`
--
ALTER TABLE `admin_report`
  ADD PRIMARY KEY (`report_id`);

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
-- Indexes for table `taken_property`
--
ALTER TABLE `taken_property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tenant_applications`
--
ALTER TABLE `tenant_applications`
  ADD PRIMARY KEY (`apply_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_feedback`
--
ALTER TABLE `admin_feedback`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_report`
--
ALTER TABLE `admin_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `convo`
--
ALTER TABLE `convo`
  MODIFY `convo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `landlords`
--
ALTER TABLE `landlords`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `like_react`
--
ALTER TABLE `like_react`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `post_property`
--
ALTER TABLE `post_property`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `property_post_pictures`
--
ALTER TABLE `property_post_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `taken_property`
--
ALTER TABLE `taken_property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tenant_applications`
--
ALTER TABLE `tenant_applications`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
