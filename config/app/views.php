<?php
class Views{
    // Método para obtener la vista
    public function getView($ruta, $vista, $data="")
    {
        if ($ruta == "home") {// Verificar la ruta de la vista
            $vista = "views/".$vista.".php";// Si la ruta es "home", se establece la vista en la carpeta "views" con la extensión ".php"
        }else{
            $vista = "views/".$ruta."/".$vista.".php";// Si la ruta no es "home", se establece la vista en la carpeta "views/ruta" con la extensión ".php"
        }
        require $vista;// Se requiere la vista correspondiente
    }
}
?>