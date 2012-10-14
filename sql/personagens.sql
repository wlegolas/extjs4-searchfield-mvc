-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `blog_legolas`
--

CREATE DATABASE `blog_legolas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog_legolas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagens`
--

CREATE TABLE IF NOT EXISTS `personagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cla` varchar(20) NOT NULL,
  `nivel` varchar(40) NOT NULL,
  `vila` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `personagens`
--

INSERT INTO `personagens` (`id`, `nome`, `cla`, `nivel`, `vila`) VALUES
(1, 'Naruto Uzumaki', 'Uzumaki', 'Gennin', 'Konoha'),
(2, 'Sasuke Uchiha', 'Uchiha', 'Gennin/Nukenin', 'Konoha'),
(3, 'Shino Aburame', 'Aburame', 'Gennin', 'Konoha'),
(4, 'Chouji Akimichi', 'Akimichi', 'Gennin', 'Konoha'),
(5, 'Shikamaru Nara', 'Nara', 'Jounin', 'Konoha'),
(6, 'Kakashi Hatake', 'Hatake', 'Jounin/Kekkei Genkai  Sharingan', 'Konoha'),
(7, 'Uchiha Obito', 'Uchiha', 'Gennin', 'Konoha'),
(8, 'Neji Hyuga', 'Hyuga', 'Jounnin/Kekkei Genkai Byakugan', 'Konoha'),
(9, 'Kiba Inuzuka', 'Inuzuka', 'Chunnin', 'Konoha'),
(10, 'Hiruzen Sarutobi', 'Sarutobi', 'Hokage', 'Konoha'),
(11, 'Asuma Sarutobi', 'Sarutobi', 'Jounnin', 'Konoha'),
(12, 'Itachi Uchiha', 'Uchiha', 'ANBU/Nukenin', 'Konoha'),
(13, 'Madara Uchiha', 'Uchiha', 'Nukenin', 'Konoha'),
(14, 'Ino Yamanaka', 'Yamanaka', 'Chunnin', 'Konoha'),
(15, 'Jiraiya', '', 'Sannin', 'Konoha');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
