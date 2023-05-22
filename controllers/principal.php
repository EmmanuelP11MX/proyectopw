<?php
class Principal extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    //public function index(){}
    //vista about
    public function about()
    {
        $data['title'] = 'Nuestro Equipo';
        $this->views->getView('principal', "about", $data);
    }
    //vista shop
    public function shop($page)
    {
        $pagina = (empty($page)) ? 1 : $page;
        $porPagina = 18;
        $desde = ($pagina - 1) * $porPagina;
        $data['title'] = 'Nuestro Productos';
        $data['producto'] = $this->model->getProductos($desde, $porPagina);
        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductos();
        $data['total'] = ceil($total['total']/$porPagina);
        $this->views->getView('principal', "shop", $data);
    }
    //vista detail
    public function detail($id_producto)
    {
        $data['producto'] = $this->model->getProducto($id_producto);
        $data['title'] = $data['producto']['nombre'];
        $this->views->getView('principal', "detail", $data);
    }
    //vista categorias
    public function categoria($id_categoria)
    {
        $data['producto'] = $this->model->getProductoCat($id_categoria);
        $data['title'] = 'categorias';
        $this->views->getView('principal', "categorias", $data);
    }
    //vista contact
    public function contact()
    {
        $data['title'] = 'Contacto';
        $this->views->getView('principal', "contact", $data);
    }
}
?>