   

<h1 class="h3 mb-4 text-gray-800">Editar Atributo</h1>
          <br>
          <?php echo validation_errors(); ?>

          <?php echo form_open('atributos/update'); ?>
          <!-- <?php //echo form_open('clientes/edit'); ?> -->

            <input type="hidden" name="id" value="<?php echo $atributo['id']; ?>">
            <div class="form-group">
            <label for="codigo">Código</label>
              <input class="form-control" type="text" name="codigo" value="<?php echo $atributo['codigo']; ?>">   
            </div>   

            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input class="form-control" type="text" name="nombre" value="<?php echo $atributo['nombre']; ?>">   
           
            </div>   
            
            <div class="form-group">
              <label for="descripcion">Descripcion</label>
              <input class="form-control" type="text" name="descripcion" value="<?php echo $atributo['descripcion']; ?>">   
           
            </div>   

            <div class="form-group">
              <label for="estado">Estado</label>
              <input class="form-control" type="text" name="estado" value="<?php echo $atributo['estado']; ?>">   
            </div>   

        
           
            <input type="submit" name="submit" value="Guardar" class="btn btn-success" />

            <a href="../index/" class="btn btn-danger">
                    
                    <span class="text">Atrás</span>
                  </a>
          
          </form>