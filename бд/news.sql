-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 27 2020 г., 12:19
-- Версия сервера: 10.1.30-MariaDB
-- Версия PHP: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `event_new`
--

CREATE TABLE `event_new` (
  `id` int(8) NOT NULL,
  `date` date NOT NULL,
  `header` varchar(30) NOT NULL,
  `full_text` varchar(500) NOT NULL,
  `preview` varchar(150) NOT NULL COMMENT 'анонс',
  `picture` varchar(500) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `event_new`
--

INSERT INTO `event_new` (`id`, `date`, `header`, `full_text`, `preview`, `picture`, `id_user`) VALUES
(2, '0000-00-00', 'Sport car', 'Ð’Ð°ÑˆÐ° Ñ…Ð²Ð°Ñ‚ÐºÐ° Ð½Ð° Ñ€ÑƒÐ»ÐµÐ²Ð¾Ð¼ ÐºÐ¾Ð»ÐµÑÐµ ÑÑ‚Ð°Ð»Ð° Ð¶ÐµÑÑ‚Ñ‡Ðµ. Ð’Ð°Ñˆ Ð²Ð·Ð³Ð»ÑÐ´ Ñ„Ð¸ÐºÑÐ¸Ñ€ÑƒÐµÑ‚ÑÑ Ð½Ð° Ð¶ÐµÐ»Ñ‚Ð¾Ð¹ Ð¿Ð¾Ð»Ð¾ÑÐµ. Ð’ÑÐµ Ð²Ð°ÑˆÐ¸ Ð¶ÐµÐ»Ð°Ð½Ð¸Ñ ÑÐ¾ÑÑ€ÐµÐ´Ð¾Ñ‚Ð¾Ñ‡ÐµÐ½Ñ‹ Ð½Ð° Ð¾Ð´Ð½Ð¾Ð¼. ', 'ÐÐ¾Ð²Ð¾ÑÑ‚Ð¸ Ð¾ ÑÐ¿Ð¾Ñ€Ñ‚Ð¸Ð²Ð½Ñ‹Ñ… Ð°Ð²Ñ‚Ð¾Ð¼Ð¾Ð±Ð¸Ð»ÑÑ… 12', '1592260899a789ab430e54e3c9444b30cd2084d552db6105ef.jpg', 9),
(4, '2020-06-14', 'Porshe', 'Porshe Ð¾Ñ‡ÐµÐ½ÑŒ Ð´Ð¾Ñ€Ð¾Ð³Ð°Ñ Ð¼Ð°ÑˆÐ¸Ð½Ð° Ð±Ð»Ð° Ð±Ð»Ð°', 'Porshe Ð¾Ñ‡ÐµÐ½ÑŒ Ð´Ð¾Ñ€Ð¾Ð³Ð°Ñ Ð¼Ð°ÑˆÐ¸Ð½Ð° Ð¿Ð¾Ñ‚Ð¾Ð¼Ñƒ Ñ‡Ñ‚Ð¾....', '1592224494a789ab430e54e3c9444b30cd2084d552db6105ef.jpg', 9),
(5, '2020-06-15', 'Ð’Ð¾Ð¹Ð½Ð° Ð² Ð¡Ð¸Ñ€Ð¸Ð¸', 'Ð’Ð¾ÑŽÑŽ Ð·Ð° Ð Ð¾ÑÑÐ¸ÑŽ Ð² Ð¡Ð¸Ñ€Ð¸Ð¹ÑÐºÐ¾Ð¹ Ð°Ñ€Ð°Ð±ÑÐºÐ¾Ð¹ Ñ€ÐµÑÐ¿ÑƒÐ±Ð»Ð¸ÐºÐµ. ÐŸÐ¾Ð´Ð°ÑŽ Ð¿Ñ€Ð¸Ð¾Ñ€Ñƒ Ð½Ðµ Ð´Ð¾Ñ€Ð¾Ð³Ð¾.', 'Ð’Ð¾ÑŽÑŽ Ð·Ð° Ð Ð¾ÑÑÐ¸ÑŽ Ð² Ð¡Ð¸Ñ€Ð¸Ð¹ÑÐºÐ¾Ð¹ Ð°Ñ€Ð°Ð±ÑÐºÐ¾Ð¹ Ñ€ÐµÑÐ¿ÑƒÐ±Ð»Ð¸ÐºÐµ', '15922915982fons.jpg', 9),
(8, '2020-06-15', 'ÐšÐ¾Ð»Ð¾Ð±Ð¾Ðº Ð¶Ð¸Ð²!', 'Ð£ÑˆÑ‘Ð» Ð¾Ñ‚ Ð´ÐµÐ´ÑƒÑˆÐºÐ¸ Ð¸ Ð±Ð°Ð±ÑƒÑˆÐºÐ¸. ÐšÐ°Ðº Ð¶Ðµ Ñ‚Ð°Ðº Ð²Ñ‹ÑˆÐ»Ð¾ Ñ‡Ð¸Ñ‚Ð°Ð¹Ñ‚Ðµ Ð¿Ð¾Ð´Ñ€Ð¾Ð±Ð½ÐµÐµ. Ð£ÑˆÑ‘Ð» Ð¾Ñ‚ Ð´ÐµÐ´ÑƒÑˆÐºÐ¸ Ð¸ Ð±Ð°Ð±ÑƒÑˆÐºÐ¸. ÐšÐ°Ðº Ð¶Ðµ Ñ‚Ð°Ðº Ð²Ñ‹ÑˆÐ»Ð¾ Ñ‡Ð¸Ñ‚Ð°Ð¹Ñ‚Ðµ Ð¿Ð¾Ð´Ñ€Ð¾Ð±Ð½ÐµÐµ.', 'Ð£ÑˆÑ‘Ð» Ð¾Ñ‚ Ð´ÐµÐ´ÑƒÑˆÐºÐ¸ Ð¸ Ð±Ð°Ð±ÑƒÑˆÐºÐ¸. ÐšÐ°Ðº Ð¶Ðµ Ñ‚Ð°Ðº Ð²Ñ‹ÑˆÐ»Ð¾ Ñ‡Ð¸Ñ‚Ð°Ð¹Ñ‚Ðµ Ð¿Ð¾Ð´Ñ€Ð¾Ð±Ð½ÐµÐµ', '', 10),
(9, '2020-06-16', 'Ð£Ñ‡Ð¸Ð¼ÑÑ Ð»ÐµÑ‚Ð°Ñ‚ÑŒ', 'Ð£Ñ‡Ð¸Ð¼ÑÑ Ð»ÐµÑ‚Ð°Ñ‚ÑŒ Ñ Ð¿Ñ‚Ð¸Ñ†Ð°Ð¼Ð¸.Ð£Ñ‡Ð¸Ð¼ÑÑ Ð»ÐµÑ‚Ð°Ñ‚ÑŒ Ñ Ð¿Ñ‚Ð¸Ñ†Ð°Ð¼Ð¸. Ð£Ñ‡Ð¸Ð¼ÑÑ Ð»ÐµÑ‚Ð°Ñ‚ÑŒ Ñ Ð¿Ñ‚Ð¸Ñ†Ð°Ð¼Ð¸', 'Ð£Ñ‡Ð¸Ð¼ÑÑ Ð»ÐµÑ‚Ð°Ñ‚ÑŒ Ñ Ð¿Ñ‚Ð¸Ñ†Ð°Ð¼Ð¸', '', 10),
(10, '2020-06-16', 'Ð¡Ñ‚Ñ€ÐµÐ»ÑŒÐ±Ð°  ÐœÐ¾ÑÐºÐ²Ð°', 'Ð”Ð²Ð° Ð¿Ð¾Ð»Ð¸Ñ†ÐµÐ¹ÑÐºÐ¸Ñ… Ñ€Ð°Ð½ÐµÐ½Ñ‹ Ð² Ñ…Ð¾Ð´Ðµ Ð¿Ñ€Ð¾Ð²ÐµÐ´ÐµÐ½Ð¸Ñ ÑÐ¿ÐµÑ† Ð¾Ð¿ÐµÑ€Ð°Ñ†Ð¸Ð¸ Ð½Ð° Ð›ÐµÐ½Ð¸Ð½ÑÐºÐ¾Ð¼ Ð¿Ñ€Ð¾ÑÐ¿ÐµÐºÑ‚Ðµ.', 'Ð”Ð²Ð° Ð¿Ð¾Ð»Ð¸Ñ†ÐµÐ¹ÑÐºÐ¸Ñ… Ñ€Ð°Ð½ÐµÐ½Ñ‹ Ð² ÐœÐ¾ÑÐºÐ²Ðµ', '', 10),
(12, '2020-10-25', 'asd', 'asd', 'sad', '', 13),
(13, '2020-10-25', 'asd', 'asd', 'sad', '', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `key` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `login`, `key`) VALUES
(9, 'asd1', '7815696ecbf1c96e6894b779456d330e', 'asd@mail.ru', 1),
(10, 'Igor', 'cb06df458e9a72476d2e0b2998647f91', 'igor@mail.ru', 0),
(11, 'dfgdg', '76d80224611fc919a5d54f0ff9fba446', 'gdsfgd@mail.ru', 0),
(12, 'admin', '202cb962ac59075b964b07152d234b70', 'admin@mail.ru', 1),
(13, 'qwerty2234', '202cb962ac59075b964b07152d234b70', 'qwerty@mail.ru', 1),
(14, 'asdfg', '202cb962ac59075b964b07152d234b70', 'asdfg@mail.ru', 1),
(15, 'qwerty1', '202cb962ac59075b964b07152d234b70', 'qwerty1@mail.ru', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `event_new`
--
ALTER TABLE `event_new`
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
-- AUTO_INCREMENT для таблицы `event_new`
--
ALTER TABLE `event_new`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
