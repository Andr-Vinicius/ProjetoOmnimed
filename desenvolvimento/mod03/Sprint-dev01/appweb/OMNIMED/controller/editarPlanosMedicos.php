<?php

// Imports, recebe o modelo da classe e o DAO. Path relativo a si mesmo através do __DIR__
require_once __DIR__ . "/../model/PlanosMedicosModel.php";
require_once __DIR__ . "/../DAO/PlanosMedicosDAO.php";
require_once __DIR__ . '/../model/ValoresDependentesModel.php';
require_once __DIR__ . '/../DAO/ValoresDependentesDAO.php';
require_once __DIR__ . '/../model/PlanosBeneficiosModel.php';
require_once __DIR__ . '/../DAO/PlanosBeneficiosDAO.php';
require_once __DIR__ . '/../model/BeneficiosModel.php';

// Receber os valores
// trim() utilizado para remover espaços no fim e no começo
$id = trim($_REQUEST['id']);
$nome = trim($_REQUEST['nome']);
$instituicao = trim($_REQUEST['instituicao']);
$preco = floatval(trim($_REQUEST['preco']));
$idades_min = isset( $_POST['idade_min'] ) ? $_POST['idade_min'] : null ;
$idades_max = isset( $_POST['idade_max'] ) ? $_POST['idade_max'] : null ;
$precos_dependente = isset( $_POST['preco_dependente'] ) ? $_POST['preco_dependente'] : null ;
$beneficios = isset( $_POST['beneficio'] ) ? $_POST['beneficio'] : null ;
$valores_beneficios = isset( $_POST['valor_beneficio'] ) ? $_POST['valor_beneficio'] : null ;

$controle = true;

if (is_null($id) || mb_strlen($id) == 0) { // Verificar se não é vazio ou nulo
    echo "Algo deu errado. Recarregue a página e tente novamente";
} elseif (is_null($nome) || mb_strlen($nome) == 0) { // Verificar se não é vazio ou nulo
    echo 'O campo "Nome do Plano" não pode estar vazio';
} elseif (mb_strlen($nome) > 100) { // Verificar a quantidade de caracteres máximos
    echo 'O campo "Nome do Plano" deve conter menos de 100 caracteres';
} elseif (is_null($instituicao) || mb_strlen($instituicao) == 0) { // Verificar se não é vazio ou nulo
    echo 'O campo "Instituição Médica" não pode estar vazio';
} elseif (mb_strlen($instituicao) > 100) { // Verificar a quantidade de caracteres máximos
    echo 'O campo "Instituição Médica" deve conter menos de 100 caracteres';
}elseif (is_null($preco) || mb_strlen($preco) == 0) { // Verificar se não é vazio ou nulo
    echo 'O campo "Preço" não pode estar vazio';
} elseif (mb_strlen($preco) > 999999.99) { // Verificar a quantidade de caracteres máximos
    echo 'O campo "Preço" deve ser menor do que 999999.99';
} elseif ($idades_min > $idades_max) { // Caso Idade Mínima maior que a Idade Máxima
    echo 'A idade mínima não pode ser maior do que a idade máxima';
}else {

    if($valores_beneficios != null) {
        foreach($valores_beneficios as $valor) {
            if(mb_strlen($valor) <= 0 || mb_strlen($valor) > 11) {
                echo 'O Valor do Benefício não deve ser zero ou maior do que 11';
                $controle = false;
                break;
            }
        }
    }

    if($idades_min != null) {
        foreach($idades_min as $idade_min) {
            if(mb_strlen($idade_min) <= 0) {
                echo 'O Valor da Idade Mínima não deve ser zero';
                $controle = false;
                break;
            }
        }
    }

    if($idades_max != null) {
        foreach($idades_max as $idade_max) {
            if(mb_strlen($idade_max) <= 0) {
                echo 'O Valor da Idade Máxima não deve ser zero';
                $controle = false;
                break;
            }
        }
    }

    if($controle) {
        try {

            $planos_medicos = new PlanosMedicos();
            $planos_medicos->id = $id;
            $planos_medicos->nome = $nome;
            $planos_medicos->instituicao = $instituicao;
            $planos_medicos->preco = $preco;
    
            $daoPlano = new PlanosMedicosDAO();
            $daoPlano->editar($planos_medicos);
    
            $daoValores = new ValoresDependentesDAO();
            
            if( $idades_min != null && $idades_max != null && $precos_dependente != null ) {
            
                foreach ( $precos_dependente as $index => $preco ) {
    
                    $valoresDependentes = new ValoresDependentes();
                    $valoresDependentes->valor = $preco;
                    $valoresDependentes->idade_minima = $idades_min[ $index ];
                    $valoresDependentes->idade_maxima = $idades_max[ $index ];
                    $valoresDependentes->plano = $planos_medicos;
    
                    $listaValores = $daoValores->listarDadosPorId($planos_medicos);
                    foreach($listaValores as $valorDependente) {
                        if( ($valoresDependentes->idade_minima > $valorDependente["VPD_IDADE_MINIMA"] && $valoresDependentes->idade_minima < $valorDependente["VPD_IDADE_MAXIMA"]) || 
                        ($valoresDependentes->idade_maxima > $valorDependente["VPD_IDADE_MINIMA"] && $valoresDependentes->idade_maxima < $valorDependente["VPD_IDADE_MAXIMA"]) ) {
                            echo "A faixa de idade está incorreta. O cadastro do plano foi concluído, mas os valores de dependentes podem não terem sido cadastrados corretamente. Por favor, verifique na página de edição.";
                            break 2;
                        }
                    }
    
                    $daoValores->cadastrar( $valoresDependentes );
    
                }
    
            }
    
            if( $beneficios != null && $valores_beneficios != null ){
    
                $daoPlanoBeneficio = new PlanosBeneficiosDAO();
    
                foreach ( $beneficios as $index => $beneficio ) {
    
                    $beneficioModel = new Beneficios();
                    $beneficioModel->id = $beneficio;
        
                    $planoBeneficio = new PlanosBeneficios();
                    $planoBeneficio->beneficio = $beneficioModel;
                    $planoBeneficio->plano = $planos_medicos;
                    $planoBeneficio->valor = $valores_beneficios[ $index ];
        
                    $daoPlanoBeneficio->cadastrar( $planoBeneficio );
        
                }
    
            }
    
            // NECESSÁRIO!! É a resposta para o validator.js de que tudo correu bem
            echo "OK";
        } catch (\PDOException $e) {
            echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto
        }
    }

}
