<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Omnimed | Consulta Online</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="../../assets/images/common/logo_icon.png" rel="icon">
        <link href="../../assets/images/common/logo_apple_touch_icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="../../assets/css/common/style.css" rel="stylesheet">

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

            <!-- <a href="index.html"><img src="../../assets/images/common/logo_completa_2.png" alt="" class="logo_inicio"></a> -->
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="../../index.php" class="logo me-auto"><img src="../../assets/images/common/logo_completa_2.png" alt="" class="img-fluid"></a>

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
                </nav>
                <!-- .navbar -->

                <a href="create_agendamento.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Agendar CONSULTA</a>

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

                    <form action="../../controller/ConsultaController.php" method="post" role="form" class="php-email-form">
                       <hr/>
                       <br/>
                        <div class="row">
                            <div class="text-center">
                                <h4>Informações da Consulta</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label>Sintomas do Paciente</label>
                                <input type="text" name="sintomas" class="form-control" id="sintomas" placeholder="Febre, dor de cabeça, dor no corpo, etc." required="">

                            </div>
                        </div>
                       <br/>
                        <div class="row">
                            <div class="col-6">
                                <label>Diagnóstico</label>
                                <input type="text" name="sintomas" class="form-control" id="sintomas" required="" placeholder="Gripe, dengue, infecção, etc.">

                            </div>
                            <div class="col-6">
                                <label>Data da consulta</label>
                                <input type="date" name="data" class="form-control" id="data" required="">
                            </div>
                        </div>

                        <!-- ======= COMO PRECISO DO AGENDAMENTO DEIXEI UMA VARIAVEL PADRAO PARA REPRESENTAÇÂO ======= -->
                        <input type="hidden" value="1" name="fk_agendamento"/>
                        <input type="hidden" value="1" name="fk_medico"/>
                        <input type="hidden" value="1" name="fk_paciente"/>

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
                    <br/>
                    <hr/>
                    <div class="row">
                        <div class="text-center">
                            <h4>Prescrições</h4>
                            <!-- Encaminhar para a página de criação de prescrições passando o ID -->
                            <a href='#&id=' type="submit" class='btn btn-outline-light'  style="border: 2px solid #0c7d78; color:#0c7d78;">
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
        <script src="../../assets/vendor/purecounter/purecounter.js"></script>
        <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>

        <script src="../../assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="../../assets/js/common/main.js"></script>

        <!-- FontAwesome Icons -->
        <script src="https://kit.fontawesome.com/7751608a2d.js" crossorigin="anonymous"></script>
    </body>

</html>