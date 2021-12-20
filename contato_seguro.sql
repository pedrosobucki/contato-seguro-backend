-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Dez-2021 às 02:22
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `contato_seguro`
--
CREATE DATABASE IF NOT EXISTS `contato_seguro` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `contato_seguro`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adress`
--

CREATE TABLE `adress` (
  `id_adress` int(11) NOT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `additional` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adress`
--

INSERT INTO `adress` (`id_adress`, `cep`, `country`, `state`, `city`, `street`, `number`, `district`, `additional`) VALUES
(1, '95500000', 'Brasil', 'RS', 'Porto Alegre', 'Rua General Mostarda', 919, 'Menino Deus', NULL),
(2, '93080130', 'Argentina', 'BN', 'Burnos Aires', 'Krakoa', 513, 'Bairro Reall', 'bloco 43'),
(3, '95500000', 'brasil', 'RS', 'Porto Alegre', 'Filho de deus', 60, 'Bairro Real', 'apt. 110'),
(4, '95500000', 'brasil', 'RS', 'Porto Alegre', 'Filho de deus', 60, 'Bairro Real', 'apt. 110');

-- --------------------------------------------------------

--
-- Estrutura da tabela `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT 1,
  `id_adress` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `company`
--

INSERT INTO `company` (`id_company`, `name`, `cnpj`, `show`, `id_adress`) VALUES
(1, NULL, '991836547193', 1, 1),
(4, 'Empresa Atualizada', '33333333333', 1, 2),
(5, 'Empresa', '12312312312', 1, 3),
(6, 'Empresa Falsa', '12312312312', 0, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_city` varchar(255) DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `telephone`, `birth_date`, `birth_city`, `show`) VALUES
(1, 'test', 'test@mail.com', '51999999999', '2000-01-01', 'Porto Alegre', 0),
(2, 'peter', 'peter@spider.com', NULL, NULL, NULL, 0),
(3, 'Anderson Figueiredo', 'anderson@mail.com', '(51) 99811-1092', '1998-12-01', 'Porto Alegre', 0),
(4, 'Josh', 'Josh@akazham', '(51) 99811-1092', '1998-12-01', 'Porto Alegre', 0),
(5, 'Insertion Testes', 'insert@example.com', '(51) 99811-1092', '1998-12-01', 'Test Town', 0),
(6, 'Insertion Testes', 'insert@example.com', '(51) 99811-1092', '1998-12-01', 'Test Town', 0),
(8, 'Insertion Testes', 'insert@example.com', '(51) 99811-1092', '1998-12-01', 'Test Town', 0),
(11, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-08', 'Porto Alegre', 0),
(12, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-08', 'Porto Alegre', 0),
(13, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-10', 'Porto Alegre', 0),
(14, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-09', 'Porto Alegre', 0),
(15, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-09', 'Porto Alegre', 0),
(16, 'Insertion Testes', 'insert@example.com', '(51) 99811-1092', '1998-12-01', 'Test Town', 0),
(17, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-02', 'Porto Alegre', 0),
(18, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-16', 'Porto Alegre', 0),
(19, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-22', 'Porto Alegre', 0),
(20, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-07', 'Porto Alegre', 0),
(21, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-16', 'Porto Alegre', 0),
(22, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-17', 'Porto Alegre', 0),
(23, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-16', 'Porto Alegre', 0),
(24, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-24', 'Porto Alegre', 0),
(25, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-15', 'Porto Alegre', 0),
(26, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-15', 'Porto Alegre', 0),
(27, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-18', 'Porto Alegre', 0),
(28, NULL, 'pedrosobucki@gmail.com', '+555193835454', '0000-00-00', 'Porto Alegre', 0),
(29, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-10', 'Porto Alegre', 0),
(30, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-30', 'Porto Alegre', 0),
(31, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '0000-00-00', 'Porto Alegre', 0),
(32, 'PEDRO MACHADO SOBUCKI', 'pedrosobucki@gmail.com', '+555193835454', '2021-12-22', 'Porto Alegre', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_company`
--

CREATE TABLE `user_company` (
  `id_user_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_company`
--

INSERT INTO `user_company` (`id_user_company`, `id_user`, `id_company`) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 1, 6),
(4, 3, 4),
(5, 3, 6),
(6, 6, 4),
(7, 6, 5),
(8, 6, 6),
(11, 8, 4),
(12, 8, 5),
(13, 8, 6),
(18, 12, 1),
(19, 13, 4),
(20, 13, 5),
(21, 13, 6),
(23, 15, 4),
(24, 15, 5),
(25, 15, 6),
(26, 16, 4),
(27, 16, 5),
(28, 16, 6),
(29, 17, 4),
(30, 17, 5),
(31, 17, 6),
(32, 18, 4),
(33, 18, 5),
(34, 18, 6),
(35, 19, 4),
(36, 19, 5),
(37, 19, 6),
(38, 20, 4),
(39, 20, 5),
(40, 20, 6),
(41, 21, 4),
(42, 21, 5),
(43, 21, 6),
(44, 22, 5),
(45, 22, 4),
(46, 22, 6),
(47, 23, 5),
(48, 23, 4),
(49, 23, 6),
(50, 24, 4),
(51, 25, 4),
(52, 25, 5),
(53, 25, 6),
(54, 26, 4),
(55, 26, 5),
(56, 26, 6),
(57, 27, 4),
(58, 27, 5),
(59, 27, 6),
(60, 28, 4),
(61, 28, 5),
(62, 29, 4),
(63, 29, 5),
(64, 29, 6),
(65, 30, 4),
(66, 30, 5),
(67, 30, 6),
(68, 31, 4),
(69, 31, 5),
(70, 31, 6),
(71, 32, 4),
(72, 32, 5),
(73, 32, 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`id_adress`);

--
-- Índices para tabela `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`,`id_adress`),
  ADD KEY `fk_empresa_endereco1` (`id_adress`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Índices para tabela `user_company`
--
ALTER TABLE `user_company`
  ADD PRIMARY KEY (`id_user_company`,`id_user`,`id_company`),
  ADD KEY `fk_usuario_empresa_usuario` (`id_user`),
  ADD KEY `fk_usuario_empresa_empresa1` (`id_company`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adress`
--
ALTER TABLE `adress`
  MODIFY `id_adress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `user_company`
--
ALTER TABLE `user_company`
  MODIFY `id_user_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_empresa_endereco1` FOREIGN KEY (`id_adress`) REFERENCES `adress` (`id_adress`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `user_company`
--
ALTER TABLE `user_company`
  ADD CONSTRAINT `fk_usuario_empresa_empresa1` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_empresa_usuario` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
