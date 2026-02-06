#USUÁRIO COMUM
INSERT INTO `usuario_comum` (`USC_NOME`, `USC_DATA_NASCIMENTO`, `USC_RG`, `USC_ORGAO_EMISSOR`, `USC_CPF`, `USC_SEXO`, `USC_LOGRADOURO`, `USC_NUMERO`, `USC_BAIRRO`, `USC_CIDADE`, `USC_ESTADO`, `USC_SENHA`) VALUES
('André da Silva',
('Marcos Junior',
('Carlos Pereira',
('João Gustavo Martins',
('Josefa Vitória Lavínia Nunes',
('Liz Mariana Moreira',
('Francisca Maria Caldeira',
('Renan Heitor Enzo Silveira',
('Teresa Isabella Fernanda Barbosa',

INSERT INTO `usuario_comum` (`USC_SEXO`, `USC_CIDADE`, `USC_BAIRRO`, `USC_DATA_NASCIMENTO`, `USC_ESTADO`, `USC_SENHA`, `USC_ORGAO_EMISSOR`, `USC_CPF`, `USC_ID`, `USC_NOME`, `USC_RG`, `USC_LOGRADOURO`, `USC_NUMERO`) VALUES
(1, 'São João da Boa Vista', 'Centro', '1995-06-23', 15, '123456', 'SSP', '20397159838', 1, 'André da Silva', '471753695', 'Ademar de Barros', '55'),
(1, 'Diadema', 'Casa Grande', '2000-03-15', 15, '123456', 'SSP', '64217502818', 2, 'Marcos Junior', '405082186', 'Rua Jadeildo Pereira da Silva', '120'),
(1, 'São João da Boa Vista', 'Centro', '1998-02-19', 1, '123456', 'SSP', '95094673831', 3, 'Carlos Pereira', '489984411', 'Ademar de Barros', '130'),
(2, 'Arapiraca', 'Nova Esperança', '1981-03-24', 3, 'iLEsYpIwJW', 'SSP', '434.277.200-04', 7, 'João Gustavo Martins', '18.171.205-2', 'Rodovia AL-115', '394'),
(1, 'Gurupi', 'Setor União III', '1978-03-05', 4, '6k6744T5oh', NULL, '307.242.171-42', 8, 'Josefa Vitória Lavínia Nunes', '43.026.316-8', 'Rua 19', '505'),
(1, 'Colombo', 'Butiatumirim', '1993-04-19', 6, 'o6NsPpeONo', 'SSP', '258.652.436-59', 9, 'Liz Mariana Moreira', '48.425.399-2', 'Rua Vereador Pio José Broto', '445'),
(2, 'Fortaleza', 'Novo Mondubim', '1948-03-25', 8, 'bTEwpS7lJu', 'SSP', '198.887.742-39', 10, 'Francisca Maria Caldeira', '44.332.350-1', 'Rua 101', '932'),
(2, 'Aracruz', 'Barra do Sahy', '1978-03-04', 11, 'OhBerhyAM4', NULL, '326.039.884-84', 11, 'Renan Heitor Enzo Silveira', '41.260.160-6', 'Rua Fundão', '548'),
(1, 'Ananindeua', 'Marituba', '1966-06-11', 17, 'sIoMpHhH4R', 'SSP', '347.785.705-45', 12, 'Teresa Isabella Fernanda Barbosa', '10.480.537-7', 'Passagem São José', '633');

INSERT INTO `usuario_comum` (`USC_ORGAO_EMISSOR`, `USC_ID`, `USC_RG`, `USC_CPF`, `USC_DATA_NASCIMENTO`, `USC_SENHA`, `USC_SEXO`, `USC_NOME`, `USC_ESTADO`, `USC_CIDADE`, `USC_BAIRRO`, `USC_NUMERO`, `USC_LOGRADOURO`) VALUES
('SSP', 1, '677632114', '28369586856', '2001-12-17', 'Enfermeira@2020', 2, 'Melissa Akatuka de Oliveira', 25, 'São Paulo', 'Santa Efigênia', '353', 'Rua dos Gusmões'),
('SSP', 2, '28272287935', '15201152366', '1994-07-02', 'Enfermeira!1994', 2, 'Miriam Oliveira', 16, 'Curitiba', 'Sítio Cercado', '200', 'Rua Jussara'),
('SSP', 3, '908908765', '23879876575', '1996-07-03', '1cB8O7iGXP', 1, 'Gustavo Rodrigues Matos', 25, 'Boa Vista', 'Cauamé', '788', 'Rua França'),
('SSP', 4, '999999999', '99999999999', '2000-07-16', 'Oqw9PT!UBiw.Nes2', 1, 'Carlos Eduardo Sampaio', 25, 'São Paulo', 'Centro', '67', 'R. Dr. Teófilo Ribeiro de Andrade');

INSERT INTO `usuario_comum` (`USC_ORGAO_EMISSOR`, `USC_ID`, `USC_RG`, `USC_CPF`, `USC_DATA_NASCIMENTO`, `USC_SENHA`, `USC_SEXO`, `USC_NOME`, `USC_ESTADO`, `USC_CIDADE`, `USC_BAIRRO`, `USC_NUMERO`, `USC_LOGRADOURO`) VALUES
('SSP', 1, '18.171.205-2', '434.277.200-04', '1981-03-24', 'iLEsYpIwJW', 2, 'João Gustavo Martins', 3, 'Arapiraca', 'Nova Esperança', '394', 'Rodovia AL-115'),
(NULL, 3, '43.026.316-8', '307.242.171-42', '1978-03-05', '6k6744T5oh', 1, 'Josefa Vitória Lavínia Nunes', 4, 'Gurupi', 'Setor União III', '505', 'Rua 19'),
('SSP', 4, '48.425.399-2', '258.652.436-59', '1993-04-19', 'o6NsPpeONo', 1, 'Liz Mariana Moreira', 6, 'Colombo', 'Butiatumirim', '445', 'Rua Vereador Pio José Broto'),
('SSP', 5, '44.332.350-1', '198.887.742-39', '1948-03-25', 'bTEwpS7lJu', 2, 'Francisca Maria Caldeira', 8, 'Fortaleza', 'Novo Mondubim', '932', 'Rua 101'),
(NULL, 6, '41.260.160-6', '326.039.884-84', '1978-03-04', 'OhBerhyAM4', 2, 'Renan Heitor Enzo Silveira', 11, 'Aracruz', 'Barra do Sahy', '548', 'Rua Fundão'),
('SSP', 7, '10.480.537-7', '347.785.705-45', '1966-06-11', 'sIoMpHhH4R', 1, 'Teresa Isabella Fernanda Barbosa', 17, 'Ananindeua', 'Marituba', '633', 'Passagem São José');






INSERT INTO `pacientes` (`PAC_ID`, `PAC_NOME_COMPLETO`) VALUES 
(2, 'Jose Batista Andrade de Pinheiro');

INSERT INTO `tipos_especialidades_medicas` (`TEM_ID`, `TEM_NOME_ESPECIALIDADE`) VALUES 
(1, 'Clínico Geral');

INSERT INTO `agendamentos` (`AGD_ID`, `AGD_STATUS`, `AGD_ENCAMINHAMENTOS`, `AGD_DATA`, `AGD_HORARIO`, `AGD_MEET_LINK`, `FK_PACIENTES_PAC_ID`, `FK_TIPOS_ESPECIALIDADES_MEDICAS_TEM_ID`, `FK_MEDICOS_MED_ID`, `AGD_TRIAGEM_REALIZADA`, `AGD_RETORNO`) VALUES 
(NULL, '1', '0', '2022-07-15', NULL, NULL, '1', '1', '1', '0', '0');

INSERT INTO `consultas_online` (`CNS_ID`, `CNS_DATA`, `CNS_ANOTACOES`, `CNS_SINTOMAS_IDENTIFICADOS`, `CNS_DIAGNOSTICO`, `FK_AGENDAMENTOS_AGD_ID`, `FK_MEDICOS_MED_ID`, `FK_PACIENTES_PAC_ID`) VALUES 
(NULL, '2022-07-15', NULL, 'N/a', 'N/a', '1', '1', '1');

INSERT INTO `tipos_especialidades_medicas` (`TEM_ID`, `TEM_NOME_ESPECIALIDADE`) VALUES 
(2, 'Ginecologista'), 
(3, 'Pediatra');

INSERT INTO `pacientes` (`PAC_ID`, `PAC_NOME_COMPLETO`) VALUES 
(2, 'Jose Maria Marcos Antonio');

INSERT INTO `pacientes` (`PAC_ID`, `PAC_NOME_COMPLETO`) VALUES 
(3, 'Maria Jose Marcos Antonio');

INSERT INTO `pacientes` (`PAC_ID`, `PAC_NOME_COMPLETO`) VALUES 
(4, 'Edmundo Matias Evaristo');

INSERT INTO `agendamentos` (`AGD_ID`, `AGD_STATUS`, `AGD_ENCAMINHAMENTOS`, `AGD_DATA`, `AGD_HORARIO`, `AGD_MEET_LINK`, `FK_PACIENTES_PAC_ID`, `FK_TIPOS_ESPECIALIDADES_MEDICAS_TEM_ID`, `FK_MEDICOS_MED_ID`, `AGD_TRIAGEM_REALIZADA`, `AGD_RETORNO`) VALUES 
(NULL, '0', '0', '2022-07-18', NULL, NULL, '2', '1', '1', '0', '0');

INSERT INTO `agendamentos` (`AGD_ID`, `AGD_STATUS`, `AGD_ENCAMINHAMENTOS`, `AGD_DATA`, `AGD_HORARIO`, `AGD_MEET_LINK`, `FK_PACIENTES_PAC_ID`, `FK_TIPOS_ESPECIALIDADES_MEDICAS_TEM_ID`, `FK_MEDICOS_MED_ID`, `AGD_TRIAGEM_REALIZADA`, `AGD_RETORNO`) VALUES 
(NULL, '1', '0', '2022-07-19', NULL, NULL, '3', '2', '1', '0', '0');

INSERT INTO `agendamentos` (`AGD_ID`, `AGD_STATUS`, `AGD_ENCAMINHAMENTOS`, `AGD_DATA`, `AGD_HORARIO`, `AGD_MEET_LINK`, `FK_PACIENTES_PAC_ID`, `FK_TIPOS_ESPECIALIDADES_MEDICAS_TEM_ID`, `FK_MEDICOS_MED_ID`, `AGD_TRIAGEM_REALIZADA`, `AGD_RETORNO`) VALUES 
(NULL, '1', '0', '2022-07-20', NULL, NULL, '4', '3', '1', '0', '0');

INSERT INTO `medicos` (`MED_ID`,`FK_FUNCIONARIOS_FUN_ID`,`FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`) VALUES
(1,1,2);

INSERT INTO `especialidades_medicas` (`ESM_ID`,`ESM_DESCRICAO`) VALUES
(1,'CLÍNICO GERAL');

INSERT INTO `agendamentos` (`AGD_ID`,`AGD_STATUS`,`AGD_ENCAMINHAMENTOS`,`AGD_DATA`,`AGD_HORARIO`,`AGD_MEET_LINK`,`FK_PACIENTES_PAC_ID`,`FK_PACIENTES_FK_USUARIO_COMUM_USC_ID`,`FK_MEDICOS_MED_ID`,`FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID`,`FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`,`FK_ESPECIALIDADES_MEDICAS_ESM_ID`) VALUES
(1,2,0,'2022-06-13','09:00:00','meet.google.com/ciz-jmfz-bzv',1,1,1,1,2,1);

INSERT INTO `consultas_online` (`CNS_ID`,`CNS_DATA`,`CNS_ANOTACOES`,`CNS_SINTOMAS_IDENTIFICADOS`,`CNS_DIAGNOSTICO`,`FK_AGENDAMENTOS_AGD_ID`) VALUES
(1,'2022-06-13','Baixa prioridade','Dor de cabeça, febre e coriza','Resfriado',1);

INSERT INTO `prescricoes` (`PRC_ID`,`PRC_DURACAO_TRATAMENTO`,`PRC_OBSERVACOES`,`PRC_ASSINATURA_MEDICO`,`PRC_DATA_EMISSAO`,`FK_CONSULTAS_ONLINE_CNS_ID`,`FK_MEDICOS_MED_ID`,`FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID`,`FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`) VALUES
(1,'1 semana','Não tomar sob suspeitas de dengue','data:image/png;base64,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','2022-06-13',1,1,1,2);

INSERT INTO `formas_farmaceuticas` (`FRM_ID`,`FRM_DESCRICAO`) VALUES
(1,'SÓLIDA');

INSERT INTO `finalidade_remedios` (`FIN_ID`, `FIN_DESCRICAO`) VALUES
(1,'Diminuir os sintomas');

INSERT INTO `remedios` (`RMD_ID`,`RMD_NOME`,`RMD_VIA_DOSAGEM`,`RMD_INDICACAO`,`RMD_CONTRAINDICACAO`,`RMD_DOSAGEM`,`FK_FORMAS_FARMACEUTICAS_FRM_ID`) VALUES
(1,'Paracetamol',1,'Febre, dores no corpo e dores de cabeça','Não recomendável em casos de suspeita de dengue',2,1);

INSERT INTO `remedios_prescricoes` (`FK_PRESCRICOES_PRC_ID`,`FK_REMEDIOS_RMD_ID`,`RMP_ID`,`RMP_ESQUEMA_POSOLOGICO`) VALUES
(1,1,1,'1 comprimido a cada 8 horas');

INSERT INTO `uso_remedio` (`FK_FINALIDADE_REMEDIOS_FIN_ID`,`FK_REMEDIOS_RMD_ID`) VALUES
(1,1);

INSERT INTO `finalidade_remedios` (`FIN_DESCRICAO`) VALUES
('Amenisa dores'),
('Amenisa dores musculares'),
('Antibiótico'),
('Antigripal'),
('Antialergico'),
('Antiinflamatório'),
('Dor de cabeça');

INSERT INTO `planos` (`PLN_INSTITUICAO`, `PLN_NOME`, `PLN_PRECO`) VALUES
('Unimed', 'Plano Completo', 5000.00),
('Unimed', 'Plano Basico', 2000.00),
('Unimed', 'Plano Gold', 7000.00),
('Unimed', 'Plano Silver', 6000.00),
('Santa Casa', 'Plano Saúde S+', 3000.00);

INSERT INTO formas_farmaceuticas ( FRM_DESCRICAO) VALUES
( "Adesivo Transdérmico" ),
( "Aerosol" ),
( "Aerosol Bucal" ),
( "Aerosol Nasal" ),
( "Aerosol Oral" ),
( "Cápsula" ),
( "Cápsula De Liberação Controlada" ),
( "Cápsula De Liberação Prolongada" ),
( "Cápsula Dura; Comrpimido; Comprimido Revestido" ),
( "Cápsula Gelatinosa" ),
( "Cápsula Gelatinosa Dura" ),
( "Cápsula Gelatinosa Dura Entérica" ),
( "Cápsula Gelatinosa Dura; Drágea; Comprimido" ),
( "Cápsula Gelatinosa Mole" ),
( "Cápsula Gelatinosa Mole; Comprimido Revestido De Liberação Prolongada" ),
( "Cápsula Inalante" ),
( "Cápsula Inalante; Aerosol Bucal" ),
( "Cápsula Para Inalação" ),
( "Cápsula; Comprimido" ),
( "Colutório" ),
( "Comprimido" ),
( "Comprimido ; Cápsula" ),
( "Comprimido Desintegração Lenta" ),
( "Comprimido Dispersível" ),
( "Comprimido Liberação Controlada" ),
( "Comprimido Liberação Lenta" ),
( "Comprimido Liberação Prolongada" ),
( "Comprimido Mastigável" ),
( "Comprimido Revestido" ),
( "Comprimido Sublinga" ),
( "Creme" ),
( "Creme Vaginal" ),
( "Drágea" ),
( "Elixir" ),
( "Emulasão ; Solução Oral" ),
( "Emulsão" ),
( "Enema" ),
( "Envelope (Pó)" ),
( "Frasco" ),
( "Frasco-Ampola" ),
( "Gel" ),
( "Gel Oral" ),
( "Gel Vaginal" ),
( "Geléia" ),
( "Goma De Mascar Ou Pastilha" ),
( "Injeção Intravitrea" ),
( "Injetável" ),
( "Loção" ),
( "Ovulo" ),
( "Pastilha" ),
( "Pó" ),
( "Pó Efervescente" ),
( "Pó Inalante" ),
( "Pó Liofilizado" ),
( "Pó Liofilizado Injetável" ),
( "Pó Liofilizado Para Solução Injetável" ),
( "Pó Ou Cápsula Inalante" ),
( "Pó Para Inalação Oral" ),
( "Pó Para Solução Injetável" ),
( "Pó Para Solução Injetável Intra Muscular" ),
( "Pó Para Solução Injetável Intravenoso" ),
( "Pó Para Solução Oral" ),
( "Pó Para Suspensão Injetável" ),
( "Pó Para Suspensão Oral" ),
( "Pó Tamponado Para Suspensão Oral + Solução Oral" ),
( "Pomada" ),
( "Pomada Oftálmica" ),
( "Seringa" ),
( "Shampoo" ),
( "Solução Capilar" ),
( "Solução Concentrada Para Infusão Intravenosa" ),
( "Solução Injetável" ),
( "Solução Nasal" ),
( "Solução Oftálmica" ),
( "Solução Oral" ),
( "Solução Oral; Xarope" ),
( "Solução Para Inalação" ),
( "Solução Para Nebulização" ),
( "Spray Nasal" ),
( "Supositório" ),
( "Supositório Adulto" ),
( "Suspensão Injetavel" ),
( "Suspensão Nasal" ),
( "Suspensão Oftálmica" ),
( "Suspensão Oral" ),
( "Suspensão Tópica" ),
( "Tintura" ),
( "Tubete" ),
( "Xarope" );

INSERT INTO `remedios` (`RMD_NOME`, `RMD_VIA_DOSAGEM`, `FK_FORMAS_FARMACEUTICAS_FRM_ID`, `RMD_INDICACAO`, `RMD_CONTRAINDICACAO`, `RMD_DOSAGEM`) VALUES
('Paracetamol Gotas ', 1, 75, 'Paracetamol é um analgésico e antipirético, sendo indicado para a alívio da dor de intensidade leve a moderada, incluindo dor de cabeça, enxaqueca, dor músculo esquelética, cólicas menstruais, dor de garganta, dor de dente, dor pós-procedimentos odontológicos, dor e febre após vacinação, e dor de osteoartrite.', 'Não deve ser usado em caso de hipersensibilidade ao paracetamol ou a qualquer outro componente da fórmula. Contra indicado para menores de 12 anos. Não deve ser utilizado em pacientes com doença no fígado ou rins. Categoria B: Não deve ser utilizado por mulheres grávidas sem orientação médica ou do cirurgião dentista. É aconselhável cuidado na administração em pacientes com função hepática comprometida incluindo aqueles com doença hepática alcoólica não cirrótica.', 35),
('Dipirona Monoidratada', 1, 19, 'A dipirona é um anti-inflamatório não-esteroidal com ação analgésica e antitérmica. Ela é indicada para agir contra febre, dor de cabeça, dor muscular e cólicas. Essa droga integra o grupo dos medicamentos isentos de prescrição (MIPs).', 'Dipirona sódica está contra-indicada a pacientes que apresentam hipersensibilidade aos medicamentos que contenham dipirona sódica, propifenazona, fenazona, fenilbutazona, oxifembutazona ou aos demais componentes da formulação, em casos de porfiria hepática aguda Intermitente, deficiência congenita de glicose-6-fosfato desidrogenase, asma analgésica ou Intolerancia analgésica, em crianças menores de 3 meses de idade ou pesando menos de 5 kg e nos três primeiros e três ultimos meses de gravidez. A lactação deve ser evitada durante e até 48 horas após o uso de dipirona sódica. Informe seu médico sobre qualquer medicamento que esteja usando, antes do início ou durante o tratamento. Informe também, caso você tenha asma ou outros problemas respiratórios. Durante o tratamento com dipirona sódica pode se observar uma coloração avermelhada na urina que desaparece com a descontinuação do tratamento, devido à excreção do ácido rubazónico. Não deve ser administrado em crianças menores de 3 meses de idade ou pesando menos de 5 kg. E recomendada supervisão médica quando se administra a crianças com mais de 3 meses e crianças pequenas.', 500),
('Paracetamol', 1, 19, 'Paracetamol é um analgésico e antipirético, sendo indicado para a alívio da dor de intensidade leve a moderada, incluindo dor de cabeça, enxaqueca, dor músculo esquelética, cólicas menstruais, dor de garganta, dor de dente, dor pós-procedimentos odontológicos, dor e febre após vacinação, e dor de osteoartrite', 'Não deve ser usado em caso de hipersensibilidade ao paracetamol ou a qualquer outro componente da fórmula. Contra indicado para menores de 12 anos. Não deve ser utilizado em pacientes com doença no fígado ou rins. Categoria B: Não deve ser utilizado por mulheres grávidas sem orientação médica ou do cirurgião dentista. É aconselhável cuidado na administração em pacientes com função hepática comprometida incluindo aqueles com doença hepática alcoólica não cirrótica.', 750);

INSERT INTO `beneficios` (`BNF_DESCRICAO`) VALUES
('Quarto individual'),
('Enfermeiro particular'),
('Acompanhamento pós-operatório'),
('Desconto em medicamentos'),
('Reembolso por despesas médicas em locais não-credenciados'),
('Cobertura por todo o país');

INSERT INTO `planos_beneficios` (`FK_BENEFICIOS_BNF_ID`, `FK_PLANOS_PLN_ID`, `PBN_VALOR_BENEFICIO`) VALUES
(1, 3, 100.00),
(1, 4, 100.00),
(2, 1, 75.50),
(4, 1, 50.00),
(4, 2, 50.00),
(4, 3, 50.00),
(6, 4, 200.00);

INSERT INTO `especialidades_medicas` (`ESM_DESCRICAO`) VALUES
('Anestesiologia'),
('Cirurgia cardiovascular'),
('Clínico Geral'),
('Oftalmologista'),
('Patologia'),
('Pediatria');

INSERT INTO `especialistas` (`FK_MEDICOS_MED_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`, `FK_ESPECIALIDADES_MEDICAS_ESM_ID`, `ESP_ID`) VALUES
(2, 1, 1, 3, 1),
(3, 1, 1, 2, 2);

INSERT INTO `exames` (`EXM_ID`, `EXM_NOME`, `EXM_ANEXO_GUIA`, `EXM_OBS_SECRETARIO`, `EXM_AGENDAMENTO`, `EXM_AUTORIZADO`, `EXM_ANEXO_RESULTADO`, `EXM_OBS_PACIENTE`, `FK_MEDICOS_MED_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`, `FK_PACIENTES_PAC_ID`, `FK_PACIENTES_FK_USUARIO_COMUM_USC_ID`) VALUES
(1, 'Exame de sangue', NULL, 'Em jejum', '2022-06-23 15:42:20', 2, NULL, NULL, 2, 1, 1, 6, 7),
(2, 'Ultrassom', NULL, NULL, '2022-06-21 15:43:22', 2, NULL, NULL, 3, 1, 1, 6, 7);

INSERT INTO `medicos` (`MED_ID`, `FK_FUNCIONARIOS_FUN_ID`, `FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`) VALUES
(2, 1, 1),
(3, 1, 1);

INSERT INTO `pacientes` (`PAC_ID`, `PAC_EMAIL`, `PAC_STATUS`, `FK_USUARIO_COMUM_USC_ID`, `FK_PLANOS_PLN_ID`) VALUES
(1, 'marcos@email.com', 1, 2, 5),
(6, 'fernandafernandaaparicio@dkcarmo.com', 1, 7, 1),
(7, 'breno-teixeira81@cursomarcato.com.br', 2, 11, 3),
(8, 'renata_moura@gruppoitalia.com.br', 1, 12, 4);

INSERT INTO `pagamentos` (`PGD_ID`, `PGD_VENCIMENTO`, `PGD_DATA_PAGAMENTO`, `PGD_VALOR_TOTAL`, `FK_PACIENTES_PAC_ID`, `FK_PACIENTES_FK_USUARIO_COMUM_USC_ID`) VALUES
(1, '2022-06-30', '2022-06-23', 3000.00, 6, 7),
(2, '2022-05-13', '2022-05-10', 580.00, 1, 2),
(3, '2022-06-30', '2022-06-29', 750.00, 8, 12),
(4, '2022-03-31', '2022-04-01', 1000.00, 7, 11);

INSERT INTO `pagamentos_medicos` (`PGM_ID`, `PGM_DATA_PAGAMENTO_REALIZADO`, `PGM_DATA_DE_PAGAMENTO`, `PGM_SALARIO`, `PGM_VALOR_COMISSAO`, `PGM_VALOR_TOTAL`, `FK_MEDICOS_MED_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`) VALUES
(1, '2022-06-01', '2022-06-01', 5500.00, 1500.00, 7000.00, 2, 1, 1),
(2, '2022-05-01', '2022-05-01', 3000.00, 500.00, 3500.00, 3, 1, 1),
(3, '2022-03-02', '2022-03-01', 5500.00, 1000.00, 6500.00, 2, 1, 1);

INSERT INTO `prescricoes` (`PRC_ID`, `PRC_DURACAO_TRATAMENTO`, `PRC_OBSERVACOES`, `PRC_ASSINATURA_MEDICO`, `PRC_DATA_EMISSAO`, `FK_CONSULTAS_ONLINE_CNS_ID`, `FK_MEDICOS_MED_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`) VALUES
(1, '30 dias', 'Tomar pós almoço', NULL, '2022-06-20', 1, 3, 1, 1),
(2, '15 dias', 'Toma pela manhã e a noite', NULL, '2022-06-20', 1, 3, 1, 1);

INSERT INTO `remedios_prescricoes` (`FK_PRESCRICOES_PRC_ID`, `FK_REMEDIOS_RMD_ID`, `RMP_ID`, `RMP_ESQUEMA_POSOLOGICO`) VALUES
(1, 1, 1, '20 gotas de 8 em 8 horas '),
(1, 2, 2, '1 comprimido por dia'),
(1, 3, 3, '2 comprimidos de 12 em 12 horas');

INSERT INTO `valores_dependentes` (`VPD_ID`, `VPD_IDADE_MAXIMA`, `VPD_IDADE_MINIMA`, `VPD_VALOR`, `FK_PLANOS_PLN_ID`) VALUES
(1, 60, 18, 1500.00, 1),
(2, 80, 10, 800.00, 5),
(3, 100, 1, 500.00, 4),
(4, 100, 0, 450.00, 3);

INSERT INTO `uso_remedio` (`FK_FINALIDADE_REMEDIOS_FIN_ID`, `FK_REMEDIOS_RMD_ID`) VALUES
(1, 2),
(2, 3),
(4, 1);


INSERT INTO `funcionarios` (`FUN_ID`, `FK_USUARIO_COMUM_USC_ID`, `FUN_PRONTUARIO`) VALUES
(1, 1, 'EN608617'),
(2, 2, 'ME272715'),
(3, 3, 'ME973872'),
(4, 4, 'ME126632');



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

INSERT INTO `funcionarios` (`FUN_ID`, `FK_USUARIO_COMUM_USC_ID`, `FUN_PRONTUARIO`) VALUES
(1, 1, '25679784'),
(2, 3, '70104142');

INSERT INTO `pacientes` (`PAC_ID`, `PAC_EMAIL`, `FK_USUARIO_COMUM_USC_ID`) VALUES
(1, 'isaac-damota84@petrobras.com.br', 4),
(2, 'fernandafernandaaparicio@dkcarmo.com', 5),
(3, 'breno-teixeira81@cursomarcato.com.br', 6),
(4, 'renata_moura@gruppoitalia.com.br', 7);


