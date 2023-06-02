<?php
spl_autoload_register(function($class){
    // Verificar si el archivo de la clase existe en la ruta "config/app/"
    if (file_exists("config/app/" . $class . ".php")) {
         // Incluir el archivo de la clase
        require_once "config/app/" . $class . ".php";
    }
})
?>