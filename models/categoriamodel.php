<?php
class CategoriaModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias($status)
    {
        $sql = "SELECT * FROM categoria WHERE status = $status";
        return $this->selectAll($sql);
    }

    public function registrar($categoria, $imagen)
    {
        $sql = "INSERT INTO categoria (categoria, imagen) VALUES (?, ?)";
        $array = array($categoria, $imagen);
        return $this->insert($sql, $array);
    }

    public function verificarCategoria($categoria){
        $sql = "SELECT categoria FROM categoria WHERE categoria = '$categoria' AND status = 1";
        return $this->select($sql);
    }

    public function eliminar($idCat)
    {
        $sql = "UPDATE categoria SET status = ? WHERE id_categoria = ?";
        $array = array(0, $idCat);
        return $this->save($sql, $array);
    }

    public function getCategoria($idCat)
    {
        $sql = "SELECT * FROM categoria WHERE id_categoria = $idCat";
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