<!DOCTYPE html>  
 <html>  
 <head>  
      <title>Login | <?php echo $title; ?></title>  
      <!-- Bootstrap CSS-->
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->

      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->
      <style>
@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.login-block{
    background: #66BB6A;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #80CBC4, #66BB6A);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #80CBC4, #66BB6A); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
float:left;
width:100%;
height:100vh;
padding : 50px 0;
}
.banner-sec{background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
.container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #66BB6A;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#66BB6A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #66BB6A; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}
      </style>
 </head>  
 <body>  
      <!--<div class="container">  -->
           <!--<br /><br /><br />  
           <form method="post" action="http://localhost/crecerem/index.php/main/login_validation">  
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
                      
                </div>  
           </form>  -->
           <section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Iniciar sesión</h2>
		    <form class="login-form" action="http://localhost/crecerem/index.php/main/login_validation" method="POST">
                  <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Usuario</label>
                        <input autofocus type="text" name="username" class="form-control" placeholder="Introduce tu nombre de usuario" />  
                        <span class="text-danger"><?php echo form_error('username');?></span>                 
                  </div>
                  <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="**********" />  
                        <span class="text-danger"><?php echo form_error('password'); ?></span>  
                  </div>
                  <button type="submit" class="btn btn-login float-right">Entrar</button>
                  <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';?>
                </form>     
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>	
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>	
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>	
    </div>
  </div>
                        </div>	       
		      </div>
	      </div>
      </div>
</section>
      <!--</div>  -->

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
                                          <select name="rRol" id="rRol"></select>
                                          <span class="text-danger"></span>                 
                                    </div>
                                    <div class="form-group">  
                                          <label>Sede</label>  
                                          <select name="rSede" id="rSede"></select>
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




      <!-- Bootstrap JS-->
      <script src="../../assets/vendor/bootstrap-4.1/popper.min.js"></script>
      <script src="../../assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
      <script>
      $(document).ready(function() {
            $("#openRegisterModal").on("click", function() {
                  $("#largeModal").modal();
            });
            //Se pobla el select de roles
            getRoles();
            //Se pobla el select de sedes
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
                              url: "http://localhost/crecerem/index.php/registernewusers/registrar",
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

            //OBTENER LOS ROLES PARA MOSTRARLOS EN EL SELECT
            function getRoles() {
                  var rol = document.getElementById("rRol");
                  var innerRol = undefined;
                  var sucRequest = $.ajax({
                        url: "http://localhost/crecerem/index.php/getdata/roles",
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
                  });
            }

            //OBTENER LAS SEDES PARA MOSTRARLAS EN EL SELECT
            function getSedes() {
                  var sede = document.getElementById("rSede");
                  let innerSede = undefined;
                  var sucRequest = $.ajax({
                        url: "http://localhost/crecerem/index.php/calendario/sucursales",
                        type: "GET",
                        dataType: "json"
                  });

                  sucRequest.done(function(sedes) {
                        sedes.forEach(function(s) {
                              if(s.desactivar == 0) {
                                    innerSede += `<option value="${s.id}">${s.nombre}</option>`;
                              }
                        });
                        sede.innerHTML = innerSede;
                  }).then(function() {
                        
                  });

                  sucRequest.fail(function(jqXHR, textStatus) {
                        console.log(textStatus);
                  });
            }

});
      </script>


 </body>  
 </html>  