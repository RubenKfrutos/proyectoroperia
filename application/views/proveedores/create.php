
<h1 class="h3 mb-4 text-gray-800"> Crear Proveedor</h1>
         
          <?php echo validation_errors(); ?>
          <?php echo form_open('proveedores/create'); ?>
            <div class="form-group">
              <label for="razon_social">Razon Social</label>
              <input class="form-control" type="text" name="razon_social">
            </div>

            <div class="row col-12">
              <div class="form-group col-6">
                <label for="tipo_documento">Tipo de Documento</label>
                <select class="form-control" name="tipo_documento">
                  <option value="CI">CI</option>
                  <option value="RUC">RUC</option>
  
                </select>
              </div>
  
              <div class="form-group col-6">
                <label for="numero_documento">Numero de Documento</label>
                <input class="form-control" type="text" name="numero_documento">
  
              </div>
  
  
            </div>

            <div class="form-group">
              <label for="numero_contacto">Numero de Contacto</label>
              <input class="form-control" type="text" name="numero_contacto">

            </div>

            <div class="form-group">
              <label for="email_contacto">Email de Contacto</label>
              <input class="form-control" type="email" name="email_contacto">

            </div>

            <div class="form-group">
              <label for="direccion">Direccion</label>
              <input class="form-control" type="text" name="direccion">

            </div>

            <input type="submit" name="submit" value="Guardar" class="btn btn-success" />
           
            <a href="<?php echo site_url('proveedores/index/'); ?>" class="btn btn-danger">
                    
                    <span class="text">Atrás</span>
                  </a>

          </form>
          