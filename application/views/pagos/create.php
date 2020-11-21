<h1 class="h3 mb-4 text-gray-800"> Crear Pago</h1>

<?php echo validation_errors(); ?>
<?php echo form_open('pagos/create'); ?>
<div class="form-group">
    <label for="id_cliente">Cliente</label>
    <select class="form-control" name="id_cliente" id="select_cliente">
        <?php foreach ($clientes as $cliente) : ?>
            <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['razon_social']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="id_control_credito">Credito</label>
    <select class="form-control" name="id_control_credito" id="select_control_credito">
        <?php foreach ($control_creditos as $control_credito) : ?>
            <option value="<?php echo $control_credito['id']; ?>"><?php echo $control_credito['id_venta']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="monto">Pago</label>
    <input class="form-control" type="" name="monto">
</div>










<input type="submit" name="submit" value="Guardar" class="btn btn-success" />

<a href="<?php echo site_url('pagos/index/'); ?>" class="btn btn-danger">

    <span class="text">Atrás</span>
</a>

</form>