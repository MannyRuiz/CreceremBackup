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