-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Час створення: Лис 20 2024 р., 11:02
-- Версія сервера: 8.2.0
-- Версія PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `nettedb`
--

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_active`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$hDGEbzBJUUsJXETzbKDmru.QrDR1itKT/jefTMWApcsWp5oknSELS', 1),
(2, 'user1edited', 'user@mail.com', '$2y$10$6hFXH4hqnuPh34E22M6G/OyPcXsVfcm4YvrvYPA3hWX/2HB.uusRe', 0),
(3, 'user2', 'user2@mail.com', '$2y$10$bYsqqp0ToGSkUBzFX/xhneWd.Bsl23Fc4/x3ImFGgQEYpA1f.UB4y', 1),
(5, 'user4edites', 'user4@mail.com', '$2y$10$bEEdlLxdVmOvyYq0UAEfKuapsO3rcp9L2Z38DR1uZ4aDM50N4t5.i', 0),
(6, 'user5', 'user5@mail.com', '$2y$10$EbvMTOiHZ4w4X8wnL2Ctju4NwweP7xkADUrTtNhVKscEunaGsLfU2', 0),
(10, 'sdfsd', 'sdf@sdf.sdf', '$2y$10$7U8O1.7t5y9Ph69lz18Ty.Y5rq0sUEm/.cJ0227UPfNC3k2adPD4u', 0);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
