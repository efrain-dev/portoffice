<?php

function setActive($routeName)
{

    return request()->routeIs($routeName) ? 'font-weight-bold': '';
}
function setStatus($name)
{
    if ($name=='Procesando'){
        return 'success';
    }
    if ($name=='Cancelado'){
        return 'danger';
    }
    if ($name=='Terminado'){
        return 'dark';
    }
}

function setEmpy($name){
    if ($name ==""){

        return "/imagenes/unnamed.jpg";

    }else{

        return $name;
    }


}
/* Para que funcione este archivo se tiene que ir al json de composer y en la seccion
    de autoload agregar los este file para que lo cargue asi
    /* "files":["app/helpers.php"] */
    /* y luego en la consolo sobre el proyecto ejecutar el comando
    composer dumpautoload
    para que funcione  */
