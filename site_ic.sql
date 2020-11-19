-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Nov-2020 às 02:56
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `site_ic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `dificuldade` varchar(20) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `links`
--

INSERT INTO `links` (`id`, `link`, `tema`, `dificuldade`, `nome`, `descricao`, `tipo`, `titulo`) VALUES
(3, 'https://www.spanishlearninglab.com/saludos-y-presentaciones-en-espanol/', 'Saludos y presentaciones', 'Basico', 'Andre', 'Ensina a se apresentar', 'Texto', 'Presentaciones'),
(4, 'https://www.bomespanhol.com.br/dialogos/apresentar-se-formalmente', 'Saludos y presentaciones', 'Basico', 'Andre', '', 'Audio', 'Dialogo con audio'),
(5, 'https://www.profedeele.es/actividad/funciones/saludos-despedidas/', 'Despedidas', 'Basico', 'Andre', 'Ensina a se despedir', 'Video', 'Video y actividades');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
