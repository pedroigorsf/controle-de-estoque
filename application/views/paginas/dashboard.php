<?= $this->load->view('templates/header', '', TRUE); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-flex flex-row align-items-center justify-content-between mb-4">
    <h1 class="h3 d-inline-block mb-0 text-gray-800">Dashboard</h1>

    <div class="dropdown no-arrow">
      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <button class="btn btn-sm btn-primary shadow-sm">
          <i class="fas fa-filter fa-sm text-white-50"></i> Filtrar
        </button>
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
        <div class="dropdown-header">Filtrar por resultado:</div>
        <a class="dropdown-item" href="<?= base_url('Dashboard?filtro=diario') ?>">Diario</a>
        <a class="dropdown-item" href="<?= base_url('Dashboard?filtro=semanal') ?>">Semanal</a>
        <a class="dropdown-item" href="<?= base_url('Dashboard?filtro=mensal') ?>">Mensal</a>
        <a class="dropdown-item" href="<?= base_url('Dashboard?filtro=anual') ?>">Anual</a>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Produtos em estoque
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?= isset($countProdutosEstoque) ? $countProdutosEstoque[0]['total'] : 0 ?>
              </div>
            </div>

            <div class="col-auto">
              <i class="fas fa-archive fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Prod. cadastrados
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?= isset($countProdutosCadastrados) ? $countProdutosCadastrados[0]['total'] : 0 ?>
              </div>
            </div>

            <div class="col-auto">
              <i class="fas fa-check fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Estoque baixo
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?= isset($countProdutosasd) ? $countProdutosasd[0]['total'] : 0 ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
            </div>
          </div>
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
            Os 5 produtos mais movimentados
          </h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-area">
            <div id="quantidadeMovimentada"></div>
            <!-- <canvas id="myAreaChart"></canvas> -->
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->



<?= $this->load->view('templates/footer', '', TRUE); ?>

<script>
  var options = {
    series: [
      {
        name: "Entradas",
        data: [<?php foreach ($listQuantProdutoEntrada as $row): ?>
                                                 <?= $row['estoque_atual'] ?>,
          <?php endforeach; ?>]

      },
      {
        name: "Saídas",
        data: [<?php foreach ($listQuantProdutoSaida as $row): ?>
                                              <?= $row['saida'] ?>,
          <?php endforeach; ?>]
      }
    ],
    colors: ['#4E73DF', '#536E7A'],
    chart: {
      type: "bar",
      height: 300
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "55%",
        endingShape: "rounded"
      }
    },
    dataLabels: {
      enabled: true,
      style: {
        colors: ['#fff']
      },
      dropShadow: {
        enabled: true
      }
    },
    stroke: {
      show: false,
      width: 2,
      colors: ["transparent"]
    },
    xaxis: {
      categories: [
        <?php foreach ($listQuantProdutoEntrada as $row): ?>
                                                    "<?= $row['nome_produto'] ?>",
        <?php endforeach; ?>
      ],
      labels: {
        style: {
          fontSize: "11px",
          cssClass: ".apexcharts-margin"
        },
        hideOverlappingLabels: false,
        show: true,
        rotate: 0,
        rotateAlways: false,
        minHeight: 100,
        maxHeight: 1000
      }
    },
    yaxis: {
    },
    fill: {
      opacity: 1
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "" + val;
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#quantidadeMovimentada"), options);
  chart.render();

</script>