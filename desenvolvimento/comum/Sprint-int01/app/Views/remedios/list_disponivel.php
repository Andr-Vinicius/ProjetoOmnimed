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
}

use App\Entities\Remedios;
use App\Models\RemediosModel;

$remedios = new Remedios();
$remediosModel = new RemediosModel();

// Lista todos os campos da tabela
$remedios = $remediosModel->listagemRemediosDisponiveis();

function truncar($string, $tamanho)
{

    if (strlen($string) > $tamanho) {
        return substr($string, 0, $tamanho) . "...";
    } else {
        return $string;
    }
}

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


    <style>
        .dataTables_wrapper .right-search .dataTables_filter {
            float: right;
        }

        .dataTables_wrapper .left-search .dataTables_filter {
            float: left;
        }

        .pagination .page-item.active .page-link {
            background-color: #0f928c;
            border-color: #0f928c;
        }

        .div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-item.active .page-link:focus {
            background-color: #0f928c;
        }

        .pagination .page-item.active .page-link:hover {
            background-color: #0f928c;
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

            <!-- <a href="index.html"><img src="assets/images/common/logo_completa_2.png" alt="" class="logo_inicio"></a> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/" class="logo me-auto"><img src="/Assets/images/common/logo_completa_2.png" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Início</a></li>
                    <li>Bem-vindo(a) <?php echo $_SESSION["usuario"]['nome'] ?></a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Appointment Section ======= -->
        <section id="appointment" class="appointment section-bg">
            <div class="container">

                <div class="section-title margem">
                    <h2>Estoque de Remédios</h2>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="gv">

                                <table id="example" class="table table-striped table-bordered grid" style="width:100%;">

                                    <thead>
                                        <tr>
                                            <th>Nome Medicamento</th>
                                            <th>Esquema Posológico</th>
                                            <th>Quantidade</th>
                                            <th>Indicação</th>
                                            <th>Contraindicação</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach ($remedios as $key => $rmd) {
                                        ?>
                                            <tr>
                                                <td><?php echo $rmd->RMD_NOME; ?></td>
                                                <td><?php echo $rmd->RMP_ESQUEMA_POSOLOGICO; ?></td>
                                                <td><input type="hidden" value="<?php echo $rmd->RMD_ID; ?>" id="RMD_ID" />
                                                    <div class="quant"><?php echo $rmd->RMD_QUANTIDADE; ?></div><span class="quant_form" style="display:none;"></span>
                                                </td>
                                                <td><?php echo truncar($rmd->RMD_INDICACAO, 50); ?></td>
                                                <td><?php echo truncar($rmd->RMD_CONTRAINDICACAO, 50); ?></td>
                                            <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="/Assets/vendor/aos/aos.js"></script>
    <script src="/Assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/Assets/js/common/main.js"></script>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/7751608a2d.js" crossorigin="anonymous"></script>

    <!-- Teste Datatables -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src=" https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: '<"top"<"right-search"f><"left-search"l>>rt<"bottom">ip<"clear">',
                "language": {
                    "lengthMenu": "Mostrar _MENU_ resultados por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Não disponível",
                    "infoFiltered": "(filtrado do _MAX_ total de dados)",
                    "search": "Pesquisar:",
                    "searchPlaceholder": "",
                    "paginate": {
                        "first": "Primeiro",
                        "last": "Último",
                        "next": "Próximo",
                        "previous": "Anterior"
                    }
                }
            });
        });

        $(document).on('click', '.quant', function() {

            let $valor = $(event.target).text();
            let $div = $(event.target).hide();
            let $span = $(event.target).parent().find(".quant_form").show();

            let $input = "<input type='text' name='RMD_QUANTIDADE' id='RMD_QUANTIDADE' value='' maxlenght='3' size='5' />";

            let $botaoSalvar = (`<a class="confirmar" title="Confirmar"><span class='bi bi-check-circle-fill align-middle'></span></a>`);

            $span.html($input);
            $span.find('#RMD_QUANTIDADE').val($valor);
            $span.append($botaoSalvar);

        });

        $('.quant_form').on('click', '.confirmar', function() {
            let $div = $(event.target).parent().parent().parent().find(".quant");
            let $span = $(event.target).parent().parent();
            let $valor = $(event.target).parent().parent().find('#RMD_QUANTIDADE').val();
            let $id = $(event.target).parent().parent().parent().find('#RMD_ID').val();

            if (confirm("Você tem certeza que deseja confirmar?")) {
                $.ajax({
                    url: '/remedios/salvar_quantidade/' + $id + '/' + $valor,
                    type: "GET",
                    dataType: "html"

                }).done(function(resposta, textStatus) {
                    $div.show();
                    $span.hide();

                    $div.html($valor);
                }).fail(function(jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);

                });
            } else {
                $div.show();
                $span.hide();
            }
        });
    </script>
</body>

</html>