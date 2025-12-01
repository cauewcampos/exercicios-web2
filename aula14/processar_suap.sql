-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/12/2025 às 18:37
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
-- Banco de dados: `processar_suap`
--
CREATE DATABASE IF NOT EXISTS `processar_suap` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `processar_suap`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `nota` decimal(5,2) DEFAULT NULL,
  `frequencia` decimal(5,2) DEFAULT NULL,
  `situacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `notas`
--

INSERT INTO `notas` (`id`, `usuario_id`, `semestre`, `disciplina`, `nota`, `frequencia`, `situacao`) VALUES
(2, 1, 1, 'ALGORITMO E PROGRAMAÇÃO', 9.00, 82.50, 'Aprovado'),
(3, 1, 1, 'INGLÊS TÉCNICO', 9.20, 75.00, 'Aprovado'),
(4, 1, 1, 'INTRODUÇÃO À ADMINISTRAÇÃO', 10.00, 85.00, 'Aprovado'),
(5, 1, 1, 'INTRODUÇÃO À COMPUTAÇÃO', 9.40, 90.36, 'Aprovado'),
(6, 1, 1, 'LINGUAGEM DE PROGRAMAÇÃO', 7.30, 100.00, 'Aprovado'),
(7, 1, 1, 'MATEMÁTICA', 10.00, 85.00, 'Aprovado'),
(8, 1, 2, 'ARQUITETURA DE COMPUTADORES', 9.30, 95.00, 'Aprovado'),
(9, 1, 2, 'BANCO DE DADOS', 10.00, 85.00, 'Aprovado'),
(10, 1, 2, 'ESTRUTURAS DE DADOS', 8.80, 95.00, 'Aprovado'),
(11, 1, 2, 'ESTATÍSTICA', 8.70, 90.00, 'Aprovado'),
(12, 1, 2, 'GESTÃO DE PROJETOS', 9.80, 95.00, 'Aprovado'),
(13, 1, 2, 'SISTEMAS OPERACIONAIS', 6.00, 85.00, 'Aprovado'),
(14, 1, 3, 'BANCO DE DADOS 2', 10.00, 80.00, 'Aprovado'),
(15, 1, 3, 'DESENVOLVIMENTO WEB', 9.50, 80.00, 'Aprovado'),
(16, 1, 3, 'ENGENHARIA DE SOFTWARE', 9.50, 80.00, 'Aprovado'),
(17, 1, 3, 'ESTRUTURAS DE DADOS 2', 6.50, 80.00, 'Aprovado'),
(18, 1, 3, 'REDES DE COMPUTADORES', 9.10, 80.00, 'Aprovado'),
(19, 1, 4, 'ANÁLISE DE SISTEMAS', NULL, NULL, 'Cursando'),
(20, 1, 4, 'DESENVOLVIMENTO WEB 2', NULL, NULL, 'Cursando'),
(21, 1, 4, 'EMPREENDEDORISMO', NULL, NULL, 'Cursando'),
(22, 1, 4, 'INTERAÇÃO HUMANO-COMPUTADOR', NULL, NULL, 'Cursando'),
(23, 1, 4, 'PROGRAMAÇÃO ORIENTADA A OBJETOS', NULL, NULL, 'Cursando'),
(24, 1, 4, 'REDE DE COMPUTADORES 2', NULL, NULL, 'Cursando'),
(25, 1, 5, 'COMPUTAÇÃO NA NUVEM', NULL, NULL, '-'),
(26, 1, 5, 'DESENVOLVIMENTO WEB 3', NULL, NULL, '-'),
(27, 1, 5, 'INTERNET DAS COISAS', NULL, NULL, '-'),
(28, 1, 5, 'LINGUAGEM DE PROGRAMAÇÃO 2', NULL, NULL, '-'),
(29, 1, 5, 'PROJETO E DESENVOLVIMENTO DE SISTEMAS', NULL, NULL, '-'),
(30, 1, 6, 'CIÊNCIA DE DADOS', NULL, NULL, '-'),
(31, 1, 6, 'DESENVOLVIMENTO PARA DISPOSITIVOS MÓVEIS', NULL, NULL, '-'),
(32, 1, 6, 'PROJETO E DESENVOLVIMENTO DE SISTEMAS 2', NULL, NULL, '-'),
(33, 1, 6, 'SEGURANÇA DA INFORMAÇÃO', NULL, NULL, '-'),
(34, 1, 6, 'TÓPICOS AVANÇADOS', NULL, NULL, '-'),
(35, 2, 1, 'ALGORITMO E PROGRAMAÇÃO', 2.80, 75.00, 'Reprovado'),
(36, 2, 1, 'INGLÊS TÉCNICO', 9.80, 87.50, 'Aprovado'),
(37, 2, 1, 'INTRODUÇÃO À ADMINISTRAÇÃO', 8.00, 80.00, 'Aprovado'),
(38, 2, 1, 'INTRODUÇÃO À COMPUTAÇÃO', 8.60, 85.54, 'Aprovado'),
(39, 2, 1, 'LINGUAGEM DE PROGRAMAÇÃO', 6.80, 100.00, 'Aprovado'),
(40, 2, 1, 'MATEMÁTICA', 10.00, 90.00, 'Aprovado'),
(41, 2, 2, 'ARQUITETURA DE COMPUTADORES', 6.40, 90.00, 'Aprovado'),
(42, 2, 2, 'BANCO DE DADOS', 8.50, 85.00, 'Aprovado'),
(43, 2, 2, 'ESTRUTURAS DE DADOS', 1.40, 80.00, 'Reprovado'),
(44, 2, 2, 'ESTATÍSTICA', 8.70, 95.00, 'Aprovado'),
(45, 2, 2, 'GESTÃO DE PROJETOS', 9.80, 80.00, 'Aprovado'),
(46, 2, 2, 'SISTEMAS OPERACIONAIS', 6.00, 95.00, 'Aprovado'),
(47, 2, 3, 'BANCO DE DADOS 2', 10.00, 85.00, 'Aprovado'),
(48, 2, 3, 'DESENVOLVIMENTO WEB', 9.40, 80.00, 'Aprovado'),
(49, 2, 3, 'ENGENHARIA DE SOFTWARE', 9.50, 85.00, 'Aprovado'),
(50, 2, 3, 'ESTRUTURAS DE DADOS 2', 6.00, 82.50, 'Aprovado'),
(51, 2, 3, 'REDES DE COMPUTADORES', 9.20, 80.00, 'Aprovado'),
(52, 2, 4, 'ANÁLISE DE SISTEMAS', NULL, NULL, 'Cursando'),
(53, 2, 4, 'DESENVOLVIMENTO WEB 2', NULL, NULL, 'Cursando'),
(54, 2, 4, 'EMPREENDEDORISMO', NULL, NULL, 'Cursando'),
(55, 2, 4, 'INTERAÇÃO HUMANO-COMPUTADOR', NULL, NULL, 'Cursando'),
(56, 2, 4, 'PROGRAMAÇÃO ORIENTADA A OBJETOS', NULL, NULL, 'Cursando'),
(57, 2, 4, 'REDE DE COMPUTADORES 2', NULL, NULL, 'Cursando'),
(58, 2, 5, 'COMPUTAÇÃO NA NUVEM', NULL, NULL, '-'),
(59, 2, 5, 'DESENVOLVIMENTO WEB 3', NULL, NULL, '-'),
(60, 2, 5, 'INTERNET DAS COISAS', NULL, NULL, '-'),
(61, 2, 5, 'LINGUAGEM DE PROGRAMAÇÃO 2', NULL, NULL, '-'),
(62, 2, 5, 'PROJETO E DESENVOLVIMENTO DE SISTEMAS', NULL, NULL, '-'),
(63, 2, 6, 'CIÊNCIA DE DADOS', NULL, NULL, '-'),
(64, 2, 6, 'DESENVOLVIMENTO PARA DISPOSITIVOS MÓVEIS', NULL, NULL, '-'),
(65, 2, 6, 'PROJETO E DESENVOLVIMENTO DE SISTEMAS 2', NULL, NULL, '-'),
(66, 2, 6, 'SEGURANÇA DA INFORMAÇÃO', NULL, NULL, '-'),
(67, 2, 6, 'TÓPICOS AVANÇADOS', NULL, NULL, '-');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`) VALUES
(1, 'caue', '$2y$10$oj0mMK6kfCIpSREvFWFSBeKM.uAa08AHEQDIc3h2qsPp.R2iv4tmO'),
(2, 'breno', '$2y$10$kXOhnki00M/ezk4xjqGnh./ik..zqnR8TnhEaRWwLZQ3DCHKMNUuS');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_usuario_semestre_disciplina` (`usuario_id`,`semestre`,`disciplina`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
