-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023 年 07 月 31 日 23:17
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ecommerce`
--

-- --------------------------------------------------------

--
-- 資料表結構 `activity`
--

CREATE TABLE `activity` (
  `aid` varchar(20) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `aname` varchar(50) NOT NULL,
  `discount` int(11) NOT NULL,
  `a_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `cart_id` varchar(20) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `delivery_fee` int(11) DEFAULT NULL,
  `discounted_price` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `collect`
--

CREATE TABLE `collect` (
  `uid` varchar(50) NOT NULL,
  `pid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(20) NOT NULL,
  `cart_id` varchar(20) NOT NULL,
  `o_count` int(11) NOT NULL,
  `o_total` int(11) NOT NULL,
  `delivery` varchar(11) NOT NULL,
  `purchaser` varchar(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(51) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `order_status`
--

CREATE TABLE `order_status` (
  `order_id` varchar(20) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `status_timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `pid` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `species_id` int(11) NOT NULL,
  `pimage` mediumblob DEFAULT NULL,
  `pimage_1` mediumblob DEFAULT NULL,
  `pimage_2` mediumblob DEFAULT NULL,
  `pimage_3` mediumblob DEFAULT NULL,
  `pimage_4` mediumblob DEFAULT NULL,
  `price` int(11) NOT NULL,
  `price_final` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `p_status` tinyint(1) DEFAULT NULL,
  `pcontent` varchar(101) NOT NULL,
  `pcontent_spec` varchar(101) DEFAULT NULL,
  `pcontent_main` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `species`
--

CREATE TABLE `species` (
  `species_id` int(11) NOT NULL,
  `species` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `species`
--

INSERT INTO `species` (`species_id`, `species`) VALUES
(1, '項鍊');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `uid` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone` int(11) NOT NULL,
  `user_status` tinyint(1) DEFAULT NULL,
  `token` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `collect`
--
ALTER TABLE `collect`
  ADD PRIMARY KEY (`uid`,`pid`);

--
-- 資料表索引 `order_status`
--
ALTER TABLE `order_status`
  ADD KEY `fk_order_status_order_id` (`order_id`);

--
-- 資料表索引 `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`species_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `species`
--
ALTER TABLE `species`
  MODIFY `species_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `order_status`
--
ALTER TABLE `order_status`
  ADD CONSTRAINT `fk_order_status_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
