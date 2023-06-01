<?php
class ProductoModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getProductos($status)
    {
        $sql = "SELECT * FROM producto WHERE status = $status";
        return $this->selectAll($sql);
    }
    public function getCategorias()
    {
        $sql = "SELECT * FROM categoria WHERE status = 1";
        return $this->selectAll($sql);
    }

    public function registrar($nombre, $descripcion, $precio, $cantidad, $imagen, $categoria)
    {
        $sql = "INSERT INTO producto (nombre, descripcion, precio, cantidad, imagen, id_categoria) VALUES (?, ?, ?, ?, ?, ?)";
        $array = array($nombre, $descripcion, $precio, $cantidad, $imagen, $categoria);
        return $this->insert($sql, $array);
    }

    public function eliminar($idCat)
    {
        $sql = "UPDATE categoria SET status = ? WHERE id_categoria = ?";
        $array = array(0, $idCat);
        return $this->save($sql, $array);
    }

    public function getProducto($idCat)
    {
        $sql = "SELECT * FROM producto WHERE id_categoria = $idCat";
        return $this->select($sql);
    }

    public function modificar($categoria, $imagen, $id_categoria)
    {
        $sql = "UPDATE categoria SET categoria=?, imagen=? WHERE id_categoria = ?";
        $array = array($categoria, $imagen, $id_categoria);
        return $this->save($sql, $array);
    }
}
?>