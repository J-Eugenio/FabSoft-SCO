-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 18-Jul-2019 às 16:12
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sys`
--
CREATE DATABASE sys;
USE sys;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `dataNasc` varchar(50) NOT NULL,
  `idade` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `escolaridade` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `numeroCardSUS` varchar(50) NOT NULL,
  `unidadeDeSaude` varchar(50) NOT NULL,
  `dataDiagnostico` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `pontoDeReferencia` varchar(50) NOT NULL,
  `zona` varchar(50) NOT NULL,
  `hospitalDeTratamento` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `idade` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `funcao` varchar(50) NOT NULL,
  `tipoDeFunc` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `funcionario` (`id`, `cpf`, `senha`, `nome`, `idade`, `genero`, `funcao`, `tipoDeFunc`) VALUES
(1, '12345678912', 'admin', 'admin', '24', 'M', 'Aux', 'adm');
