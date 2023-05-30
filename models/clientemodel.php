<?php
class ClienteModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registroDirecto($nombre, $p_apellido, $s_apellido, $correo, $telefono, $clave, $token)
    {
        $sql = "INSERT INTO cliente (nombre, primer_apellido, segundo_apellido, correo, telefono, clave, token) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $datos = array($nombre, $p_apellido, $s_apellido, $correo, $telefono, $clave, $token);
        $data = $this->insert($sql, $datos);
        if ($data > 0) {
            $res = $data;
        } else {
            $res = 0;
        }
        return $res;
    }

    public function getToken($token)
    {
        $sql = "SELECT * FROM cliente WHERE token = '$token'";
        return $this->select($sql);
    }

    public function actualizarVerify($id_cliente)
    {
        $sql = "UPDATE cliente SET token=?, verify=? WHERE id_cliente=?"; 
        $datos = array(null, 1, $id_cliente);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = $data;
        } else {
            $res = 0;
        }
        return $res;
    }

    public function getVerificar($correo)
    {
        $sql = "SELECT * FROM cliente WHERE correo = '$correo'";
        return $this->select($sql);
    }
}
?>