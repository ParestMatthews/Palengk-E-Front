-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2019 at 11:43 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostslav_thesisdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cart_id` int(11) NOT NULL,
  `Cart_items` text COLLATE utf8_unicode_ci NOT NULL,
  `Customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_id`, `Cart_items`, `Customer_id`) VALUES
(1, '{}', 1),
(8, '{}', 0),
(9, '{}', 9),
(10, '{}', 10),
(11, '{}', 11),
(12, '{}', 12),
(13, '[{\"id\":\"17\",\"quantity\":\"8\",\"old price\":\"50.00\",\"new price\":\"60.00\"}]', 13),
(14, '{}', 14),
(15, '{}', 15),
(16, '{}', 16),
(17, '{}', 17),
(18, '[{\"id\":\"70\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"60\",\"quantity\":\"1\",\"old price\":\"140.00\",\"new price\":\"170.00\"},{\"id\":\"57\",\"quantity\":\"1\",\"old price\":\"10.00\",\"new price\":\"15.00\"},{\"id\":\"22\",\"quantity\":2,\"old price\":\"\",\"new price\":\"\"}]', 18),
(19, '{}', 19),
(20, '{}', 20),
(21, '{}', 21),
(22, '{}', 22),
(23, '{}', 23),
(24, '{}', 24),
(25, '{}', 25),
(26, '{}', 26),
(27, '{}', 27),
(28, '[{\"id\":\"35\",\"quantity\":\"30\",\"old price\":\"\",\"new price\":\"\"}]', 28),
(29, '{}', 29),
(30, '[{\"id\":\"54\",\"quantity\":\"50\",\"old price\":\"\",\"new price\":\"\"}]', 30),
(31, '{}', 31),
(32, '{}', 32),
(33, '{}', 33),
(34, '{}', 34),
(35, '{}', 35),
(36, '{}', 36),
(37, '{}', 37),
(38, '{}', 38),
(39, '{}', 39),
(40, '{}', 40),
(41, '{}', 41),
(42, '{}', 42),
(43, '{}', 43),
(44, '{}', 44),
(45, '{}', 45),
(46, '{}', 46),
(47, '{}', 47),
(48, '{}', 48),
(49, '{}', 49),
(50, '{}', 50),
(51, '{}', 51),
(52, '{}', 52),
(53, '{}', 53),
(54, '{}', 54),
(55, '[{\"id\":\"34\",\"quantity\":\"10\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"18\",\"quantity\":\"5\",\"old price\":\"\",\"new price\":\"\"}]', 55),
(56, '{}', 56),
(57, '[{\"id\":\"23\",\"quantity\":\"50\",\"old price\":\"\",\"new price\":\"\"}]', 57),
(58, '{}', 58);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_id` int(255) NOT NULL,
  `Category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_id`, `Category_name`) VALUES
(1, 'Vegetables'),
(2, 'Fruits'),
(3, 'Grains'),
(4, 'Dairy'),
(5, 'Meats'),
(7, 'Eggs'),
(8, 'Poultry'),
(10, 'Spices'),
(11, 'Seafood');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customer_id` int(255) NOT NULL,
  `Full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_phone` text COLLATE utf8_unicode_ci NOT NULL,
  `Customer_barangay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_joindate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Customer_login` datetime NOT NULL,
  `Customer_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_id`, `Full_name`, `Customer_email`, `Customer_password`, `Customer_phone`, `Customer_barangay`, `Customer_address`, `Customer_joindate`, `Customer_login`, `Customer_photo`, `Deleted`) VALUES
(1, 'Parest Matthews', 'aqwvelocity98@yahoo.com', '$2y$10$aGL.3iGYHehk7yeO1EMVq.VEnUvT5v/qN8Kbf9HmMgIetgElR2R6i', '639497058258', 'East Tapinac', '4 alba st.', '0000-00-00 00:00:00', '2019-03-25 03:54:51', '/Thesis/images/93321b08515d0cba4e916961492be3b5.png', 0),
(8, 'Parest Matthews', '123@yahoo.com', '$2y$10$6jo6ehZN0OjLNOhZsekjruT.HzrD1tnn5gqJwbbqsqZDwb2cMCO1C', '0', '0', '0', '2019-01-26 20:46:33', '2019-01-27 05:46:33', '', 0),
(9, 'Parest Matthews', 'gfhfghfgh@gmail.com', '$2y$10$hfFUUG74.2lvwYr0lDun5O1YpH4jxVlMtGKamQh/nHUP.gx3PJw96', '0', '0', '0', '2019-02-22 20:31:07', '2019-02-23 05:31:07', '', 0),
(11, 'Lance Espineli', 'lanceespineli_30@yahoo.com.ph', '$2y$10$uydfNLs1vybuF.JNdIwMJ.1/Y.Vb/5g0L9JlPAEGTrSfzuSBrDiqq', '09173889987', 'Sta Rita', '#889 Jasmine Street', '2019-02-25 07:02:51', '2019-03-05 06:27:48', '', 0),
(12, 'Ryan Wills', 'rjwills1016@gmail.com', '$2y$10$hbPj2aJNGYKz3ziC2t1f4edCzFTqSa9Wwq63sh.Fu0Pz33Q6DUYoW', '09982441456', 'Mabayuan', '114 Otero Avenue', '2019-02-26 20:27:14', '2019-03-04 19:22:31', '', 0),
(15, 'Emmanuel Tampos', 'tampos.emmanuel@gmail.com', '$2y$10$LLjijSQqVsgWBeHjx8KkJumjbxnJsgG7GO.Q/WNAc5LWXHplJV8rq', '09155603847', 'Old Cabalan', 'Purok 7 Highway', '2019-02-27 03:34:03', '2019-02-27 17:34:03', '', 0),
(16, 'Karen Pelaez', 'joycepelaez23@gmail.com', '$2y$10$JhK1YxeQ.BLQD/NR9JDuSeGOyixXTMarQNWCnS4vI8/1sHnu7M66m', '09300081018', 'Gordon Heights', 'Blk 1 upper federico st. Gordon heights olongapo vity', '2019-02-27 03:39:16', '2019-02-27 17:39:16', '', 0),
(17, 'Jap Barrera', 'japbrrr@gmail.com', '$2y$10$4KZTYA7RvHeO9gzciudpA.xWmNmvIKLRK.xRlLi0awurhYwZGfRdG', '09958341609', 'Santa Rita', '1419 tabacuhan road sta rita olongapo city', '2019-02-27 03:41:59', '2019-02-27 17:41:59', '', 0),
(18, 'Che Carbo', 'rhianne_del23@ymail.com', '$2y$10$MIL7MAEhy4WP4TfI2kJN9..SOzcdMe.bqwq.546xALsgwQebLguYK', '09467683087', 'Old Cabalan', 'Forestry old cabalan olongapo city', '2019-02-27 03:45:48', '2019-02-27 17:45:48', '', 0),
(19, 'Renz Chavez', 'rdmchavez022@gmail.com', '$2y$10$A3MiEZAir164MPr9VqklJu9VnpYRFypbNVklJqDeO2Hx/QQHO6pf2', '09771026165', 'New Cabalan', '#144 Manga St. New cabalan olongapo city', '2019-02-27 03:46:44', '2019-03-05 14:56:14', '', 0),
(20, 'Jonna Valdez', 'jmvaldez1016@gmail.com', '$2y$10$IHcqXVkhuq/D30ZWeptPxeRmZKDbSk67nE4Vzl81EVTDNu4hETnnO', '09451563055', 'Santa Rita', '8888, jasmin', '2019-02-27 03:46:52', '2019-03-05 14:48:49', '', 0),
(21, 'Lance Sister', 'ldsister16@gmail.com', '$2y$10$Hg6MRIfnq4COl9Tm6kF31ePaTM51whhfXR8z35UiTbaRhw1pGE/me', '09954582973', 'Kalaklan', '23 A Virginia St. Lower kalaklan olongapo city', '2019-02-27 03:47:06', '2019-02-27 17:47:06', '', 0),
(23, 'Nicholas Salas', 'njrsalas16@gmail.com', '$2y$10$nC49PsYDA4cvIe4Ku8qGEupKT1VYsP/h4OlDhfrzxvruztnSWG3MK', '09562990418', 'Mabayuan', '35 C otero avenue mavayuan olongapo city', '2019-02-27 03:50:11', '2019-02-27 17:50:11', '', 0),
(24, 'loressa lai mejos', 'loressalai0o0@gmail.com', '$2y$10$qxfwJILKwSvic/Yz.eppTeg/hPBVpxDv973Qnr08ltdjZ3R5gqqx.', '09210227787', 'Asinan', 'asinan court', '2019-02-27 03:51:12', '2019-02-27 17:51:11', '', 0),
(25, 'Mariela De Jesus', 'mdjesus1016@gmail.com', '$2y$10$n8I8F8MZe.ivYRPb8iJD/.HfZu279IP20axhRWS0oSdhTdlheGbqC', '09174239921', 'Mabayuan', '#08 labrador st.', '2019-02-27 03:52:47', '2019-02-27 17:52:47', '', 0),
(26, 'qwerty qwerty', 'qwerty@gmail.com', '$2y$10$xFnaTYcnGzNIcaZlRAY4LegAFSQFw.W9/kKope4GYiyRz4zVzxqYm', '123123123', 'West Bajac-bajac', '12312321', '2019-02-27 03:54:50', '2019-02-27 18:01:06', '', 0),
(27, 'Cire Maniego', 'jcmaniego16@gmail.com', '$2y$10$Dl.9nTFf5NhL.zWIoFtituDNNUpYcFno9HgLC2NHRTllmL/hcsc/6', '09954649629', 'Mabayuan', '#8 labrador st.', '2019-02-27 03:55:22', '2019-02-27 17:55:22', '', 0),
(28, 'ram miz', 'ramon.anthony9@yahoo.com', '$2y$10$8y.ROp02I9peCzHA13qlu.NV8SouwTmpfTQ3Zhd3Sm7iBhRj4I2Um', '9270016021', 'Santa Rita', '1022 Jasmin Street Sta.Rita', '2019-02-27 03:56:36', '2019-02-27 18:02:08', '', 0),
(29, 'kk tan', 'klart.tanega@yahoo.com.ph', '$2y$10$SF0zPmDKQJdTxGLeCc2tTuVjzMr3STW7oyz4CzMr22eEM8x7r3hze', '09162053312', 'New Cabalan', 'kemekemekeme', '2019-02-27 03:58:09', '2019-02-27 17:58:09', '', 0),
(30, 'Lyan Damel Rizardo', 'lyandamelrizardo@gmail.com', '$2y$10$QSDm39PoxtnmJGZVqUarTuTww0aXH1MZUbpirl.XH0O8oCp9On.zy', '09272606258', 'Old Cabalan', 'Bahay', '2019-02-27 04:00:59', '2019-02-27 18:00:59', '', 0),
(31, 'Kevin Roi Crisolo', 'krcrisolo16@gmail.com', '$2y$10$1iPJxgVGwcqTDpt7uwd73uHCrTL9EGuftCvpVyMjT/pLPSFYMvJ7e', '09955223676', 'East Bajac-bajac', 'Harris 18th St East BajacBajac', '2019-02-27 04:02:48', '2019-02-27 18:02:48', '', 0),
(32, 'Pau Antonio', 'antonio_paula25@yahoo.com', '$2y$10$isSioBwuS2j2Txl0GU89MezdKoLbuNJcDixnYHu1EbwCJ8MAcytai', '09771579942', 'Mabayuan', '5K Alagaw St. Mabayuan Olongapo City', '2019-02-27 04:03:17', '2019-02-27 18:03:17', '', 0),
(33, 'lloyd ecleo', 'lloyd_ecleo@yahoo.com', '$2y$10$0wMhbIvpqSAsavRPiH8joelrJz99CTmDpyrrgKLnxRY5Fcux2A0q2', '09288200926', 'Barretto', 'La Union St. Barretto Olongapo City', '2019-02-27 04:05:04', '2019-02-27 18:05:04', '', 0),
(34, 'Claudine Joy Efe', 'cjefe16@gmail.com', '$2y$10$dII79.xoagqVjmzVFsJEfO4chRuOezu8Odj5If9aueoqGceO4NK3m', '09208222641', 'Santa Rita', 'Sta rita,balic balic,olongapo city', '2019-02-27 04:05:58', '2019-02-27 18:05:58', '', 0),
(35, 'Ched Richard', 'chedrodriguez28@yahoo.com', '$2y$10$O9Z3M.Y.3xFroaCCKnjAbOuGXzytnjTcelV/kRmACjGTgzPy1lYEm', '09055223142', 'Pag-asa', '#156 gordon ave', '2019-02-27 04:09:19', '2019-02-27 18:09:19', '', 0),
(36, 'Elsbeth Randel Puno', 'elsbethrandel@gmail.com', '$2y$10$JEkUROwA2U/WEmN60hCyy.sGLZ2WNOwMWdVNaj4Pws0jP7vGBKN8i', '09094831942', 'New Cabalan', 'Iram, New Cabalan, Olongapo City', '2019-02-27 04:11:00', '2019-02-27 18:11:00', '', 0),
(37, 'Joenelle Canonizado', 'jellycoolcat@yahoo.com', '$2y$10$O/SF5MQrCblaeLgA2cJIte2MNO.KKLx.f1/EQbloatexEC381Og1K', '09457933249', 'Santa Rita', '#880 jasmine', '2019-02-27 04:13:28', '2019-02-27 18:13:28', '', 0),
(38, 'Vincent Gorospe', 'vincentgorospe221@gmail.com', '$2y$10$4EVfNANmxJdubPD6tkqFE.xaX/j8NNPNmiKqjEYDKpplnJy0.zCZC', '09954492747', 'New Cabalan', 'Tagak st. Prk 6', '2019-02-27 04:15:39', '2019-02-27 18:15:39', '', 0),
(39, 'Christorpher james', 'zner0988@gmail.com', '$2y$10$hsVG1P0UW1oEqXk6CxhrE.x.tSwmgNVf4UjAxrDBEg5XMO4MKY2E2', '09286028672', 'Gordon Heights', 'Block 24 Gordon Heights', '2019-02-27 04:20:23', '2019-02-27 18:20:23', '', 0),
(40, 'Janzen Valdez', 'jonna_valdez1011@yahoo.com', '$2y$10$a41Y1QTm0IM1KMdrbA3EeuhxfSwkI5bDfaMqYEmpa632rSHisnOIK', '09217772367', 'Santa Rita', '8888, jasmin', '2019-02-27 04:21:51', '2019-02-27 18:21:51', '', 0),
(41, 'Jc Carlos', 'wakokz24@gmail.com', '$2y$10$1xZhgrMpQqunhrKeGsX3uen5rLDwdVW/g3NE64BncjTSYib3yzz9K', '09106538099', 'Old Cabalan', 'Sa likod nila aling vicky', '2019-02-27 04:24:03', '2019-02-27 18:25:01', '', 0),
(42, 'Hiro De Asis', 'hirodeasis@gmail.com', '$2y$10$jtTcySRmcspyd8i2zVIgKur.d4ZAmtFeA9Z/zWi3T0P0FkzP0.ipa', '09274214052', 'Santa Rita', '#334 Santa Rita Olongapo City', '2019-02-27 04:30:30', '2019-02-27 18:30:30', '', 0),
(43, 'Quincy Monta', 'qmonta@yahoo.com', '$2y$10$H3Cc4DZTM3Ej41F.ymU1HuALhVS82wROhK.pWaAPa3VXiwMsr8DmK', '09957518374', 'East Tapinac', 'Olongapo city', '2019-02-27 04:34:16', '2019-02-27 18:34:16', '', 0),
(44, 'Ann Jena Capco', 'ajcapco@yahoo.com', '$2y$10$Oy/f1rzBZQcZJrYPQoVpTu3.UroyjvRucdulgxHBBy26kMLDYsqWe', '09215456437', 'New Ilalim', '#81-C Esteban Street New Ilalim', '2019-02-27 04:39:01', '2019-02-27 18:39:01', '', 0),
(45, 'Eldon Masocol', 'wowowie@yahoo.com', '$2y$10$V4zC3dHPsY1d78FHo86nAOzZ5LqTORUzFpkrwPiDanMGbTTrZYPhq', '09123456789', 'New Kababae', 'Gapo', '2019-02-27 04:43:13', '2019-02-27 18:43:13', '', 0),
(47, 'Mika Montelibano', 'mikaellamontelibano07@gmail.com', '$2y$10$8.BDuueddyKleONwXYbLzusIXUTX8bpksIQ43GoaiScwIC0jByc0y', '09088935465', 'Old Cabalan', 'Villa Miranda', '2019-02-28 03:25:37', '2019-02-28 17:25:37', '', 0),
(48, 'kevinruss Viray', 'kevinviray21@gmail.com', '$2y$10$URgvB/INgGA2d/3OuaZBg.oOJk/wlKbI6O9ZtKufHMax8wcmfbDh2', '09070966999', 'Gordon Heights', 'Canda', '2019-03-04 02:21:58', '2019-03-04 16:21:58', '', 0),
(49, 'Fatima Joy Llave', 'fjllave@gmail.com', '$2y$10$7.LiKtSK5MjayI1FOEzPg.oEEQcMKkCpP5jnv6qq659KweZ3T9ihK', '09772086319', 'Old Cabalan', 'Lot 16 Block 5 Villa Miranda', '2019-03-05 00:45:04', '2019-03-05 14:45:04', '/Thesis/images/4c710e6c81fbee7af9e40a61363329f1.jpeg', 0),
(50, 'loressa lai mejos', 'Llmejos16@gmail.com', '$2y$10$6kPsk0xNAsIPLe3x4C/6xuU29W7GSoJFhv38OWJMkIdz9A8ChHS4i', '09210227787', 'Gordon Heights', 'Basta don', '2019-03-05 00:46:07', '2019-03-05 14:46:07', '/Thesis/images/74c05c15866f7ec61fa0d98393e1d628.jpg', 0),
(51, 'Rachelle Adamos', 'rachelleadamos@icloud.com', '$2y$10$XcwHxbpJ05wyy86CC1yG9uP4WOZbvhtulGoFj3dMB9gJQmV6xJ3hS', '09167991074', 'Old Cabalan', 'Lot 16 Block 5 Villa Miranda', '2019-03-05 00:50:09', '2019-03-05 14:55:05', '/Thesis/images/b1755994f23cb1e1fd51d0641f3a7d34.jpeg', 0),
(52, 'Koko Beltran', 'cocobeltran38@gmail.com', '$2y$10$JFXH54.e4Okh98ln.Uj8LuBXtjS/Viro8hATEocNl6ckkNoAx/kDa', '09399697956', 'Barretto', '#367 Mangan Vaca, Subic, Zambales', '2019-03-05 00:51:21', '2019-03-05 14:51:21', '/Thesis/images/832eb836a7df1b3c9bd434f88be4ee42.jpeg', 0),
(53, 'Aerylle Tajonera', 'aeryllemt@yahoo.com', '$2y$10$Fb6Z7C.VgoAtsRJmr2sOTuEIWHMNq0eEdhmOWOijFX1i4kgmE5k.K', '09776964325', 'Santa Rita', '1672', '2019-03-05 01:00:03', '2019-03-05 15:00:03', '/Thesis/images/2ca6edf8142436c0c38110cda938e5e2.jpg', 0),
(54, 'Gar Jan Jay Radoc', 'tidibirz7@gmail.com', '$2y$10$eVu/ZcEVscVOpa9x.YheyeZMqJB97zt.VidwgqRkiSQOcJUzZy3mO', '09369573164', 'Gordon Heights', 'hell no!!!', '2019-03-05 01:02:18', '2019-03-05 15:02:18', '/Thesis/images/7760a6defd5c7a7572a97f2383578c22.jpg', 0),
(55, 'lloyd ecleo', 'ecleolloyd@yahoo.com', '$2y$10$NEX36CRqcph2sLauUWBo2.WB0xtw6ltJQsugkpy9sPuFgzOmXW7Ra', '0999999999999', 'Barretto', '#22 la union st. bo barretto olongapo city', '2019-03-05 01:03:04', '2019-03-05 15:03:04', '/Thesis/images/65db941221257de7992a3dc398749d28.jpg', 0),
(56, 'Che Carbo', 'aqualady@ymail.com', '$2y$10$hQ.N69kx.2t0TZuWL.AWbOGMg4Q23kpK4vrXayw6xControb39bt.', '09467683087', 'Old Cabalan', 'Forestry old cabalan olongapo city', '2019-03-05 01:03:47', '2019-03-05 15:03:47', '/Thesis/images/11fee00e823e8bce23a10253488d13ea.jpg', 0),
(57, 'Lyan Damel Rizardo', 'lyandamelrizardo16@gmail.com', '$2y$10$ZnuhHZpJAAMALpFVLvyUvOCz.bmU5H7mjiuQmfK7vFJ6ubaz7aSsy', '09272606258', 'Old Cabalan', '2033 Purok 9', '2019-03-05 01:07:30', '2019-03-05 15:07:30', '/Thesis/images/bb9813b60045317463b678bd6c941f7c.png', 0),
(58, 'Ian Olaes', 'christianolaes25@gmail.com', '$2y$10$Zhb51mDA.MkzN0sVBMqIKezRrG3eyrON0yN.76C464QCfr1UeQqJW', '09778300914', 'Pag-asa', '#33 burgos st', '2019-03-05 01:21:47', '2019-03-05 15:21:47', '/Thesis/images/69d4e11fea9c77fd7e9512d74150daeb.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_id` int(255) NOT NULL,
  `Product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Product_price` decimal(20,2) NOT NULL,
  `Product_origprice` decimal(20,2) NOT NULL,
  `Product_quantity` int(11) NOT NULL,
  `Product_category` int(11) NOT NULL,
  `Product_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `Product_tags` text COLLATE utf8_unicode_ci NOT NULL,
  `Deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_id`, `Product_name`, `Product_price`, `Product_origprice`, `Product_quantity`, `Product_category`, `Product_image`, `Product_description`, `Product_tags`, `Deleted`) VALUES
(17, 'Cabbage', '60.00', '50.00', 95, 1, '/Thesis/images/2f3c1461bb8e2af0ced7c0fde6e33be6.jpg', '   A cabbage is a round vegetable with white, green, or purple leaves that is usually eaten cooked.\r\n\r\nper kilogram   ', 'Repolyo', 1),
(18, 'Red Onion', '110.00', '90.00', 58, 1, '/Thesis/images/c95f265223bbabccb82cba0cfc275756.jpeg', ' Red onions are cultivars of the onion (Allium cepa) with purplish-red skin and white flesh tinged with red. These onions tend to be medium to large in size and have a mild to sweet flavor. They are often consumed raw, grilled or lightly cooked with other foods, or added as a decoration to salads.\r\n\r\nper kilogram ', 'sibuyas,onion', 0),
(19, 'White Onion', '55.00', '40.00', 52, 1, '/Thesis/images/2ce18504b60d728c3af26e66b90c1e51.jpg', ' White onion (Allium cepa, &#039;sweet onion&#039;) is a cultivar of dry onion, that has a pure white papery skin and a sweet, mild white flesh. ... The onion can be saut&eacute;ed to a dark brown color and served to provide a sweet and sour flavor to other foods.\r\n\r\nper kilogram ', 'sibuyas, onion', 0),
(20, 'Onion Chives', '30.00', '25.00', 47, 1, '/Thesis/images/cac515a1ed69694d24a8f5e51ff383a9.jpg', ' Description. Chives belong to the same family as onion, leeks and garlic. They are a hardy, drought-tolerant perennial growing to about 10-12 inches tall. They grow in clumps from underground bulbs and produce round, hollow leaves that are much finer than onion.\r\n\r\nper bundle ', 'scallion', 0),
(21, 'Garlic', '60.00', '45.00', 50, 1, '/Thesis/images/9ac32e4a9dba3859ff5357c6328cab68.jpg', ' Garlic (Allium sativa ), is a plant with long, flat grasslike leaves and a papery hood around the flowers. ... The stalk rises directly from the flower bulb, which is the part of the plant used as food and medicine. The bulb is made up of many smaller bulbs covered with a papery skin known as cloves.\r\n\r\nper half kilogram ', 'bawang', 0),
(22, 'Potato', '60.00', '45.00', 43, 1, '/Thesis/images/842202c029d7e01f5497e59ad98e3332.jpg', '   Potato, Solanum tuberosum, is an herbaceous perennial plant in the family Solanaceae which is grown for its edible tubers. The potato plant has a branched stem and alternately arranged leaves consisting of leaflets which are both of unequal size and shape.\r\n\r\nper kilogram   ', 'patatas', 0),
(23, 'Ampalaya', '35.00', '25.00', 50, 1, '/Thesis/images/108f2e4bea9510e791d5fb03fd09cc9c.jpg', ' A tropical annual vine (Momordica charantia) native to Asia, having yellow flowers and orange, warty fruits that open at maturity to expose red-coated seeds. Various parts of the plant are used in traditional medicine or for food ', 'bittergourd', 0),
(24, 'Carrots', '35.00', '25.00', 50, 1, '/Thesis/images/be24bdc09f255bcb4a807741712f9dbb.jpg', 'Carrot, Daucus carota, is an edible, biennial herb in the family Apiaceae grown for its edible root. The carrot plant produces a rosette of 8&ndash;12 leaves above ground and a fleshy conical taproot below ground. The plant produces small (2 mm) flowers which are white, red or purple in color\r\n\r\nper half kilogram', 'carrot', 0),
(25, 'Ladyfinger', '25.00', '20.00', 50, 1, '/Thesis/images/516db479b1f8718358ffc920b73162b1.jpg', 'Okra, Abelmoschus esculentus, is an herbaceous annual plant in the family Malvaceae which is grown for its edible seed pods. Okra plants have small erect stems that can be bristly or hairless with heart-shaped leaves\r\n\r\nper bundle', 'okra', 0),
(26, 'Broccoli', '65.00', '50.00', 49, 1, '/Thesis/images/f4820f7d23dcdfd751cd01f94cb4d3b3.jpg', 'Broccoli has large flower heads, usually green in color, arranged in a tree-like structure branching out from a thick, edible stalk. The mass of flower heads is surrounded by leaves.\r\n\r\nper half kilogram', 'broccoli', 0),
(27, 'Cauliflower', '45.00', '35.00', 50, 1, '/Thesis/images/07ddf2341e98ea3a93081dc5ca4a311c.jpg', '   Cauliflower is one of several vegetables in the species Brassica oleracea in the genus Brassica, which is in the family Brassicaceae. It is an annual plant that reproduces by seed. Typically, only the head is eaten &ndash; the edible white flesh sometimes called &quot;curd&quot; (with a similar appearance to cheese curd)\r\n\r\nper half kilogram    ', 'cauliflower', 0),
(28, 'Green Bell Pepper', '35.00', '25.00', 50, 1, '/Thesis/images/1c2eb7e63ea7d55900fbe681b3d4a312.jpg', ' Bell peppers, Capsicum annuum are a cultivar group of annual or perennial plants in the family Solanaceae grown for their edible fruits. Bell pepper plants are short bushes with woody stems that grow brightly colored fruits\r\n\r\nper 1/4 kilogram ', 'bellpepper', 0),
(29, 'Red Bell Pepper', '35.00', '25.00', 50, 1, '/Thesis/images/dbdb79f49060429cb55638ab930ee0ff.jpg', 'Bell peppers, Capsicum annuum are a cultivar group of annual or perennial plants in the family Solanaceae grown for their edible fruits. Bell pepper plants are short bushes with woody stems that grow brightly colored fruits\r\n\r\nper 1/4 kilogram', 'bellpepper', 0),
(30, 'Radish', '40.00', '30.00', 50, 1, '/Thesis/images/12143cd1052fb5d8fb61fad0d926f9d3.jpg', 'Daikon radish is most often grown for its root, though the green tops are just as edible and versatile. The root of the Daikon radish is cylindrical with a white skin similar to that of a carrot or turnip. \r\n\r\nper kilogram', 'labanos', 0),
(31, 'Riped Papaya', '85.00', '70.00', 50, 1, '/Thesis/images/a91c646e2b741bc0cacf944eccd3b3e7.jpg', ' The papaya is a small, sparsely branched tree, usually with a single stem growing from 5 to 10 m (16 to 33 ft) tall, with spirally arranged leaves confined to the top of the trunk. The lower trunk is conspicuously scarred where leaves and fruit were borne.\r\n\r\nper kilogram ', 'papaya', 0),
(32, 'Green Papaya', '40.00', '30.00', 50, 1, '/Thesis/images/878a3062a3c7ce1665f49caf8e95ce50.jpg', 'The papaya is a small, sparsely branched tree, usually with a single stem growing from 5 to 10 m (16 to 33 ft) tall, with spirally arranged leaves confined to the top of the trunk. The lower trunk is conspicuously scarred where leaves and fruit were borne. ', 'papaya', 0),
(33, 'Eggplant', '35.00', '25.00', 50, 1, '/Thesis/images/7228688a3d06d88552cecd531f88e7d6.jpg', 'Eggplant, Solanum melongena, is a tropical, herbaceous, perennial plant, closely related to tomato, in the family Solanaceae which is grown for its edible fruit. The plants has a branching stem and simple, long, flat. coarsely lobed leaves which are green in color and are arranged alternately on the branches.\r\n\r\nper half kilogram', 'talong', 0),
(34, 'Tomato', '25.00', '15.00', 50, 1, '/Thesis/images/babc6fab247a67d5e49d6478af0d452e.jpg', 'Tomato, (Solanum lycopersicum), flowering plant of the nightshade family (Solanaceae), cultivated extensively for its edible fruits. Labelled as a vegetable for nutritional purposes, tomatoes are a good source of vitamin C and the phytochemical lycopene.\r\n\r\nper half kilogram', 'kamatis', 0),
(35, 'Calamansi', '45.00', '35.00', 4, 2, '/Thesis/images/b8ade11991054a24a489814d3dccc784.jpg', 'Calamansi is a rich source of vitamin C. its juice is used as a flavoring ingredient or as an additive in various food preparations. \r\n\r\nper kilogram', 'calamansi', 0),
(36, 'Chili Pepper', '35.00', '25.00', 39, 10, '/Thesis/images/d177239d092c72f32138adb19a2edcb2.jpg', 'Chili peppers are widely used in many cuisines as a spice to add heat to dishes.\r\n\r\nper 1/4 kilogram', 'sili, sile', 0),
(37, 'Watermelon', '140.00', '120.00', 36, 2, '/Thesis/images/47e4053b9b17884a2215b576f6d33a0c.jpg', '  It has an oval or spherical shape and a dark green and smooth rind, sometimes showing irregular areas of a pale green colour. It has a sweet, juicy, refreshing flesh of yellowish or reddish colour, containing multiple black, brown or white pips.\r\n\r\nper 1 whole', 'watermelon, melon,pakwan', 0),
(38, 'Green Apple', '30.00', '20.00', 50, 2, '/Thesis/images/24304034de1828d83236dd9ba55b189d.jpg', '  Green apples are light green in colour and have crisp and juicy white flesh, which has a tart taste compared to red apples. Green apple has its share of die-hard fans who relish it as a snack and in recipes like salads. Green apples can be chopped into small or big pieces as desired.\r\n\r\nper piece  ', 'mansanas, apple', 0),
(39, 'Red Apple', '30.00', '20.00', 50, 2, '/Thesis/images/ceaff16e23d9702ea17338390404a2a3.jpg', 'Red Delicious apples are bright to deep red in color, oftentimes speckled with faint white lenticels (spots). Its creamy white flesh is slightly crisp and dense offering a mildly sweet flavor and slightly flora aroma.\r\n\r\nper piece', 'mansanas', 0),
(40, 'Banana', '65.00', '50.00', 34, 2, '/Thesis/images/7c01af1d11710556a82aa56184d614f2.jpg', ' The banana plant is the largest herbaceous flowering plant. All the above-ground parts of a banana plant grow from a structure usually called a &quot;corm&quot;.\r\n\r\nper piece ', 'saging', 0),
(41, 'Banana (Saba)', '75.00', '60.00', 50, 2, '/Thesis/images/ceceb2212fb796d9e173e17e04008286.jpg', 'Saba bananas grow in giant bunches at the top of a tall central stem on large banana palms. Once bunch of Saba bananas can weigh up to 80 pounds. Each &#039;hand&#039; containing up to 20 angled fruits. They are shorter and thicker than a common banana, with a blockier shape and sharply angled sides.\r\n\r\nper piece', 'saging, saba', 0),
(42, 'Orange', '40.00', '30.00', 50, 2, '/Thesis/images/db368f4e238d3e23f5caafdaa701f103.jpg', ' Orange trees are widely grown in tropical and subtropical climates for their sweet fruit. The fruit of the orange tree can be eaten fresh, or processed for its juice or fragrant peel\r\n\r\nper piece ', 'orange', 0),
(43, 'Melon', '65.00', '50.00', 50, 2, '/Thesis/images/adf9001b56f8397f63b5cb8ab55bf40b.jpg', 'A melon is a large fruit which is sweet and juicy inside and has a hard green or yellow skin. Try a light appetizer such as slices of juicy melon and ham.\r\n\r\nper piece', 'melon', 0),
(44, 'Pork Liempo', '250.00', '220.00', 47, 5, '/Thesis/images/28ba1cd55575727f6ebc8ff1a0ff6355.jpg', ' Pork belly has juicy fat layers wrapped around the meat. There isn&#039;t much meat, but once cooked it becomes tender, similar in texture to a pork loin. And that fat is melt-in-your-mouth\r\n\r\nper kilogram ', 'baboy, liempo, laman', 0),
(45, 'Pork Loin', '280.00', '250.00', 50, 5, '/Thesis/images/6f37aeb8d426efacc877d6cbac1e6817.jpg', 'A pork loin joint or pork loin roast is a larger section of the loin which is roasted. It can take two forms: &#039;bone in&#039;, which still has the loin ribs attached, or &#039;boneless&#039;, which is often tied with butchers string to prevent the roast from falling apart.\r\n\r\nper kilogram', 'baboy, loin, laman', 0),
(46, 'Pork Baby Back Ribs', '250.00', '220.00', 50, 5, '/Thesis/images/bb615dcc82b46c6b966590fa0ec6a2fb.jpg', 'Baby back ribs (also back ribs or loin ribs) are taken from the top of the rib cage between the spine and the spare ribs, below the loin muscle. They have meat between the bones and on top of the bones, and are shorter, curved, and sometimes meatier than spare ribs.\r\n\r\nper kilogram', 'baboy, laman, butobuto, ribs, back', 0),
(47, 'Pork Ham', '225.00', '195.00', 50, 5, '/Thesis/images/c3b23e1adc181a4a205f8b5ddbc2e295.jpeg', 'Ham is pork from a leg cut that has been preserved by wet or dry curing, with or without smoking. As a processed meat, the term &quot;ham&quot; includes both whole cuts of meat and ones that have been mechanically formed.\r\n\r\nper kilogram', 'baboy, laman, hamon, ham', 0),
(48, 'Pork Legs', '190.00', '160.00', 50, 5, '/Thesis/images/e16b81ebdb3018b88a3c0bdf1e843dba.jpg', 'Before cooking the pork and letting it simmer, remember to make slits on the skin. This is to ensure that all the delicious flavors from the bay leaves, garlic, and black peppercorns, are infused in the meat.\r\n\r\nper kilogram', 'pata, baboy, laman, buto, legs, paa', 0),
(49, 'Beef Ribs', '280.00', '250.00', 50, 5, '/Thesis/images/413439508a37c4a7146661fb7f415e54.jpg', '  Short ribs are a cut of beef taken from the brisket, chuck, plate, or rib areas of beef cattle. They consist of a short portion of the rib bone, which is overlain by meat which varies in thickness.\r\n\r\nper kilogram  ', 'baka,ribs, laman, buto', 0),
(50, 'Beef Tenderloin', '480.00', '450.00', 50, 5, '/Thesis/images/d77c007d32f09de6ac8001d238a9079f.jpg', 'The center-cut can yield the traditional filet mignon or tenderloin steak, as well as the Chateaubriand steak and beef Wellington. The tail, which is generally unsuitable for steaks due to size inconsistency, can be used in recipes where small pieces of a tender cut are called for, such as beef Stroganoff.\r\n\r\nper kilogram', 'baka, laman, tenderloin, boneless', 0),
(51, 'Beef Shank', '400.00', '370.00', 50, 5, '/Thesis/images/ecb8d544c850e7a5b811f4a7a073d6f2.jpeg', 'The beef shank is the shank (or leg) portion of a steer or heifer. In Britain the corresponding cuts of beef are the shin (the foreshank), and the leg (the hindshank). Due to the constant use of this muscle by the animal it tends to be tough, dry, and sinewy, so is best when cooked for a long time in moist heat.\r\n\r\nper kilogram', 'baka, buto,bone, steak', 0),
(52, 'Beef Round', '400.00', '370.00', 50, 5, '/Thesis/images/86318164944f60501064a97420f90f34.jpg', 'A round steak is a beef steak from the &quot;round&quot;, the rear leg of the cow. The round is divided into cuts including the eye (of) round, bottom round, and top round, with or without the &quot;round&quot; bone (femur), and may include the knuckle (sirloin tip), depending on how the round is separated from the loin.\r\n\r\nper kilogram', 'steak, baka, laman, boneless', 0),
(53, 'Chicken Egg', '10.00', '7.00', 50, 7, '/Thesis/images/98c3ac6fbf6af1d9fb40e1ba5494f4f2.jpg', '  per piece  ', 'itlog, manok', 0),
(54, 'Quail Egg', '120.00', '100.00', 1, 7, '/Thesis/images/bf7087e8b4b079c14cc539c181b73dc6.jpg', '50 pcs per order', 'pugo, itlog', 0),
(55, 'Duck Egg', '10.00', '7.00', 100, 7, '/Thesis/images/a9363ca43aa4a4f55a02dd1daa3b1a63.jpg', 'per piece', 'itlog', 0),
(56, 'Salted Egg', '15.00', '10.00', 100, 7, '/Thesis/images/f927ce3fc9ffc3e55b80cfbf3caa0baa.jpg', 'Salted Eggs (Itlog na Maalat) Salted Eggs are often made by curing them in a brine solution (salt and water solution).\r\n\r\nper piece', 'maalat, itlog,pula', 0),
(57, 'Organic Egg', '15.00', '10.00', 50, 7, '/Thesis/images/681bdf5841b70199b359d67283f23141.jpg', '  Organic egg production is the production of eggs through organic means. In this process, the poultry are fed organic feed. According to the United States Department of Agriculture, organic means that the laying hens must have access to the outdoors and cannot be raised in cages.\r\n\r\nper piece  ', 'organic, itlog', 0),
(58, 'Chicken Wings', '180.00', '150.00', 17, 8, '/Thesis/images/1b98775d14b082851c105a8b94fd5560.jpg', 'chicken wing section (flat or drumette) that is generally deep-fried then coated or dipped in a sauce consisting of a vinegar-based cayenne pepper hot sauce and melted butter prior to serving.\r\n\r\nper kilogram', 'manok, pakpak, wings', 0),
(59, 'Chicken Legs', '180.00', '150.00', 46, 8, '/Thesis/images/dc66741cdca68302827e1680c0a8e8b2.jpg', 'A Chicken Drumstick is the lower part of the chicken leg. Drumsticks range in size from 3 oz to 7 oz, depending on how fully grown the chicken was, but most Drumsticks brought to market these days range around 4 oz or just slightly over.\r\n\r\nper kilogram', 'manok, legs, hita, drumstick', 0),
(60, 'Chicken Thighs', '170.00', '140.00', 50, 8, '/Thesis/images/e66bf183713719b3b9b51f4d80db94bf.jpg', ' Thigh: The top portion of the leg above the knee joint that is connected to the body of the chicken.\r\n\r\nper kilogram ', 'thigh, manok', 0),
(61, 'Chicken Breast', '180.00', '150.00', 50, 8, '/Thesis/images/e8ccbd1822c6601cf7d0bfa655e824cd.jpg', 'The breast portion of the chicken that has been split lengthwise, producing two halves. They are available bone-in, boneless, skin-on and skinless.\r\n\r\nper kilogram', 'manok, breast, dibdib, laman', 0),
(62, 'Chicken Quarter Legs', '155.00', '125.00', 50, 8, '/Thesis/images/7fa1564fbb0c612919055f1721aece7b.jpg', 'Generally includes a little less than a quarter of the meat on the chicken. The cut includes a thigh, drumstick, and a part of the back. Leg: The leg of the chicken consists of two parts, which are the thigh and the drumstick.\r\n\r\nper kilogram\r\n\r\n', 'manok, legs, thigh, quarter', 0),
(63, 'Chicken Gizzard', '130.00', '100.00', 50, 8, '/Thesis/images/7b5b5eaf62cb4f09c92b0d1eef9c5f67.jpg', ' A gizzard is an organ found in the digestive tract of a chicken. Similar to a stomach, the gizzard is used to grind up the foods the bird eats. Gizzards are considered a delicacy in certain cultures, and provide a healthy dose of certain vitamins and minerals.\r\n\r\nper kilogram ', 'manok, balunbalunan', 0),
(64, 'Chicken Liver', '150.00', '120.00', 50, 8, '/Thesis/images/39b717e856031bd0093aa3b6c8e05986.jpg', ' While chicken is one of the most commonly eaten meats, the liver is often overlooked as an undesirable part of the bird. Chicken liver does contain a large amount of cholesterol, but it also supplies healthy doses of many essential vitamins and minerals. \r\n\r\nper kilogram', 'manok, atay', 0),
(65, 'Chicken Feet', '90.00', '70.00', 50, 8, '/Thesis/images/1414a28595e92763f620b44295be32f4.jpg', 'Chicken feet are chock full of collagen and trace minerals which are readily available to the body when cooked down in a stock.\r\n\r\nper kilogram', 'paa, manok', 0),
(66, 'Milkfish', '180.00', '150.00', 50, 11, '/Thesis/images/4fbc928bf5e761495747b9308a79793b.jpg', ' A 3-oz. serving of milkfish offers 25 percent of the phosphorus and the selenium adults should consume daily. Milkfish also contains trace amounts of calcium, iron, potassium and zinc.\r\n\r\nper kilogram  ', 'bangus, isda', 0),
(67, 'Pony Fish', '120.00', '100.00', 50, 11, '/Thesis/images/762e459df299adb6a3b1605039afb61d.jpg', 'Ponyfishes (Sapsap) are small and laterally compressed in shape, with a bland, silvery colouration. They are distinguished by highly extensible mouths, and the presence of a mechanism for locking the spines in the dorsal and anal fins.\r\n\r\nper kilogram', 'isda, sapsap', 0),
(68, 'Tilapia', '90.00', '70.00', 50, 11, '/Thesis/images/8b19ee6eb511202badf987df658ad83a.jpg', 'Tilapia is rich in niacin, vitamin B12, phosphorus, selenium and potassium. It&#039;s an Excellent Source of Protein and Nutrients. ... In 3.5 ounces (100 grams), it packs 26 grams of protein and only 128 calories. Even more impressive is the amount of vitamins and minerals in this fish.\r\n\r\nper kilogram', 'isda, tilapia', 0),
(69, 'Shrimp', '380.00', '350.00', 35, 11, '/Thesis/images/988794cc3787aaf1c2ed352e4261709f.jpg', 'Shrimp is a unique source of the carotenoid astaxanthin. It&#039;s also an excellent source of selenium and vitamin B12. This shellfish is a very good source of protein, phosphorus, choline, copper and iodine.\r\n\r\nper kilogram', 'hipon, sugpo,seafood', 0),
(70, 'Mud Crabs', '330.00', '300.00', 44, 11, '/Thesis/images/bda8947437026b8c367490f7ae0bc5d0.jpg', '  Crab meat is packed with essential fats, nutrients, and minerals that the human body needs to function normally. From selenium and omega-3 fatty acids to protein and vitamin B, crab meat is a very good addition to your diet.\r\n\r\nper kilogram     ', 'alimango, alimasag, crab', 0),
(71, 'String Beans', '25.00', '15.00', 50, 1, '/Thesis/images/cd7548cec901638909fa36250cba2b07.jpg', 'String beans are long, very narrow green vegetables consisting of the cases that contain the seeds of a climbing plant. String beans are vegetables similar to French beans, but thicker.\r\n\r\nper bundle', 'sitaw, beans', 0),
(72, 'Ginger', '25.00', '15.00', 50, 10, '/Thesis/images/9fb40d82503a5f1efad5642ec134244e.jpg', '  Ginger, Zingiber officinale, is an erect, herbaceous perennial plant in the family Zingiberaceae grown for its edible rhizome (underground stem) which is widely used as a spice. The rhizome is brown, with a corky outer layer and pale-yellow scented center.\r\n\r\nper 1/4 kilogram  ', 'luya, spices', 0),
(73, 'Butter', '35.00', '25.00', 48, 4, '/Thesis/images/a01256a01ece3fb2683c3b8f9b9c2adc.jpg', 'It is generally used as a spread on plain or toasted bread products and a condiment on cooked vegetables, as well as in cooking, such as baking, sauce making, and pan frying. Butter consists of butterfat, milk proteins and water, and often added salt.\r\n\r\nper piece', 'butter', 0),
(74, 'Margarine', '35.00', '25.00', 50, 4, '/Thesis/images/4c6527f659c9ac454d27ce12694b9d69.jpg', 'Margarine a vegetable fat that has been processed into a soft, spreadable form with a taste, texture and appearance that is similar to butter. It is used as a topping for many foods, such as bread, crackers, baked goods, vegetables, and snacks and it is also useful as an ingredient in a variety of baked goods.\r\n\r\nper piece', 'margarine', 0),
(75, 'Rock Salt', '15.00', '10.00', 50, 10, '/Thesis/images/b1ab2c9a2a6cd342b26d9ded81a4baa4.jpg', 'Rock Salt is a chemical sedimentary rock that forms from the evaporation of ocean or saline lake waters. It is also known by the mineral name &quot;halite&quot;. It is rarely found at Earth&#039;s surface, except in areas of very arid climate.\r\n\r\nper cup', 'asin', 0),
(76, 'Black Pepper Salt', '65.00', '50.00', 50, 10, '/Thesis/images/485d63f02e4b31a5786e19ce4d15a8bf.jpg', 'Black pepper is the world&#039;s most traded spice, and is one of the most common spices added to cuisines around the world. Its spiciness is due to the chemical piperine, not to be confused with the capsaicin characteristic of chili peppers. It is ubiquitous in the modern world as a seasoning and is often paired with salt.\r\n\r\nper pack', 'paminta', 0),
(77, 'Sticky Rice', '100.00', '80.00', 0, 3, '/Thesis/images/a8da39851030b10245cf5e56aa3c5645.jpg', 'Glutinosa; also called sticky rice, sweet rice or waxy rice) is a type of rice grown mainly in Southeast and East Asia and the eastern parts of South Asia, which has opaque grains, very low amylose content, and is especially sticky when cooked.\r\n\r\nper kilogram', 'bigas, malagkit', 0),
(78, 'Long Grain', '63.00', '48.00', 49, 3, '/Thesis/images/15ed401334111a759975a1091b15b7f3.jpg', 'Rice with a length that is four to five times its width. The rice is fluffy and dry when cooked and because of its low starch content, the rice separates easily without excessive stickiness. Long grain rice is available in different varieties, such as aromatic, white and brown.\r\n\r\nper kilogram', 'bigas', 0),
(79, 'NFA Rice', '37.00', '27.00', 50, 3, '/Thesis/images/6d986cf9ad0d0fc89089f85469308039.jpg', 'NFA stocks and non-fortified milled rice stocks, sugar, corn and by-products.\r\n\r\nper kilogram\r\n', 'nfa, NFA, bigas', 0),
(80, 'Brown Rice', '100.00', '80.00', 50, 3, '/Thesis/images/04ddd730808407e06109d669e684c18d.jpg', 'Brown rice and white rice have similar amounts of calories and carbohydrates. Brown rice is a whole grain and a good source of magnesium, phosphorus, selenium, thiamine, niacin, vitamin B6, and manganese, and is high in fiber. Brown rice is whole rice from which only the husk (the outermost layer) is removed.\r\n\r\nper kilogram', 'brown, bigas', 0),
(81, 'Red Rice', '100.00', '80.00', 50, 3, '/Thesis/images/d6c38efd2bfb224f64e073b8823fb573.jpg', ' Red rice is a variety of rice that is colored red by its anthocyanin content. It is usually eaten unhulled or partially hulled, and has a red husk, rather than the more common brown. Red rice has a nutty flavor. Compared to polished rice, it has the highest nutritional value of rices eaten with the germ intact.\r\n\r\nper kilogram ', 'red, bigas, rice', 0),
(82, 'Evaporated Milk', '35.00', '25.00', 50, 4, '/Thesis/images/250d291e71c9770d533198ac6a6e18dd.jpg', '  A whitish liquid containing proteins, fats, lactose, and various vitamins and minerals that is produced by the mammary glands of all mature female mammals after they have given birth and serves as nourishment for their young. The milk of cows, goats, or other animals, used as food by humans.\r\n\r\nper piece (big can)  ', 'gatas, milk', 0),
(83, 'Condesed Milk', '42.00', '32.00', 42, 4, '/Thesis/images/51df681e4e074aa995ce4d546b477d77.png', ' canned milk that has been thickened by evaporation and sweetened.\r\n\r\nper piece (small can) ', 'gatas, condense', 0);

-- --------------------------------------------------------

--
-- Table structure for table `producttrans`
--

CREATE TABLE `producttrans` (
  `Trans_id` int(255) NOT NULL,
  `Product_name` text COLLATE utf8_unicode_ci NOT NULL,
  `Product_quantity` int(255) NOT NULL,
  `Added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `producttrans`
--

INSERT INTO `producttrans` (`Trans_id`, `Product_name`, `Product_quantity`, `Added_date`) VALUES
(1, 'Red Onion', 10, '2019-03-24 15:30:10'),
(2, 'White Onion', 2, '2019-03-24 15:30:14'),
(3, 'Onion Chives', -3, '2019-03-24 15:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Transaction_id` int(11) NOT NULL,
  `Charge_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Cart_id` int(11) NOT NULL,
  `Transaction_fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Transaction_phone` text COLLATE utf8_unicode_ci NOT NULL,
  `Transaction_province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Transaction_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Transaction_barangay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Transaction_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Transaction_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Transaction_zipcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Transaction_origtotal` decimal(20,2) NOT NULL,
  `Transaction_subtotal` decimal(20,2) NOT NULL,
  `Transaction_grandtotal` decimal(20,2) NOT NULL,
  `Transaction_description` text COLLATE utf8_unicode_ci NOT NULL,
  `Transaction_items` text COLLATE utf8_unicode_ci NOT NULL,
  `Transaction_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Transaction_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Transaction_paid` int(11) NOT NULL,
  `Transaction_shipped` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Transaction_id`, `Charge_id`, `Cart_id`, `Transaction_fullname`, `Transaction_phone`, `Transaction_province`, `Transaction_city`, `Transaction_barangay`, `Transaction_address`, `Transaction_country`, `Transaction_zipcode`, `Transaction_origtotal`, `Transaction_subtotal`, `Transaction_grandtotal`, `Transaction_description`, `Transaction_items`, `Transaction_type`, `Transaction_date`, `Transaction_paid`, `Transaction_shipped`) VALUES
(38, 'CoD_XsRd45079223hgYtDg392311107', 1, 'Parest Matthews', '2147483647', 'Zambales', 'Olongapo City', 'New Cabalan', '4 Alba st.', 'Philippines', '2200', '480.00', '0.00', '620.00', '4 items from Larypa', '[{\"id\":\"37\",\"quantity\":\"4\"}]', 'COD', '2019-02-25 23:41:47', 0, 0),
(39, 'CoD_XsRd88798564hgYtDg954399345', 1, 'Parest Matthews', '2147483647', 'Zambales', 'Olongapo City', 'New Cabalan', '4 Alba st.', 'Philippines', '2200', '480.00', '0.00', '620.00', '4 items from Larypa', '{}', 'COD', '2019-02-25 23:42:50', 0, 0),
(40, 'CoD_XsRd24069999hgYtDg655193265', 1, 'Parest Matthews', '2147483647', 'Zambales', 'Olongapo City', 'Pag-asa', '4 Alba st.', 'Philippines', '2200', '750.00', '0.00', '900.00', '3 items from Larypa', '[{\"id\":\"49\",\"quantity\":\"3\"}]', 'COD', '2019-02-26 00:45:47', 0, 0),
(41, 'CoD_XsRd44528980hgYtDg323223887', 1, 'Parest Matthews', '2147483647', 'Zambales', 'Olongapo City', 'New Kalalake', '4 Alba st.', 'Philippines', '2200', '400.00', '0.00', '540.00', '8 items from Larypa', '[{\"id\":\"17\",\"quantity\":\"8\"}]', 'COD', '2019-02-26 00:54:53', 0, 0),
(42, 'CoD_XsRd37909859hgYtDg824716594', 1, 'Parest Matthews', '2147483647', 'Zambales', 'Olongapo City', 'Pag-asa', '4 Alba st.', 'Philippines', '2200', '750.00', '0.00', '900.00', '3 items from Larypa', '[{\"id\":\"49\",\"quantity\":\"3\"}]', 'COD', '2019-02-26 00:56:18', 0, 0),
(43, 'CoD_XsRd86872628hgYtDg403054173', 1, 'Parest Matthews', '2147483647', 'Zambales', 'Olongapo City', 'Old Cabalan', '4 Alba st.', 'Philippines', '2200', '500.00', '0.00', '620.00', '2 items from Larypa', '[{\"id\":\"49\",\"quantity\":\"2\"}]', 'COD', '2019-02-26 00:59:44', 0, 0),
(44, 'CoD_XsRd65612563hgYtDg415870426', 11, 'Lance Espineli', '2147483647', 'Zambales', 'Olongapo City', 'Santa Rita', '#889 jasmine street', 'Philippines', '2200', '2300.00', '0.00', '2820.00', '16 items from Larypa', '[{\"id\":\"58\",\"quantity\":\"15\"},{\"id\":\"17\",\"quantity\":\"1\"}]', 'COD', '2019-02-26 02:15:31', 1, 2),
(45, 'CoD_XsRd53026390hgYtDg364281427', 1, 'Parest Matthews', '09495054235', 'Zambales', 'Olongapo City', 'New Cabalan', '4 Alba st.', 'Philippines', '2200', '250.00', '0.00', '360.00', '5 items from Larypa', '[{\"id\":\"17\",\"quantity\":5,\"old price\":\"50.00\",\"new price\":\"60.00\"}]', 'COD', '2019-02-26 03:51:21', 0, 0),
(46, 'CoD_XsRd14398806hgYtDg246390735', 11, 'Lance Espineli', '2147483647', 'Zambales', 'Olongapo City', 'Santa Rita', '#889 jasmine street', 'Philippines', '2200', '4500.00', '0.00', '5460.00', '30 items from Larypa', '[{\"id\":\"58\",\"quantity\":\"30\"}]', 'COD', '2019-02-26 03:59:14', 0, 0),
(47, 'CoD_XsRd86670643hgYtDg991258037', 11, 'Lance Espineli', '2147483647', 'Zambales', 'Olongapo City', '', '#889 Jasmine Street', 'Philippines', '2200', '440.00', '0.00', '590.00', '3 items from Larypa', '[{\"id\":\"61\",\"quantity\":\"1\"},{\"id\":\"60\",\"quantity\":\"1\"},{\"id\":\"59\",\"quantity\":\"1\"}]', 'COD', '2019-02-26 04:08:45', 0, 0),
(48, 'CoD_XsRd98254045hgYtDg873812911', 1, 'Parest Matthews', '2147483647', 'Zambales', 'Olongapo City', 'New Kababae', '4 Alba st.', 'Philippines', '2200', '3100.00', '0.00', '3570.00', '22 items from Larypa', '[{\"id\":\"49\",\"quantity\":\"12\"},{\"id\":\"57\",\"quantity\":\"10\"}]', 'COD', '2019-02-26 04:12:35', 0, 0),
(49, 'CoD_XsRd61433520hgYtDg414585027', 14, 'Ryan Wills', '2147483647', 'Zambales', 'Olongapo City', 'Mabayuan', '114 Otero Avenue', 'Philippines', '2200', '700.00', '0.00', '960.00', '20 items from Larypa', '[{\"id\":\"35\",\"quantity\":\"20\",\"old price\":\"35.00\",\"new price\":\"45.00\"}]', 'COD', '2019-02-26 20:37:20', 0, 0),
(50, 'CoD_XsRd81013654hgYtDg791958661', 11, 'Lance Espineli', '2147483647', 'Zambales', 'Olongapo City', 'Sta Rita', '#889 Jasmine Street', 'Philippines', '2200', '10140.00', '0.00', '11430.00', '41 items from Larypa', '[{\"id\":\"49\",\"quantity\":\"40\",\"old price\":\"250.00\",\"new price\":\"280.00\"},{\"id\":\"60\",\"quantity\":\"1\"}]', 'COD', '2019-02-26 20:42:51', 0, 0),
(51, 'CoD_XsRd79443519hgYtDg51863185', 1, 'Parest Matthews', '56756765', 'Zambales', 'Olongapo City', 'East Bajac-bajac', 'hotdog', 'Philippines', '2200', '10000.00', '0.00', '11260.00', '40 items from Larypa', '[{\"id\":\"49\",\"quantity\":\"40\",\"old price\":\"250.00\",\"new price\":\"280.00\"}]', 'COD', '2019-02-26 20:44:44', 0, 0),
(52, 'CoD_XsRd59193520hgYtDg692139605', 11, 'Lance Espineli', '2147483647', 'Zambales', 'Olongapo City', 'Sta Rita', '#889 Jasmine Street', 'Philippines', '2200', '500.00', '0.00', '620.00', '2 items from Larypa', '[{\"id\":\"49\",\"quantity\":\"2\",\"old price\":\"250.00\",\"new price\":\"280.00\"}]', 'COD', '2019-02-26 20:45:18', 0, 0),
(53, 'CoD_XsRd28952559hgYtDg55196117', 14, 'Ryan Wills', '2147483647', 'Zambales', 'Olongapo City', 'Mabayuan', '114 Otero Avenue', 'Philippines', '2200', '390.00', '0.00', '600.00', '18 items from Larypa', '[{\"id\":\"22\",\"quantity\":\"6\",\"old price\":\"45.00\",\"new price\":\"60.00\"},{\"id\":\"57\",\"quantity\":\"12\",\"old price\":\"10.00\",\"new price\":\"15.00\"}]', 'COD', '2019-02-26 20:45:43', 1, 2),
(54, 'CoD_XsRd18763417hgYtDg729674556', 11, 'Lance Espineli', '2147483647', 'Zambales', 'Olongapo City', 'Sta Rita', '#889 Jasmine Street', 'Philippines', '2200', '11000.00', '0.00', '12560.00', '50 items from Larypa', '[{\"id\":\"44\",\"quantity\":\"50\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-26 20:49:53', 0, 0),
(55, 'CoD_XsRd62306656hgYtDg841053844', 1, 'Parest Matthews', '2323423', 'Zambales', 'Olongapo City', 'Barretto', '0dfde5r4 ', 'Philippines', '2200', '270.00', '0.00', '420.00', '9 items from Larypa', '[{\"id\":\"42\",\"quantity\":9,\"old price\":\"30.00\",\"new price\":\"40.00\"}]', 'COD', '2019-02-27 00:52:33', 0, 0),
(56, 'CoD_XsRd88000035hgYtDg159585572', 1, 'Parest Matthews', '2323423', 'Zambales', 'Olongapo City', 'Barretto', '0dfde5r4 ', 'Philippines', '2200', '270.00', '0.00', '420.00', '9 items from Larypa', '{}', 'COD', '2019-02-27 00:52:40', 0, 0),
(57, 'CoD_XsRd8971823hgYtDg451753598', 1, 'Parest Matthews', '2323423', 'Zambales', 'Olongapo City', 'Barretto', '0dfde5r4 ', 'Philippines', '2200', '270.00', '0.00', '420.00', '9 items from Larypa', '{}', 'COD', '2019-02-27 00:57:08', 0, 0),
(58, 'CoD_XsRd74246397hgYtDg546100921', 1, 'Parest Matthews', '2323423', 'Zambales', 'Olongapo City', 'Barretto', '0dfde5r4 ', 'Philippines', '2200', '270.00', '0.00', '420.00', '9 items from Larypa', '{}', 'COD', '2019-02-27 00:58:15', 0, 0),
(59, 'CoD_XsRd2366768hgYtDg336336023', 1, 'Parest Matthews', '2323423', 'Zambales', 'Olongapo City', 'Barretto', '0dfde5r4 ', 'Philippines', '2200', '270.00', '0.00', '420.00', '9 items from Larypa', '{}', 'COD', '2019-02-27 00:58:22', 0, 0),
(60, 'CoD_XsRd31297068hgYtDg210293686', 1, 'Parest Matthews', '2323423', 'Zambales', 'Olongapo City', 'Barretto', '0dfde5r4 ', 'Philippines', '2200', '270.00', '0.00', '420.00', '9 items from Larypa', '{}', 'COD', '2019-02-27 00:58:25', 0, 0),
(61, 'CoD_XsRd32338132hgYtDg703536208', 1, 'Parest Matthews', '2323423', 'Zambales', 'Olongapo City', 'Barretto', '0dfde5r4 ', 'Philippines', '2200', '270.00', '0.00', '420.00', '9 items from Larypa', '{}', 'COD', '2019-02-27 00:59:15', 0, 0),
(63, 'CoD_XsRd27969304hgYtDg413140106', 1, 'Parest Matthews', '56765756', 'Zambales', 'Olongapo City', 'Barretto', '0dfde5r4 ', 'Philippines', '2200', '385.00', '0.00', '535.00', '5 items from Larypa', '{}', 'COD', '2019-02-27 01:01:01', 0, 0),
(64, 'CoD_XsRd35366914hgYtDg773971623', 1, 'Parest Matthews', '453534', 'Zambales', 'Olongapo City', 'Banicain', '0dfde5r4 ', 'Philippines', '2200', '270.00', '0.00', '420.00', '6 items from Larypa', '[{\"id\":\"22\",\"quantity\":\"6\",\"old price\":\"45.00\",\"new price\":\"60.00\"}]', 'COD', '2019-02-27 01:01:28', 0, 0),
(65, 'CoD_XsRd85471004hgYtDg910517116', 12, 'Ryan Wills', '2147483647', 'Zambales', 'Olongapo City', 'Mabayuan', '114 Otero Avenue', 'Philippines', '2200', '230.00', '0.00', '370.00', '6 items from Larypa', '[{\"id\":\"82\",\"quantity\":2,\"old price\":\"25.00\",\"new price\":\"35.00\"},{\"id\":\"22\",\"quantity\":4,\"old price\":\"45.00\",\"new price\":\"60.00\"}]', 'COD', '2019-02-27 01:10:37', 0, 0),
(66, 'CoD_XsRd76724146hgYtDg144076341', 15, 'Emmanuel Tampos', '2147483647', 'Zambales', 'Olongapo City', 'Old Cabalan', 'Purok 7 Highway', 'Philippines', '2200', '250.00', '0.00', '410.00', '10 items from Larypa', '[{\"id\":\"36\",\"quantity\":10,\"old price\":\"25.00\",\"new price\":\"35.00\"}]', 'COD', '2019-02-27 03:35:58', 0, 0),
(67, 'CoD_XsRd65572498hgYtDg911977352', 20, 'Jonna Valdez', '2147483647', 'Zambales', 'Olongapo City', 'Santa Rita', '8888, jasmin', 'Philippines', '2200', '585.00', '0.00', '840.00', '13 items from Larypa', '[{\"id\":\"22\",\"quantity\":13,\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 03:48:19', 0, 0),
(68, 'CoD_XsRd68619915hgYtDg178777587', 22, 'Sad Ako', '2147483647', 'Zambales', 'Olongapo City', 'Pag-asa', '29-12th st pag asa oc', 'Philippines', '2200', '6860.00', '0.00', '8390.00', '49 items from Larypa', '[{\"id\":\"60\",\"quantity\":\"49\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 03:49:14', 0, 0),
(69, 'CoD_XsRd10145013hgYtDg248172083', 22, 'Sad Ako', '2147483647', 'Zambales', 'Olongapo City', 'Pag-asa', '29-12th st pag asa oc', 'Philippines', '2200', '16230.00', '0.00', '18200.00', '91 items from Larypa', '[{\"id\":\"70\",\"quantity\":\"50\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"42\",\"quantity\":\"41\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 03:50:20', 0, 0),
(70, 'CoD_XsRd18514944hgYtDg451991335', 24, 'loressa lai mejos', '2147483647', 'Zambales', 'Olongapo City', 'Asinan', 'asinan court', 'Philippines', '2200', '780.00', '0.00', '1230.00', '78 items from Larypa', '[{\"id\":\"57\",\"quantity\":\"78\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 03:53:03', 0, 0),
(71, 'CoD_XsRd87332599hgYtDg610581868', 26, 'qwerty qwerty', '123123123', 'Zambales', 'Olongapo City', 'West Bajac-bajac', '12312321', 'Philippines', '2200', '1215.00', '0.00', '1680.00', '27 items from Larypa', '[{\"id\":\"22\",\"quantity\":\"27\",\"old price\":\"45.00\",\"new price\":\"60.00\"}]', 'COD', '2019-02-27 03:55:29', 0, 0),
(72, 'CoD_XsRd26717577hgYtDg724823729', 27, 'Cire Maniego', '2147483647', 'Zambales', 'Olongapo City', 'Mabayuan', '#8 labrador st.', 'Philippines', '2200', '4000.00', '0.00', '5060.00', '50 items from Larypa', '[{\"id\":\"77\",\"quantity\":\"50\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 03:57:05', 0, 0),
(73, 'CoD_XsRd15986584hgYtDg79176568', 26, 'qwerty qwerty', '123123123', 'Zambales', 'Olongapo City', 'West Bajac-bajac', '12312321', 'Philippines', '2200', '2500.00', '0.00', '3310.00', '50 items from Larypa', '[{\"id\":\"40\",\"quantity\":\"50\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 03:58:34', 0, 0),
(74, 'CoD_XsRd50129862hgYtDg413547727', 24, 'loressa lai mejos', '2147483647', 'Zambales', 'Olongapo City', 'Asinan', 'asinan court', 'Philippines', '2200', '19500.00', '0.00', '22060.00', '100 items from Larypa', '[{\"id\":\"70\",\"quantity\":\"50\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"18\",\"quantity\":\"50\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 03:58:41', 0, 0),
(75, 'CoD_XsRd40660881hgYtDg446797372', 31, 'Kevin Roi Crisolo', '2147483647', 'Zambales', 'Olongapo City', 'East Bajac-bajac', 'Harris 18th St East BajacBajac', 'Philippines', '2200', '300.00', '0.00', '390.00', '1 item from Larypa', '[{\"id\":\"70\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 04:03:13', 0, 0),
(76, 'CoD_XsRd20540357hgYtDg668537680', 32, 'Pau Antonio', '2147483647', 'Zambales', 'Olongapo City', 'Mabayuan', '5K Alagaw St. Mabayuan Olongapo City', 'Philippines', '2200', '1500.00', '0.00', '1710.00', '5 items from Larypa', '[{\"id\":\"70\",\"quantity\":\"5\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 04:07:07', 0, 0),
(77, 'CoD_XsRd21973903hgYtDg417067197', 40, 'Janzen Valdez', '2147483647', 'Zambales', 'Olongapo City', 'Santa Rita', '8888, jasmin', 'Philippines', '2200', '7500.00', '0.00', '9060.00', '50 items from Larypa', '[{\"id\":\"66\",\"quantity\":\"50\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 04:22:54', 0, 0),
(78, 'CoD_XsRd26469043hgYtDg227253046', 41, 'Jc Carlos', '2147483647', 'Zambales', 'Olongapo City', 'Old Cabalan', 'Sa likod nila aling vicky', 'Philippines', '2200', '2000.00', '0.00', '2810.00', '50 items from Larypa', '[{\"id\":\"19\",\"quantity\":\"50\",\"old price\":\"40.00\",\"new price\":\"55.00\"}]', 'COD', '2019-02-27 04:26:04', 0, 0),
(79, 'CoD_XsRd91941685hgYtDg500730903', 42, 'Hiro De Asis', '2147483647', 'Zambales', 'Olongapo City', 'Santa Rita', '#334 Santa Rita Olongapo City', 'Philippines', '2200', '255.00', '0.00', '360.00', '3 items from Larypa', '[{\"id\":\"56\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"46\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"36\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 04:32:09', 0, 0),
(80, 'CoD_XsRd87213965hgYtDg327795615', 43, 'Quincy Monta', '2147483647', 'Zambales', 'Olongapo City', 'East Tapinac', 'Olongapo city', 'Philippines', '2200', '8500.00', '0.00', '9560.00', '40 items from Larypa', '[{\"id\":\"54\",\"quantity\":\"20\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"70\",\"quantity\":\"10\",\"old price\":\"300.00\",\"new price\":\"330.00\"},{\"id\":\"69\",\"quantity\":\"10\",\"old price\":\"350.00\",\"new price\":\"380.00\"}]', 'COD', '2019-02-27 04:37:11', 0, 0),
(81, 'CoD_XsRd92719847hgYtDg776045549', 44, 'Ann Jena Capco', '2147483647', 'Zambales', 'Olongapo City', 'New Ilalim', '#81-C Esteban Street New Ilalim', 'Philippines', '2200', '425.00', '0.00', '540.00', '3 items from Larypa', '[{\"id\":\"69\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"33\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"26\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 04:41:26', 0, 0),
(82, 'CoD_XsRd44890186hgYtDg728009524', 45, 'Eldon Masocol', '2147483647', 'Zambales', 'Olongapo City', 'New Kababae', 'Gapo', 'Philippines', '2200', '264.00', '0.00', '360.00', '3 items from Larypa', '[{\"id\":\"45\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"53\",\"quantity\":2,\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 04:45:01', 0, 0),
(83, 'CoD_XsRd78391998hgYtDg917700376', 12, 'Ryan Wills', '2147483647', 'Zambales', 'Olongapo City', 'Mabayuan', '114 Otero Avenue', 'Philippines', '2200', '275.00', '0.00', '375.00', '2 items from Larypa', '[{\"id\":\"45\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"73\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-27 19:03:42', 0, 0),
(84, 'CoD_XsRd86574871hgYtDg152750237', 47, 'Mika Montelibano', '2147483647', 'Zambales', 'Olongapo City', 'Old Cabalan', 'Villa Miranda', 'Philippines', '2200', '225.00', '0.00', '360.00', '5 items from Larypa', '[{\"id\":\"22\",\"quantity\":5,\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-02-28 03:26:57', 0, 0),
(85, 'CoD_XsRd29692284hgYtDg537625981', 48, 'kevinruss Viray', '2147483647', 'Zambales', 'Olongapo City', 'Gordon Heights', 'Canda', 'Philippines', '2200', '240.00', '0.00', '380.00', '7 items from Larypa', '[{\"id\":\"42\",\"quantity\":\"5\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"22\",\"quantity\":\"2\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-03-04 02:24:37', 0, 0),
(86, 'CoD_XsRd22454414hgYtDg990713611', 11, 'Lance Espineli', '2147483647', 'Zambales', 'Olongapo City', 'Sta Rita', '#889 Jasmine Street', 'Philippines', '2200', '360.00', '420.00', '480.00', '3 items from Palengk-E', '[{\"id\":\"37\",\"quantity\":3,\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-03-04 16:32:25', 0, 0),
(87, 'CoD_XsRd47511395hgYtDg335336570', 1, 'Parest Matthews', '2147483647', 'Zambales', 'Olongapo City', 'Gordon Heights', '4 Alba st.', 'Philippines', '2200', '256.00', '336.00', '396.00', '8 items from Palengk-E', '[{\"id\":\"83\",\"quantity\":8,\"old price\":\"32.00\",\"new price\":\"42.00\"}]', 'COD', '2019-03-04 21:34:30', 0, 0),
(88, 'CoD_XsRd869934hgYtDg858270471', 50, 'loressa lai mejos', '2147483647', 'Zambales', 'Olongapo City', 'Gordon Heights', 'Basta don', 'Philippines', '2200', '29650.00', '34680.00', '34740.00', '184 items from Palengk-E', '[{\"id\":\"59\",\"quantity\":\"40\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"45\",\"quantity\":\"45\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"66\",\"quantity\":\"50\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"54\",\"quantity\":\"49\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-03-05 00:49:37', 0, 0),
(89, 'CoD_XsRd23481477hgYtDg962396808', 50, 'loressa lai mejos', '2147483647', 'Zambales', 'Olongapo City', 'Gordon Heights', 'Basta don', 'Philippines', '2200', '29650.00', '34680.00', '34740.00', '184 items from Palengk-E', '{}', 'COD', '2019-03-05 00:49:52', 0, 0),
(90, 'CoD_XsRd37621601hgYtDg197549946', 50, 'loressa lai mejos', '2147483647', 'Zambales', 'Olongapo City', 'Gordon Heights', 'Basta don', 'Philippines', '2200', '29650.00', '34680.00', '34740.00', '184 items from Palengk-E', '{}', 'COD', '2019-03-05 00:49:57', 0, 0),
(91, 'CoD_XsRd64346776hgYtDg387044625', 49, 'Fatima Joy Llave', '2147483647', 'Zambales', 'Olongapo City', 'Old Cabalan', 'Lot 16 Block 5 Villa Miranda', 'Philippines', '2200', '2415.00', '3055.00', '3115.00', '44 items from Palengk-E', '[{\"id\":\"76\",\"quantity\":\"3\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"60\",\"quantity\":\"10\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"53\",\"quantity\":10,\"old price\":\"\",\"new price\":\"\"},{\"id\":\"73\",\"quantity\":\"10\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"22\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"40\",\"quantity\":\"10\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-03-05 00:50:18', 0, 0),
(92, 'CoD_XsRd91591266hgYtDg306057248', 20, 'Jonna Valdez', '2147483647', 'Zambales', 'Olongapo City', 'Santa Rita', '8888, jasmin', 'Philippines', '2200', '249.00', '335.00', '395.00', '16 items from Palengk-E', '[{\"id\":\"22\",\"quantity\":\"2\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"17\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"33\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"53\",\"quantity\":\"12\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-03-05 00:50:32', 0, 0),
(93, 'CoD_XsRd50868561hgYtDg378255037', 52, 'Koko Beltran', '2147483647', 'Zambales', 'Olongapo City', 'Barretto', '#367 Mangan Vaca, Subic, Zambales', 'Philippines', '2200', '1450.00', '1680.00', '1740.00', '13 items from Palengk-E', '[{\"id\":\"70\",\"quantity\":\"2\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"61\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"45\",\"quantity\":\"2\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"73\",\"quantity\":\"2\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"39\",\"quantity\":\"2\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"38\",\"quantity\":\"3\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"17\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-03-05 00:54:32', 0, 0),
(94, 'CoD_XsRd36879341hgYtDg626945240', 51, 'Rachelle Adamos', '2147483647', 'Zambales', 'Olongapo City', 'Old Cabalan', 'Lot 16 Block 5 Villa Miranda', 'Philippines', '2200', '910.00', '1170.00', '1230.00', '26 items from Palengk-E', '[{\"id\":\"35\",\"quantity\":26,\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-03-05 00:55:35', 0, 0),
(95, 'CoD_XsRd15541231hgYtDg356054068', 19, 'Renz Chavez', '2147483647', 'Zambales', 'Olongapo City', 'New Cabalan', '#144 Manga St. New cabalan olongapo city', 'Philippines', '2200', '2685.00', '3565.00', '3625.00', '62 items from Palengk-E', '[{\"id\":\"72\",\"quantity\":\"49\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"58\",\"quantity\":13,\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-03-05 00:59:11', 0, 0),
(96, 'CoD_XsRd92603878hgYtDg572063897', 53, 'Aerylle Tajonera', '2147483647', 'Zambales', 'Olongapo City', 'Santa Rita', '1672', 'Philippines', '2200', '5350.00', '6450.00', '6510.00', '65 items from Palengk-E', '[{\"id\":\"78\",\"quantity\":\"50\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"37\",\"quantity\":\"10\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"69\",\"quantity\":\"5\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-03-05 01:02:04', 0, 0),
(97, 'CoD_XsRd37972149hgYtDg348436804', 54, 'Gar Jan Jay Radoc', '2147483647', 'Zambales', 'Olongapo City', 'Gordon Heights', 'hell no!!!', 'Philippines', '2200', '3202.00', '3910.00', '3970.00', '56 items from Palengk-E', '[{\"id\":\"60\",\"quantity\":\"5\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"58\",\"quantity\":\"15\",\"old price\":\"150.00\",\"new price\":\"180.00\"},{\"id\":\"53\",\"quantity\":\"36\",\"old price\":\"7.00\",\"new price\":\"10.00\"}]', 'COD', '2019-03-05 01:04:25', 0, 0),
(98, 'CoD_XsRd33927920hgYtDg572969377', 56, 'Che Carbo', '2147483647', 'Zambales', 'Olongapo City', 'Old Cabalan', 'Forestry old cabalan olongapo city', 'Philippines', '2200', '1922.00', '2193.00', '2253.00', '14 items from Palengk-E', '[{\"id\":\"35\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"61\",\"quantity\":2,\"old price\":\"\",\"new price\":\"\"},{\"id\":\"36\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"},{\"id\":\"69\",\"quantity\":2,\"old price\":\"\",\"new price\":\"\"},{\"id\":\"53\",\"quantity\":2,\"old price\":\"\",\"new price\":\"\"},{\"id\":\"49\",\"quantity\":3,\"old price\":\"\",\"new price\":\"\"},{\"id\":\"73\",\"quantity\":2,\"old price\":\"\",\"new price\":\"\"},{\"id\":\"78\",\"quantity\":\"1\",\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-03-05 01:07:46', 0, 0),
(99, 'CoD_XsRd80240611hgYtDg789434140', 58, 'Ian Olaes', '09778300914', 'Zambales', 'Olongapo City', 'Pag-asa', '#33 burgos st', 'Philippines', '2200', '930.00', '1080.00', '1140.00', '6 items from Palengk-E', '[{\"id\":\"18\",\"quantity\":\"3\",\"old price\":\"90\",\"new price\":\"110.00\"},{\"id\":\"44\",\"quantity\":\"3\",\"old price\":\"220.00\",\"new price\":\"250.00\"}]', 'COD', '2019-03-05 01:24:43', 1, 2),
(100, 'CoD_XsRd81220941hgYtDg956601405', 1, 'Parest Matthews', '09495054235', 'Zambales', 'Olongapo City', 'Old Cabalan', '4 alba st.', 'Philippines', '2200', '250.00', '300.00', '360.00', '5 items from Palengk-E', '[{\"id\":\"17\",\"quantity\":5,\"old price\":\"50.00\",\"new price\":\"60.00\"}]', 'COD', '2019-03-10 22:25:50', 1, 2),
(104, 'CoD_XsRd33007406hgYtDg105857086', 1, 'Parest Matthews', '9497058258', 'Zambales', 'Olongapo City', 'East Tapinac', '4 Alba st.', 'Philippines', '2200', '260.00', '330.00', '390.00', '4 items from Palengk-E', '[{\"id\":\"19\",\"quantity\":2,\"old price\":\"40.00\",\"new price\":\"55.00\"},{\"id\":\"18\",\"quantity\":2,\"old price\":\"\",\"new price\":\"\"}]', 'COD', '2019-03-24 15:03:08', 0, 0),
(105, 'CoD_XsRd70680012hgYtDg292014038', 1, 'Parest Matthews', '9497058258', 'Zambales', 'Olongapo City', 'Old Cabalan', 'haaha', 'Philippines', '2200', '360.00', '420.00', '480.00', '3 items from Palengk-E', '[{\"id\":\"37\",\"quantity\":\"3\",\"old price\":\"120.00\",\"new price\":\"140.00\"}]', 'COD', '2019-03-24 15:10:23', 0, 0),
(106, 'CoD_XsRd19666hgYtDg459985480', 1, 'Parest Matthews', '9497058258', 'Zambales', 'Olongapo City', 'New Kababae', '4 alba st.', 'Philippines', '2200', '525.00', '645.00', '705.00', '6 items from Palengk-E', '[{\"id\":\"36\",\"quantity\":\"3\",\"old price\":\"25.00\",\"new price\":\"35.00\"},{\"id\":\"59\",\"quantity\":\"3\",\"old price\":\"150.00\",\"new price\":\"180.00\"}]', 'COD', '2019-03-24 15:18:29', 0, 0),
(107, 'CoD_XsRd35589241hgYtDg929601761', 1, 'Parest Matthews', '639497058258', 'Zambales', 'Olongapo City', 'East Tapinac', '4 alba st.', 'Philippines', '2200', '300.00', '390.00', '450.00', '6 items from Palengk-E', '[{\"id\":\"40\",\"quantity\":\"6\",\"old price\":\"50.00\",\"new price\":\"65.00\"}]', 'COD', '2019-03-24 15:23:13', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `Full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `User_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `User_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `User_joindate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `User_login` datetime NOT NULL,
  `User_permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `Full_name`, `User_email`, `User_password`, `User_joindate`, `User_login`, `User_permission`, `Deleted`) VALUES
(1, 'Dante Alighieri', 'aqwvelocity98@yahoo.com', '$2y$10$OQ7a14Fs5goWilLH4i2l1.2zSe0VyACh.HlEghDRz.fH9nfiUCxyW', '2019-01-02 02:18:51', '2019-03-25 04:33:51', 'admin,editor', 0),
(4, 'Test Test', 'tested@gmail.com', '$2y$10$ywr3rXhKpSMzo6dulJRFvO9iBuBglXn0CkmBrpHi64fEUbcSVbMju', '2019-01-03 11:16:33', '2019-03-25 04:30:29', 'editor', 0),
(5, 'Test Testing', 'test@gmail.com', '$2y$10$Yv2T2Yu4R3VTUJP8clNp2eJ55.ukDvV6Zf2zYQrSNwHLM.NUsLaEO', '2019-01-04 00:48:08', '0000-00-00 00:00:00', 'editor', 0),
(6, 'Lance Espineli', 'lanceespineli@gmail.com', '$2y$10$DzgrdQ0Ns1yAY9joAZdcRuC3X6F4S2KpFFX10iXs.FBT8cgmBkb6C', '2019-02-25 06:51:32', '2019-03-19 10:44:52', 'admin,editor', 0),
(7, 'Ryan James Wills', 'rjwills1016@gmail.com', '$2y$10$Da3Jqcy3vsdeLWh84JuOQOhktVlkwLP84zJDNDqFZK6OQl.VzvcCK', '2019-02-26 20:34:36', '2019-03-05 15:56:11', 'admin,editor', 0),
(8, 'Ryan Wills', 'ryanjameswills@yahoo.com', '$2y$10$XO08OqF57EfVpJ5iFoyr4eoP4zUDaRQwEpENkD2xUPqugac9Fu.MO', '2019-02-27 01:14:22', '2019-02-27 20:06:08', 'seller', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `producttrans`
--
ALTER TABLE `producttrans`
  ADD PRIMARY KEY (`Trans_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`Transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `User_email` (`User_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `producttrans`
--
ALTER TABLE `producttrans`
  MODIFY `Trans_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `Transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
