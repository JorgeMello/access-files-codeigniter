<?= $this->extend('principal') ?>

<?= $this->section('content') ?>
<h2>Enviar foto</h2>
<?php echo form_open_multipart('ArquivoUpload/upload'); ?>

<!-- <form action="/ArquivoUpload/upload" method="post" enctype="multipart/form-data"> -->
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="imagem" class="form-label">Imagem</label>
        <input type="file" class="form-control" id="imagem" name="imagem" required>
    </div>
    <button type="submit" class="btn btn-success">Arquivar</button>
    <?php form_close() ?>

<script>
    window.onload = function() {
        document.getElementById("nome").focus();
    }
</script>
<?= $this->endSection() ?>