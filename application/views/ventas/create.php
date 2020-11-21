<h1 class="h3 mb-4 text-gray-800">Ventas</h1>
<?php echo validation_errors(); ?>
<?php echo form_open('ventas/create'); ?>
<div class="row col-12">
    <div class="form-group col-6">
        <label for="fecha_venta">Fecha</label>
        <input disabled class="form-control" type="date" name="fecha_venta" id="fecha_venta">
    </div>

    <!-- <div class="form-group col-6">
            <label for="numero_comprobante">Numero Comprobante</label>
            <input disabled class="form-control" type="text" name="numero_comprobante">
        </div> -->
</div>

<!-- <div class="form-group">
    <label for="id_cliente">Cliente</label>
    <select class="form-control" name="id_cliente" id="select_cliente">
        <?php //foreach ($clientes as $cliente) : 
        ?>
            <option value="<?php// echo $cliente['id']; ?>"><?php// echo $cliente['razon_social']; ?></option>
        <?php //endforeach; 
        ?>
    </select>
</div> -->
<div class="form-group">
    <label for="id_cliente">Cliente:</label>
    <div class="input-group">
        <input type="hidden" name="id_cliente" id="id_cliente">
        <input type="text" class="form-control" disabled="disabled" id="cliente">
        <span class="input-group-btn">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
        </span>
    </div><!-- /input-group -->
</div>

<!-- <div class="form-group ">
        <input type="hidden" name="id_cliente">
        <label for="id_cliente">Cliente</label>
        <div class="d-flex">

            <input class="form-control" type="text" name="cliente">
            <button type="button" class="btn btn-primary">Buscar</button>
        </div>
    </div> -->

<label for="articulos">Articulo</label>
<div class="form-group d-flex ">
    <select class="form-control" name="articulos" id="select_articulo">
        <?php foreach ($articulos as $articulo) : ?>
            <option value="<?php echo $articulo['id']; ?>"><?php echo $articulo['nombre_articulo'] . ' - ' . $articulo['codigo_barras']; ?></option>
        <?php endforeach; ?>
    </select>
    <button class="btn btn-success" onclick="addProducto()">Agregar</button>
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
        <tbody>

        </tbody>
    </table>

</div>

<div class="row col-12">
    <div class="form-group col-3">
        <label for="iva_5">IVA 5%</label>
        <input disabled class="form-control" type="text" name="iva_5">
    </div>

    <div class="form-group col-3">
        <label for="iva_10">IVA 10%</label>
        <input disabled class="form-control" type="text" name="iva_10">
    </div>



    <div class="form-group col-3">
        <label for="subtotal">Subtotal</label>
        <input disabled class="form-control" type="text" name="subtotal">
    </div>

    <div class="form-group col-3">
        <label for="descuento">Descuento</label>
        <input disabled class="form-control" type="text" name="descuento">
    </div>
</div>

<div class="form-group col-6">
    <label for="total">Total</label>
    <input disabled class="form-control" type="text" name="total">
</div>

<input type="submit" name="submit" value="Guardar" class="btn btn-success" />

<a href="<?php echo site_url('ventas/index/'); ?>" class="btn btn-danger">

    <span class="text">Atrás</span>
</a>
<!-- </form> -->


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

        // today = yyyy + '/' + mm + '/' + dd;
        today = yyyy + '-' + mm + '-' + dd;

        console.log(today);
        document.getElementById('fecha_venta').value = today;
    });

    function prueba() {
        fetch('<?php echo site_url('ventas/prueba/'); ?>')
            .then(response => response.json())
            .then(data => console.log(data));

    }

    async function addProducto() {
        try {
            let id_articulo = document.getElementById('select_articulo').value;
            let articulo;

            fetch('<?php echo site_url('ventas/getArticulo/'); ?>' + id_articulo)
                .then(response => response.json())
                .then(data => {
                    articulo = data;
                    console.log(articulo);
                    let html = "<tr>";
                    html += "<td><input type='text' name='cantidades[]' value='1' class='cantidades'></td>";
                    html += "<td>" + articulo.nombre_articulo + "</td>";
                    html += "<td>" + articulo.codigo_interno + "</td>";
                    html += "<td>" + articulo.stock + "</td>";
                    html += "<td>" + articulo.precio + "</td>";
                    html += "<td><input disabled type='text' name='cantidades[]' value='1' class='cantidades'></td>";
                    html += "<td><input disabled type='text' name='cantidades[]' value='1' class='cantidades'></td>";
                    html += "<td><button class\"btn btn-success\" onclick=\"removeProducto(this)\">X</button></td>";

                    html += "</tr>";

                    $("#dataTable tbody").append(html);
                });
        } catch (error) {
            console.error(error)
        }
    }

    function removeProducto(elemento) {
        $(elemento).closest('tr').remove();
        sumar();


    }
    $(document).on('click', '.borrar', function(event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    });

    $(document).on("click", ".btn-check", function() {
        cliente = $(this).val();
        //alert("holaX1");
        infocliente = cliente.split("*");
        $("#id_cliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]);
        $("#modal-default").modal("hide");
    });
    $(document).ready(function() {
        $("form").submit(function(e) {
            var condicion = $("#rgpd").is(":checked");
            if (!condicion) {
                e.preventDefault();
            } else {
                $("[name='enviar']").click(function() {
                    $(this).attr("disabled", "disabled");
                });
            };
        });
        $("input").blur(function() {
            $("[name='enviar']").removeAttr("disabled");
        })

    });
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