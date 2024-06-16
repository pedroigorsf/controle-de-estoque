<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Toast</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Adicione estilos personalizados aqui, se necessário */
        .toast-custom {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            width: 300px;
            /* largura personalizável */
            margin-bottom: 1rem;
        }

        .toast-body-custom {
            display: flex;
            align-items: center;
            /* Alinha verticalmente o conteúdo do toast */
            padding: 0.5rem;
            /* Adiciona espaçamento interno ao redor do texto */
        }

        .toast-icon {
            margin-right: 0.5rem;
        }

        .toast-footer {
            height: 2px;
            background-color: white;
            animation: toastDuration 5s linear forwards;
            /* Duração da animação definida como 5s */
        }

        @keyframes toastDuration {
            from {
                width: 100%;
                /* Largura inicial da linha */
            }

            to {
                width: 0%;
                /* Largura final da linha (oculto) */
            }
        }
    </style>
</head>

<body>
    <!-- Conteúdo da página -->

    <!-- Toast -->
    <div id="customToast" class="toast text-primary bg-primary bg-opacity-25 border-0 toast-custom " role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="toast-body-custom shadow-lg p-2">
            <div class="toast-icon px-3 ">
                &#128712; <!-- Emoji Unicode para um ponto de informação -->
            </div>
            <div>
                <strong class="modal-title">Modal title</strong>
                <small>
                    <p class="pt-1 mb-0">O produto foi c</p>
                </small>
            </div>
        </div>
        <!-- Linha de animação no footer do toast -->
        <div class="toast-footer bg-primary"></div>
    </div>

    <!-- Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Mostrar o toast quando a página for carregada
        document.addEventListener('DOMContentLoaded', function () {
            var toast = new bootstrap.Toast(document.getElementById('customToast'));
            toast.show();
        });
    </script>
</body>

</html>





<?= $this->load->view('templates/header', '', TRUE); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Buttons</h1>

    <div class="row">

        <div class="col-lg-6">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Circle Buttons</h6>
                </div>
                <div class="card-body">



                    <div id="pageMessages">

                    </div>
                    <div class="jumbotron">
                        <div class="container">
                            <h1>Let's create some Alerts</h1>
                        </div>
                    </div>
                    <div class="container">
                        <button class="btn btn-danger"
                            onclick="createAlert('Opps!','Something went wrong','Here is a bunch of text about some stuff that happened.','danger',true,false,'pageMessages');">Add
                            Danger Alert</button>
                        <button class="btn btn-success"
                            onclick="createAlert('','Nice Work!','Here is a bunch of text about some stuff that happened.','success',true,true,'pageMessages');">Add
                            Success Alert</button>
                        <button class="btn btn-info"
                            onclick="createAlert('BTDubs','','Here is a bunch of text about some stuff that happened.','info',false,true,'pageMessages');">Add
                            Info Alert</button>
                        <button class="btn btn-warning"
                            onclick="createAlert('','','Here is a bunch of text about some stuff that happened.','warning',false,true,'pageMessages');">Add
                            Warning Alert</button>
                    </div>
                    <p>Use Font Awesome Icons (included with this theme package) along with the circle
                        buttons as shown in the examples below!</p>
                    <!-- Circle Buttons (Default) -->
                    <div class="mb-2">
                        <code>.btn-circle</code>
                    </div>
                    <a href="#" class="btn btn-primary btn-circle">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-success btn-circle">
                        <i class="fas fa-check"></i>
                    </a>
                    <a href="#" class="btn btn-info btn-circle">
                        <i class="fas fa-info-circle"></i>
                    </a>
                    <a href="#" class="btn btn-warning btn-circle">
                        <i class="fas fa-exclamation-triangle"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-circle">
                        <i class="fas fa-trash"></i>
                    </a>
                    <!-- Circle Buttons (Small) -->
                    <div class="mt-4 mb-2">
                        <code>.btn-circle .btn-sm</code>
                    </div>
                    <a href="#" class="btn btn-primary btn-circle btn-sm">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-success btn-circle btn-sm">
                        <i class="fas fa-check"></i>
                    </a>
                    <a href="#" class="btn btn-info btn-circle btn-sm">
                        <i class="fas fa-info-circle"></i>
                    </a>
                    <a href="#" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-exclamation-triangle"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-circle btn-sm">
                        <i class="fas fa-trash"></i>
                    </a>
                    <!-- Circle Buttons (Large) -->
                    <div class="mt-4 mb-2">
                        <code>.btn-circle .btn-lg</code>
                    </div>
                    <a href="#" class="btn btn-primary btn-circle btn-lg">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-success btn-circle btn-lg">
                        <i class="fas fa-check"></i>
                    </a>
                    <a href="#" class="btn btn-info btn-circle btn-lg">
                        <i class="fas fa-info-circle"></i>
                    </a>
                    <a href="#" class="btn btn-warning btn-circle btn-lg">
                        <i class="fas fa-exclamation-triangle"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-circle btn-lg">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>

            <!-- Brand Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Brand Buttons</h6>
                </div>
                <div class="card-body">
                    <p>Google and Facebook buttons are available featuring each company's respective
                        brand color. They are used on the user login and registration pages.</p>
                    <p>You can create more custom buttons by adding a new color variable in the
                        <code>_variables.scss</code> file and then using the Bootstrap button variant
                        mixin to create a new style, as demonstrated in the <code>_buttons.scss</code>
                        file.
                    </p>
                    <a href="#" class="btn btn-google btn-block"><i class="fab fa-google fa-fw"></i>
                        .btn-google</a>
                    <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f fa-fw"></i>
                        .btn-facebook</a>

                </div>
            </div>

        </div>

        <div class="col-lg-6">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Split Buttons with Icon</h6>
                </div>
                <div class="card-body">
                    <p>Works with any button colors, just use the <code>.btn-icon-split</code> class and
                        the markup in the examples below. The examples below also use the
                        <code>.text-white-50</code> helper class on the icons for additional styling,
                        but it is not required.
                    </p>
                    <a href="#" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Split Button Primary</span>
                    </a>
                    <div class="my-2"></div>
                    <a href="#" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Split Button Success</span>
                    </a>
                    <div class="my-2"></div>
                    <a href="#" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">Split Button Info</span>
                    </a>
                    <div class="my-2"></div>
                    <a href="#" class="btn btn-warning btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="text">Split Button Warning</span>
                    </a>
                    <div class="my-2"></div>
                    <a href="#" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Split Button Danger</span>
                    </a>
                    <div class="my-2"></div>
                    <a href="#" class="btn btn-secondary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text">Split Button Secondary</span>
                    </a>
                    <div class="my-2"></div>
                    <a href="#" class="btn btn-light btn-icon-split">
                        <span class="icon text-gray-600">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text">Split Button Light</span>
                    </a>
                    <div class="mb-4"></div>
                    <p>Also works with small and large button classes!</p>
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Split Button Small</span>
                    </a>
                    <div class="my-2"></div>
                    <a href="#" class="btn btn-primary btn-icon-split btn-lg">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Split Button Large</span>
                    </a>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->
<?= $this->load->view('templates/footer', '', TRUE); ?>