-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 01:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kees`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccesslog`
--

CREATE TABLE `tblaccesslog` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `login_success` tinyint(1) UNSIGNED DEFAULT NULL,
  `created_at` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbldistrict`
--

CREATE TABLE `tbldistrict` (
  `id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldistrict`
--

INSERT INTO `tbldistrict` (`id`, `province_id`, `district_name`, `created_at`) VALUES
(1, 1, 'ໄຊທານີ', 1616583681),
(2, 1, 'ໄຊເສດຖາ', 1616583681),
(3, 1, 'ຈັນທະບູລີ', 1616583681),
(4, 1, 'ສີໂຄດຕະບອງ', 1616583681),
(5, 1, 'ຫາດຊາຍຟອງ', 1616583681),
(6, 1, 'ນາຊາຍທອງ', 1616583681),
(7, 1, 'ສີສັດຕະນາກ', 1616583681),
(8, 4, 'ຫ້ວຍຊາຍ', 1616583681),
(9, 4, 'ຕົ້ນເຜິ້ງ', 1616583681),
(10, 4, 'ເມືອງເມິງ', 1616583681),
(11, 4, 'ຜາອຸດົມ', 1616583681),
(12, 4, 'ປາກທາ', 1616583681),
(13, 3, 'ເມືອງຫຼວງນ້ຳທາ', 1616583681),
(14, 3, 'ເມືອງສິງ', 1616583681),
(15, 3, 'ເມືອງລອງ', 1616583681),
(16, 3, 'ວຽງພູຄາ', 1616583681),
(17, 3, 'ນາແລ', 1616583681),
(18, 7, 'ເມືອງຫຼວງພະບາງ', 1616583681),
(19, 7, 'ຊຽງເງິນ', 1616583681),
(20, 7, 'ເມືອງນານ', 1616583681),
(21, 7, 'ປາກອຸ', 1616583681),
(22, 7, 'ນ້ຳບາກ', 1616583681),
(23, 7, 'ເມືອງງອຍ', 1616583681),
(24, 7, 'ປາກແຊງ', 1616583681),
(25, 7, 'ໂພນໄຊ', 1616583681),
(26, 7, 'ຈອມເພັດ', 1616583681),
(27, 7, 'ວຽງຄຳ', 1616583681),
(28, 7, 'ພູຄູນ', 1616583681),
(29, 7, 'ໂພນທອງ', 1616583681),
(30, 9, 'ເມືອງແປກ', 1616583681),
(31, 9, 'ເມືອງຄຳ', 1616583681),
(32, 9, 'ໜອງແຮດ', 1616583681),
(33, 9, 'ເມືອງຄູນ', 1616583681),
(34, 9, 'ໜອກໃໝ່', 1616583681),
(35, 9, 'ພູກູດ', 1616583681),
(36, 9, 'ຜາໄຊ', 1616583681),
(37, 9, 'ທ່າໂທມ', 1616583681),
(38, 12, 'ທ່າພະບາດ', 1616583681),
(39, 12, 'ປາກຊັນ', 1616583681),
(40, 12, 'ປາກກະດີງ', 1616583681),
(41, 12, 'ບໍລິຄັນ', 1616583681),
(42, 12, 'ຄຳເກີດ', 1616583681),
(43, 12, 'ວຽງທອງ', 1616583681),
(44, 12, 'ໄຊຈຳພອນ', 1616583681),
(45, 2, 'ຜົ້ງສາລີ', 1616583681),
(46, 2, 'ໃໝ່', 1616583681),
(47, 2, 'ຂວາ', 1616583681),
(48, 2, 'ສຳພັນ', 1616583681),
(49, 2, 'ບຸນເໜືອ', 1616583681),
(50, 2, 'ຍອດອູ', 1616583681),
(51, 2, 'ບຸນໄຕ້', 1616583681),
(52, 5, 'ໄຊ', 1616583681),
(53, 5, 'ຫລາ', 1616583681),
(54, 5, 'ນາໝໍ້', 1616583681),
(55, 5, 'ງາ', 1616583681),
(56, 5, 'ເເບງ', 1616583681),
(57, 5, 'ຮຸນ', 1616583681),
(58, 5, 'ປາກເເບງ', 1616583681),
(59, 6, 'ຊຳເໜືອ', 1616583681),
(60, 6, 'ຊຽງຄໍ້', 1616583681),
(61, 6, 'ຮ້ຽມ ວຽງທອງ', 1616583681),
(62, 6, 'ວຽງໄຊ', 1616583681),
(63, 6, 'ຫົວເມືອງ', 1616583681),
(64, 6, 'ຊຳໄຕ້', 1616583681),
(65, 6, 'ສົບເບົາ', 1616583681),
(66, 6, 'ເເອດ', 1616583681),
(67, 6, 'ກວັນ', 1616583681),
(68, 6, 'ຊ່ອນ', 1616583681),
(69, 8, 'ໄຊຍະບູລີ', 1616583681),
(70, 8, 'ຄອບ', 1616583681),
(71, 8, 'ຫົງສາ', 1616583681),
(72, 8, 'ເມືອງເງິນ', 1616583681),
(73, 8, 'ຊຽງຮ່ອນ', 1616583681),
(74, 8, 'ພຽງ', 1616583681),
(75, 8, 'ປາກລາຍ', 1616583681),
(76, 8, 'ເເກ່ນທ້າວ', 1616583681),
(77, 8, 'ບໍ່ເເຕນ', 1616583681),
(78, 8, 'ທົ່ງມີໄຊ', 1616583681),
(79, 8, 'ໄຊຊະຖານ', 1616583681),
(80, 9, 'ຜາໄຊ', 1616583681),
(81, 10, 'ໂພນໂຮງ', 1616583681),
(82, 10, 'ທຸລະຄົມ', 1616583681),
(83, 10, 'ເເກ້ວອຸດົມ', 1616583681),
(84, 10, 'ກາສີ', 1616583681),
(85, 10, 'ວັງວຽງ', 1616583681),
(86, 10, 'ເຟືອງ', 1616583681),
(87, 10, 'ຊະນະຄາມ', 1616583681),
(88, 10, 'ເເມດ', 1616583681),
(89, 10, 'ຫີນເຫີບ', 1616583681),
(90, 10, 'ວຽງຄຳ', 1616583681),
(91, 10, 'ໝື່ນ', 1616583681),
(92, 11, 'ອານຸວົງ', 1616583681),
(93, 11, 'ລ້ອງເເຈ້ງ', 1616583681),
(94, 11, 'ລ້ອງຊານ', 1616583681),
(95, 11, 'ຮົ່ມ', 1616583681),
(96, 11, 'ທ່າໂທມ', 1616583681),
(97, 13, 'ທ່າເເຂກ', 1616583681),
(98, 13, 'ມະຫາໄຊ', 1616583681),
(99, 13, 'ໜອງບົກ', 1616583681),
(100, 13, 'ຫີນບູນ', 1616583681),
(101, 13, 'ຍົມມະລາດ', 1616583681),
(102, 13, 'ບົວລະພາ', 1616583681),
(103, 13, 'ນາກາຍ', 1616583681),
(104, 13, 'ເຊບັ້ງໄຟ', 1616583681),
(105, 13, 'ໄຊບົວທອງ', 1616583681),
(106, 13, 'ຄຸນຄຳ', 1616583681),
(107, 14, 'ນະຄອນໄກສອນ', 1616583681),
(108, 14, 'ອຸທົມພອນ', 1616583681),
(109, 14, 'ອາດສະພັງທອງ', 1616583681),
(110, 14, 'ພິນ', 1616583681),
(111, 14, 'ເຊໂປນ', 1616583681),
(112, 14, 'ນອງ', 1616583681),
(113, 14, 'ທ່າປາກທອງ', 1616583681),
(114, 14, 'ສອງຄອນ', 1616583681),
(115, 14, 'ຈຳພອນ', 1616583681),
(116, 14, 'ຊົນນະບູລີ', 1616583681),
(117, 14, 'ໄຊບູລີ', 1616583681),
(118, 14, 'ວິລະບູລີ', 1616583681),
(119, 14, 'ອາດສະພອນ', 1616583681),
(120, 14, 'ໄຊພູທອງ', 1616583681),
(121, 14, 'ພະລານໄຊ', 1616583681),
(122, 15, 'ເມືອງ ສາລະວັນ', 1616583681),
(123, 15, 'ຕະໂອ້ຍ', 1616583681),
(124, 15, 'ຕຸ້ມລານ', 1616583681),
(125, 15, 'ລະຄອນເພັງ', 1616583681),
(126, 15, 'ຄົງເຊໂດນ', 1616583681),
(127, 15, 'ເລົ່າງາມ', 1616583681),
(128, 15, 'ສະໝ້ອຍ', 1616583681),
(129, 16, 'ລະນາມ', 1616583681),
(130, 16, 'ກະລຶມ', 1616583681),
(131, 16, 'ດາກຈຶງ', 1616583681),
(132, 16, 'ທ່າເເຕ່ງ', 1616583681),
(133, 17, 'ນະຄອນປາກເຊ', 1616583681),
(134, 17, 'ຊະນະສົມບູນ', 1616583681),
(135, 17, 'ບາຈຽງຈະເລີນສຸກ', 1616583681),
(136, 17, 'ປາກຊ່ອງ', 1616583681),
(137, 17, 'ປະທຸມພອນ', 1616583681),
(138, 17, 'ໂພນທອງ', 1616583681),
(139, 17, 'ເມືອງ ຈຳປາສັກ', 1616583681),
(140, 17, 'ສຸຂຸມາ', 1616583681),
(141, 17, 'ມຸນລະປະໂມກ', 1616583681),
(142, 17, 'ເມືອງ ໂຂງ', 1616583681),
(143, 18, 'ເມືອງ ໄຊເສດຖາ', 1616583681),
(144, 18, ' ສາມັກຄີໄຊ', 1616583681),
(145, 18, 'ສະໜາມໄຊ', 1616583681),
(146, 18, 'ຊານໄຊ', 1616583681),
(147, 18, 'ເມືອງພູວົງ', 1616583681),
(148, 1, 'ປາກງຶ່ມ', 1616583681),
(149, 1, 'ສັງທອງ', 1616583681);

-- --------------------------------------------------------

--
-- Table structure for table `tblfee`
--

CREATE TABLE `tblfee` (
  `id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfee`
--

INSERT INTO `tblfee` (`id`, `class`, `price`, `created_at`) VALUES
(4, '1', 1900000.00, '2024-07-23 11:08:47'),
(5, '2', 2500000.00, '2024-07-23 23:59:11'),
(6, '3', 2600000.00, '2024-07-23 23:59:25'),
(7, '4', 2800000.00, '2024-07-23 23:59:35'),
(8, '5', 3000000.00, '2024-07-23 23:59:46'),
(9, '6', 3500000.00, '2024-07-23 23:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `id` int(11) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `student_no` varchar(20) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`id`, `semester`, `student_no`, `total_amount`, `payment_status`, `created_at`) VALUES
(1, '2024-2025', 'STD001', 2000000, 2, '2024-07-25 15:16:06'),
(2, '2024-2025', 'STD002', 2147483647, 2, '2024-07-25 15:15:13'),
(3, '2024-2025', 'STD003', 70261, 0, '2024-07-25 21:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblregister`
--

CREATE TABLE `tblregister` (
  `id` int(11) NOT NULL,
  `semester` varchar(100) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `student_no` varchar(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `village` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `ethnicity` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `fee` decimal(10,2) DEFAULT NULL,
  `payment_status` tinyint(4) DEFAULT 0,
  `payment_methode` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblregister`
--

INSERT INTO `tblregister` (`id`, `semester`, `year`, `student_no`, `first_name`, `last_name`, `gender`, `dob`, `phone`, `province_id`, `district_id`, `village`, `region`, `ethnicity`, `class`, `fee`, `payment_status`, `payment_methode`, `created_at`) VALUES
(4, '2024-2025', 4, 'STD001', 'Gillian', 'Velasquez', 'F', '2011-10-01', '+1 (939) 758-9476', 2, 1, 'Aut delectus odit q', 'Nisi labore anim ess', 'Temporibus sint nemo', '6', 3000000.00, 2, 1, '2024-07-24 14:34:40'),
(12, '2024-2025', 1, 'STD002', 'Castor', 'Rodriguez', 'M', '2011-07-13', '+1 (676) 133-8398', 3, 2, 'Est cum duis nulla n', 'Ex sit consectetur ', 'Impedit pariatur Q', '5', NULL, 2, 0, '2024-07-24 21:53:38'),
(15, '2024-2025', 1, 'STD003', 'AB', 'Duffy', 'F', '2024-07-24', '02096531400', 6, 66, 'HoyHong', 'Impedit autem dolor', 'Chanthaburi', '1', NULL, 0, 0, '2024-07-24 22:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblscore`
--

CREATE TABLE `tblscore` (
  `id` int(11) NOT NULL,
  `student_no` varchar(15) NOT NULL,
  `class_id` int(11) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `score` float NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblscore`
--

INSERT INTO `tblscore` (`id`, `student_no`, `class_id`, `semester`, `score`, `created_by_user_id`, `created_at`) VALUES
(1, 'STD001', 1, '2024-2025', 55, 1, '2024-07-24 10:06:46'),
(2, 'STD002', 5, '2024-2025', 35, 7, '2024-07-24 15:37:21'),
(3, 'STD003', 3, '2024-2025', 91, 7, '2024-07-24 15:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('M','F','O') NOT NULL,
  `dob` date DEFAULT NULL,
  `province_id` int(11) NOT NULL,
  `district` varchar(100) NOT NULL,
  `village` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `class` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `profile_avatar` varchar(255) NOT NULL DEFAULT ' ',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `login_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `first_name`, `last_name`, `email`, `gender`, `dob`, `province_id`, `district`, `village`, `phone`, `class`, `password`, `role`, `profile_avatar`, `created_at`, `updated_at`, `active`, `login_date`) VALUES
(1, 'Xiong', 'Cha', 'chaxiong@fullstacksys.com', 'M', NULL, 3, '', '', '', 2, '$2y$12$MGKgsVb3.u0QT7G6riEfr.Fa.Oyjp8oREbhmBMFSxamKmUbBhBRUm', 'admin', 'https://jointpharmalaos.com/uploads/user-images/52213cb20efb8a034.png', 1649661475, 1624406429, 1, 1699328764),
(7, 'ka', 'law', 'ka@gmail.com', 'M', NULL, 6, '', '', '', 1, '$2y$12$m5MCXL1YybtcYvRe.ZGyQO81FgMmm7lauNTpf9vWCBEIfH0P208na', 'admin', 'http://localhost/university/kees/uploads/staff/302b4830f42a2df19.png', 1721708866, 1631153672, 1, 1721918937),
(13, 'AB', 'BB', 'katrade1997@gmail.com', 'M', '2024-07-02', 5, 'Quos autem suscipit ', 'HoyHong', '02096531400', 3, '$2y$12$t/blXELFSF0eaPzYY4S0MuwH7.npc1BJfqCNxJehFr5sIYrPqbvKi', 'staff', 'http://localhost/university/kees/uploads/staff/33cf49cb0f6df4364.png', 1721714795, 0, 1, 1721714795);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccesslog`
--
ALTER TABLE `tblaccesslog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_tblaccesslog_user` (`user_id`);

--
-- Indexes for table `tbldistrict`
--
ALTER TABLE `tbldistrict`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfee`
--
ALTER TABLE `tblfee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblregister`
--
ALTER TABLE `tblregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblscore`
--
ALTER TABLE `tblscore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccesslog`
--
ALTER TABLE `tblaccesslog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldistrict`
--
ALTER TABLE `tbldistrict`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `tblfee`
--
ALTER TABLE `tblfee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblregister`
--
ALTER TABLE `tblregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblscore`
--
ALTER TABLE `tblscore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
