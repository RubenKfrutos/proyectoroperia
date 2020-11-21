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
                                                <th>Opciones</th>
                                        </tr>  
                                </thead>

                                <tbody>
                                        <?php foreach ($devolucionesVentas as $devolucionesVenta_item) : ?>
                                                <tr>
                                                        <td><?php echo $devolucionesVenta_item['id_producto']; ?></td>
                                                        <td><?php echo $devolucionesVenta_item['id_cliente']; ?></td>
                                                        <td><?php echo $devolucionesVenta_item['fecha']; ?></td>
                                                        <td>
                                                                <a href="<?php echo site_url('devolucionesVentas/view/' . $devolucionesVenta_item['id']); ?>" class="btn btn-success btn-circle">
                                                                        <i class="far fa-eye"></i>        
                                                                </a>
                                                                <a href="<?php echo site_url('devolucionesVentas/delete/' . $devolucionesVenta_item['id']); ?>" class="btn btn-danger btn-circle">
                                                                        <i class="fas fa-trash"></i>

                                                                </a>
                                                                <a href="<?php echo site_url('devolucionesVentas/edit/' . $devolucionesVenta_item['id']); ?>" class="btn btn-primary btn-circle">
                                                                        <i class="fas fa-edit"></i>
                                                                </a>
                                                        </td>
                                                </tr>

                                        <?php endforeach; ?>

                                </tbody>
                        </table>
                </div>
        </div>
</div>

<!--  -->