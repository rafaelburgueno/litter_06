/*============================
funciones AJAX
============================*/



/*=====================================================================================
funcion para revisar si el usuario que se intenta registrar ya esta en la base de datos
=====================================================================================*/
$("#usuario").change(function(){

    //limpia el area de alertas para poder agregar alertas nuevas si algun dato esta mal
    $(".alertas").remove();
    $(".alerta").html('');

    var revisarRegistroUsuario = $(this).val();
    // console.log("el usuario es: " + revisarRegistroUsuario);


    var datos = new FormData();

	datos.append("revisarRegistroUsuario", revisarRegistroUsuario);
    // console.log("estoy en la funcion registro.js");
	$.ajax({
		url:"ajaxRegistro.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
            // console.log("estoy enel success");
            // console.log(respuesta);

            $(".alertaUsuario").html(respuesta);

		}

	});

});



/*=====================================================
funcion de validacion onsubmit
=====================================================*/

function validarRegistro(){



    var usuario = document.querySelector("#usuario").value;
    var password = document.querySelector("#password").value;
    var password2 = document.querySelector("#password2").value;
    var email = document.querySelector("#email").value;
    var terminos = document.querySelector("#terminos").checked;

    //limpia los div de alerta
    document.querySelector(".alertaUsuario").innerHTML = '';
    document.querySelector(".alertaPassword").innerHTML = '';
    document.querySelector(".alertaEmail").innerHTML = '';
    document.querySelector(".alertaTerminos").innerHTML = '';

    // console.log(usuario);
    // console.log(password);
    // console.log(password2);
    // console.log(email);
    // console.log(terminos);

    /*===================
    validar usuario
    ===================*/
    if(usuario != ""){

        if(usuario.length < 6 || usuario.length >30 ){
            document.querySelector(".alertaUsuario").innerHTML += '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion Js: debes usar entre 6 y 30 caracteres</p></div>';
            return false;
        }
        var expresionUsuario = /^[a-zA-Z0-9]*$/;
        if( !expresionUsuario.test(usuario) ){
            document.querySelector(".alertaUsuario").innerHTML += '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion Js: solo puedes usar letras y numeros</p></div>';
            return false;
        }

    }


    /*===================
    validar contraseña
    ===================*/
    if(password != ""){

        if(password.length < 6 ){
            document.querySelector(".alertaPassword").innerHTML += '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion Js: debes usar mas de 6 caracteres</p></div>';
            return false;
        }
        if(password != password2 ){
            document.querySelector(".alertaPassword").innerHTML += '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion Js: las contraseñas no coinciden</p></div>';
            return false;
        }

        var expresionPassword = /^[a-zA-Z0-9]*$/;
        if( !expresionPassword.test(password) ){
            document.querySelector(".alertaPassword").innerHTML += '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion Js: no escriba caracteres especiales</p></div>';
            return false;
        }

    }

    /*===================
    validar email
    ===================*/
    if(email != ""){

        var expresionEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if( !expresionEmail.test(email) ){
            document.querySelector(".alertaEmail").innerHTML += '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion Js: escriba un email valido</p></div>';
            return false;
        }

    }

    /*===================
    validar terminos
    ===================*/
    if(!terminos){

        document.querySelector(".alertaTerminos").innerHTML += '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion Js: debe aceptar los terminos y condiciones para registrarse</p></div>';
        return false;

    }


    return true;

}
/*fin validacion onsubmit*/
