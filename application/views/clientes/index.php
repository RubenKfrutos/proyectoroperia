<!--  -->
<h1 class="h3 mb-4 text-gray-800">Clientes</h1>

<a href="<?php echo site_url('clientes/create/'); ?>" class="btn btn-success">
                    
                    <span class="text">Crear</span>
                  </a>
<br>
<br>
<div class="card shadow mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Clientes</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                                <th>Razon Social</th>
                                                <th>Tipo de Documento</th>
                                                <th>Numero de Documento</th>
                                                <th>Opciones</th>
                                        </tr>  
                                </thead>

                                <tbody>
                                        <?php foreach ($clientes as $cliente_item) : ?>
                                                <tr>
                                                        <td><?php echo $cliente_item['razon_social']; ?></td>
                                                        <td><?php echo $cliente_item['tipo_documento']; ?></td>
                                                        <td><?php echo $cliente_item['numero_documento']; ?></td>
                                                        <td>
                                                                <a href="<?php echo site_url('clientes/view/' . $cliente_item['id']); ?>" class="btn btn-success btn-circle">
                                                                        <i class="far fa-eye"></i>        
                                                                </a>
                                                                <a href="<?php echo site_url('clientes/delete/' . $cliente_item['id']); ?>" class="btn btn-danger btn-circle">
                                                                        <i class="fas fa-trash"></i>

                                                                </a>
                                                                <a href="<?php echo site_url('clientes/edit/' . $cliente_item['id']); ?>" class="btn btn-primary btn-circle">
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