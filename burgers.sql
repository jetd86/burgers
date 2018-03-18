-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 18 2018 г., 00:56
-- Версия сервера: 5.6.38
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `burgers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `burgerName` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `house` tinyint(4) DEFAULT NULL,
  `korpus` tinyint(4) DEFAULT NULL,
  `flat` tinyint(4) DEFAULT NULL,
  `stock` tinyint(4) DEFAULT NULL,
  `comments` text,
  `shortChangeNeed` varchar(2) DEFAULT NULL,
  `cardPay` varchar(2) DEFAULT NULL,
  `operatorCall` varchar(2) DEFAULT NULL,
  `orderTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `userID`, `burgerName`, `street`, `house`, `korpus`, `flat`, `stock`, `comments`, `shortChangeNeed`, `cardPay`, `operatorCall`, `orderTime`) VALUES
(594, 58, 'Dark Beef Burger 500р 1шт', '', 9, 4, 13, 2, 'Хочу бургер от Тимати', 'on', 'on', 'on', '2018-03-17 19:57:50'),
(595, 58, 'Dark Beef Burger 500р 1шт', '', 9, 4, 13, 2, 'Хочу бургер от Тимати', 'on', 'on', 'on', '2018-03-17 19:59:06'),
(596, 58, 'Dark Beef Burger 500р 1шт', '', 9, 4, 13, 2, 'Хочу бургер от Тимати', 'on', 'on', 'on', '2018-03-17 19:59:08'),
(597, 58, 'Dark Beef Burger 500р 1шт', '', 9, 4, 13, 2, 'Хочу бургер от Тимати', 'on', 'on', 'on', '2018-03-17 19:59:31'),
(598, 58, 'Dark Beef Burger 500р 1шт', '', 9, 4, 13, 2, 'Хочу бургер от Тимати', 'on', 'on', 'on', '2018-03-17 20:00:29'),
(599, 58, 'Dark Beef Burger 500р 1шт', '', 9, 4, 13, 2, 'Хочу бургер от Тимати', 'on', 'on', 'on', '2018-03-17 20:00:32'),
(600, 59, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', '', '', '2018-03-17 20:01:20'),
(601, 59, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', '', '', '2018-03-17 20:01:25'),
(602, 59, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', '', '', '2018-03-17 20:01:28'),
(603, 59, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', '', '', '2018-03-17 20:01:29'),
(604, 60, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', 'on', 'on', '2018-03-17 20:02:07'),
(605, 60, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', 'on', 'on', '2018-03-17 20:02:09'),
(606, 60, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', 'on', 'on', '2018-03-17 20:02:10'),
(607, 60, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', 'on', 'on', '2018-03-17 20:02:11'),
(608, 60, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', 'on', 'on', '2018-03-17 20:02:12'),
(609, 60, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', 'on', 'on', '2018-03-17 20:33:43'),
(610, 60, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', 'on', 'on', '2018-03-17 20:34:00'),
(611, 58, 'Dark Beef Burger 500р 1шт', '', 3, 3, 3, 3, 'fasdf', 'on', '', '', '2018-03-17 20:41:11'),
(612, 60, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', 'on', 'on', '2018-03-17 20:48:12'),
(613, 60, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', 'on', 'on', '2018-03-17 20:48:20'),
(614, 60, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', 'on', 'on', '2018-03-17 20:51:29'),
(615, 60, 'Dark Beef Burger 500р 1шт', '', 4, 4, 4, 4, '', '', 'on', 'on', '2018-03-17 20:53:55'),
(616, 61, 'Dark Beef Burger 500р 1шт', '', 37, 4, 55, 5, 'Хочу бургер, пришлите быстрее', 'on', 'on', 'on', '2018-03-17 20:55:23'),
(617, 61, 'Dark Beef Burger 500р 1шт', 'Маслиева', 24, 2, 56, 6, '', 'on', 'on', 'on', '2018-03-17 20:57:15'),
(618, 61, 'Dark Beef Burger 500р 1шт', 'Маслиева', 24, 2, 56, 6, '', 'on', 'on', 'on', '2018-03-17 20:57:17'),
(619, 61, 'Dark Beef Burger 500р 1шт', 'Маслиева', 24, 2, 56, 6, '', 'on', 'on', 'on', '2018-03-17 21:19:27');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `allOrdersUser` varchar(255) DEFAULT NULL,
  `regTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `allOrdersUser`, `regTime`) VALUES
(58, 'Денис', 'jetdan86@ya.ru', '+7 (234) 523 45 23', '32', '2018-03-17 16:44:13'),
(59, 'oleg', 'oleg@ya.ru', '+7 (234) 523 45 23', '4', '2018-03-17 16:45:20'),
(60, 'Taniya', 'taniy@ya.ru', '+7 (234) 523 45 32', '11', '2018-03-17 16:46:54'),
(61, 'Максим', 'makss@ya.ru', '+7 (245) 234 53 24', '4', '2018-03-17 20:54:56');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=620;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
