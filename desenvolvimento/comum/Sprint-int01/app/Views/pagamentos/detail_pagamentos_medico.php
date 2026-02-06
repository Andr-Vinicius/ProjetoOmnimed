<?php

use App\Entities\PagamentosMedicos;
use App\Entities\Funcionarios;
use App\Models\PagamentosMedicosModel;
use App\Models\FuncionariosModel;

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
} elseif (substr($_SESSION["usuario"]["prontuario"], 0, 2) !== "AD") {
    // Feito como um elseif ao invés de um "OU" na condição anterior para garantir que 
    // a variável existe, afim de compará-la
    header("Location: /");
    exit;
}

$funcionario = new Funcionarios();
$funcionarioModel = new FuncionariosModel();

$funcionario = $funcionarioModel->find($id);
$nomeFuncionario = $funcionarioModel->getNomeFuncionario($funcionario->FUN_PRONTUARIO);
$cpfFuncionario = $funcionarioModel->findAllFuncionarios();

$pagamentosMedicos = new PagamentosMedicos();
$pagamentosMedicosModel = new PagamentosMedicosModel();

$pagamentosMedicos = $pagamentosMedicosModel->historicoMedico($id);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta http-equiv="Content-Language" content="ptBR">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

            <!-- <a href="index.html"><img src="/Assets/img/logo_completa_2.png" alt="" class="logo_inicio"></a> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/" class="logo me-auto"><img src="/Assets/images/common/logo_completa_2.png" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Início</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <main id="main">
        <section id="counts" class="counts">
            <div class="container">
                <div class="section-title margem">
                    <h2>Histórico de pagamentos</h2>
                    <p>Médico(a): <?php echo $nomeFuncionario;  ?><br />Prontuário: <?php echo $funcionario->FUN_PRONTUARIO; ?></p>
                </div>

                <a href="/pagamentos/medicos/" class="appointment-btn">Voltar</a>
                <br />
                <br />

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="gv">
                                <table id="example" class="table table-striped table-bordered grid" style="width:100%;">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Dia do Pagamento</th>
                                            <th>Data Pgto. Realizado</th>
                                            <th>Salário</th>
                                            <th>Valor de Comissão</th>
                                            <th>Qtd Consultas Realizadas</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pagamentosMedicos as $key => $pagamentoMedico) { ?>
                                            <tr style="text-align: center;">
                                                <td><?php if (date('Y-m-d') > date($pagamentoMedico->PGM_DATA_PAGAMENTO) && $pagamentoMedico->PGM_DATA_PAGAMENTO_REALIZADO == null) {
                                                        echo '<p style="color: red;">' . $pagamentoMedico->PGM_DATA_PAGAMENTO . '</p>';
                                                    } else {
                                                        echo $pagamentoMedico->PGM_DATA_PAGAMENTO;
                                                    } ?></td>
                                                <td><?php if ($pagamentoMedico->PGM_DATA_PAGAMENTO_REALIZADO == null) {
                                                        echo 'Em aberto';
                                                    } else {
                                                        echo $pagamentoMedico->PGM_DATA_PAGAMENTO_REALIZADO;
                                                    } ?></td>
                                                <td><?php echo $pagamentoMedico->PGM_SALARIO; ?></td>
                                                <td><?php echo $pagamentoMedico->PGM_VALOR_COMISSAO; ?></td>
                                                <td><?php echo $pagamentoMedico->PGM_CONSULTAS_MES; ?></td>
                                                <td><?php echo $pagamentoMedico->PGM_VALOR_TOTAL; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <br />
                <div class="dropdown">
                    <button class="btn appointment-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Exportar
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/pagamentos/medicos/baixar/<?php echo $id; ?>/1">.csv</button></li>
                        <li><a class="dropdown-item" href="/pagamentos/medicos/baixar/<?php echo $id; ?>/2">.xlsx</button></li>
                    </ul>
                </div>
            </div>
        </section><!-- End Counts Section -->

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
                    "searchPlaceholder": "Nome, CPF, Prontuário",
                    "paginate": {
                        "first": "Primeiro",
                        "last": "Último",
                        "next": "Próximo",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>

</body>

</html>