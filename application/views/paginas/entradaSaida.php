<?= $this->load->view('templates/header', '', TRUE); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <!-- <div class="d-flex flex-row align-items-center justify-content-between mb-4">
    <h1 class="h3 d-inline-block mb-0 text-gray-800">Título da página</h1>
  </div> -->


  <div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">
            Registrar entrada e/ou saída de produtos
          </h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <!-- BEGIN - Content body -->

          <form method="POST" action="<?= base_url('EntradaSaida/save') ?>" class="row g-3 needs-validation" novalidate>
            <div class="col-md-3 mb-4">
              <label for="inputPassword4" class="form-label">Cód. Barras <a href="<?= base_url('LeitorQR') ?>"
                  class="btn badge badge-primary text-white ml-2"><i class="fas fa-qrcode fa-fw"></i><small> Ler
                    código</small></a></label>
              <input type="text" class="form-control" id="inputPassword4" readonly>
            </div>
            <div class="col-md-3">
              <label for="inputState" class="form-label">Produto *</label>
              <select id="inputState" name="id_produto" class="form-select form-control" required>
                <option selected hidden value="">Escolha um produto</option>
                <?php foreach ($produtos as $produto): ?>
                  <option value="<?= $produto['id_produto'] ?>">
                    <?= $produto['nome_produto'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-1 mb-4">
              <label for="inputZip" class="form-label">UDM</label>
              <input type="text" class="form-control" id="inputZip" value="und" readonly>
            </div>

            <div class="col-md-2 mb-4">
              <label for="inputZip" class="form-label">Quantidade *</label>
              <input type="number" name="quantidade_movimentada" class="form-control" id="inputZip" required>
            </div>

            <div class="col-md-3">
              <label for="inputState" class="form-label">Tipo da movimentação *</label>
              <select id="inputState" name="tipo_movimentacao" class="form-select form-control" required>
                <option selected hidden value="">Escolha a movimentação</option>
                <option value="entrada">Entrada</option>
                <option value="break">Break</option>
                <!-- <option value="saida">Venda</option> -->
                <option value="descarte">Descarte</option>
                <option value="transferencia">Transferência</option>
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

  <!-- Content Row -->
  <div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
      <!-- BEGIN - Content body -->

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between mb-4">
          <h6 class="m-0 font-weight-bold text-primary">Entrada e Saída de Materiais</h6>

          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <button class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-filter fa-sm text-white-50"></i> Filtrar
              </button>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Filtrar por resultado:</div>
              <a class="dropdown-item" href="<?= base_url('EntradaSaida?filtro=diario') ?>">Diario</a>
              <a class="dropdown-item" href="<?= base_url('EntradaSaida?filtro=semanal') ?>">Semanal</a>
              <a class="dropdown-item" href="<?= base_url('EntradaSaida?filtro=mensal') ?>">Mensal</a>
              <a class="dropdown-item" href="<?= base_url('EntradaSaida?filtro=anual') ?>">Anual</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Produto</th>
                  <th>UDM</th>
                  <th>Quantidade</th>
                  <!-- <th>Lote</th> -->
                  <th>Responsável</th>
                  <th>Data movim.</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($movimentacoes as $row): ?>
                  <tr>
                    <td>
                      <?= $row['id_movimentacao'] ?>
                    </td>
                    <td>
                      <?= $row['nome_produto'] ?>
                    </td>
                    <td>
                      <?= $row['udm'] ?>
                    </td>
                    <td>
                      <?= $row['quantidade_movimentada'] ?>
                    </td>
                    <!-- <td>
                      <?= $row['lote_movimentado'] ?>
                    </td> -->
                    <td>
                      <?= $row['nome_usuario'] ?>
                    </td>
                    <td>
                      <?= $row['dta_movimentacao'] ?>
                    </td>
                    <td>
                      <?php if ($row['tipo_movimentacao'] == 'entrada'): ?>
                        <button class="btn badge bg-primary text-white disabled">
                          <i class="fa-solid fa-box-archive"></i>
                          Reposição
                        </button>
                      <?php elseif ($row['tipo_movimentacao'] == 'saida'): ?>
                        <button class="btn badge bg-success text-white disabled">
                          <i class="fa-solid fa-sack-dollar"></i>
                          Venda
                        </button>
                      <?php elseif ($row['tipo_movimentacao'] == 'descarte'): ?>
                        <button class="btn badge bg-danger text-white disabled">
                          <i class="fa-solid fa-trash"></i>
                          Descarte
                        </button>
                      <?php elseif ($row['tipo_movimentacao'] == 'break'): ?>
                        <button class="btn badge bg-dark text-white disabled">
                          <i class="fa-solid fa-person"></i>
                          Break
                        </button>
                      <?php elseif ($row['tipo_movimentacao'] == 'transferencia'): ?>
                        <button class="btn badge bg-secondary text-white disabled">
                          <i class="fa-solid fa-rotate"></i>
                          Transferência
                        </button>
                      <?php endif; ?>
                    </td>

                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- END - Content body -->
    </div>
  </div>
</div>
<!-- End of Main Content -->
</div>

<script>
  $(document).ready(function () {
    var table = $('#dataTable').DataTable({
      order: [[0, "desc"]],
      language: {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Exibir _MENU_ registros por página",
        "sZeroRecords": "Nenhum resultado encontrado",
        "sEmptyTable": "Nenhum resultado encontrado",
        "sInfo": "Exibindo do _START_ até _END_ de um total de _TOTAL_ registros",
        "sInfoEmpty": "Exibindo do 0 até 0 de um total de 0 registros",
        "sInfoFiltered": "(Filtrado de um total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Próximo",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending": ": Ativar para ordenar a columna de maneira ascendente",
          "sSortDescending": ": Ativar para ordenar a columna de maneira descendente"
        }
      },
      dom: 'Bfrtip',
      buttons: [
        { extend: 'copy', className: 'btn btn-primary btn-sm', text: '<i class="fas fa-copy"></i> Copiar' },
        { extend: 'csv', className: 'btn btn-warning btn-sm', text: '<i class="fas fa-file-csv"></i> CSV' },
        { extend: 'excel', className: 'btn btn-success btn-sm', text: '<i class="fas fa-file-excel"></i> Excel' },
        { extend: 'pdf', className: 'btn btn-danger btn-sm', text: '<i class="fas fa-file-pdf"></i> PDF' },
        { extend: 'print', className: 'btn btn-info btn-sm', text: '<i class="fas fa-print"></i> Imprimir' }
      ],

    });
    dt_staff.buttons().container().appendTo('#btns');
  });
</script>

<?= $this->load->view('templates/footer', '', TRUE); ?>