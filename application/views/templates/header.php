<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Controle de Estoque - UNIESTOQUE</title>


  <link href="<?= base_url() ?>assets/alertas.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Icons - Material -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />

  <!-- Datatable -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Custom styles for this page -->
  <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet" />




</head>

<!-- Toast -->
<?php if (isset($_SESSION['tipo']) && !empty($_SESSION['tipo'])): ?>
  <div id="customToast" class="toast border-0 bg-light toast-custom mb-4" role="alert" aria-live="assertive"
    aria-atomic="true">
    <div class="toast-body-custom shadow-lg p-2">
      <div class="toast-icon text-<?= $_SESSION['cor'] ?> px-2 ">
        <span class="material-symbols-outlined">
          <?= $_SESSION['icone'] ?>
        </span>
      </div>
      <div>
        <strong class="modal-title text-<?= $_SESSION['cor'] ?>">
          <?= $_SESSION['titulo'] ?> - header.php
        </strong>
        <small>
          <p class="pt-1 mb-0 text-<?= $_SESSION['cor'] ?>">
            <?= $_SESSION['mensagem'] ?>
          </p>
        </small>
      </div>
    </div>
    <!-- Linha de animação no footer do toast -->
    <div class="toast-footer bg-<?= $_SESSION['cor'] ?>"></div>
  </div>
<?php endif; ?>




<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3 badge badge-light">
          <font color="#5899D5">UNI</font>
          <font color="#2C4381">ESTOQUE</font>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Cadastrar</div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Dashboard?filtro=mensal') ?>">
          <i class="fa-solid fa-chart-line"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Cadastrar</div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Produtos') ?>">
          <i class="fa-regular fa-square-plus"></i>
          <span>Cadastro de Produtos</span></a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Fornecedores') ?>">
          <i class="fas fa-fw fa-plus"></i>
          <span>Fornecedor</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Estoque</div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Estoque?filtro=mensal') ?>">
          <i class="fa-solid fa-box-archive"></i>
          <span>Estoque atualizado</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('EntradaSaida?filtro=mensal') ?>">
          <i class="fa-solid fa-arrow-right-arrow-left"></i>
          <span>Movimentações de Estoque</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Requisições</div>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Estoque?filtro=mensal') ?>">
          <i class="fa-solid fa-calendar-plus"></i>
          <span>Requisição de Abertura</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('EntradaSaida?filtro=mensal') ?>">
          <i class="fa-solid fa-calendar-xmark"></i>
          <span>Requisição de Fechamento</span></a>
      </li>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider" /> -->

      <!-- Heading -->
      <!-- <div class="sidebar-heading">Análise</div>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Analises') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Compras</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Análises</div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Vendas?filtro=mensal') ?>">
          <i class="fa-solid fa-sack-dollar"></i>
          <span>Análises de Vendas</span></a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Clientes?filtro=mensal') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Clientes</span></a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Relatorios?filtro=mensal') ?>">
          <i class="fa-regular fa-file-lines"></i>
          <span>Análises de Relatórios</span></a>
      </li>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider" />


      <div class="sidebar-heading">Configurar</div>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('ConfigMetas') ?>">
          <i class="fas fa-fw fa-cog"></i>
          <span>Metas</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('ConfigVencimento') ?>">
          <i class="fas fa-fw fa-cog"></i>
          <span>Vencimentos</span></a>
      </li> -->

      <hr class="sidebar-divider d-none d-md-block" />

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Procure por..."
                aria-label="Search" aria-describedby="basic-addon2" />
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - QR CODE (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a href="<?= base_url('LeitorQR') ?>" class="nav-link dropdown-toggle">
                <span class="material-symbols-outlined">
                  barcode_scanner
                </span>
              </a>
            </li>

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Procure por..."
                      aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <!-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">Alerts Center</h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for
                    your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li> -->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Pedro Ferreira</span>
                <img class="img-profile rounded-circle"
                  src="https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg" />
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                          Profile
                        </a>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                          Settings
                        </a>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                          Activity Log
                        </a>
                        <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->