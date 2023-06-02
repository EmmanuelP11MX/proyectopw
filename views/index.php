<?php include_once 'views/template/header-principal.php'?>
<!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo BASE_URL.'assets/img/logo.png';?>" alt="Logo de la empresa" width="600">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h2 class="h1 text-success">¡Bienvenidos a <b>RLAB</b>!</h2>
                                <p>
                                Nos complace darles la bienvenida a nuestra página, donde encontrarán todo lo que necesitan para mantener sus equipos en 
                                perfecto funcionamiento.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?php echo BASE_URL.'assets/img/banner_img_01.png';?>" alt="" width="600">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Nuestras Refacciones</h1>
                                <h3 class="h2">"Lo que buscas, lo tenemos. Y si no, lo conseguimos."</h3>
                                <p>
                                En nuestra tienda, encontrarás una amplia variedad de piezas para satisfacer todas 
                                tus necesidades en refacciones de maquinaria agrícola. Nuestro extenso catálogo abarca 
                                desde piezas de motor y transmisión hasta componentes hidráulicos, eléctricos y más.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?php echo BASE_URL.'assets/img/banner_img_03.png';?>" alt="" width="600">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">¡Ofertas!</h1>
                                <h3 class="h2">No te pierdas nuestras increíbles ofertas especiales</h3>
                                <p>
                                Te invitamos a revisar nuestro catálogo cada mes, ya que constantemente actualizamos nuestras 
                                promociones para brindarte los mejores precios y descuentos en refacciones de maquinaria agrícola. 
                                Desde piezas de calidad hasta productos de alta demanda, nuestras ofertas especiales son una oportunidad 
                                perfecta para ahorrar y obtener todo lo que necesitas para mantener tus equipos en óptimas condiciones.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categorias</h1>
                <p>
                Descubre nuestras categorías de refacciones de maquinaria agrícola, que incluyen piezas de motor, 
                transmisión, sistema hidráulico, componentes eléctricos y más. Ofrecemos opciones nuevas y 
                de segunda mano para mantener tus equipos en pleno rendimiento. Nuestro objetivo es proporcionarte 
                productos confiables y a precios competitivos. 
                </p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data['categoria'] as $categoria) { ?>
                <div class="col-12 col-md-4 p-5 mt-2">
                    <a href="<?php echo BASE_URL . 'principal/categoria/' . $categoria['id_categoria'];?>"><img src="<?php echo BASE_URL . $categoria['imagen'];?>" class="rounded-circle img-fluid border"></a>
                    <h5 class="text-center mt-3 mb-3"><?php echo $categoria['categoria'];?></h5>
                </div>
            <?php }?>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">¡Descubre nuestros últimos productos!</h1>
                    <p>
                    Estamos emocionados de presentarte nuestra selección fresca y actualizada 
                    de refacciones de maquinaria agrícola. Desde piezas clave de motor y transmisión 
                    hasta componentes hidráulicos y eléctricos, 
                    </p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($data['nuevosProductos'] as $producto) { ?>
                    <div class="col-12 col-md-3 mb-3">
                        <div class="card h-100">
                            <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id_producto'];?>">
                                <img src="<?php echo $producto['imagen'];?>" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li class="text-muted text-right"><?php echo MONEDA . ' ' . $producto['precio'];?></li>
                                </ul>
                                <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id_producto'];?>" class="h2 text-decoration-none text-dark"><?php echo $producto['nombre'];?></a>
                                <p class="card-text">
                                    <?php echo $producto['descripcion'];?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->
<?php include_once 'views/template/footer-principal.php'?>