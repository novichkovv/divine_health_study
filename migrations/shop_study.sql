-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 20 2015 г., 01:53
-- Версия сервера: 5.5.23
-- Версия PHP: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `study_pages`
--

CREATE TABLE IF NOT EXISTS `study_pages` (
`id` bigint(20) unsigned NOT NULL,
  `id_type` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `study_pages`
--

INSERT INTO `study_pages` (`id`, `id_type`, `position`, `title`, `create_date`) VALUES
(1, 1, 0, '', '2015-03-17 18:55:09'),
(2, 1, 1, '', '2015-03-17 18:58:24'),
(3, 1, 2, '', '2015-03-17 20:09:56'),
(4, 0, 0, '', '2015-03-17 21:11:44');

-- --------------------------------------------------------

--
-- Структура таблицы `study_page_content`
--

CREATE TABLE IF NOT EXISTS `study_page_content` (
`id` bigint(20) unsigned NOT NULL,
  `id_page` int(11) NOT NULL,
  `id_element` int(11) NOT NULL,
  `content_key` varchar(255) NOT NULL,
  `varchar_value` varchar(255) NOT NULL,
  `text_value` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `study_page_content`
--

INSERT INTO `study_page_content` (`id`, `id_page`, `id_element`, `content_key`, `varchar_value`, `text_value`) VALUES
(1, 2, 1, 'title', 'PAGE 1', ''),
(2, 2, 5, 'description', '<p>some text</p>\r\n', ''),
(3, 3, 1, 'title', 'PAGE 1', ''),
(4, 3, 5, 'description', '', '<h2>ARE YOU A CANDIDATE FOR A SUPPLEMENT? MOST LIKELY, YES</h2>\r\n\r\n<ul>\r\n	<li>Women who may become pregnant should get 400 micrograms a day of folic acid from fortified foods or supplements, in addition to eating foods that naturally contain folate.</li>\r\n	<li>Women who are pregnant should take a prenatal vitamin that includes iron or a separate iron supplement.</li>\r\n	<li>Adults age 50 or older should eat foods fortified with vitamin B-12, such as fortified cereals, or take a multivitamin that contains B-12 or a separate B-12 supplement.</li>\r\n	<li>Adults age 65 and older who do not live in assisted living or nursing homes should take 800 international units (IU) of vitamin D daily to reduce the risk of falls.</li>\r\n</ul>\r\n\r\n<h2>DIETARY SUPPLEMENTS ALSO MAY BE APPROPRIATE IF YOU:</h2>\r\n\r\n<ul>\r\n	<li>Don&#39;t eat well or consume less than 1,600 calories a day.</li>\r\n	<li>Are a vegan or a vegetarian who eats a limited variety of foods.</li>\r\n	<li>Don&#39;t obtain two to three servings of fish a week. If you have difficulty achieving this amount, some experts recommend adding a fish oil supplement to your daily regimen.</li>\r\n	<li>Are a woman who experiences heavy bleeding during your menstrual period.</li>\r\n	<li>Have a medical condition that affects how your body absorbs or uses nutrients, such as chronic diarrhea, food allergies, food intolerance, or a disease of the liver, gallbladder, intestines or pancreas.</li>\r\n	<li>Have had surgery on your digestive tract and are not able to digest and absorb nutrients properly.</li>\r\n</ul>\r\n'),
(5, 3, 3, 'image', 'supplements.jpg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `study_page_elements`
--

CREATE TABLE IF NOT EXISTS `study_page_elements` (
`id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `form_template` varchar(255) NOT NULL,
  `template` varchar(255) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `study_page_elements`
--

INSERT INTO `study_page_elements` (`id`, `name`, `form_template`, `template`, `position`) VALUES
(1, 'Title', 'title', 'title', 1),
(2, 'Subtilte', 'subtitle', 'subtitle', 2),
(3, 'Image', 'image', 'image', 3),
(4, 'Video', 'video', 'video', 4),
(5, 'Text', 'text', 'text', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `study_page_types`
--

CREATE TABLE IF NOT EXISTS `study_page_types` (
`id` bigint(20) unsigned NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `study_page_types`
--

INSERT INTO `study_page_types` (`id`, `type_name`, `description`) VALUES
(1, 'text_page', 'A page with title, image and text'),
(2, 'video_page', 'A page with title, video and description (not required)');

-- --------------------------------------------------------

--
-- Структура таблицы `study_type_element_link`
--

CREATE TABLE IF NOT EXISTS `study_type_element_link` (
  `id_type` int(11) NOT NULL,
  `id_element` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `study_type_element_link`
--

INSERT INTO `study_type_element_link` (`id_type`, `id_element`, `position`) VALUES
(1, 1, 1),
(1, 5, 3),
(1, 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `study_users`
--

CREATE TABLE IF NOT EXISTS `study_users` (
`id` bigint(20) unsigned NOT NULL,
  `user_login` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_surname` varchar(255) NOT NULL,
  `id_study_status` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `study_pages`
--
ALTER TABLE `study_pages`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `study_page_content`
--
ALTER TABLE `study_page_content`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `study_page_elements`
--
ALTER TABLE `study_page_elements`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `study_page_types`
--
ALTER TABLE `study_page_types`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `study_users`
--
ALTER TABLE `study_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `study_pages`
--
ALTER TABLE `study_pages`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `study_page_content`
--
ALTER TABLE `study_page_content`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `study_page_elements`
--
ALTER TABLE `study_page_elements`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `study_page_types`
--
ALTER TABLE `study_page_types`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `study_users`
--
ALTER TABLE `study_users`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
