-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `1081se`
--
CREATE DATABASE IF NOT EXISTS `1081se` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `1081se`;

-- --------------------------------------------------------

--
-- 資料表結構 `orderitem`
--

DROP TABLE IF EXISTS `orderitem`;
CREATE TABLE `orderitem` (
  `serno` int(11) NOT NULL,
  `ordID` int(11) NOT NULL,
  `prdID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `orderitem`
--

INSERT INTO `orderitem` (`serno`, `ordID`, `prdID`, `quantity`) VALUES
(3, 4, 1, 1),
(4, 4, 2, 1),
(5, 5, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `prdID` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `detail` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`prdID`, `name`, `price`, `detail`) VALUES
(1, 'iPhone 15', 90000, 'This is a fake phone. Don\'t bu'),
(2, 'Water', 90, 'Pure water from Puli'),
(3, 'Air', 0, 'PM 2.5 air for free');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`ID`, `password`, `name`, `role`) VALUES
('admin', '123', '管理員', 9),
('user', '123', '客戶', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `userorder`
--

DROP TABLE IF EXISTS `userorder`;
CREATE TABLE `userorder` (
  `ordID` int(11) NOT NULL,
  `uID` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `orderDate` date NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `userorder`
--

INSERT INTO `userorder` (`ordID`, `uID`, `orderDate`, `address`, `status`) VALUES
(4, 'admin', '0000-00-00', '', 1),
(5, 'admin', '0000-00-00', '', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`serno`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prdID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `userorder`
--
ALTER TABLE `userorder`
  ADD PRIMARY KEY (`ordID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `serno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `prdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `userorder`
--
ALTER TABLE `userorder`
  MODIFY `ordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
