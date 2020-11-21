<!--  -->
<h1 class="h3 mb-4 text-gray-800">Control de Creditos</h1>

<a href="<?php echo site_url('controlCreditos/create/'); ?>" class="btn btn-success">
                    
                    <span class="text">Crear Credito</span>
                  </a>
<br>
<br>
<div class="card shadow mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Control de Creditos</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                                <th>Cliente</th>
                                                <th>Venta</th>
                                                <th>Monto total</th>
                                                <th>Saldo</th>
                                                <th>Opciones</th>
                                        </tr>  
                                </thead>

                                <tbody>
                                        <?php foreach ($controlCreditos as $controlCredito_item) : ?>
                                                <tr>
                                                        <td><?php echo $controlCredito_item['razon_social']; ?></td>
                                                        <td><?php echo $controlCredito_item['id_venta']; ?></td>
                                                        <td><?php echo $controlCredito_item['monto_total']; ?></td>
                                                        <td><?php echo $controlCredito_item['saldo']; ?></td>
                                                        <td>
                                                                <a href="<?php echo site_url('controlCreditos/view/' . $controlCredito_item['id']); ?>" class="btn btn-success btn-circle">
                                                                        <i class="far fa-eye"></i>        
                                                                </a>
                                                                <a href="<?php echo site_url('controlCreditos/delete/' . $controlCredito_item['id']); ?>" class="btn btn-danger btn-circle">
                                                                        <i class="fas fa-trash"></i>

                                                                </a>
                                                                <a href="<?php echo site_url('controlCreditos/edit/' . $controlCredito_item['id']); ?>" class="btn btn-primary btn-circle">
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