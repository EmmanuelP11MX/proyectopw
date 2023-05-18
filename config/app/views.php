<?php
class views{

    public function getView($ruta, $vista, $data="")
    {
        if ($ruta == "home") {
            $vista = "views/".$vista.".php";
        }else{
            $vista = "views/".$ruta."/".$vista.".php";
        }
        require $vista;
    }
}
?>