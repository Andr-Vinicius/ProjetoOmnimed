<?php 

namespace App\Models;

use CodeIgniter\Model;

class ConsultasOnlineModel extends Model{
    protected $table ='consultas_online';
    protected $primaryKey = 'CNS_ID';

    protected $useAutoIncrement = true;
    protected $returnType = \App\Entities\ConsultasOnline::class;

      // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
      protected $allowedFields = ['CNS_DATA', 'CNS_ANOTACOES', 'CNS_SINTOMAS_IDENTIFICADOS', 'CNS_DIAGNOSTICO', 'FK_AGENDAMENTOS_AGD_ID'];

      // Regras de validação de campos is_unique[administrativo.ADM_TELEFONE_CELULAR,ADM_ID{ADM_ID}]
      protected $validationRules = [

          'CNS_DATA' => 'required',
          'CNS_ANOTACOES' => 'required|max_length[255]',
          'CNS_SINTOMAS_IDENTIFICADOS' => 'required|max_length[255]',
          'CNS_DIAGNOSTICO' => 'required|max_length[255]',
          'FK_AGENDAMENTOS_AGD_ID' => 'required|integer',

      ];

      // Mensagens de erro baseado na validação
      protected $validationMessages = [

          'CNS_DATA' => [
              
              'required' => 'O campo data de data é obrigatório.',

          ],

          'CNS_ANOTACOES' => [
              
              'required' => 'O campo anotações é obrigatório.',
              'max_length' => 'O campo anotações só pode ter até 255 caracteres',

          ],
          'CNS_SINTOMAS_IDENTIFICADOS' => [
              
            'required' => 'O campo sintomas é obrigatório.',
            'max_length' => 'O campo sintomas só pode ter até 255 caracteres',

        ],
        'CNS_DIAGNOSTICO' => [
              
            'required' => 'O campo diagnósticos é obrigatório.',
            'max_length' => 'O campo diagnósticos só pode ter até 255 caracteres',

        ],


          

      ];

      
      public function obterConsultaPorId(int $id){
          $query = $this->db->query("SELECT * FROM $this->table WHERE $this->table.CNS_ID = $id");

          $results = $query->getResult();

         
          return $results;

      }

      public function listar(){
          $query = $this->db->query("SELECT * FROM $this->table;");

          $results = $query->getResult();

          return $results;
      }

      public function detalhar($id) {
        return view('/consultas/detail.php', ['id' => $id]);
    }

    public function listarConsultasUltimos30Dias($idUsuario){
        
        $query = $this->db->query("SELECT 
        DISTINCT
        CNS_ID,
        CNS_DATA,
        uc.USC_NOME,
        esm.ESM_DESCRICAO
        FROM 
        consultas_online as cns,
        agendamentos as agd,
        funcionarios as fun,
        usuario_comum as uc,
        especialidades_medicas as esm,
        medicos as med
        WHERE 
        FK_AGENDAMENTOS_AGD_ID = agd.AGD_ID AND
        agd.FK_PACIENTES_PAC_ID = $idUsuario AND
        agd.FK_MEDICOS_MED_ID = med.MED_ID AND
        med.FK_FUNCIONARIOS_FUN_ID = fun.FUN_ID AND
        fun.FK_USUARIO_COMUM_USC_ID = uc.USC_ID AND
        agd.FK_ESPECIALIDADES_MEDICAS_ESM_ID = esm.ESM_ID AND
        cns.CNS_DATA BETWEEN ADDDATE(CURRENT_DATE, INTERVAL -1 MONTH) AND CURRENT_DATE();");

        $results = $query->getResult();
        return $results;
        //(extract(day FROM CNS_DATA) BETWEEN (extract(day from now()) - 30) and extract(day from now()))
    }

    //Função para a página de visualziação do histórico de consultas
    public function historicoConsultas(){
        $sql = "SELECT co.FK_AGENDAMENTOS_AGD_ID as 'idAgd', a.AGD_DATA AS 'DATA', a.`AGD_HORARIO` AS 'HORARIO', uc.USC_NOME AS 'NOME_PACIENTE', uc2.USC_NOME AS 'NOME_MEDICO', co.CNS_ANOTACOES AS ANOTACOES, co.CNS_ID AS ID FROM consultas_online AS co, agendamentos AS a, medicos AS m, pacientes AS p, funcionarios AS f, usuario_comum AS uc, usuario_comum AS uc2 WHERE a.FK_MEDICOS_MED_ID = m.MED_ID AND m.FK_FUNCIONARIOS_FUN_ID = f.FUN_ID AND f.FK_USUARIO_COMUM_USC_ID = uc2.USC_ID AND a.FK_PACIENTES_PAC_ID = p.PAC_ID AND p.FK_USUARIO_COMUM_USC_ID = uc.USC_ID AND a.AGD_ID = co.FK_AGENDAMENTOS_AGD_ID;";
        $db = db_connect();
        $query = $db->query($sql);
        $results = $query->getResult();
        $db->close();
        return $results;
    }

    public function editarNotas($nota,$id){

        //UPDATE `omnimed`.`consultas_online` SET `CNS_ANOTACOES` = 'Alta priori3333dade' WHERE (`CNS_ID` = '2');

        $sql = "UPDATE $this->table SET $this->table.CNS_ANOTACOES = '$nota' WHERE $this->table.CNS_ID = $id;";
        
        $db = db_connect();
        $query = $db->query($sql);
        $db->close();
        
        return $query;
    }

    public function obterConsultaPorIdAgd($id){

        $sql = "SELECT * FROM $table WHERE $this->table.FK_AGENDAMENTOS_AGD_ID = $id;";
        
        $db = db_connect();
        $query = $db->query($sql);
        $db->close();
        
        return $query;
    }

  }

?>