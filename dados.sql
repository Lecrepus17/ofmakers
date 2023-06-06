-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 31/05/2023 às 16:22
-- Versão do servidor: 10.5.19-MariaDB-0+deb11u2
-- Versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `termometro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados`
--

CREATE TABLE `dados` (
  `iddados` int(11) NOT NULL AUTO_INCREMENT,
  `temperatura` float NOT NULL,
  `umidade` int(11) NOT NULL,
  `tempo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dados`
--

INSERT INTO `dados` (`iddados`, `temperatura`, `umidade`, `tempo`) VALUES
(146, 18, 69, '2023-05-31 14:11:34'),
(147, 18, 69, '2023-05-31 14:11:45'),
(148, 18, 69, '2023-05-31 14:11:55'),
(149, 18, 69, '2023-05-31 14:12:06'),
(150, 18, 69, '2023-05-31 14:12:16'),
(151, 18, 69, '2023-05-31 14:12:26'),
(152, 18, 69, '2023-05-31 14:12:37'),
(153, 18, 69, '2023-05-31 14:12:47'),
(154, 18, 70, '2023-05-31 14:13:32'),
(155, 18, 70, '2023-05-31 14:13:43'),
(156, 17.8, 70, '2023-05-31 14:14:23'),
(157, 17.8, 70, '2023-05-31 14:14:34'),
(158, 17.8, 70, '2023-05-31 14:14:44'),
(159, 17.8, 70, '2023-05-31 14:14:54'),
(160, 18.1, 71, '2023-05-31 14:15:05'),
(161, 18.1, 70, '2023-05-31 14:15:15');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`iddados`);

