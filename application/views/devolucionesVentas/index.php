<!--  -->
<h1 class="h3 mb-4 text-gray-800">Devoluciones de Ventas</h1>

<a href="<?php echo site_url('devolucionesVentas/create/'); ?>" class="btn btn-success">
                    
                    <span class="text">Crear Devolucion</span>
                  </a>
<br>
<br>
<div class="card shadow mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Devoluciones de Ventas</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                                <th>Producto</th>
                                                <th>Cliente</th>
                                                <th>Fecha</th>
                                        </tr>  
                                </thead>

                                <tbody>
                                        <?php foreach ($devolucionesVentas as $devolucionesVenta_item) : ?>
                                                <tr>
                                                        <td><?php echo $devolucionesVenta_item['nombre_articulo']; ?></td>
                                                        <td><?php echo $devolucionesVenta_item['razon_social']; ?></td>
                                                        <td><?php echo $devolucionesVenta_item['fecha']; ?></td>
                                                        
                                                </tr>

                                        <?php endforeach; ?>

                                </tbody>
                        </table>
                </div>
        </div>
</div>

<!--  -->