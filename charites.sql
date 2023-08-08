-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-08-01 09:34:34
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
-- 資料庫： `charites`
--

DELIMITER $$
--
-- 程序
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `emailregister` (`myemail` VARCHAR(70))   BEGIN
    DECLARE email_count INT;
    -- 查詢符合結果的數量
    SELECT COUNT(*) INTO email_count FROM UserInfo WHERE email=myemail;
    
    -- 判断 email_count 的值
    IF email_count > 0 THEN
        SELECT 'email已存在' AS result;
    ELSE
        -- 在这里执行插入或其他操作，表示 email 不存在的情况
        SELECT '成功註冊' AS result;
    END IF;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `l1` (IN `myuid` VARCHAR(50), IN `mypwd` VARCHAR(50))   BEGIN
    DECLARE n INT DEFAULT 0;
    DECLARE mytoken VARCHAR(40) DEFAULT uuid();

    SELECT COUNT(*) INTO n FROM userinfo WHERE uid = myuid AND pwd = mypwd;

    IF n = 1 THEN
        UPDATE userinfo SET token = mytoken WHERE uid = myuid;
        SELECT 'welcome.php' AS result, mytoken AS token;
        INSERT INTO log (body) VALUES ('使用者',myuid,'登入成功'); -- 在儲存過程中新增登入成功記錄
    ELSE
        SELECT 'error.html' AS result, NULL AS token;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (`myuid` VARCHAR(20), `mypwd` VARCHAR(20))   BEGIN
 DECLARE n int DEFAULT 0;
        DECLARE mytoken varchar(40) DEFAULT uuid();
    SELECT COUNT(*)INTO n FROM userinfo WHERE uid=myuid and pwd = mypwd;
    IF n=1 THEN
        update userinfo set token=mytoken where uid =myuid;
     SELECT 'welcome.php' as result,mytoken as token;
    else 
     SELECT 'error.html' as result,null as token;
      
    END IF ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logout` (`mytoken` VARCHAR(40))   BEGIN 
 UPDATE userinfo set token=null WHERE token=mytoken;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `register` (`myuid` VARCHAR(50), `mycname` VARCHAR(50), `mypwd` VARCHAR(50), `myphone` VARCHAR(20), `myemail` VARCHAR(70), `mygender` VARCHAR(20))   BEGIN
   
    IF EXISTS (SELECT phone FROM UserInfo WHERE phone = myphone) THEN
         SELECT '註冊失敗，手機號碼已綁定' AS result;
    ELSE
        -- 新增一筆資料到userinfo
        INSERT into UserInfo (uid,cname, pwd, phone, email, gender) VALUES (myuid,mycname, mypwd, myphone, myemail, mygender);
        -- 在这里执行插入或其他操作，表示 uid 不存在的情况
       	SELECT '成功註冊' AS result;
       
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uidregister` (`myuid` VARCHAR(50))   BEGIN
    DECLARE uid_count INT;
    
    -- 查询符合条件的记录数量
    SELECT COUNT(*) INTO uid_count FROM UserInfo WHERE uid = myuid;
    
    -- 判断 uid_count 的值
    IF uid_count > 0 THEN
        SELECT 'UID存在' AS result;
    ELSE
        -- 在这里执行插入或其他操作，表示 uid 不存在的情况
        SELECT '成功註冊' AS result;
    END IF;
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- 資料表結構 `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `body` varchar(200) NOT NULL,
  `dd` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `log`
--

INSERT INTO `log` (`id`, `body`, `dd`) VALUES
(1, '使用者 A09 登入成功', '2023-07-18 15:14:27'),
(2, '使用者 A09 登出成功', '2023-07-18 15:16:13'),
(3, '使用者 A01 登入成功', '2023-07-31 09:48:08'),
(4, '使用者 A01 登出成功', '2023-07-31 09:49:10'),
(5, '使用者 A01 登入成功', '2023-07-31 09:50:36'),
(6, '使用者 A01 登出成功', '2023-07-31 09:51:33'),
(7, '使用者 A01 登入成功', '2023-07-31 09:51:58'),
(8, '使用者 A01 登出成功', '2023-07-31 10:08:47'),
(9, '使用者 A01 登入成功', '2023-07-31 10:16:13'),
(10, '使用者 A01 登出成功', '2023-07-31 10:17:08'),
(11, '使用者 A01 登入成功', '2023-07-31 10:17:14'),
(12, '使用者 A01 登出成功', '2023-07-31 10:20:42'),
(13, '使用者 A01 登入成功', '2023-07-31 10:21:03'),
(14, '使用者 A01 登出成功', '2023-07-31 10:22:47'),
(15, '使用者 A01 登入成功', '2023-07-31 10:28:35'),
(16, '使用者 A01 登出成功', '2023-07-31 11:21:53'),
(17, '使用者 A01 登入成功', '2023-07-31 11:22:13'),
(18, '使用者 A01 登出成功', '2023-07-31 11:26:37'),
(19, '使用者 A01 登入成功', '2023-07-31 11:27:10'),
(20, '使用者 A01 登出成功', '2023-07-31 11:48:03'),
(21, '使用者 A02 登入成功', '2023-07-31 13:47:25'),
(22, '使用者 A02 登出成功', '2023-07-31 14:27:28'),
(23, '使用者 A02 登入成功', '2023-07-31 14:31:56'),
(24, '使用者 A02 登出成功', '2023-07-31 14:48:37'),
(25, '使用者 Z01 登入成功', '2023-07-31 15:47:33'),
(26, '使用者 Z01 登出成功', '2023-07-31 15:47:54');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `kind` varchar(50) DEFAULT NULL,
  `image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`pid`, `pname`, `description`, `price`, `stock`, `kind`, `image`) VALUES
(1, '梓星手鍊', '棒', 350, 70, '手鍊', NULL),
(2, '角星手鍊', '三個對峙讚', 900, 15, '手鍊', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `userinfo`
--

CREATE TABLE `userinfo` (
  `uid` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `token` varchar(40) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_valid` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `userinfo`
--

INSERT INTO `userinfo` (`uid`, `gender`, `cname`, `pwd`, `email`, `phone`, `address`, `token`, `reset_token`, `reset_token_valid`) VALUES
('A01', 1, '王大明', '1234', 'wangdaming01@example.com', '1111', '台北市中山路一段一號', NULL, NULL, 0),
('A02', 0, 'Amy', '4567', 'amy002@example.com', '2222', '台中市一中街2號', NULL, NULL, 0),
('A03', 0, '小張', 'q1234567', 'qiq-jbhi@gmail.o', '0912345687', NULL, '', NULL, 0),
('A09', 1, '王明', 'z1234567', 'qiq-jbhi@gmail.w', '0988999666', NULL, NULL, NULL, 0),
('Z01', 0, 'David', 'a1234567', 'wyuec77@gmail.com', '0911222345', NULL, NULL, '', 0);

--
-- 觸發器 `userinfo`
--
DELIMITER $$
CREATE TRIGGER `logdel` AFTER DELETE ON `userinfo` FOR EACH ROW BEGIN
	INSERT into log(body) VALUES (concat('已刪除一筆',old.uid,'的資料'));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `logins` AFTER INSERT ON `userinfo` FOR EACH ROW BEGIN
	INSERT into log(body) VALUES (concat('已新增一筆',new.uid,'的資料'));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `logupdate` AFTER UPDATE ON `userinfo` FOR EACH ROW BEGIN
    IF NEW.token IS NOT NULL AND OLD.token IS NULL THEN
        INSERT INTO log (body) VALUES (CONCAT('使用者 ', NEW.uid, ' 登入成功'));
        -- 在這裡執行登入成功後的操作
    END IF;

    IF NEW.token IS NULL AND OLD.token IS NOT NULL THEN
        INSERT INTO log (body) VALUES (CONCAT('使用者 ', NEW.uid, ' 登出成功'));
        -- 在這裡執行登出成功後的操作
    END IF;

    IF NEW.pwd <> OLD.pwd THEN
        INSERT INTO log (body) VALUES (CONCAT('使用者 ', NEW.uid, ' 更新了密碼'));
        -- 在這裡執行密碼變更後的操作
    END IF;

    
END
$$
DELIMITER ;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- 資料表索引 `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`uid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
