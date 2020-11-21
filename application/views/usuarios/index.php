<!--  -->
<h1 class="h3 mb-4 text-gray-800">Usuarios</h1>

<a href="<?php echo site_url('usuarios/create/'); ?>" class="btn btn-success">
                    
                    <span class="text">Crear</span>
                  </a>
<br>
<br>
<div class="card shadow mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                                <th>Nombre</th>
                                                <th>Usuario</th>
                                                <th>Opciones</th>
                                        </tr>  
                                </thead>

                                <tbody>
                                        <?php foreach ($usuarios as $usuario_item) : ?>
                                                <tr>
                                                        <td><?php echo $usuario_item['nombre']; ?></td>
                                                        <td><?php echo $usuario_item['username']; ?></td>
                                                        <td>
                                                                <a href="<?php echo site_url('usuarios/view/' . $usuario_item['id']); ?>" class="btn btn-success btn-circle">
                                                                        <i class="far fa-eye"></i>        
                                                                </a>
                                                                <a href="<?php echo site_url('usuarios/delete/' . $usuario_item['id']); ?>" class="btn btn-danger btn-circle">
                                                                        <i class="fas fa-trash"></i>

                                                                </a>
                                                                <a href="<?php echo site_url('usuarios/edit/' . $usuario_item['id']); ?>" class="btn btn-primary btn-circle">
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