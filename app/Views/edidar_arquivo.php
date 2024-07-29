<?= $this->extend('principal') ?>

<?= $this->section('content') ?>
<h2>Editar Arquivo</h2>

<form action="<?php echo base_url(); ?>/ArquivoUpload/atualizar" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="id_arquivo" id="id_arquivo" value="<?= $arquivo['id_arquivo'] ?>">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= $arquivo['nome'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?= $arquivo['descricao'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="imagem" class="form-label">Image</label>
        <input type="file" class="form-control" id="imagem" name="imagem">
        Imagem Original: 
        <img src="<?= site_url($arquivo['imagem']) ?>" alt="<?= $arquivo['nome'] ?>" width="150">
        <input type="hidden" name="nomeArquivoOriginal" id="nomeArquivoOriginal" value="<?= $arquivo['imagem'] ?>">
        <!-- <img src="/uploads/<?//= $arquivo['image'] ?>" alt="<?//= $arquivo['name'] ?>" width="50" class="mt-2"> -->
    </div>
    <button type="submit" class="btn btn-success">Alterar</button>
</form>
<?= $this->endSection() ?>