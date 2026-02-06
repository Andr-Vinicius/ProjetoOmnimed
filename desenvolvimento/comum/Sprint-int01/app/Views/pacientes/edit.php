<?php

use App\Entities\Responsaveis;
use App\Entities\UsuarioComum;
use App\Models\ResponsaveisModel;
use App\Models\UsuarioComumModel;

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: /login");
    exit;
} elseif (!isset($_SESSION["usuario"]["email"])) {
    header("Location: /");
    exit;
} elseif (!($_SESSION["usuario"]["id"] === $id)) {
    header("Location: /");
    exit;
}

$usuario = new UsuarioComum();

$usuariosModel = new UsuarioComumModel();
$usuario = $usuariosModel->find($id);

$responsavel = new Responsaveis();

$responsavelModel = new ResponsaveisModel();
$responsavel = $responsavelModel->obterDadosPorIdPaciente($id);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="theme-color" content="#006465" />

    <title>Omnimed</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/Assets/images/common/logo_icon.png" rel="icon">
    <link href="/Assets/images/common/logo_apple_touch_icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <!-- Vendor CSS Files -->
    <link href="/Assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/Assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/Assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/Assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/Assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/Assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/Assets/css/common/style.css" rel="stylesheet">
    <script src="/Assets/js/mod01/teste.js"></script>
    <!-- =======================================================
  * Template Name: Medilab - v4.7.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->



</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope"></i> <a href="mailto:omnimed@gmail.com">omnimed@gmail.com</a>
                <i class="bi bi-phone"></i> +55 019987654321
            </div>
            <div class="d-none d-lg-flex social-links align-items-center">
                <a href="#" class="twitter" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <!-- <a href="index.html"><img src="assets/img/logo_completa_2.png" alt="" class="logo_inicio"></a> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/" class="logo me-auto"><img src="/Assets/images/common/logo_completa_2.png" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Início</a></li>
                    <li class="drpodown"><a href="/sobre_projeto">Sobre o Projeto</a></li>
                    <li><a href="#contact">Contato</a></li>

                    <li class="dropdown"><a href="#"><span>Departamentos</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Médico</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="formConsulta.html">Marcar uma CONSULTA</a></li>
                                    <li><a href="#">Ver Consultas</a></li>
                                    <li><a href="listagemMedicos.html">Ver Médicos</a></li>
                                    <li><a href="#">Ver Planos</a></li>
                                </ul>
                            </li>

                            <li class="dropdown"><a href="#"><span>Administrativo</span><i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="/funcionarios/listagem">Ver Funcionários</a></li>
                                    <li><a href="/contatos_setoriais/listagem">Contatos Setoriais</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Link primário</a>
                </div>
                <div class="col-sm">
                    <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Link primário</a>
                </div>
                <div class="col-sm">
                    <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Link primário</a>
                </div>
            </div>
        </div>
        <!-- ======= Register Section ======= -->
        <section id="register" class="register section-bg">
            <div class="container">

                <div class="section-title">
                    <br><br><br><br>
                    <h2>Editar Informações de paciente</h2>
                    <p>Para editar as informações pessoais, preencha os campos abaixo que deseja alterar</p>
                </div>

                <form action="/pacientes/atualizar/<?php echo $usuario->PAC_ID; ?>" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <input name="PAC_ID" value="<?php echo $usuario->PAC_ID ?>" hidden>
                        <form>
                            <div class="row">
                                <div class="col-md-3 control-label">
                                    <p class="help-block">
                                        <h11>*</h11> Campo Obrigatório
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="NomeCompleto">Nome <h11>*</h11>:</label>
                                    <input type="text" class="form-control" id="USC_NOME" placeholder="Informe seu nome completo" value="<?php echo $usuario->USC_NOME ?>" maxlength="200" required>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-3">
                                    <label for="Data">Data de Nascimento <h11>*</h11>:</label>
                                    <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" value="<?php echo $usuario->USC_DATA_NASCIMENTO ?>" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-3">
                                    <label for="Sexo">Sexo <h11>*</h11>:</label>
                                    <select name="sexo" id="USC_SEXO" value="<?php echo $usuario->USC_SEXO ?>" class="form-select">
                                        <option value="<?php echo $usuario->USC_SEXO ?>">Selecione...</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Feminino</option>
                                        <option value="3">Outro</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="row" style="padding-top: 10px;">
                                <div class="col-md-2">
                                    <label for="CPF">CPF <h11>*</h11>:</label>
                                    <input id="USC_CPF" name="cpf" placeholder="Apenas números" value="<?php echo $usuario->USC_CPF ?>" class="form-control input-md" required="" type="text" maxlength="11" OnKeyPress="formatar('###########', this)" pattern="[0-9]+$">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-2">
                                    <label for="RG">RG <h11>*</h11>:</label>
                                    <input id="USC_RG" name="rg" placeholder="Apenas números" value="<?php echo $usuario->USC_RG ?>" class="form-control input-md" required="" type="text" maxlength="9" OnKeyPress="formatar('#########', this)" pattern="[0-9]+$">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-2">
                                    <label for="OrgaoEmissor">Orgão Emissor <h11>*</h11></label>
                                    <input id="USC_ORGAOEMISSOR" name="OrgaoEmissor" value="<?php echo $usuario->USC_ORGAO_EMISSOR ?>" class="form-control input-md" required="" type="text" maxlength="12">
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="row" style="padding-top: 10px;">
                                <div class="col-md-3">
                                    <label for="Logradouro">Logradouro <h11>*</h11>:</label>
                                    <input type="text" class="form-control" id="USC_LOGRADOURO" value="<?php echo $usuario->USC_LOGRADOURO ?>" maxlength="200" required>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-1">
                                    <label for="Numero">Numero <h11>*</h11>:</label>
                                    <input type="text" class="form-control" id="USC_NUMERO" value="<?php echo $usuario->USC_NUMERO ?>" maxlenght="10" required>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-3">
                                    <label for="OrgaoEmissor">Bairro <h11>*</h11>:</label>
                                    <input type="text" class="form-control" id="USC_BAIRRO" value="<?php echo $usuario->USC_BAIRRO ?>" maxlengh="20" required>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-3">
                                    <label for="Cidade">Cidade <h11>*</h11>:</label>
                                    <input type="text" class="form-control" id="USC_CIDADE" value="<?php echo $usuario->USC_CIDADE ?>" maxlengh="200" required>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-2">
                                    <label for="Estado">Estado <h11>*</h11>:</label>
                                    <select name="estado" id="USC_ESTADO" value="<?php echo $usuario->USC_ESTADO ?>" class="form-select">
                                        <option value="<?php echo $usuario->USC_ESTADO ?>">Selecione...</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="row" style="padding-top: 10px;">
                                <div class="col-md-2">
                                    <label for="TelefoneCelular">Telefone Celular <h11>*</h11> :</label>
                                    <input type="text" class="form-control" id="USC_TELEFONE" value="<?php echo $responsavel['RES_TEL_CELULAR1'] ?>" placeholder="XX XXXXX-XXXX" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" OnKeyPress="formatar('## #####-####', this)">
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="row" style="padding-top: 10px;">
                                <label for="Filhos">Possui Filhos? <h11>*</h11></label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <label class="radio-inline" for="radios-0">
                                                <input type="radio" name="filhos" id="filhos" value="nao" onclick="desabilita('filhos_qtd')" required>
                                                <div class="validate"></div>
                                                Não
                                            </label>
                                            <label class="radio-inline" for="radios-1">
                                                <input type="radio" name="filhos" id="filhos" value="sim" onclick="habilita('filhos_qtd')">
                                                Sim
                                            </label>
                                        </span>
                                        <div class="col-md-12">
                                            <input id="filhos_qtd" value="<?php echo $responsavel['RES_QTD_FILHOS'] ?>" name="filhos_qtd" class="form-control" type="text" placeholder="Quantos?" pattern="[0-9]+$">
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p></p>
                            <div class="row">
                                <label for="Doencas">Possui doenças crônicas? <h11>*</h11></label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <label class="radio-inline" for="radios-0">
                                                <input type="radio" name="doencas" id="USC_DOENCAS" value="nao" onclick="desabilita('doencas_qtd')" required>
                                                <div class="validate"></div>
                                                Não
                                            </label>
                                            <label class="radio-inline" for="radios-1">
                                                <input type="radio" name="doencas" id="USC_DOENCAS" value="sim" onclick="habilita('doencas_qtd')">
                                                Sim
                                            </label>
                                        </span>
                                        <div class="col-md-12">
                                            <input id="doencas_qtd" value="<?php echo $responsavel['RES_QUAIS_DOENCAS_CRONICAS'] ?>" name="doencas_qtd" class="form-control" type="text" placeholder="Quais?">
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p></p>
                            <div class="row">
                                <label for="Tratamento">Realiza tratamento médico? <h11>*</h11></label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <label class="radio-inline" for="radios-0">
                                                <input type="radio" name="tratamento" id="USC_TRATAMENTO" value="nao" onclick="desabilita('tratamento')" required>
                                                <div class="validate"></div>
                                                Não
                                            </label>
                                            <label class="radio-inline" for="radios-1">
                                                <input type="radio" name="tratamento" id="USC_TRATAMENTO" value="sim" onclick="habilita('tratamento')">
                                                Sim
                                            </label>
                                        </span>
                                        <div class="col-md-12">
                                            <input id="tratamento" value="<?php echo $responsavel['RES_QUAIS_TRAT_MED'] ?>" name="tratamento" class="form-control" type="text" placeholder="Quais?">
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p></p>
                            <div class="row">
                                <label for="Tratamento">Faz o uso de medicações? <h11>*</h11></label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <label class="radio-inline" for="radios-0">
                                                <input type="radio" name="medicacao" id="USC_MEDICACAO" value="nao" onclick="desabilita('medicacao')" required>
                                                <div class="validate"></div>
                                                Não
                                            </label>
                                            <label class="radio-inline" for="radios-1">
                                                <input type="radio" name="medicacao" id="USC_MEDICACAO" value="sim" onclick="habilita('medicacao')">
                                                Sim
                                            </label>
                                        </span>
                                        <div class="col-md-12">
                                            <input id="medicacao" value="<?php echo $responsavel['RES_QUAL_MEDICACAO'] ?>" name="medicacao" class="form-control" type="text" placeholder="Quais?">
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p></p>
                            <div class="row">
                                <label for="Tratamento">Possui alergia a alguma medicação? <h11>*</h11></label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <label class="radio-inline" for="radios-0">
                                                <input type="radio" name="alergia" id="USC_ALERGIA" value="nao" onclick="desabilita('alergia')" required>
                                                <div class="validate"></div>
                                                Não
                                            </label>
                                            <label class="radio-inline" for="radios-1">
                                                <input type="radio" name="alergia" id="USC_ALERGIA" value="sim" onclick="habilita('alergia')">
                                                Sim
                                            </label>
                                        </span>
                                        <div class="col-md-12">
                                            <input id="alergia" value="<?php echo $responsavel['RES_QUAIS_ALERGIAS'] ?>" name="alergia" class="form-control" type="text" placeholder="Quais?">
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p></p>
                            <div class="form-group">
                                <label for="inputEmail" class="control-label">Email <h11>*</h11>:</label>
                                <input type="email" class="form-control" id="USC_EMAIL" placeholder="Email" value="<?php echo $responsavel['PAC_EMAIL'] ?>" data-error="Endereço de e-mail invalido!" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <p></p>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Cadastrar"></label>
                                <div class="col-md-8">
                                    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Editar</button>
                                    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Carregando</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Seu cadastro foi efetuado. Muito obrigado!</div>
                            </div>
                            <div class="text-center">
                                <a href="/pacientes/logado">
                                    <button type="submit" style="border:none; margin: 0 auto;" class="appointment-btn scrollto">Salvar Alterações</button>
                            </div>
                            </a>
                        </form>
                        <br>
                        <div class="text-center">
                            <a href="/pacientes/logado">
                                <button style="border:none; margin: 0 auto;" class="appointment-btn scrollto">Voltar</button>
                            </a>
                        </div>
                    </div>
        </section><!-- End Appointment Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Omnimed</h3>
                        <p>
                            Av Marginal 585 Fazenda Nossa Senhora Aparecida do Jaguari, 13871-298 <br>
                            São João da Boa Vista - SP<br>
                            Brasil <br><br>
                            <strong>Fone:</strong> +55 019987654321<br>
                            <strong>Email:</strong> omnimed@gmail.com<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Links Úteis</h4>
                        <ul>
                            <li><i class="btn-footer bx bx-chevron-right"></i> <a href="/">Início</a></li>
                            <li><i class="btn-footer bx bx-chevron-right"></i> <a href="/sobre_projeto">Sobre Nós</a></li>
                            <li><i class="btn-footer bx bx-chevron-right"></i> <a href="/#services">Serviços</a></li>
                            <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Termos de Serviço</a></li>
                            <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Política de Privacidade</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Nossos Serviços</h4>
                        <ul>
                            <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Consulta Online</a></li>
                            <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Prescrição de Medicamentos</a></li>
                            <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Encaminhamento para Exames</a></li>
                            <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Controle de Pacientes</a></li>
                            <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Gestão de Funcionários</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Se inscreva no nosso newsletter!</h4>
                        <p>Fique por dentro de todas a notícias do mundo da medicina.</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Inscrever">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="btn-toTop back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/Assets/vendor/purecounter/purecounter.js"></script>
    <script src="/Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/Assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/Assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/Assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/Assets/js/common/main.js"></script>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/7751608a2d.js" crossorigin="anonymous"></script>
</body>

</html>