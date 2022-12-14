-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-08-29 06:26:28
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `u22`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `chat_message`
--

CREATE TABLE `chat_message` (
  `id` int(11) NOT NULL,
  `chat_room_id` int(11) NOT NULL,
  `send_type` int(11) NOT NULL COMMENT '0: shopMessage\r\n1: generalMessage\r\n2: shopImagePath\r\n3: generalImagePath',
  `message` text NOT NULL,
  `send_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `chat_room`
--

CREATE TABLE `chat_room` (
  `id` int(11) NOT NULL,
  `user_general_id` int(11) NOT NULL,
  `user_shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `lost_item`
--

CREATE TABLE `lost_item` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `acquisition_date` int(11) NOT NULL,
  `pickup_date` int(11) DEFAULT NULL,
  `pickup_user_id` int(11) DEFAULT NULL,
  `police_station_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_general`
--

CREATE TABLE `user_general` (
  `id` int(11) NOT NULL,
  `phone_number` text NOT NULL,
  `mail_address` text NOT NULL,
  `password` text NOT NULL,
  `login_token` text NOT NULL,
  `expiration_date` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `icon_name` text NOT NULL,
  `real_name` text NOT NULL,
  `display_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_shop`
--

CREATE TABLE `user_shop` (
  `id` int(11) NOT NULL,
  `phone_number` text NOT NULL,
  `mail_address` text NOT NULL,
  `password` text NOT NULL,
  `login_token` text NOT NULL COMMENT '自動ログインに使用するトークン情報',
  `expiration_date` int(11) NOT NULL COMMENT '自動ログイン有効期限（timestamp)\r\n',
  `status` int(11) NOT NULL COMMENT '0: 利用可能状態\r\n1: 削除状態',
  `icon_name` text NOT NULL,
  `shop_name` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `lost_item`
--
ALTER TABLE `lost_item`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user_shop`
--
ALTER TABLE `user_shop`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `lost_item`
--
ALTER TABLE `lost_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `user_shop`
--
ALTER TABLE `user_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
