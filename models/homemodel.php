<?php
class HomeModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCategoria()
    {
        $sql = "SELECT * FROM categoria";
        return $this->selectAll($sql);
    }

    public function getNuevosProductos()
    {
        $sql = "SELECT * FROM producto ORDER BY id_producto DESC LIMIT 12";
        return $this->selectAll($sql);
    }

}
?>