   <h1 class="h3 mb-4 text-gray-800">Editar Articulo</h1>
   <br>
   <?php echo validation_errors(); ?>

   <?php echo form_open('articulos/update'); ?>
   <!-- <?php //echo form_open('clientes/edit'); 
        ?> -->

   <input type="hidden" name="id" value="<?php echo $articulo['id']; ?>">
   <div class="form-group">
       <label for="codigo_interno">Codigo Interno</label>
       <input class="form-control" type="text" name="codigo_interno" value="<?php echo $articulo['codigo_interno']; ?>">
   </div>

   <div class="form-group">
       <label for="codigo_barras">Codigo de Barras</label>
       <input class="form-control" type="text" name="codigo_barras" value="<?php echo $articulo['codigo_barras']; ?>">
   </div>

   <div class="form-group">
       <label for="nombre_articulo">Nombre del Articulo</label>
       <input class="form-control" type="text" name="nombre_articulo" value="<?php echo $articulo['nombre_articulo']; ?>">

   </div>

   <div class="form-group">
       <label for="descripcion">Descripcion</label>
       <input class="form-control" type="text" name="descripcion" value="<?php echo $articulo['descripcion']; ?>">

   </div>
   <div class="form-group">
       <label for="precio">Precio</label>
       <input class="form-control" type="number" name="precio" value="<?php echo $articulo['precio']; ?>">
   </div>

   <div class="form-group">
       <label for="iva">IVA</label>
       <select class="form-control" name="iva" value="<?php echo $articulo['iva']; ?>">
           <option value="5">5%</option>
           <option value="10">10%</option>
       </select>
   </div>


   <input type="submit" name="submit" value="Guardar" class="btn btn-success" />
   <a href="<?php echo site_url('articulos/index/'); ?>" class="btn btn-danger">
       <span class="text">Atrás</span>
   </a>

   </form>