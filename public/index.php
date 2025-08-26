<?php
include '../app/Libraries/Rota.php';
include '../app/Libraries/Controllers.php';
include '../app/configuracao.php';
include '../app/Libraries/Database.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= APP_NOME ?></title>

   <link rel="stylesheet" href="<?=URL?>/public/bootstrap/css/bootstrap.css"/>
   
   <script src="<?URL?>/public/bootstrap/js/bootstrap.js"></script>
   
</head>
<body>
   <?php
   include '../app/views/header.php';
   $rotas = new Rota();
   include '../app/views/footer.php';
   //$rotas->url();
   ?>
</body>
</html>