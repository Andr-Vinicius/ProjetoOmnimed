<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: /login");
    exit;
} elseif (!isset($_SESSION["usuario"]["email"])) {
    header("Location: /");
    exit;
}

use App\Models\AgendamentosModel;

$agendamentoModel = new AgendamentosModel();
$agendamento = $agendamentoModel->find($id);

use App\Models\EspecialidadesMedicasModel;

$especialidadeMedicaModel = new EspecialidadesMedicasModel();
$especialidadesMedicas = $especialidadeMedicaModel->findAll();

use App\Models\PacientesModel;

$pacienteModel = new PacientesModel();
$paciente = $pacienteModel->obterPacientePorFKUsuarioComum($_SESSION['usuario']['id']);

use App\Models\UsuarioComumModel;

$usuarioComumModel = new UsuarioComumModel();
$usuarioComum = $usuarioComumModel->find($_SESSION['usuario']['id']);

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
            <a href="/" class="logo me-auto"><img src="/Assets/images/common/logo_completa_2.png" alt="" class="img-fluid"></a>

            <a href="/pacientes/logado" class="appointment-btn scrollto"><span class=" d-md-inline">Perfil</a>

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Appointment Section ======= -->
        <section id="appointment" class="appointment section-bg">
            <div class="container">

                <div class="section-title margem">
                    <h2>Editar CONSULTA</h2>
                    <p>Para editar uma teleconsulta, preencha/altere os campos abaixo com as suas informações.</p>
                </div>

                <form action="/agendamentos/editar_agendamento" method="post" role="form" class="php-email-form">

                    <input type="hidden" name="AGD_ID" id="id" value="<?php echo $agendamento->AGD_ID; ?>">
                    <input type="hidden" name="AGD_STATUS" id="status" value="<?php echo $agendamento->AGD_STATUS; ?>">
                    <input type="hidden" name="AGD_HORARIO" id="horario" value="<?php echo $agendamento->AGD_HORARIO; ?>">
                    <input type="hidden" name="AGD_MEET_LINK" id="meetlink" value="<?php echo $agendamento->AGD_MEET_LINK; ?>">
                    <input type="hidden" name="FK_MEDICOS_MED_ID" id="medicoid" value="<?php echo $agendamento->FK_MEDICOS_MED_ID; ?>">

                    <input type="hidden" name="FK_PACIENTES_PAC_ID" id="pacienteid" value="<?php echo $paciente->PAC_ID; ?>">
                    <input type="hidden" name="AGD_TRIAGEM_REALIZADA" id="triagemrealizada" value="<?php echo $agendamento->AGD_TRIAGEM_REALIZADA; ?>">
                    <div class="row">
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="text" name="nomecompleto" class="form-control" id="nomecompleto" placeholder="Nome Completo" disabled value="<?php echo $usuarioComum->USC_NOME ?>">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <select class="form-control select" name="FK_ESPECIALIDADES_MEDICAS_ESM_ID" id="especialidadeid" required>
                                <option disabled selected>Selecione uma especialidade médica</option>
                                <?php
                                foreach ($especialidadesMedicas as $key => $especialidadeMedica) {
                                    echo '<option value="' . $especialidadeMedica->ESM_ID . '"> ' . $especialidadeMedica->ESM_DESCRICAO . ' </option>';
                                }
                                ?>
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="date" name="AGD_DATA" class="form-control datepicker" id="dataconsulta" min="<?php echo $agendamento->AGD_DATA; ?>" required>
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mt-3">
                            <div class="row">
                                <div class="col-md-4 mt-2">É encaminhamento?</div>
                                <div class="col-md-3 radio">
                                    <input type="radio" name="AGD_ENCAMINHAMENTOS" value="1" id="encaminhamentoSim" required />Sim
                                    <input type="radio" name="AGD_ENCAMINHAMENTOS" value="0" id="encaminhamentoNao" />Não
                                </div>
                            </div>
                            <div class="validate"></div>
                        </div>

                        <div class="col-md-6 form-group mt-3">
                            <div class="row">
                                <div class="col-md-4 mt-2">É encaminhamento presencial?</div>
                                <div class="col-md-3 radio">
                                    <input type="radio" name="AGD_ENCAMINHAMENTO_PRESENCIAL" value="1" id="encaminhamentoPresencialSim" required />Sim
                                    <input type="radio" name="AGD_ENCAMINHAMENTO_PRESENCIAL" value="0" id="encaminhamentoPresencialNao" />Não

                                </div>
                            </div>
                            <div class="validate"></div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group mt-3 mt-md-0">
                            <input type="textarea" name="AGD_MOTIVO_ENCAMINHAMENTO" class="form-control" id="motivoencaminhamento" placeholder="Motivo do Encaminhamento" disabled value="<?php echo $agendamento->AGD_MOTIVO_ENCAMINHAMENTO; ?>">
                            <div class="validate"></div>
                        </div>
                    </div>

                    <div class="col-md-6 form-group mt-3">
                        <div class="row">
                            <div class="col-md-4 mt-2">É retorno?</div>
                            <div class="col-md-3 radio">
                                <input type="radio" name="AGD_RETORNO" value="1" id="retornoSim" required />Sim
                                <input type="radio" name="AGD_RETORNO" value="0" id="retornoNao" />Não
                            </div>
                        </div>
                        <div class="validate"></div>
                    </div>

                    <div class="mb-3">
                        <div class="loading">Carregando</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Seu agendamento foi solicitado. Muito obrigado!<br>Não se esqueça de realizar a triagem 1 hora antes da consulta.</div>
                    </div>
                    <div class="text-center"><button type="submit" id="editarAgendamento">Concluir Edição</button></div>
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

    <script>
        <?php if ($agendamento->AGD_ENCAMINHAMENTOS == "1") { ?>
            $("#encaminhamentoSim").prop("checked", true);

        <?php } else if ($agendamento->AGD_ENCAMINHAMENTOS == "0") { ?>
            $("#encaminhamentoNao").prop("checked", true);
        <?php } ?>

        <?php if ($agendamento->AGD_ENCAMINHAMENTO_PRESENCIAL == "1") { ?>
            $("#encaminhamentoPresencialSim").prop("checked", true);

        <?php } else if ($agendamento->AGD_ENCAMINHAMENTO_PRESENCIAL == "0") { ?>
            $("#encaminhamentoPresencialNao").prop("checked", true);
        <?php } ?>

        <?php if ($agendamento->AGD_RETORNO == "1") { ?>
            $("#retornoSim").prop("checked", true);

        <?php } else if ($agendamento->AGD_RETORNO == "0") { ?>
            $("#retornoNao").prop("checked", true);
        <?php } ?>

        const btnEncaminhamentoSim = document.querySelector('#encaminhamentoSim');
        btnEncaminhamentoSim.addEventListener("click", () => {
            if (btnEncaminhamentoSim.checked) {
                $("#retornoNao").prop("checked", true);
                $("#motivoencaminhamento").prop("disabled", false);
            }
        })

        const btnEncaminhamentoNao = document.querySelector('#encaminhamentoNao');
        btnEncaminhamentoNao.addEventListener("click", () => {
            if (btnEncaminhamentoNao.checked) {
                $("#motivoencaminhamento").prop("disabled", true);
            }
        })

        const btnRetornoSim = document.querySelector('#retornoSim');
        btnRetornoSim.addEventListener("click", () => {
            if (btnRetornoSim.checked) {
                $("#encaminhamentoNao").prop("checked", true);
            }
        })

        $(document).on('click', '#editarAgendamento', function() {
            if (document.getElementById("especialidadeid")
                .options[document.getElementById("especialidadeid").selectedIndex]
                .value == "Selecione uma especialidade médica" ||
                document.getElementById("dataconsulta").value == "" ||
                (!document.querySelector("#encaminhamentoSim").checked && !document.querySelector("#encaminhamentoNao").checked) ||
                (document.querySelector("#encaminhamentoSim").checked && document.getElementById("motivoencaminhamento").value == "") ||
                (!document.querySelector("#encaminhamentoPresencialSim").checked && !document.querySelector("#encaminhamentoPresencialNao").checked) ||
                (!document.querySelector("#retornoSim").checked && !document.querySelector("#retornoNao").checked)) {
                alert("Preencha o formulário corretamente para agendar sua consulta.");
            } else {
                $.ajax({

                }).then(function() {
                    $(location).attr('href', '/agendamentos/listagem');
                })
            }
        });

        //$(document).on('click', '#cadastrarAgendamento', function() {
        //  $.ajax({
        //
        //  }).then(function() {
        //    $(location).attr('href', '/agendamentos/listagem');
        //  })
        //});
    </script>

</body>

</html>