<?php

    namespace App\Controllers;

    use App\Entities\EspecialidadesMedicas;
    use App\Models\EspecialidadesMedicasModel;

    class EspecialidadesMedicasController extends BaseController {

        public function novo() {
            return view('/especialidades_medicas/create.php');
        }

        public function listagem() {
            return view('/especialidades_medicas/list.php');
        }

        public function editar($id) {
            return view('/especialidades_medicas/edit.php', ['id' => $id,]);
        }

        public function salvar() {

            $data = $this->request->getPost();

            $especialidadeMedica = new EspecialidadesMedicas();
            $especialidadeMedica->fill($data);

            $especialidadeMedicaModel = new EspecialidadesMedicasModel();

            if($especialidadeMedicaModel->save($especialidadeMedica) === false) {
                foreach($especialidadeMedicaModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
            } else {
                echo 'OK';
            }
        }

        public function excluir($id) {
            
            try {

                $especialidadeMedicaModel = new EspecialidadesMedicasModel();

                if($especialidadeMedicaModel->delete($id) === false) {
                    foreach($especialidadeMedicaModel->errors() as $key => $error) {
                        echo $error . "<br/>";
                    }
                    
                } else {
                    echo 'OK';
                }

            } catch(\Exception $e) {
                
                if( $e->getCode() == 1451 ) {
                    echo "AVISO: NÃO foi possível excluir a especialidade médica. Há um ou mais médicos atrelado a ela.";
                }

            }
        }
    }
?>