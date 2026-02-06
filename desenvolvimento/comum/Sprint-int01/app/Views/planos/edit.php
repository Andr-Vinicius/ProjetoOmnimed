<?php

use App\Entities\Planos;
use App\Entities\Beneficios;
use App\Entities\PlanosBeneficios;
use App\Entities\ValoresDependentes;
use App\Models\PlanosModel;
use App\Models\BeneficiosModel;
use App\Models\PlanosBeneficiosModel;
use App\Models\ValoresDependentesModel;

session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: /login");
    exit;
} elseif (!isset($_SESSION["usuario"]["prontuario"])) {
    header("Location: /");
    exit;
}

$plano = new Planos();

$planoModel = new PlanosModel();
$plano = $planoModel->find($id);

$beneficios = new Beneficios();

$beneficiosModel = new BeneficiosModel();
$beneficios = $beneficiosModel->findAll();

$planosBeneficios = new PlanosBeneficios();

$planosBeneficiosModel = new PlanosBeneficiosModel();
$planosBeneficios = $planosBeneficiosModel->findAllById($id);

$valoresDependentes = new ValoresDependentes();

$valoresDependentesModel = new ValoresDependentesModel();
$valoresDependentes = $valoresDependentesModel->findAllById($id);

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

        <!-- ======= Appointment Section ======= -->
        <section id="appointment" class="appointment section-bg">
            <div class="container">

                <div class="section-title margem">
                    <h2>Editar Planos Médicos</h2>
                    <p>Para editar um plano médico, preencha os campos abaixo.</p>
                </div>

                <a href="/planos/listagem" class="appointment-btn scrollto">Voltar</a>
                <br />
                <br />

                <form action="/planos/salvarEdicao" method="post" role="form" class="php-email-form">

                    <div class="col">
                        <input name="PLN_ID" value="<?php echo $plano->PLN_ID ?>" hidden>
                        <div class="row-md-4 form-group mt-2">
                            Nome
                            <input type="text" name="PLN_NOME" class="form-control" id="nome" placeholder="Nome do Plano" data-rule="minlen:3" data-msg="Por favor, digite pelo menos 3 caracteres" value="<?php echo $plano->PLN_NOME ?>">
                            <div class="validate"></div>
                        </div>
                        <div class="row">
                            <div class="row-md-4 form-group mt-2">
                                Instituição
                                <input type="text" name="PLN_INSTITUICAO" class="form-control" id="instituicao" placeholder="Instituição Médica" data-rule="minlen:3" data-msg="Por favor, digite pelo menos 3 caracteres" value="<?php echo $plano->PLN_INSTITUICAO ?>">
                                <div class="validate"></div>
                            </div>
                            <div class="row-md-4 form-group mt-2">
                                Preço
                                <input type="number" name="PLN_PRECO" class="form-control" id="preco" placeholder="Preço" data-rule="minlen:3" data-msg="Por favor, digite pelo menos 3 caracteres" step=".01" value="<?php echo $plano->PLN_PRECO ?>">
                                <div class="validate"></div>
                            </div>

                            <div class="row-md-4 form-group mt-2">
                                Valor de dependentes <a class="adicionar-dependente" title="Adicionar"><span class='bi bi-plus-circle-fill'></span></a>
                                <div class="div-dependentes">

                                    <?php foreach ($valoresDependentes as $valorDependente) { ?>
                                        <div class="row">
                                            <input name="id_dependente_existente" value="<?php echo $valorDependente->VPD_ID ?>" hidden>
                                            <div class="col-md-2 form-group mt-3 mt-md-0">
                                                <input type="number" name="idade_min_existente" class="form-control" id="idade_min" placeholder="Idade min." value="<?php echo $valorDependente->VPD_IDADE_MINIMA ?>" disabled>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="col-md-2 form-group mt-3 mt-md-0">
                                                <input type="number" name="idade_max_existente" class="form-control" id="idade_max" placeholder="Idade max." value="<?php echo $valorDependente->VPD_IDADE_MAXIMA ?>" disabled>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="col-md-2 form-group mt-3 mt-md-0">
                                                <input type="number" name="preco_dependente_existente" class="form-control" id="preco_dependente" placeholder="Preço" value="<?php echo $valorDependente->VPD_VALOR ?>" disabled>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="col-1 mt-2 px-0">
                                                <a class="editar" title="Editar"><span class='bi bi-pencil-square align-middle'></span></a>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                                <div class="validate"></div>
                            </div>
                            <div class="row-md-4 form-group mt-2">
                                Benefícios <a class="adicionar-beneficio" title="Adicionar"><span class='bi bi-plus-circle-fill'></span></a>
                                <div class="div-beneficios">

                                    <?php foreach ($planosBeneficios as $planoBeneficio) { ?>
                                        <div class="row">
                                            <input name="id_beneficio_existente" value="<?php echo $planoBeneficio->PBN_ID ?>" hidden>
                                            <div class="col-md-2 form-group mt-3 mt-md-0">
                                                <select id="beneficio" class="form-select" name="beneficio_existente" disabled>
                                                    <?php foreach ($beneficios as $beneficioB) {
                                                        if ($planoBeneficio->FK_BENEFICIOS_BNF_ID == $beneficioB->BNF_ID) { ?>
                                                            <option value="<?php echo $beneficioB->BNF_ID ?>" selected><?php echo $beneficioB->BNF_DESCRICAO ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?php echo $beneficioB->BNF_ID ?>"><?php echo $beneficioB->BNF_DESCRICAO ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="col-md-2 form-group mt-3 mt-md-0">
                                                <input type="number" name="valor_beneficio_existente" class="form-control" id="valor_beneficio" placeholder="Valor" value="<?php echo $planoBeneficio->PBN_VALOR_BENEFICIO ?>" disabled>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="col-1 mt-2 px-0">
                                                <a class="editar" title="Editar"><span class='bi bi-pencil-square align-middle'></span></a>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="loading">Carregando</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Sua edição foi efetuada. Muito obrigado!</div>
                        </div>
                        <div class="row-md-6 form-group mt-3">
                            <div class="text-center"><button type="submit">Confirmar Edição</button></div>
                            <div class="validate"></div>
                        </div>
                    </div>
                </form>

            </div>
        </section><!-- End Appointment Section -->

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
                                <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Prescrição de
                                        Medicamentos</a></li>
                                <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Encaminhamento para
                                        Exames</a></li>
                                <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Controle de Pacientes</a>
                                </li>
                                <li><i class="btn-footer bx bx-chevron-right"></i> <a href="#">Gestão de
                                        Funcionários</a>
                                </li>
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

        <!-- Teste Datatables -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src=" https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    dom: 'lfBrtip',
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ resultados por página",
                        "zeroRecords": "Nada encontrado",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "Não disponível",
                        "infoFiltered": "(filtrado do _MAX_ total de dados)",
                        "search": "Pesquisar:",
                        "searchPlaceholder": "Plano",
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

        <!-- Precisa estar no arquivo, sem ser externo, pois usa o php desta página -->



        <script type="text/javascript">
            var $dependente = (
                `<div class="row">
                <div class="col-md-2 form-group mt-3 mt-md-0">
                <input type="number" name="idade_min[]" class="form-control" id="idade_min" placeholder="Idade min.">
                <div class="validate"></div>
                </div>
                <div class="col-md-2 form-group mt-3 mt-md-0">
                <input type="number" name="idade_max[]" class="form-control" id="idade_min" placeholder="Idade max.">
                <div class="validate"></div>
                </div>
                <div class="col-md-2 form-group mt-3 mt-md-0">
                <input type="number" name="preco[]" class="form-control" id="preco_dependente" placeholder="Preço" step=".01">
                <div class="validate"></div>
                </div>
                <div class="col-1 mt-2 px-0">
                <a class="remover" title="Remover"><span class='bi bi-x-circle-fill align-middle' style='color: red'></span></a>
                </div>
                </div>`
            );

            var $beneficio = (
                `<div class="row">
                <div class="col-md-2 form-group mt-3 mt-md-0">
                <select id="beneficio" class="form-select" name="beneficio[]">
                <?php foreach ($beneficios as $beneficio) { ?>
                <option value="<?php echo $beneficio->BNF_ID ?>"><?php echo $beneficio->BNF_DESCRICAO ?></option>
                <?php } ?>
                </select>
                <div class="validate"></div>
                </div>
                <div class="col-md-2 form-group mt-3 mt-md-0">
                <input type="number" name="valor_beneficio[]" class="form-control" id="valor_beneficio" placeholder="Valor">
                <div class="validate"></div>
                </div>
                <div class="col-1 mt-2 px-0">
                <a class="remover" title="Remover"><span class='bi bi-x-circle-fill align-middle' style='color: red'></span></a>
                </div>
                </div>`
            );

            $('.adicionar-dependente').on('click', function() {
                $('.div-dependentes').append($dependente);
            });

            $('.adicionar-beneficio').on('click', function() {
                $('.div-beneficios').append($beneficio);
            });

            $(document).on('click', '.remover', function() {
                $(event.target).parent().parent().parent().remove();
            });
        </script>

        <script src="/Assets/js/mod03/editarPlanos.js"></script>

    </main>

</body>

</html>