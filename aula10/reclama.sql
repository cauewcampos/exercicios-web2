-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/10/2025 às 02:16
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `reclama`
--
CREATE DATABASE IF NOT EXISTS `reclama` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `reclama`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reclamacao`
--

CREATE TABLE `reclamacao` (
  `id` int(11) NOT NULL,
  `id_reclamante` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `aprovacao` varchar(50) NOT NULL,
  `comentario` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reclamacao`
--

INSERT INTO `reclamacao` (`id`, `id_reclamante`, `titulo`, `descricao`, `foto`, `estado`, `aprovacao`, `comentario`) VALUES
(1, 999, 'Teste', 'Teste', 'Teste.png', 'Teste', 'Teste', 'Teste'),
(2, 2, 'buraco', 'buraco na rua sao joao', 'papel_parede_01_1066_768.jpg', 'Resolvida', '', ''),
(3, 2, 'buraco 2', 'buraco na rua sao jose', 'cratera-joao-pessoa-bayeux.webp', 'Resolvida', '', ''),
(4, 7, 'buraco', 'awdawd', 'papel_parede_01_1066_768.jpg', 'Resolvida', 'Aprovada', 'boa!');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nascimento` date NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `cpf`, `nascimento`, `tipo`) VALUES
(1, 'Caue', 'caue@gmail.com', '', '', '0000-00-00', ''),
(2, 'breno', 'breno', 'breno', '12345678910', '2001-01-01', 'usuario'),
(3, 'breno', 'breno', 'breno', '12345678901', '2005-01-01', 'usuario'),
(4, 'breno', 'breno', 'breno', '12345678901', '2005-01-01', 'usuario'),
(5, 'caue', 'caue', 'caue', '12345674501', '2000-05-06', 'admin'),
(6, 'teste', 'teste@gmail.com', 'teste', '12345678901', '2001-01-01', 'usuario'),
(7, 'breno', 'breno@gmail.com', 'breno123', '12345678910', '2003-02-01', 'usuario'),
(8, 'Caue', 'caue@gmail.com', 'caue', '47915777874', '0000-00-00', 'usuario'),
(9, 'Caue', 'caue@gmail.com', 'caue', '47915777874', '2005-05-06', 'admin'),
(10, 'Caue1', 'caue1@gmail.com', 'caue', '47915777874', '2005-05-06', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `reclamacao`
--
ALTER TABLE `reclamacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `reclamacao`
--
ALTER TABLE `reclamacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
