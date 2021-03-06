<h1 class="h3 mb-4 text-gray-800"> Crear Atributo Detalle</h1>

<?php echo validation_errors(); ?>
<?php echo form_open('atributoDetalle/create'); ?>
<div class="form-group">
        <label for="id_atributo">Atributo</label>
        <select class="form-control" name="id_atributo" id="select_atributo">
            <?php foreach ($atributos as $atributo) : ?>
                <option value="<?php echo $atributo['id']; ?>"><?php echo $atributo['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

<div class="form-group">
  <label for="valor">Valor</label>
  <input class="form-control" type="text" name="valor">

</div>

<div class="form-group">
  <label for="estado">Estado</label>
  <input class="form-control" type="text" name="estado">
</div>



<input type="submit" name="submit" value="Guardar" class="btn btn-success" />

<a href="<?php echo site_url('atributoDetalle/index/'); ?>" class="btn btn-danger">
  <span class="text">Atrás</span>
</a>

</form>
<script>
    $(document).ready(function() {
    $('#select_atributo').select2().prop("selectedIndex","-1").change();
});
</script>