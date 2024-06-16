<?= $this->load->view('templates/header', '', TRUE); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->

  <div class="col-xl-12 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
          Posicione a câmera no código de barras
        </h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <!-- BEGIN - Content body -->

        <form class="row g-3">
          <div class="col-md-12">

            <div id="qr-reader" class="w-100 border-0"></div>
            <div id="qr-reader-results" class="mb-5"></div>


          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary d-inline-flex">
              <span class="material-symbols-outlined">search</span> Procurar</button>

            <button type="submit" class="btn btn-success d-inline-flex">
              <span class="material-symbols-outlined">add</span> Cadastrar</button>

            <button type="submit" class="btn btn-dark d-inline-flex">
              <span class="material-symbols-outlined">swap_vert</span> Entrada/Saída</button>

            <button type="submit" class="btn btn-warning d-inline-flex">
              <span class="material-symbols-outlined">bar_chart</span> Média ponderada</button>

            <button type="submit" class="btn btn-info d-inline-flex">
              <span class="material-symbols-outlined">monitoring</span> Análise individual</button>

            <button type="submit" class="btn btn-light d-inline-flex">
              <span class="material-symbols-outlined">keyboard_return</span> Voltar</button>
          </div>
        </form>

        <!-- END - Content body -->
      </div>
    </div>
  </div>

</div>
<!-- End of Main Content -->
</div>

<?= $this->load->view('templates/footer', '', TRUE); ?>