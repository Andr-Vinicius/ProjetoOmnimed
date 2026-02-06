<?php
include '../../DAO/AgendamentoDAO.php';
$dao = new AgendamentoDAO();

$data = $_GET['data'];
$nome = $_GET['nome'];

$consultas = $dao->listarAtendimentosDiaMedico($data, $nome);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Omnimed | Atendimentos do dia</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="../../assets/images/common/logo_icon.png" rel="icon">
        <link href="../../assets/images/common/logo_apple_touch_icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

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

    </head>

    <body>
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
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">
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
            </div>
        </header>

        <main id="main">

            <section id="counts" class="counts">
                <div class="container">
                    <div class="section-title margem">
                        <h2>Atendimentos do dia - Médicos</h2>
                    </div>
                    <div>
                        
                        <form action="atendimentos_dia.php" method="get" role="form" >
                            
                            <div class="row">
                                <div class="col-6">
                                    <label>Data</label>
                                    <input type="date" name="data" class="form-control" id="data" >
                                </div>
                                <div class="col-6 ">
                                    <label>Nome do Paciente</label>
                                    <input type="text" name="nome" class="form-control" id="nome_pac">
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-sm-12">

                                    <button id="enviar" type="submit" class="btn btn-primary"  style=" border: 2px solid #0f928c; background-color: #0f928c;">
                                        <i class="fa fa-filter"></i> Aplicar Filtro
                                    </button>
                                    <a href='atendimentos_dia.php?data=&nome=' type="submit" class='btn btn-outline-light'  style="border: 2px solid #0c7d78; color:#0c7d78;">
                                        <i class="fa-solid fa-filter-circle-xmark"></i> Limpar Filtros
                                    </a>
                                </div>
                            </div>
                        </form>
                        <br/><br/>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="gv">
                                    <table id="agendamentos" class="table table-striped table-bordered  table-hover" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Nome completo</th>
                                                <th>Horário</th>
                                                <th>Data</th>
                                                <th>Número para contato</th>
                                                <th>Encaminhamento</th>
                                                <th>Visualizar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($consultas)) { ?>
                                                <tr>
                                                    <td colspan="6">Não existe consultas para o dia de hoje...</td>
                                                </tr>

                                            <?php } else { ?>
                                                <?php
                                                foreach ($consultas as $consulta) {
                                                    ?>
                                                    <tr>
                                                        <td> <?php echo $consulta['PAC_NOME']; ?> </td>
                                                        <td> <?php echo substr($consulta['AGD_HORARIO'], 0, 5); ?> </td>
                                                        <td> <?php echo implode('/', array_reverse(explode("-", $consulta['AGD_DATA']))); ?> </td>
                                                        <td> <?php echo empty($consulta['RES_TEL_CELULAR2']) ? $consulta['RES_TEL_CELULAR1'] : $consulta['RES_TEL_CELULAR1'] . '<br>' . $consulta['RES_TEL_CELULAR2']; ?> </td>
                                                        <td> <?php echo $consulta['AGD_ENCAMINHAMENTOS'] == 0 ? 'Não encaminhado' : 'Encaminhado' ?> </td>
                                                        <td><a href="#"><icon class='bi bi-eye' style="color: #000; font-weight: bold;"></icon></a></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>


        <footer id="footer">
        </footer>


        <div id="preloader"></div>
        <a href="#" class="btn-toTop back-to-top d-flex align-items-center justify-content-center">
            <i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="../../assets/vendor/purecounter/purecounter.js"></script>
        <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
        <!--<script src="../../assets/vendor/php-email-form/validate.js"></script>-->
        <script src="../../assets/vendor/aos/aos.js"></script>
        <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

        <!-- Template Main JS File -->
        <script src="../../assets/js/common/main.js"></script>

        <!-- FontAwesome Icons -->
        <script src="https://kit.fontawesome.com/7751608a2d.js" crossorigin="anonymous"></script>

        <!-- Teste Datatables -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!--        <script type="text/javascript" src=" https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        -->
        <script>
            $('#enviar').on('click', function (e) {
                var data = $('#data').val();
                var nome = $('#nome_pac').val();

            });
        </script>

    </body>

</html>