-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2024 at 11:04 AM
-- Server version: 5.7.44
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ketexcom_ketex_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `am_id` bigint(20) NOT NULL,
  `am_name` varchar(256) NOT NULL,
  `am_phone` varchar(256) NOT NULL,
  `am_email` varchar(256) NOT NULL,
  `am_user_id` varchar(256) NOT NULL,
  `am_password` varchar(256) NOT NULL,
  `am_added_modified` datetime NOT NULL,
  `am_last_login` datetime NOT NULL,
  `am_status` int(1) NOT NULL,
  `am_hash` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`am_id`, `am_name`, `am_phone`, `am_email`, `am_user_id`, `am_password`, `am_added_modified`, `am_last_login`, `am_status`, `am_hash`) VALUES
(1, 'admin', '342422', 'admin@keylines.net', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-07-08 00:00:00', '2022-02-14 10:42:51', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `application_category`
--

CREATE TABLE `application_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_alias` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_category`
--

INSERT INTO `application_category` (`cat_id`, `cat_name`, `cat_alias`, `created_at`, `updated_at`) VALUES
(1, 'Technical Textiles ', 'CAT001', '2022-02-18 12:13:50', '2022-02-21 15:52:37'),
(2, ' Fiber Glass Fabric', 'CAT002', '2022-02-21 00:00:00', '2022-03-31 15:48:17'),
(3, 'FRP Tray', 'CAT003', '2022-02-21 00:00:00', '2022-02-21 15:53:34'),
(4, 'Non-Metallic Expansion Joints', NULL, '2022-02-24 00:00:00', '0000-00-00 00:00:00'),
(5, 'Unvarying Metal Dispersal', NULL, '2022-02-24 00:00:00', '0000-00-00 00:00:00'),
(6, 'Reduces Turbulence', NULL, '2022-02-24 00:00:00', '0000-00-00 00:00:00'),
(8, 'Test Category', '', '2022-03-21 17:34:39', '2022-04-08 14:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `application_details`
--

CREATE TABLE `application_details` (
  `app_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `app_name` varchar(100) NOT NULL,
  `app_description` varchar(2000) NOT NULL,
  `app_image` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_details`
--

INSERT INTO `application_details` (`app_id`, `cat_id`, `app_name`, `app_description`, `app_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Desized & Silane Treated ', '<p>Glass Fabrics for PCBs.</p>\r\n', 'application22-02-22_1645512959.jpg', '2022-02-21 00:00:00', '2022-02-22 12:02:28'),
(5, 3, 'Gauntlets for Lead Acid Storage Battery', 'Fiber Glass Fabric ', 'application21-02-22_1645446915.jpg', '2022-02-21 00:00:00', '0000-00-00 00:00:00'),
(6, 2, ' Lead Acid ', 'Storage Battery', 'application21-02-22_1645446981.png', '2022-02-21 06:02:21', '0000-00-00 00:00:00'),
(7, 1, ' Lead Acid Storage Battery', '<p>Silicone coated fiberglass fabrics from AS-KETEX offers good resistance to high temperatures, bei', 'application22-02-22_1645521544.jpg', '2022-02-22 02:02:04', '0000-00-00 00:00:00'),
(8, 3, ' Lead Acid ', '<p>AS-KETEX filtration fabrics are manufactured from special high-twist yarn, and they have been used successfully world wide for more than 15 years. They meet highest technical requirements as guaranteed high thermal resistance of 720 &deg;C for 4 hours. AS-KETEX also manufactured Thermo Formed Combo Bags, custom designed and woven specially for aluminium diffusion and filtration.</p>\r\n', 'application22-02-22_1645521808.jpg', '2022-02-22 02:02:28', '0000-00-00 00:00:00'),
(9, 2, 'Desized', '<p>Widely used for Filtration of molten Aluminium in foundry of automobile wheel, motorcycle wheel, cylinder piston as well as aluminium alloy parts. AS-KETEX Thermally Formed Combo Bags does....(a) stays firm continuously for a longer time @ 1200 &deg;C (b) have very low smoke and flame when in contact with Molten Aluminium. (c) results a are very cost effective and yields higher ROI. (d) resourcefully decrease the scuffle after the casting and smelting. (e) comprises of the high thermal resistant. (f) have effective properties to eliminate the inclusions, which results perfection of mechanical strength and surface finish.</p>\r\n', 'application22-02-22_1645521884.jpg', '2022-02-22 02:02:44', '0000-00-00 00:00:00'),
(10, 4, 'Negligible Odor', '<p>Shining with pride, Amer-Sil Ketex Pvt. Ltd. is one the leading organizations in India, specializing in making Industrial Lead-acid battery components, Microporous PVC / Silica separators.</p>\r\n', 'application24-02-22_1645682555.jpg', '2022-02-24 11:02:35', '0000-00-00 00:00:00'),
(11, 6, 'Diminish Scrap', '<p>Our organization has set a benchmark in the manufacturing and production industry in the country, with manufacturing plants in India and Bangladesh. With years of research and development, we have reached the pinnacle of success in sales, production, exports, deliverables, cooperation, and distribution, giving paramount importance to quality.</p>\r\n', 'application24-02-22_1645682593.jpg', '2022-02-24 11:02:13', '0000-00-00 00:00:00'),
(12, 5, 'Eradicates Oxides', '<p>KETEX is the supreme manufacturer of Technical Textiles in India. Our company is specialized in making fiberglass fabrics, woven and non-woven tubular bags, gauntlets for submarine batteries, PVC, silica, carbon black and stabilizers, high thermal resistant combo bags, lead-acid batteries, etc.</p>\r\n', 'application24-02-22_1645682630.jpg', '2022-02-24 11:02:50', '0000-00-00 00:00:00'),
(13, 6, 'Thermo Formed Combo Bags', '<p>Amer-Sil Ketex Pvt Ltd is the largest manufacturer of Tubular bags in India and Bangladesh. We constantly strive to improve our production processes, products, and services, thus delivering products of the finest quality. Currently, &nbsp;we have four manufacturing plants for forming and weaving units. The main plant is located at Kharagpur in West Bengal, whereas others are at &nbsp;Gagret in Himachal Pradesh, Bengaluru in Karnataka, and Dhaka in Bangladesh.</p>\r\n', 'application24-02-22_1645682703.jpg', '2022-02-24 11:02:03', '0000-00-00 00:00:00'),
(14, 4, 'Molten Aluminium', '<p>We have acquired the facilities of the modern weaving units for processing and coating the fabrics with various polymers and resin systems. Our team of engineers and consultants is always available, not only to solve problems but for enhanced research and development of our products.</p>\r\n', 'application24-02-22_1645682754.jpg', '2022-02-24 11:02:54', '0000-00-00 00:00:00'),
(15, 5, 'Glass Filtration Fabric', '<p>Our plant units all over India and Bangladesh have been producing 250 million linear meters of tubes annually. Our manufacturing products are lead-acid batteries, woven and non-woven tubular bags, PVC Silica separators, and certain plastic components.</p>\r\n', 'application24-02-22_1645682811.jpg', '2022-02-24 11:02:51', '0000-00-00 00:00:00'),
(16, 2, 'test1', 'test description1', '1647865900.png', '2022-03-21 17:51:35', '2022-03-21 18:01:40'),
(17, 4, 'test application', 'test application description', '1647865939.png', '2022-03-21 18:00:28', '2022-03-21 18:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `awords`
--

CREATE TABLE `awords` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `awords`
--

INSERT INTO `awords` (`id`, `image`, `description`, `year`) VALUES
(8, '1649398983.png', 'EXIDE HOSUR', '13-14'),
(9, '1649399374.png', 'Aditya Birla', '14-15'),
(10, '1649399422.png', 'Exide Industries Limited', '2015'),
(11, '1649399498.png', 'Eastman', '2019'),
(12, '1649399544.png', 'Luxembourg', '2021'),
(15, '1652760559.jpg', 'Luminous ', '2019'),
(16, '1652762888.jpg', 'Ministry Of HRD Govt. of India', '2017'),
(17, '1652790832.jpg', 'Medal from Mrs. Peggy Frantzen - Ambassador of Luxembourg to India to our MD. Mr. Sukumar Roy', '2022'),
(18, '1654241006.jpg', 'CSR ACTIVITY - Thalassemia Camp & Main Gate Of Raja Narendra Lal\r\nKhan Women College\" ', '2022'),
(19, '1655279598.jpg', 'VINOD GUPTA SCHOOL OF MANAGEMENTâ€“IIT KHARAGPUR, Organised  Supervisory Development Program ', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `map` longtext NOT NULL,
  `title` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `fax` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `map`, `title`, `address`, `phone`, `fax`, `email`, `createdAt`) VALUES
(3, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3465.4015737840828!2d87.303981!3d22.304433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0!2zMjLCsDE4JzE2LjAiTiA4N8KwMTgnMTQuMyJF!5e1!3m2!1sen!2sin!4v1652676246427!5m2!1sen!2sin', 'REGISTRERED ADDRESS', '<strong> Amer-Sil Ketex Private Limited </strong> <br> Plot No. 71, Salua Road P.O. Hijli Co-Operative Society Prem Bazar, KHARAGPUR Pin: 721306 W.B, India', '+91 3222 277285', '', 'info@ketex.com', '2022-05-16 14:46:01'),
(4, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3463.5068494884918!2d87.367018!3d22.380675!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe1ad5a8875316a87!2sAmer-Sil%20Ketex%20Pvt.%20Ltd.!5e1!3m2!1sen!2sin!4v1652426988273!5m2!1sen!2sin', 'WORKS: KHARAGPUR UNIT 1', '<strong>Amer-Sil Ketex Private Limited - Unit 1 (Kharagpur) </strong> <br>P.O. Jakpur, NH: 06 & 60  Junction, Vill: Rupnarayanpur KHARAGPUR-721301, WB, India', '+91 3222 291521', '', 'sales@ketex.com', '2022-05-13 22:42:48'),
(5, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6927.843913230782!2d87.35234613905345!3d22.3639925587327!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1d4522fd7b4e07%3A0x1142a422c0ea6aad!2sAMER-SIL%20KETEX%20PVT%20LTD.%20(VIP%20UNIT)!5e1!3m2!1sen!2sin!4v1652427560798!5m2!1sen!2sin', 'WORKS: KHARAGPUR UNIT II (VIP)', '<strong> Amer-Sil Ketex Private Limited - VIP Unit (Kharagpur) </strong> <br>Vidyasagar Industrial Park Plot No. F2/II, Vill. Rupnarayanpur KHARAGPUR LOCAL â€“ 721301, WB, India ', '', '', 'sales@ketex.com', '2022-05-14 17:49:56'),
(6, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1593.7510325714097!2d76.0806497!3d31.6807341!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391b19cdceddce59%3A0x6eb8a31491fb92e6!2sAmer%20Sil%20Ketex%20Pvt%20Ltd%20(Unit%201)!5e1!3m2!1sen!2sin!4v1648466990273!5m2!1sen!2sin>', 'WORKS: GAGRET - Unit I', '<strong> Amer-Sil Ketex Private Limited - (Gagret - Unit I) </strong> <br> Plot No. 13,3 & 4, Industrial Area Phase: III, Tehsil: Amb, Dist.: UNA GAGRET, Pin: 177201, HP, India', '+91 98050 06784', '', 'accounts@asketex.com', '2022-05-27 16:51:18'),
(13, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3187.6704177786105!2d76.0741896!3d31.6758303!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391b1f528d9108bf%3A0xbff431a59fb86557!2sAmer-Sil%20Ketex%20Pvt.%20Ltd!5e1!3m2!1sen!2sin!4v1653650329155!5m2!1sen!2sin', 'WORKS: GAGRET - Unit II', '<strong>Amer-Sil Ketex Private Limited - (Gagret - Unit II)</strong>, Ambota, Himachal Pradesh, 177205', '', '', '', '2022-05-27 16:50:54'),
(14, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1826.390176590151!2d77.655545!3d12.7853256!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae6eab0c6d1125%3A0xe74090e9db88ae5e!2sAMER-SIL%20KETEX%20PVT%20LTD!5e1!3m2!1sen!2sin!4v1648467299646!5m2!1sen!2sin', 'WORKS: BENGALURU', '<strong> Amer-Sil Ketex Private Limited - (Bengaluru) </strong> <br> No. 220 & 221, KIADB Industrial Area Bommasandra, Jigani Link Road  BENGALURU - Pin: 560099, KA. India', '+91 80 2783 9933', '', 'askblr.sales@gmail.com', '2022-05-27 16:51:58'),
(15, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3425.0898566928386!2d90.28695211498375!3d23.8767784845273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa742823892648f0a!2zMjPCsDUyJzM2LjQiTiA5MMKwMTcnMjAuOSJF!5e1!3m2!1sen!2sin!4v1652097020133!5m2!1sen!2sin', 'Works â€“ Dhaka', '<strong> KE Technical Textiles (Bangladesh) Limited - (Dhaka) </strong> <br>DAG# 450,452,457, Kalma-1 Savar, DHAKA, Bangladesh', '+880 1713081757', '', 'sajidahmed18@gmail.com', '2022-05-27 16:52:36'),
(16, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3466.958178184007!2d87.2702222!3d22.2416111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x19560a695b7c9170!2zMjLCsDE0JzI5LjgiTiA4N8KwMTYnMTIuOCJF!5e1!3m2!1sen!2sin!4v1652693328907!5m2!1sen!2sin', 'WORKS: BHETIA', '<strong> Amer-Sil Ketex Private Limited  </strong> <br>SH-5, Vill Bhetia P.O. Demouli Paschim Medinipur - 721145, WB, India.', '', '', '', '2022-05-27 16:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `career_enquiry`
--

CREATE TABLE `career_enquiry` (
  `enquiry_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `year_exp` varchar(255) NOT NULL,
  `job_id` int(11) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_department`
--

CREATE TABLE `employee_department` (
  `dep_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `sort_number` int(11) NOT NULL,
  `create_add` date NOT NULL,
  `update_add` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_department`
--

INSERT INTO `employee_department` (`dep_id`, `department_name`, `sort_number`, `create_add`, `update_add`) VALUES
(7, 'Executive', 2, '2022-05-12', '2022-05-17'),
(9, 'Business, Research & Development', 3, '2022-05-12', '2022-05-17'),
(10, 'Sales & Marketing', 4, '2022-05-12', '2022-05-13'),
(12, 'HR', 7, '2022-05-12', '2022-05-14'),
(13, 'Supply Chain & Logistics', 8, '2022-05-12', '2022-05-14'),
(14, 'Finance', 6, '2022-05-12', '2022-05-14'),
(15, 'Engineering & Maintenance', 5, '2022-05-12', '2022-05-14'),
(23, 'IT', 9, '2022-05-14', '2022-05-14'),
(27, 'Directors', 1, '2022-05-17', '2022-05-17'),
(28, 'Production', 10, '2022-05-26', '2022-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `employee_department_details`
--

CREATE TABLE `employee_department_details` (
  `emp_id` int(11) NOT NULL,
  `dep_id` varchar(20) NOT NULL,
  `employee_image` varchar(255) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `emp_designation` varchar(100) NOT NULL,
  `sort_number` int(11) NOT NULL,
  `create_add` date NOT NULL,
  `update_add` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_department_details`
--

INSERT INTO `employee_department_details` (`emp_id`, `dep_id`, `employee_image`, `employee_name`, `emp_designation`, `sort_number`, `create_add`, `update_add`) VALUES
(14, '9', '1652369676.png', 'Dr. Shankar Chandra Khatua ', 'Executive Officer - High Temperature & Performance Textiles', 1, '2022-05-12', '2022-06-01'),
(15, '9', '1652369721.png', 'Dr. Indranil Roy ', 'Dy. Manager Advance Technical Textiles', 2, '2022-05-12', '2022-06-01'),
(16, '9', '1655202568.png', 'Dibyendu Prakash Mondal ', 'Head R&D and Fiberglass Processing Indian Operations', 3, '2022-05-12', '2022-06-14'),
(18, '15', '1652369846.png', 'Chayan Maiti', 'Manager Maintenance &<br>Engineering Kharagpur Operations', 11, '2022-05-12', '2022-05-18'),
(19, '15', '1652369877.png', 'Sandip Sahoo', 'Dy. Manager Maintenance &<br>Bangladesh Operations', 12, '2022-05-12', '2022-05-18'),
(20, '15', '1652369898.png', 'Dibyendu Dalai ', 'Assistant Manager Maintenance', 13, '2022-05-12', '2022-05-14'),
(21, '27', '1655546678.jpg', 'Sukumar Roy ', 'Managing Director', 1, '2022-05-12', '2022-06-18'),
(22, '27', '1652370092.png', 'Tapas Ranjan Ghosh', 'Production', 3, '2022-05-12', '2022-06-18'),
(23, '7', '1654930866.png', 'Mrinal Kanti Sen ', 'CEO Indian Operation', 1, '2022-05-12', '2022-06-11'),
(24, '14', '1655277833.png', 'Amitava Dey ', 'Sr. Manager Finance & System Admin', 1, '2022-05-12', '2022-06-15'),
(28, '12', '1652370475.png', 'Avik ', 'Asst. Manager HR & Administration', 18, '2022-05-12', '2022-10-28'),
(33, '13', '1655110879.png', 'Manish Kumar Singh ', 'Asst. Manager Purchase', 20, '2022-05-12', '2022-06-13'),
(34, '13', '1652371384.png', 'Pratap Ghosh ', 'Sr. Executive - Logistics', 21, '2022-05-12', '2022-05-14'),
(36, '27', '1652518652.png', 'Yasowant Roy ', 'Director', 2, '2022-05-14', '2022-06-18'),
(37, '10', '1655110925.png', 'Gurmeet Singh Dhani ', 'Sr. Manager Sales & System Admin ', 9, '2022-05-14', '2022-06-13'),
(39, '23', '1655111027.png', 'Gurmeet Singh Dhani', 'Sr. Manager Sales & System Admin', 22, '2022-05-14', '2022-06-13'),
(40, '23', '1655277851.png', 'Amitava Dey', 'Sr. Manager Finance & System Admin', 23, '2022-05-14', '2022-06-15'),
(41, '10', '1652518935.png', 'Abhisek Chatterjee ', 'Sr. Manager Sales (Battery Product)', 10, '2022-05-14', '2022-05-14'),
(59, '7', '1653890642.png', 'Aloke Saha Roy ', 'CEO Gagret Division', 4, '2022-05-16', '2022-05-30'),
(60, '14', '1654000978.png', 'Sovan Pal', 'Assistant Manager (A/c, Fin & Costing)- Gagret Div', 5, '2022-05-16', '2022-06-15'),
(61, '14', '1654000686.png', 'Sanjeev Kumar', 'Sr. Manager Finance & A/c. Gagret Divsion', 2, '2022-05-16', '2022-06-15'),
(62, '9', '1652707659.png', 'Deepajjal Ghosh', 'Asst.Manager-QC & Operation Gagret Div', 8, '2022-05-16', '2022-05-17'),
(63, '28', '1653549101.png', 'Gautam', 'Dy. Manager Production: Kharagpur Div', 24, '2022-05-26', '2022-05-26'),
(64, '28', '1653558113.png', 'Ariji Mondal', 'Asst. Manager - NW Gauntlet Production', 25, '2022-05-26', '2022-05-26'),
(68, '15', '1654000344.png', 'Ashish Maity', 'Dy. Manager: Automation and Maintenance, Gagret Div', 21, '2022-05-31', '2022-05-31'),
(69, '28', '1654001241.png', 'Siddicharan U', 'Team Lead - Bengaluru Div.', 29, '2022-05-31', '2022-05-31'),
(70, '10', '1654001382.png', 'Sourav Das', 'Sales - Executive: Bengaluru Div', 31, '2022-05-31', '2022-05-31'),
(71, '14', '1655550657.png', 'Narayan Singha', 'Dy. Manager A/c & Fin - Kharagpur Div', 3, '2022-06-15', '2022-06-18'),
(72, '14', '1655557717.png', 'Sukanta Singh Roy', 'Asst. Manager Commercial & Taxation Kharagpur Div', 7, '2022-06-15', '2022-06-18'),
(73, '14', '1655278627.png', 'Bobita Das', 'Asst. Manager Commercial - Kharagpur Div', 9, '2022-06-15', '2022-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `cst_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phn_number` varchar(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `pro_id`, `cst_name`, `email`, `phn_number`, `message`, `created_at`) VALUES
(1, 30, 'TEST2', 'rakesh@gmail.com', '90909090900', 'test3', '2022-06-08 17:42:11'),
(2, 33, 'Rakesh pawar', 'Sakshipurchase17@gmail.com', '09011037117', 'We need Float ,PT bags ,Bottam Bar Delivery fast at pune. Please call 9011037117 .. Approx 3-4Lakh bags need per month', '2022-09-09 22:36:28'),
(3, 33, 'Rakesh pawar', 'Sakshipurchase17@gmail.com', '09011037117', 'Pt bags 3-4 lakh ,bottam bar 3-4 lakh , float 2lakh per month pube call me 9011037117', '2022-09-09 22:37:54'),
(4, 40, 'MAURICIO RODRÃGUEZ', 'm.rodriguez@hermosillo-mx.com', '0898952770', 'Good day,\r\n\r\nWe are interested in your Fiberglass Silicon Coated Fabrics, kindly have your representative contact us for further discussion.\r\n\r\nBest regards.\r\n\r\n', '2022-10-17 14:19:54'),
(5, 24, 'dhruw sachan', 'dhruwji@gmail.com', '9919272787', 'as per our discussion at trade fare pls send sample\r\n tubular bag for e rickshaw 130x5.5x23 spine and upper bottom', '2023-02-15 16:13:58'),
(6, 24, 'dhruw sachan', 'dhruwji@gmail.com', '9919272787', 'as per our discussion at trade fare pls send sample\r\n tubular bag for e rickshaw 130x5.5x23 spine and upper bottom', '2023-02-15 16:13:59'),
(7, 35, 'PRAKASH SINGHEE', 'prakash@jdtechfab.com', '09831214333', 'Dear Sir,\r\nWe would like to learn more about the various qualities of Texturised Fiberglass Yarn and Fabric made by You for insulation purposes. We have a regular requirement of these products and hence would be interested in receiving some details from You to proceed.\r\nWarm Regards\r\nPrakash Singhee\r\nJD Techfab Pvt Ltd\r\nJaipur, Rajasthan', '2023-05-15 17:46:28'),
(8, 35, 'PRAKASH SINGHEE', 'prakash@jdtechfab.com', '09831214333', 'We are interested in knowing more about the Twisted Texturised Yarn produced by You. Please send the TDS and price of 1200 tex and 2400 tex along with the details on MOQ and Leadtime .', '2023-06-26 15:47:35'),
(9, 34, 'sathish kumar', 'sathish.d@stellantis.com', '8754444562', 'We need high strength fiberglass for car Headliner. Kindly send your product brochure.', '2023-08-14 16:36:39'),
(10, 24, 'manoj kumar dalwal', 'dalwalmanojkumar@gmail.com', '9412713453', 'I need capsule type gaunlets. \r\nSize ~3.7Ã—9.5mm 11tubes.\r\nHight 145mm\r\nManoj kumar dalwal, \r\nDALWAL BATTERIES, \r\nNeel-kamal cinema road, \r\nBIJNOR- 246701(U.P.) \r\nMobile-9412713453', '2023-08-26 14:40:14'),
(11, 24, 'manoj kumar dalwal', 'dalwalmanojkumar@gmail.com', '9412713453', 'I need elliptical capsule type 5Ã—12.25 gaunlets\r\nWidth of plate-~~152 to155mm\r\nHight of gaunlets~142 mm\r\nPlease send me sample and price per pc.. \r\nManoj kumar dalwal, \r\nDALWAL  BATTERIES, \r\nNeel-kamal cinema road, \r\nBIJNOR-246701  (U.P.) \r\n9412713453', '2023-08-27 16:18:45'),
(12, 39, 'Anup', 'sales@micagroup.net', '9845493493', 'looking for Polyester film laminated fiber glass fabric in thickness 0.16mm in jumbo roll ', '2023-09-30 14:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_main`
--

CREATE TABLE `enquiry_main` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry_main`
--

INSERT INTO `enquiry_main` (`id`, `name`, `email`, `number`, `country`, `subject`, `message`, `created_at`) VALUES
(18, 'Aahok kumar ', 'Ashokkumarokaya@gmail.com', '9805628797', '', 'Fabric roll inquiry ', 'Purchase of fabric roll', '2022-05-26 11:38:43'),
(19, 'Aahok kumar ', 'Ashokkumarokaya@gmail.com', '9805628797', '', 'Fabric roll inquiry ', 'Purchase of fabric roll', '2022-05-26 11:38:44'),
(31, 'Robin patial', 'robiniti2016@icloud.com', '9882391261', '', 'Job enquiry', 'job enquiry', '2022-05-28 11:12:13'),
(32, 'Robin patial', 'robiniti2016@icloud.com', '9882391261', '', 'Job enquiry', 'job enquiry', '2022-05-28 11:12:14'),
(33, 'Pronobesh Dandapat', 'pronobesh202@gmail.com', '7001524394', '', 'How can get a fresher engineering job in ketex', 'I want to work with ketex company', '2022-06-02 20:30:06'),
(34, 'Prasenjit mondal', 'Prasenjit.mondal61989@gmail.com', '08327275496', '', 'Job required', 'Call please', '2022-06-08 13:39:59'),
(35, 'Prasenjit mondal', 'Prasenjit.mondal61989@gmail.com', '08327275496', '', 'Job required', 'Call please', '2022-06-08 13:40:00'),
(36, 'Prasenjit mondal', 'Prasenjit.mondal61989@gmail.com', '08327275496', '', 'Job required', 'Call please', '2022-06-08 13:40:01'),
(37, 'Prasenjit mondal', 'Prasenjit.mondal61989@gmail.com', '08327275496', '', 'Job required', 'Call please', '2022-06-08 13:40:02'),
(38, 'Anirban Roy', 'anirbanroy259@gmail.com', '8617576621', '', 'Need a job', 'I need a job', '2022-06-15 13:47:24'),
(39, 'Philipp Endres', 'philipp@sustaide.com', '00491701297698', '', 'Sustainable Composites - Natural Rubber Coated Jute', 'Dear Sir or Madam,\r\n \r\nMy team and I have become aware of your company in the context of natural rubber coated jute, due to your participation in the 2010 paper on the development of suitable production systems for natural rubber coated jute fabric.\r\n \r\nWe are currently in the process of looking for a solution, which as of now suggests natural rubber coated jute as a perfect match, due to its characteristic of being sustainable, with the potential of product outputs being 100% natural, but also ', '2022-06-21 18:42:10'),
(40, 'Prabir Mahata ', 'prabirmahata15@gmail.com', '7602393968', '', 'For textile job', 'I have completed b.tech in textile technology.i want a job.', '2022-06-24 09:48:05'),
(41, 'Prabir Mahata ', 'prabirmahata15@gmail.com', '7602393968', '', 'For textile job', 'I have completed b.tech in textile technology.i want a job.', '2022-06-24 09:48:08'),
(42, 'Krishnendu Roy', 'krishnendu279@gmail.com', '7478255411', '', 'Vacancy', 'Hi Sir/Mam Myself Krishnendu Roy from Prembazar presently am working in Century Extrusions Limited as an HR Assistant but trying to change for salary distance, Please let me know your e-mail address where i can drop my resume and if luck clicks i will get the privilege working with your company. ', '2022-06-27 21:33:01'),
(43, 'Prasenjit mondal', 'Prasenjit.mondal61989@gmail.com', '08327275496', '', '', 'I want to work in your company, ', '2022-06-30 12:13:46'),
(44, 'Pankaj Dhiman', 'pankajplc.dhiman@gmail.com', '9418676382', '', '', 'Career portal not working during applying profile. ', '2022-07-01 10:44:36'),
(45, 'PRATYUSH GHOSH', 'pratyush1982ghosh@gmail.com', '9735632408', '', '', 'Going to apply but there is a filed \"Select\", its not appear any drop down list so how can I select any item from there ?\r\nplease suggest.', '2022-07-17 17:24:59'),
(46, 'Mr Tapas Senapati ', 'tapassenapati547@gmail.com', '7863946601/7585031043', '', 'Apply for a parmanent job ', 'Respected sir I have 4 years + experience,,, l am an employee of Foriuddin Enterprise at Accropolly Nimoniya Industries Pvt Ltd,,,,,', '2022-07-18 10:30:54'),
(47, 'Nilanjan Manna', 'arnak92.ee@gmail.com', '8637023704', '', 'For job purpose. Electrical Engineer.  ', 'I am an Electrical Engineer. Now working as Bright Annealing Furnace Engineer and Electrical maintenance Engineer ', '2022-07-19 18:12:08'),
(48, 'Sandipan Roy', 'sandipanroy1994@gmail.com', '8637284119', '', '', 'Need a job of electrical engineering post in your company.', '2022-07-24 20:25:35'),
(49, 'Birju Kumar Barik', 'birjukumarbarik@gmail.com', '08917377238', '', 'Electrical Mantanance', 'Now vacancy available ', '2022-07-29 21:25:39'),
(50, 'LIPIN PANDAB ', 'lipinpandab9@gmail.com', '6296603856', '', 'Application for job', 'Dear sir/mam, i am from kharagpur, inda and a cost accountant ( continuing final) would like to say that i want to associate with KETEX as its a very good organisation as per my reserch.kindely inform me is there any vacancy for which i can go through interview. Thanking you.', '2022-08-03 15:48:48'),
(51, 'LIPIN PANDAB ', 'lipinpandab9@gmail.com', '6296603856', '', 'Application for job', 'Dear sir/mam, i am from kharagpur, inda and a cost accountant ( continuing final) would like to say that i want to associate with KETEX as its a very good organisation as per my reserch.kindely inform me is there any vacancy for which i can go through interview. Thanking you.', '2022-08-03 15:48:51'),
(52, 'Prince katnoria ', 'princekatnoria9@gmail.com', '+91 883 770 1052', '', 'Regarding job, @Ketex Gagret Una H.p.', 'B. Tech Mechanical engineering, 8 years experience, working with Rishab Threads Ludhiana,', '2022-08-06 12:45:45'),
(53, 'Srimanta sahoo', 'Srimaeletric1998@gmali.com', '7585973067', '', 'Electrician requirement vacancy', 'Hr', '2022-08-09 14:01:05'),
(54, 'Lipin Pandab', 'lipinpandab9@gmail.com', '6296603856', '', 'application for job', 'hello dear team, i am from kharagpur would like to know about the carrier opportunity in ketex . As i am very much interested to associate with your organization to explore my knowledge and implement the same in the organization for a long run. Thanking you. waiting for a quick reply if possible.', '2022-08-15 21:44:12'),
(55, 'Lipin Pandab', 'lipinpandab9@gmail.com', '6296603856', '', 'application for job', 'hello dear team, i am from kharagpur would like to know about the carrier opportunity in ketex . As i am very much interested to associate with your organization to explore my knowledge and implement the same in the organization for a long run. Thanking you. waiting for a quick reply if possible.', '2022-08-15 21:44:15'),
(56, 'Nishant upadhyay ', 'canvoltbatteries@gmail.com', '09974116311', '', '', 'Requirement of tubular bag', '2022-08-29 13:20:03'),
(57, 'Laxmi Kanta Mudi', 'lmudi272@gmail.com', '8967023230', '', '', 'Recruitment', '2022-09-05 09:56:46'),
(58, 'Suman Bibar ', 'bibarsuman@gmail.com', '9635705078 ', '', 'Mechines 0perter', 'Sir /Madam I am SUMAN BIBAR and I have completed ITI Fitter and have a experience of 1yrs in production and maintenance of Arungabad electrical Ltd i need a job plz halp mee ', '2022-09-08 11:09:19'),
(59, 'Prabir Mahata ', 'prabirmahata15@gmail.com', '7602393968', '', 'For textile job', 'I am searching a job for textile department ', '2022-10-10 00:06:57'),
(60, 'Prabir Mahata ', 'prabirmahata15@gmail.com', '7602393968', '', 'For textile job', 'I am searching a job for textile department ', '2022-10-10 00:07:00'),
(61, 'ATANU PANJA ', 'atanu.mawa@gmail.com', '8967336484', '', 'CAREER OPPORTUNITY ', ' I have done iti in fitter trade and 3 years experience in Orissa metaliks pvt Ltd ', '2022-10-19 00:21:07'),
(62, 'ATANU PANJA ', 'atanu.mawa@gmail.com', '8967336484', '', 'CAREER OPPORTUNITY ', ' I have done iti in fitter trade and 3 years experience in Orissa metaliks pvt Ltd ', '2022-10-19 00:21:09'),
(63, 'Chinmoy Biswas', 'chinmoytanu@yahoo.co.in', '9932219883', '', 'Job', 'Kindly provide HR Email address for applying job', '2022-10-27 16:26:28'),
(64, 'Rajdeep Majhi', 'Rajdeepmajhi9547@gmail.com', '9547177605', '', 'Job', 'Sir, any labour job can be found in your company. ', '2022-11-06 19:24:33'),
(65, 'Manoj Kumar', 'Manojkumar004785@gimal.com', '9805242680', '', 'Job     sizing mechanics operator', 'Hi', '2022-11-09 09:03:03'),
(66, 'Manoj Kumar', 'Manojkumar004785@gimal.com', '9805242680', '', 'Job     sizing mechanics operator', 'Hi', '2022-11-09 09:03:04'),
(67, 'SANJIB DUARY', 'duarysanjib516@gmail.com', '9933385275', '', '', 'Sir... When I click on the select option nothing is visible', '2022-11-24 11:23:27'),
(68, 'Arnab kumar jana', 'arnabkumarjana056@gmail.com', '07872020216', '', '', 'Need job you have vacancy call me please', '2022-12-16 22:23:10'),
(69, 'Arya ', 'aryasenapati252@gmail.com', '8637316977', '', '', 'Vacancy for fresher candidate ', '2023-01-12 21:27:31'),
(70, 'Arya ', 'aryasenapati252@gmail.com', '8637316977', '', '', 'Vacancy for fresher candidate ', '2023-01-12 21:27:32'),
(71, 'Ankan Banerjee ', 'ankanbanerjee51@gmail.com', '8617453303', '', '', 'How to join the company ', '2023-02-02 19:29:46'),
(72, 'Ankan Banerjee ', 'ankanbanerjee51@gmail.com', '8617453303', '', '', 'How to join the company ', '2023-02-02 19:29:47'),
(73, 'Suman Bibar ', 'bibarsuman@gmail.com', '9635705078', '', '', 'Sir /Madam I am SUMAN BIBAR and I have completed ITI Fitter and have a experience of 1yrs in production and maintenance i need a job plz halp mee ', '2023-03-10 15:42:54'),
(74, 'T s reddy ', 'rayainfra@gmail.com', '7849011111', '', 'Polo t shirts ', 'Dual.colour', '2023-03-16 10:10:14'),
(75, 'Sovan dutta', 'Er.sovandutta@gmail.com', '95635 15300 ', '', 'Maintanance job', 'I want to work in this company as maintenance.\r\nI work in MNC company in Maharashtra.I was not permanent because I am not a Marathi.', '2023-05-01 08:45:21'),
(76, 'Arya Senapati ', 'aryasenapati252@gmail.com', '8637316977', '', 'Job vacancy ', 'I need a job vacancy ', '2023-05-03 15:54:58'),
(77, 'Dibyendu Panda', 'dibyendupanda669@gmail.com', '7679816867', '', '', 'On Viber There are vacancies??', '2023-06-07 22:43:57'),
(78, 'Ayan Kumar Biswas ', 'ayankumar.b@trulynolenindia.com ', '9830668800 ', '', 'Pest Control ', 'We provide all kind of Pest Control Service globally. We are seeking for an appointment with suitable personnel regarding the same for Kharagpur unit. ', '2023-06-09 11:32:03'),
(79, 'PUSPAK DAS', 'puspak.iitkgp@gmail.com', '08391822137', '', 'Application for the post of personal Driver LMV ', 'Sir I am experienced in Kolkata logistics company and Ola I need a Driver job', '2023-06-29 23:05:48'),
(80, 'Mintu Routh ', 'minturouth336@gmail.com', '07364861089', '', '', 'I am looking for career update, a job opportunity in my home town, i have 3 years of experience in weaving loom shed, eagerly waiting for such opportunities ', '2023-07-23 22:32:31'),
(81, 'Mintu Routh ', 'minturouth336@gmail.com', '07364861089', '', '', 'I am looking for career update, a job opportunity in my home town, i have 3 years of experience in weaving loom shed, eagerly waiting for such opportunities ', '2023-07-23 22:32:32'),
(82, 'Atanu Pan', 'atanu9999pan@gmail.com', '08016548994', '', '', 'I have an experience in electrical maintenance and project domain.more than 8 years experience in relivent field.if you have any requirement please give an opportunity ', '2023-07-27 12:20:05'),
(83, 'Pulak bisai ', 'Pulakbisai90@gmail.com', '9800581857 ', '', 'I need job', 'I am Richtek operator (MHE)\r\nJob vacancy kuch hai sir.\r\n    I am pulak bisai form Paschim medinipure ', '2023-08-07 10:48:30'),
(84, 'Arkadip Basu ', 'arkadipbasu7@gmail.com', '8101925629', '', 'Job vacancies ', 'Any vacancy in kharagpur plant', '2023-08-16 22:06:19'),
(85, 'Anjan Kumar malakar', 'anjanmalakar2308@gmail.com', '8967052978', '', 'Production', 'I am interested the job...', '2023-08-20 18:17:58'),
(86, 'Anjan Kumar malakar', 'anjanmalakar2308@gmail.com', '8967052978', '', 'Production', 'I am interested the job..,', '2023-08-20 18:19:10'),
(87, 'Akshay santra ', 'akshaysantra8101002283@gmail.com', '8101002283', '', 'Job vacancy ha kya', 'Kuch job vacancy ha kya sir', '2023-08-22 01:48:23'),
(88, 'Arkadip Basu ', 'arkadipbasu43@gmail.com', '8101925629', '', 'Job vacancies ', 'Any vacancy in kharagpur plant ', '2023-08-25 20:31:43'),
(89, 'Swarup dey', 'deyswarup12345@gmail.com', '9679986108', '', '', 'Hi sir please check my CV ', '2023-10-01 00:30:26'),
(90, 'Swarup dey', 'deyswarup12345@gmail.com', '9679986108', '', '', 'Hi sir please check my CV ', '2023-10-01 00:30:27'),
(91, 'Swarup dey', 'deyswarup12345@gmail.com', '9679986108', '', '', 'Hi sir please check my CV ', '2023-10-01 00:30:27'),
(92, 'Swarup dey', 'deyswarup12345@gmail.com', '9679986108', '', '', 'Hi sir please check my CV ', '2023-10-01 00:30:28'),
(93, 'Swarup dey', 'deyswarup12345@gmail.com', '9679986108', '', '', 'Hi sir please check my CV ', '2023-10-01 00:30:29'),
(94, 'Swarup dey', 'deyswarup12345@gmail.com', '9679986108', '', '', 'Hi sir please check my CV ', '2023-10-01 00:30:29'),
(95, 'Swarup dey', 'deyswarup12345@gmail.com', '9679986108', '', '', 'Hi sir please check my CV ', '2023-10-01 00:30:29'),
(96, 'Swarup dey', 'deyswarup12345@gmail.com', '9679986108', '', '', 'Hi sir please check my CV ', '2023-10-01 00:30:30'),
(97, 'Hami', 'hamikhodadadian2022@gmail.com', '09395689179', '', '', 'Ø¯Ø± Ø¢Ù…Ø¯', '2023-10-25 14:25:29'),
(98, 'Hami', 'hamikhodadadian2022@gmail.com', '09395689179', '', '', 'Ø¯Ø± Ø¢Ù…Ø¯', '2023-10-25 14:25:30'),
(99, 'roham', 'mfsharifi642@gmail.com', '09923166864', '', '069116992', 'nsbjsbj', '2023-10-29 19:24:21'),
(100, 'Sudip karan', 'Sudipstudioofficial@gmail.com', '07679124365', '', '', 'Welder tread vacancy ', '2023-10-31 20:06:08'),
(101, 'Manohar Kodela', 'mankodela@gmail.com', '919494414222', '', '', 'A Textile Technocrat with PG in Management, having 38+ years of good exposure', '2023-11-06 12:34:22'),
(102, 'Biswajit Jana ', 'biswajit260282@yahoo.com', '9627580469', '', '', 'Job application for  Mechanical Maintenance ', '2023-11-13 07:26:40'),
(103, 'Biswajit Jana ', 'biswajit260282@yahoo.com', '9627580469', '', '', 'Job application for  Mechanical Maintenance ', '2023-11-13 07:26:41'),
(104, 'Akash Samoy', 'samoyakash@gmail.com', '9932155520', '', 'Find job in kitex', 'I want a job in kitex sir please give me a opertunety', '2023-11-27 16:22:38'),
(105, 'Akash Samoy', 'samoyakash@gmail.com', '9932155520', '', 'Find job in kitex', 'I want a job in kitex sir please give me a opertunety', '2023-11-27 16:22:39'),
(106, '', '', '', '', '', '', '2023-11-27 23:20:49'),
(107, 'Rahul Roy', 'rahulroy.kgp2@gmail.com', '8768501675', '', 'Any Job Vacancy ', 'Any Job Vacancy are there?', '2023-12-06 09:55:15'),
(108, 'PROKASH BAG', 'bagprokash@gmail.com', '9635692174', '', 'B TECH IN TEXTILE TECHNOLOGY WITH 16 YEARS EXPERIENCE IN WEAVING LOOM RESEARCH EXP', 'TEXTILE WEAVING DEPARTMENT HEAD JOB VACANCY IF ANT SCOPE', '2023-12-06 16:51:22'),
(109, 'Rakesh Ray ', 'rakeshray1822@gmail.com', '9002363339', '', 'Dear sir, May I know any vacancy in spinning dept.', ' I will be very helpful if you confirm.', '2023-12-11 20:47:08'),
(110, 'Rakesh Ray ', 'rakeshray1822@gmail.com', '9002363339', '', 'Dear sir, May I know any vacancy in spinning dept.', ' I will be very helpful if you confirm.', '2023-12-11 20:47:09'),
(111, 'Sabyasachi Bandyopadhyay', 'sabyasachi_bannerjee@yahoo.com', '09831266006', '', 'Requirement of K Tex bags', 'Need to tie up for supply of tubular bags etc for my clients', '2023-12-19 18:52:31'),
(112, 'NILANJAN MANDAL', 'NILANJANMANDAL0@GMAIL.COM', '8653400340', '', 'TEXTILES OPARATOR', 'SUTLEJ TEXTILES AND INDUSTRIES LIMITED', '2024-01-01 19:35:44'),
(113, 'Abhijeet sahoo ', 'tabusahoo626@gmail.com', '9382560565', '', 'Job interview ', 'Sir Ami kaj Korte chai directly gate e CV joma newa hoyna, Ami worker or oporetor er kaj vaccines available thakle ta Korte chai', '2024-01-07 23:34:50'),
(114, 'Mahendra Mahata', 'mahendramahata0710@gmail.com', '8617326146', '', '', 'Dear sir, I have 3 years experience on Non-woven Fabric (Spun bond & meltblown fabric) ', '2024-01-17 06:11:40'),
(115, 'Mahendra Mahata', 'mahendramahata0710@gmail.com', '8617326146', '', '', 'Dear sir, I have 3 years experience on Non-woven Fabric (Spun bond & meltblown fabric) ', '2024-01-17 06:11:41'),
(116, 'RAMANANDA DAS ADHIKARI', 'dasadhikarir@gmail.com', '09474061279', '', 'Desire to contact with CSR executive at Kharagpur , Paschim Medinipur ', 'We are running a senior citizens home  for orphanage , destitute , people, we are provide services for last 47 years . We desire to talk with CSR Executive , please provide us the concerning Contact no or email id . ', '2024-01-17 13:32:09'),
(117, 'Tapasdolai', 'tapasdolai@332gmail.com', '6297480335', '', '', 'Iam intarast', '2024-01-30 11:53:21'),
(118, 'Sumanta Roy ', 'sumamta.ray20@gmail.com', '9749645136', '', '', 'I am sumanta Roy, Diploma I computer science and technology,', '2024-02-21 00:57:23'),
(119, 'tifif', 'B47CEO@co.in', 'fi', '', 'ydx', 'ydsysysy', '2024-03-03 10:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(1000) NOT NULL,
  `job_detail` varchar(255) NOT NULL,
  `sort_number` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journey`
--

CREATE TABLE `journey` (
  `id` int(11) NOT NULL,
  `year` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journey`
--

INSERT INTO `journey` (`id`, `year`, `title`, `description`, `createdAt`) VALUES
(14, '2011', 'Step-7', 'First Overseas Plant for manufacturing Gauntlets established in Dhaka, Bangladesh in the name of KE TECHNICAL TEXTILES (BANGLADESH) LIMITED.', '2022-03-28 16:23:28'),
(13, '2009', 'Step-6', 'Establishment of a New Plant (Unit I) at Gagret, Himachal Pradesh under the name of GAGRET TECHNICAL FABRICS PRIVATE LIMITED.', '2022-03-28 16:21:09'),
(8, '1984', 'Step-1', 'First Project Initiated for Development of Gauntlet by Mr. Sukumar Roy, Managing Director and Mr. Dâ€™Souza â€“ Head R&D of Exide Industries Limited..', '2022-05-16 14:42:19'),
(12, '2001', 'Step-5', 'After internal shareholding re-structuring, the name of the company was changed to KE TECHNICAL TEXTILES PRIVATE LIMITED.', '2022-03-28 16:20:49'),
(11, '1993', 'Step-4', 'The name of the company was changed to KE BURGMANN FIBER INDIA PRIVATE LIMITED.', '2022-03-28 16:20:33'),
(10, '1990', 'Step-3', 'Formation of new company in the name of SAFEMATICS FIBER INDIA PRIVATE LIMITED with an Indo-Danish Joint Venture Company KELD ELLENTOFT (I) PRIVATE LIMITED.', '2022-03-28 16:19:51'),
(9, '1986', 'Step-2', 'First Commercial Production of Gauntlets started in Kharagpur in name of TECHFAB INDUSTRIES and in  Jamshedpur in the name of Vidyut Insulations.', '2022-05-26 14:08:38'),
(15, '2015', 'Step-8', 'Joint Venture between AMER-SIL S.A of Luxembourg and KE TECHNICAL TEXTILES PRIVATE LIMITED, emerged with new name AMER-SIL KETEX PRIVATE LIMITED.', '2022-03-28 16:23:45'),
(16, '2015', 'Step-9', 'GAGRET TECHNICAL FABRICS PRIVATE LIMITED started a new plastic division at Unit I.', '2022-03-28 16:24:03'),
(17, '2016', 'Step-10', 'GAGRET TECHNICAL FABRICS PRIVATE LIMITED merged with AMER-SIL KETEX PRIVATE LIMITED.', '2022-05-16 14:46:20'),
(18, '2016', 'Step-11', 'First Plant in South India set up by AMER-SIL KETEX PRIVATE LIMITED in Bengaluru.', '2022-03-28 16:26:16'),
(19, '2019', 'Step-12', 'AMER-SIL KETEX PRIVATE LIMITED Kharagpur unit started a new production facility at Bhetia. PO Demouli, WB.  for specialized High Silica Fiberglass Fabric.', '2022-03-28 16:27:25'),
(20, '2020', 'Step-13', 'AMER-SIL KETEX PRIVATE LIMITED of Kharagpur and Gagret unit installed a 350 KVA Roof Top Solar Panel.', '2022-03-28 16:27:48'),
(21, '2020', 'Step-14', 'AMER-SIL KETEX PRIVATE LIMITED initiated a new Integrated Unit in Gagret with a State-of-the-Art production facility.', '2022-03-28 16:28:08'),
(22, '2021', 'Step-15', 'AMER-SIL KETEX PRIVATE LIMITED started new unit in Kharagpur Operations (VIP-Unit) at Vidyasagar Industrial Park â€“ Kharagpur of West Bengal Industrial Development Corporation (WBIDC) with a State-of-the-Art production facility.', '2022-05-16 14:42:31'),
(25, '2022', 'Step-16', 'Official opening ceremony of AMER-SIL KETEX PRIVATE LIMITED - Unit II (VIP) by Her Excellency Mrs. Peggy Frantzen - Ambassador of Luxembourg to India.', '2022-05-26 13:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `ketex_clients`
--

CREATE TABLE `ketex_clients` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_image` varchar(255) NOT NULL,
  `client_description` varchar(255) NOT NULL,
  `sort_number` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ketex_clients`
--

INSERT INTO `ketex_clients` (`id`, `client_name`, `client_image`, `client_description`, `sort_number`, `created_at`, `updated_at`) VALUES
(14, '', '1653722796.png', '  ', 2, '2022-05-28', '2022-05-28'),
(13, '', '1653722732.png', '  ', 1, '2022-05-28', '2022-05-28'),
(16, '', '1653740058.png', '', 4, '2022-05-28', '2022-05-28'),
(15, '', '1653736046.jpg', ' ', 3, '2022-05-28', '2022-05-28'),
(17, '', '1653740215.png', ' ', 5, '2022-05-28', '2022-05-28'),
(18, '', '1653740081.png', '', 6, '2022-05-28', '2022-05-28'),
(19, '', '1653740089.jpg', '', 7, '2022-05-28', '2022-05-28'),
(20, '', '1653740096.png', '', 8, '2022-05-28', '2022-05-28'),
(21, '', '1653740334.png', '  ', 9, '2022-05-28', '2022-05-28'),
(22, '', '1653740348.png', '', 3, '2022-05-28', '2022-05-28'),
(23, '', '1653740373.jpg', '', 10, '2022-05-28', '2022-05-28'),
(24, '', '1653740396.png', '', 11, '2022-05-28', '2022-05-28'),
(25, '', '1653740517.png', ' ', 12, '2022-05-28', '2022-05-28'),
(26, '', '1653740411.png', '', 12, '2022-05-28', '2022-05-28'),
(27, '', '1653740543.gif', '', 13, '2022-05-28', '2022-05-28'),
(35, '', '1653740866.png', '', 17, '2022-05-28', '2022-05-28'),
(29, '', '1653740556.gif', '', 14, '2022-05-28', '2022-05-28'),
(30, '', '1653740564.png', '', 15, '2022-05-28', '2022-05-28'),
(31, '', '1653740576.png', '', 16, '2022-05-28', '2022-05-28'),
(32, '', '1653740589.png', '', 16, '2022-05-28', '2022-05-28'),
(33, '', '1653740598.png', '', 17, '2022-05-28', '2022-05-28'),
(34, '', '1653740706.jpg', ' ', 17, '2022-05-28', '2022-05-28'),
(36, '', '1653741006.jpg', '', 18, '2022-05-28', '2022-05-28'),
(37, '', '1653741104.jpg', '', 19, '2022-05-28', '2022-05-28'),
(38, '', '1653741232.jpg', '', 20, '2022-05-28', '2022-05-28'),
(39, '', '1653741419.jpg', '', 21, '2022-05-28', '2022-05-28'),
(40, '', '1653741424.png', '', 22, '2022-05-28', '2022-05-28'),
(41, '', '1653741584.png', ' ', 23, '2022-05-28', '2022-05-28'),
(42, '', '1653741662.png', '', 25, '2022-05-28', '2022-05-28'),
(43, '', '1653742114.jpg', '', 30, '2022-05-28', '2022-05-28'),
(44, '', '1653742119.jpg', '', 32, '2022-05-28', '2022-05-28'),
(45, '', '1653742125.png', '', 33, '2022-05-28', '2022-05-28'),
(46, '', '1653742131.png', '', 34, '2022-05-28', '2022-05-28'),
(47, '', '1653742137.jpg', '', 35, '2022-05-28', '2022-05-28'),
(48, '', '1653742148.jpg', '', 36, '2022-05-28', '2022-05-28'),
(49, '', '1653742378.png', '', 37, '2022-05-28', '2022-05-28'),
(50, '', '1653742385.jpg', '', 37, '2022-05-28', '2022-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `content` varchar(800) NOT NULL,
  `pdf` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`id`, `title`, `image`, `date`, `content`, `pdf`) VALUES
(1, 'CURTAINS 1', 'notice18-02-22_1645165912.jpg', '2022-03-15', 'The recent development of High Silica Curtains for annealing furnaces.', '1648621455_pdf.pdf'),
(2, 'FOR ANNEALING', 'notice18-02-22_1645167141.jpg', '2022-03-05', 'Temperature up to 1200 Â°C High-Temperature materials are made of Silica Coated Fiberglass. AS-KETEX can create an industrial curtain wall of close-weave fabric or hanging yarn enclosure to contain your high-temperature environments.', ''),
(6, 'Exhibiting at AluExpo 2022 - Istanbul', '1649681479.jpg', '2022-03-01', 'Exhibiting at AluExpo 2022 - Istanbul\r\n\r\nFrom 03/03/2022 To 05/03/2022\" \" \" \" ', '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(50) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `page_heading` varchar(50) NOT NULL,
  `meta_description` varchar(50) NOT NULL,
  `meta_keywords` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `content`, `page_heading`, `meta_description`, `meta_keywords`) VALUES
(1, 'Home> COMPANY PROFILE', '<p>Amer-Sil Ketex Pvt. Ltd. (&lsquo;<strong>AS-KETEX</strong>&rsquo;), is Joint Venture Company with an European Company &ndash; <strong>AMERSIL- S.A</strong>. of Luxembourg that specializes in manufacturing technical textiles from various new generation man-made yarn. We manufacture various products for the automobile industry, electrical insulation, molten metal filtrations for aluminium industry, filter fabrics for boiler houses, high temperature applications for up to 1200 &deg;C and components of lead acid batteries. The components that we manufacture for lead acid batteries include Tubular Bags &mdash; both woven and non-woven, PVC Silica Separators and certain plastic components.</p>\r\n\r\n<p>We are the largest manufacturer of Tubular bags in India and Bangladesh, producing 700 million linear meters of tubes annually from our plants in Kharagpur, Gagret &amp; Bengaluru in India and Dhaka in Bangladesh. The company has its own facilities of the most modern weaving units processing and coating of fabrics with various polymers and resin systems. For specialized applications, work is undertaken from the design stage by our company&rsquo;s personnel and R&amp;D. Our team of engineers and consultants are always available, not only for problem resolution but for innovative product development and new design.</p>\r\n', 'Home', 'home', 'home'),
(16, 'About Us', '<p>Shining with pride, Amer-Sil Ketex Pvt. Ltd. is one the leading organizations in India, specializing in making Industrial Lead acid battery components, Microporous PVC / Silica separator.</p>\r\n\r\n<p>Our organization has set a benchmark in the manufacturing and production industry in the country, with manufacturing plants in India and Bangladesh. With years of research and development, we have reached the pinnacle of success in sales, production, exports, deliverables, cooperation and distribution, giving paramount importance to quality.</p>\r\n\r\n<p>KETEX is the supreme manufacturer of Technical Textiles in India. Our company is specialized in making fiberglass fabrics, woven and non-woven tubular bags, gauntlets for submarine batteries, PVC, silica, carbon black and stabilizers, high thermal resistant combo bags, lead acid batteries etc.</p>\r\n\r\n<p>Amer-Sil Ketex Pvt Ltd is the largest manufacturer of Tubular bags in Indian Sub-Continent. We constantly strive to improve our production processes, products and services, thus delivering products of the finest quality. Currently, we have four manufacturing plants for forming and weaving units. The main plant is located at Kharagpur in West Bengal, whereas others being at Gagret in Himachal Pradesh, Bengaluru in Karnataka and at Dhaka in Bangladesh.</p>\r\n', 'About Us', 'about', 'about'),
(17, 'About Us>Vision & Mission', '<p>The Quality Policy of <strong>AMER-SIL KETEX PRIVATE LIMITED</strong>. Is to achieve customer &amp; interested Party&#39;s satisfaction through Designing &amp; Manufacturing of Gauntlet for Lead-acid storage batteries (Woven &amp; Non-woven), Fiber Glass Fabric (Loomstate and Chemicals/Resin Treated), Processed (Texturized / Twisted)Fiber Glass Yarn, Technical Textiles, Grey Fabric (Polyester &amp; Fiber Glass for Internal consumption) by :&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Consistently maintaining Quality of product stipulated by National Standard, Customer&#39;s specification and the organisation&#39;s specification.</li>\r\n	<li>Designing, manufacturing and marketing the products and providing services that consistently fulfil customer&#39;s needs and expectations.</li>\r\n	<li>Supply of Product in time with the involvement of all personnel.</li>\r\n	<li>Continually improve the adequacy and effectiveness of the Quality Management System by determining risks and opportunities related to internal and external issues through setting relevant quality objectives and their periodical evaluation.</li>\r\n	<li>Reviewing it to align with the context of the organisation&nbsp;and business strategic direction.</li>\r\n	<li>Complying with all the requirements of the Quality Management System.</li>\r\n	<li>Ensure every employee understands the Quality Policy and is responsible and accountable for incorporating considerations in their daily activities.</li>\r\n	<li>Make this policy available to all interested parties and the public.</li>\r\n</ul>\r\n', 'About Us', 'vision', 'vision'),
(18, 'About Us>FROM THE DESK OF THE DIRECTOR', '<p>The years we have experienced in the past as a worldwide leading manufacturing industry are very significant. It is seen that we have intensively delivered the best quality of products for automobile industrial applications all over India and Bangladesh. I would like to thank our valuable dealers, customers and world-class suppliers. I would like to make a special mention to our whole team of engineers and technicians for their enthusiastic and valuable contribution to establishing our organization.</p>\r\n', 'DIRECTOR', 'DIRECTOR', 'DIRECTOR'),
(19, 'Home>WHO WE ARE?', '<p>Dipping, Drying &amp; Weaving a fabric does not make a Gauntlet, it needs a technology to do it&hellip;</p>\r\n\r\n<p>Designing, Weaving &amp; Coating a fabric does not make a distribution bag in DC Sheet ingot Casting, it needs a technology to do it&hellip;</p>\r\n\r\n<p><strong><span style=\"background-color:#fff0f5;\">AS-KETEX</span></strong><span style=\"background-color:#fff0f5;\"> </span>is where we have all those technologies.</p>\r\n\r\n<p><strong><span style=\"background-color:#fff0f5;\">AS-KETEX</span></strong> is the comprehensive solution for manufacturing all technical textiles from various new generation man-made yarn. Modern technology has paved the way in manufacturing Gauntlet and distribution bags for DC Ingots. Amer-Sil-Ketex is one of the leading manufacturers of technical textiles in India. We are one of the leading woven Gauntlet manufacturers in India and the first manufacturer in Asia to have an extensive product line for manufacturing non-woven Gauntlet since 2008. We are specialized in technical fabrics, bottom bars, and float indicators. We also produce sealed <strong>Top Bar</strong> for Gauntlet and self-interlock bottom bar.</p>\r\n', 'Home', 'home', 'home'),
(20, 'About Us > Mission', '<p>Our plant units from all over India and Bangladesh have been producing 700 million linear meters of tubes annually. Our manufacturing products like lead-acid batteries, woven and non-woven tubular bags, PVC Silica separators and certain plastic components. Quality is our paramount significance. Therefore, we constantly strive to improve our production processes, products and services. We guarantee optimum quality at all levels. Work is undertaken from the design stage by our company&#39;s personnel and R&amp;D for specialized applications.</p>\r\n', 'Mission', 'Mission', 'Mission');

-- --------------------------------------------------------

--
-- Table structure for table `productExtraFields`
--

CREATE TABLE `productExtraFields` (
  `id` int(11) NOT NULL,
  `productId` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `weave` varchar(256) NOT NULL,
  `thickness` varchar(256) NOT NULL,
  `gsm` varchar(256) NOT NULL,
  `themalStability` varchar(256) NOT NULL,
  `breakingMachine` varchar(256) NOT NULL,
  `breakingCross` varchar(256) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productExtraFields`
--

INSERT INTO `productExtraFields` (`id`, `productId`, `description`, `weave`, `thickness`, `gsm`, `themalStability`, `breakingMachine`, `breakingCross`, `createdAt`, `updatedAt`) VALUES
(46, '8', 'Bi-Directional 25 Micron Film Laminated Fiber Glass Re-enforced Polyester Film', 'Plain', '0.10 Â± 0.01', '92 Â± 10', 'NA', 'â‰¥ 800', 'â‰¥ 160', '2022-03-30 19:12:54', '2022-03-30 19:12:54'),
(47, '8', 'Uni-Directional 36 Micron Film Laminated Fiber Glass Re-enforced Polyester Film', 'NA', '0.072-0.108', '110 Â± 10', 'NA', 'â‰¥ 1300', 'NA', '2022-03-30 19:12:54', '2022-03-30 19:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `sort_number` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`cat_id`, `cat_name`, `sort_number`, `created_at`, `updated_at`) VALUES
(51, 'Fiberglass Coated Fabrics', 8, '2022-05-17 12:10:14', '2022-05-26 18:13:41'),
(9, 'Plastic Components ', 2, '2022-02-01 00:00:00', '2022-05-23 13:22:36'),
(48, 'Fiberglass Engineered Yarn & Roving', 4, '2022-05-17 10:21:24', '2022-05-26 15:04:58'),
(49, 'Poly Glass', 10, '2022-05-17 10:48:45', '2022-05-26 15:05:09'),
(18, 'High Silica Fiberglass Fabrics', 3, '2022-02-21 00:00:00', '2022-05-26 15:03:17'),
(19, ' Fiberglass Filtration Fabrics', 6, '2022-02-21 00:00:00', '2022-05-23 13:22:55'),
(50, 'Fiberglass Silicon Coated Fabrics', 7, '2022-05-17 11:49:08', '2022-05-23 13:23:00'),
(47, 'Multi Tubular Bags (Gauntlet)', 1, '2022-05-16 15:43:26', '2022-05-26 15:02:53'),
(39, 'Fiberglass Combo Bags', 9, '2022-04-08 13:40:31', '2022-05-23 13:23:10'),
(52, 'Fiberglass Loom-state Fabric', 5, '2022-05-17 15:45:19', '2022-05-26 15:05:20'),
(54, 'Woven Roving', 8, '2022-05-19 18:24:25', '2022-05-26 15:05:46'),
(56, 'Separator', 11, '2022-05-26 18:13:22', '2022-05-26 18:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `pro_id` bigint(20) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_pdf_title` varchar(255) NOT NULL,
  `pdf` varchar(100) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_description` longtext NOT NULL,
  `sort_number` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`pro_id`, `cat_id`, `product_pdf_title`, `pdf`, `pro_name`, `pro_description`, `sort_number`, `description`, `created_at`, `update_at`) VALUES
(30, 39, 'TDS', '', 'COMBO BAG', '<p>We are one of the leading manufacturer of customized combo bags for molten metal fitration used for DC&nbsp;Sheet Ingot Casting &amp; Slab Casting in any smelters.</p>\r\n\r\n<p>There are two types of combo bags.</p>\r\n\r\n<ul>\r\n	<li>Soft White Combo Bag</li>\r\n	<li><span style=\"color:#0000ff;\"><strong>T</strong></span>hermotex<strong> <span style=\"color:#0000ff;\">F</span></strong>abric (<span style=\"color:#0000ff;\"><strong>TF</strong></span>) Rigid Combo Bag</li>\r\n</ul>\r\n\r\n<hr />\r\n<p><em><span style=\"color:#000000;\">FUNCTIONALITY OF</span><strong><span style=\"color:#000000;\"> </span><span style=\"color:#0000ff;\">TF</span></strong> RIGID COMBO&nbsp; BAGS:</em></p>\r\n\r\n<p style=\"text-align: justify;\">In D.C. Casting, Combo Bag controls the flow pattern and temperature distribution, which effect the temperature profile across the mold and hence the molten metal sump; these have bearing on the structure in solidification. The practical solution to this problem has been to redirect the downward flow out of the downspout to a horizontal distributed flow, using a solid refractory box section or a flexible fiber bag, that is, Combo Bag. Distribution of hot metal into the ingot sump results in uniform temperature gradient.</p>\r\n\r\n<p><em><span style=\"color:#0000ff;\"><strong>TF</strong></span> Rigid Combo Bags:</em></p>\r\n\r\n<ul>\r\n	<li>Remains firm throughout the cast; negligible deformations.</li>\r\n	<li>Low odour and smoke in contact with molten metal, at start of cast and during casting.</li>\r\n	<li>Can be provided in variety of shapes, as required by the User; will be suited for bag attachments.</li>\r\n	<li>Resourcefully decreases the scuffle in casting. It is also self-priming and aids in hands-free cast start. With less turbulence, oxides are also trapped</li>\r\n	<li>Controlled and easy casting with good metal and temperature distribution; improved sheet ingot metal quality and structure.</li>\r\n	<li>Cost effective and yields higher <strong>R</strong>eturn <strong>O</strong>n <strong>I</strong>nvestment.</li>\r\n</ul>\r\n\r\n<p><em>Advantages of&nbsp;<span style=\"color:#0000ff;\"><strong>&nbsp;TF</strong></span> Rigid Combo Bags:</em></p>\r\n\r\n<ul>\r\n	<li>Favourable Temperature Distribution.</li>\r\n	<li>Diminish Scrap.</li>\r\n	<li>Eradicates Oxides &amp; Dross.</li>\r\n	<li>Unvarying Metal Dispersal.</li>\r\n	<li>Reduces Turbulence.</li>\r\n</ul>\r\n\r\n<p><em>Availibility of Combo Bags:</em></p>\r\n\r\n<ul>\r\n	<li>Woven glass filtration fabric with different mesh size and width.</li>\r\n	<li>In-house mold making facility for customized designing and stitching of Combo Bags as per needs of customer.</li>\r\n	<li>Soft (foldable) and Rigid <span style=\"color:#0000ff;\">TF</span> Combo Bags.</li>\r\n	<li>Inner spout on demand.</li>\r\n</ul>\r\n', 4, '', '2022-05-16', '2022-05-24'),
(24, 47, 'TDS', '', 'GAUNTLET', '<p style=\"text-align: justify;\">General definition of <em>gauntlet</em> is a&nbsp;glove with long sleeve, worn for protection. The anode of any tubular lead acid batteries is made from either woven or non-woven polyester bag to give protection to the <strong>P</strong>ositive <strong>A</strong>ctive <strong>M</strong>aterial (<strong>PAM</strong>) along with the Positive Plate Spines present inside the bag from the acid solution outside the bag. Thus, the name of these protection bag is termed as &lsquo;<strong>Gauntlet</strong>&rsquo;.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong><span style=\"color:#0000ff;\">AS</span>-<span style=\"color:#ff8c00;\">KETEX</span></strong> produces Engineered woven gauntlets to improve the performance of lead/acid tubular plates. As the adequate compression of positive active material (PAM) is one of the key factors of the life of lead acid batteries, the greater life exhibited by batteries with tubular plates, is associated to the capability of the gauntlet to retain the active material around each conductive spine of the tubular plate. <strong><span style=\"color:#0000ff;\">AS</span>-<span style=\"color:#ff8c00;\">KETEX</span></strong> Woven &amp; Non-Woven Multi-Tubular Gauntlets with engineered fabric structure offer higher resistance to&nbsp;chemical oxidation, low electrical resistance, and improved energy deployment due to superior elastic compression of the active material.</p>\r\n\r\n<p style=\"text-align: justify;\">Gauntlet is the Heart of Lead Acid Batteries which determinants its superior life.&nbsp;<strong><span style=\"color:#0000ff;\">AS</span>-<span style=\"color:#ff8c00;\">KETEX</span></strong> &nbsp;is the only manufacturer of gauntlets for Submarine Batteries in Asia to supply to the&nbsp;Turkish Military. The Gauntlet is Engineered as such to enhance the Submarine Battery with:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Excellent Life Span.</li>\r\n	<li style=\"text-align: justify;\">High Capacity.</li>\r\n	<li style=\"text-align: justify;\">High Power Density.</li>\r\n	<li style=\"text-align: justify;\">High Reliability and Safety.<br />\r\n	&nbsp;</li>\r\n</ul>\r\n\r\n<p style=\"text-align: justify;\">Key Features of our <strong><span style=\"color:#0000ff;\">AS</span>-<span style=\"color:#ff8c00;\">KETEX</span></strong> Gauntlet:</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Low Electrical Resistance.</li>\r\n	<li style=\"text-align: justify;\">Excellent Bursting Strength.</li>\r\n	<li style=\"text-align: justify;\">Outstanding Elastic Recovery.</li>\r\n	<li style=\"text-align: justify;\">Uniform Pore Size.</li>\r\n	<li style=\"text-align: justify;\">Excellent stiffness.</li>\r\n	<li style=\"text-align: justify;\">Good Oxidative Stability.</li>\r\n	<li style=\"text-align: justify;\">Good Acid Resistant property</li>\r\n</ol>\r\n\r\n<p style=\"text-align: justify;\">Main Characteristics of Woven &amp; Non-Woven&nbsp;<strong><span style=\"color:#0000ff;\">AS</span>-<span style=\"color:#ff8c00;\">KETEX</span></strong> Gauntlet:</p>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"color:#0000ff;\"><strong>WOVEN GAUNTLET</strong></span></p>\r\n\r\n<address style=\"text-align: justify;\">1. Mainly suitable for Dry Powder Filling Process</address>\r\n\r\n<address style=\"text-align: justify;\">2. Fabric impregnated with special Acrylic resin</address>\r\n\r\n<address style=\"text-align: justify;\">3. Porosity is excellent which gives lesser ER</address>\r\n\r\n<address style=\"text-align: justify;\">4. Bursting Strength: &gt; 36 kgf /cm2</address>\r\n\r\n<address style=\"text-align: justify;\">5. Weight loss after 24 hrs. in dichromate solution &lt;0.5%</address>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"color:#0000ff;\"><strong>NON-WOVEN GAUNTLET</strong></span></p>\r\n\r\n<address style=\"text-align: justify;\">1. Mainly suitable for Slurry filling and Paste Filling Process</address>\r\n\r\n<address style=\"text-align: justify;\">2. Very fine Pore structure and as such high &amp; uniform absorbency.</address>\r\n\r\n<address style=\"text-align: justify;\">3. Micro-pores throughout the gauntlets which gives better Electrical Resistance.</address>\r\n\r\n<address style=\"text-align: justify;\">4. Lower active mass loss.</address>\r\n\r\n<address style=\"text-align: justify;\">5. Bursting Strength : &gt; 15 kgf /cm<sup>2</sup></address>\r\n', 3, '', '2022-04-08', '2022-05-24'),
(32, 19, '', '', 'MESH FABRIC FOR MOLTEN ALUMINIUM FILTRATION', '<p style=\"text-align: justify;\">Fiberglass Fabrics are a vital application for good metal distributions and hence temperature profile influences qyality in Direct Chill Sheet Ingot Casting. The fiberglass directs the molten metal out of the downspout and distributes across the mold and into the ingot sump, to provide more uniform temperature gradient.</p>\r\n\r\n<p style=\"text-align: justify;\">Oxides must also be trapped before the metal is cast. These are where fiberglass fabrics in required shapes are essential to achieve successful casting. &#39;<em><strong><span style=\"color:#0000ff;\">AS-KETEX&#39;</span> is the innovative Solution Provider in High Temperature Fabrics for Aluminium Casting.</strong></em></p>\r\n\r\n<p style=\"text-align: justify;\"><strong><span style=\"font-size:14px;\"><span style=\"color:#0000ff;\"><u><span style=\"background-color:#40e0d0;\">FIBERGLASS FABRIC FOR MOLTEN ALUMINIUM</span></u></span></span></strong></p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">The filter fabric range of products consists of woven glass fabric with different mesh sizes, openings, lengths and widths &amp; coated with specialized acrylic resin to ensure its integrity and thermal stability.</li>\r\n	<li style=\"text-align: justify;\">AS-KETEX cloth are widely used for molten metal, in foundries for casting , auto wheek and cylinder piston.</li>\r\n</ul>\r\n', 6, '', '2022-05-16', '2022-05-24'),
(33, 9, '', '', 'FLOAT VALVE', '<p><strong><span style=\"background-color:#daa520;\">FLOAT VALUE:</span></strong></p>\r\n\r\n<p><span style=\"color:#0000cd;\"><strong>AS-KETEX</strong></span> is involved in manufacturing and supplying superb quality Float Level Indicators that are extensively used for battery industries. <strong>AS KETEX</strong> float indicators are defects free with good aesthetic looks by using advanced technology high pressure injection moulding and tooling system capable of minimizing evaporation loss. It reduces topping up frequency of electrolyte, as acid fumes can not leak out and reduces the danger of explosion.</p>\r\n\r\n<p>It is available in customised float height and colour as per requirement with porosity 35 &plusmn; 5% and Acid Resistance :&lt;0.5 % [according to RDSO specification].</p>\r\n\r\n<p><strong><span style=\"background-color:#daa520;\">BOTTOM BAR:</span></strong></p>\r\n\r\n<p>AS-KETEX bottom bars are made from 100 % virgin polymers to give adequate elasticity along with high mechanical strength. Available in different colours and dimeter as per customer&rsquo;s requirements.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, '', '2022-05-16', '2022-05-17'),
(34, 18, '', '', 'High Silica Fiberglass Cloth', '<p>High Silica Fiber Glass Fabrics manufactured by <strong><span style=\"color:#0000ff;\">AS-KETEX</span></strong> are made from texturised glass fabrics. These fabrics are made out of specially sourced yarn which are then passed through high pressure jet of air. These silica glass fabrics are also heat treated for controlled shrinkage during actual applications. The high silica glass fabrics are also available with various types of coatings. The coatings include graphite, fire retardent, acrylic and vermiculite finishes. Depending on the weight, finish applied on the fabrics, it finds application in various fields of high temperature uses like insulations, fire blankets, welding curtains etc.</p>\r\n\r\n<p>&#39;<span style=\"color:#0000ff;\"><strong>AS-KETEX</strong>&#39;</span> High Silica Glass Fabrics can withstand temperature upto 1200 &deg;C, retaining flexibility of the Fiberglass Fabric. These are brand named in our product series as &lsquo;<strong>THERMOTEX</strong>&rsquo; . As per customers&rsquo;&nbsp;requirement of thermal stability, thickness, weight, etc. we supply various grades of <strong>THERMOTEX</strong> series products.</p>\r\n\r\n<p>Encompassing a purity superior than 96% silica, &#39;<span style=\"color:#0000ff;\"><strong>AS-KETEX</strong></span>&#39; High Silica Fiberglass Cloth has tremendous strength, softness and toughness.&nbsp;</p>\r\n\r\n<p><strong><u><span style=\"background-color:#ffd700;\">Highlights:</span></u></strong></p>\r\n\r\n<ul>\r\n	<li>High Elasticity</li>\r\n	<li>Furnace lining And Protection Properties</li>\r\n	<li>Exceptional Chemical Endurance</li>\r\n</ul>\r\n\r\n<p><strong><u><span style=\"background-color:#ffa500;\">Functions:</span></u></strong></p>\r\n\r\n<ul>\r\n	<li>Protection Blankets</li>\r\n	<li>Expansion Joints</li>\r\n	<li>Pipe Wrapping</li>\r\n	<li>Turbine Covers</li>\r\n	<li>Engine Exhaust Pipe Covers</li>\r\n	<li>Gasketing Products</li>\r\n	<li>Welding Blankets And Curtains</li>\r\n</ul>\r\n', 0, '', '2022-05-16', '2022-05-16'),
(35, 48, '', '', 'Twisted Texturised Yarn', '<p>AS-KETEX has the precision to produce Texturised Fiberglass Yarns. These E-Glass Yarn are bulked/Bulged and blown by special texturising machines&nbsp;with high pressure compressed jet-air and which can be used to heat insulation and acoustic absorption industries.<br />\r\n&nbsp;</p>\r\n\r\n<p>After volumized, the glass yarn becomes fluffy and loose. Through which produced textiles performs higher temperature insulation efficiency and softer.&nbsp;The texturized and volumized glass yarns can support great amount of air than single yarns.&nbsp;Therefore, it can be provided better insulating as well as excellent acoustic absorption. &nbsp;</p>\r\n\r\n<p>Applications:</p>\r\n\r\n<ul>\r\n	<li>Muffler filling for power sport vehicles (motorcycles, snowmobile, ATVs, Etc).</li>\r\n	<li>Industrial silencers.</li>\r\n	<li>Woven insulation fabric, rope, tape etc.</li>\r\n	<li>All acoustic and thermal insulation applications.</li>\r\n	<li>Oil Filters</li>\r\n	<li>PTFE coating membrane fabric basis; High temperature sewing thread.</li>\r\n</ul>\r\n\r\n<p>AS-KETEX Fiberglass Texturized Yarn and Produces could be classified as&nbsp;E-glass Texturized Yarn with working temperature 680â„ƒ and are High strength and High flexible.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, '', '2022-05-17', '2023-01-06'),
(36, 48, '', '', 'High Silica Fiberglass Stitching Thread', '<p>AS-KETEX silica sewing thread has a high durability under high temperature which provides it with excellent sewing properties. The sewing thread has a high heat resistance. Its continuous working temperature reaches 1000<sup>o</sup>C and its instant working temperature reaches 1400<sup>o</sup>C.</p>\r\n\r\n<ul>\r\n	<li>Used in manufacturing operations to make up fabrics from silica fibre cloth</li>\r\n	<li>Used for sealing and insulating products</li>\r\n	<li>Used in sewing safety clothing, gloves, welding, and fire blankets</li>\r\n	<li>used to sew weak alkali-resistant weave.&nbsp;It&nbsp;fulfil the need of sewing filter bags used in carbon black/&nbsp;metallurgy/&nbsp;cement industries</li>\r\n</ul>\r\n', 0, '', '2022-05-17', '2023-01-06'),
(37, 48, '', '', 'Brass or Copper Braided Texturized Roving', '<p>AS-KETEX is the has the facility to manufacture texturised / twisted texturtised fiberglass yarn/roving braided with brass or copper wire and hybrid fiberglass yarn mixed wtth the cellulose for applications in non-asbestos clutch facings and brake shoes. There are a wide variety of these yarns with different tex and is manufactured as per customers specifications.</p>\r\n', 2, '', '2022-05-17', '2023-01-06'),
(38, 49, '', '', 'Polyester Fiberglass Silk Tape', '<p style=\"text-align: justify;\">&lsquo;<span style=\"font-family:Tahoma,Geneva,sans-serif;\"><span style=\"color:#0000ff;\"><strong>AS-</strong></span><span style=\"color:#ff8c00;\"><strong>KETEX</strong></span></span>&rsquo; brand Polyester Glass Silk Tape are encircling tapes with a carrier made of parallel fiberglass yarns with thermoset polyester yarn, pre-impregnated and laminated with a special &nbsp;Polyester Film and&nbsp;Modified Polyurethane Resin &amp;&nbsp;Red Oxide.&nbsp;These tape forms a mechanical loop to hold coils in place against centrifugal forces and replace metal armature or steel straps.</p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n\r\n<p style=\"text-align: justify;\">Glass Polyester Silk Tape is consisting of Glass-Polyester</p>\r\n\r\n<p style=\"text-align: justify;\">Polyester Glass Silk Tape can be used for electrical insulation; it can be thermally self-bonded and is characterised by an extremely high mechanical endurance, high tensile strength.</p>\r\n\r\n<p style=\"text-align: justify;\">&lsquo;<span style=\"font-family:Tahoma,Geneva,sans-serif;\"><span style=\"color:#0000ff;\"><strong>AS-</strong></span><span style=\"color:#ff8c00;\"><strong>KETEX</strong></span></span>&rsquo; brand Polyester Glass Silk Tape is a thermos-shrinkable tape. During impregnation the resin penetrates through the layers of the Polyester Glass Silk Tape into the main insulation. During curing process Polyester Glass Silk Tape will shrink under temperature and prevent a drain out of resin and give some pressure to the main insulation. Polyester Glass Silk Tape is used as final layer above the porous tape in the production of <strong>Vacuum Pressure Impregnation</strong> insulation winding on copper wire.</p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n', 0, '', '2022-05-17', '2022-05-17'),
(39, 49, '', '', 'Polyester Fiberglass Fabric', '<p>Coming Up</p>\r\n', 0, '', '2022-05-17', '2022-05-21'),
(40, 50, '', '', 'Red Silicon Glass Fabric', '<p>coming up</p>\r\n', 0, '', '2022-05-17', '2022-05-17'),
(41, 51, '', '', 'Pulse Jet Fabric Filter', '<p>The efficiency of particulate collection is becoming more and more important as environmental regulations are becoming increasingly stringent. Fiberglass filter fabric are the mechanism for meeting these regulations and a re the optimum solution for environment with operating temperature between 150 &deg;C to 260 &deg;C.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&lsquo;<strong>AS-KETEX</strong>&rsquo; has developed such fabrics for high temperature dust filtration. Each filter fabric is engineered for a specific application including Reverse Air, Shake / Deflate and Pulse Jet cleaning method.&nbsp; &lsquo;<strong>AS-KETEX</strong>&rsquo; combines yarn selection, weave pattern and density to produce fabric with the appropriate combination of physical and chemical properties for the designated end use.</p>\r\n\r\n<p>Finishes:</p>\r\n\r\n<ul>\r\n	<li>709 &ndash; Three Component Graphite Finishes</li>\r\n	<li>716 &ndash; Proprietary High Performance Acid Resistance Finish</li>\r\n	<li>726 &ndash; 10% nominal Dupont Teflon B Finishes</li>\r\n	<li>714 &ndash; 8% nominal Dupont Teflon B Finish</li>\r\n</ul>\r\n', 0, '', '2022-05-17', '2022-05-17'),
(42, 51, '', '', 'Desized & Silane Treated Fabric', '<p>coming up</p>\r\n', 1, '', '2022-05-17', '2022-05-24'),
(43, 51, '', '', 'Mono-Filament PET/BOPP Laminate', '<p>ASKETEX is a pioneer in manufacture glass fabrics for mono filament PET / BOPP laminate with presssure sensitve adhesion tapes.&nbsp;</p>\r\n\r\n<p>Our adhesive compounds are applied frequently as hot melts.&nbsp;The tack formulations are based on the combination of the polymers with tackifying resins and/or oils.&nbsp;The resins soften the elastomeric phase, which allows the adhesive to conform to the substrate in the bonding. They also adjust the glass transition temperature&nbsp;of the elastomeric phase, which causes stiffening of the adhesive layer&nbsp;&nbsp;and resistance to removal of the adhesive from the substrate.</p>\r\n\r\n<p>Our fabrics are made customed as per requirement.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, '', '2022-05-17', '2022-08-01'),
(44, 51, '', '', 'Automobile Engineered Fabric', '<p><strong>Fiberglass Fabric for Automotive:</strong></p>\r\n\r\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:661px;\" width=\"661\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:126px;height:29px;\">\r\n			<p align=\"center\"><strong>GSM</strong></p>\r\n			</td>\r\n			<td style=\"width:130px;height:29px;\">\r\n			<p align=\"center\"><strong>Thickness (mm)</strong></p>\r\n			</td>\r\n			<td style=\"width:133px;height:29px;\">\r\n			<p align=\"center\"><strong>Compatibility</strong></p>\r\n			</td>\r\n			<td style=\"width:146px;height:29px;\">\r\n			<p align=\"center\"><strong>Colour</strong></p>\r\n			</td>\r\n			<td style=\"width:126px;height:29px;\">\r\n			<p align=\"center\"><strong>Coating</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:126px;height:29px;\">\r\n			<p align=\"center\">150 &plusmn; 5</p>\r\n			</td>\r\n			<td style=\"width:130px;height:29px;\">\r\n			<p align=\"center\">0.135 &plusmn; 0.015</p>\r\n			</td>\r\n			<td style=\"width:133px;height:29px;\">\r\n			<p align=\"center\">Epoxy / Butyl</p>\r\n			</td>\r\n			<td style=\"width:146px;height:29px;\">\r\n			<p align=\"center\">White/ Black / Grey</p>\r\n			</td>\r\n			<td style=\"width:126px;height:29px;\">\r\n			<p align=\"center\">Acrylic</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:126px;height:31px;\">\r\n			<p align=\"center\">165 &plusmn; 5</p>\r\n			</td>\r\n			<td style=\"width:130px;height:31px;\">\r\n			<p align=\"center\">0.14 &plusmn; 0.015</p>\r\n			</td>\r\n			<td style=\"width:133px;height:31px;\">\r\n			<p align=\"center\">Epoxy / Butyl</p>\r\n			</td>\r\n			<td style=\"width:146px;height:31px;\">\r\n			<p align=\"center\">White/ Black / Grey</p>\r\n			</td>\r\n			<td style=\"width:126px;height:31px;\">\r\n			<p align=\"center\">Acrylic</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:126px;height:31px;\">\r\n			<p align=\"center\">200 &plusmn; 10</p>\r\n			</td>\r\n			<td style=\"width:130px;height:31px;\">\r\n			<p align=\"center\">0.17 &plusmn; 0.015</p>\r\n			</td>\r\n			<td style=\"width:133px;height:31px;\">\r\n			<p align=\"center\">Epoxy / Butyl</p>\r\n			</td>\r\n			<td style=\"width:146px;height:31px;\">\r\n			<p align=\"center\">White/ Black / Grey</p>\r\n			</td>\r\n			<td style=\"width:126px;height:31px;\">\r\n			<p align=\"center\">Acrylic</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:126px;height:31px;\">\r\n			<p align=\"center\">200 &plusmn; 10</p>\r\n			</td>\r\n			<td style=\"width:130px;height:31px;\">\r\n			<p align=\"center\">0.20 &plusmn; 0.020</p>\r\n			</td>\r\n			<td style=\"width:133px;height:31px;\">\r\n			<p align=\"center\">Epoxy / Butyl</p>\r\n			</td>\r\n			<td style=\"width:146px;height:31px;\">\r\n			<p align=\"center\">White/ Black / Grey</p>\r\n			</td>\r\n			<td style=\"width:126px;height:31px;\">\r\n			<p align=\"center\">Epoxy</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:126px;height:31px;\">\r\n			<p align=\"center\">225 &plusmn; 10</p>\r\n			</td>\r\n			<td style=\"width:130px;height:31px;\">\r\n			<p align=\"center\">0.20 &plusmn; 0.020</p>\r\n			</td>\r\n			<td style=\"width:133px;height:31px;\">\r\n			<p align=\"center\">Epoxy / Butyl</p>\r\n			</td>\r\n			<td style=\"width:146px;height:31px;\">\r\n			<p align=\"center\">White/ Black / Grey</p>\r\n			</td>\r\n			<td style=\"width:126px;height:31px;\">\r\n			<p align=\"center\">Epoxy</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 0, '', '2022-05-17', '2022-10-15'),
(45, 52, '', '', 'Electrical Insulations', '<p style=\"text-align: justify;\">&lsquo;<span style=\"color:#0000ff;\"><strong>AS-KETEX</strong></span>&rsquo; Fiberglass fabric provides an exceptional blend of properties from high potency to fire resistance. Wide ranges of yarn tex and weave patterns provide huge number of design potential allowing the end user to choose the best pattern for material execution, economics and product flexibility.</p>\r\n\r\n<p style=\"text-align: justify;\">Electric Grade fiberglass cloth&nbsp;is a fiberglass Printed Circuit Board material&nbsp;which is typically styles of 771,71042, 7628, 2116, 1080, 7628, 3732, 3784, etc.,</p>\r\n\r\n<p style=\"text-align: justify;\">Besides the PCB application, This electric grade glass fibre fabric has excellent dimension stability, electric insulation, high temperature resistance, also widely applied in the Teflon, Epoxy Acrylic, Phenolic,&nbsp;PTFE Coating Fabric.</p>\r\n\r\n<p style=\"text-align: justify;\">&lsquo;<span style=\"color:#0000ff;\"><strong>AS-KETEX</strong></span>&rsquo; have a wide range to glass fabrics for Mica Insulation and other treated glass cloths.</p>\r\n', 0, '', '2022-05-17', '2022-05-21'),
(46, 18, '', '', 'Vermiculite Coated ', '<p>Coming Up</p>\r\n', 0, '', '2022-05-17', '2022-05-17'),
(48, 54, '', '', 'E-Glass Roving', '<p style=\"text-align: justify;\"><strong>AS-KETEX</strong> Woven Roving are made by interweaving continuous E-Glass Roving, freely woven into a dense fabric.</p>\r\n\r\n<p style=\"text-align: justify;\">Woven Roving Fabrics are appropriate for hand lay applications of large, high strength FRP products where thickness and strength are required in application areas such as molding and mechanized production to produce yacht/boats, storage tanks, structures for architecture, vessels, automobile parts, sports and furniture equipment, etc.</p>\r\n\r\n<p style=\"text-align: justify;\">The GSM ranges from 200 to 850 g/m&sup2;.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>AS-KETEX</strong> Roving are cured with a silane sizing permitting compatibility with most epoxy and polyester resin systems.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>AS-KETEX</strong> Woven Roving has various design pattern viz. plain, twill, satin &amp; basket weaves.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>AS-KETEX</strong> Woven Roving sustains to:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Even texture, No Stain &amp; Fuzz</li>\r\n	<li style=\"text-align: justify;\">High Tensile Strength and</li>\r\n	<li style=\"text-align: justify;\">Perfect Chemical Resistance</li>\r\n	<li style=\"text-align: justify;\">Quick Wet-Out</li>\r\n	<li style=\"text-align: justify;\">Outstanding Electrical Protection</li>\r\n</ul>\r\n', 5, '', '2022-05-19', '2022-05-23'),
(58, 56, '', '', 'PVC Silica Separator', '<p style=\"text-align: justify;\"><a href=\"http://ketex.com/cproduct/product_description?pid=Mzg=\"><strong>Separators</strong></a></p>\r\n\r\n<p style=\"text-align: justify;\">The ASKETEX separator is the result of a unique extrusion process using as raw material: PVC, silica, carbon black and stabilizers. Depending on pattern and formulation, the volume porosity ranges from 68% to more than 80% . The ASKETEX separator has a very high volume Porosity, low electrical resistance and an excellent oxidation resistance. The AS-KETEX separator is obtained by the extrusion and calendaring at low temperature of a PVC, silica, carbon black and stabilizer compound. Naturally and without any additive (such as for instance oil), our separator has a very strong oxidation resistance. The Amer-Sil separator is the most porous plastic separator available on the market. Our separator has a very low electrical resistance and an instantaneous wetting. It can be laminated with glass mat in case of flat positive plates. We can achieve any thickness between 0.3 mm to 4.9 mm. It is available in two versions : (i) Ribbed separator. (ii) Corrugated separator. Because of its high volume porosity, pore size allowing the oxygen migration from the positive to the negative plate, low electrical resistance, low acid displacement, instantaneous wetting, excellent oxidation resistance, the AS-KETEX separator is considered today as the best separator for all kind of gel application.</p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n\r\n<div>\r\n<p style=\"text-align: justify;\"><a href=\"http://ketex.com/cproduct/product_description?pid=Mzg=\"><strong>Main Application</strong></a></p>\r\n</div>\r\n\r\n<p style=\"text-align: justify;\">The ASKETEX separator is very well suited for all industrial application such as inverter, tubular gel, traction inverter etc.,</p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n\r\n<div>\r\n<p style=\"text-align: justify;\"><a href=\"http://ketex.com/cproduct/product_description?pid=Mzg=\"><strong>Main Specification</strong></a></p>\r\n</div>\r\n\r\n<p style=\"text-align: justify;\">(a) High volume porosity (b) Excellent oxidation resistance (c) Low electrical resistance (d) Low acid displacement (e) Instantaneous wetting</p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n', 0, '', '2022-05-26', '2022-05-27'),
(62, 18, '', '', 'Annealing Curtain', '<p>AS-KETEX High Silica Annealing Curtain for heated conveyor ovens.&nbsp;</p>\r\n\r\n<p>These traps the hot atmosphere inside the chamber from coming out to a great extent and keeps the internal temperature constant.</p>\r\n', 0, '', '2022-05-28', '2022-05-28'),
(63, 51, '', '', 'Fiberglass Fabric for Non-Metallic Expansion Joint', '<p>Coming Up</p>\r\n', 0, '', '2022-10-15', '2022-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `proimg_id` int(11) NOT NULL,
  `pro_id` varchar(20) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `image_position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`proimg_id`, `pro_id`, `pro_name`, `product_img`, `image_position`) VALUES
(1, '1', '', '031-01-22_1643612659.jpg', '1'),
(2, '1', '', '131-01-22_1643612659.jpg', '0'),
(3, '1', '', '231-01-22_1643612659.jpg', '0'),
(5, '8', '', '004-02-22_1643958233.jpg', '1'),
(7, '14', '', '021-02-22_1645422947.jpg', '1'),
(8, '14', '', '021-02-22_1645422973.jpg', '0'),
(9, '12', '', '021-02-22_1645423328.png', '0'),
(10, '12', '', '021-02-22_1645423335.jpg', '1'),
(11, '15', '', '001-03-22_1646114223.jpg', '0'),
(12, '15', '', '001-03-22_1646114235.jpg', '1'),
(13, '15', '', '001-03-22_1646114246.jpg', '0'),
(14, '17', '', '019-03-22_1647666627.jpg', '1'),
(15, '18', '', '1647868220_main.png', '1'),
(18, '18', '', '0_1647868291_extra.png', '0'),
(20, '19', '', '1648101599_main.png', '1'),
(21, '19', '', '0_1648101599_extra.png', '0'),
(22, '20', '', '1648101639_main.png', '1'),
(23, '20', '', '0_1648101639_extra.png', '0'),
(24, '21', '', '1648101734_main.png', '1'),
(25, '21', '', '0_1648101734_extra.png', '0'),
(50, '22', '', '0_1648717167_extra.jpg', '1'),
(51, '22', '', '2_1648717167_extra.jpg', '0'),
(52, '22', '', '3_1648717167_extra.jpg', '0'),
(55, '25', '', '1652684672_main.jpg', '1'),
(56, '25', '', '0_1652684672_extra.jpg', '0'),
(57, '25', '', '1_1652684672_extra.jpg', '0'),
(58, '26', '', '1652689296_main.jpg', '1'),
(59, '26', '', '0_1652689296_extra.jpg', '0'),
(60, '26', '', '1_1652689296_extra.jpg', '0'),
(61, '27', '', '1652689454_main.png', '1'),
(62, '27', '', '0_1652689454_extra.png', '0'),
(63, '27', '', '1_1652689454_extra.png', '0'),
(64, '27', '', '2_1652689454_extra.png', '0'),
(65, '29', '', '1652693904_main.jpg', '0'),
(66, '29', '', '0_1652693904_extra.jpg', '1'),
(67, '29', '', '1_1652693904_extra.png', '0'),
(70, '30', '', '0_1652699914_extra.jpg', '0'),
(71, '31', '', '1652700154_main.jpg', '1'),
(77, '30', '', '0_1652702385_extra.jpg', '0'),
(78, '30', '', '1_1652702385_extra.jpg', '1'),
(79, '30', '', '2_1652702385_extra.jpg', '0'),
(82, '32', '', '1652702778_main.jpg', '1'),
(85, '33', '', '1652704284_main.jpg', '1'),
(87, '24', '', '1652704357_main.jpg', '0'),
(89, '24', '', '0_1652705416_extra.jpg', '1'),
(90, '34', '', '1652708374_main.jpg', '1'),
(91, '34', '', '0_1652708707_extra.jpeg', '0'),
(92, '36', '', '1652764114_main.JPG', '1'),
(93, '37', '', '1652764159_main.jpg', '1'),
(94, '35', '', '1652764205_main.JPG', '1'),
(95, '38', '', '1652764756_main.jpg', '1'),
(96, '38', '', '0_1652764889_extra.jpg', '0'),
(97, '40', '', '1652768404_main.jpg', '1'),
(98, '41', '', '1652769915_main.JPG', '1'),
(100, '45', '', '1652786702_main.jpg', '0'),
(101, '45', '', '0_1652786757_extra.jpg', '0'),
(102, '24', '', '0_1652788573_extra.JPG', '0'),
(103, '33', '', '0_1652790233_extra.jpg', '0'),
(104, '33', '', '1_1652790233_extra.jpg', '0'),
(105, '47', '', '1652852915_main.jpg', '1'),
(106, '48', '', '1653132997_main.jpg', '1'),
(107, '48', '', '0_1653132997_extra.jpg', '0'),
(108, '45', '', '1653133019_main.jpg', '1'),
(109, '45', '', '0_1653133019_extra.jpg', '0'),
(110, '39', '', '1653133334_main.jpg', '1'),
(111, '39', '', '0_1653133334_extra.jpg', '0'),
(112, '49', '', '1653294738_main.jpg', '1'),
(113, '49', '', '0_1653294738_extra.jpg', '0'),
(114, '49', '', '1_1653294738_extra.jpg', '0'),
(115, '50', '', '1653294917_main.jpg', '1'),
(116, '50', '', '0_1653294917_extra.jpg', '0'),
(117, '50', '', '1_1653294917_extra.jpg', '0'),
(118, '51', '', '1653380875_main.jpg', '1'),
(119, '51', '', '0_1653380875_extra.jpg', '0'),
(120, '52', '', '1653388119_main.jpg', '1'),
(121, '52', '', '0_1653388119_extra.jpg', '0'),
(122, '53', '', '1653388317_main.jpg', '1'),
(123, '53', '', '0_1653388317_extra.jpg', '0'),
(124, '54', '', '1653390021_main.jpg', '1'),
(125, '54', '', '0_1653390021_extra.jpg', '0'),
(126, '55', '', '1653390141_main.jpg', '1'),
(127, '55', '', '0_1653390141_extra.jpg', '0'),
(128, '56', '', '1653396247_main.jpg', '1'),
(129, '56', '', '0_1653396247_extra.jpg', '0'),
(130, '57', '', '1653399557_main.jpg', '1'),
(131, '57', '', '0_1653399557_extra.jpg', '0'),
(132, '58', '', '1653569976_main.jpg', '1'),
(134, '59', '', '1653640282_main.jpg', '1'),
(135, '61', '', '1653640446_main.jpg', '1'),
(136, '58', '', '0_1653651159_extra.jpg', '0'),
(137, '62', '', '1653711415_main.jpg', '1'),
(138, '43', '', '1659355183_main.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) NOT NULL,
  `user_pass` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website_name` varchar(255) NOT NULL,
  `keyword` text NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `total_visited` bigint(20) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `date_added` date NOT NULL DEFAULT '0000-00-00',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `user_login`, `user_pass`, `email`, `website_name`, `keyword`, `description`, `meta_title`, `total_visited`, `logo`, `date_added`, `status`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', 'abc', '', '', 0, '', '2020-09-26', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`am_id`);

--
-- Indexes for table `application_category`
--
ALTER TABLE `application_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `application_details`
--
ALTER TABLE `application_details`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `awords`
--
ALTER TABLE `awords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_enquiry`
--
ALTER TABLE `career_enquiry`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `employee_department`
--
ALTER TABLE `employee_department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `employee_department_details`
--
ALTER TABLE `employee_department_details`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_main`
--
ALTER TABLE `enquiry_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `journey`
--
ALTER TABLE `journey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ketex_clients`
--
ALTER TABLE `ketex_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `productExtraFields`
--
ALTER TABLE `productExtraFields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`proimg_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `am_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application_category`
--
ALTER TABLE `application_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `application_details`
--
ALTER TABLE `application_details`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `awords`
--
ALTER TABLE `awords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `career_enquiry`
--
ALTER TABLE `career_enquiry`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employee_department`
--
ALTER TABLE `employee_department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `employee_department_details`
--
ALTER TABLE `employee_department_details`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `enquiry_main`
--
ALTER TABLE `enquiry_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `job_details`
--
ALTER TABLE `job_details`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `journey`
--
ALTER TABLE `journey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ketex_clients`
--
ALTER TABLE `ketex_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `productExtraFields`
--
ALTER TABLE `productExtraFields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `pro_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `proimg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
