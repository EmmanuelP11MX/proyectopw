<?php
class Conexion{
    private $conect;
    public function __construct()
    {
        // Configuración de la conexión PDO con los valores definidos en las constantes HOST, DB, CHARSET, USER y PASS
        $pdo = "mysql:host=".HOST.";dbname=".DB.";".CHARSET;
        try {
            // Creación de la instancia de PDO para establecer la conexión con la base de datos
            $this->conect = new PDO($pdo, USER, PASS);

            // Establecer el modo de error y excepción para la conexión PDO
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // En caso de error en la conexión, se captura la excepción y se muestra un mensaje de error
            echo "Error en la conexion".$e->getMessage();
        }
    }
    public function conect()
    {
        // Método para obtener la conexión PDO establecida
        return $this->conect;
    }
}
?>