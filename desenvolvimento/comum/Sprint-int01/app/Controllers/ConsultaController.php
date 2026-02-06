<?php

    namespace App\Controllers;

    use App\Entities\ConsultasOnline;
    
    use App\Models\ConsultasOnlineModel;

    class ConsultaController extends BaseController {

        public function novo() {
            return view('/consulta/create.php');
        }
        public function presencial() {
            return view('/consulta/presencial.php');
        }

        public function detalhar($id) {
            return view('/consulta/detail_patient.php', ['id' => $id]);
        }

        public function listagem_paciente() {
            return view('/consulta/list_patient.php');
        }

        //Função que encaminha para a página do histórico de consultas
        public function listagem_historico(){
            return view('/consulta/list_historico.php');
        }

        public function anotacao($id){
            return view('/consulta/edit_anotacao.php', ['id' => $id,]);
        }
 

        public function salvar() {
            $data = $this->request->getPost();

            $consultasOnline = new ConsultasOnline();
            $consultasOnline->fill($data);
            $consultasOnlineModel = new ConsultasOnlineModel();
            
            if($consultasOnlineModel->save($consultasOnline) === false) {
                foreach($consultasOnlineModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
            } else {
                echo 'OK';
            }
        }

        public function salvarNota(){
            $data = $this->request->getPost();
            // var_dump($data['CNS_NOTA']);die;

            $consultasOnlineModel = new ConsultasOnlineModel();

             // Verifica se o update/inserção foi feita com sucesso
            if ($consultasOnlineModel->editarNotas($data['CNS_NOTA'],$data['CNS_ID']) === false) {
            // Exibe os erros
                foreach ($consultasOnlineModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }

                return; // Quebra a execução em caso de erro
            }
            echo 'OK';

            
        }

        
        
    }
?>