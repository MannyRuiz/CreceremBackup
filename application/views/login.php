<!DOCTYPE html>  
 <html>  
 <head>  
      <title>Login | <?php echo $title; ?></title>  
      <!-- Bootstrap CSS-->
    <link href="../../assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
      <script src="../../assets/vendor/jquery-3.2.1.min.js"></script>
      <style>

      </style>
 </head>  
 <body>  
      <div class="container">  
           <br /><br /><br />  
           <form method="post" action="http://localhost/original/index.php/main/login_validation">  
                <div class="form-group">  
                     <label>Introduce usuario</label>  
                     <input type="text" name="username" class="form-control" />  
                     <span class="text-danger"><?php echo form_error('username');?></span>                 
                </div>  
                <div class="form-group">  
                     <label>Introduce contraseña</label>  
                     <input type="password" name="password" class="form-control" />  
                     <span class="text-danger"><?php echo form_error('password'); ?></span>  
                </div>  
                <div class="form-group">  
                     <input type="submit" name="insert" value="Iniciar sesión" class="btn btn-info" />
                     <a href="#" id="openRegisterModal">Registrate</a>
                     <?php  
                          echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';  
                     ?>  
                </div>  
           </form>  
      </div>  

      <!-- large modal -->
      <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Formulario de registro</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                              <h4>Datos de usuario</h4>
                              <br> 
                              <form id="myform" method="post" action="http://localhost/original/index.php/registernewusers/registrar">  
                                    <div class="form-group">  
                                          <label>Nombre completo</label>  
                                          <input type="text" name="rName" class="form-control" required />  
                                          <span class="text-danger"></span>                 
                                    </div>
                                    <div class="form-group">  
                                          <label>Nombre de usuario</label>  
                                          <input type="text" name="rUsername" id="rUsername" class="form-control" required />  
                                          <span class="text-danger"></span>                 
                                    </div>
                                    <div class="form-group">  
                                          <label>Correo electrónico</label>  
                                          <input type="email" name="rEmail" class="form-control" required />  
                                          <span class="text-danger"></span>                 
                                    </div>
                                    <div class="form-group">  
                                          <label>Rol</label>  
                                          <select name="rRol" id="rRol">
                                                <!--<option value="1">SuperAdministrador</option>
                                                <option value="2">Administrador</option>
                                                <option value="3">Contador</option>
                                                <option value="4">Contralor</option>
                                                <option value="5">Staff Capitán</option>
                                                <option value="6">Staff</option>
                                                <option value="7">Coordinador</option>-->
                                          </select>
                                          <span class="text-danger"></span>                 
                                    </div>  
                                    <div class="form-group">  
                                          <label>Introduce contraseña</label>  
                                          <input type="password" name="rPassword" id="rPassword" class="form-control" required />  
                                          <span class="text-danger"></span>  
                                    </div>
                                    <div class="form-group">  
                                          <label>Confirma contraseña</label>  
                                          <input type="password" name="rPasswordConfirmation" id="rPasswordConfirmation" class="form-control" required />  
                                          <span class="text-danger" id="missmatchPassword"></span>  
                                    </div>
                                    <div class="form-group">  
                                          <input type="submit" name="insert" value="Login" class="btn btn-info" />
                                    </div>  
                              </form> 
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                        </div>
                  </div>
            </div>
      </div>

      <!-- basic modal -->
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Usuario registrado, ya puedes iniciar sesión</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


      <!-- Bootstrap JS-->
      <script src="../../assets/vendor/bootstrap-4.1/popper.min.js"></script>
      <script src="../../assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
      <script>
      $(document).ready(function() {
            $("#openRegisterModal").on("click", function() {
                  $("#largeModal").modal();
            });
            getSedes();
            
            //REGISTRO DE NUEVO USUARIO
            $("#myform").on("submit", function(e) {
                  e.preventDefault();
                  var seri = $(this).serialize();
                  var missmatchmessage = document.getElementById("missmatchPassword");
                  var pass = document.getElementById("rPassword").value;
                  var username = document.getElementById("rUsername").value;
                  var passConfirmation = document.getElementById("rPasswordConfirmation").value;

                  if(passConfirmation === pass) {
                        var request = $.ajax({
                              url: "http://localhost/original/index.php/registernewusers/registrar",
                              data: seri,
                              type: "POST",
                              contentType: "application/json; charset=utf-8",
                              dataType: "text"
                        });
                        var form = document.getElementById("myform");
                        form.reset();
                        $("#largeModal").modal('hide');
                        $("#basicModal").modal();
                  }
                  else {
                        missmatchmessage.innerText = "Las contraseñas no coinciden, ingresárlas de nuevo."
                  }    
            });

            //OBTENER LAS SEDES PARA MOSTRARLAS EN EL SELECT
            function getSedes() {
            var rol = document.getElementById("rRol");
            var innerRol = undefined;
            var sucRequest = $.ajax({
                  url: "http://localhost/original/index.php/getdata/roles",
                  type: "GET",
                  dataType: "json"
            });

            sucRequest.done(function(roles) {
                  roles.forEach(function(r) {
                        innerRol += `<option value="${r.id}">${r.tipo_de_rol}</option>`;
                  });
                  rol.innerHTML = innerRol;
            }).then(function() {
                  
            });

            sucRequest.fail(function(jqXHR, textStatus) {
                  console.log(textStatus);
            })
            }

});
      </script>


 </body>  
 </html>  