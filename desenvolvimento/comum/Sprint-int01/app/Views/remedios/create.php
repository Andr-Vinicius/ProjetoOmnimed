<?php

use App\Entities\Finalidades;
use App\Entities\FormasFarmaceuticas;
use App\Models\FinalidadesModel;
use App\Models\FormasFarmaceuticasModel;

session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: /login");
    exit;
} elseif (!isset($_SESSION["usuario"]["prontuario"])) {
    header("Location: /");
    exit;
} elseif ((substr($_SESSION["usuario"]["prontuario"], 0, 2) !== "AD") && (substr($_SESSION["usuario"]["prontuario"], 0, 2) !== "EN")) {
    header("Location: /");
    exit;
}

$formasFarmaceuticas = new FormasFarmaceuticas();
$formasFarmaceuticasModel = new FormasFarmaceuticasModel();

$formasFarmaceuticas = $formasFarmaceuticasModel->findAll();

$finalidades = new Finalidades();
$finalidadeModel = new FinalidadesModel();

// Lista todos os campos da tabela
$finalidades = $finalidadeModel->findAll();

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

            <!-- <a href="index.html"><img src="assets/img/logo_completa_2.png" alt="" class="logo_inicio"></a> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/" class="logo me-auto"><img src="/Assets/images/common/logo_completa_2.png" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Voltar ao Início</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Register Section ======= -->

        <section id="register" class="register section-bg">
            <div class="container">

                <div class="section-title">
                    <br><br><br><br>
                    <h2>Cadastro de Remédios</h2>
                    <p>Para cadastrar um fármaco, preencha os campos abaixo.</p>
                </div>

                <a href="/remedios/listagem" class="appointment-btn scrollto">Voltar</a>
                <br />
                <br />

                <form action="/remedios/criar" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-md-5 form-group">
                            Nome
                            <input type="text" class="form-control" name="RMD_NOME" id="nome" placeholder="Exemplo: Aspirina" data-rule="minlen:4" data-msg="Por favor, digite ao menos 4 caracteres">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-3 form-group">
                            Dosagem
                            <input type="text" class="form-control" name="RMD_DOSAGEM" id="dosagem" placeholder="Exemplo: 100ml">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-2 form-group mt-3 mt-md-0">
                            Via de Dosagem
                            <select id="viadosagem" class="form-select" name="RMD_VIA_DOSAGEM">
                                <option value="1">Oral</option>
                                <option value="2">Parental</option>
                                <option value="3">Subcutânea</option>
                                <option value="4">Nasal</option>
                                <option value="5">Retal</option>
                                <option value="6">Intra-vesical</option>
                                <option value="7">Nebulização</option>
                                <option value="8">Ocular</option>
                                <option value="9">Sublingual</option>
                                <option value="10">Outro</option>
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-7 form-group mt-3 mt-md-0">
                            Forma Farmacêutica
                            <select id="forma_farmaceutica" class="form-select" name="FK_FORMAS_FARMACEUTICAS_FRM_ID">
                                <?php foreach ($formasFarmaceuticas as $key => $formaFarmaceutica) { ?>
                                    <option value="<?php echo $formaFarmaceutica->FRM_ID; ?>"><?php echo $formaFarmaceutica->FRM_DESCRICAO; ?></option>
                                <?php } ?>
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-3 form-group">
                            Quantidade
                            <input type="text" class="form-control" name="RMD_QUANTIDADE" id="quantidade" placeholder="Exemplo: 2">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            Indicações
                            <textarea class="form-control" name="RMD_INDICACAO" id="indicacoes" placeholder="Exemplo: Dores agudas de cabeça" rows="3"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            Contraindicações
                            <textarea class="form-control" name="RMD_CONTRAINDICACAO" id="contraindicacoes" placeholder="Exemplo: Casos de suspeita de dengue" rows="3"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-3 form-group">
                            Disponível?
                            <input type="text" class="form-control" name="RMD_DISPONIVEL" id="disponivel" placeholder="Exemplo: 0 ou 1">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-10 form-group mt-3">
                            Finalidade <a class="adicionar-finalidade" title="Adicionar"><span class='bi bi-plus-circle-fill'></span></a>
                            <div class="div-finalidades">
                                <div class="row">
                                    <div class="col-md-8 form-group mt-3 mt-md-0">
                                        <select id="finalidade" class="form-select" name="finalidade[]">
                                            <?php foreach ($finalidades as $key => $finalidade) { ?>
                                                <option value="<?php echo $finalidade->FIN_ID; ?>"><?php echo $finalidade->FIN_DESCRICAO; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Carregando</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Seu cadastro foi efetuado. Muito obrigado!</div>
                        </div>
                        <br>
                        <br>
                        <div class="text-center"><button type="submit">Confirmar Cadastro</button></div>
                </form>
            </div>
        </section>

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
    <script src="/Assets/vendor/aos/aos.js"></script>
    <script src="/Assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/Assets/js/common/main.js"></script>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/7751608a2d.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script type="text/javascript">
        var $finalidade = (
            `<div class="row">
            <div class="col-md-8 form-group mt-3 mt-md-0">
            <select id="finalidade" class="form-select" name="finalidade[]">
            <?php foreach ($finalidades as $key => $finalidade) { ?>
            <option value="<?php echo $finalidade->FIN_ID; ?>"><?php echo $finalidade->FIN_DESCRICAO; ?></option>
            <?php } ?>
            </select>
            </div>
            <div class="col-1 mt-2 px-0">
            <a class="remover" title="Remover"><span class='bi bi-x-circle-fill align-middle' style='color: red'></span></a>
            </div>
            </div>`
        );
        $('.adicionar-finalidade').on('click', function() {
            $('.div-finalidades').append($finalidade);
        });

        $(document).on('click', '.remover', function() {
            $(event.target).parent().parent().parent().remove();
        });
    </script>

</body>

</html>