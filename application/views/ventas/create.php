<h1 class="h3 mb-4 text-gray-800">Ventas</h1>
<?php echo validation_errors(); ?>
<?php echo form_open('ventas/store'); ?>
    <div class="row col-12">
        <div class="form-group col-6">
            <label for="fecha_venta">Fecha</label>
            <input disabled class="form-control" type="date" id="fecha_venta">
        </div>
    </div>

    <div class="form-group">
        <label for="id_cliente">Cliente:</label>
        <div class="input-group">
            <input type="hidden" name="id_cliente" id="id_cliente">
            <input type="text" class="form-control" disabled id="cliente">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
            </span>
        </div><!-- /input-group -->
    </div>

    <label for="articulos">Articulo</label>
    <div class="form-group d-flex ">
        <select class="form-control" name="articulos" id="select_articulo">
            <?php foreach ($articulos as $articulo) : ?>
                <option value="<?php echo $articulo['id']; ?>"><?php echo $articulo['nombre_articulo'] . ' - ' . $articulo['codigo_barras']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="button" class="btn btn-success" onclick="addProducto()">Agregar</button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Codigo</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Iva</th>
                    <th>Importe</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody> </tbody>
        </table>
    </div>

    <div class="row col-12">
        <div class="form-group col-3">
            <label for="iva_5">IVA 5%</label>
            <input readonly class="form-control" type="text" name="iva_5" id="iva_5">
        </div>

        <div class="form-group col-3">
            <label for="iva_10">IVA 10%</label>
            <input readonly class="form-control" type="text" name="iva_10">
        </div>

        <div class="form-group col-3">
            <label for="subtotal">Subtotal</label>
            <input readonly class="form-control" type="text" name="subtotal">
        </div>

        <div class="form-group col-3">
            <label for="descuento">Descuento (Monto)</label>
            <input class="form-control" type="text" name="descuento" id="descuento" onkeypress='validate(event)'>
        </div>
    </div>

    <label for="total">Total</label>
    <div class="form-group col-6 d-flex">
        <input readonly class="form-control" type="text" name="total"> &nbsp
        <input type="submit" name="submit" value="Guardar" class="btn btn-success" /> &nbsp
        <a href="<?php echo site_url('ventas/index/'); ?>" class="btn btn-danger">Atrás </a>
    </div>
</form>

<script>
    $(document).ready(function() {
        // $('#id_cliente').select2().prop("selectedIndex", "-1").change();
        $('#select_articulo').select2().prop("selectedIndex", "-1").change();

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) dd = '0' + dd
        if (mm < 10) mm = '0' + mm
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById('fecha_venta').value = today;
    });

    function addProducto() {
        try {
            let id_articulo = document.getElementById('select_articulo').value;
            if (id_articulo == '') return;
            let articulo;
            fetch('<?php echo site_url('ventas/getArticulo/'); ?>' + id_articulo)
                .then(response => response.json())
                .then(data => {
                    articulo = data;
                    let html = `
                        <tr>
                            <td><input type='text' name='cantidades[]' value='1' class='cantidadesVenta' onkeypress='validate(event)'></td>
                            <td><input type='hidden' name='idarticulos[]' value='${articulo.id}'>${articulo.nombre_articulo}</td>
                            <td>${articulo.codigo_interno}</td>
                            <td>${articulo.stock}</td>
                            <td><input type='hidden' name='precios[]' value='${articulo.precio}'>${articulo.precio}</td>
                            <td><input readonly type='text'  class='iva' value='${calculateTaxAmount(1, articulo.iva, articulo.precio)}'><input type='hidden' class='taxRate'  value='${articulo.iva}'></td>
                            <td><input readonly type='text' name='importes[]' class='total' value='${articulo.precio}'=></td>
                            <td><button class="btn btn-danger" onclick="removeProducto(this)">x</button></td>
                        </tr>
                    `;
                    $("#dataTable tbody").append(html);
                    sumarVenta();
                });
        } catch (error) {
            console.error(error)
        }
    }

    function calculateTaxAmount(qty, taxRate, price) {
        let taxAmount, total;
        total = Number(price) * Number(qty)
        if (taxRate == 5) taxAmount = Number(total) / Number(21);
        else if (taxRate == 10) taxAmount = Number(total) / Number(11);
        else if (taxRate == 0) taxAmount = 0;
        return taxAmount.toFixed(0);
    }
    $(document).on("keyup mouseup", "#descuento", function() {
        sumarVenta();
    });
    $(document).on("keyup mouseup", "#dataTable input.cantidadesVenta", function() {
        cantidad = $(this).val();
        stock = Number($(this).closest("tr").find("td:eq(3)").text());
        precio = Number($(this).closest("tr").find("td:eq(4)").text());
        taxRate = Number($(this).closest("tr").find("td:eq(5)").find('.taxRate').val());

        if (cantidad != '') {
            if (cantidad == 0) {
                alert("El valor ingresada no puede ser menor a la unidad");
                $(this).val('1');
                importe = precio;
            } else if (cantidad > stock) {
                alert("El valor ingresado no puede sobrepasar el stock");
                $(this).val(stock);
                importe = precio * stock;
            } else {
                importe = Number(cantidad) * precio;
            }
        } else {
            importe = 0;
        }
        let taxAmount = calculateTaxAmount(cantidad, taxRate, precio);
        $(this).closest("tr").find("td:eq(6)").children("input").val(importe.toFixed(0));
        $(this).closest("tr").find("td:eq(5)").children("input.iva").val(taxAmount);
        sumarVenta();

    });

    function sumarVenta() {
        let subtotal = 0;
        let iva5 = 0;
        let iva10 = 0;
        $("#dataTable tbody tr").each(function() {
            subtotal = subtotal + Number($(this).children("td:eq(6)").find('input').val());
            if (Number($(this).children("td:eq(5)").find('input.taxRate').val()) == 5) {
                iva5 = iva5 + Number($(this).children("td:eq(5)").find('input.iva').val());
            } else if (Number($(this).children("td:eq(5)").find('input.taxRate').val()) == 10) {
                iva10 = iva10 + Number($(this).children("td:eq(5)").find('input.iva').val());
            }
        });

        $("input[name=subtotal]").val(subtotal.toFixed(0));
        $("input[name=iva_5]").val(iva5.toFixed(0));
        $("input[name=iva_10]").val(iva10.toFixed(0));

        let descuento = Number($("#descuento").val());
        if (descuento == '') descuento = 0;
        let total = subtotal - descuento;
        $("input[name=total]").val(total.toFixed(0));
    }

    function removeProducto(elemento) {
        $(elemento).closest('tr').remove();
        sumarVenta()
    }

    $(document).on("click", ".btn-check", function() {
        cliente = $(this).val();
        infocliente = cliente.split("*");
        $("#id_cliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]);
        $("#modal-default").modal("hide");
    });
    function validate(e) {
        let ev = e || window.event;
        let key = ev.keyCode || ev.which;
        key = String.fromCharCode( key );
        let regex = /[0-9]/;
        if( !regex.test(key) ) {
            ev.returnValue = false;
            if(ev.preventDefault) ev.preventDefault();
        }
    }
    function test(params) {
        var data = $('form').serializeArray();
        console.log(data);
    }

</script>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Lista de Clientes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($clientes)) : ?>
                            <?php foreach ($clientes as $cliente) : ?>
                                <tr>
                                    <td><?php echo $cliente['id']; ?></td>
                                    <td><?php echo $cliente['razon_social']; ?></td>
                                    <td><?php echo $cliente['numero_documento']; ?></td>
                                    <?php $datacliente = $cliente['id'] . "*" . $cliente['razon_social'] . "*" . $cliente['numero_documento']; ?>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-check" id="btn-check" value="<?php echo $datacliente; ?>"><span class="fa fa-check"></span></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- /.modal -->