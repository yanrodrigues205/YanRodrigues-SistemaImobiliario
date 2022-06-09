-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Jun-2022 às 04:51
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE IF NOT EXISTS `imoveis` (
  `imo_id` int(11) NOT NULL AUTO_INCREMENT,
  `imo_titulo` varchar(150) NOT NULL,
  `imo_desc` varchar(250) NOT NULL,
  `imo_preco` int(20) NOT NULL,
  `imo_img_local` varchar(200) NOT NULL,
  `imo_data_up` date NOT NULL,
  PRIMARY KEY (`imo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`imo_id`, `imo_titulo`, `imo_desc`, `imo_preco`, `imo_img_local`, `imo_data_up`) VALUES
(7, 'Casa - ResidÃªncial  Bongiovani', 'A residÃªncia conta com 1 piscina de 10m de largura , 1 suÃ­te para casal, 1 suÃ­te para solteiro, 3 quartos sem banheiro, 4 banheiros, ï¿½ï¿½rea para churrasco e salÃ£o de cinema.', 350000, '../img/299948e5fa921e7a28bbe0f017049fc1.jpg', '2022-06-05'),
(21, 'Casa -  CondomÃ­nio Santa Rosa', 'EstÃ¡ mansÃ£o conta com as tecnologias de automaÃ§Ã£o da ultima geraÃ§Ã£o, aonde vocÃª acende as luzes pelo seu smartphone, controla o gasto de Ã¡gua, luz , internet e etc...', 1300999, '../img/7c725cf5a1c9f8d6938136338164802b.jpg', '2022-06-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `midias`
--

CREATE TABLE IF NOT EXISTS `midias` (
  `mid_id` int(11) NOT NULL AUTO_INCREMENT,
  `imo_id` int(11) NOT NULL,
  `mid_tipo` varchar(200) NOT NULL,
  `mid_titulo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mid_caminho` varchar(120) NOT NULL,
  `mid_data_up` date NOT NULL,
  `mid_email_user` varchar(100) NOT NULL,
  PRIMARY KEY (`mid_id`),
  KEY `imo_id` (`imo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Extraindo dados da tabela `midias`
--

INSERT INTO `midias` (`mid_id`, `imo_id`, `mid_tipo`, `mid_titulo`, `mid_caminho`, `mid_data_up`, `mid_email_user`) VALUES
(7, 7, 'Escritura', 'escritura-mansao', '../documentos/escrituras/escritura-mansao.jpg', '2022-06-07', 'yan.pablo205@gmail.com'),
(26, 7, 'Panta-Baixa', 'planta-mansao', '../documentos/planta-baixa/planta-mansao.webp', '2022-06-08', 'yan.dasilva@hotmail.com'),
(31, 7, 'Comprovante de LocaÃ§Ã£o', 'comploc-mansao', '../documentos/comprovante/comploc-mansao.jpg', '2022-06-08', 'yan.pablo205@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
