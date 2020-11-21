<!--  -->
<h1 class="h3 mb-4 text-gray-800">Ventas</h1>

<a href="<?php echo site_url('ventas/create/'); ?>" class="btn btn-success">

    <span class="text">Nueva Venta</span>
</a>
<br>
<br>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Ventas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($ventas as $venta_item) : ?>
                        <tr>
                            <td><?php echo $venta_item['fecha_venta']; ?></td>
                            <td><?php echo $venta_item['razon_social']; ?></td>
                            <td><?php echo $venta_item['total']; ?></td>
                            <td>
                                <a data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-circle">
                                    <i class="far fa-eye"></i>
                                </a>

                                <a href="<?php echo site_url('ventas/edit/' . $venta_item['id']); ?>" class="btn btn-primary btn-circle">
                                    <i class="fas fa-ban"></i>
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade modal-lg" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Informacion de la Venta </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Importe</th>
                            <th>Subtotal</th>
                            <th>Descuento</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($articulos)) : ?>
                            <?php foreach ($articulos as $articulo) : ?>
                                <tr>
                                    <td><?php echo $articulo['nombre_articulo']; ?></td>
                                    <td><?php echo $articulo['precio']; ?></td>
                                    <td><?php echo $articulo['cantidad']; ?></td>
                                    <td><?php echo $articulo['monto_importe']; ?></td>
                                    <?php $datacliente = $cliente['id'] . "*" . $cliente['razon_social'] . "*" . $cliente['numero_documento']; ?>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-check" id="btn-check" value="<?php echo $datacliente; ?>"><span class="fa fa-check"></span></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--  -->