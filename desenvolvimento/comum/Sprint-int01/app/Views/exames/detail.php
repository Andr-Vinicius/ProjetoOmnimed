<?php
session_start();
// Somente ADMs podem acessar a página.
// Checa primeiro se está logado, caso não, redireciona pra login;
// Depois checa se está logado e é um ADM. Caso não, redireciona pro index.
if (!isset($_SESSION["usuario"])) {
    header("Location: /login");
    exit;
} elseif (!isset($_SESSION["usuario"]["prontuario"])) {
    header("Location: /");
    exit;
} elseif (substr($_SESSION["usuario"]["prontuario"], 0, 2) !== "AD") {
    // Feito como um elseif ao invés de um "OU" na condição anterior para garantir que 
    // a variável existe, afim de compará-la
    header("Location: /");
    exit;
}

use App\Models\ExamesModel;
use App\Entities\Exames;

$exames = new Exames();
$examesModel = new ExamesModel();
$exames = $examesModel->obterExamePorId($id);

?>

<!DOCTYPE html>
<html lang="en">

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
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <a href="/" class="logo me-auto"><img src="/Assets/images/common/logo_completa_2.png" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Início</a></li>
                    <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
                    <li><a class="nav-link scrollto" href="#services">Serviços</a></li>
                    <li><a class="nav-link scrollto" href="#departments">Especialidades</a></li>
                    <li><a class="nav-link scrollto" href="#">Cadastro de Usuário</a></li>
                    <li class="dropdown"><a href="#"><span>Departamentos</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Médico</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="create_agendamento.php">Agendar CONSULTA</a></li>
                                    <li><a href="view_agendamentos.php">Ver Agendamentos</a></li>
                                    <li><a href="view_agendamentos_solicitados.php">Ver Agendamentos Solicitados</a></li>
                                    <li><a href="view_consultas.php">Ver Consultas</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Administrativo</a></li>
                            <li><a href="#contact">Fale Conosco</a></li>
                            <li><a href="#">Telemarketing</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="create_agendamento.php" class="appointment-btn scrollto"><span class=" d-md-inline">Agendar CONSULTA</a>

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Appointment Section ======= -->
        <section id="appointment" class="appointment section-bg">
            <div class="container">
                <div class="section-title margem">
                    <h2>Visualizar detalhes do AGENDAMENTO</h2>
                    <p>Abaixo, as informações do agendamento selecionado.</p>
                </div>

                <a href="/exames/listagem_solicitados" class="appointment-btn scrollto">Voltar</a>
                <br />
                <br />

                <form action="/exames/autorizar" method="post" role="form" class="php-email-form">
                    <input type="hidden" class="form-control" name="EXM_ID" id="idExame" value="<?php echo $exames->EXM_ID; ?>">
                    <div class="row">
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            Nome completo do paciente
                            <input type="text" name="PAC_ID" class="form-control" id="nomecompleto" disabled value="<?php echo $exames->PAC_NOME; ?>">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            Anexo da guia
                            <div class="input-group mb-3">
                                <input type="text" name="EXM_ANEXO_GUIA" class="form-control" id="anexoguia" disabled value="<?php echo $exames->EXM_ANEXO_GUIA; ?>">
                                <a class="input-group-text" href="/exames/baixar/1/<?php echo $exames->EXM_ANEXO_GUIA; ?>" id="baixar"><span class="bi bi-download"></span></a>
                            </div>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            Médico
                            <input type="text" name="MED_USC_NOME" class="form-control" id="nomemedico" disabled value="<?php echo $exames->MED_NOME; ?>">
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mt-3">
                            <?php if ($exames->EXM_AUTORIZADO == 1) { ?>
                                Precisa de Agendamento?
                                <input type="hidden" name="EXM_AGENDAMENTO" class="form-control datepicker" id="date" value="<?php echo $exames->EXM_AGENDAMENTO; ?>">

                                <input type="radio" class="" name="agendamento" value="nao" id="nao" checked> Não
                                <input type="radio" class="" name="agendamento" value="sim" id="sim"> Sim
                            <?php } else { ?>
                                Agendamento
                                <input type="text" name="EXM_AGENDAMENTO" class="form-control datepicker" id="date" disabled value="<?php echo $exames->EXM_AGENDAMENTO; ?>">
                            <?php } ?>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            Observação do Paciente
                            <input type="text" name="EXM_OBS_PACIENTE" class="form-control" id="observacaoexame" placeholder="Observações" disabled value="<?php echo $exames->EXM_OBS_PACIENTE; ?>">
                            <div class="validate"></div>
                        </div>
                        <div class="form-group col-md-12 mt-3">
                            Observação Adicional
                            <?php if ($exames->EXM_AUTORIZADO == 1) { ?>
                                <input type="text" name="EXM_OBS_SECRETARIO" class="form-control" id="observacaosecretario" placeholder="Observações Adicionais">
                            <?php } else { ?>
                                <input type="text" name="EXM_OBS_SECRETARIO" class="form-control" id="observacaosecretario" placeholder="Observações Adicionais" disabled value="<?php echo $exames->EXM_OBS_SECRETARIO; ?>">
                            <?php } ?>
                            <div class="validate"></div>
                        </div>
                        <?php if ($exames->EXM_AUTORIZADO == 1) { ?>
                            <div class="text-center">
                                <input type="radio" name="EXM_AUTORIZADO" id="sim" value="2">Aprovar
                                <input type="radio" name="EXM_AUTORIZADO" id="nao" value="0">Reprovar
                            </div>
                            <div class="text-center">
                                </br><button type="submit">Confirmar</button>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Carregando</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Suas alterações foram alteradas. Muito obrigado!</div>
                            </div>
                        <?php } elseif ($exames->EXM_AUTORIZADO == 0) { ?>
                            <div class="text-center">
                                </br>
                                <h2>Status: Não autorizado</h2>
                            </div>
                        <?php } else { ?>
                            <div class="text-center">
                                </br>
                                <h2>Status: Autorizado</h2>
                            </div>
                        <?php } ?>
                </form>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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

    <script>
        $(document).on('click', 'input[name = "agendamento"]', function() {
            //alert($('#sim').prop('checked', true));

            if ($('#sim').is(':checked')) {
                $('#date').attr('type', 'text');

            } else if ($('#nao').is(':checked')) {
                $('#date').attr('type', 'hidden');
                $('#date').attr('value', '<?php echo $exames->EXM_AGENDAMENTO; ?>');
            }
        });
    </script>

</body>

</html>