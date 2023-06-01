<?php
class Usuario extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Usuarios';
        $this->views->getView('admin/usuario', "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getUsuarios(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '
            <div class="d-flex">
                <button class="btn btn-primary" type="button" onclick="editarUser(' . $data[$i]['id_usuario'] . ')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="eliminarUser(' . $data[$i]['id_usuario'] . ')"><i class="fas fa-trash"></i></button>
            </div>
        ';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if (isset($_POST['nombre'])) {
            $id_usuario = $_POST['id_usuario'];
            $nombre = $_POST['nombre'];
            $p_apellido = $_POST['p_apellido'];
            $s_apellido = $_POST['s_apellido'];
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $hash = password_hash($clave, PASSWORD_DEFAULT);
            if (empty($_POST['nombre']) || empty($_POST['p_apellido']) || empty($_POST['s_apellido']) || empty($_POST['correo'])) 
            {
                $respuesta = array('msg' => 'Debes llenar todos los campos', 'icono' => 'warning');
            } else {
                if (empty($id_usuario)) {
                    $result = $this->model->verificarCorreo($correo);
                    if (empty($result)) {
                        $data = $this->model->registrar($nombre, $p_apellido, $s_apellido, $correo, $hash);
                        if ($data > 0) {
                            $respuesta = array('msg' => 'Usuario registrado', 'icono' => 'success');
                        } else {
                            $respuesta = array('msg' => 'Error al registrar usuario', 'icono' => 'error');
                        }
                    } else {
                        $respuesta = array('msg' => 'Este correo ya esta registrado', 'icono' => 'warning');
                    }
                } else {
                    $data = $this->model->modificar($nombre, $p_apellido, $s_apellido, $correo, $id_usuario);
                    if ($data == 1) {
                        $respuesta = array('msg' => 'Usuario actualizado', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al actualizar usuario', 'icono' => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }

    public function delete($idUser)
    {
        if (is_numeric($idUser)) {
            $data = $this->model->eliminar($idUser);
            if ($data == 1) {
                $respuesta = array('msg' => 'Usuario dado de baja', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'error al eliminar', 'icono' => 'error');
            }
        } else {
            $respuesta = array('msg' => 'Error fatal', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }
    //Editar usuario
    public function edit($idUser)
    {
        if (is_numeric($idUser)) {
            $data = $this->model->getUsuario($idUser);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
