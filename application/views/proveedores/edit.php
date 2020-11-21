   

<h1 class="h3 mb-4 text-gray-800">Editar Proveedor</h1>
          <br>
          <?php echo validation_errors(); ?>

          <?php echo form_open('proveedores/update'); ?>
          <!-- <?php //echo form_open('proveedores/edit'); ?> -->

            <input type="hidden" name="id" value="<?php echo $proveedor['id']; ?>">
            <div class="form-group">
              <label for="razon_social">Razon Social</label>
              <input  class="form-control" type="text" name="razon_social" value="<?php echo $proveedor['razon_social']; ?>">
            </div>
            
            <div class="row col-12">
              <div class="form-group col-6">
                <label for="tipo_documento">Tipo de Documento</label>
                <select  class="form-control" name="tipo_documento" >
                  <option <?php echo ($proveedor['tipo_documento'] == "CI") ? "selected" : ""; ?> value="CI">CI</option>
                  <option <?php echo ($proveedor['tipo_documento'] == "RUC") ? "selected" : ""; ?> value="RUC">RUC</option>
                </select>
              </div>
  
              <div class="form-group col-6">
                <label for="numero_documento">Numero de Documento</label>
                <input  class="form-control" type="text" name="numero_documento" value="<?php echo $proveedor['numero_documento']; ?>">   
             
              </div>   
            </div>
            
            
            
            <div class="form-group">
              <label for="numero_contacto">Numero de Contacto</label>
              <input  class="form-control" type="text" name="numero_contacto" value="<?php echo $proveedor['numero_contacto']; ?>">   
           
            </div>   
            
            <div class="form-group">
              <label for="email_contacto">Email de Contacto</label>
              <input  class="form-control" type="email" name="email_contacto" value="<?php echo $proveedor['email_contacto']; ?>">
           
            </div>   
            
            <div class="form-group">
              <label for="direccion">Direccion</label>
              <input  class="form-control" type="text" name="direccion" value="<?php echo $proveedor['direccion']; ?>">
         
            </div>  

        
           
            <input type="submit" name="submit" value="Guardar" class="btn btn-success" />
            <a href="../index/" class="btn btn-danger">
              <span class="text">Atrás</span>
            </a>
          </form>