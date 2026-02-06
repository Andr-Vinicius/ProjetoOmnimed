<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="theme-color" content="#006465" />

    <title>Omnimed | Consulta Online</title>
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

            <!-- <a href="index.html"><img src="/Assets/images/common/logo_completa_2.png" alt="" class="logo_inicio"></a> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="../../index.php" class="logo me-auto"><img src="/Assets/images/common/logo_completa_2.png" alt="" class="img-fluid"></a>

            <a href="/" class="appointment-btn scrollto"><span class=" d-md-inline">Perfil</a>
            <!--<a href="create_agendamento.php" class="appointment-btn scrollto"><span class=" d-md-inline">Agendar CONSULTA</a>-->

        </div>
    </header>
    <!-- End Header -->

    <main id="main">

        <!-- ======= Appointment Section ======= -->
        <section id="appointment" class="appointment section-bg">
            <div class="container">

                <div class="section-title margem">
                    <h2>Consulta online</h2>
                </div>

                <form action="/consultas/salvar" method="post" role="form" class="php-email-form">
                    <hr />
                    <br />

                    <div class="row">
                        <div class="text-center">
                            <h4>Informações da Consulta</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label>Anotações</label>
                            <input type="text" name="CNS_ANOTACOES" class="form-control" id="sintomas" placeholder="Febre, dor de cabeça, dor no corpo, etc." required="" maxlength="255">

                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-12">
                            <label>Sintomas do Paciente</label>
                            <input type="text" name="CNS_SINTOMAS_IDENTIFICADOS" class="form-control" id="sintomas" placeholder="Febre, dor de cabeça, dor no corpo, etc." required="" maxlength="255">

                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-6">
                            <label>Diagnóstico</label>
                            <input type="text" name="CNS_DIAGNOSTICO" class="form-control" id="sintomas" required="" placeholder="Gripe, dengue, infecção, etc." maxlength="255">

                        </div>
                        <div class="col-6">
                            <label>Data da consulta</label>
                            <input type="date" name="CNS_DATA" class="form-control" id="data" required="">
                        </div>
                    </div>

                    <!-- ======= COMO PRECISO DO AGENDAMENTO DEIXEI UMA VARIAVEL PADRAO PARA REPRESENTAÇÂO ======= -->
                    <input type="hidden" value="1" name="FK_AGENDAMENTOS_AGD_ID" />

                    <div class="mb-3">
                        <div class="loading">Carregando</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Sua informações sobre a consulta foram salvas. Muito obrigado!</div>
                    </div>
                    <div class="row-md-6 form-group mt-3">
                        <div class="text-center"><button type="submit">Salvar informações</button></div>
                        <div class="validate"></div>
                    </div>

                </form>
                <br />
                <hr />
                <div class="row">
                    <div class="text-center">
                        <h4>Prescrições</h4>
                        <!-- Encaminhar para a página de criação de prescrições passando o ID -->
                        <a href='/prescricoes/novo/1' type="submit" class='btn btn-outline-light' style="border: 2px solid #0c7d78; color:#0c7d78;">
                            <i class="fa-solid fa-file-lines"></i> Adicionar Prescrição
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Appointment Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">

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
    </footer>
    <!-- End Footer -->

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