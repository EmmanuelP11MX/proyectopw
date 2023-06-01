<?php
class UsuarioModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarios($status)
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
        $sql = "SELECT correo FROM usuario WHERE correo = '$correo' AND status = 1";
        return $this->select($sql);
    }

    public function eliminar($idUser)
    {
        $sql = "UPDATE usuario SET status = ? WHERE id_usuario = ?";
        $array = array(0, $idUser);
        return $this->save($sql, $array);
    }

    public function getUsuario($idUser)
    {
        $sql = "SELECT id_usuario, nombre, primer_apellido, segundo_apellido, correo FROM usuario WHERE id_usuario = $idUser";
        return $this->select($sql);
    }

    public function modificar($nombre, $p_apellido, $s_apellido, $correo, $id_usuario)
    {
        $sql = "UPDATE usuario SET nombre=?, primer_apellido=?, segundo_apellido=?, correo=? WHERE id_usuario = ?";
        $array = array($nombre, $p_apellido, $s_apellido, $correo, $id_usuario);
        return $this->save($sql, $array);
    }
}
?>