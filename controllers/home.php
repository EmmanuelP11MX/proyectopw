<?php
class Home extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
        //session_destroy();
    }
    public function index()
    {
        $data['title'] = 'Pagina Principal';
        $data['categoria'] = $this->model->getCategoria();
        $data['nuevosProductos'] = $this->model->getNuevosProductos();
        $this->views->getView('home', "index", $data);
    }
}
?>