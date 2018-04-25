-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2018 at 10:23 AM
-- Server version: 5.1.73
-- PHP Version: 5.3.3-7+squeeze19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webtar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbCaptcha`
--

CREATE TABLE IF NOT EXISTS `tbCaptcha` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `content` mediumblob,
  `type` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `keypass` mediumtext CHARACTER SET utf8 COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbCentralTelefonica`
--

CREATE TABLE IF NOT EXISTS `tbCentralTelefonica` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tbUnidades_id` int(11) unsigned NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `host` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `macAddress` varchar(50) DEFAULT NULL,
  `descricao` text,
  `usuarioCentral` varchar(50) DEFAULT NULL,
  `senhaCentral` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbCentralTelefonica_tbUnidades1` (`tbUnidades_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbComprovantePagamento`
--

CREATE TABLE IF NOT EXISTS `tbComprovantePagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tbUsuario_id` int(11) unsigned NOT NULL,
  `tbGRU_id` int(11) unsigned NOT NULL,
  `arquivo` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `mes_referencia` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbComprovantePagamento_tbUsuario1` (`tbUsuario_id`),
  KEY `fk_tbComprovantePagamento_tbGRU1_idx` (`tbGRU_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbContasTelefonicas`
--

CREATE TABLE IF NOT EXISTS `tbContasTelefonicas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tbUsuario_id` int(11) unsigned NOT NULL,
  `tbGRU_id` int(11) unsigned DEFAULT NULL,
  `valor` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `data_hora_gerado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status_gestor` varchar(10) DEFAULT '4',
  PRIMARY KEY (`id`),
  KEY `fk_tbContasTelefonicas_tbUsuario1` (`tbUsuario_id`),
  KEY `fk_tbContasTelefonicas_tbGRU1_idx` (`tbGRU_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbGRU`
--

CREATE TABLE IF NOT EXISTS `tbGRU` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tbUsuario_id` int(11) DEFAULT NULL,
  `vencimento` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `valor_total` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `data_hora_gerado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `arquivo_pdf` mediumblob,
  `nome_pdf` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbJustificativaLigacoes`
--

CREATE TABLE IF NOT EXISTS `tbJustificativaLigacoes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tbLigacoes_id` int(11) unsigned NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `justificativa` mediumtext,
  `aprovacao` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbJustificativaLigacoes_tbLigacoes1` (`tbLigacoes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7961 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbLigacoes`
--

CREATE TABLE IF NOT EXISTS `tbLigacoes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dataLigacao` date NOT NULL,
  `time` time NOT NULL,
  `duracao` int(11) NOT NULL,
  `tbUsuario_id` int(11) DEFAULT NULL,
  `tbCentralTelefonica_id` int(11) unsigned DEFAULT NULL,
  `tbUnidades_id` int(11) unsigned DEFAULT NULL,
  `tbContasTelefonicas_id` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `troncoEntrada` varchar(50) DEFAULT NULL,
  `troncoSaida` varchar(50) DEFAULT NULL,
  `canalEntrada` varchar(50) DEFAULT NULL,
  `canalSaida` varchar(50) DEFAULT NULL,
  `numDiscado` varchar(50) DEFAULT NULL,
  `numOrigem` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `cilcode` int(11) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `status_usuario` varchar(10) DEFAULT '0',
  `status_gestor` varchar(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_tbLigacoes_tbCentralTelefonica1_idx` (`tbCentralTelefonica_id`),
  KEY `fk_tbLigacoes_tbUnidades1_idx` (`tbUnidades_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4732171 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbLogUsuario`
--

CREATE TABLE IF NOT EXISTS `tbLogUsuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tbUsuario_id` int(11) DEFAULT NULL,
  `tarefaExecutada` text,
  `dataHora` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tipoDeTarefa` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `nomeEstacao` varchar(50) DEFAULT NULL,
  `macAddress` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14221 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbMsgInicial`
--

CREATE TABLE IF NOT EXISTS `tbMsgInicial` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tbUnidades_id` int(11) unsigned NOT NULL,
  `mensagem` blob,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `fk_tbMsgInicial_tbUnidades1` (`tbUnidades_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbPermissoes`
--

CREATE TABLE IF NOT EXISTS `tbPermissoes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbSenhaSemUsuario`
--

CREATE TABLE IF NOT EXISTS `tbSenhaSemUsuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tbUnidades_id` int(11) unsigned NOT NULL,
  `senha` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `data_hora` datetime NOT NULL,
  `origem` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cilcode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_senhaSemUsuario_tbUnidades1` (`tbUnidades_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13451 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbTarifas`
--

CREATE TABLE IF NOT EXISTS `tbTarifas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tbUnidades_id` int(11) unsigned NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `mascara` varchar(100) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`id`),
  KEY `fk_tbTarifas_tbUnidades1` (`tbUnidades_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=192 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbUnidades`
--

CREATE TABLE IF NOT EXISTS `tbUnidades` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `unidade_mae` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `sigla` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cod_unidade_gestora_gru` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `nome_unidade_gru` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `gestao_gru` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `cod_recolhimento_gru` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbUsuario`
--

CREATE TABLE IF NOT EXISTS `tbUsuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tbPermissoes_id` int(11) unsigned NOT NULL,
  `tbUnidades_id` int(11) unsigned NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `tipoSenha` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `nomeCompleto` varchar(150) DEFAULT NULL,
  `nomeGuerra` varchar(50) DEFAULT NULL,
  `saram` varchar(15) DEFAULT NULL,
  `identidade` varchar(25) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `postoGraduacao` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `ativo` int(3) DEFAULT NULL,
  `tentativas` int(5) DEFAULT '0',
  `cilcode` int(11) DEFAULT NULL,
  `cilcode_2` int(11) DEFAULT NULL,
  `funcional` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `fk_tbUsuario_tbPermissoes` (`tbPermissoes_id`),
  KEY `fk_tbUsuario_tbUnidades1` (`tbUnidades_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3738 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbCentralTelefonica`
--
ALTER TABLE `tbCentralTelefonica`
  ADD CONSTRAINT `fk_tbCentralTelefonica_tbUnidades1` FOREIGN KEY (`tbUnidades_id`) REFERENCES `tbUnidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbComprovantePagamento`
--
ALTER TABLE `tbComprovantePagamento`
  ADD CONSTRAINT `fk_tbComprovantePagamento_tbGRU1` FOREIGN KEY (`tbGRU_id`) REFERENCES `tbGRU` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbComprovantePagamento_tbUsuario1` FOREIGN KEY (`tbUsuario_id`) REFERENCES `tbUsuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbContasTelefonicas`
--
ALTER TABLE `tbContasTelefonicas`
  ADD CONSTRAINT `fk_tbContasTelefonicas_tbGRU1` FOREIGN KEY (`tbGRU_id`) REFERENCES `tbGRU` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbContasTelefonicas_tbUsuario1` FOREIGN KEY (`tbUsuario_id`) REFERENCES `tbUsuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbJustificativaLigacoes`
--
ALTER TABLE `tbJustificativaLigacoes`
  ADD CONSTRAINT `fk_tbJustificativaLigacoes_tbLigacoes1` FOREIGN KEY (`tbLigacoes_id`) REFERENCES `tbLigacoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbLigacoes`
--
ALTER TABLE `tbLigacoes`
  ADD CONSTRAINT `fk_tbLigacoes_tbCentralTelefonica1` FOREIGN KEY (`tbCentralTelefonica_id`) REFERENCES `tbCentralTelefonica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbLigacoes_tbUnidades1` FOREIGN KEY (`tbUnidades_id`) REFERENCES `tbUnidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbMsgInicial`
--
ALTER TABLE `tbMsgInicial`
  ADD CONSTRAINT `fk_tbMsgInicial_tbUnidades1` FOREIGN KEY (`tbUnidades_id`) REFERENCES `tbUnidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbSenhaSemUsuario`
--
ALTER TABLE `tbSenhaSemUsuario`
  ADD CONSTRAINT `fk_senhaSemUsuario_tbUnidades1` FOREIGN KEY (`tbUnidades_id`) REFERENCES `tbUnidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbTarifas`
--
ALTER TABLE `tbTarifas`
  ADD CONSTRAINT `fk_tbTarifas_tbUnidades1` FOREIGN KEY (`tbUnidades_id`) REFERENCES `tbUnidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbUsuario`
--
ALTER TABLE `tbUsuario`
  ADD CONSTRAINT `fk_tbUsuario_tbPermissoes` FOREIGN KEY (`tbPermissoes_id`) REFERENCES `tbPermissoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbUsuario_tbUnidades1` FOREIGN KEY (`tbUnidades_id`) REFERENCES `tbUnidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
