<h1 class="h3 mb-4 text-gray-800"> Control de Creditos </h1>

<?php echo validation_errors(); ?>
<?php echo form_open('controlCreditos/create'); ?>
<div class="form-group">
    <label for="id_cliente">Cliente</label>
    <select class="form-control" name="id_cliente" id="select_cliente">
        <?php foreach ($clientes as $cliente) : ?>
            <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['razon_social']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="id_venta">Venta</label>
    <select class="form-control" name="id_venta" id="select_venta">
        <?php foreach ($ventas as $venta) : ?>
            <option value="<?php echo $venta['id']; ?>"><?php echo $venta['id_venta']; ?></option>
        <?php endforeach; ?>
    </select>
</div>



<div class="form-group">
    <label for="monto_total">Monto Total</label>
    <input class="form-control" type="text" name="monto_total">

</div>

<div class="form-group">
    <label for="entrega">Entrega</label>
    <input class="form-control" type="" name="entrega">

</div>

<div class="form-group">
    <label for="saldo">Saldo</label>
    <input disabled class="form-control" type="text" name="saldo">

</div>

<input type="submit" name="submit" value="Guardar" class="btn btn-success" />

<a href="<?php echo site_url('controlCreditos/index/'); ?>" class="btn btn-danger">

    <span class="text">Atrás</span>
</a>

</form>

<script>
    $(document).ready(function() {
        $('#select_cliente').select2().prop("selectedIndex","-1").change();
        $('#select_venta').select2().prop("selectedIndex","-1").change();
        let selectCliente = document.getElementById('select_cliente');
        selectCliente.setAttribute("onchange", "loadSubjectSales()");
    });
    function loadSubjectSales() {
        let clienteId = document.getElementById('select_cliente').value;
        let ventas;
            fetch('<?php echo site_url('ventas/getVentas/'); ?>' + clienteId)
                .then(response => response.json())
                .then(data => {
                    ventas = data;
                    let select = document.getElementById('select_venta');
                    select.options.length = 0;
                    for(index in ventas) {
                        select.options[select.options.length] = new Option(`${ventas[index].id} - ${ventas[index].fecha_venta} - ${ventas[index].total}`, ventas[index].id);
                    }
                });
    }
</script>