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

      <!-- <a href="index.html"><img src="assets/img/logo_completa_2.png" alt="" class="logo_inicio"></a> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="../../index.html" class="logo me-auto"><img src="../../assets/img/logo_completa_2.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="../../index.html">Início</a></li>
          <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
          <li><a class="nav-link scrollto" href="#services">Serviços</a></li>
          <li><a class="nav-link scrollto" href="#departments">Especialidades</a></li>
          <li><a class="nav-link scrollto"
              href="formUsuario.html">Cadastro
              de Usuário</a></li>
          <li class="dropdown"><a href="#"><span>Departamentos</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Médico</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a
                      href="formConsulta.html">Marcar
                      uma CONSULTA</a></li>
                  <li><a href="#">Ver Consultas</a></li>
                  <li><a href="listagemMedicos.html">Ver Médicos</a></li>
                  <li><a href="#">Ver Planos</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Administrativo</span><i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="view/mod01/listagemFuncionarios.php">Ver Funcionários</a></li>
                </ul>
                </li>
              <li><a href="#contact">Fale Conosco</a></li>
              <li><a href="#">Telemarketing</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="formConsulta.html" class="appointment-btn scrollto"><span class="d-none d-md-inline">Marque uma </span>
        CONSULTA</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Register Section ======= -->
    <section id="register" class="register section-bg">
      <div class="container">

        <div class="section-title">
          <br><br><br><br>
          <h2>Cadastro de Funcionário</h2>
          <p>Informe os dados referentes ao novo funcionário</p>
        </div>

        <form action="../../controller/funcionarios/cadastrarFuncionarios.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-8 form-group">
              Nome Completo
              <input type="text" name="nome_funcionario" class="form-control" id="nome_funcionario" placeholder="Nome Completo" data-rule="minlen:4"
                data-msg="Por favor, digite pelo menos 4 caracteres"  required>
              <div class="validate"></div>
            </div>
            <div class="col-md-2 form-group mt-3 mt-md-0">
              Data de Nascimento
              <input type="date" name="nascimento_funcionario" id="nascimento_funcionario" class="form-control datepicker" id="birthdate"
                placeholder="Data de Nascimento" data-rule="minlen:4"
                data-msg="Por favor, digite pelo menos 4 caracteres" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-2 form-group mt-3 mt-md-0">
              Sexo
              <select name="genre" id="genre" class="form-select">
                <option value="1">Masculino</option>
                <option value="2">Feminino</option>
                <option value="3">Outro</option>
              </select>
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              CPF
              <input type="text" class="form-control" name="cpf_funcionario" id="cpf_funcionario" placeholder="CPF" data-rule="minlen:4"
                data-msg="Por favor, digite pelo menos 4 caracteres" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              RG
              <input type="text" class="form-control" name="rg_funcionario" id="rg_funcionario" placeholder="RG" data-rule="minlen:4"
                data-msg="Por favor, digite pelo menos 4 caracteres" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              Orgão Emissor
              <input type="text" class="form-control" name="orgaoemissor_funcionario" id="orgaoemissor_funcionario" placeholder="Orgão Emissor" data-rule="minlen:3"
                data-msg="Por favor, digite pelo menos 4 caracteres" required>
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group mt-3 mt-md-0">
              Senha
              <input type="password" class="form-control" name="senha_funcionario" id="senha_funcionario" placeholder="Senha" data-rule="senha"
                data-msg="Por favor, digite uma senha válida" required>
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 form-group mt-3">
              Logradouro
              <input type="text" class="form-control" name="logradouro_funcionario" id="logradouro_funcionario" placeholder="Logradouro" data-rule="minlen:4"
                data-msg="Por favor, digite pelo menos 4 caracteres" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              Número
              <input type="text" class="form-control" name="numero_funcionario" id="numero_funcionario" placeholder="Número" data-rule="minlen:4"
                data-msg="Por favor, digite pelo menos 4 caracteres" required>
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              Bairro
              <input type="text" class="form-control" name="bairro_funcionario" id="bairro_funcionario" placeholder="Bairro" data-rule="minlen:4"
                data-msg="Por favor, digite pelo menos 4 caracteres" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              Cidade
              <input type="text" class="form-control" name="cidade_funcionario" id="cidade_funcionario" placeholder="Cidade" data-rule="minlen:4"
                data-msg="Por favor, digite pelo menos 4 caracteres" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
            <label for="Estado">Estado</label>
              <select name="estado_funcionario" id="estado_funcionario" class="form-select">
                <option value="">Selecione...</option>
                <option value="1">Acre</option>
                <option value="2">Alagoas</option>
                <option value="3">Amapá</option>
                <option value="4">Amazonas</option>
                <option value="5">Bahia</option>
                <option value="6">Ceará</option>
                <option value="7">Distrito Federal</option>
                <option value="8">Espírito Santo</option>
                <option value="9">Goiás</option>
                <option value="10">Maranhão</option>
                <option value="11">Mato Grosso</option>
                <option value="12">Mato Grosso do Sul</option>
                <option value="13">Minas Gerais</option>
                <option value="14">Pará</option>
                <option value="15">Paraíba</option>
                <option value="16">Paraná</option>
                <option value="17">Pernambuco</option>
                <option value="18">Piauí</option>
                <option value="19">Rio de Janeiro</option>
                <option value="20">Rio Grande do Norte</option>
                <option value="21">Rio Grande do Sul</option>
                <option value="22">Rondônia</option>
                <option value="23">Roraima</option>
                <option value="24">Santa Catarina</option>
                <option value="25">São Paulo</option>
                <option value="26">Sergipe</option>
                <option value="27">Tocantins</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              Telefone Celular
              <input type="tel" class="form-control" name="tel_celular" id="tel_celular" placeholder="Telefone" data-rule="minlen:4"
                data-msg="Por favor, digite pelo menos 4 caracteres" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-8 form-group mt-3">
              Função
              <select name="funcao_funcionario" id="funcao_funcionario" class="form-select"  required>
                <option value="1">Médico (a)</option>
                <option value="2">Enfermeiro (a)</option>
                <option value="3">Contabilidade</option>
                <option value="4">Administrativo</option>
              </select>
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 form-group mt-3">
              CRM
              <input type="text" class="form-control" name="crm_funcionario" id="crm_funcionario" placeholder="CRM" data-rule="minlen:4"
                data-msg="Por favor, digite pelo menos 4 caracteres" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-2 form-group mt-3">
              Data de Admissão
              <input type="date" name="admissao_funcionario" id="admissao_funcionario" class="form-control datepicker" id="birthdate"
                placeholder="Data de Admissão" data-rule="minlen:4"
                data-msg="Por favor, digite pelo menos 4 caracteres" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-2 form-group mt-3">
              Data de Demissão
              <input type="date" name="demissao_funcionario" id="demissao_funcionario" class="form-control datepicker" id="birthdate"
                placeholder="Data de Demissão" data-rule="minlen:4">
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              Salário
              <input type="number" class="form-control" name="salario_funcionario" id="salario_funcionario" placeholder="Salário R$" data-rule="minlen:3"
                data-msg="Por favor, digite pelo menos 4 caracteres" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              Hospital/Clínica Vinculado
              <input type="text" class="form-control" name="adm_clinica" id="adm_clinica" disabled value="OMINMED" required>
            </div>
            <div class="col-md-4 form-group mt-3">
              Prontuário
              <input type="text" class="form-control" name="prontuario_funcionario" id="prontuario_funcionario" disabled value="Gerado aleatóriamente de acordo com critérios" required>
            </div>
          </div>
          
     
          <div class="mb-3">
            <div class="loading">Carregando</div>
            <div class="error-message">Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta</div>
            <div class="sent-message">Seu cadastro foi efetuado. Muito obrigado!</div>
          </div>
          <div class="text-center"><button type="submit" class="appointment-btn scrollto">Cadastrar Funcionário</button></div>
          <br>
        </form>
        <div class="text-center">
              <a href="listagemFuncionarios.php">
                <button style="border:none;" class="appointment-btn scrollto">Voltar</button>
              </a>
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