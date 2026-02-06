-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jun-2022 às 23:31
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `omnimedmod1`
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
('SSP', 1, '18.171.205-2', '434.277.200-04', '1981-03-24', 'iLEsYpIwJW', 2, 'João Gustavo Martins', 3, 'Arapiraca', 'Nova Esperança', '394', 'Rodovia AL-115'),
(NULL, 3, '43.026.316-8', '307.242.171-42', '1978-03-05', '6k6744T5oh', 1, 'Josefa Vitória Lavínia Nunes', 4, 'Gurupi', 'Setor União III', '505', 'Rua 19'),
('SSP', 4, '48.425.399-2', '258.652.436-59', '1993-04-19', 'o6NsPpeONo', 1, 'Liz Mariana Moreira', 6, 'Colombo', 'Butiatumirim', '445', 'Rua Vereador Pio José Broto'),
('SSP', 5, '44.332.350-1', '198.887.742-39', '1948-03-25', 'bTEwpS7lJu', 2, 'Francisca Maria Caldeira', 8, 'Fortaleza', 'Novo Mondubim', '932', 'Rua 101'),
(NULL, 6, '41.260.160-6', '326.039.884-84', '1978-03-04', 'OhBerhyAM4', 2, 'Renan Heitor Enzo Silveira', 11, 'Aracruz', 'Barra do Sahy', '548', 'Rua Fundão'),
('SSP', 7, '10.480.537-7', '347.785.705-45', '1966-06-11', 'sIoMpHhH4R', 1, 'Teresa Isabella Fernanda Barbosa', 17, 'Ananindeua', 'Marituba', '633', 'Passagem São José');

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
  MODIFY `USC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
