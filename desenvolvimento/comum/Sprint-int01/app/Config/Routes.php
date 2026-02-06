<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/sobre_projeto', 'SobreProjetoController::listagem');
$routes->post('/enviarEmail/enviar', 'EmailController::enviar');

$routes->get('/beneficios/novo', 'BeneficiosController::novo');
$routes->get('/beneficios/listagem', 'BeneficiosController::listagem');
$routes->get('/beneficios/editar/(:num)', 'BeneficiosController::editar/$1');
$routes->get('/beneficios/excluir/(:num)', 'BeneficiosController::excluir/$1');
$routes->post('/beneficios/salvar', 'BeneficiosController::salvar');

$routes->get('/finalidades/novo', 'FinalidadesController::novo');
$routes->get('/finalidades/listagem', 'FinalidadesController::listagem');
$routes->get('/finalidades/editar/(:num)', 'FinalidadesController::editar/$1');
$routes->post('/finalidades/excluir/(:num)', 'FinalidadesController::excluir/$1');
$routes->post('/finalidades/salvar', 'FinalidadesController::salvar');

$routes->post('/usoRemedios/editar', 'UsoRemediosController::editar');
$routes->post('/usoRemedios/excluir', 'UsoRemediosController::excluir');

$routes->get('/especialidades_medicas/novo', 'EspecialidadesMedicasController::novo');
$routes->get('/especialidades_medicas/listagem', 'EspecialidadesMedicasController::listagem');
$routes->get('/especialidades_medicas/editar/(:num)', 'EspecialidadesMedicasController::editar/$1');
$routes->post('/especialidades_medicas/excluir/(:num)', 'EspecialidadesMedicasController::excluir/$1');
$routes->post('/especialidades_medicas/salvar', 'EspecialidadesMedicasController::salvar');

$routes->get('/agendamentos/novo', 'AgendamentosController::novo');
$routes->get('/agendamentos/editar/(:num)', 'AgendamentosController::editar/$1');
$routes->post('/agendamentos/editar_agendamento', 'AgendamentosController::editar_agendamento');
$routes->get('/agendamentos/listagem_solicitados', 'AgendamentosController::listagem_solicitados');
$routes->get('/agendamentos/listagem', 'AgendamentosController::listagem');
$routes->get('/agendamentos/cancelar/(:num)', 'AgendamentosController::cancelar/$1');
$routes->get('/agendamentos/confirmar/(:num)', 'AgendamentosController::confirmar/$1');
$routes->get('/agendamentos/detalhar/(:num)', 'AgendamentosController::detalhar/$1');
$routes->post('/agendamentos/salvar', 'AgendamentosController::salvar');
$routes->post('/agendamentos/confirmar_agendamento', 'AgendamentosController::confirmar_agendamento');
$routes->get('/agendamentos/dia/(:any)', 'AgendamentosController::listagem_dia_data/$1');
$routes->get('/agendamentos/dia', 'AgendamentosController::listagem_dia');

$routes->get('/consultas/novo', 'ConsultaController::novo');
$routes->post('/consulta/salvar', 'ConsultaController::salvar');
$routes->get('/consulta/listagem_paciente', 'ConsultaController::listagem_paciente');
$routes->get('/consulta/listagem_historico', 'ConsultaController::listagem_historico');
$routes->get('/consulta/detalhar/(:num)', 'ConsultaController::detalhar/$1');
$routes->get('/consulta/anotacao/(:num)', 'ConsultaController::anotacao/$1');
$routes->post('/consulta/salvarnota', 'ConsultaController::salvarNota');

$routes->get('/planos/novo', 'PlanosController::novo');
$routes->get('/planos/listagem', 'PlanosController::listagem');
$routes->get('/planos/editar/(:num)', 'PlanosController::editar/$1');
$routes->post('/planos/excluir/(:num)', 'PlanosController::excluir/$1');
$routes->post('/planos/criar', 'PlanosController::criar');
$routes->post('/planos/salvarEdicao', 'PlanosController::salvarEdicao');

$routes->post('/valoresDependentes/editar', 'ValoresDependentesController::editar');
$routes->post('/valoresDependentes/excluir', 'ValoresDependentesController::excluir');

$routes->post('/planosBeneficios/editar', 'PlanosBeneficiosController::editar');
$routes->post('/planosBeneficios/excluir', 'PlanosBeneficiosController::excluir');

$routes->get('/remedios/novo', 'RemediosController::novo');
$routes->get('/remedios/listagem', 'RemediosController::listagem');
$routes->get('/remedios/listagem_disponivel', 'RemediosController::listagemRemediosDisponiveis');
$routes->get('/remedios/salvar_quantidade/(:num)/(:num)', 'RemediosController::salvarQuantidade/$1/$2');
$routes->get('/remedios/editar/(:num)', 'RemediosController::editar/$1');
$routes->get('/remedios/excluir/(:num)', 'RemediosController::excluir/$1');
$routes->post('/remedios/criar', 'RemediosController::criar');
$routes->post('/remedios/salvarEdicao', 'RemediosController::salvarEdicao');

$routes->get('/login', 'LoginController::novo');
$routes->post('/login/logar', 'LoginController::logar');

$routes->get('/recuperar_senha', 'EmailController::recuperar');
$routes->get('/recuperar_senha/recuperar/(:alphanum)', 'EmailController::novaSenhaView/$1');
$routes->post('/recuperar_senha/confirmarSenha/(:alphanum)', 'EmailController::novaSenha/$1');
$routes->post('/recuperar_senha/enviar_email', 'EmailController::envioRecuperar');

$routes->get('/funcionarios/novo', 'FuncionariosController::novo');
$routes->get('/funcionarios/listagem', 'FuncionariosController::listagem');
$routes->get('/funcionarios/listar/(:num)', 'FuncionariosController::listar/$1');
$routes->get('/funcionarios/editar/(:num)', 'FuncionariosController::editar/$1');
$routes->get('/funcionarios/excluir/(:num)', 'FuncionariosController::excluir/$1');
$routes->post('/funcionarios/salvar', 'FuncionariosController::salvar');
$routes->post('/funcionarios/atualizar/(:num)', 'FuncionariosController::atualizar/$1');

$routes->get('/usuarios_comum/novo', 'UsuarioComumController::novo');
$routes->get('/usuarios_comum/listagem', 'UsuarioComumController::listagem');
$routes->get('/usuarios_comum/editar/(:num)', 'UsuarioComumController::editar/$1');
$routes->get('/usuarios_comum/excluir/(:num)', 'UsuarioComumController::excluir/$1');
$routes->post('/usuarios_comum/salvar', 'UsuarioComumController::salvar');

$routes->get('/contatos_setoriais/listagem', 'ContatosSetoriaisController::listagem');
$routes->get('/contatos_setoriais/novo', 'ContatosSetoriaisController::novo');
$routes->get('/contatos_setoriais/editar/(:num)', 'ContatosSetoriaisController::editar/$1');
$routes->get('/contatos_setoriais/excluir/(:num)', 'ContatosSetoriaisController::excluir/$1');
$routes->post('/contatos_setoriais/salvar', 'ContatosSetoriaisController::salvar');

$routes->get('/triagens/novo/(:num)', 'TriagensController::novo/$1');
$routes->get('/triagens/visualizar/(:num)', 'TriagensController::visualizar/$1');
$routes->get('/triagens/listagem', 'TriagensController::listagem');
$routes->post('/triagens/salvar', 'TriagensController::salvar');

$routes->get('/prescricoes/novo/(:num)', 'PrescricoesController::novo/$1');
$routes->get('/prescricoes/ver/(:num)', 'PrescricoesController::ver/$1');
$routes->post('/prescricoes/salvar', 'PrescricoesController::salvar');

$routes->get('/pacientes/novo', 'PacientesController::novo');
$routes->get('/pacientes/listagem', 'PacientesController::listagem');
$routes->get('/pacientes/editar/(:num)', 'PacientesController::editar/$1');
$routes->get('/pacientes/excluir/(:num)', 'PacientesController::excluir/$1');
$routes->post('/pacientes/salvar', 'PacientesController::salvar');
$routes->get('/pacientes/logado', 'PacientesController::logado');
$routes->post('/pacientes/atualizar/(:num)', 'PacientesController::atualizar/$1');

$routes->get('/enfermeiros/novo', 'EnfermeirosController::novo');
$routes->get('/enfermeiros/listagem', 'EnfermeirosController::listagem');
$routes->get('/enfermeiros/editar/(:num)', 'EnfermeirosController::editar/$1');
$routes->get('/enfermeiros/excluir/(:num)', 'EnfermeirosController::excluir/$1');
$routes->post('/enfermeiros/salvar', 'EnfermeirosController::salvar');
$routes->get('/enfermagem/logado', 'EnfermeirosController::logado');

$routes->get('/medicos/novo', 'MedicosController::novo');
$routes->get('/medicos/listagem', 'MedicosController::listagem');
$routes->get('/medicos/editar/(:num)', 'MedicosController::editar/$1');
$routes->get('/medicos/excluir/(:num)', 'MedicosController::excluir/$1');
$routes->post('/medicos/salvar', 'MedicosController::salvar');
$routes->get('/medicos/logado', 'MedicosController::logado');

$routes->get('/dependentes/novo', 'DependentesController::novo');
$routes->get('/dependentes/listagem', 'DependentesController::listagem');
$routes->get('/dependentes/editar/(:num)', 'DependentesController::editar/$1');
$routes->get('/dependentes/listar/(:num)', 'DependentesController::listar/$1');
$routes->post('/dependentes/excluir/(:num)', 'DependentesController::excluir/$1');
$routes->post('/dependentes/salvar', 'DependentesController::salvar');
$routes->post('/dependentes/atualizar/(:num)', 'DependentesController::atualizar/$1');

$routes->get('/administrativo/logado', 'AdministrativoController::logado');

$routes->get('/exames/novo', 'ExamesController::novo');
$routes->post('/exames/autorizar', 'ExamesController::autorizar');
$routes->post('/exames/salvar', 'ExamesController::salvar');
$routes->get('/exames/listagem', 'ExamesController::listagem');
$routes->get('/exames/listagem_solicitados', 'ExamesController::listagemAdm');
$routes->get('/exames/visualizar/(:num)', 'ExamesController::visualizar/$1');
$routes->get('/exames/baixar/(:num)/(:segment)', 'ExamesController::baixar/$1/$2');

$routes->get('/pagamentos/pacientes', 'PagamentosController::listarPacientes');
$routes->get('/pagamentos/pacientes/(:num)', 'PagamentosController::historicoPaciente/$1');
$routes->get('/pagamentos/pacientes/inadimplencias', 'PagamentosController::listarPacientesInadimplentes');
$routes->get('/pagamentos/pacientes/confirmar/(:num)/(:num)/(:num)', 'PagamentosController::confirmarPagamentoPaciente/$1/$2/$3');
$routes->get('/pagamentos/medicos', 'PagamentosController::listarMedicos');
$routes->get('/pagamentos/medicos/(:num)', 'PagamentosController::historicoMedico/$1');
$routes->get('/pagamentos/medicos/aberto', 'PagamentosController::listarMedicosAPagar');
$routes->get('/pagamentos/medicos/confirmar/(:num)', 'PagamentosController::confirmarPagamentoMedicos/$1');
$routes->get('/pagamentos/medicos/baixar/(:num)/(:num)', 'PagamentosController::downloadHistorico/$1/$2');

// PARA TESTES, REMOVER QUANDO O BOTÃO DE LOG OUT EXISTIR
$routes->get('/logout', 'LogoutController::logout');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
