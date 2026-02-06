<?php

use App\Entities\Dependentes;
use App\Models\DependentesModel;
use App\Models\PacientesModel;
use CodeIgniter\CLI\Console;

session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: /login");
    exit;
} elseif (!isset($_SESSION["usuario"]["email"])) {
    header("Location: /");
    exit;
}

$FK_PACIENTE_PAC_ID = $_SESSION["usuario"]['id'];

$dependentes = new Dependentes();
$dependenteModel = new DependentesModel();
$pacienteModel = new PacientesModel();

if ($pacienteModel->podeTerDependentes($FK_PACIENTE_PAC_ID) == 0) {
    header("Location: /");
    exit;
}

$dependentes = $dependenteModel->findAllDependentes($FK_PACIENTE_PAC_ID);

?>

<!DOCTYPE html>
<html lang="pt-br">

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

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Início</a></li>
                    <li>Bem-vindo(a) <?php echo $_SESSION["usuario"]['nome'] ?></a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="/pacientes/logado" class="appointment-btn scrollto"><span class=" d-md-inline">Perfil</span></a>

        </div>
    </header>
    <main id="main">

        <!-- Modal -->
        <div class="modal fade" id="ModalLongoExemplo" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalLongoExemplo">Informações do dependente</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <section id="counts" class="counts">
            <div class="container">
                <div class="section-title margem">
                    <h2>Gestão de Dependentes</h2>
                    <p>Abaixo, a lista de seus dependentes.</p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="gv">
                                <?php if (count($dependentes) == 0) { ?>
                                    <h3>Nenhum dado encontrado</h3>
                                <?php } else { ?>
                                    <table id="example" class="table table-striped table-bordered grid" style="width:100%;">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>Nome completo</th>
                                                <th>Data de Nascimento</th>
                                                <th>CPF</th>
                                                <th>Nivel de Parentesco</th>
                                                <th>Excluir</th>
                                                <th>Editar</th>
                                                <th>Visualizar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($dependentes as $key => $dependente) { ?>
                                                <tr style="text-align: center;" id="dadosDep">
                                                    <td><?php echo $dependente->USC_NOME; ?></td>
                                                    <td><?php $data = date_create($dependente->USC_DATA_NASCIMENTO);
                                                        echo date_format($data, 'd/m/Y'); ?></td>
                                                    <td><?php echo $dependente->USC_CPF; ?></td>
                                                    <?php $funcao = "";
                                                    switch ($dependente->DEP_NV_PARENTESCO) {
                                                        case 1:
                                                            $funcao = "Filho(a)";
                                                            break;
                                                        case 2:
                                                            $funcao = "Pai";
                                                            break;
                                                        case 3:
                                                            $funcao = "Mãe";
                                                            break;
                                                        case 4:
                                                            $funcao = "Outro(a)";
                                                            break;
                                                    }
                                                    ?>
                                                    <td><?php echo $funcao; ?></td>
                                                    <td><a data-url="/dependentes/excluir/<?php echo $dependente->DEP_ID; ?>" data-id="<?php echo $dependente->DEP_ID; ?>" class="deletar-dep" role="button"><span class='bi bi-trash'></span></a></td>
                                                    <td><a href="/dependentes/editar/<?php echo $dependente->DEP_ID; ?>"><span class='bi bi-pencil-square'></span></a></td>
                                                    <td><a data-id="<?php print_r($dependente); ?>" class="pegar" role="button" data-bs-toggle="modal" data-bs-target="#ModalLongoExemplo" onclick="pegar(<?php echo $dependente->DEP_ID ?>)"><span class="bi bi-eye"></span></a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>
                            <br>
                            <div class="text-center">
                                <a href="/dependentes/novo">
                                    <button style="border:none; margin: 0 auto;" class="appointment-btn scrollto">Cadastrar Dependente</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- End Counts Section -->
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
        <script src="/Assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="/Assets/js/common/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- FontAwesome Icons -->
        <script src="https://kit.fontawesome.com/7751608a2d.js" crossorigin="anonymous"></script>

        <!-- JS para exclusao do dependente -->
        <script src="/Assets/js/mod01/exclusao.js"></script>

        <script>
            // Esquema para formatar todos os cpf's quando a pagina carregar
            var tabelaDados = document.getElementById('example');
            for (var i = 1, row; row = tabelaDados.rows[i]; i++) {
                var campos = row.getElementsByTagName('td');
                campos[2].innerText = formataCPF(campos[2].innerText);
            }

            let idDepClicado = -1;

            function pegar(id) {
                idDepClicado = id;
            }

            function formataRG(rg) {
                rg = rg.replace(/[^\d]/g, "");
                return rg.replace(/(\d{2})(\d{3})(\d{3})(\d{1})/, "$1.$2.$3-$4");
            }

            function formataCPF(cpf) {
                cpf = cpf.replace(/[^\d]/g, "");
                return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
            }

            const parentesco = ['Ninguém', 'Filho(a)', 'Pai', 'Mãe', 'Outro(a)'];
            const sexo = ['Nenhum', 'Masculino', 'Feminino', 'Outro'];
            const estados = ['Nenhum', 'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão', 'Mato Grosso', 'Mato Grosso do Sul',
                'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro', 'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina',
                'São Paulo', 'Sergipe', 'Tocantins'
            ];



            const modal = $(".pegar");
            modal.on('click', function() {
                // Formatando todos os dependentes para o formato JSON
                // Auxiliando na manipulacao da obtencao dos dados do dependente correto
                var todosDep = JSON.stringify(<?php echo json_encode($dependentes); ?>);
                todosDep = JSON.parse(todosDep);

                let nomeEstado, genero, parente, cpf, rg, nome;
                let orgaoEmissor, cidade, bairro, numero, logradouro, dtNascimento;

                // For, para encontrar o dependente que foi clicado e pegar os dados no array
                todosDep.forEach(dep => {
                    if (dep.DEP_ID == idDepClicado) {
                        nomeEstado = estados[dep.USC_ESTADO];
                        genero = sexo[dep.USC_SEXO];
                        parente = parentesco[dep.DEP_NV_PARENTESCO];
                        cpf = formataCPF(dep.USC_CPF);
                        rg = formataRG(dep.USC_RG);
                        nome = dep.USC_NOME;

                        orgaoEmissor = dep.USC_ORGAO_EMISSOR;
                        cidade = dep.USC_CIDADE;
                        bairro = dep.USC_BAIRRO;
                        numero = dep.USC_NUMERO;
                        logradouro = dep.USC_LOGRADOURO;

                        let auxDtNascimento = dep.USC_DATA_NASCIMENTO.split('-').reverse().join('/');
                        dtNascimento = auxDtNascimento;
                    }
                });

                $(".modal-body").html('');

                // Dados pessoais
                const trNome = $("<tr>");
                const tdNome = "<td>" + '<span>Nome:</span> ' + nome + "</td>";
                trNome.append(tdNome);
                $(".modal-body").append(trNome);

                const trSexo = $("<tr>");
                const tdSexo = "<td>" + "<span>Sexo:</span> " + genero + "</td>";
                trSexo.append(tdSexo);
                $(".modal-body").append(trSexo);

                const trNascimento = $("<tr>");
                const tdNascimento = "<td>" + '<span>Data de Nascimento:</span> ' + dtNascimento + "</td>";
                trNascimento.append(tdNascimento);
                $(".modal-body").append(trNascimento);

                const trCPF = $("<tr>");
                const tdCPF = "<td>" + '<span>CPF: </span>' + cpf + "</td>";
                trCPF.append(tdCPF);
                $(".modal-body").append(trCPF);

                const trRG = $("<tr>");
                const tdRG = "<td>" + '<span>RG: </span>' + rg + "</td>";
                trRG.append(tdRG);
                $(".modal-body").append(trRG);

                const trEmissor = $("<tr>");
                const tdEmissor = "<td>" + '<span>Orgão emissor:</span> ' + orgaoEmissor + "</td>";
                trEmissor.append(tdEmissor);
                $(".modal-body").append(trEmissor);

                const trParente = $("<tr>");
                const tdParente = "<td>" + '<span>Nível de parentesco:</span> ' + parente + "</td>";
                trParente.append(tdParente);
                $(".modal-body").append(trParente);


                // Localidades
                const trCidade = $("<tr>");
                const tdCidade = "<td>" + '<span>Cidade:</span> ' + cidade + "</td>";
                trCidade.append(tdCidade);
                $(".modal-body").append(trCidade);

                const trEstado = $("<tr>");
                const tdEstado = "<td>" + '<span>Estado:</span> ' + nomeEstado + "</td>";
                trEstado.append(tdEstado);
                $(".modal-body").append(trEstado);

                const trBairro = $("<tr>");
                const tdBairro = "<td>" + '<span>Bairro:</span> ' + bairro + "</td>";
                trBairro.append(tdBairro);
                $(".modal-body").append(trBairro);

                const trNumero = $("<tr>");
                const tdNumero = "<td>" + '<span>Número:</span> ' + Number(numero) + "</td>";
                trNumero.append(tdNumero);
                $(".modal-body").append(trNumero);

                const trLogradouro = $("<tr>");
                const tdLogradouro = "<td>" + '<span>Logradouro:</span> ' + logradouro + "</td>";
                trLogradouro.append(tdLogradouro);
                $(".modal-body").append(trLogradouro);

                // Adicionando a class para colocar os titulos em negrito
                $('td span').addClass('titulo');
                $('td').addClass('elementoDependente');


            });
        </script>
</body>

</html>