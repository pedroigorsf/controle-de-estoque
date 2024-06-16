<?= $this->load->view('templates/header', '', TRUE); ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    #preview-image {
        max-width: 100%;
        height: auto;
    }
</style>

<div class="container mt-5">
    <h1>Tirar e Upadar Imagem</h1>
    <form id="image-upload-form" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="imagem" class="form-label">Tire uma foto:</label>
            <input class="form-control" type="file" accept="image/*" capture="environment" id="imagem"
                onchange="previewImage()">
        </div>
        <div class="mb-3">
            <img id="preview-image" src="#" alt="Preview da Imagem" style="display: none;">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<!-- Adicione o JavaScript do Bootstrap (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function previewImage() {
        var fileInput = document.getElementById('imagem');
        var previewImage = document.getElementById('preview-image');

        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>


<?= $this->load->view('templates/footer', '', TRUE); ?>