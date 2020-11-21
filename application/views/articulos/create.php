<h1 class="h3 mb-4 text-gray-800"> Crear Articulo</h1>

<?php echo validation_errors(); ?>
<?php echo form_open('articulos/create'); ?>
<div class="form-group">
  <label for="codigo_interno">Codigo Interno</label>
  <input class="form-control" type="text" name="codigo_interno">
</div>

<div class="form-group">
  <label for="codigo_barras">Codigo de Barras</label>
  <input class="form-control" type="text" name="codigo_barras">
</div>

<div class="form-group">
  <label for="nombre_articulo">Nombre del Articulo</label>
  <input class="form-control" type="text" name="nombre_articulo">

</div>

<div class="form-group">
  <label for="descripcion">Descripcion</label>
  <input class="form-control" type="text" name="descripcion">

</div>

<div class="form-group">
  <label for="precio">Precio</label>
  <input class="form-control" type="number" name="precio">
</div>

<div class="form-group">
  <label for="iva">IVA</label>
  <select class="form-control" name="iva">
    <option value="5">5%</option>
    <option value="10">10%</option>
  </select>
</div>

<input type="submit" name="submit" value="Guardar" class="btn btn-success" />

<a href="<?php echo site_url('articulos/index/'); ?>" class="btn btn-danger">

  <span class="text">Atrás</span>
</a>

</form>