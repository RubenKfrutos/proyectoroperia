   <h1 class="h3 mb-4 text-gray-800">Ver Articulo</h1>
   <br>

   <input type="hidden" name="id" value="<?php echo $articulo['id']; ?>">

   <div class="form-group">
     <label for="codigo_interno">Codigo Interno</label>
     <input class="form-control" type="text" name="codigo_interno" value="<?php echo $articulo['codigo_interno']; ?>" disabled>
   </div>

   <div class="form-group">
     <label for="codigo_barras">Codigo de Barras</label>
     <input class="form-control" type="text" name="codigo_barras" value="<?php echo $articulo['codigo_barras']; ?>" disabled>
   </div>

   <div class="form-group">
     <label for="nombre_articulo">Nombre del Articulo</label>
     <input class="form-control" type="text" name="nombre_articulo" value="<?php echo $articulo['nombre_articulo']; ?>" disabled>

   </div>

   <div class="form-group">
     <label for="descripcion">Descripcion</label>
     <input class="form-control" type="text" name="descripcion" value="<?php echo $articulo['descripcion']; ?>" disabled>

   </div>
   <div class="form-group">
       <label for="precio">Precio</label>
       <input class="form-control" type="number" name="precio" value="<?php echo $articulo['precio']; ?>"disabled >
   </div>

   <div class="form-group">
     <label for="iva">IVA</label>
     <select disabled class="form-control" name="iva">
     <option value="1"><?php echo $articulo['iva']; ?></option>
     </select>
   </div>

   <a href="<?php echo site_url('articulos/index/'); ?>" class="btn btn-success">
     <span class="text">Atrás</span>
   </a>



   </form>