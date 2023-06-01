<?php
class UsuarioModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario($status)
    {
        $sql = "SELECT * FROM usuario WHERE status = $status";
        return $this->selectAll($sql);
    }

    public function registrar($nombre, $p_apellido, $s_apellido, $correo, $clave)
    {
        $sql = "INSERT INTO usuario (nombre, primer_apellido, segundo_apellido, correo, clave) VALUES (?, ?, ?, ?, ?)";
        $array = array($nombre, $p_apellido, $s_apellido, $correo, $clave);
        return $this->insert($sql, $array);
    }

    public function verificarCorreo($correo){
        $sql = "SELECT correo FROM usuario WHERE correo = '$correo'";
        return $this->select($sql);
    }

    public function eliminar($idUser)
    {
        $sql = "UPDATE usuario SET status = ? WHERE id_usuario = ?";
        $array = array(0, $idUser);
        return $this->save($sql, $array);
    }
}
?>