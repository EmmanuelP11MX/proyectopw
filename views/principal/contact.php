    <?php include_once 'views/template/header-principal.php' ?>

    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">¡Estamos aquí para ayudarte!</h1>
            <p>
            En nuestra refaccionaria, encontrarás un amplio inventario de piezas nuevas y de segunda 
            mano para una variedad de equipos agrícolas. Nuestro objetivo es brindarte soluciones 
            confiables y de calidad para mantener tus maquinarias en pleno rendimiento.
            </p>
        </div>
    </div>

    <!-- Start Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpkD7L3WVtopQkrLviDBd0TSXhLpf3MZE"></script>
    <center>
        <div id="map" style="width: 600px; height: 600px;">
            <script>
                function initMap() {
                    var mapOptions = {
                        center: {
                            lat: 20.951406,
                            lng: -101.4152743
                        },
                        zoom: 15
                    };
                    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                    var marker = new google.maps.Marker({
                        position: {
                            lat: 20.951406,
                            lng: -101.4152743
                        },
                        map: map,
                        title: "Torre Eiffel"
                    });
                }
                google.maps.event.addDomListener(window, "load", initMap);
            </script>
        </div>
    </center>
    <!-- Ena Map -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <p>
            Nuestro equipo de expertos estará a tu disposición para brindarte asesoramiento personalizado 
            y ayudarte a encontrar las refacciones exactas que necesitas. Nos enorgullece ofrecer un excelente 
            servicio al cliente y garantizar tu satisfacción en cada visita.
            Además, en nuestra refaccionaria podrás experimentar un ambiente acogedor y profesional. 
            Estamos comprometidos en brindarte una experiencia de compra agradable y sin complicaciones, 
            donde te sentirás valorado y atendido de manera personalizada.
            </p>
        </div>
    </div>

    <?php include_once 'views/template/footer-principal.php' ?>

    </body>

    </html>