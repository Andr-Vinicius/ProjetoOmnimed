<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class UsuarioComumModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'usuario_comum';
        protected $primaryKey = 'USC_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\UsuarioComum::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['USC_SEXO', 'USC_CIDADE', 'USC_BAIRRO', 'USC_DATA_NASCIMENTO',
        'USC_ESTADO', 'USC_SENHA', 'USC_ORGAO_EMISSOR', 'USC_CPF', 'USC_NOME', 'USC_RG', 'USC_LOGRADOURO',
        'USC_NUMERO', 'USC_HASH_REC', 'USC_UPDATE_AT'];

        // Regras de validação de campos
        protected $validationRules = [

            'USC_SEXO' => 'required',
            'USC_CIDADE' => 'required|string|min_length[5]|max_length[100]',
            'USC_BAIRRO' => 'required|string|min_length[3]|max_length[100]',
            'USC_DATA_NASCIMENTO' => 'required|validationDate[usuario_comum.USC_DATA_NASCIMENTO]',
            'USC_ESTADO' => 'required',
            'USC_SENHA' => 'required|string|min_length[8]|max_length[200]|is_unique[usuario_comum.USC_SENHA,USC_ID,{USC_ID}]',
            'USC_ORGAO_EMISSOR' => 'required|string|exact_length[3]',
            'USC_CPF' => 'required|exact_length[11]|numeric|is_unique[usuario_comum.USC_CPF,USC_ID,{USC_ID}]',
            'USC_NOME' => 'required|string|min_length[4]|max_length[180]',
            'USC_RG' => 'required|numeric|exact_length[9]|is_unique[usuario_comum.USC_RG,USC_ID,{USC_ID}]',
            'USC_LOGRADOURO' => 'required|string|min_length[3]|max_length[200]',
            'USC_NUMERO' => 'required|numeric|max_length[10]',


        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [

            'USC_SEXO' => [
                
                'required' => 'O campo sexo é obrigatório.',

            ],

            'USC_CIDADE' => [
                
                'required' => 'O campo cidade é obrigatório.',
                'string' => 'O campo cidade deve conter apenas letras.',
                'min_length' => 'O campo cidade requer no mínimo 5 caracteres.',
                'max_length' => 'O campo cidade aceita no máximo 100 caracteres.',

            ],

            'USC_BAIRRO' => [
                
                'required' => 'O campo bairro é obrigatório.',
                'string' => 'O campo bairro deve conter apenas letras.',
                'min_length' => 'O campo bairro requer no mínimo 3 caracteres.',
                'max_length' => 'O campo bairro aceita no máximo 100 caracteres.',

            ],

            'USC_DATA_NASCIMENTO' => [
                
                'required' => 'O campo data de nascimento é obrigatório.',
                'valid_date' => 'O campo data de nascimento deve estar no formato correto.',
                'validationDate' => 'Data de Nascimento inválida.',
            ],

            'USC_ESTADO' => [
                
                'required' => 'O campo estado é obrigatório.',

            ],

            'USC_SENHA' => [
                
                'is_unique' => 'O campo senha deve ser único (valor duplicado).',
                'string' => 'O campo senha deve conter apenas letras.',
                'required' => 'O campo senha é obrigatório.',
                'min_length' => 'O campo senha requer no mínimo 8 caracteres.',
                'max_length' => 'O campo senha aceita no máximo 200 caracteres.',

            ],

            'USC_ORGAO_EMISSOR' => [
                
                'required' => 'O campo orgão emissor é obrigatório.',
                'exact_length' => 'O campo orgão emissor deve conter 3 caracteres.',
                'string' => 'O campo orgão emissor deve conter apenas letras.',

            ],

            'USC_CPF' => [
                
                'is_unique' => 'O campo CPF deve ser único (valor duplicado).',
                'required' => 'O campo CPF é obrigatório.',
                'numeric' => 'O campo CPF deve conter apenas números.',
                'exact_length' => 'O campo CPF deve conter 11 caracteres.',

            ],

            'USC_NOME' => [
                
                'string' => 'O campo nome deve conter apenas letras.',
                'required' => 'O campo nome é obrigatório.',
                'min_length' => 'O campo nome requer no mínimo 4 caracteres.',
                'max_length' => 'O campo nome aceita no máximo 180 caracteres.',

            ],

            'USC_RG' => [
                
                'is_unique' => 'O campo RG deve ser único (valor duplicado).',
                'required' => 'O campo RG é obrigatório.',
                'numeric' => 'O campo RG deve conter apenas números.',
                'exact_length' => 'O campo RG deve conter 9 caracteres.',

            ],

            'USC_LOGRADOURO' => [
                
                'required' => 'O campo logradouro é obrigatório.',
                'min_length' => 'O campo logradouro requer no mínimo 3 caracteres.',
                'max_length' => 'O campo logradouro aceita no máximo 200 caracteres.',
                'string' => 'O campo logradouro deve conter apenas letras.',

            ],

            'USC_NUMERO' => [
                
                'numeric' => 'O campo número deve conter apenas números.',
                'required' => 'O campo número é obrigatório.',
                'max_length' => 'O campo número aceita no máximo 10 caracteres.',

            ],


        ];

        public function verificarHash($hash){
            $builder = $this->db->table('usuario_comum');
            $builder->select("USC_HASH_REC, USC_NOME, USC_UPDATE_AT");
            $builder->where('USC_HASH_REC', $hash);

            $result = $builder->get();
            if( count($result->getResultArray()) == 1 ){
                return $result->getRowArray();
            }else{
                return false;
            }
        }

        public function atualizarSenha($hash, $pwd){
            $builder = $this->db->table('usuario_comum');
            $builder->where('USC_HASH_REC', $hash);
            $builder->update(['USC_SENHA'=>$pwd]);

            if( $this->db->affectedRows() == 1 ){
                return true;
            }else{
                return false;
            }
        }

    }

?>