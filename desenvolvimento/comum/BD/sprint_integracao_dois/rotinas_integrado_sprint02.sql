DELIMITER |  -- Muda o delimitador para o BEGIN END

CREATE EVENT diario
	ON SCHEDULE 
    	EVERY 10 SECOND  -- Define a frequência da ocorrência. Mudar para cada 1 dia, a meia noite
    DO
    	BEGIN
			/* Atualiza o status dos pacientes para 2 (inadimplentes), checando se o dia 
			 * atual é maior que a data de vencimento
			 */
        	UPDATE 
            	pacientes, 
                pagamentos 
            SET 
            	pacientes.PAC_STATUS = 2 
            WHERE 
            	pagamentos.PGD_DATA_PAGAMENTO IS NULL AND  -- Verifica se o dia do pagamento é NULL, ou seja, não pago
                pagamentos.FK_PACIENTES_PAC_ID = pacientes.PAC_ID AND  -- Relaciona com a tabela de pacientes
                pacientes.PAC_STATUS != 2 AND  -- E checa se ele já não está como inadimplente (cod 2)
                DATEDIFF(CURDATE(), pagamentos.PGD_VENCIMENTO) > 0;  -- Compara as datas
                
			/* Insere automaticamente no banco novas entradas na tabela de pagamentos, com 
			 * base no paciente estar ativo (cod 1), e ser o dia seguinte ao do dia do
			 * vencimento da fatura, estando esta já paga previamente ao dia do vencimento.
			 * A nova data de vencimento neste caso vai ser um mês depois da data de vencimento normal.
			*/
            INSERT INTO pagamentos (FK_PACIENTES_PAC_ID, PGD_VALOR_PLANO, PGD_QUANTIDADE_DEPENDENTES, PGD_VALOR_TOTAL, PGD_VENCIMENTO)
            SELECT 
                pac.PAC_ID,  -- Recebe o ID do paciente
                pla.PLN_PRECO,  -- O preço do plano, para registro
                @qtd := (SELECT  -- Seleciona a quantidade de dependentes, e salva em uma variável para uso futuro
                            COUNT(dependentes.DEP_ID)  -- Conta quantos depententes este paciente tem
                        FROM 
                            pacientes 
                        LEFT JOIN  -- Garante a checagem da tabela usando left join
                            responsaveis ON
                            pacientes.PAC_ID = responsaveis.FK_PACIENTES_PAC_ID 
                        LEFT JOIN 
                            dependentes ON 
                            dependentes.FK_RESPONSAVEIS_RES_ID = responsaveis.RES_ID 
                        WHERE 
                            pacientes.PAC_ID = pac.PAC_ID) 
                    AS PGD_QUANTIDADE_DEPENDENTES,
                @qtd * (SELECT  -- Aqui, utiliza-se a variável anterior para calcular o valor total
                            IF( MAX(VPD_VALOR) IS NULL, 0, MAX(VPD_VALOR))  -- Seleciona o valor de cada dependente, aqui pega só o maior valor
                        FROM 
                            valores_dependentes 
                        WHERE 
                            valores_dependentes.FK_PLANOS_PLN_ID = pla.PLN_ID)
                    + pla.PLN_PRECO AS TOTAL, -- Faz a conta do valor total
                DATE_ADD( pag1.PGD_VENCIMENTO, INTERVAL 1 MONTH ) AS VENCIMENTO  -- Soma um mês na data de vencimento
            FROM 
                planos AS pla, 
                pacientes AS pac,
                pagamentos AS pag1 
            LEFT OUTER JOIN  -- Pega o vencimento mais recente, vulgo do último mês. Honestamente, não entendi muito bem como funciona
                pagamentos AS pag2 ON 
                (pag1.FK_PACIENTES_PAC_ID = pag2.FK_PACIENTES_PAC_ID 
                AND pag1.PGD_VENCIMENTO < pag2.PGD_VENCIMENTO) 
            WHERE 
                pag2.PGD_VENCIMENTO IS NULL AND  -- Faz parte de pegar o vencimento mais recente
                pag1.PGD_VENCIMENTO IS NOT NULL AND  -- Faz parte de pegar o vencimento mais recente
                pag1.PGD_VENCIMENTO < CURDATE() AND  -- Verifica se o vencimento é menor que a data atual, para saber se já é o dia seguinte ao vencimento
                pag1.FK_PACIENTES_PAC_ID = pac.PAC_ID AND  -- Relaciona com pacientes
                pac.PAC_STATUS = 1 AND  -- Verifica se o paciente está ativo
                pla.PLN_ID = pac.FK_PLANOS_PLN_ID;  -- Relaciona com plano do paciente
		END |

DELIMITER ;