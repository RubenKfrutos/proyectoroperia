
    <h1>Bienvenido al Sistema</h1>
    <?php if($dat = $this->session->flashdata('msg')):?>
        <p><?=$dat?></p>
    <?php endif; ?>
    <!-- <a href="<?php// base_url('login/logout')?>">Cerrar Sesion</a> -->
