<?php

// Imports, recebe o modelo da classe e o DAO. Path relativo a si mesmo através do __DIR__
require_once __DIR__ . "/../model/PlanosMedicosModel.php";
require_once __DIR__ . "/../DAO/PlanosMedicosDAO.php";
require_once __DIR__ . '/../DAO/PlanosBeneficiosDAO.php';
require_once __DIR__ . '/../DAO/ValoresDependentesDAO.php';


// Receber os valores
// trim() utilizado para remover espaços no fim e no começo
$id = trim($_GET['id']);

if (is_null($id) || mb_strlen($id) == 0) { // Verificar se não é vazio ou nulo
    echo "Algo deu errado. Recarregue a página e tente novamente";
} else {

    try {

        $planos_medicos = new PlanosMedicos();
        $planos_medicos->id = $id;

        $daoPlanoBeneficio = new PlanosBeneficiosDAO();
        $daoPlanoBeneficio->excluirPorRelacao( $planos_medicos );

        $daoValoresDependentes = new ValoresDependentesDAO();
        $daoValoresDependentes->excluirPorRelacao( $planos_medicos );

        $daoPlano = new PlanosMedicosDAO();
        $daoPlano->excluir( $planos_medicos );

        header("location:../view/mod03/planos_medicos/listarPlanosMedicos.php");
    } catch (\PDOException $e) {
        echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto
    }
}
