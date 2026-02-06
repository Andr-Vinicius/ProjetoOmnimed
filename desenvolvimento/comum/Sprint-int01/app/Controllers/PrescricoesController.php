<?php

namespace App\Controllers;

use App\Entities\Prescricoes;
use App\Models\PrescricoesModel;

class PrescricoesController extends BaseController {

    // Views
    // Chama a página de criação de nova finalidade
    public function novo($id) {
        return view('/prescricoes/create.php', ['id' => $id]);
    }

    // Chama a página de listagem de finalidades
    public function ver($id) {
        return view('/prescricoes/view.php', ['id' => $id]);
    }

    // Funções
    // Função de salvar no banco. Devido à função save() do Model,
    // esta função serve tanto para inserção quanto para update.
    // A definição interna de se é uma inserção ou update, é baseado 
    // em se existe um id ou não. Utiliza a função padrão do Codeigniter
    public function salvar() {

        // Cria as regras para o campo de upload
        $validationRule = [
            'PRC_ASSINATURA_MEDICO' => [
                'rules' => 'uploaded[PRC_ASSINATURA_MEDICO]'
                    . '|ext_in[PRC_ASSINATURA_MEDICO,pdf]',
                'errors' => [
                    'ext_in' => 'O arquivo deve estar em formato jpg.',
                    'uploaded' => 'É obrigatório o upload da Assinatura médica.',
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
        $pdf = $this->request->getFile('PRC_ASSINATURA_MEDICO');

        // Verifica se ainda está no caminho temporário, então, salva
        if( !$pdf->hasMoved() ) {
            $filedata = $pdf->store('guias_medicas');
            
        } else {
            // Para o processo caso não seja possível salvar
            exit;
        }

        $prescricao = new Prescricoes();
        $prescricao->PRC_ASSINATURA_MEDICO = $pdf->getName();
        $prescricao->PRC_DATA_EMISSAO = date("Y-m-d");
        $prescricao->fill($data);

        $prescricoesModel = new PrescricoesModel();
        
        if($prescricoesModel->save($prescricao) === false) {
            foreach($prescricoesModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
        } else {
            echo 'OK';
        }

    }

}
