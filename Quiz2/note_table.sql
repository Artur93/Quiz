-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 29 2014 г., 15:55
-- Версия сервера: 5.6.11
-- Версия PHP: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `notes`
--

-- --------------------------------------------------------

--
-- Структура таблицы `note_table`
--

CREATE TABLE IF NOT EXISTS `note_table` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `note` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `note_table`
--

INSERT INTO `note_table` (`id`, `note`, `date`) VALUES
(4, 'assds', '2014-06-28'),
(5, 'dfjdnf', '2014-06-28'),
(6, 'kcdkf', '2014-06-29'),
(7, 'vmdfkm', '2014-06-29'),
(8, 'njncmnv', '2014-06-29'),
(9, 'fdfndjf', '2014-06-29'),
(10, 'mcjhbdcn,', '2014-06-29'),
(12, 'ghrfgkmdfnm', '2014-06-29'),
(13, 'oeiufuij', '2014-06-29'),
(14, 'vncbnvbckkooejhfu', '2014-06-29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
