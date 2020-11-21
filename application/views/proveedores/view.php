   

<h1 class="h3 mb-4 text-gray-800">Ver Proveedor</h1>
          <br>
          <form action="">
            <div class="form-group">
              <label for="razon_social">Razon Social</label>
              <input disabled class="form-control" type="text" name="razon_social" value="<?php echo $proveedor['razon_social']; ?>">
            </div>
            
            <div class="row col-12">
              <div class="form-group col-6">
                <label for="tipo_documento">Tipo de Documento</label>
                <select disabled class="form-control" name="tipo_documento" >
                  <option value="1"><?php echo $proveedor['tipo_documento']; ?></option>
              
  
                </select>
              </div>
  
              <div class="form-group col-6">
                <label for="numero_documento">Numero de Documento</label>
                <input disabled class="form-control" type="text" name="numero_documento" value="<?php echo $proveedor['numero_documento']; ?>">   
             
              </div>   
            </div>
            
            
            
            <div class="form-group">
              <label for="numero_contacto">Numero de Contacto</label>
              <input disabled class="form-control" type="text" name="numero_contacto" value="<?php echo $proveedor['numero_contacto']; ?>">   
           
            </div>   
            
            <div class="form-group">
              <label for="email_contacto">Email de Contacto</label>
              <input disabled class="form-control" type="email" name="email_contacto" value="<?php echo $proveedor['email_contacto']; ?>">
           
            </div>   
            
            <div class="form-group">
              <label for="direccion">Direccion</label>
              <input disabled class="form-control" type="text" name="direccion" value="<?php echo $proveedor['direccion']; ?>">
         
            </div>  
            <a href="../index/" class="btn btn-success">
                    
                    <span class="text">Atrás</span>
                  </a>
        
           
          
          </form>