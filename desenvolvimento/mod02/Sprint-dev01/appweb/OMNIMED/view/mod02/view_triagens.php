<?php
require_once __DIR__ . '/../../DAO/TriagemDAO.php';
require_once __DIR__ . '/../../model/TriagemModel.php';

$dao = new TriagemDAO();
$triagens = $dao->listarTriagens();

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
                  <li><a href="formConsulta.php">Marcar uma CONSULTA</a></li>
                  <li><a href="#">Ver Consultas</a></li>
                  <li><a href="view/mod02/view_agendamentos.php">Ver Agendamentos</a></li>
                  <li><a href="view/mod02/listagemMedicos.php">Ver Médicos</a></li>
                  <li><a href="#">Ver Planos</a></li>
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

      <a href="formConsulta.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Marque uma </span>
        CONSULTA</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title margem">
          <h2>Triagens</h2>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="gv">

                <table id="example" class="table table-striped table-bordered grid" style="width:100%;">

                  <thead>
                    <tr>
                      <th>ID da Triagem</th>
                      <th>Sintomas</th>
                      <th>Tabela de Dor</th>
                      <th>Pressão Sistólica</th>
                      <th>Pressão Diastólica</th>
                      <th>Temperatura</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach ($triagens as $triagem) { ?>
                      <tr>
                        <td><?php echo $triagem['TRG_ID']; ?></td>
                        <td><?php echo $triagem['TRG_SINTOMAS']; ?></td>
                        <td><?php echo $triagem['TRG_TABELA_DOR']; ?></td>
                        <td><?php echo $triagem['TRG_PRESSAO_SISTOLICA']; ?></td>
                        <td><?php echo $triagem['TRG_PRESSAO_DIASTOLICA']; ?></td>
                        <td><?php echo $triagem['TRG_TEMPERATURA']; ?></td>
                      <?php } ?>
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
  <script src="../../assets/vendor/aos/aos.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/common/main.js"></script>

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
  </script>
</body>

</html>
<!--<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta http-equiv="Content-Language" content="ptBR">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, inicial-scale=1, maximum-scale=1, user-scalabel=no, shrink-to-fit=no">

        <title>OMNIMED - Triagem</title>
    </head>
    <body>
        <h2>Efetuar Triagem</h2>
        <form action="/appweb/controller/TriagemController.php" method="POST">
            
            <input type="hidden" name="agendamentos_agd_id" id="agendamentos_agd_id" value="1">

            <label>Sintomas</label><br/>
            <textarea name="sintomas" id="sintomas" placeholder="Descreva aqui os seus sintmas" maxlength="255" required></textarea>
            <br/>
            
            <label>Tabela de dor</label><br/>
            <input type="number" name="tabela_dor" id="tabela_dor" placeholder="0-10" required>
            <br/>
            
            <label>Pressão Sistólica</label><br/>
            <input type="text" name="pressao_sistolica" id="pressao_sistolica">
            <br/>

            <label>Pressão Diastólica</label><br/>
            <input type="text" name="pressao_diastolica" id="pressao_diastolica">
            <br/>

            <label>Temperatura</label><br/>
            <input type="text" name="temperatura" id="temperatura">
            <br/>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>-->