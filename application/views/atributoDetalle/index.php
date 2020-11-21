<!--  -->
<h1 class="h3 mb-4 text-gray-800">Atributo Detalle</h1>

<a href="<?php echo site_url('atributoDetalle/create/'); ?>" class="btn btn-success">
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
                                                <th>Atributo</th>
                                                <th>Valor</th>
                                                <th>Opciones</th>
                                        </tr>
                                </thead>

                                <tbody>
                                        <?php foreach ($atributoDetalle as $atributoDetalle_item) : ?>
                                                <tr>
                                                        <td><?php echo $atributoDetalle_item['nombre_atributo']; ?></td>
                                                        <td><?php echo $atributoDetalle_item['valor_atributodetalle']; ?></td>
                                                        <td>
                                                                <a href="<?php echo site_url('atributoDetalle/view/' . $atributoDetalle_item['id']); ?>" class="btn btn-success btn-circle">
                                                                        <i class="far fa-eye"></i>
                                                                </a>
                                                                <a href="<?php echo site_url('atributoDetalle/delete/' . $atributoDetalle_item['id']); ?>" class="btn btn-danger btn-circle">
                                                                        <i class="fas fa-trash"></i>

                                                                </a>
                                                                <a href="<?php echo site_url('atributoDetalle/edit/' . $atributoDetalle_item['id']); ?>" class="btn btn-primary btn-circle">
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