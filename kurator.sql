-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 20 2016 г., 20:31
-- Версия сервера: 5.5.47-0+deb8u1
-- Версия PHP: 5.6.19-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `kurator`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adress`
--

CREATE TABLE IF NOT EXISTS `adress` (
`id` int(11) NOT NULL,
  `street` varchar(40) NOT NULL,
  `house` varchar(10) NOT NULL,
  `room` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
`id` int(11) NOT NULL,
  `iban` varchar(40) NOT NULL,
  `bankname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `group`
--

CREATE TABLE IF NOT EXISTS `group` (
`id` int(11) NOT NULL,
  `abbreviation` varchar(7) NOT NULL,
  `groupname` varchar(20) NOT NULL,
  `begin_year` int(11) NOT NULL,
  `end_year` int(11) NOT NULL,
  `begin_month` int(11) NOT NULL,
  `end_month` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `group`
--

INSERT INTO `group` (`id`, `abbreviation`, `groupname`, `begin_year`, `end_year`, `begin_month`, `end_month`) VALUES
(1, '', '1PTVR', 2015, 2018, 9, 6),
(2, '', '1KTVR', 2015, 2017, 9, 6),
(3, '', '2PTVR', 2014, 2017, 9, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `kurator`
--

CREATE TABLE IF NOT EXISTS `kurator` (
`id` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kurator`
--

INSERT INTO `kurator` (`id`, `id_teacher`, `id_group`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
`id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
`id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `person`
--

CREATE TABLE IF NOT EXISTS `person` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `code` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `person`
--

INSERT INTO `person` (`id`, `name`, `surname`, `code`) VALUES
(1, 'Juri', 'Melnikov', '37012122234'),
(2, 'Aleksandr', 'Saas', '37905232212'),
(3, 'Sergei', 'Novitskov', '38011031132');

-- --------------------------------------------------------

--
-- Структура таблицы `person_telephones`
--

CREATE TABLE IF NOT EXISTS `person_telephones` (
`id` int(11) NOT NULL,
  `telephone_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`id` int(11) NOT NULL,
  `registry` int(11) NOT NULL,
  `code_id` varchar(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `eban` varchar(20) NOT NULL,
  `person_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`id`, `registry`, `code_id`, `group_id`, `bank_id`, `eban`, `person_id`, `parent_id`, `address_id`) VALUES
(1, 0, '2', 1, 0, 'EE22348390403484849', 2, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `student_parents`
--

CREATE TABLE IF NOT EXISTS `student_parents` (
`id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teacher`
--

INSERT INTO `teacher` (`id`, `person_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `telefon`
--

CREATE TABLE IF NOT EXISTS `telefon` (
`id` int(11) NOT NULL,
  `telephone_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `adress`
--
ALTER TABLE `adress`
 ADD PRIMARY KEY (`id`), ADD KEY `city_id` (`city_id`);

--
-- Индексы таблицы `bank`
--
ALTER TABLE `bank`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`id`), ADD KEY `country_id` (`country_id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `group`
--
ALTER TABLE `group`
 ADD PRIMARY KEY (`id`), ADD KEY `groupname` (`groupname`);

--
-- Индексы таблицы `kurator`
--
ALTER TABLE `kurator`
 ADD PRIMARY KEY (`id`), ADD KEY `id_teacher` (`id_teacher`), ADD KEY `id_group` (`id_group`), ADD KEY `id_teacher_2` (`id_teacher`), ADD KEY `id_group_2` (`id_group`);

--
-- Индексы таблицы `modul`
--
ALTER TABLE `modul`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `parent`
--
ALTER TABLE `parent`
 ADD PRIMARY KEY (`id`), ADD KEY `person_id` (`person_id`,`address_id`);

--
-- Индексы таблицы `person`
--
ALTER TABLE `person`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `person_telephones`
--
ALTER TABLE `person_telephones`
 ADD PRIMARY KEY (`id`), ADD KEY `telephone_id` (`telephone_id`), ADD KEY `person_id` (`person_id`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_code` (`code_id`), ADD KEY `groupname` (`group_id`), ADD KEY `group_id` (`group_id`), ADD KEY `bank_id` (`bank_id`), ADD KEY `code_id` (`code_id`), ADD KEY `group_id_2` (`group_id`), ADD KEY `bank_id_2` (`bank_id`), ADD KEY `person_id` (`person_id`), ADD KEY `parent_id` (`parent_id`), ADD KEY `address_id` (`address_id`);

--
-- Индексы таблицы `student_parents`
--
ALTER TABLE `student_parents`
 ADD PRIMARY KEY (`id`), ADD KEY `student_id` (`student_id`,`parent_id`);

--
-- Индексы таблицы `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`id`), ADD KEY `person_id` (`person_id`), ADD KEY `person_id_2` (`person_id`);

--
-- Индексы таблицы `telefon`
--
ALTER TABLE `telefon`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `adress`
--
ALTER TABLE `adress`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `bank`
--
ALTER TABLE `bank`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `kurator`
--
ALTER TABLE `kurator`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `modul`
--
ALTER TABLE `modul`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `parent`
--
ALTER TABLE `parent`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `person`
--
ALTER TABLE `person`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `person_telephones`
--
ALTER TABLE `person_telephones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `student_parents`
--
ALTER TABLE `student_parents`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `teacher`
--
ALTER TABLE `teacher`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `telefon`
--
ALTER TABLE `telefon`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `adress`
--
ALTER TABLE `adress`
ADD CONSTRAINT `adress_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Ограничения внешнего ключа таблицы `bank`
--
ALTER TABLE `bank`
ADD CONSTRAINT `bank_ibfk_1` FOREIGN KEY (`id`) REFERENCES `student` (`bank_id`);

--
-- Ограничения внешнего ключа таблицы `city`
--
ALTER TABLE `city`
ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Ограничения внешнего ключа таблицы `kurator`
--
ALTER TABLE `kurator`
ADD CONSTRAINT `kurator_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `group` (`id`);

--
-- Ограничения внешнего ключа таблицы `person_telephones`
--
ALTER TABLE `person_telephones`
ADD CONSTRAINT `person_telephones_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
ADD CONSTRAINT `person_telephones_ibfk_2` FOREIGN KEY (`telephone_id`) REFERENCES `telefon` (`id`);

--
-- Ограничения внешнего ключа таблицы `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`);

--
-- Ограничения внешнего ключа таблицы `teacher`
--
ALTER TABLE `teacher`
ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`id`) REFERENCES `kurator` (`id_teacher`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
