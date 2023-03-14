-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 14 2023 г., 16:49
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `crm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `name`, `last_name`, `phone`, `email`, `comment`) VALUES
(1, 'hakeemfantasy85@gmail.com', 'Халимон', '+375 33 6865171', 'peone_rd.90@inbox.ru', NULL),
(2, 'hakeemfantasy85@gmail.com', 'Халимон', '+375 33 6865171', 'peone_rd.90@inbox.ru', NULL),
(3, 'hakeemfantasy85@gmail.com', 'Халимон', '+375 33 6865171', 'peone_rd.90@inbox.ru', NULL),
(4, 'hakeemfantasy85@gmail.com', 'Халимон', '+375 33 6865171', 'peone_rd.90@inbox.ru', NULL),
(5, 'hakeemfantasy85@gmail.com', 'Халимон', '+375 33 6865171', 'peone_rd.90@inbox.ru', NULL),
(6, 'fsd', 'Халимон', '+375 33 6865171', 'peone_rd.90@inbox.ru', NULL),
(7, 'fds', 'Antonion', '+375 33 6865171', 'peone_rd.90@inbox.ru', NULL),
(8, 'fds', 'Antonion', '+375 33 6865171', 'peone_rd.90@inbox.ru', NULL),
(9, 'fsd', 'sdf', '+375 33 686 51 71', 'sdf@fsd.com', NULL),
(10, 'fsd', 'sdf', '+375 33 686 51 71', 'sdf@fsd.com', NULL),
(11, 'f', 'Халимон', '+375 33 6865171', 'peone_rd.90@inbox.ru', NULL),
(12, 'Ma', 'Халимон', '+375 33 6865171', 'dsad@fsd', NULL),
(13, 'Манг', 'Халимон', '+375 33 6865171', 'peone_rd.90@inbox.ru', NULL),
(14, 'аывавыаыв', 'Халимон', '+375 33 6865171', 'peone_rd.90@inbox.ru', NULL),
(15, 'Менеджер', 'sdf', '4334', 'peone_rd.90@inbox.ru', NULL),
(16, 'hakeemfantasy', 'sdf', '+37533685171', 'hulk-xp@mail.ru', NULL),
(17, 'dsafsd', 'sdf', '+375 33 6865171', 'hulk145@gmail.com', NULL),
(18, 'hakeemfantas', 'Antonion', '+375 33 686 51 71', 'hulk145@gmail.com', NULL),
(19, 'sdf', 'sdf', '+375336865171', 'sdf@fsd.com', NULL),
(20, 'fsdf', 'sdfs', '+375(25)544-33-33', 'peone_rd.90@inbox.ru', NULL),
(21, 'fsdf', 'sdfs', '+375336865171', 'peone_rd.90@inbox.ru', NULL),
(22, 'fdsffsdf', 'sdfsdf', '+375336865171', 'peone_rd.90@inbox.ru', NULL),
(23, 'Сергей', 'Халимон', '+375336865171', 'peone_rd.90@inbox.ru', NULL),
(24, 'Fdsf', 'f', '+375336865171', 'hulk-xp@mail.ru<', NULL),
(25, 'Менеджер', 'Antonion', '+375336865171', 'postmaster@turbok.b', '2|3|fsdf|rwerwe'),
(26, 'fsdf', 'Халимон', '+375336865171', 'fsd@fsdfds.com', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `login_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manager`
--

INSERT INTO `manager` (`id`, `username`, `password`, `auth_token`, `login_date`) VALUES
(1, 'man1', '$2y$10$bLdE6KEh0xztDiISKf4N7OTjjYgBtFhD7muxU3yAcI7GHfIoop.7G', '73974e75060f011c51c5a6d8e396d57a940d0063e61d06e4c125ca62393253e6017e0df359f657ba', '2023-03-14 15:25:08'),
(2, 'man2', '$2y$10$bLdE6KEh0xztDiISKf4N7OTjjYgBtFhD7muxU3yAcI7GHfIoop.7G', 'c1e5cf3ff1aa77791ed397e19fcfa675c8bde57c44abefe8e6762308f2cb16d1ea7c46ea7a85b252', '2023-03-14 15:57:54');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
