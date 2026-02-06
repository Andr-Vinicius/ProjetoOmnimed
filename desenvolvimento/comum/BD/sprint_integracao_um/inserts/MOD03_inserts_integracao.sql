INSERT INTO `funcionarios` (`FK_USUARIO_COMUM_USC_ID`, `FUN_PRONTUARIO`) VALUES
(1, 'EN608617'),
(2, 'ME272715'),
(3, 'ME973872'),
(4, 'ME126632');

INSERT INTO `usuario_comum` (`USC_NOME`, `USC_DATA_NASCIMENTO`, `USC_RG`, `USC_ORGAO_EMISSOR`, `USC_CPF`, `USC_SEXO`, `USC_LOGRADOURO`, `USC_NUMERO`, `USC_BAIRRO`, `USC_CIDADE`, `USC_ESTADO`, `USC_SENHA`) VALUES
('Melissa Akatuka de Oliveira', '2001-12-17', '677632114', 'SSP', '28369586856', 2, 'Rua dos Gusmões', '353', 'Santa Efigênia', 'São Paulo', 25, 2, 'Enfermeira@2020',),
('Miriam Oliveira','1994-07-02', '1994-07-02', '28272287935', 'SSP', '15201152366', 2, 'Rua Jussara','200', 'Sítio Cercado', 'Curitiba', 16, 2, 'Enfermeira!1994',),
('Gustavo Rodrigues Matos', '1996-07-03', '908908765', 'SSP', '23879876575', 1, 'Rua França', '788', 'Cauamé', 'Boa VistaBoa Vista', 25, 1, '1cB8O7iGXP',),
('Carlos Eduardo Sampaio', '2000-07-16', '999999999', 'SSP', '99999999999', 1, 'R. Dr. Teófilo Ribeiro de Andrade', '67', 'Centro', 'São Paulo', 25, 1, 'Oqw9PT!UBiw.Nes2',),
('João Gustavo Martins', '1981-03-24', '18.171.205-2', 'SSP','434.277.200-04', 2, 'Rodovia AL-115', '394', 'Nova Esperança', 'Arapiraca', 3, 'iLEsYpIwJW'),
('Josefa Vitória Lavínia Nunes', '1978-03-05', '43.026.316-8', NULL, '307.242.171-42', 1, 'Rua 19', '505', 'Setor União III', 'Gurupi', 4, '6k6744T5oh'),
('Liz Mariana Moreira', '1993-04-19', '48.425.399-2', 'SSP','258.652.436-59', 1, 'Vereador Pio José Broto','445', 'Butiatumirim', 'Colombo', 6, 'o6NsPpeONo'),
('Francisca Maria Caldeira', '1948-03-25', '44.332.350-1', 'SSP','198.887.742-39', 2, 'Rua 101', '932','Novo Mondubim', 'Fortaleza', 8, 'bTEwpS7lJu'),
('Renan Heitor Enzo Silveira', '1978-03-04', '41.260.160-6', NULL, '326.039.884-84', 2, 'Rua Fundão', '548', 'Barra do Sahy', 'Aracruz', 11, 'OhBerhyAM4'),
('Teresa Isabella Fernanda Barbosa', '1966-06-11', '10.480.537-7', 'SSP', 347.785.705-45', 1, 'Passagem São José', '633', 'Marituba', 'Ananindeua', 17, 'sIoMpHhH4R');


INSERT INTO `contatos_setoriais` (`CSE_SETOR`, `CSE_TELEFONE_FIXO`, `CSE_EMAIL`, `CSE_TELEFONE_CELULAR`) VALUES
('Administrativo', '36111136', 'administracao@unimed.com.br', '919198787'),
('Financeiro', '36441123', 'financeiro@unimed.com.br', '9423564320'),
('Diretoria', '33745910', 'diretoria@unimed.com.br', '910108282'),
('Limpeza', '32134567', 'limpeza@unimed.com.br', '912325476'),
('Enfermagem', '38745618', 'enfermagem@unimed.com.br', '987541235'),
('Médico', '975462019', 'medico@unimed.com.br', '900224567'),
('Tecnologia', '32998543', 'ti@unimed.com.br', '976420990'),
('Secretaria', '38643291', 'secretaria@unimed.com.br', '982125648'),
( 'Administração', '34561029', 'administracao@santacasa.com.br', '956271818'),
( 'Advocacia', '312345544', 'advocacia@santacasa.com.br', '910583526');

INSERT INTO `funcionarios` (`FK_USUARIO_COMUM_USC_ID`, `FUN_PRONTUARIO`) VALUES
(1, '25679784'),
(3, '70104142');

INSERT INTO `pacientes` ('PAC_EMAIL`, `FK_USUARIO_COMUM_USC_ID`) VALUES
('isaac-damota84@petrobras.com.br', 4),
('fernandafernandaaparicio@dkcarmo.com', 5),
('breno-teixeira81@cursomarcato.com.br', 6),
('renata_moura@gruppoitalia.com.br', 7);

