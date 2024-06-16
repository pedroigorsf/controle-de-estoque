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
            Cadastrar um novo fornecedor
          </h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <!-- BEGIN - Content body -->

          <form method="POST" action="<?= base_url('Fornecedores/save') ?>" class="row g-3">
            <div class="col-md-7">
              <label for="inputAddress2" class="form-label">Nome do fornecedor</label>
              <input type="text" name="nome_fornecedor" class="form-control" id="inputAddress2"
                placeholder="Ex: Pedro Ferreira LTDA">
            </div>
            <div class="col-md-5 mb-4">
              <label for="inputAddress2" class="form-label">CNPJ</label>
              <input type="text" name="cnpj" class="form-control" id="inputAddress2"
                placeholder="Ex: 11.111.111/1111-11">
            </div>
            <div class="col-md-4">
              <label for="inputAddress2" class="form-label">Nome do contato</label>
              <input type="text" name="nome_contato" class="form-control" id="inputAddress2"
                placeholder="Ex: Pedro Ferreira">
            </div>
            <div class="col-md-4">
              <label for="inputAddress2" class="form-label">Telefone</label>
              <input type="text" name="telefone" class="form-control" id="inputAddress2"
                placeholder="Ex: (DDD) 9 1111-1111">
            </div>
            <div class="col-md-4 mb-4">
              <label for="inputAddress2" class="form-label">E-mail</label>
              <input type="text" name="email" class="form-control" id="inputAddress2"
                placeholder="Ex: pedro@ferreira.com">
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

  <!-- Content Row -->
  <div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">
            Últimos produtos cadastrados
          </h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <!-- BEGIN - Content body -->

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>CNPJ</th>
                  <th>Contato</th>
                  <th>Telefone</th>
                  <th>Email</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>

                <?php foreach ($fornecedores as $fornecedor): ?>
                  <tr>
                    <td>
                      <?= !empty ($fornecedor['id_fornecedor']) ? $fornecedor['id_fornecedor'] : '' ?>
                    </td>
                    <td>
                      <?= !empty ($fornecedor['nome_fornecedor']) ? $fornecedor['nome_fornecedor'] : '' ?>
                    </td>
                    <td>
                      <?= !empty ($fornecedor['cnpj']) ? $fornecedor['cnpj'] : '' ?>
                    </td>
                    <td>
                      <?= !empty ($fornecedor['nome_contato']) ? $fornecedor['nome_contato'] : '' ?>
                    </td>
                    <td>
                      <?= !empty ($fornecedor['telefone']) ? $fornecedor['telefone'] : '' ?>
                    </td>
                    <td>
                      <?= !empty ($fornecedor['email']) ? $fornecedor['email'] : '' ?>
                    </td>
                    <td><button class="btn badge bg-success text-white disabled">Ativo</button></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- END - Content body -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Main Content -->
</div>

<?= $this->load->view('templates/footer', '', TRUE); ?>