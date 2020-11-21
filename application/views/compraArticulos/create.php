<h1 class="h3 mb-4 text-gray-800"> Registros de la compra de Articulos </h1>

<?php echo validation_errors(); ?>
<div class="form-group">
    <label hidden for="fecha_registro">Fecha</label>
    <input hidden class="form-control" type="date" name="fecha_registro">
</div>

<div class="row col-12">
    <div class="form-group col-6">
        <label for="id_proveedor">Proveedor</label>
        <select class="form-control" name="id_proveedor" id="select_proveedor">
            <?php foreach ($proveedores as $proveedor) : ?>
                <option value="<?php echo $proveedor['id']; ?>"><?php echo $proveedor['razon_social']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group col-6">
        <label for="fecha_registro">Fecha</label>
        <input disabled class="form-control" type="date" id="fecha_registro">
    </div>


</div>

<label for="articulos">Articulo</label>
<div class="form-group d-flex ">
    <select class="form-control" name="articulos" id="select_articulo">
        <?php foreach ($articulos as $articulo) : ?>
            <option value="<?php echo $articulo['id']; ?>"><?php echo $articulo['nombre_articulo']. ' - ' . $articulo['codigo_barras']; ?></option>
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
                <th>Opciones</th>



            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>

<input type="submit" name="submit" value="Guardar" class="btn btn-success" />

<a href="<?php echo site_url('compraArticulos/index/'); ?>" class="btn btn-danger">

    <span class="text">Atrás</span>
</a>
<script>
    $(document).ready(function() {
        var today = new Date();

        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) dd = '0' + dd

        if (mm < 10) mm = '0' + mm

        // today = yyyy + '/' + mm + '/' + dd;
        today = yyyy + '-' + mm + '-' + dd;

        console.log(today);
        document.getElementById('fecha_registro').value = today;
    });
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
        
    }
    $(document).on('click', '.borrar', function(event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    });
</script>