<?php

use App\Models\TriagensModel;
use App\Models\ConsultasOnlineModel;

$consultaModel = new ConsultasOnlineModel();
$consulta = $consultaModel->find($id);

$triagemModel = new TriagensModel();
$triagem = $triagemModel->obterTriagemPorIdAgd($id);
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

    <link href="/Assets/css/mod02/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Medilab - v4.7.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <style>
        /* Popup container - can be anything you want */
        .popup {
            position: relative;
            display: inline-block;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .popup .popuptext {
            visibility: hidden;
            width: 160px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
        }

        .popup .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s;
        }

        @-webkit-keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .popup:hover .popuptext {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s;
        }
    </style>

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
            <a href="/" class="logo me-auto"><img src="/Assets/images/common/logo_completa_2.png" alt="" class="img-fluid"></a>

            <!--<nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Início</a></li>
          <li><a class="nav-link scrollto" href="/sobre_projeto">Sobre o Projeto</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>-->
            <!-- .navbar -->

            <a href="/pacientes/logado" class="appointment-btn scrollto"><span class=" d-md-inline">Perfil</a>

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Appointment Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="section-title margem">
                    <h2>Triagem da consulta <?php echo $consulta->CNS_ID; ?></h2>
                </div>

                <form action="/triagens/salvar" role="form" method="POST" class="php-email-form">

                    <input type="hidden" name="FK_AGENDAMENTOS_AGD_ID" id="agendamentos_agd_id" value="<?php echo $id; ?>">

                    <div class="row">
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label">Sintomas</label><br />
                            <textarea class="form-control" disabled placeholder="<?php echo $triagem[0]->TRG_SINTOMAS; ?>"></textarea>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Tabela de dor</label><br />
                            <input class="form-control" value="<?php echo $triagem[0]->TRG_TABELA_DOR; ?>" disabled>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Temperatura (°C)</label><br />
                            <input class="form-control" value="<?php echo $triagem[0]->TRG_TEMPERATURA; ?>" disabled>
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Possui doenças crônicas?</label><br />
                            <input class="form-control" value="<?php echo $triagem[0]->TRG_DOENCAS_CRONICAS ? "sim" : "não"; ?>" disabled>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Quais doenças crônicas?</label><br />
                            <input class="form-control" value="<?php echo $triagem[0]->TRG_QUAIS_DOENCAS_CRONICAS; ?>" disabled>
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Realiza tratamento médico?</label><br />
                            <input class="form-control" value="<?php echo $triagem[0]->TRG_DOENCAS_CRONICAS ? "sim" : "não"; ?>" disabled>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Quais tratamentos médicos?</label><br />
                            <input class="form-control" value="<?php echo $triagem[0]->TRG_QUAIS_TRAT_MED; ?>" disabled>
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Faz o uso de medicações?</label><br />
                            <input class="form-control" value="<?php echo $triagem[0]->TRG_DOENCAS_CRONICAS ? "sim" : "não"; ?>" disabled>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label"></label><br />
                            <input class="form-control" value="<?php echo $triagem[0]->TRG_QUAL_MEDICACAO; ?>" disabled>
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Tem alergia a algum medicamento?</label><br />
                            <input class="form-control" value="<?php echo $triagem[0]->TRG_DOENCAS_CRONICAS ? "sim" : "não"; ?>" disabled>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">A quais medicações?</label><br />
                            <input class="form-control" value="<?php echo $triagem[0]->TRG_QUAIS_ALERGIAS; ?>" disabled>
                        </div>

                    </div>

                    <div class="row">


                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Pressão Sistólica</label>
                            <div class="popup"><i id="lupa" class="fa-solid fa-magnifying-glass w-25 p-3 h-25 d-inline-block"></i><span class="popuptext" id="myPopup">Maior Valor</span></div>
                            <input class="form-control" value="<?php echo $triagem[0]->TRG_PRESSAO_SISTOLICA; ?>" disabled>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Pressão Diastólica</label>
                            <div class="popup"><i id="lupa" class="fa-solid fa-magnifying-glass w-25 p-3 h-25 d-inline-block"></i><span class="popuptext" id="myPopup">Menor Valor</span></div>
                            <input class="form-control" value="<?php echo $triagem[0]->TRG_PRESSAO_DIASTOLICA; ?>" disabled>
                        </div>

                    </div>

                    <a href="/consulta/listagem_historico" class="appointment-btn scrollto">Voltar</a>

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
    <a href="#top" class="btn-toTop back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/Assets/vendor/purecounter/purecounter.js"></script>
    <script src="/Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/Assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/Assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/Assets/js/common/main.js"></script>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/7751608a2d.js" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {

            //pressao condicional 
            $("#enviarTriagem").click(function() {
                console.log(document.getElementById("pressao_sistolica").value);
                if (document.getElementById("pressao_sistolica").value != "") {
                    document.getElementById("pressao_diastolica").setAttribute('required', '');
                } else if (document.getElementById("pressao_diastolica").value != "") {
                    document.getElementById("pressao_sistolica").setAttribute('required', '');
                } else if (document.getElementById("pressao_diastolica").value == "" && document.getElementById("pressao_sistolica").value == "") {
                    document.getElementById("pressao_sistolica").removeAttribute('required');
                    document.getElementById("pressao_diastolica").removeAttribute('required');
                }
            });

            //tabela dor
            var tabela = document.querySelector("#tabela_dor")

            tabela.addEventListener("keyup", () => {
                if (tabela.value > 10) {
                    tabela.value = 10
                }
            })

        });
    </script>

</body>

</html>