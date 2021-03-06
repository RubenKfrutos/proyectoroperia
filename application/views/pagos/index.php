<!--  -->
<h1 class="h3 mb-4 text-gray-800">Pagos</h1>

<a href="<?php echo site_url('pagos/create/'); ?>" class="btn btn-success">

    <span class="text">Crear Pago</span>
</a>
<br>
<br>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Pagos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Venta</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($pagos as $pago_item) : ?>
                        <tr>
                            <td><?php echo $pago_item['razon_social']; ?></td>
                            <td><?php echo $pago_item['fecha_pago']; ?></td>
                            <td><?php echo $pago_item['monto']; ?></td>
                            <td><?php echo $pago_item['id_venta']; ?></td>
                            
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!--  -->