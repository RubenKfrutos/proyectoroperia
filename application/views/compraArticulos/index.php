<!--  -->
<h1 class="h3 mb-4 text-gray-800">Compra de Articulos</h1>

<a href="<?php echo site_url('compraArticulos/create/'); ?>" class="btn btn-success">
                    
                    <span class="text">Registrar la Compra de Articulos</span>
                  </a>
<br>
<br>
<div class="card shadow mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Compras</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                                <th>Fecha de Compra</th>
                                                <th>Numero de Compra</th>
                                                <th>Total de Compra</th>
                                                <th>Opciones</th>
                                        </tr>  
                                </thead>

                                <tbody>
                                        <?php foreach ($compraArticulos as $compraArticulo_item) : ?>
                                                <tr>
                                                        <td><?php echo $compraArticulo_item['fecha_compra']; ?></td>
                                                        <td><?php echo $compraArticulo_item['numero_compra']; ?></td>
                                                        <td><?php echo $compraArticulo_item['total_compra']; ?></td>
                                                        <td>
                                                                <a href="<?php echo site_url('compraArticulos/view/' . $compraArticulo_item['id']); ?>" class="btn btn-success btn-circle">
                                                                        <i class="far fa-eye"></i>        
                                                                </a>
                                                                <a href="<?php echo site_url('compraArticulos/delete/' . $compraArticulo_item['id']); ?>" class="btn btn-danger btn-circle">
                                                                        <i class="fas fa-trash"></i>

                                                                </a>
                                                                <a href="<?php echo site_url('compraArticulos/edit/' . $compraArticulo_item['id']); ?>" class="btn btn-primary btn-circle">
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