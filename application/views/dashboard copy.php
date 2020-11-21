<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido al Dashboard</h1>
    <?php if($dat = $this->session->flashdata('msg')):?>
        <p><?=$dat?></p>
    <?php endif; ?>
    <a href="<?= site_url('login/logout')?>">Cerrar Sesion</a>

</body>
</html>