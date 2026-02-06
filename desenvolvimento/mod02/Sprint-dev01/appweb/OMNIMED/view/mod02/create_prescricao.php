<?php
    require_once __DIR__.'/../../DAO/RemedioDAO.php';
    $dao = new RemedioDAO();
    $remedios = $dao->listarRemedios();
?>

<!doctype html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta http-equiv="Content-Language" content="ptBR">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, inicial-scale=1, maximum-scale=1, user-scalabel=no, shrink-to-fit=no">

    <!-- Favicons -->
    <link href="../../assets/images/common/logo_icon.png" rel="icon">
    <link href="../../assets/images/common/logo_apple_touch_icon.png" rel="apple-touch-icon">

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

    <title>Omnimed | Registrar Prescrição</title>

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

            <!-- <a href="index.html"><img src="assets/img/logo_completa_2.png" alt="" class="logo_inicio"></a> -->
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
            </nav><!-- .navbar -->

            <a href="create_agendamento.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Agendar CONSULTA</a>

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Appointment Section ======= -->
        <section id="appointment" class="appointment section-bg">
            <div class="container">

                <div class="section-title margem">
                    <h2>Registrar Prescrição Médica</h2>
                </div>

                <form enctype="multipart/form-data" action="../../controller/PrescricaoController.php" method="POST" role="form" class="php-email-form">

                    <input type="hidden" name="consultas_online_cns_id" id="consultas_online_cns_id" value="1">
                    <input type="hidden" name="medicos_med_id" id="medicos_med_id" value="1">
                    <input type="hidden" name="pacientes_pac_id" id="pacientes_pac_id" value="1">

                    <div class="row">

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Duração do Tratamento</label><br />
                            <input class="form-control" type="text" name="duracao_tratamento" id="duracao_tratamento">
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Remédio</label><br />
                            <label class="form-label">Esquema Posológico</label><br />
                            <select name="remedio1">
                                <?php foreach ($remedios as $remedio) { ?>
                                    <option value=" <?php echo $remedio['RMD_ID'] ?> "> <?php echo $remedio['RMD_NOME'] ?> </option>
                                <?php } ?>
                            </select>
                            <input class="form-control" type="text" name="esquema_posologico1" id="esquema_posologico1">
                            
                            <label class="form-label">Remédio</label><br />
                            <label class="form-label">Esquema Posológico</label><br />
                            <select name="remedio2">
                            <option value="selecione" selected>Selecione um remédio...</option>
                                <?php foreach ($remedios as $remedio) { ?>
                                    <option value=" <?php echo $remedio['RMD_ID'] ?> "> <?php echo $remedio['RMD_NOME'] ?> </option>
                                <?php } ?>
                            </select>
                            <input class="form-control" type="text" name="esquema_posologico2" id="esquema_posologico2">

                            <label class="form-label">Remédio</label><br />
                            <label class="form-label">Esquema Posológico</label><br />
                            <select name="remedio3">
                            <option value="selecione" selected>Selecione um remédio...</option>
                                <?php foreach ($remedios as $remedio) { ?>
                                    <option value=" <?php echo $remedio['RMD_ID'] ?> "> <?php echo $remedio['RMD_NOME'] ?> </option>
                                <?php } ?>
                            </select>
                            <input class="form-control" type="text" name="esquema_posologico3" id="esquema_posologico3">

                            <label class="form-label">Remédio</label><br />
                            <label class="form-label">Esquema Posológico</label><br />
                            <select name="remedio4">
                                <option value="selecione" selected>Selecione um remédio...</option>
                                <?php foreach ($remedios as $remedio) { ?>
                                    <option value=" <?php echo $remedio['RMD_ID'] ?> "> <?php echo $remedio['RMD_NOME'] ?> </option>
                                <?php } ?>
                            </select>
                            <input class="form-control" type="text" name="esquema_posologico4" id="esquema_posologico4">

                            <label class="form-label">Remédio</label><br />
                            <label class="form-label">Esquema Posológico</label><br />
                            <select name="remedio5">
                                <option value="selecione" selected>Selecione um remédio...</option>
                                <?php foreach ($remedios as $remedio) { ?>
                                    <option value=" <?php echo $remedio['RMD_ID'] ?> "> <?php echo $remedio['RMD_NOME'] ?> </option>
                                <?php } ?>
                            </select>
                            <input class="form-control" type="text" name="esquema_posologico5" id="esquema_posologico5">
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label">Observações</label><br />
                            <textarea class="form-control" name="observacoes" id="observacoes" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Assinatura do Médico</label><br />
                            <input class="form-control" type="file" name="assinatura_medico" id="assinatura_medico" required>
                        </div>
                    </div>

                    <div class="text-center"><button type="submit">Enviar</button></div>
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
                            <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Início</a></li>
                            <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Sobre Nós</a></li>
                            <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Serviços</a></li>
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
    <script src="../../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/common/main.js"></script>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/7751608a2d.js" crossorigin="anonymous"></script>

</body>

</html>