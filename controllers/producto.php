<?php
class Categoria extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Categorias';
        $this->views->getView('admin/categoria', "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getCategorias(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['imagen'] = '<img class="img-thumbnail" src="'.$data[$i]['imagen'] .'" alt="'.$data[$i]['categoria'] .'" width="125">';
            $data[$i]['accion'] = '
            <div class="d-flex">
                <button class="btn btn-primary" type="button" onclick="editarCat(' . $data[$i]['id_categoria'] . ')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="eliminarCat(' . $data[$i]['id_categoria'] . ')"><i class="fas fa-trash"></i></button>
            </div>
        ';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if (isset($_POST['categoria'])) {
            $id_categoria = $_POST['id_categoria'];
            $imagen = $_FILES['imagen'];
            $tmp_name = $imagen['tmp_name'];
            $categoria = $_POST['categoria'];
            $ruta = 'assets/img/categorias/';
            $nombreImg = date('YmdHis');
            if (empty($_POST['categoria'])) {
                $respuesta = array('msg' => 'Debes llenar todos los campos', 'icono' => 'warning');
            } else {
                if (!empty($imagen['name'])) {
                    $destino = $ruta . $nombreImg . '.jpg';
                } else if (!empty($_POST['imagen_actual']) && empty($imagen['name'])){
                    $destino = $_POST['imagen_actual'];
                } else {
                    $destino = $ruta . 'default.png';
                }
                if (empty($id_categoria)) {
                    $result = $this->model->verificarCategoria($categoria);
                    if (empty($result)) {
                        $data = $this->model->registrar($categoria, $destino);
                        if ($data > 0) {
                            if (!empty($imagen['name'])) {
                                move_uploaded_file($tmp_name, $destino);
                            }
                            $respuesta = array('msg' => 'Categoria registrada', 'icono' => 'success');
                        } else {
                            $respuesta = array('msg' => 'Error al registrar Categoria', 'icono' => 'error');
                        }
                    } else {
                        $respuesta = array('msg' => 'Este categoria ya esta registrada', 'icono' => 'warning');
                    }
                } else {
                    $data = $this->model->modificar($categoria, $destino, $id_categoria);
                    if ($data == 1) {
                        if (!empty($imagen['name'])) {
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'Categoria actualizado', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al actualizar categoria', 'icono' => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }

    public function delete($idCat)
    {
        if (is_numeric($idCat)) {
            $data = $this->model->eliminar($idCat);
            if ($data == 1) {
                $respuesta = array('msg' => 'Categoria dada de baja', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'error al eliminar la categoria', 'icono' => 'error');
            }
        } else {
            $respuesta = array('msg' => 'Error fatal', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }
    //Editar categoria
    public function edit($idCat)
    {
        if (is_numeric($idCat)) {
            $data = $this->model->getCategoria($idCat);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
