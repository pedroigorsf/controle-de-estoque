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
      <!-- BEGIN - Content body -->

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Estoque</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="col-2">ID</th>
                  <th class="col-5">Nome</th>
                  <th class="col-1">Quantidade</th>
                  <th class="col-1">UDM</th>
                  <th class="col-2">Última entrada</th>
                  <th class="col-1">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($estoque)): ?>
                  <?php foreach ($estoque as $row): ?>

                    <tr>
                      <td>
                        <?= $row['id_estoque'] ?>
                      </td>
                      <td>
                        <?= $row['nome_produto'] ?>
                      </td>
                      <td>
                        <?= $row['estoque_atual'] ?>
                      </td>
                      <td>
                        <?= $row['udm'] ?>
                      </td>
                      <td>
                        <?= isset($row['dta_entrada']) ? $row['dta_entrada'] : 'Data não cadastrada' ?>
                      </td>
                      <td>
                        <?php if ($row['estoque_atual'] > 0): ?>
                          <button class="btn badge bg-success text-white disabled">Estoque ativo</button>
                        <?php else: ?>
                          <button class="btn badge bg-danger text-white disabled">Sem estoque</button>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
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
  var table = $('#dataTable').DataTable({ order: [[2, "asc"]] });

  $(document).ready(function () {
    $('#dataTable').DataTable({
      "language": {
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
      }
    });
  });


</script>

<?= $this->load->view('templates/footer', '', TRUE); ?>