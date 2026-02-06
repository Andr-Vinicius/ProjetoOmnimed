<?php

namespace App\Controllers;

use App\Entities\Funcionarios;
use App\Entities\Pacientes;
use App\Entities\Pagamentos;
use App\Entities\PagamentosMedicos;
use App\Models\FuncionariosModel;
use App\Models\PacientesModel;
use App\Models\PagamentosMedicosModel;
use App\Models\PagamentosModel;

class PagamentosController extends BaseController
{

    // Views
    // Chama a página de listagem dos pacientes
    public function listarPacientes()
    {
        return view('/pagamentos/list_pacientes.php');
    }

    // Chama a página de histórico de pagamentos de um paciente individual
    // passando como parâmetro (POST) o id do paciente.
    public function historicoPaciente($id)
    {
        return view('/pagamentos/detail_pagamentos_paciente.php', ['id' => $id,]);
    }

    // Chama a página de listagem de pacientes inadimplentes
    public function listarPacientesInadimplentes()
    {
        return view('/pagamentos/list_inadimplencias.php');
    }

    // Chama a página de listagem dos médicos
    public function listarMedicos()
    {
        return view('/pagamentos/list_medicos.php');
    }

    // Chama a página de folha de pagamentos de um médico individual
    // passando como parâmetro (POST) o id do paciente.
    public function historicoMedico($id)
    {
        return view('/pagamentos/detail_pagamentos_medico.php', ['id' => $id,]);
    }

    // Chama a página de listagem de médicos com pagamento em aberto
    public function listarMedicosAPagar()
    {
        return view('/pagamentos/list_medicos_aberto.php');
    }

    public function confirmarPagamentoPaciente($idPac, $idPag, $status)
    {

        $paciente = new Pacientes();
        $pacienteModel = new PacientesModel();

        $paciente = $pacienteModel->obterPacientePorFKUsuarioComum($idPac);

        $pagamento = new Pagamentos();
        $pagamentosModel =  new PagamentosModel();

        $paciente->PAC_STATUS = $status;
        $pagamento = $pagamentosModel->find($idPag);
        $pagamento->PGD_DATA_PAGAMENTO = date('Y-m-d');

        if ($pacienteModel->update($paciente->PAC_ID, $paciente) === false) {
            // Exibe os erros
            foreach ($pacienteModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }

            return; // Quebra a execução em caso de erro
        }

        if ($pagamentosModel->update($pagamento->PGD_ID, $pagamento) === false) {
            // Exibe os erros
            foreach ($pagamentosModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }

            return; // Quebra a execução em caso de erro
        }

        // Caso o paciente deseje continuar ativo, e seu pagamento estava atrasado
        if ($status == 1 && $pagamento->PGD_DATA_PAGAMENTO > $pagamento->PGD_VENCIMENTO) {

            $pagamento->PGD_VENCIMENTO = date("Y-m-d", strtotime($pagamento->PGD_DATA_PAGAMENTO . '+ 1 months'));
            $pagamento->PGD_DATA_PAGAMENTO = null;
            $pagamento->PGD_ID = null;

            var_dump($pagamento);

            if ($pagamentosModel->insert($pagamento) === false) {
                // Exibe os erros
                foreach ($pagamentosModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }

                return; // Quebra a execução em caso de erro
            }
        }

        echo 'OK';
    }

    public function confirmarPagamentoMedicos($idPag)
    {

        $pagamentoMedicos = new PagamentosMedicos();
        $pagamentosMedicosModel =  new PagamentosMedicosModel();

        $pagamentoMedicos->PGM_ID = $idPag;
        $pagamentoMedicos->PGM_DATA_PAGAMENTO_REALIZADO = date('Y-m-d');

        if ($pagamentosMedicosModel->update($pagamentoMedicos->PGM_ID, $pagamentoMedicos) === false) {
            // Exibe os erros
            foreach ($pagamentosMedicosModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }

            return; // Quebra a execução em caso de erro
        }

        echo 'OK';
    }

    public function downloadHistorico( $id, $tipoArquivo )
    {
        // https://www.codexworld.com/export-data-to-csv-file-using-php-mysql/
        // https://www.codexworld.com/export-data-to-excel-in-php/

        $funcionario = new Funcionarios();
        $funcionarioModel = new FuncionariosModel();

        $funcionario = $funcionarioModel->find($id);
        $nomeFuncionario = $funcionarioModel->getNomeFuncionario($funcionario->FUN_PRONTUARIO);

        $pagamentosMedicos = new PagamentosMedicos();
        $pagamentosMedicosModel = new PagamentosMedicosModel();

        $pagamentosMedicos = $pagamentosMedicosModel->historicoMedico($id);


        if( !empty( $pagamentosMedicos ) ) {
            
            if( $tipoArquivo == 1 ){
                
                $delimiter = ",";
                $filename = preg_replace('/\s+/', '', $nomeFuncionario) . "_" . date('Y-m-d') . ".csv";

                // Create a file pointer 
                $f = fopen('php://memory', 'w');

                // Set column headers 
                $fields = array('Id', 'Dia_de_Pagamento', 'Data_Pgto._Realizado', 'Salário', 'Valor_de_Comissão', 'Valor_Total', 'Qtd_Consultas_Realizadas'); 
                fputcsv( $f, $fields, $delimiter );

                // Output each row of the data, format line as csv and write to file pointer 
                foreach( $pagamentosMedicos as $key => $pagamentosMedico ) {
                    $lineData = array( $pagamentosMedico->PGM_ID, $pagamentosMedico->PGM_DATA_PAGAMENTO, $pagamentosMedico->PGM_DATA_PAGAMENTO_REALIZADO, $pagamentosMedico->PGM_SALARIO, $pagamentosMedico->PGM_VALOR_COMISSAO, $pagamentosMedico->PGM_VALOR_TOTAL, $pagamentosMedico->PGM_CONSULTAS_MES);
                    fputcsv( $f, $lineData, $delimiter );
                }

                // Move back to beginning of file
                fseek($f, 0);

                // Set headers to download file rather than displayed 
                header('Content-Type: text/csv'); 
                header('Content-Disposition: attachment; filename="' . $filename . '";'); 
                
                //output all remaining data on a file pointer 
                fpassthru($f);

            } else {
                
                // Excel file name for download 
                $fileName = preg_replace('/\s+/', '', $nomeFuncionario) . "_" . date('Y-m-d') . ".xlsx"; 
                
                // Column names 
                $fields = array('Id', 'Dia_de_Pagamento', 'Data_Pgto._Realizado', 'Salário', 'Valor_de_Comissão', 'Valor_Total', 'Qtd_Consultas_Realizadas'); 
                
                // Display column names as first row 
                $excelData = implode("\t", array_values($fields)) . "\n"; 
                
                // Output each row of the data 
                foreach( $pagamentosMedicos as $key => $pagamentosMedico ) {
                    $lineData = array( $pagamentosMedico->PGM_ID, $pagamentosMedico->PGM_DATA_PAGAMENTO, $pagamentosMedico->PGM_DATA_PAGAMENTO_REALIZADO, $pagamentosMedico->PGM_SALARIO, $pagamentosMedico->PGM_VALOR_COMISSAO, $pagamentosMedico->PGM_VALOR_TOTAL, $pagamentosMedico->PGM_CONSULTAS_MES);
                    array_walk($lineData, array('self','filterData')); 
                    $excelData .= implode("\t", array_values($lineData)) . "\n"; 
                } 
                
                // Headers for download 
                header("Content-Type: application/vnd.ms-excel"); 
                header("Content-Disposition: attachment; filename=\"$fileName\""); 
                
                // Render excel data 
                echo $excelData; 

            }

        }

        exit;

    }

    // Filter the excel data 
    function filterData(&$str){ 
        $str = preg_replace("/\t/", "\\t", $str); 
        $str = preg_replace("/\r?\n/", "\\n", $str); 
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
    } 
}
