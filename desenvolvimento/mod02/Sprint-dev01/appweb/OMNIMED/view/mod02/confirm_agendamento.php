<?php
include("../../DAO/AgendamentoDAO.php");

$conexao = new mysqli("localhost", "root", "", "projeto");
$idAgendamento = $_GET['AGD_ID'];

$dao = new AgendamentoDAO();
$agendamento = $dao->listarAgendamentoPorID($idAgendamento);

$sql = "SELECT AGD.FK_PACIENTES_PAC_ID 
        FROM AGENDAMENTOS AS AGD
        WHERE AGD_ID = " . $idAgendamento;
$resultado = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($resultado);
$idPaciente = $row['FK_PACIENTES_PAC_ID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Omnimed</title>
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
                    <h2>Agendar CONSULTA</h2>
                    <p>Para agendar uma teleconsulta, preencha os campos abaixo com as suas informações.</p>
                </div>

                <form action="../../controller/AgendamentoController.php" method="post" role="form" class="php-email-form">
                    <input type="hidden" name="acao" id="acao" value="confirmarAgendamento">
                    <input type="hidden" name="status" id="status" value="2">
                    <input type="hidden" name="idAgendamento" id="idAgendamento" value="<?php echo $idAgendamento; ?>">
                    <input type="hidden" name="pacienteid" id="pacienteid" value="<?php echo $idPaciente; ?>">
                    <div class="row">
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="text" name="nomecompleto" class="form-control" id="nomecompleto" placeholder="Nome Completo" disabled value="<?php
                                    $sql = "SELECT AGD.FK_PACIENTES_PAC_ID, PAC.PAC_NOME_COMPLETO 
                                    FROM AGENDAMENTOS AS AGD
                                    JOIN PACIENTES AS PAC ON (AGD.FK_PACIENTES_PAC_ID = PAC.PAC_ID)
                                    WHERE AGD_ID = " . $idAgendamento;
                                    $resultado = mysqli_query($conexao, $sql);
                                    $row = mysqli_fetch_assoc($resultado);
                                    echo $row['PAC_NOME_COMPLETO']; ?>">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <select class="form-control select" name="especialidadeid" id="especialidadeid">
                                <option value="<?php
                                                $sql = "SELECT AGD.FK_TIPOS_ESPECIALIDADES_MEDICAS_TEM_ID, TEM.TEM_ID, TEM.TEM_NOME_ESPECIALIDADE 
                                            FROM AGENDAMENTOS AS AGD
                                            JOIN TIPOS_ESPECIALIDADES_MEDICAS AS TEM ON (AGD.FK_TIPOS_ESPECIALIDADES_MEDICAS_TEM_ID = TEM.TEM_ID)
                                            WHERE AGD_ID = " . $idAgendamento;
                                                $resultado = mysqli_query($conexao, $sql);
                                                $row = mysqli_fetch_assoc($resultado);
                                                echo $row['TEM_ID']; ?>" selected>
                                    <?php echo $row['TEM_NOME_ESPECIALIDADE']; ?>
                                </option>
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="date" name="dataconsulta" class="form-control datepicker" id="dataconsulta" value="<?php echo $agendamento['AGD_DATA']; ?>" required>
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="text" name="meetlink" class="form-control" id="meetlink" placeholder="Link do Meet" required>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <select class="form-control select" name="medicoid" id="medicoid" required>
                                <option disabled selected>Selecione um médico</option>
                                <?php
                                $sql = "select * from medicos";
                                $resultado = mysqli_query($conexao, $sql);

                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    echo '<option value="' . $row['MED_ID'] . '"> ' . $row['MED_NOME'] . ' </option>';
                                }
                                ?>
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="time" name="horario" class="form-control datepicker" id="horario" required>
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mt-3">
                            <div class="row">
                                <div class="col-md-4 mt-2">É encaminhamento?</div>
                                <div class="col-md-4 radio">
                                    <input type="radio" name="encaminhamentos" value="1" id="encaminhamentoSim" />Sim
                                    <input type="radio" name="encaminhamentos" value="0" id="encaminhamentoNao" />Não
                                </div>
                            </div>
                            <div class="validate"></div>
                        </div>

                        <div class="col-md-6 form-group mt-3">
                            <div class="row">
                                <div class="col-md-4 mt-2">É retorno?</div>
                                <div class="col-md-4 radio">
                                    <input type="radio" name="retorno" value="1" id="retornoSim" />Sim
                                    <input type="radio" name="retorno" value="0" id="retornoNao" />Não
                                </div>
                            </div>
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Carregando</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Agendamento confirmado!</div>
                    </div>
                    <div class="text-center"><button type="submit" id="confirmarAgendamento">Confirmar Agendamento</button></div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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

    <script>
        <?php if ($agendamento['AGD_ENCAMINHAMENTOS'] == "1") { ?>
            $("#encaminhamentoSim").prop("checked", true);

        <?php } else if ($agendamento['AGD_ENCAMINHAMENTOS'] == "0") { ?>
            $("#encaminhamentoNao").prop("checked", true);
        <?php } ?>

        <?php if ($agendamento['AGD_RETORNO'] == "1") { ?>
            $("#retornoSim").prop("checked", true);

        <?php } else if ($agendamento['AGD_RETORNO'] == "0") { ?>
            $("#retornoNao").prop("checked", true);
        <?php } ?>

        $(document).on('click', '#confirmarAgendamento', function() {
            event.preventDefault();
            $.ajax({
                url: '../../controller/AgendamentoController.php',
                type: "POST",
                data: "acao=" + $('#acao').val() +
                    "&idAgendamento=" + $('#idAgendamento').val() +
                    "&horario=" + $('#horario').val() +
                    "&meetlink=" + $('#meetlink').val() +
                    "&medicoid=" + $('#medicoid option').filter(':selected').val() +
                    "&status=" + $('#status').val() +
                    "&encaminhamentos=" + $('#encaminhamentos:selected').val() +
                    "&retorno=" + $('#retorno:selected').val() +
                    "&dataconsulta=" + $('#dataconsulta').val() +
                    "&pacienteid=" + $('#pacienteid').val() +
                    "&especialidadeid=" + $('#especialidadeid option').filter(':selected').val(),

                dataType: "html"

            }).done(function(resposta) {
                $(location).attr('href', 'view_agendamentos_solicitados.php');

            }).fail(function(jqXHR, textStatus) {
                console.log("Request failed: " + textStatus);

            }).always(function() {
                console.log("completou");
            });

        });
    </script>

</body>

</html>