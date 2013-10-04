-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 04 2013 г., 15:47
-- Версия сервера: 5.5.16
-- Версия PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `gclick`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pok_kategoriya`
--

CREATE TABLE IF NOT EXISTS `pok_kategoriya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(11) NOT NULL,
  `translit_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci AUTO_INCREMENT=56 ;

-- --------------------------------------------------------

--
-- Структура таблицы `pok_kupon`
--

CREATE TABLE IF NOT EXISTS `pok_kupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `translit_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `promokod` varchar(255) CHARACTER SET utf8 NOT NULL,
  `finish_date` date NOT NULL,
  `date_create` datetime NOT NULL,
  `img_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(400) CHARACTER SET utf8 NOT NULL,
  `categorry_id` int(11) NOT NULL,
  `title_tag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description_tag` varchar(400) CHARACTER SET utf8 NOT NULL,
  `keywords_tag` varchar(400) CHARACTER SET utf8 NOT NULL,
  `show` tinyint(1) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `use_count` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `kupon_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci AUTO_INCREMENT=1137 ;

-- --------------------------------------------------------

--
-- Структура таблицы `pok_kupon_type`
--

CREATE TABLE IF NOT EXISTS `pok_kupon_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `pok_kupon_type`
--

INSERT INTO `pok_kupon_type` (`id`, `name`) VALUES
(1, 'Скидка на заказ'),
(2, 'Бесплатная доставка');

-- --------------------------------------------------------

--
-- Структура таблицы `pok_settings`
--

CREATE TABLE IF NOT EXISTS `pok_settings` (
  `site_name` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `site_description` varchar(400) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `partner_id` int(11) NOT NULL,
  `admin_login` varchar(255) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `main_new_kupons` int(11) NOT NULL,
  `main_popular_kupons` int(11) NOT NULL,
  `img_logo_url` varchar(255) NOT NULL,
  `Google_Analitics_Code` text NOT NULL,
  `Yandex_Metrika_Code` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `pok_settings`
--

INSERT INTO `pok_settings` (`site_name`, `email_admin`, `site_description`, `ID`, `partner_id`, `admin_login`, `admin_user`, `main_new_kupons`, `main_popular_kupons`, `img_logo_url`, `Google_Analitics_Code`, `Yandex_Metrika_Code`) VALUES
('Shoppest: скидки и продажа купонов', '', '', 1, 1764, '', '', 5, 4, 'Wednesday-25th-2013f-September-2013-03-12-36-PM.png', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pok_shop`
--

CREATE TABLE IF NOT EXISTS `pok_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(250) CHARACTER SET utf8 NOT NULL,
  `translit_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title_tag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `keywords_tag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description_tag` varchar(400) CHARACTER SET utf8 NOT NULL,
  `show` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci AUTO_INCREMENT=72 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
