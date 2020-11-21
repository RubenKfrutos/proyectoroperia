   <h1 class="h3 mb-4 text-gray-800">Ver Atributo Detalle</h1>
   <br>
   <div class="form-group">
        <label for="id_atributo">Atributo</label>
        <select  class="form-control" name="id_atributo" id="select_atributo" disabled>
            <?php foreach ($atributos as $atributo) : ?>
                <option  <?php echo ($atributoDetalle['id_atributo'] == $atributo['id']) ? "selected" : ""; ?> value="<?php echo $atributo['id']; ?>"><?php echo $atributo['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

     <div class="form-group">
       <label for="valor">Valor</label>
       <input disabled class="form-control" type="text" name="valor" value="<?php echo $atributoDetalle['valor']; ?>">

     </div>

     <div class="form-group">
       <label for="estado">Estado</label>
       <input disabled class="form-control" type="text" name="estado" value="<?php echo $atributoDetalle['estado']; ?>">
     </div>
     <a href="../index/" class="btn btn-success">

       <span class="text">Atrás</span>
     </a>



   </form>