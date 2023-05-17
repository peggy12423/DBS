-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2023-05-10 17:42:48
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
-- 資料庫： `library`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--

CREATE TABLE `book` (
  `bID` int(100) NOT NULL,
  `loan` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `class` varchar(10) NOT NULL,
  `author` varchar(20) NOT NULL,
  `publication_date` date NOT NULL,
  `arrival_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `book`
--

INSERT INTO `book` (`bID`, `loan`, `user`, `name`, `class`, `author`, `publication_date`, `arrival_date`) VALUES
(1, '書在館', '', '在我被吃掉以前', '經驗成長', '長谷川祐次', '2023-04-27', '2023-05-01'),
(2, '書在館', '', '梅奶奶和貓奇奇: 獨', '親情故事', '鄭博真', '2023-04-28', '2023-05-01'),
(3, '書在館', '', '你在這裡: 展開冒險, 擁抱生命', '情緒管理', '札克．曼貝克', '2023-05-01', '2023-05-04'),
(4, '已借出', 'M113040009', '歡迎光臨休南洞書店', '經驗成長', '黃寶凜', '2023-04-27', '2023-05-01'),
(5, '書在館', '', '底牌', '驚悚小說', '阿嘉莎．克莉絲蒂', '2002-03-01', '2020-03-03'),
(6, '書在館', '', '母親的女兒', '驚悚小說', '阿嘉莎．克莉絲蒂', '2012-12-01', '2022-12-21'),
(7, '書在館', '', '撒旦的情歌', '驚悚小說', '阿嘉莎．克莉絲蒂', '2013-01-10', '2022-08-09'),
(8, '已借出', 'penny666', '玫瑰與紫杉', '驚悚小說', '阿嘉莎．克莉絲蒂', '2013-02-01', '2022-02-23'),
(9, '已借出', 'penny666', '練好邏輯的第一堂課', '社會人文', '布蘭登．羅伊爾', '2023-05-04', '2023-05-09'),
(10, '書在館', '', '歷史的巨鏡: 探索現代社會的起源', '社會人文', '金觀濤', '2023-04-20', '2023-05-09'),
(11, '書在館', '', '個案研究: 設計與方法', '社會科學', 'Robert K. Yin', '2023-04-10', '2023-05-09'),
(14, '書在館', '', '我的機智韓劇生活: 55部韓劇心動手札', '生活', '王喵', '2023-05-04', '2023-05-10'),
(16, '已借出', 'yoyo555', '鏈鋸人', '電影書', '藤本タツキ', '2023-05-04', '2023-05-10'),
(17, '書在館', '', '蔡康永的情商課 2: 因為這是你的人生', '人際關係', ' 蔡康永', '2019-10-17', '2023-05-10');

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

CREATE TABLE `manager` (
  `manager` varchar(10) NOT NULL,
  `passwd` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `manager`
--

INSERT INTO `manager` (`manager`, `passwd`, `name`) VALUES
('kelly0321', '880321', 'Kelly'),
('sammi222', '890216', 'Sammi');

-- --------------------------------------------------------

--
-- 資料表結構 `person`
--

CREATE TABLE `person` (
  `user` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `TEL` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `person`
--

INSERT INTO `person` (`user`, `name`, `TEL`, `email`, `passwd`) VALUES
('lily666', 'Lily', '0929665530', 'spare871008@gmail.com', '666'),
('M103040038', '王裕祥', '0912905577', 'peggy12423@gmail.com', 'M103040038'),
('M113040009', 'Peggy', '0929665530', 'peggy12423@gmail.com', '123456'),
('mary222', 'Mary', '7776666', 'spare871008@gmail.com', '321321'),
('penny666', 'Penny', '3846579', 'm113040009@g-mail.nsysu.edu.tw', '987987'),
('weiwei429', 'Wilber', '0976698249', 'wilber1017@gmail.com', '900429'),
('wendy111', 'Wendy', '0938473654', 'spare871008@gmail.com', '111234'),
('yoyo555', 'YOYO', '3812151', 'm113040009@g-mail.nsysu.edu.tw', '654654');

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `rID` int(200) NOT NULL,
  `user` varchar(20) NOT NULL,
  `book` varchar(20) NOT NULL,
  `loan` varchar(15) NOT NULL,
  `borrow_date` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `record`
--

INSERT INTO `record` (`rID`, `user`, `book`, `loan`, `borrow_date`, `due_date`, `return_date`, `email`) VALUES
(1, 'weiwei429', '歡迎光臨休南洞書店', '已歸還', '2023-04-06', '2023-05-06', '2023-05-09', 'wilber1017@gmail.com'),
(2, 'weiwei429', '玫瑰與紫杉', '已歸還', '2023-04-06', '2023-05-06', '2023-04-28', 'wilber1017@gmail.com'),
(3, 'weiwei429', '在我被吃掉以前', '已歸還', '2023-02-01', '2023-03-01', '2023-05-09', 'wilber1017@gmail.com'),
(4, 'M113040009', '在我被吃掉以前', '已歸還', '2023-05-01', '2023-06-01', '2023-05-09', 'peggy12423@gmail.com'),
(6, 'M103040038', '在我被吃掉以前', '已歸還', '2023-05-09', '2023-06-08', '2023-05-09', ''),
(8, 'M113040009', '底牌', '已歸還', '2023-05-09', '2023-06-08', '2023-05-10', 'peggy12423@gmail.com'),
(9, 'M113040009', '母親的女兒', '已歸還', '2023-05-09', '2023-06-08', '2023-05-09', 'peggy12423@gmail.com'),
(10, 'M113040009', '在我被吃掉以前', '已歸還', '2023-05-09', '2023-06-08', '2023-05-09', 'peggy12423@gmail.com'),
(11, 'weiwei429', '母親的女兒', '已歸還', '2023-05-09', '2023-06-08', '2023-05-10', 'wilber1017@gmail.com'),
(12, 'M113040009', '鏈鋸人', '已歸還', '2023-05-10', '2023-06-09', '2023-05-10', 'peggy12423@gmail.com'),
(13, 'penny666', '玫瑰與紫杉', '已借出', '2023-05-10', '2023-06-09', '0000-00-00', 'm113040009@g-mail.nsysu.edu.tw'),
(15, 'penny666', '練好邏輯的第一堂課', '已借出', '2023-05-10', '2023-06-09', '0000-00-00', 'm113040009@g-mail.nsysu.edu.tw'),
(16, 'M113040009', '歡迎光臨休南洞書店', '已借出', '2023-05-10', '2023-05-14', '0000-00-00', 'peggy12423@gmail.com'),
(17, 'M113040009', '底牌', '已歸還', '2023-05-10', '2023-06-09', '2023-05-10', 'peggy12423@gmail.com'),
(18, 'yoyo555', '在我被吃掉以前', '已歸還', '2023-05-10', '2023-06-09', '2023-05-10', 'm113040009@g-mail.nsysu.edu.tw'),
(19, 'yoyo555', '鏈鋸人', '已借出', '2023-05-10', '2023-06-09', '0000-00-00', 'm113040009@g-mail.nsysu.edu.tw');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bID`);

--
-- 資料表索引 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager`);

--
-- 資料表索引 `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`user`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`rID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
