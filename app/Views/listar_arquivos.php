<?= $this->extend('principal') ?>

<?= $this->section('content') ?>
<h2>Listar Arquivos</h2>
<a href="<?php echo base_url(); ?>ArquivoUpload/criar" class="btn btn-primary mb-3">Enviar Arquivo</a>
<?php 
if (session('sucesso') !== null) {
   echo '<p>' . session('sucesso') . '</p>';
}
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($imagens as $imagem): ?>
        <tr>
            <td><?= $imagem['id_arquivo'] ?></td>
            <td><?= $imagem['nome'] ?></td>
            <td><?= $imagem['descricao'] ?></td>
            <td><img src="<?= site_url($imagem['imagem']) ?>" alt="<?= $imagem['nome'] ?>" width="150"></td>
            <td>
            <form action="<?php echo base_url(); ?>ArquivoUpload/editar" method="post" style="display:inline-block;">   
            <!-- <a href="ArquivoUpload/editar" class="btn btn-warning btn-sm">Alterar</a> -->
            <button type="submit" class="btn btn-warning btn-sm">Alterar</button>
            <input type="hidden" name="id_arquivo" id="id_arquivo" value="<?= $imagem['id_arquivo'] ?>">
            </form>
            <form action="<?php echo base_url(); ?>ArquivoUpload/excluir" method="post" style="display:inline-block;">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_arquivo" id="id_arquivo" value="<?= $imagem['id_arquivo'] ?>">
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>