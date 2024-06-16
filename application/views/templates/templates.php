<?= $this->load->view('templates/header', '', TRUE); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <!-- <div class="d-flex flex-row align-items-center justify-content-between mb-4">
    <h1 class="h3 d-inline-block mb-0 text-gray-800">Título da página</h1>
  </div> -->

  <!-- Content Row -->
  <div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">
            Componentes
          </h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <!-- BEGIN - Content body -->

          <a href="#" class="btn btn-outline-primary">Tabelas</a>
          <a href="#" class="btn btn-outline-primary">Gráficos</a>
          <a href="#" class="btn btn-outline-primary">Cores</a>
          <a href="#" class="btn btn-outline-primary">Botões</a>
          <a href="#" class="btn btn-outline-primary">Animações</a>
          <a href="#" class="btn btn-outline-primary">Cards</a>
          <a href="#" class="btn btn-outline-primary">Bordas</a>
          <a href="#" class="btn btn-outline-primary">Fotos</a>
          <a href="#" class="btn btn-outline-primary">Outros</a>

          <!-- END - Content body -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Main Content -->
</div>

<?= $this->load->view('templates/footer', '', TRUE); ?>