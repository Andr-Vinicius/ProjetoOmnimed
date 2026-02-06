-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jul-2022 às 22:01
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `omnimed_teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_comum`
--

CREATE TABLE `usuario_comum` (
  `USC_ORGAO_EMISSOR` varchar(10) DEFAULT NULL,
  `USC_ID` int(11) NOT NULL,
  `USC_RG` varchar(15) NOT NULL,
  `USC_CPF` varchar(20) NOT NULL,
  `USC_DATA_NASCIMENTO` date NOT NULL,
  `USC_SENHA` varchar(200) NOT NULL,
  `USC_SEXO` int(11) NOT NULL,
  `USC_NOME` varchar(180) NOT NULL,
  `USC_ESTADO` int(11) NOT NULL,
  `USC_CIDADE` varchar(100) NOT NULL,
  `USC_BAIRRO` varchar(100) NOT NULL,
  `USC_NUMERO` varchar(10) NOT NULL,
  `USC_LOGRADOURO` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario_comum`
--

INSERT INTO `usuario_comum` (`USC_ORGAO_EMISSOR`, `USC_ID`, `USC_RG`, `USC_CPF`, `USC_DATA_NASCIMENTO`, `USC_SENHA`, `USC_SEXO`, `USC_NOME`, `USC_ESTADO`, `USC_CIDADE`, `USC_BAIRRO`, `USC_NUMERO`, `USC_LOGRADOURO`) VALUES
('SSP-SP', 1, '128127089', '28369586856', '2000-07-16', 'Enfermagem!2000', 1, 'Carlos Eduardo Sampaio', 20, 'São Paulo', 'Santa Efigênia', '353', 'Rua dos Gusmões'),
('SSP-SP', 2, '152011523', '28272287935', '1994-07-02', 'Enfermeira!1994', 2, 'Miriam Oliveira', 18, 'Curitiba', 'Sítio Cercado', '200', 'Rua Jussara'),
('SSP-SP', 3, '121167811', '23879876575', '1996-07-03', '1cB8O7iGXP', 1, 'Gustavo Rodrigues Matos', 21, 'Boa Vista', 'Cauamé', '788', 'Rua França'),
('SSP', 4, '999999999', '99999999999', '2001-12-17', 'Oqw9PT!UBiw.Nes2', 2, 'Melissa Akatuka de Oliveira', 20, 'São Paulo', 'Centro', '67', 'R. Dr. Teófilo Ribeiro de Andrade');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuario_comum`
--
ALTER TABLE `usuario_comum`
  ADD PRIMARY KEY (`USC_ID`),
  ADD UNIQUE KEY `USC_RG` (`USC_RG`,`USC_CPF`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario_comum`
--
ALTER TABLE `usuario_comum`
  MODIFY `USC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
