-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 26 2019 г., 10:57
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sibers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `login` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `gender` varchar(32) DEFAULT NULL,
  `birthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `password`, `name`, `surname`, `gender`, `birthdate`) VALUES
('alice', '$2y$10$9FmLphAbGV82kedbCltw1eVJacW51jGZAzUhOQ1QtnWouLL/pJMMS', 'Alice', '', 'female', '1970-01-01'),
('bob', '$2y$10$/wxLkSQtxs7mqjmvnzzNtOrrtG0.VxECtZCsK0CpARdfixhOGnMx2', 'Bob', '', 'male', '1996-01-18'),
('John', '$2y$10$7Bu8/AzWHKEYtbpNOxnBpueshwr39zA7OHCz9erZRfyV.25tEhpLK', 'John', 'Smith', '', '2019-07-10'),
('mike', '$2y$10$3P.FgelPgne8HcHG0L.NfuL6mWHmiZbTKt6zYniosgR5Y10jV7PJS', 'Mike', '', '', '1970-01-21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
