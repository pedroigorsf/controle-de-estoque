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
            Cadastrar uma nova categoria
          </h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <!-- BEGIN - Content body -->

          <form class="row g-3">
            <div class="col-md-4">
              <label for="inputAddress2" class="form-label">Nome da categoria</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Ex: Alimentos Não Perecíveis">
            </div>

            <div class="col-md-6 mb-4">
              <label for="inputZip" class="form-label">Descrição</label>
              <input type="text" class="form-control" id="inputZip"
                placeholder="Ex: Alimentícios de longa durabilidade">
            </div>

            <div class="col-md-2">
              <label for="inputState" class="form-label">Status</label>
              <select id="inputState" class="form-select form-control">
                <option>Ativo</option>
                <option>Inativo</option>
              </select>
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary">Salvar</button>
              <button type="submit" class="btn btn-light">Cancelar</button>
            </div>
          </form>

          <!-- END - Content body -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Main Content -->
</div>

<?= $this->load->view('templates/footer', '', TRUE); ?>