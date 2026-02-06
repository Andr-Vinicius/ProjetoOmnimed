<?php

// Imports, recebe o modelo da classe e o DAO. Path relativo a si mesmo através do __DIR__
require_once __DIR__ . "/../model/EspecialidadesMedicasModel.php";
require_once __DIR__ . "/../DAO/EspecialidadesMedicasDAO.php";

// Receber os valores
// trim() utilizado para remover espaços no fim e no começo
$id = trim($_GET['id']);

if (is_null($id) || mb_strlen($id) == 0) { // Verificar se não é vazio ou nulo
    echo "Algo deu errado. Recarregue a página e tente novamente";
} else {

    try {

        $especialidades = new EspecialidadesMedicas();
        $especialidades->id = $id;

        $daoEspecialidade = new EspecialidadesMedicasDAO();
        $daoEspecialidade->excluir($especialidades);

        header("location:../view/mod03/especialidades/listarEspecialidadesMedicas.php");
    } catch (\PDOException $e) {
        echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto
    }
}
