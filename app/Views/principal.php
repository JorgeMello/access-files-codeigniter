<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/bootstrap/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>public/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <!-- <h2>Arquivo</h2> -->
        <?= $this->renderSection('content') ?>

    </div>
</body>
</html>