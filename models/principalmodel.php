<?php
class PrincipalModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getProducto($id_producto)
    {
        $sql = "SELECT p.*, c.categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id_categoria WHERE p.id_producto = $id_producto";
        return $this->select($sql);
    }
    
}
?>