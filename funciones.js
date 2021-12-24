


/*================================
    funcion de color Random
================================*/
    $(document).ready(function(){
        var color = "color-"+Math.floor(Math.random()*12 + 1);
        // color = "color-8";
        $(".color-random-bg-a").addClass(color+"-bg-a");
        $(".color-random-bg-b").addClass(color+"-bg-b");
        $(".color-random-bg-c").addClass(color+"-bg-c");

        $(".color-random-tx-a").addClass(color+"-tx-a");
        $(".color-random-tx-b").addClass(color+"-tx-b");
        $(".color-random-tx-c").addClass(color+"-tx-c");

        $(".color-random-tx-1").addClass(color+"-estrella");
        $(".color-random-tx-2").addClass(color+"-tx-2");
        $(".color-random-tx-3").addClass(color+"-tx-3");
        $(".color-random-tx-4").addClass(color+"-tx-4");
        // console.log(color);
    });






    /*==================================
    funcion para el tamaño de las letras
    ==================================*/

    // function tamano() {
    //     var p = document.getElementsByClassName("disparador");
    //
    //     for( var i=0 ; i<=p.length; i++ ){
    //         var cont = p[i].innerHTML.length;
    //
    //         if(cont <= 16){
    //             p[i].style.fontSize = "1.4em";
    //         }else if(cont <= 24){
    //             p[i].style.fontSize = "1.35em";
    //         }else if(cont <= 32){
    //             p[i].style.fontSize = "1.3em";
    //         }else if(cont <= 40){
    //             p[i].style.fontSize = "1.25em";
    //         }else if(cont <= 48){
    //             p[i].style.fontSize = "1.2em";
    //         }else if(cont <= 56){
    //             p[i].style.fontSize = "1.15em";
    //         }else if(cont <= 64){
    //             p[i].style.fontSize = "1.1em";
    //         }else if(cont <= 72){
    //             p[i].style.fontSize = "1.05em";
    //         }else if(cont <= 80){
    //             p[i].style.fontSize = "1em";
    //         }else if(cont <= 88){
    //             p[i].style.fontSize = "0.95em";
    //         }else{
    //             p[i].style.fontSize = "0.9em";
    //         }
    //     }
    // }
    //
    // tamano();


/*================================================
VALIDAAR LOGIN
================================================*/
function validarLogin(){

    var usuario = document.querySelector("#usuario").value;
    var password = document.querySelector("#password").value;

    //limpia los div de alerta
    document.querySelector(".alertaUsuario").innerHTML = '';
    document.querySelector(".alertaPassword").innerHTML = '';

    /*===================
    validar usuario
    ===================*/
    if(usuario != ""){

        if(usuario.length < 6 || usuario.length >30 ){
            document.querySelector(".alertaUsuario").innerHTML += '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion Js: el usuario debe tener entre 6 y 30 caracteres</p></div>';
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
            document.querySelector(".alertaPassword").innerHTML += '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion Js: las contraseñas de menos de 6 caracteres no son validas</p></div>';
            return false;
        }

        var expresionPassword = /^[a-zA-Z0-9]*$/;
        if( !expresionPassword.test(password) ){
            document.querySelector(".alertaPassword").innerHTML += '<div class="alertas w3-panel w3-pale-red w3-leftbar w3-border-red"><p>validacion Js: evite usar caracteres especiales</p></div>';
            return false;
        }

    }



}




























// fin
