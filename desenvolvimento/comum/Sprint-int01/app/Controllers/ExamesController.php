<?php

    namespace App\Controllers;

    use App\Entities\Exames;

    use App\Models\ExamesModel;

    class ExamesController extends BaseController {
        public function novo() {
            return view('/exames/create.php');
        }

        public function listagem() {
            return view('/exames/list.php');
        }

        public function listagemAdm() {
            return view('/exames/list_adm.php');
        }

        public function visualizar($id) {
            return view('/exames/detail.php', ['id' => $id]);
        }

        public function baixar( $opt, $nome ) {
            
            // Baixar guia
            if ( $opt == 1  ) {

                //Força o download dos arquivos. Não sei como funciona, mas funciona
                $file_url = WRITEPATH . 'uploads/guias_medicas/' . $nome;
                header('Content-Type: application/pdf');
                header("Content-Transfer-Encoding: Binary");
                header("Content-disposition: attachment; filename=".$nome);
                readfile($file_url);

                // return $this->response->download(WRITEPATH . 'uploads/guias_medicas/' . $nome, null); // NÃO funciona na versão atual (4.2.3) do CodeIgniter
            
            } else { // Baixar resultado

                $file_url = WRITEPATH . 'uploads/exame_resultado/' . $nome;
                header('Content-Type: application/pdf');
                header("Content-Transfer-Encoding: Binary");
                header("Content-disposition: attachment; filename=".$nome);
                readfile($file_url);

                // return $this->response->download(WRITEPATH . 'uploads/exame_resultado/' . $nome, null); // NÃO funciona na versão atual (4.2.3) do CodeIgniter

            }

        }

        public function salvar() {

            // Cria as regras para o campo de upload
            $validationRule = [
                'EXM_ANEXO_GUIA' => [
                    'rules' => 'uploaded[EXM_ANEXO_GUIA]'
                        . '|max_size[EXM_ANEXO_GUIA,51200]'
                        . '|ext_in[EXM_ANEXO_GUIA,pdf]',
                    'errors' => [
                        'ext_in' => 'O arquivo deve estar em formato pdf.',
                        'max_size' => 'O arquivo deve ter no máximo 50 MB.',
                        'uploaded' => 'É obrigatório o upload da guia médica.',
                    ],
                ],

            ];

            // Verifica se alguma das regras foi quebrada
            if (! $this->validate($validationRule)) {
                foreach($this->validator->getErrors() as $key => $error) {
                    echo $error . "<br/>";
                }
            }

            // Recebe os dados; em seguida, recebe o pdf
            $data = $this->request->getPost();
            $pdf = $this->request->getFile('EXM_ANEXO_GUIA');
            
            // Verifica se ainda está no caminho temporário, então, salva
            if( !$pdf->hasMoved() ) {
                $filedata = $pdf->store('guias_medicas');
            } else {
                // Para o processo caso não seja possível salvar
                exit;
            }

            $exames = new Exames();
            $exames->EXM_ANEXO_GUIA = $pdf->getName();
            $exames->fill($data);
            $exames->EXM_AUTORIZADO = 1; // status de pedente

            $examesModel = new ExamesModel();
            
            if($examesModel->save($exames) === false) {
                foreach($examesModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
            } else {
                echo 'OK';
            }
        }

        public function autorizar() {
            $data = $this->request->getPost();

            $exames = new Exames();
            $exames->fill($data);

            $examesModel = new ExamesModel();
            if ($examesModel->save($exames) === false) {
                foreach ($examesModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
    
                return;
            }
            echo "OK";
        }

    }
?>