<?php session_start();
if( !isset($_SESSION['usuario']) ){
    header('Location:login.php');
}

require_once "controlador.php";

/*FUNCION PARA EL BOTON DE CERRAR SESION*/
if(isset($_GET['cerrar_sesion'])){
    Controlador::cerrarSesionCtr();
}/*FUNCION PARA EL BOTON DE CERRAR SESION*/




 ?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>litter - configuracion</title>
    <!-- jQuery-3.3.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--cdn w3 school-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="colores.css">

    <style>



    </style>

</head>
<body class="color-random-bg-c">

    <div class="w3-top">
        <header class="color-random-bg-b">
        <nav class="w3-xlarge w3-row">

            <!-- <a href="#" class="w3-bar-item">litter_05</a> -->
            <div class="w3-col s2 w3-center color-random-bg-c">
                <a href="inicio.html" class="" title="inicio"><i class="fa fa-home"></i></a>
            </div>
            <div class="w3-col s2 w3-center w3-hover-opacity">
                <a href="usuario.html" class="" title="usuario"><i class="fa fa-user-circle"></i></a>
            </div>
            <div class="w3-col s2 w3-center w3-hover-opacity">
                <a href="crear.html" class="" title="crear"><i class="fa fa-pencil"></i></a>
            </div>
            <div class="w3-col s2 w3-center w3-hover-opacity">
                <a href="busqueda.html" class="" title="busqueda"><i class="fa fa-search"></i></a>
            </div>
            <div class="w3-col s2 w3-center w3-hover-opacity">
                <a href="configuracion.html" class="" title="configuracion"><i class="fa fa-cog"></i></a>
            </div>
            <div class="w3-col s2 w3-center w3-hover-opacity">
                <a href="?cerrar_sesion=true" class="" title="cerrar sesion"><i class="fa fa-sign-out"></i></a>
            </div>
        </nav>
    </header>
    </div>

<div class="separador"></div>


        <section class="">
            <?php

                echo '<div class="alertas w3-panel w3-pale-green w3-leftbar w3-border-green"><p>bienvenido '.$_SESSION['usuario'].'</p></div>';

             ?>


            <div class="w3-row-padding">


                <div class="w3-col s6 m4">

                    <div class="w3-card-4 caja libro color-3-bg-disparador">
                        <i class="marcador fa fa-bookmark color-3-marcador"></i>
                        <i class="estrella fa fa-star-o color-3-estrella"></i>
                        <div class="linea_vertical color-3-linea-vertical"></div>
                        <p class="disparador titulo color-3-tx-disparador">
                            COLOR 3: Abore et dolore magna aliqua.
                        </p>
                    </div>

                    <div class="w3-card-4 caja hoja color-2-bg-disparador">
                        <i class="marcador fa fa-bookmark color-2-marcador"></i>
                        <i class="estrella fa fa-star-o color-2-estrella"></i>
                        <div class="linea_punteada color-2-linea-punteada"></div>
                        <div class="punto punto1 color-2-punto"></div>
                        <div class="punto punto2 color-2-punto"></div>
                        <p class="disparador color-2-tx-disparador">
                            COLOR 2: Quip ex ea commodo conset...
                            <i class="lapiz fa fa-pencil color-2-tx-disparador"></i>
                        </p>
                    </div>

                    <div class="w3-card-4 caja hoja color-6-bg-disparador">
                        <i class="marcador fa fa-bookmark color-6-marcador"></i>
                        <i class="estrella fa fa-star-o color-6-estrella"></i>
                        <div class="linea_punteada color-6-linea-punteada"></div>
                        <div class="punto punto1 color-6-punto"></div>
                        <div class="punto punto2 color-6-punto"></div>
                        <p class="disparador color-6-tx-disparador">
                            COLOR 6: Quip ex ea commodo conset...
                            <i class="lapiz fa fa-pencil color-6-tx-disparador"></i>
                        </p>
                    </div>





                    <div class="w3-card-4 caja libro color-5-bg-disparador">
                        <i class="marcador fa fa-bookmark color-5-marcador"></i>
                        <i class="estrella fa fa-star-o color-5-estrella"></i>
                        <div class="linea_vertical color-5-linea-vertical"></div>
                        <p class="disparador titulo color-5-tx-disparador">
                            COLOR 5: Abore et dolore magna aliqua.
                        </p>
                    </div>



                </div><!-- FIN DE LA PRIMER COLUMNA -->


            <!-- SEGUNDA COLUMNA -->
                <div class="w3-col s6 m4">

                    <div class="w3-card-4 caja hoja color-8-bg-disparador">
                        <i class="marcador fa fa-bookmark color-8-marcador"></i>
                        <i class="estrella fa fa-star-o color-8-estrella"></i>
                        <div class="linea_punteada color-8-linea-punteada"></div>
                        <div class="punto punto1 color-8-punto"></div>
                        <div class="punto punto2 color-8-punto"></div>
                        <p class="disparador color-8-tx-disparador">
                            COLOR 8: Quip ex ea commodo conset...
                            <i class="lapiz fa fa-pencil color-8-tx-disparador"></i>
                        </p>
                    </div>





                    <div class="w3-card-4 caja libro color-10-bg-disparador">
                        <i class="marcador fa fa-bookmark color-10-marcador"></i>
                        <i class="estrella fa fa-star-o color-10-estrella"></i>
                        <div class="linea_vertical color-10-linea-vertical"></div>
                        <p class="disparador titulo color-10-tx-disparador">
                            COLOR 10: Abore et dolore magna aliqua.
                        </p>
                    </div>



                    <div class="w3-card-4 caja hoja color-11-bg-disparador">
                        <i class="marcador fa fa-bookmark color-11-marcador"></i>
                        <i class="estrella fa fa-star-o color-11-estrella"></i>
                        <div class="linea_punteada color-11-linea-punteada"></div>
                        <div class="punto punto1 color-11-punto"></div>
                        <div class="punto punto2 color-11-punto"></div>
                        <p class="disparador color-11-tx-disparador">
                            COLOR 11: Quip ex ea commodo conset et dolore magna aliqua...
                            <i class="lapiz fa fa-pencil color-11-tx-disparador"></i>
                        </p>
                    </div>

                    <div class="w3-card-4 caja libro color-12-bg-disparador">
                        <i class="marcador fa fa-bookmark color-12-marcador"></i>
                        <i class="estrella fa fa-star-o color-12-estrella"></i>
                        <div class="linea_vertical color-12-linea-vertical"></div>
                        <p class="disparador titulo color-12-tx-disparador">
                            COLOR 12: Abore et dolore magna aliqua.
                        </p>
                    </div>



                </div><!-- FIN SEGUNDA COLUMNA -->


            <!-- TERCER COLUMNA -->
                <div class="w3-col s6 m4">

                    <div class="w3-card-4 caja hoja color-1-bg-disparador">
                        <i class="marcador fa fa-bookmark color-1-marcador"></i>
                        <i class="estrella fa fa-star-o color-1-estrella"></i>
                        <div class="linea_punteada color-1-linea-punteada"></div>
                        <div class="punto punto1 color-1-punto"></div>
                        <div class="punto punto2 color-1-punto"></div>
                        <p class="disparador color-1-tx-disparador">
                            COLOR 1: Quip ex ea commodo conset...
                            <i class="lapiz fa fa-pencil color-1-tx-disparador"></i>
                        </p>
                    </div>



                    <div class="w3-card-4 caja hoja color-9-bg-disparador">
                        <i class="marcador fa fa-bookmark color-9-marcador"></i>
                        <i class="estrella fa fa-star-o color-9-estrella"></i>
                        <div class="linea_punteada color-9-linea-punteada"></div>
                        <div class="punto punto1 color-9-punto"></div>
                        <div class="punto punto2 color-9-punto"></div>
                        <p class="disparador color-9-tx-disparador">
                            COLOR 9: Quip ex ea commodo conset...
                            <i class="lapiz fa fa-pencil color-9-tx-disparador"></i>
                        </p>
                    </div>
                    <div class="w3-card-4 caja libro color-4-bg-disparador">
                        <i class="marcador fa fa-bookmark color-4-marcador"></i>
                        <i class="estrella fa fa-star-o color-4-estrella"></i>
                        <div class="linea_vertical color-4-linea-vertical"></div>
                        <p class="disparador titulo color-4-tx-disparador">
                            COLOR 4: Abore et dolore magna aliqua.
                        </p>
                    </div>

                    <div class="w3-card-4 caja libro color-7-bg-disparador">
                        <i class="marcador fa fa-bookmark color-7-marcador"></i>
                        <i class="estrella fa fa-star-o color-7-estrella"></i>
                        <div class="linea_vertical color-7-linea-vertical"></div>
                        <p class="disparador titulo color-7-tx-disparador">
                            COLOR 7: Abore et dolore magna aliqua.
                        </p>
                    </div>



                </div><!-- FIN DE LA TERCER COLUMA -->


            </div>

        </section>

        <!-- Footer -->
        <footer class="color-random-bg-a w3-container w3-padding-32 w3-center w3-xlarge">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
            <p class="w3-medium">creado por <a href="#"><span class="logo">Soda Voce Spaceman</span></a></p>
        </footer>


<script src="funciones.js"></script>

</body>
</html>
