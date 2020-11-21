   <h1 class="h3 mb-4 text-gray-800">Editar Usuario</h1>
   <br>
   <?php echo validation_errors(); ?>

   <?php echo form_open('usuarios/update'); ?>
   <!-- <?php //echo form_open('proveedores/edit'); 
        ?> -->

   <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
   <div class="form-group">
     <label for="nombre">Nombre</label>
     <input class="form-control" type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>">
   </div>

   <div class="form-group col-6">
     <label for="numero_documento">Numero de Documento</label>
     <input class="form-control" type="text" name="numero_documento" value="<?php echo $usuario['numero_documento']; ?>">
   </div>

   <div class="form-group">
     <label for="numero_contacto">Numero de Contacto</label>
     <input class="form-control" type="text" name="numero_contacto" value="<?php echo $usuario['numero_contacto']; ?>">
   </div>

   <div class="form-group">
     <label for="email_contacto">Email de Contacto</label>
     <input class="form-control" type="email" name="email_contacto" value="<?php echo $usuario['email_contacto']; ?>">
   </div>

   <div class="form-group">
     <label for="direccion">Direccion</label>
     <input class="form-control" type="text" name="direccion" value="<?php echo $usuario['direccion']; ?>">
   </div>

   <div class="form-group">
     <label for="username">Usuario</label>
     <input class="form-control" type="text" name="username" value="<?php echo $usuario['username']; ?>">
   </div>

   <div class="form-group">
     <label for="password">Contraseña</label>
     <input class="form-control" type="password" name="password" value="<?php echo $usuario['password']; ?>">
   </div>

   


   <input type="submit" name="submit" value="Guardar" class="btn btn-success" />
   <a href="../index/" class="btn btn-danger">
     <span class="text">Atrás</span>
   </a>
   </form>