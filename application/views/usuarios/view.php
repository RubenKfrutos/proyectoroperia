   <h1 class="h3 mb-4 text-gray-800">Ver Usuario</h1>
   <br>
   <form action="">
     <div class="form-group">
       <label for="nombre">Nombre</label>
       <input class="form-control" type="text" name="nombre"disabled value="<?php echo $usuario['nombre']; ?>">
     </div>

     <div class="form-group col-6">
       <label for="numero_documento">Numero de Documento</label>
       <input class="form-control" type="text" name="numero_documento"disabled value="<?php echo $usuario['numero_documento']; ?>">
     </div>

     <div class="form-group">
       <label for="numero_contacto">Numero de Contacto</label>
       <input class="form-control" type="text" name="numero_contacto"disabled value="<?php echo $usuario['numero_contacto']; ?>">

     </div>

     <div class="form-group">
       <label for="email_contacto">Email de Contacto</label>
       <input class="form-control" type="email" name="email_contacto"disabled value="<?php echo $usuario['email_contacto']; ?>">

     </div>

     <div class="form-group">
       <label for="direccion">Direccion</label>
       <input class="form-control" type="text" name="direccion"disabled value="<?php echo $usuario['direccion']; ?>">

     </div>

     <div class="form-group">
       <label for="username">Usuario</label>
       <input class="form-control" type="text" name="username"disabled value="<?php echo $usuario['username']; ?>">

     </div>

     <div class="form-group">
       <label for="password">Contraseña</label>
       <input class="form-control" type="password" name="password"disabled value="<?php echo $usuario['password']; ?>">

     </div>


     <a href="../index/" class="btn btn-success">

       <span class="text">Atrás</span>
     </a>



   </form>