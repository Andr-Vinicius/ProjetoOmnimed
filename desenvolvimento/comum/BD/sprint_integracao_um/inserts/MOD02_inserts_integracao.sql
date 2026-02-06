--USUÁRIO COMUM
INSERT INTO `usuario_comum` (`USC_NOME`, `USC_DATA_NASCIMENTO`, `USC_RG`, `USC_ORGAO_EMISSOR`, `USC_CPF`, `USC_SEXO`, `USC_LOGRADOURO`, `USC_NUMERO`, `USC_BAIRRO`, `USC_CIDADE`, `USC_ESTADO`, `USC_SENHA`) VALUES
('André da Silva', '1995-06-23', '471753695', 'SSP', '20397159838', 1, 'Ademar de Barros', '55', 'Centro', 'São João da Boa Vista', 15, '123456'),
('Marcos Junior', '2000-03-15', '405082186', 'SSP', '64217502818', 1, 'Rua Jadeildo Pereira da Silva', '120', 'Casa Grande', 'Diadema', 15, '123456'),
('Carlos Pereira', '1998-02-19', '489984411', 'SSP', '95094673831', 1, 'Ademar de Barros', '130', 'Centro', 'São João da Boa Vista', 1, '123456'),
('João Gustavo Martins', '1981-03-24', '18.171.205-2', 'SSP', '434.277.200-04', 2, 'Rodovia AL-115', '394', 'Nova Esperança', 'Arapiraca', 3, 'iLEsYpIwJW'),
('Josefa Vitória Lavínia Nunes', '1978-03-05', '43.026.316-8', 'SSP', '307.242.171-42', 1, 'Rua 19', '505', 'Setor União III', 'Gurupi', 4, '6k6744T5oh'),
('Liz Mariana Moreira', '1993-04-19', '48.425.399-2', 'SSP', '258.652.436-59', 1, 'Rua Vereador Pio José Broto', '445', 'Butiatumirim', 'Colombo', 6, 'o6NsPpeONo'),
('Francisca Maria Caldeira', '1948-03-25', '44.332.350-1', 'SSP', '198.887.742-39', 2, 'Rua 101', '932', 'Novo Mondubim', 'Fortaleza', 8, 'bTEwpS7lJu'),
('Renan Heitor Enzo Silveira', '1978-03-04', '41.260.160-6', 'SSP', '326.039.884-84', 2, 'Rua Fundão', '548', 'Barra do Sahy', 'Aracruz', 11, 'OhBerhyAM4'),
('Teresa Isabella Fernanda Barbosa', '1966-06-11', '10.480.537-7', 'SSP', '347.785.705-45', 1, 'Passagem São José', '633', 'Marituba', 'Ananindeua', 17, 'sIoMpHhH4R');

--ESPECIALIDADES MÉDICAS
INSERT INTO `especialidades_medicas` (`ESM_DESCRICAO`) VALUES
('Anestesiologia'),
('Cirurgia cardiovascular'),
('Clínico Geral'),
('Oftalmologista'),
('Patologia'),
('Pediatria');

--FORMAS FARMACEUTICAS
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

--FINALIDADE REMÉDIOS
INSERT INTO `finalidade_remedios` (`FIN_DESCRICAO`) VALUES
('Amenisa dores'),
('Amenisa dores musculares'),
('Antibiótico'),
('Antigripal'),
('Antialergico'),
('Antiinflamatório'),
('Dor de cabeça');

--BENEFÍCIOS
INSERT INTO `beneficios` (`BNF_DESCRICAO`) VALUES
('Quarto individual'),
('Enfermeiro particular'),
('Acompanhamento pós-operatório'),
('Desconto em medicamentos'),
('Reembolso por despesas médicas em locais não-credenciados'),
('Cobertura por todo o país');

--PLANOS
INSERT INTO `planos` (`PLN_INSTITUICAO`, `PLN_NOME`, `PLN_PRECO`) VALUES
('Unimed', 'Plano Completo', 5000.00),
('Unimed', 'Plano Basico', 2000.00),
('Unimed', 'Plano Gold', 7000.00),
('Unimed', 'Plano Silver', 6000.00),
('Santa Casa', 'Plano Saúde S+', 3000.00);

--PLANO BENEFÍCIOS
INSERT INTO `planos_beneficios` (`FK_BENEFICIOS_BNF_ID`, `FK_PLANOS_PLN_ID`, `PBN_VALOR_BENEFICIO`) VALUES
(1, 3, 100.00),
(1, 4, 100.00),
(2, 1, 75.50),
(4, 1, 50.00),
(4, 2, 50.00),
(4, 3, 50.00),
(6, 4, 200.00);

--VALORES DEPENDENTES
INSERT INTO `valores_dependentes` (`VPD_IDADE_MAXIMA`, `VPD_IDADE_MINIMA`, `VPD_VALOR`, `FK_PLANOS_PLN_ID`) VALUES
(60, 18, 1500.00, 1),
(80, 10, 800.00, 5),
(100, 1, 500.00, 4),
(100, 0, 450.00, 3);

--REMÉDIOS
INSERT INTO `remedios` (`RMD_NOME`,`RMD_VIA_DOSAGEM`,`RMD_INDICACAO`,`RMD_CONTRAINDICACAO`,`RMD_DOSAGEM`,`FK_FORMAS_FARMACEUTICAS_FRM_ID`) VALUES
('Paracetamol Gotas ', 1, 'Paracetamol é um analgésico e antipirético, sendo indicado para a alívio da dor de intensidade leve a moderada, incluindo dor de cabeça, enxaqueca, dor músculo esquelética, cólicas menstruais, dor de garganta, dor de dente, dor pós-procedimentos odontológicos, dor e febre após vacinação, e dor de osteoartrite.', 'Não deve ser usado em caso de hipersensibilidade ao paracetamol ou a qualquer outro componente da fórmula. Contra indicado para menores de 12 anos. Não deve ser utilizado em pacientes com doença no fígado ou rins. Categoria B: Não deve ser utilizado por mulheres grávidas sem orientação médica ou do cirurgião dentista. É aconselhável cuidado na administração em pacientes com função hepática comprometida incluindo aqueles com doença hepática alcoólica não cirrótica.', 35, 75),
('Dipirona Monoidratada', 1, 'A dipirona é um anti-inflamatório não-esteroidal com ação analgésica e antitérmica. Ela é indicada para agir contra febre, dor de cabeça, dor muscular e cólicas. Essa droga integra o grupo dos medicamentos isentos de prescrição (MIPs).', 'Dipirona sódica está contra-indicada a pacientes que apresentam hipersensibilidade aos medicamentos que contenham dipirona sódica, propifenazona, fenazona, fenilbutazona, oxifembutazona ou aos demais componentes da formulação, em casos de porfiria hepática aguda Intermitente, deficiência congenita de glicose-6-fosfato desidrogenase, asma analgésica ou Intolerancia analgésica, em crianças menores de 3 meses de idade ou pesando menos de 5 kg e nos três primeiros e três ultimos meses de gravidez. A lactação deve ser evitada durante e até 48 horas após o uso de dipirona sódica. Informe seu médico sobre qualquer medicamento que esteja usando, antes do início ou durante o tratamento. Informe também, caso você tenha asma ou outros problemas respiratórios. Durante o tratamento com dipirona sódica pode se observar uma coloração avermelhada na urina que desaparece com a descontinuação do tratamento, devido à excreção do ácido rubazónico. Não deve ser administrado em crianças menores de 3 meses de idade ou pesando menos de 5 kg. E recomendada supervisão médica quando se administra a crianças com mais de 3 meses e crianças pequenas.', 500, 19),
('Paracetamol', 1, 'Paracetamol é um analgésico e antipirético, sendo indicado para a alívio da dor de intensidade leve a moderada, incluindo dor de cabeça, enxaqueca, dor músculo esquelética, cólicas menstruais, dor de garganta, dor de dente, dor pós-procedimentos odontológicos, dor e febre após vacinação, e dor de osteoartrite', 'Não deve ser usado em caso de hipersensibilidade ao paracetamol ou a qualquer outro componente da fórmula. Contra indicado para menores de 12 anos. Não deve ser utilizado em pacientes com doença no fígado ou rins. Categoria B: Não deve ser utilizado por mulheres grávidas sem orientação médica ou do cirurgião dentista. É aconselhável cuidado na administração em pacientes com função hepática comprometida incluindo aqueles com doença hepática alcoólica não cirrótica.', 750, 19);

--USO REMÉDIOS
INSERT INTO `uso_remedio` (`FK_FINALIDADE_REMEDIOS_FIN_ID`, `FK_REMEDIOS_RMD_ID`) VALUES
(1, 2),
(2, 3),
(4, 1);

--FUNCIONÁRIOS
INSERT INTO `funcionarios` (`FUN_PRONTUARIO`, `FK_USUARIO_COMUM_USC_ID`) VALUES
('20222123', 1),
('20222321', 2);

--MÉDICOS
INSERT INTO `medicos` (`MED_ID`, `FK_FUNCIONARIOS_FUN_ID`, `FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`) VALUES
(2, 1, 1),
(3, 2, 2);

--ESPECIALISTAS
INSERT INTO `especialistas` (`FK_MEDICOS_MED_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`, `FK_ESPECIALIDADES_MEDICAS_ESM_ID`) VALUES
(2, 1, 1, 3),
(3, 2, 2, 2);

--PACIENTES
INSERT INTO `pacientes` (`PAC_EMAIL`, `PAC_STATUS`, `FK_USUARIO_COMUM_USC_ID`, `FK_PLANOS_PLN_ID`) VALUES
('marcos@email.com', 1, 2, 5),
('fernandafernandaaparicio@dkcarmo.com', 1, 7, 1),
('breno-teixeira81@cursomarcato.com.br', 2, 11, 3),
('renata_moura@gruppoitalia.com.br', 1, 12, 4);

--PRESCRIÇÕES
INSERT INTO `prescricoes` (`PRC_DURACAO_TRATAMENTO`, `PRC_OBSERVACOES`, `PRC_ASSINATURA_MEDICO`, `PRC_DATA_EMISSAO`, `FK_CONSULTAS_ONLINE_CNS_ID`, `FK_MEDICOS_MED_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`) VALUES
('30 dias', 'Tomar pós almoço', NULL, '2022-06-20', 1, 3, 1, 1),
('15 dias', 'Toma pela manhã e a noite', NULL, '2022-06-20', 1, 3, 1, 1);

--REMÉDIOS PRESCRIÇÕES
INSERT INTO `remedios_prescricoes` (`FK_PRESCRICOES_PRC_ID`, `FK_REMEDIOS_RMD_ID`, `RMP_ESQUEMA_POSOLOGICO`) VALUES
(1, 1, '20 gotas de 8 em 8 horas '),
(1, 2, '1 comprimido por dia'),
(1, 3, '2 comprimidos de 12 em 12 horas');

--EXAMES
INSERT INTO `exames` (`EXM_NOME`, `EXM_ANEXO_GUIA`, `EXM_OBS_SECRETARIO`, `EXM_AGENDAMENTO`, `EXM_AUTORIZADO`, `EXM_ANEXO_RESULTADO`, `EXM_OBS_PACIENTE`, `FK_MEDICOS_MED_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`, `FK_PACIENTES_PAC_ID`, `FK_PACIENTES_FK_USUARIO_COMUM_USC_ID`) VALUES
('Exame de sangue', NULL, 'Em jejum', '2022-06-23 15:42:20', 2, NULL, NULL, 2, 1, 1, 1, 3),
('Ultrassom', NULL, NULL, '2022-06-21 15:43:22', 2, NULL, NULL, 3, 2, 2, 1, 3);

--PAGAMENTOS
INSERT INTO `pagamentos` (`PGD_VENCIMENTO`, `PGD_DATA_PAGAMENTO`, `PGD_VALOR_TOTAL`, `FK_PACIENTES_PAC_ID`, `FK_PACIENTES_FK_USUARIO_COMUM_USC_ID`) VALUES
('2022-06-30', '2022-06-23', 3000.00, 6, 7),
('2022-05-13', '2022-05-10', 580.00, 1, 2),
('2022-06-30', '2022-06-29', 750.00, 8, 12),
('2022-03-31', '2022-04-01', 1000.00, 7, 11);

--PAGAMENTOS MEDICOS
INSERT INTO `pagamentos_medicos` (`PGM_DATA_PAGAMENTO_REALIZADO`, `PGM_DATA_DE_PAGAMENTO`, `PGM_SALARIO`, `PGM_VALOR_COMISSAO`, `PGM_VALOR_TOTAL`, `FK_MEDICOS_MED_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID`, `FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`) VALUES
('2022-06-01', '2022-06-01', 5500.00, 1500.00, 7000.00, 1, 1, 1),
('2022-05-01', '2022-05-01', 3000.00, 500.00, 3500.00, 1, 1, 1),
('2022-03-02', '2022-03-01', 5500.00, 1000.00, 6500.00, 2, 2, 2);

