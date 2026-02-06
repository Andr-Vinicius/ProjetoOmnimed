<?php

    namespace App\Controllers;

    use App\Entities\Agendamentos;
    //use App\Entities\Funcionarios;
    //use App\Entities\UsuarioComum;
    //use App\Entities\Medicos;
    use App\Models\AgendamentosModel;
    //use App\Models\UsuarioComumModel;
    //use App\Models\FuncionariosModel;
    //use App\Models\MedicosModel;

    class AgendamentosController extends BaseController {

        public function novo() {
            return view('/agendamentos/create.php');
        }

        public function listagem_solicitados() {
            return view('/agendamentos/list_solicited.php');
        }

        public function listagem() {
            return view('/agendamentos/list.php');
        }
        public function listagem_dia_data($data) {
            return view('/agendamentos/view_agendamentos_dia.php', ['data' => $data,]);
        }

        public function listagem_dia() {
            return view('/agendamentos/view_agendamentos_dia.php');
        }

        public function cancelar($id) {
            
            $agendamentoModel = new AgendamentosModel();
            $agendamento = $agendamentoModel->find($id);

            $agendamento->AGD_STATUS = 0;

            if($agendamentoModel->update($id, $agendamento) === false) {
                foreach($agendamentoModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
            } else {
                return view('agendamentos/list.php');
            }
        }

        public function detalhar($id) {
            return view('/agendamentos/detail.php', ['id' => $id]);
        }

        public function editar($id) {
            return view('/agendamentos/edit.php', ['id' => $id]);
        }

        public function editar_agendamento() {
            $data = $this->request->getPost();

            $agendamento = new Agendamentos();
            $agendamento->fill($data);
            $agendamento->AGD_ID = $data["AGD_ID"];

            $agendamentoModel = new AgendamentosModel();

            if($agendamentoModel->save($agendamento) === false) {
                foreach($agendamentoModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
            } else {
                echo 'OK';
            }
        }

        public function listar_agendamentos_paciente($id) {
            return view('/agendamentos/list_patient.php', ['id' => $id]);
        }

        public function confirmar($id) {
            return view('/agendamentos/confirm.php', ['id' => $id]);
        }

        public function salvar() {

            $data = $this->request->getPost();

            $agendamento = new Agendamentos();
            $agendamento->fill($data);

            $agendamentoModel = new AgendamentosModel();

            if($agendamentoModel->save($agendamento) === false) {
                foreach($agendamentoModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
            } else {
                echo 'OK';
            }
        }
        
        //esse método é necessário, ao invés de usar o salvar, pois precisa buscar no banco o 
        //id_medico, o id_funcionário e o id_usuário_comum de acordo com o id do especialista.
        public function confirmar_agendamento() {

            $data = $this->request->getPost();

            $agendamentoModel = new AgendamentosModel();
            //$medicoModel = new MedicosModel();

            $agendamento = new Agendamentos();
            $agendamento->fill($data);

            //$medico = $medicoModel->find($agendamento->FK_MEDICOS_MED_ID);
            // print_r($medico['FK_FUNCIONARIOS_FUN_ID']); 
            // die();
            // $agendamento->FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID = $medico->FK_FUNCIONARIOS_FUN_ID;
            // $agendamento->FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID = $medico->FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID;

            if($agendamentoModel->update($agendamento->AGD_ID, $agendamento) === false) {
                foreach($agendamentoModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
            } else {
                $this->email();        
            }
        }

        public function findAllDia($data = null){
            $agendamentosModel = new AgendamentosModel();
            $res = $agendamentosModel->findAllDia($data);
            return $res;
        }

        public function email(){
            if($this->request->getMethod()=='post'){
                $email=$this->request->getVar('PAC_EMAIL');
                $idagendamento=$this->request->getVar('AGD_ID');
                $assunto='Agendamento Confirmado';
                $mensagem='Segue o link para efetuar a triagem. </br></br> <a href="http://localhost:8080/triagens/novo/'.$idagendamento.'">Clique aqui</a>';
                $email_envio=\Config\Services::email();
                $email_envio->setFrom('omnimedtelemedicina@gmail.com','Omnimed-Telemedicina');
                $email_envio->setTo($email);
                $email_envio->setSubject($assunto);
                $email_envio->setMessage($mensagem);

                if($email_envio->send()){
                    echo 'OK';
                }else{
                    echo 'o email não foi enviada.';
                }
            }else{
                echo 'erro';
            }
        }
        
        
    }
?>