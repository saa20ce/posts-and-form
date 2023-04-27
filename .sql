-- Создание базы данных
CREATE DATABASE IF NOT EXISTS posts_and_form
DEFAULT CHARACTER SET utf8mb4
DEFAULT COLLATE utf8mb4_general_ci;

-- Используйте базу данных
USE posts_and_form;

-- Создание таблицы `news`
CREATE TABLE `news` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `publication_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Создание таблицы `feedback`
CREATE TABLE `feedback` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
