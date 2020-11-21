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
                                <a data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-circle" onclick="loadVentaModal('<?php echo $venta_item['id']; ?>')"><i class="far fa-eye"></i></a>
                                <a href="<?php echo site_url('ventas/edit/' . $venta_item['id']); ?>" class="btn btn-primary btn-circle"> <i class="fas fa-ban"></i></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade " id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header bg-primary ">
                <h4 class="modal-title text-white"> Informacion de la Venta </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row col-12">
                    <div class="form-group col-4">
                        <label for="ventaId">ID de Venta</label>
                        <input disabled class="form-control" type="text" id="ventaId">
                    </div>
                    <div class="form-group col-4">
                        <label for="fecha">Fecha</label>
                        <input disabled class="form-control" type="text" id="fecha">
                    </div>
                    <div class="form-group col-4">
                        <label for="username">Vendedor</label>
                        <input disabled class="form-control" type="text" id="username">
                    </div>
                </div>
                <div class="row col-12">
                    <div class="form-group col-6">
                        <label for="cliente">Cliente</label>
                        <input disabled class="form-control" type="text" id="cliente">
                    </div>
                    <div class="form-group col-6">
                        <label for="documento">Documento</label>
                        <input disabled class="form-control" type="text" id="documento">
                    </div>
                </div>
                
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo de Barras</th>
                            <th>Artículo</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Importe</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyVentaDetalle">
                    </tbody>
                </table>
            </div>
            <div class="row col-12">
                    <div class="form-group col-4">
                        <label for="subtotal">ID de Venta</label>
                        <input disabled class="form-control" type="text" id="subtotal">
                    </div>
                    <div class="form-group col-4">
                        <label for="iva5">IVA 5%</label>
                        <input disabled class="form-control" type="text" id="iva5">
                    </div>
                    <div class="form-group col-4">
                        <label for="iva10">IVA 10%</label>
                        <input disabled class="form-control" type="text" id="iva10">
                    </div>
                </div>
                <div class="row col-12">
                    <div class="form-group col-6">
                        <label for="descuento">Descuento</label>
                        <input disabled class="form-control" type="text" id="descuento">
                    </div>
                    <div class="form-group col-6">
                        <label for="total"><b>Total</b></label>
                        <input disabled class="form-control" type="text" id="total">
                    </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#modal-default').on('hide.bs.modal', function (e) {
            clearModal();
        });
    });
    function loadVentaModal(ventaId) {
        try {
            if (ventaId == '') return;
            let venta;
            fetch('<?php echo site_url('ventas/getVenta/'); ?>' + ventaId)
                .then(response => /*console.log(response)*/ response.json())
                .then(data => {
                    venta = data;
                    //console.log("venta", venta);
                    loadVentaHeader(venta[0])
                });

            let ventaDetalles;
            fetch('<?php echo site_url('ventas/getVentaDetalle/'); ?>' + ventaId)
                .then(response => response.json())
                .then(data => {
                    ventaDetalles = data;
                    //console.log("ventaDetalles", ventaDetalles);
                    ventaDetalles.forEach(ventaDetalle => {
                        let html = `
                            <tr>
                                <td>1 </td>
                                <td> ${ventaDetalle.codigo_barras} </td>
                                <td> ${ventaDetalle.nombre_articulo} </td>
                                <td> ${ventaDetalle.precio_unitario} </td>
                                <td> ${ventaDetalle.cantidad} </td>
                                <td> ${ventaDetalle.monto_importe} </td>
                            </tr>
                        `;
                        $("#example1 tbody").append(html);
                    });
                });
        } catch (error) {
            console.error(error)
        }
    }
    function loadVentaHeader(ventaEntity) {
        document.getElementById('ventaId').value = ventaEntity.id;
        document.getElementById('fecha').value = ventaEntity.fecha_venta;
        document.getElementById('username').value = ventaEntity.username;
        document.getElementById('cliente').value = ventaEntity.razon_social;
        document.getElementById('documento').value = ventaEntity.numero_documento;
        document.getElementById('subtotal').value = ventaEntity.subtotal;
        document.getElementById('iva5').value = ventaEntity.iva_5;
        document.getElementById('iva10').value = ventaEntity.iva_10;
        document.getElementById('descuento').value = ventaEntity.descuento;
        document.getElementById('total').value = ventaEntity.total;
    }

    function clearModal() {
        document.getElementById('ventaId').value = '';
        document.getElementById('fecha').value = '';
        document.getElementById('username').value = '';
        document.getElementById('cliente').value = '';
        document.getElementById('documento').value = '';
        document.getElementById('subtotal').value = '';
        document.getElementById('iva5').value = '';
        document.getElementById('iva10').value = '';
        document.getElementById('descuento').value = '';
        document.getElementById('total').value = '';
        
        let tbody = document.getElementById('tbodyVentaDetalle');
        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }

       
    }
</script>