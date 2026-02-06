#RESPONSAVEIS
#tirar RES_ID?
INSERT INTO `responsaveis` (`RES_QTD_FILHOS`, `RES_QUAIS_TRAT_MED`, `RES_TEM_ALERGIA_MEDICA`, `RES_QUAL_MEDICACAO`, `RES_QUAIS_ALERGIAS`, `RES_TEL_CELULAR1`, `RES_UTILIZA_MEDICACAO`, `RES_TEL_CELULAR2`, `RES_ID`, `RES_TEM_FILHOS`, `RES_QUAIS_DOENCAS_CRONICAS`, `RES_DOENCAS_CRONICAS`, `RES_TRATAMENTO_MEDICO`, `FK_PACIENTES_PAC_ID`, `FK_PACIENTES_FK_USUARIO_COMUM_USC_ID`) VALUES 
('1', 'Contra Diabetes', '1', 'Biguanidas', 'Amoxilina', '1998765432', '1', '1991234567', NULL, '1', 'Diabetes', '1', '1', '1', '1'),
('2', 'Contra Cancer', '2', 'Quimioterapia', 'Leite e Queijo', '3598765432', '2', '3591234567', NULL, '1', 'Cancer', '2', '2', '2', '2'),
('3', 'Contra Obesidade', '3', 'Dieta', 'Poeira, Pelo e Cravo', '1198765432', '3', '1191234567', NULL, '3', 'Obesidade', '3', '3', '3', '3'),
('4', 'Contra Fibrose Cística', '4', 'Suplemento Alimentar, Antibiótico, Penicilina e Remédio para Tosse', 'Vermelhidão, Descamação, Irritação e Coceira Intensa.', '2198765432', '4', '2191234567', NULL, '4', 'Fibrose Cística', '4', '4', '4', '4'),
('5', 'Osteoporose', '5', 'Vitamina, Suplemento Alimentar e Saúde Óssea', 'Leite, Queijo, Manteiga, Requeijão e Creme', '4198765432', '5', '4191234567', NULL, '5', 'Contra Osteoporose', '5', '5', '5', '5');

#DEPENDENTES
INSERT INTO `dependentes`(`DEP_NV_PARENTESCO`, `DEP_NOME`, `DEP_DATA_NASCIMENTO`, `FK_PACIENTES_PAC_ID`, `FK_PACIENTES_FK_USUARIO_COMUM_USC_ID`, `FK_RESPONSAVEIS_RES_ID`, `FK_RESPONSAVEIS_FK_PACIENTES_PAC_ID`, `FK_RESPONSAVEIS_FK_PACIENTES_FK_USUARIO_COMUM_USC_ID`) VALUES 
('1','José','2000-10-20','1','1','1','1','1'),
('2','Maria','2000-11-21','2','2','2','2','2'),
('3','Victor','2010-12-22','3','3','3','3','3'),
('4','Letícia','2004-01-01','4','4','4','4','4'),
('5','Rafael','1998-02-10','5','5','5','5','5');

#ADMINISTRATIVO
INSERT INTO `administrativo`(`ADM_FUNCAO`, `ADM_DATA_DEMISSAO`, `ADM_DATA_ADMISSAO`, `ADM_CLINICA`, `ADM_SALARIO`, `ADM_CRM`, `ADM_TELEFONE_CELULAR`, `FK_FUNCIONARIOS_FUN_ID`, `FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID`) VALUES 
('1','2022-08-11','2021-08-11','1','11111','12345679','19987654322','1','2'),
('2','2021-07-10','2020-06-09','2','22222','98765432','19912345672','2','1'),
('3','2020-01-08','2019-01-08','3','33333','45367864','35956437212','6','3'),
('4','2022-08-03','2021-08-02','4','1280','12354321','11947689241','7','4'),
('5','2022-05-21','2017-01-21','5','4000','84632716','21918213747','5','2');