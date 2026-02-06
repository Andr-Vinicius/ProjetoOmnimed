<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: /login");
    exit;
} elseif (!isset($_SESSION["usuario"]["email"])) {
    header("Location: /");
    exit;
}

use App\Models\PacientesModel;
use App\Models\UsuarioComumModel;

$FK_PACIENTE_PAC_ID = $_SESSION["usuario"]['id'];

$pacienteModel = new PacientesModel();
$paciente = $pacienteModel->obterPacientePorFKUsuarioComum($FK_PACIENTE_PAC_ID);

$usuarioComumModel = new UsuarioComumModel();
$usuarioComum = $usuarioComumModel->find($_SESSION['usuario']['id']);

// Inicia a conexão com o DB
$db = db_connect();
// Prepara a query e, então, recebe os resultados
// Este select recebe somente os nomes de cada médico cadastrado
$query = $db->query('SELECT u.USC_NOME, m.MED_ID FROM medicos as m, funcionarios as f, usuario_comum as u WHERE m.FK_FUNCIONARIOS_FUN_ID = f.FUN_ID AND f.FK_USUARIO_COMUM_USC_ID = u.USC_ID;');
$results = $query->getResult();

// Fecha a conexão com o DB
$db->close();

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

            <!-- <a href="index.html"><img src="assets/images/common/logo_completa_2.png" alt="" class="logo_inicio"></a> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="../../index.html" class="logo me-auto"><img src="/Assets/images/common/logo_completa_2.png" alt="" class="img-fluid"></a>

            <a href="/pacientes/logado" class="appointment-btn scrollto"><span class=" d-md-inline">Perfil</a>

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Appointment Section ======= -->
        <section id="appointment" class="appointment section-bg">
            <div class="container">

                <div class="section-title margem">
                    <h2>Solicitar Exame</h2>
                    <p>Para agendar um exame, preencha os campos abaixo com as suas informações.</p>
                </div>

                <a href="/pacientes/logado" class="appointment-btn scrollto">Voltar</a>
                <br />
                <br />

                <form action="/exames/salvar" method="post" role="form" class="php-email-form">

                    <div class="row">
                        <input type="hidden" name="FK_PACIENTES_PAC_ID" value="<?php echo $_SESSION["usuario"]['id']; ?>">
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="text" name="nomecompleto" class="form-control" id="nomecompleto" placeholder="Nome Completo" disabled value="<?php echo $usuarioComum->USC_NOME ?>">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="text" name="EXM_NOME" class="form-control" id="nomedoexame" placeholder="Nome do Exame">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <select class="form-control select" name="FK_MEDICOS_MED_ID" id="medicoid" required>
                                <option disabled selected>Médico Responsável</option>
                                <?php
                                // Itera por todos os resultados recebidos no select
                                foreach ($results as $row) {
                                    // Mostra o nome associado ao médico.
                                    echo '<option value="' . $row->MED_ID . '"> ' . $row->USC_NOME . ' </option>';
                                }
                                ?>
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3">
                            <input type="file" name="EXM_ANEXO_GUIA" class="form-control" title="Insira o arquivo da guia do exame" id="guiaexame" accept=".pdf">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-8 form-group mt-3">
                            <input type="text" name="EXM_OBS_PACIENTE" class="form-control" id="observacaoexame" placeholder="Observações">
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Carregando</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Seu exame foi solicitado. Muito obrigado!<br></div>
                    </div>
                    <div class="text-center"><button type="submit" id="cadastrarExame">Solicitar Exame</button></div>
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

                    <!--<div class="col-lg-3 col-md-6 footer-links">
<h4>Nossos Serviços</h4>
<ul>
<li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Consulta Online</a></li>
<li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Prescrição de Medicamentos</a></li>
<li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Encaminhamento para Exames</a></li>
<li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Controle de Pacientes</a></li>
<li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Gestão de Funcionários</a></li>
</ul>
</div>-->

                    <div class="col-lg-3 col-md-6 footer-links"></div>

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

</body>

</html>