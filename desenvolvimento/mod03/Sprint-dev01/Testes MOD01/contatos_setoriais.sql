-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jun-2022 às 22:32
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `omnimed_mod01`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos_setoriais`
--

CREATE TABLE `contatos_setoriais` (
  `CSE_ID` int(11) NOT NULL,
  `CSE_SETOR` varchar(200) DEFAULT NULL,
  `CSE_TELEFONE_FIXO` varchar(20) DEFAULT NULL,
  `CSE_EMAIL` varchar(200) NOT NULL,
  `CSE_TELEFONE_CELULAR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contatos_setoriais`
--

INSERT INTO `contatos_setoriais` (`CSE_ID`, `CSE_SETOR`, `CSE_TELEFONE_FIXO`, `CSE_EMAIL`, `CSE_TELEFONE_CELULAR`) VALUES
(1, 'Administrativo', '36111136', 'administracao@unimed.com.br', '919198787'),
(2, 'Financeiro', '36441123', 'financeiro@unimed.com.br', '9423564320'),
(3, 'Diretoria', '33745910', 'diretoria@unimed.com.br', '910108282'),
(4, 'Limpeza', '32134567', 'limpeza@unimed.com.br', '912325476'),
(5, 'Enfermagem', '38745618', 'enfermagem@unimed.com.br', '987541235'),
(6, 'Médico', '975462019', 'medico@unimed.com.br', '900224567'),
(7, 'Tecnologia', '32998543', 'ti@unimed.com.br', '976420990'),
(8, 'Secretaria', '38643291', 'secretaria@unimed.com.br', '982125648'),
(10, 'Administração', '34561029', 'administracao@santacasa.com.br', '956271818'),
(11, 'Advocacia', '312345544', 'advocacia@santacasa.com.br', '910583526');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contatos_setoriais`
--
ALTER TABLE `contatos_setoriais`
  ADD PRIMARY KEY (`CSE_ID`),
  ADD UNIQUE KEY `CSE_SETOR` (`CSE_SETOR`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contatos_setoriais`
--
ALTER TABLE `contatos_setoriais`
  MODIFY `CSE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
