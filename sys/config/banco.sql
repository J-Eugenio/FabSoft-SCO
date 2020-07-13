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
  `sobrenome` varchar(50) NOT NULL,
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
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
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
  `sobrenome` varchar(50) NOT NULL,
  `dataNasc` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `funcao` varchar(50) NOT NULL,
  `tipoDeFunc` varchar(50) NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

--
-- Estrutura da tabela `editar`
--
DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(50) NOT NULL,
  `tipoDeSonda` varchar(50),
  `situacao` varchar(50),
  `dataRegistro` DATE NOT NULL,
  `horaRegistro` TIME NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

ALTER TABLE `services`
  ADD CONSTRAINT `FKservices` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transporte`
--
DROP TABLE IF EXISTS `transporte`;
CREATE TABLE IF NOT EXISTS `transporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lugarSolicitado` varchar(50) NOT NULL,
  `motivoSolicitacao` varchar(50),
  `dataConsulta` DATE NOT NULL,
  `horarioConsulta` TIME NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

ALTER TABLE `transporte`
  ADD CONSTRAINT `FKtransporte` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);


