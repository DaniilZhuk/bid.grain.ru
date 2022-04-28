-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 21 2022 г., 09:12
-- Версия сервера: 5.7.24
-- Версия PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sail_oil`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bid`
--

CREATE TABLE `bid` (
  `id` int(11) NOT NULL,
  `basis` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `logistic` varchar(255) NOT NULL,
  `nomenclature` varchar(255) NOT NULL,
  `end_date` datetime NOT NULL,
  `quality` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bid`
--

INSERT INTO `bid` (`id`, `basis`, `volume`, `price`, `logistic`, `nomenclature`, `end_date`, `quality`, `comment`) VALUES
(18, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '1 000', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(20, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '1 000', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(21, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '500', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(22, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '500', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(23, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '100', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-13 14:00:00', '', ''),
(24, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '100', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(25, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '100', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(26, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '100', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(27, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '100', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(28, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '1 000', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(29, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '100', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(30, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '500', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(31, 'ОАО \"МЖК Краснодарский\"  	(г. Краснодар. ул. Тихорецкая 5)', '1 000', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(32, 'ОАО \"МЖК Краснодарский\"  	(г. Краснодар. ул. Тихорецкая 5)', '100', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(33, 'ОАО \"МЖК Краснодарский\"  	(г. Краснодар. ул. Тихорецкая 5)', '500', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(35, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '100', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(36, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '200', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(37, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '200', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(38, 'ОАО \"МЖК Краснодарский\"  	(г. Краснодар. ул. Тихорецкая 5)', '200', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(39, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '300', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(40, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '300', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(41, 'ОАО \"МЖК Краснодарский\"  	(г. Краснодар. ул. Тихорецкая 5)', '300', '100', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-14 14:00:00', '', ''),
(42, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '5 678', '1000', '', 'Масло подсолнечное нерафинированное высший сорт', '2022-04-13 22:23:00', '', 'TEST'),
(49, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '100', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(50, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '100', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(51, 'ОАО \"МЖК Краснодарский\"  	(г. Краснодар. ул. Тихорецкая 5)', '100', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(52, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '200', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(53, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '200', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(54, 'ОАО \"МЖК Краснодарский\"  	(г. Краснодар. ул. Тихорецкая 5)', '200', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(55, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '300', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(56, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '300', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(57, 'ОАО \"МЖК Краснодарский\"  	(г. Краснодар. ул. Тихорецкая 5)', '300', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(58, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '500', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(59, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '500', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(60, 'ОАО \"МЖК Краснодарский\"  	(г. Краснодар. ул. Тихорецкая 5)', '500', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(61, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '1 000', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(62, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '1 000', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(63, 'ОАО \"МЖК Краснодарский\"  	(г. Краснодар. ул. Тихорецкая 5)', '1 000', '90', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-15 14:00:00', '', ''),
(114, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '1 000', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(115, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '500', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(116, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '300', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(117, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '200', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(118, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '100', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(119, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '1 000', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(120, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '500', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(121, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '300', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(122, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '200', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(123, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '100', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(124, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '1 000', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(125, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '500', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(126, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '300', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(127, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '200', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(128, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '100', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-18 14:00:00', '', ''),
(129, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '1 000', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(130, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '500', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(131, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '300', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(132, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '200', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(133, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '100', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(134, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '1 000', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(135, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '500', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(136, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '300', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(137, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '200', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(138, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '100', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(139, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '1 000', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(140, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '500', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(141, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '300', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(142, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '200', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(143, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '100', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-20 14:00:00', '', ''),
(144, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '1 000', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(145, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '500', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(146, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '300', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(147, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '200', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(148, 'ОАО \"МЖК Краснодарский\" (г. Краснодар. ул. Тихорецкая 5)', '100', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(149, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '1 000', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(150, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '500', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(151, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '300', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(152, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '200', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(153, 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)', '100', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(154, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '1 000', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(155, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '500', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(156, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '300', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(157, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '200', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', ''),
(158, 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)', '100', '105', '', 'Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта', '2022-04-21 14:00:00', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `signed` tinyint(1) NOT NULL DEFAULT '0',
  `id_bid` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `date_start` date NOT NULL DEFAULT '1000-01-01',
  `date_end` date NOT NULL DEFAULT '1000-01-01',
  `logistic` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `response`
--

INSERT INTO `response` (`id`, `id_user`, `price`, `signed`, `id_bid`, `company`, `volume`, `date_start`, `date_end`, `logistic`, `comment`) VALUES
(1, 44, '106', 0, 158, 'dfghjhgfd', '100', '2022-04-21', '2022-04-21', 'Доставка за счёт грузоотправителя', ' dfdfgdfg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `fio` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `authKey` varchar(255) NOT NULL,
  `accessToken` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `is_admin`, `fio`, `company_name`, `mail`, `tel`, `username`, `password`, `agent`, `authKey`, `accessToken`) VALUES
(1, 1, 'Жученко Даниил Александрович', '0', 'daniil10i@mail.ru', '0', 'z10', '2#f_3&fH;4)4', 'Производитель', '0', '0'),
(3, 2, 'Координатор 1', '0', 'coordinator1@mail.ru', '0', 'coordinator1', 'coordinator11', 'Производитель', '0', '0'),
(4, 2, 'Координатор 2', '0', 'coordinator2@mail.ru', '0', 'coordinator2', 'coordinator21', 'Производитель', '0', '0'),
(5, 1, 'Техническая поддержка', '0', 'tehpod@mail.ru', '0', 'tehpod1', 'tehpod11', 'Производитель', '0', '0'),
(22, 2, 'Администратор', '0', 'admin@mail.ru', '0', 'admin1', 'admin11', 'Производитель', '0', '0'),
(23, 1, 'Барабанов Дмитрий Николаевич', '0', 'gendir@mail.ru', '0', 'gendir1', 'gendir11', 'Производитель', '0', '0'),
(43, 1, 'Юг Руси', '0', '0@mail.com', '0', 'chief', 'f$d10@dG6L;tq8', 'Производитель', '0', '0'),
(44, 0, 'safsfsdf', 'Вот', 'asfa@nf.ru', '134234', '111', '111', 'Производитель', '0', '0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bid`
--
ALTER TABLE `bid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT для таблицы `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;