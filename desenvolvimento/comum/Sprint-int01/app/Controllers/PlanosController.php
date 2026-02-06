<?php

namespace App\Controllers;

use App\Entities\Planos;
use App\Models\PlanosModel;
use App\Entities\PlanosBeneficios;
use App\Models\PlanosBeneficiosModel;
use App\Entities\ValoresDependentes;
use App\Models\ValoresDependentesModel;

class PlanosController extends BaseController
{

    // Views
    // Chama a página de criação de novo plano
    public function novo()
    {
        return view('/planos/create.php');
    }

    // Chama a página de listagem de planos
    public function listagem()
    {
        return view('/planos/list.php');
    }

    // Chama a página de edição, passando como parâmetro (POST)
    // o id da plano que deve ser editada.
    public function editar($id)
    {
        return view('/planos/edit.php', ['id' => $id,]);
    }

    // Funções
    // Função de salvar no banco. Devido à função save() do Model,
    // esta função serve tanto para inserção quanto para update.
    // A definição interna de se é uma inserção ou update, é baseado 
    // em se existe um id ou não. Utiliza a função padrão do Codeigniter
    public function criar()
    {

        $data = $this->request->getPost();

        if( !isset( $data['beneficio'] ) && !isset($data['valor_beneficio']) ) {
            // Verifica se ao menos uma finalidade foi settada
            // Funciona também no caso de nenhuma finalidade ter sido cadastrada
            echo 'Um plano deve ter ao menos um beneficio.';
            return; // Quebra a execução mais cedo
        }

        $plano = new Planos();
        $plano->fill($data);

        $planoModel = new PlanosModel();

        // Verifica se o update/inserção foi feita com sucesso
        if ($planoModel->insert($plano) === false) {
            // Exibe os erros
            foreach ($planoModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }

            return; // Quebra a execução em caso de erro
        }

        $planoBeneficio = new PlanosBeneficios();

        $planoBeneficio->FK_PLANOS_PLN_ID = (string) $planoModel->getInsertID();

        $planoBeneficioModel = new PlanosBeneficiosModel();

        try {
            foreach ( $plano->beneficio as $index=>$beneficio ) {

                $planoBeneficio->FK_BENEFICIOS_BNF_ID = $beneficio;
                $planoBeneficio->PBN_VALOR_BENEFICIO = $plano->valor_beneficio[$index];
    
                if( $planoBeneficioModel->insert( $planoBeneficio ) === false ) {

                    foreach ($planoBeneficioModel->errors() as $key => $error) {
                        echo $error . "<br/>";
                    }

                    // Deleta o plano inserido
                    $planoModel->delete( $planoBeneficio->FK_PLANOS_PLN_ID );

                    echo "AVISO: O plano NÃO foi cadastrado.";

                    return; // Quebra a execução mais cedo

                }
            }

        } catch(\Exception $e) {

            // Caso a chave estrangeira passada não exista em sua tabela
            if( $e->getCode() == 1452 ) {
                echo "Algo deu errado. Recarregue a página e tente novamente.";
                echo "AVISO: O plano NÃO foi cadastrado.";
                // Deleta o plano inserido
                $planoModel->delete( $planoBeneficio->FK_PLANOS_PLN_ID );
            }

            return; // Quebra a execução mais cedo

        }

        if( isset( $data['idade_min'] ) && isset($data['idade_max']) && isset( $data['preco'] ) ){

            $valorDependente = new ValoresDependentes();
            
            $valorDependente->FK_PLANOS_PLN_ID = (string) $planoModel->getInsertID();

            $valorDependenteModel = new ValoresDependentesModel();

            try {

                foreach ( $plano->idade_min as $index=>$idade_min ) {
    
                    $valorDependente->VPD_IDADE_MINIMA = $idade_min;
                    $valorDependente->VPD_IDADE_MAXIMA = $plano->idade_max[$index];
                    $valorDependente->VPD_VALOR = $plano->preco[$index];
                    
                    if($valorDependente->VPD_IDADE_MINIMA >= $valorDependente->VPD_IDADE_MAXIMA) {
                        
                        echo 'A idade mínima não pode ser maior que a idade máxima.<br/>';

                        // Deleta o plano inserido
                        $planoModel->delete( $valorDependente->FK_PLANOS_PLN_ID );
    
                        echo "AVISO: O plano NÃO foi cadastrado.";

                        return; // Quebra a execução mais cedo

                    } else if( $valorDependenteModel->insert( $valorDependente ) === false ) {
    
                        foreach ($valorDependenteModel->errors() as $key => $error) {
                            echo $error . "<br/>";
                        }

                        // Deleta o plano inserido
                        $planoModel->delete( $valorDependente->FK_PLANOS_PLN_ID );
    
                        echo "AVISO: O plano NÃO foi cadastrado.";
    
                        return; // Quebra a execução mais cedo
    
                    }
                }
    
            } catch(\Exception $e) {
    
                // Caso a chave estrangeira passada não exista em sua tabela
                if( $e->getCode() == 1452 ) {
                    echo "Algo deu errado. Recarregue a página e tente novamente.";
                    echo "AVISO: O plano NÃO foi cadastrado.";
                    // Deleta o plano inserido
                    $planoModel->delete( $valorDependente->FK_PLANOS_PLN_ID );
                }
    
                return; // Quebra a execução mais cedo
    
            }

        }

        echo 'OK';
    }

    public function salvarEdicao() {

        $data = $this->request->getPost();

        $plano = new Planos();
        $plano->fill($data);

        $planoModel = new PlanosModel();

        // Verifica se o update/inserção foi feita com sucesso
        if ($planoModel->update($plano->PLN_ID, $plano) === false) {
            // Exibe os erros
            foreach ($planoModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }

            return; // Quebra a execução em caso de erro
        }

        // Caso haja um novo benefício adicionado na edição
        if( isset( $data['beneficio'] ) && isset($data['valor_beneficio']) ) {

            $planoBeneficio = new PlanosBeneficios();
            $planoBeneficio->FK_PLANOS_PLN_ID = $plano->PLN_ID;

            $planoBeneficioModel = new PlanosBeneficiosModel();

            try {

                // Itera o array de benefios e os cadastra. Caso algum erro aconteça,
                // gera mensagem de erro
                foreach ( $plano->beneficio as $index=>$beneficio ) {

                    $planoBeneficio->FK_BENEFICIOS_BNF_ID = $beneficio;
                    $planoBeneficio->PBN_VALOR_BENEFICIO = $plano->valor_beneficio[$index];
        
                    if( $planoBeneficioModel->insert( $planoBeneficio ) === false ) {

                        foreach ($planoBeneficioModel->errors() as $key => $error) {
                            echo $error . "<br/>";
                        }

                        echo "AVISO: Alguns benefícios podem não ter sido cadastrados.";

                        return; // Quebra a execução mais cedo

                    }
                }

            } catch(\Exception $e) {

                // Caso a chave estrangeira passada não exista em sua tabela
                if( $e->getCode() == 1452 ) {
                    echo "Algo deu errado. Recarregue a página e tente novamente.";
                    echo "AVISO: Alguns benefícios podem não ter sido cadastrados.";
                }

                return; // Quebra a execução mais cedo

            }
        }

        if( isset( $data['idade_min'] ) && isset($data['idade_max']) && isset( $data['preco'] ) ){

            $valorDependente = new ValoresDependentes();
            $valorDependente->FK_PLANOS_PLN_ID = $plano->PLN_ID;

            $valorDependenteModel = new ValoresDependentesModel();

            try {

                foreach ( $plano->idade_min as $index=>$idade_min ) {
    
                    $valorDependente->VPD_IDADE_MINIMA = $idade_min;
                    $valorDependente->VPD_IDADE_MAXIMA = $plano->idade_max[$index];
                    $valorDependente->VPD_VALOR = $plano->preco[$index];
    
                    if( $valorDependenteModel->insert( $valorDependente ) === false ) {
    
                        foreach ($valorDependenteModel->errors() as $key => $error) {
                            echo $error . "<br/>";
                        }
    
                        echo "AVISO: Alguns valores de dependentes podem não ter sido cadastrados.";
    
                        return; // Quebra a execução mais cedo
    
                    }
                }
    
            } catch(\Exception $e) {
    
                // Caso a chave estrangeira passada não exista em sua tabela
                if( $e->getCode() == 1452 ) {
                    echo "Algo deu errado. Recarregue a página e tente novamente.";
                    echo "AVISO: Alguns valores de dependentes podem não ter sido cadastrados.";
                }
    
                return; // Quebra a execução mais cedo
    
            }

        }

        echo 'OK';

    }

    // Função de deletar no banco. Utiliza a função padrão do Codeigniter
    public function excluir($id)
    {

        try {
            // Cria o Model
            $planoModel = new PlanosModel();

            // Verifica se a exlusão foi feita com sucesso
            if ($planoModel->delete($id) === false) {
                // Exibe os erros
                foreach ($planoModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
            } else {
                echo 'OK';
            }

        } catch(\Exception $e) {
            if( $e->getCode() == 1451 ) {
                echo "AVISO: NÃO foi possível excluir o plano. Há um ou mais pacientes atrelado a ele.";
            }
        }

    }
}
