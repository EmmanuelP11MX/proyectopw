<?php
class PedidoModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getPedidos($proceso)
    {
        $sql = "SELECT * FROM pedido WHERE proceso = $proceso";
        return $this->selectAll($sql);
    }

    public function actualizarEstado($proceso, $idPedido)
    {
        $sql = "UPDATE pedido SET proceso=? WHERE id = ?";
        $array = array($proceso, $idPedido);
        return $this->save($sql, $array);
    }

}
?>