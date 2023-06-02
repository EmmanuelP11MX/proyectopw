<?php
//header('Content-Type: application/json; charset=utf-8');
include_once(_DIR_."/../admin/controllers/sistema.php");
include_once(_DIR_."/../admin/controllers/categoria.php");

$action = $_SERVER['REQUEST_METHOD'];
$id =  isset($_GET['id']) ?  $_GET['id'] : null;

switch($action){
    case 'DELETE':
        $data['mensaje']= 'No existe el categoria.';
        if (!is_null($id)) {
            $contador = $categoria->delete($id);
            if ($contador == 1) {
                $data['mensaje']= 'Se elimino el categoria.';
            }
        }
        break;
    case 'POST':
        $data = array();
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body, true);             
          if (is_null($id)) {
            $cantidad = $categoria->new($data);
            if ($cantidad !=0) {
                $data['mensaje']='Se inserto el categoria.';
                //$data[]
            }else{
                $data['mensaje']='Ocurrio un error';
            }
        }else{
            $cantidad = $categoria->edit($id, $data);
            if ($cantidad !=0) {
                $data['mensaje']='Se modifico el categoria.';
                //$data[]
            }else{
                $data['mensaje']='Ocurrio un error';
            }
        }
        
        break;
    case 'GET':
    default:
        if (is_null($id)) {
            $data = $categoria->get();
        }else {
            $data = $categoria->get($id);
        }
        break;
}
$data = json_encode($data);
echo ($data);
?>