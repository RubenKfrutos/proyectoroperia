<!--  -->
<h1 class="h3 mb-4 text-gray-800">Articulos</h1>

<a href="<?php echo site_url('articulos/create/'); ?>" class="btn btn-success">
                    
                    <span class="text">Crear</span>
                  </a>
<br>
<br>
<div class="card shadow mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Articulos</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                                <th>Codigo Interno</th>
                                                <th>Codigo de Barras</th>
                                                <th>Nombre del Articulo</th>
                                                <th>IVA</th>
                                                <th>Opciones</th>
                                        </tr>  
                                </thead>

                                <tbody>
                                        <?php foreach ($articulos as $articulo_item) : ?>
                                                <tr>
                                                        <td><?php echo $articulo_item['codigo_interno']; ?></td>
                                                        <td><?php echo $articulo_item['codigo_barras']; ?></td>
                                                        <td><?php echo $articulo_item['nombre_articulo']; ?></td>
                                                        <td><?php echo $articulo_item['iva']; ?></td>
                                                        <td>
                                                                <a href="<?php echo site_url('articulos/view/' . $articulo_item['id']); ?>" class="btn btn-success btn-circle">
                                                                        <i class="far fa-eye"></i>        
                                                                </a>
                                                                <a href="<?php echo site_url('articulos/delete/' . $articulo_item['id']); ?>" class="btn btn-danger btn-circle">
                                                                        <i class="fas fa-trash"></i>

                                                                </a>
                                                                <a href="<?php echo site_url('articulos/edit/' . $articulo_item['id']); ?>" class="btn btn-primary btn-circle">
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