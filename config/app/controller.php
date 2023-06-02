<?php
class Controller{
    protected $views, $model;
    
    public function __construct()
    {
        $this->views = new views(); // Se crea una instancia de la clase "views"
        $this->cargarModel(); // Se llama al método "cargarModel"
    }
    public function cargarModel()
    {
        $model = get_class($this)."model"; // Se obtiene el nombre de la clase actual y se le agrega el sufijo "model"
        $ruta = "models/".$model.".php"; // Se construye la ruta del archivo del modelo

        if (file_exists($ruta)) { // Se verifica si el archivo del modelo existe
            require_once $ruta; // Se incluye el archivo del modelo
            $this->model = new $model(); // Se crea una instancia del modelo correspondiente
        }
    }
}
?>