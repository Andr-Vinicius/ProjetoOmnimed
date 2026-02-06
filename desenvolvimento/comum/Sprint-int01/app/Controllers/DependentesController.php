<?php

namespace App\Controllers;

use App\Entities\Agendamentos;
use App\Entities\Dependentes;
use App\Entities\Exames;
use App\Entities\Pacientes;
use App\Entities\Responsaveis;
use App\Models\DependentesModel;
use App\Entities\UsuarioComum;
use App\Models\AgendamentosModel;
use App\Models\ExamesModel;
use App\Models\PacientesModel;
use App\Models\ResponsaveisModel;
use App\Models\UsuarioComumModel;
use Exception;

class DependentesController extends BaseController
{

    //Views
    // Chama a pagina de criacao
    public function novo()
    {
        return view('/dependentes/create.php');
    }

    // Chama a listagem
    public function listagem()
    {
        return view('/dependentes/list.php');
    }


    public function listar($id)
    {
        return view('/dependentes/modal.php', ['id' => $id]);
    }

    public function editar($id)
    {
        return view('/dependentes/edit.php', ['id' => $id,]);
    }

    //Funções
    public function salvar()
    {

        $data = $this->request->getPost();

        $usuario = new UsuarioComum();
        $usuario->fill($data);
        $usuario->USC_SENHA = password_hash("defaultPass", PASSWORD_DEFAULT);
        $usuario->USC_HASH_REC = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));

        $usuarioModel = new UsuarioComumModel();

        if ($usuarioModel->save($usuario) === false) {
            foreach ($usuarioModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }

            return;
        }


        $responsavel = new Responsaveis();
        $responsavelModel = new ResponsaveisModel();
        $responsavel = $responsavelModel->find($data['RES_ID']);


        $pacienteRes = new Pacientes();
        $pacienteDep = new Pacientes();
        $pacienteResModel = new PacientesModel();
        $pacienteRes = $pacienteResModel->find( $responsavel->FK_PACIENTES_PAC_ID );

        $pacienteDep->PAC_EMAIL = $pacienteRes->PAC_EMAIL;
        // Código para identificar que é um dependente, portanto, seu pagamento é junto com o do responsável
        $pacienteDep->PAC_STATUS = 4;
        $pacienteDep->FK_PLANOS_PLN_ID = $pacienteRes->FK_PLANOS_PLN_ID;

        $idUsuario = (string) $usuarioModel->getInsertID();
        $pacienteDep->FK_USUARIO_COMUM_USC_ID = $idUsuario;

        if($pacienteResModel->save($pacienteDep) === false){
            foreach ($pacienteResModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }

            return;
        }

        $dependente = new Dependentes();
        $dependenteModel = new DependentesModel();
        $dependente->DEP_NV_PARENTESCO = $data['DEP_NV_PARENTESCO'];
        $dependente->FK_RESPONSAVEIS_RES_ID = $data['RES_ID'];

        $idPacDep = (string) $pacienteResModel->getInsertID();
        $dependente->FK_PACIENTES_PAC_ID = $idPacDep;

        if ($dependenteModel->save($dependente) === false) {
            foreach ($dependenteModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
        } else {
            echo 'OK';
        }
    }

    public function atualizar($id)
    {

        // Pegando os novos dados
        $data = $this->request->getPost();

        $dependente = new Dependentes();
        $dependenteModel = new DependentesModel();
        $dependente = $dependenteModel->find($id);

        $paciente = new Pacientes();
        $pacienteModel = new PacientesModel();
        $paciente = $pacienteModel->find($dependente->FK_PACIENTES_PAC_ID);

        // Edição do Usuário Comum
        $usuario = new UsuarioComum();
        $usuarioComumModel = new UsuarioComumModel();
        $usuario = $usuarioComumModel->find($paciente->FK_USUARIO_COMUM_USC_ID);

        $usuario->USC_NOME = $data['USC_NOME'];
        $usuario->USC_SEXO = $data['USC_SEXO'];
        $usuario->USC_LOGRADOURO = $data['USC_LOGRADOURO'];
        $usuario->USC_NUMERO = $data['USC_NUMERO'];
        $usuario->USC_BAIRRO = $data['USC_BAIRRO'];
        $usuario->USC_CIDADE = $data['USC_CIDADE'];
        $usuario->USC_ESTADO = $data['USC_ESTADO'];

        if ($usuarioComumModel->update($usuario->USC_ID, $usuario) === false) {
            foreach ($usuarioComumModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
        }else{
            echo 'OK';
        }

    }

    public function excluir($id)
    {
        $dependente = new Dependentes();
        $dependenteModel = new DependentesModel();
        $dependente = $dependenteModel->find($id);

        // Ids auxiliares para a consulta antes da exclusão
        $idPac = $dependente->FK_PACIENTES_PAC_ID;

        // Verificando se existe algum agendamento ou exame com o dependente
        $agendamento = new Agendamentos();
        $agendamentoModel = new AgendamentosModel();
        $agendamento = $agendamentoModel->obterAgendamentosPorIdPaciente($idPac);

        $exame = new Exames();
        $exameModel = new ExamesModel();
        $exame = $exameModel->obterExamesPorIdPaciente($idPac);

        try{
            // Se estiver vazio -> pode ser removido, pois nao tem exame ou agendamento com o dependente
            // Se não estiver vazio -> um erro de permissao e lancado
            if(empty($exame) && empty($agendamento)){
                /* 
                Por estar com delete cascade, quando deletar de usuario_comum,
                as tabelas pacientes e dependentes terão seus registros relacionados,
                ao id apagados
                */
                $pacienteModel = new PacientesModel();
                $paciente = new Pacientes();
                $paciente = $pacienteModel->find($idPac);

                $usuarioModel = new UsuarioComumModel();
                $idUsuarioComum = $paciente->FK_USUARIO_COMUM_USC_ID;
                if ($usuarioModel->delete($idUsuarioComum) === false) {
                    foreach ($usuarioModel->errors() as $key => $error) {
                        echo $error . "<br/>";
                    }
                } else {
                    // return view('/dependentes/list.php');
                    echo 'OK';
                }

            }else{
                throw new Exception("Dependendente com exame ou agendamento", 403);
            }
        }catch(\Exception $e){
            if( $e->getCode() == 403 ){
                echo $e->getMessage();
            }
        }
    }
}
