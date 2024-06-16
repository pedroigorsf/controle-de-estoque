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
    <div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">
            Cadastrar um novo produto
          </h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <!-- BEGIN - Content body -->

          <form method="POST" action="<?= base_url('Produtos') ?>/save" class="row g-3">

            <script>
              // JavaScript para pré-visualizar a imagem selecionada
              document.getElementById('inputGroupFile01').addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                  const reader = new FileReader();
                  reader.onload = function (event) {
                    const imgElement = document.createElement('img');
                    imgElement.setAttribute('src', event.target.result);
                    imgElement.setAttribute('class', 'img-fluid mt-3');
                    document.getElementById('imagePreview').innerHTML = '';
                    document.getElementById('imagePreview').appendChild(imgElement);
                  }
                  reader.readAsDataURL(file);
                }
              });
            </script>


            <div class="col-md-6 mb-4">
              <label for="inputPassword4" class="form-label">Código de barra <a href="<?= base_url('LeitorQR') ?>"
                  class="btn badge badge-primary text-white ml-2"><i class="fas fa-qrcode fa-fw"></i>
                  <small>
                    Ler código
                  </small>
                </a>
              </label>
              <input type="text" name="cod_barra" class="form-control" id="inputPassword4"
                value="<?= isset($cod_barra) ? $cod_barra : '' ?>" readonly>
            </div>

            <div class="col-md-6">
              <label for="inputAddress2" class="form-label" required>Nome do produto</label>
              <input type="text" name="nome_produto" class="form-control" id="inputAddress2"
                placeholder="Nome do produto" required>
            </div>

            <div class="col-md-3">
              <label for="inputState" class="form-label">UDM</label>
              <select id="inputState" name="udm" class="form-select form-control" required>
                <option selected hidden value="">Escolha uma opção</option>
                <option value="un">Unidade (un)</option>
                <option value="pc">Pacote (pc)</option>
                <option value="cx">Caixa (cx)</option>
                <option value="kg">Quilograma (kg)</option>
                <option value="lt">Litro (lt)</option>
                <option value="lt">Metro (m)</option>

              </select>
            </div>
            <div class="col-md-4">
              <label for="inputState" class="form-label">Categoria</label>
              <select id="inputState" name="categoria" class="form-select form-control" required>
                <option selected hidden value="">Escolha uma opção...</option>
                <option></option>
                <option>Carnes, Aves e Pescados</option>
                <option>Produtos Lácteos</option>
                <option>Hortaliças, Folhosas e Frutas</option>
                <option>Farinhas, Grãos e Cereais</option>
                <option>Molhos, Condimentos e Temperos</option>
                <option>Bebidas Alcoólicas e Não Alcoólicas</option>
                <option>Produtos Enlatados e Embalados</option>
                <option>Ingredientes Especiais</option>
              </select>
            </div>
            <div class="col-md-5 mb-4">
              <label for="inputZip" class="form-label">Descrição</label>
              <input type="text" name="descricao" class="form-control" id="inputZip">
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
    <div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">
            Os 5 últimos produtos cadastrados
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
                  <th>Cod. de barra</th>
                  <th>Nome</th>
                  <th>UDM</th>
                  <th>Categoria</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>

                <?php foreach ($produtos as $produto): ?>
                  <tr>
                    <td>
                      <?= !empty($produto['id_produto']) ? $produto['id_produto'] : '' ?>
                    </td>
                    <td>
                      <?= !empty($produto['cod_barra']) ? $produto['cod_barra'] : '' ?>
                    </td>
                    <td>
                      <?= !empty($produto['nome_produto']) ? $produto['nome_produto'] : '' ?>
                    </td>
                    <td>
                      <?= !empty($produto['udm']) ? $produto['udm'] : '' ?>
                    </td>
                    <td>
                      <?= !empty($produto['categoria']) ? $produto['categoria'] : '' ?>
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