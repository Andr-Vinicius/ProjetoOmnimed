<?php
    include '../../DAO/DependentesDAO.php';
    $dao = new DependentesDAO();
    $dados = $dao->listarDependentes();
?>

<!DOCTYPE html>
<html lang="pt-br">

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
            <a href="../../index.html" class="logo me-auto"><img src="../../assets/images/common/logo_completa_2.png"
                    alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Início</a></li>
                    <li>Bem-vindo(a) current_user</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="" class="appointment-btn scrollto"><span class="d-none d-md-inline">Perfil</span></a>
            <a href="../../index.html" class="appointment-btn scrollto"><span class="d-none d-md-inline">Sair</span></a>

        </div>
    </header>
    <main id="main">

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
                              <?php if(count($dados)==0){ ?>
                                <h3>Nenhum dado encontrado</h3>
                              <?php }else{ ?>  
                                <table id="example" class="table table-striped table-bordered grid" style="width:100%;">
                                    <fthead>
                                        <tr>
                                            <th>Nome completo</th>
                                            <th>Data de Nascimento</th>
                                            <th>CPF</th>
                                            <th>Nivel de Parentesco</th>
                                            <th>Excluir</th>
                                            <th>Editar</th>
                                            <th>Visualizar</th>
                                        </tr>
                                    </fthead>
                                    <tbody>
                                      <?php foreach($dados as $dado){ ?>
                                        <tr>
                                          <td><?php echo $dado['USC_NOME'];?></td>
                                          <td><?php echo $dado['USC_DATA_NASCIMENTO'];?></td>
                                          <td><?php echo $dado['USC_CPF'];?></td>
                                          <?php $funcao = ""; switch($dado['DEP_NV_PARENTESCO']){
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
                                          <td><?php echo $funcao;?></td>
                                          <td><a href="#"><span class='bi bi-trash'></span></a></td>
                                          <td><a href="#"><span class='bi bi-pencil-square'></span></a></td>
                                          <td><a href="#"><span class='bi bi-eye'></span></a></td>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                              <label class="col-md-2 control-label" for="CadastrarDependente"></label>
                              <div class="col-md-8">
                                <button id="CadastrarDependente" name="CadastrarDependente" class="btn btn-success" type="Submit"  onclick="window.location.href='/create_dependentes'">Cadastrar Dependente</button>
                             
                              </div>
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
  <a href="#" class="btn-toTop back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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
</body>

</html>