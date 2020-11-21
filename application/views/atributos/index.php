<!--  -->
<h1 class="h3 mb-4 text-gray-800">Atributos</h1>

<a href="<?php echo site_url('atributos/create/'); ?>" class="btn btn-success">
                    
                    <span class="text">Crear</span>
                  </a>
<br>
<br>
<div class="card shadow mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Atributos</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Opciones</th>
                                        </tr>  
                                </thead>

                                <tbody>
                                        <?php foreach ($atributos as $atributo_item) : ?>
                                                <tr>
                                                        <td><?php echo $atributo_item['codigo']; ?></td>
                                                        <td><?php echo $atributo_item['nombre']; ?></td>
                                                        <td>
                                                                <a href="<?php echo site_url('atributos/view/' . $atributo_item['id']); ?>" class="btn btn-success btn-circle">
                                                                        <i class="far fa-eye"></i>        
                                                                </a>
                                                                <a href="<?php echo site_url('atributos/delete/' . $atributo_item['id']); ?>" class="btn btn-danger btn-circle">
                                                                        <i class="fas fa-trash"></i>

                                                                </a>
                                                                <a href="<?php echo site_url('atributos/edit/' . $atributo_item['id']); ?>" class="btn btn-primary btn-circle">
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