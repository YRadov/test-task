-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 25 2015 г., 18:13
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `bookimed`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Холодильники'),
(2, 'Телевизоры'),
(3, 'Мобильные телефоны');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `price`, `name`, `description`) VALUES
(1, 1, '2910.00', 'Indesit NBS-20 AA', 'Полезный объем: 341 л; Полезный объем морозилки: 108 л; К-во компрессоров: \r\n1 шт.; Размеры (ВхШхГ): 200 x 60 x 66 см'),
(2, 1, '2223.00', 'Liebherr T 1404', 'Полезный объем: 122 л; Полезный объем морозилки: 14 л\r\nК-во компрессоров: 1 шт.; Размеры (ВхШхГ): 85 x 50.1 x 62 см; Цвет: белый'),
(3, 1, '3490.00', 'Whirlpool WBE 3114 TS', 'Полезный объем: 307 л; Полезный объем морозилки: 113 л; К-во \r\nкомпрессоров: 1 шт.; Размеры (ВхШхГ): 175 x 59.5 x 64 см; Цвет: нержавеющая сталь'),
(4, 2, '4520.00', 'Samsung UE-40EH5007', 'Дисплей: 40 ", 1920Ч1080; Тюнер: аналоговый, цифровой DVB-T, цифровой\r\nDVB-C, цифровой DVB-T2; Звук: 20 Вт'),
(5, 2, '2355.00', 'Philips 22PFL4008T/12', 'Дисплей: 22 ", 1920Ч1080; Тюнер: аналоговый, цифровой DVB-T, цифровой \r\nDVB-C, цифровой DVB-T2; Звук: 8 Вт'),
(6, 2, '3500.00', 'Sony KDL-24W605A Black', 'Дисплей: 24 ", 1366Ч768; Тюнер: аналоговый, цифровой DVB-T, цифровой\r\nDVB-C, цифровой DVB-T2, цифровой DVB-S, цифровой DVB-S2; Звук: 10 Вт'),
(7, 2, '1959.00', 'Toshiba 22L1333G', 'Дисплей: 22 ", 1920Ч1080; Тюнер: аналоговый, цифровой DVB-T, цифровой \r\nDVB-C; Звук: 5 Вт'),
(8, 3, '541.00', 'Nokia Asha 206 Black', 'Дисплей: 2.4 '', 240x320, TFT; Камера: 1.2 МП; Память: ПЗУ 64 Mб; \r\nАккумулятор: Li-Ion, 1110 мAч; Корпус: пластик'),
(9, 3, '5165.00', 'Samsung I9500 Galaxy S 4 Black', 'Дисплей: 5 '', 1920x1080, Super AMOLED; Процессор: Samsung, \r\nядер 8, 1600 МГц;  Камера: 13 МП, вспышка, автофокус; Память: ПЗУ 16384 Mб, ОЗУ 2048 Мб; Аккумулятор: \r\nLi-Ion, 2600 мAч; Корпус: пластик');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
