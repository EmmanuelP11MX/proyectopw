<?php
class Query extends Conexion{
    private $pdo, $con, $sql, $datos;
    public function __construct() {
        $this->pdo = new Conexion();// Se crea una instancia de la clase Conexion para establecer la conexión PDO
        $this->con = $this->pdo->conect();// Se obtiene la conexión establecida utilizando el método conect() de la clase padre (Conexion)
    }
    public function select(string $sql)
    {
        $this->sql = $sql;// Se asigna la consulta SQL a la propiedad $sql
        $resul = $this->con->prepare($this->sql);// Se prepara la consulta SQL utilizando la conexión PDO
        $resul->execute();// Se ejecuta la consulta
        $data = $resul->fetch(PDO::FETCH_ASSOC);// Se obtiene el primer resultado de la consulta como un arreglo asociativo
        return $data;// Se devuelve el resultado
    }
    public function selectAll(string $sql)
    {
        $this->sql = $sql;
        $resul = $this->con->prepare($this->sql);
        $resul->execute();
        $data = $resul->fetchAll(PDO::FETCH_ASSOC);// Se obtienen todos los resultados de la consulta como un arreglo asociativo
        return $data;
    }
    public function save(string $sql, array $datos)
    {
        $this->sql = $sql;
        $this->datos = $datos;// Se asigna la consulta SQL y los datos a las propiedades $sql y $datos respectivamente
        $insert = $this->con->prepare($this->sql);
        $data = $insert->execute($this->datos);// Se ejecuta la consulta utilizando los datos proporcionados
        if ($data) {// Se verifica si la consulta se ejecutó correctamente y se devuelve un resultado correspondiente
            $res = 1;
        }else{
            $res = 0;
        }
        return $res;
    }
    public function insert(string $sql, array $datos)
    {
        $this->sql = $sql;
        $this->datos = $datos;
        $insert = $this->con->prepare($this->sql);
        $data = $insert->execute($this->datos);
        if ($data) {// Se verifica si la consulta se ejecutó correctamente y se devuelve el último ID insertado o 0 en caso de error
            $res = $this->con->lastInsertId();
        } else {
            $res = 0;
        }
        return $res;
    }
}
?>