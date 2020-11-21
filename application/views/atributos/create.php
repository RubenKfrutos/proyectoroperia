
<h1 class="h3 mb-4 text-gray-800"> Crear Atributo</h1>
         
          <?php echo validation_errors(); ?>
          <?php echo form_open('atributos/create'); ?>
            <div class="form-group">
            <label for="codigo">Código</label>
              <input class="form-control" type="text" name="codigo">   
            </div>   

            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input class="form-control" type="text" name="nombre">   
           
            </div>   
            
            <div class="form-group">
              <label for="descripcion">Descripcion</label>
              <input class="form-control" type="text" name="descripcion">   
           
            </div>   

            <div class="form-group">
              <label for="estado">Estado</label>
              <input class="form-control" type="text" name="estado">   
            </div>   
            
            

            <input type="submit" name="submit" value="Guardar" class="btn btn-success" />
           
            <a href="<?php echo site_url('atributos/index/'); ?>" class="btn btn-danger">
                    
                    <span class="text">Atrás</span>
                  </a>

          </form>
          