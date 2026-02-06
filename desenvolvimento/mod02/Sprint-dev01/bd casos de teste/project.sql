-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2022 às 21:30
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `project`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `beneficios`
--

CREATE TABLE `beneficios` (
  `BNF_ID` int(11) NOT NULL,
  `BNF_DESCRICAO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dependentes`
--

CREATE TABLE `dependentes` (
  `DPN_ID` int(11) NOT NULL,
  `DPN_NOME` varchar(100) NOT NULL,
  `DPN_DATA_NASCIMENTO` date NOT NULL,
  `FK_PACIENTES_PAC_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidades_medicas`
--

CREATE TABLE `especialidades_medicas` (
  `ESM_DESCRICAO` varchar(200) NOT NULL,
  `ESM_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialistas`
--

CREATE TABLE `especialistas` (
  `FK_ESPECIALIDADES_MEDICAS_ESM_ID` int(11) DEFAULT NULL,
  `FK_MEDICOS_MED_ID` int(11) DEFAULT NULL,
  `ESP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exames`
--

CREATE TABLE `exames` (
  `EXM_NOME` varchar(100) NOT NULL,
  `EXM_ID` int(11) NOT NULL,
  `EXM_ANEXO_GUIA` blob NOT NULL,
  `EXM_OBS_SECRETARIO` varchar(200) DEFAULT NULL,
  `EXM_AGENDAMENTO` datetime DEFAULT NULL,
  `EXM_AUTORIZADO` tinyint(1) DEFAULT NULL,
  `EXM_ANEXO_RESULTADO` blob DEFAULT NULL,
  `EXM_OBS_PACIENTE` varchar(200) DEFAULT NULL,
  `FK_MEDICOS_MED_ID` int(11) DEFAULT NULL,
  `FK_PACIENTES_PAC_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `finalidade_remedios`
--

CREATE TABLE `finalidade_remedios` (
  `FIN_DESCRICAO` varchar(100) NOT NULL,
  `FIN_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `finalidade_remedios`
--

INSERT INTO `finalidade_remedios` (`FIN_DESCRICAO`, `FIN_ID`) VALUES
('Amenisa dores', 5),
('Amenisa dores musculares', 4),
('Antibiótico', 2),
('Antigripal', 3),
('Dor de cabeça', 1);

-- --------------------------------------------------------
INSERT INTO `especialidades_medicas` (`ESM_DESCRICAO`, `ESM_ID`) VALUES
('Anestesiologia', 4),
('Cirurgia cardiovascular', 5),
('Clínico Geral', 1),
('Oftalmologista', 2),
('Patologia', 7),
('Pediatria', 6);
--
-- Estrutura da tabela `formas_farmaceuticas`
--

CREATE TABLE `formas_farmaceuticas` (
  `FRM_ID` int(11) NOT NULL,
  `FRM_DESCRICAO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `formas_farmaceuticas`
--

INSERT INTO `formas_farmaceuticas` (`FRM_ID`, `FRM_DESCRICAO`) VALUES
(1, 'Adesivo Transdérmico'),
(2, 'Aerosol'),
(3, 'Aerosol Bucal'),
(4, 'Aerosol Nasal'),
(5, 'Aerosol Oral'),
(6, 'Cápsula'),
(7, 'Cápsula De Liberação Controlada'),
(8, 'Cápsula De Liberação Prolongada'),
(9, 'Cápsula Dura; Comrpimido; Comprimido Revestido'),
(10, 'Cápsula Gelatinosa'),
(11, 'Cápsula Gelatinosa Dura'),
(12, 'Cápsula Gelatinosa Dura Entérica'),
(13, 'Cápsula Gelatinosa Dura; Drágea; Comprimido'),
(14, 'Cápsula Gelatinosa Mole'),
(15, 'Cápsula Gelatinosa Mole; Comprimido Revestido De Liberação Prolongada'),
(16, 'Cápsula Inalante'),
(17, 'Cápsula Inalante; Aerosol Bucal'),
(18, 'Cápsula Para Inalação'),
(19, 'Cápsula; Comprimido'),
(20, 'Colutório'),
(21, 'Comprimido'),
(22, 'Comprimido ; Cápsula'),
(23, 'Comprimido Desintegração Lenta'),
(24, 'Comprimido Dispersível'),
(25, 'Comprimido Liberação Controlada'),
(26, 'Comprimido Liberação Lenta'),
(27, 'Comprimido Liberação Prolongada'),
(28, 'Comprimido Mastigável'),
(29, 'Comprimido Revestido'),
(30, 'Comprimido Sublinga'),
(31, 'Creme'),
(32, 'Creme Vaginal'),
(33, 'Drágea'),
(34, 'Elixir'),
(35, 'Emulasão ; Solução Oral'),
(36, 'Emulsão'),
(37, 'Enema'),
(38, 'Envelope (Pó)'),
(39, 'Frasco'),
(40, 'Frasco-Ampola'),
(41, 'Gel'),
(42, 'Gel Oral'),
(43, 'Gel Vaginal'),
(44, 'Geléia'),
(45, 'Goma De Mascar Ou Pastilha'),
(46, 'Injeção Intravitrea'),
(47, 'Injetável'),
(48, 'Loção'),
(49, 'Ovulo'),
(50, 'Pastilha'),
(51, 'Pó'),
(52, 'Pó Efervescente'),
(53, 'Pó Inalante'),
(54, 'Pó Liofilizado'),
(55, 'Pó Liofilizado Injetável'),
(56, 'Pó Liofilizado Para Solução Injetável'),
(57, 'Pó Ou Cápsula Inalante'),
(58, 'Pó Para Inalação Oral'),
(59, 'Pó Para Solução Injetável'),
(60, 'Pó Para Solução Injetável Intra Muscular'),
(61, 'Pó Para Solução Injetável Intravenoso'),
(62, 'Pó Para Solução Oral'),
(63, 'Pó Para Suspensão Injetável'),
(64, 'Pó Para Suspensão Oral'),
(65, 'Pó Tamponado Para Suspensão Oral + Solução Oral'),
(66, 'Pomada'),
(67, 'Pomada Oftálmica'),
(68, 'Seringa'),
(69, 'Shampoo'),
(70, 'Solução Capilar'),
(71, 'Solução Concentrada Para Infusão Intravenosa'),
(72, 'Solução Injetável'),
(73, 'Solução Nasal'),
(74, 'Solução Oftálmica'),
(75, 'Solução Oral'),
(76, 'Solução Oral; Xarope'),
(77, 'Solução Para Inalação'),
(78, 'Solução Para Nebulização'),
(79, 'Spray Nasal'),
(80, 'Supositório'),
(81, 'Supositório Adulto'),
(82, 'Suspensão Injetavel'),
(83, 'Suspensão Nasal'),
(84, 'Suspensão Oftálmica'),
(85, 'Suspensão Oral'),
(86, 'Suspensão Tópica'),
(87, 'Tintura'),
(88, 'Tubete'),
(89, 'Xarope');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

CREATE TABLE `medicos` (
  `MED_ID` int(11) NOT NULL,
  `MED_NOME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `PAC_NOME` varchar(100) NOT NULL,
  `PAC_ID` int(11) NOT NULL,
  `PAC_STATUS` tinyint(1) NOT NULL,
  `FK_PLANOS_PLN_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `PAG_ID` int(11) NOT NULL,
  `PAG_VALOR_TOTAL` double(8,2) NOT NULL,
  `PAG_DATA_PAGAMENTO` date DEFAULT NULL,
  `PAG_VENCIMENTO` date NOT NULL,
  `FK_PACIENTES_PAC_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos_medicos`
--

CREATE TABLE `pagamentos_medicos` (
  `PGM_ID` int(11) NOT NULL,
  `PGM_DATA_PAGAMENTO_REALIZADO` date DEFAULT NULL,
  `PGM_DATA_DE_PAGAMENTO` date NOT NULL,
  `PGM_SALARIO` double(8,2) NOT NULL,
  `PGM_VALOR_COMISSAO` double(8,2) NOT NULL,
  `PGM_VALOR_TOTAL` double(8,2) NOT NULL,
  `FK_MEDICOS_MED_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `PLN_ID` int(11) NOT NULL,
  `PLN_INSTITUICAO` varchar(100) NOT NULL,
  `PLN_NOME` varchar(100) NOT NULL,
  `PLN_PRECO` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`PLN_ID`, `PLN_INSTITUICAO`, `PLN_NOME`, `PLN_PRECO`) VALUES
(1, 'Unimed', 'Plano Completo', 5000.00),
(2, 'Santa Casa', 'Plano Saúde S+', 3000.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos_beneficios`
--

CREATE TABLE `planos_beneficios` (
  `FK_BENEFICIOS_BNF_ID` int(11) DEFAULT NULL,
  `FK_PLANOS_PLN_ID` int(11) DEFAULT NULL,
  `PBN_ID` int(11) NOT NULL,
  `PBN_VALOR_BENEFICIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prescricoes`
--

CREATE TABLE `prescricoes` (
  `PRE_ID` int(11) NOT NULL,
  `FK_MEDICOS_MED_ID` int(11) DEFAULT NULL,
  `FK_PACIENTES_PAC_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `remedios`
--

CREATE TABLE `remedios` (
  `RMD_ID` int(11) NOT NULL,
  `RMD_NOME` varchar(100) NOT NULL,
  `RMD_VIA_DOSAGEM` int(11) DEFAULT NULL,
  `FK_FORMAS_FARMACEUTICAS_FRM_ID` int(11) DEFAULT NULL,
  `RMD_INDICACAO` varchar(500) DEFAULT NULL,
  `RMD_CONTRAINDICACAO` varchar(500) DEFAULT NULL,
  `RMD_DOSAGEM` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `remedio_prescricao`
--

CREATE TABLE `remedio_prescricao` (
  `FK_REMEDIOS_RMD_ID` int(11) DEFAULT NULL,
  `FK_PRESCRICOES_PRE_ID` int(11) DEFAULT NULL,
  `RMP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `uso_remedio`
--

CREATE TABLE `uso_remedio` (
  `FK_FINALIDADE_REMEDIOS_FIN_ID` int(11) DEFAULT NULL,
  `FK_REMEDIOS_RMD_ID` int(11) DEFAULT NULL,
  `URM_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `valores_dependentes`
--

CREATE TABLE `valores_dependentes` (
  `VDP_ID` int(11) NOT NULL,
  `VDP_VALOR` double(6,2) NOT NULL,
  `VDP_IDADE_MINIMA` int(11) NOT NULL,
  `VDP_IDADE_MAXIMA` int(11) NOT NULL,
  `FK_PLANOS_PLN_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `beneficios`
--
ALTER TABLE `beneficios`
  ADD PRIMARY KEY (`BNF_ID`),
  ADD UNIQUE KEY `BNF_DESCRICAO` (`BNF_DESCRICAO`);

--
-- Índices para tabela `dependentes`
--
ALTER TABLE `dependentes`
  ADD PRIMARY KEY (`DPN_ID`),
  ADD KEY `FK_DEPENDENTES_2` (`FK_PACIENTES_PAC_ID`);

--
-- Índices para tabela `especialidades_medicas`
--
ALTER TABLE `especialidades_medicas`
  ADD PRIMARY KEY (`ESM_ID`),
  ADD UNIQUE KEY `ESM_DESCRICAO` (`ESM_DESCRICAO`);

--
-- Índices para tabela `especialistas`
--
ALTER TABLE `especialistas`
  ADD PRIMARY KEY (`ESP_ID`),
  ADD KEY `FK_ESPECIALISTAS_2` (`FK_ESPECIALIDADES_MEDICAS_ESM_ID`),
  ADD KEY `FK_ESPECIALISTAS_3` (`FK_MEDICOS_MED_ID`);

--
-- Índices para tabela `exames`
--
ALTER TABLE `exames`
  ADD PRIMARY KEY (`EXM_ID`),
  ADD UNIQUE KEY `EXM_ANEXO_RESULTADO` (`EXM_ANEXO_RESULTADO`,`EXM_ANEXO_GUIA`) USING HASH,
  ADD KEY `FK_EXAMES_2` (`FK_MEDICOS_MED_ID`),
  ADD KEY `FK_EXAMES_3` (`FK_PACIENTES_PAC_ID`);

--
-- Índices para tabela `finalidade_remedios`
--
ALTER TABLE `finalidade_remedios`
  ADD PRIMARY KEY (`FIN_ID`),
  ADD UNIQUE KEY `FIN_DESCRICAO` (`FIN_DESCRICAO`);

--
-- Índices para tabela `formas_farmaceuticas`
--
ALTER TABLE `formas_farmaceuticas`
  ADD PRIMARY KEY (`FRM_ID`),
  ADD UNIQUE KEY `FRM_DESCRICAO` (`FRM_DESCRICAO`);

--
-- Índices para tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`MED_ID`);

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`PAC_ID`),
  ADD KEY `FK_PACIENTES_2` (`FK_PLANOS_PLN_ID`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`PAG_ID`),
  ADD KEY `FK_PAGAMENTOS_2` (`FK_PACIENTES_PAC_ID`);

--
-- Índices para tabela `pagamentos_medicos`
--
ALTER TABLE `pagamentos_medicos`
  ADD PRIMARY KEY (`PGM_ID`),
  ADD KEY `FK_PAGAMENTOS_MEDICOS_2` (`FK_MEDICOS_MED_ID`);

--
-- Índices para tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`PLN_ID`),
  ADD UNIQUE KEY `PLN_NOME` (`PLN_NOME`);

--
-- Índices para tabela `planos_beneficios`
--
ALTER TABLE `planos_beneficios`
  ADD PRIMARY KEY (`PBN_ID`),
  ADD KEY `FK_PLANOS_BENEFICIOS_2` (`FK_BENEFICIOS_BNF_ID`),
  ADD KEY `FK_PLANOS_BENEFICIOS_3` (`FK_PLANOS_PLN_ID`);

--
-- Índices para tabela `prescricoes`
--
ALTER TABLE `prescricoes`
  ADD PRIMARY KEY (`PRE_ID`),
  ADD KEY `FK_PRESCRICOES_2` (`FK_MEDICOS_MED_ID`),
  ADD KEY `FK_PRESCRICOES_3` (`FK_PACIENTES_PAC_ID`);

--
-- Índices para tabela `remedios`
--
ALTER TABLE `remedios`
  ADD PRIMARY KEY (`RMD_ID`),
  ADD KEY `FK_REMEDIOS_2` (`FK_FORMAS_FARMACEUTICAS_FRM_ID`);

--
-- Índices para tabela `remedio_prescricao`
--
ALTER TABLE `remedio_prescricao`
  ADD PRIMARY KEY (`RMP_ID`),
  ADD KEY `FK_REMEDIO_PRESCRICAO_2` (`FK_REMEDIOS_RMD_ID`),
  ADD KEY `FK_REMEDIO_PRESCRICAO_3` (`FK_PRESCRICOES_PRE_ID`);

--
-- Índices para tabela `uso_remedio`
--
ALTER TABLE `uso_remedio`
  ADD PRIMARY KEY (`URM_ID`),
  ADD KEY `FK_USO_REMEDIO_2` (`FK_FINALIDADE_REMEDIOS_FIN_ID`),
  ADD KEY `FK_USO_REMEDIO_3` (`FK_REMEDIOS_RMD_ID`);

--
-- Índices para tabela `valores_dependentes`
--
ALTER TABLE `valores_dependentes`
  ADD PRIMARY KEY (`VDP_ID`),
  ADD KEY `FK_VALORES_DEPENDENTES_2` (`FK_PLANOS_PLN_ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `beneficios`
--
ALTER TABLE `beneficios`
  MODIFY `BNF_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `dependentes`
--
ALTER TABLE `dependentes`
  MODIFY `DPN_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `especialidades_medicas`
--
ALTER TABLE `especialidades_medicas`
  MODIFY `ESM_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `especialistas`
--
ALTER TABLE `especialistas`
  MODIFY `ESP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `exames`
--
ALTER TABLE `exames`
  MODIFY `EXM_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `finalidade_remedios`
--
ALTER TABLE `finalidade_remedios`
  MODIFY `FIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `formas_farmaceuticas`
--
ALTER TABLE `formas_farmaceuticas`
  MODIFY `FRM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `MED_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `PAC_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `PAG_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamentos_medicos`
--
ALTER TABLE `pagamentos_medicos`
  MODIFY `PGM_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `PLN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `planos_beneficios`
--
ALTER TABLE `planos_beneficios`
  MODIFY `PBN_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `prescricoes`
--
ALTER TABLE `prescricoes`
  MODIFY `PRE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `remedios`
--
ALTER TABLE `remedios`
  MODIFY `RMD_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `remedio_prescricao`
--
ALTER TABLE `remedio_prescricao`
  MODIFY `RMP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `uso_remedio`
--
ALTER TABLE `uso_remedio`
  MODIFY `URM_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `valores_dependentes`
--
ALTER TABLE `valores_dependentes`
  MODIFY `VDP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dependentes`
--
ALTER TABLE `dependentes`
  ADD CONSTRAINT `FK_DEPENDENTES_2` FOREIGN KEY (`FK_PACIENTES_PAC_ID`) REFERENCES `pacientes` (`PAC_ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `especialistas`
--
ALTER TABLE `especialistas`
  ADD CONSTRAINT `FK_ESPECIALISTAS_2` FOREIGN KEY (`FK_ESPECIALIDADES_MEDICAS_ESM_ID`) REFERENCES `especialidades_medicas` (`ESM_ID`),
  ADD CONSTRAINT `FK_ESPECIALISTAS_3` FOREIGN KEY (`FK_MEDICOS_MED_ID`) REFERENCES `medicos` (`MED_ID`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `exames`
--
ALTER TABLE `exames`
  ADD CONSTRAINT `FK_EXAMES_2` FOREIGN KEY (`FK_MEDICOS_MED_ID`) REFERENCES `medicos` (`MED_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_EXAMES_3` FOREIGN KEY (`FK_PACIENTES_PAC_ID`) REFERENCES `pacientes` (`PAC_ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `FK_PACIENTES_2` FOREIGN KEY (`FK_PLANOS_PLN_ID`) REFERENCES `planos` (`PLN_ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `FK_PAGAMENTOS_2` FOREIGN KEY (`FK_PACIENTES_PAC_ID`) REFERENCES `pacientes` (`PAC_ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pagamentos_medicos`
--
ALTER TABLE `pagamentos_medicos`
  ADD CONSTRAINT `FK_PAGAMENTOS_MEDICOS_2` FOREIGN KEY (`FK_MEDICOS_MED_ID`) REFERENCES `medicos` (`MED_ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `planos_beneficios`
--
ALTER TABLE `planos_beneficios`
  ADD CONSTRAINT `FK_PLANOS_BENEFICIOS_2` FOREIGN KEY (`FK_BENEFICIOS_BNF_ID`) REFERENCES `beneficios` (`BNF_ID`),
  ADD CONSTRAINT `FK_PLANOS_BENEFICIOS_3` FOREIGN KEY (`FK_PLANOS_PLN_ID`) REFERENCES `planos` (`PLN_ID`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `prescricoes`
--
ALTER TABLE `prescricoes`
  ADD CONSTRAINT `FK_PRESCRICOES_2` FOREIGN KEY (`FK_MEDICOS_MED_ID`) REFERENCES `medicos` (`MED_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_PRESCRICOES_3` FOREIGN KEY (`FK_PACIENTES_PAC_ID`) REFERENCES `pacientes` (`PAC_ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `remedios`
--
ALTER TABLE `remedios`
  ADD CONSTRAINT `FK_REMEDIOS_2` FOREIGN KEY (`FK_FORMAS_FARMACEUTICAS_FRM_ID`) REFERENCES `formas_farmaceuticas` (`FRM_ID`);

--
-- Limitadores para a tabela `remedio_prescricao`
--
ALTER TABLE `remedio_prescricao`
  ADD CONSTRAINT `FK_REMEDIO_PRESCRICAO_2` FOREIGN KEY (`FK_REMEDIOS_RMD_ID`) REFERENCES `remedios` (`RMD_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_REMEDIO_PRESCRICAO_3` FOREIGN KEY (`FK_PRESCRICOES_PRE_ID`) REFERENCES `prescricoes` (`PRE_ID`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `uso_remedio`
--
ALTER TABLE `uso_remedio`
  ADD CONSTRAINT `FK_USO_REMEDIO_2` FOREIGN KEY (`FK_FINALIDADE_REMEDIOS_FIN_ID`) REFERENCES `finalidade_remedios` (`FIN_ID`),
  ADD CONSTRAINT `FK_USO_REMEDIO_3` FOREIGN KEY (`FK_REMEDIOS_RMD_ID`) REFERENCES `remedios` (`RMD_ID`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `valores_dependentes`
--
ALTER TABLE `valores_dependentes`
  ADD CONSTRAINT `FK_VALORES_DEPENDENTES_2` FOREIGN KEY (`FK_PLANOS_PLN_ID`) REFERENCES `planos` (`PLN_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
