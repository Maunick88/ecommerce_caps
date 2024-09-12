@include('headerIndex')   

<body class="bg-star">
    <div class="banner">
        <div class="slides">
            <div class="slide active">
            <img src="{{ asset('img/banner_nfl.webp') }}" alt="Imagen 3">
                <div class="text-overlay3">
                <div class="title">
                    <h1>SIDELINE</h1>
                    <p>Una nueva temporada esta por dar inicio y en MauCaps estamos preparados para el momento del kick off</p>
                </div>
                </div>
                <a href="{{ url('/mlb/dodgers') }}" class="button-link3">
                    <button>Comienza a comprar</button>
                </a>
                
            </div>
            <div class="slide">
            <img src="{{ asset('img/banner_mexico.webp') }}" alt="Imagen 2">
                <div class="text-overlay1">
                    <div class="title">
                    <h1>MEXICO M</h1>
                    <p>Captruamos la escencia de lo que signicia ser mexicano </p>
                </div>
                </div>
                <a href="{{ url('/mlb/dodgers') }}" class="button-link1">
                    <button>Comienza a comprar</button>
                </a>
            </div>
            <div class="slide">
                <img src="{{ asset('img/checo.webp') }}" alt="Imagen 3">                
                <div class="text-overlay2">
                <div class="title">
                    <p>Gorras curvas New Era del piloto mexicano Sergio Perez con la escudería Oracle Red Bull Racing.</p>
                </div>
                </div>
                <a href="{{ url('/mlb/dodgers') }}" class="button-link2">
                    <button>Comienza a comprar</button>
                </a>
            </div>
        </div>
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </div>
    <div class="barra1">
            <div class="text-wrapper">
                <span>DISFRUTA <strong>ENVÍO GRATIS</strong> A PARTIR DE <strong>$649</strong> </span>
            </div>
        </div>
    <section class="section-one">
        <div class="container">
            <div class="left-side">
                <div class="title">
                    <h1>    Tu Estilo
                         <!-- <img src="{{ asset('img/logo.png') }}" alt="" class="star"> -->
                          <br>      Nuestra Pasión <br>     Gorras para Todos</h1>
                </div>

                <p class="p">
                ¡Oferta Exclusiva! <br> Gorras con Descuentos Especiales <br>por Tiempo Limitado
                </p>

                <button>Tienda en línea</button>

            </div>
            <div class="right-side pyramid">
                <img src="{{ asset('img/logo.png') }}" alt="" class="gold glow image">
            </div>
        </div>
    </section>

    <section class="product-gallery">
        <!-- Producto 1 -->
        <div class="product-item">
        <img src="{{ url('https://www.newera.mx/cdn/shop/files/NEGLOBAL_APP_1_720x.jpg?v=1725989847') }}" alt="Summer Training" class="product-image">
            <div class="product-info left">
                <p class="category">MLB</p>
                <h2 class="product-title">NEW ERA GLOBAL</h2>
                <button class="buy-button">COMPRA</button>
            </div>
        </div>
        
        <!-- Producto 2 -->
        <div class="product-item">
            <img src="{{ url('https://www.newera.mx/cdn/shop/files/REN_STIMPY_APP_720x.jpg?v=1725904677') }}" alt="Ren & Stimpy" class="product-image">
            <div class="shadow right"></div>
            <div class="product-info right">
                <p class="category">ENTRETENIMIENTO</p>
                <h2 class="product-title">REN & STIMPY</h2>
                <button class="buy-button">COMPRA</button>
            </div>
        </div>
        
        <!-- Producto 3 -->
        <div class="product-item">
        <img src="{{ url('https://www.newera.mx/cdn/shop/files/lamp-APP_720x.jpg?v=1725656407') }}" alt="New Era Global" class="product-image">
        <div class="shadow left"></div>
        <div class="shadow right"></div>
        <div class="product-info left">
                <p class="category">LAMP</p>
                <h2 class="product-title">SUMMER TRAINING</h2>
                <button class="buy-button">COMPRA</button>
            </div>
        </div>
            <!-- Producto 4 -->
            <div class="product-item">
        <img src="{{ asset('img/side-img.jpg') }}" alt="Summer Training" class="product-image">
        <div class="shadow left"></div>
            <div class="product-info left ">
                <p class="category">SUPREME</p>
                <h2 class="product-title">NEW ERA GLOBAL</h2>
                <button class="buy-button">COMPRA</button>
            </div>
        </div>
        
        <!-- Producto 5 -->
        <div class="product-item">
            <img src="{{ url('https://www.newera.mx/cdn/shop/files/750x1155_LMX_GOLFER_2_720x.jpg?v=1725653911') }}" alt="Ren & Stimpy" class="product-image">
            <div class="product-info left">
                <p class="category">FUTBOL MEXICANO</p>
                <h2 class="product-title">GOLFER</h2>
                <button class="buy-button">COMPRA</button>
            </div>
        </div>
        
        <!-- Producto 6 -->
        <div class="product-item">
        <img src="{{ url('https://www.newera.mx/cdn/shop/files/spongebob_APP_ad3a226d-8998-450b-95ea-6a9266f05024_720x.jpg?v=1725480823') }}" alt="New Era Global" class="product-image">
        <div class="shadow right"></div>
        <div class="product-info right">
                <p class="category">ENTRETENIMIENTO</p>
                <h2 class="product-title">BOB ESPONJA</h2>
                <button class="buy-button">COMPRA</button>
            </div>
        </div>
    </section>

    <section id="blanco">
                <!-- Incluye los estilos y scripts de Swiper desde su CDN -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

           <!-- Encabezado del Carrusel -->
    <div class="carousel-header">
        <h2 class="main-title">Lo Más Vendido</h2>
        <p class="sub-title">MauCap</p>
    </div>

    <!-- Contenedor del Carrusel -->
    <div class="swiper-container">
        <!-- Aquí va tu carrusel con productos -->
        <div class="swiper-wrapper">
            @foreach ($products as $product)
            <div class="swiper-slide card-container">
                <!-- Contenido de cada tarjeta -->
                <div class="card card-{{ $loop->iteration }}" onclick="openModal({{ $product->id }})"
                    data-image="{{ asset('img/' . $product->image) }}"
                    data-name="{{ $product->name }}"
                    data-description="{{ $product->description }}"
                    data-price="{{ $product->price }} MXN">
                    <div class="rotation">
                        <img src="{{ asset('img/' . $product->image) }}" alt="" class="img-card image">
                    </div>
                    <div class="color">{{ $product->name }}</div>
                    <span>{{ $product->description }}</span>
                    <span>Precio: {{ $product->price }} MXN</span>
                    <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST" onsubmit="agregarProductoAlCarrito(event, {{ $product->id }}); return false;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary"
                            onclick="event.stopPropagation();">Agregar al carrito</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Modal de información del producto -->
<div id="productModal" class="modal" style="display: none;" onclick="closeModal(event)">
    <div class="modal-content" onclick="event.stopPropagation();">
        <span class="close" onclick="closeModal(event)">&times;</span>
        <div class="modal-left">
            <img id="modalImage" src="" alt="Product Image" class="modal-img">
        </div>
        <div class="modal-right">
            <!-- Contenedor para el nombre y el precio -->
            <div class="product-header">
                <h2 id="modalName"></h2>
                <p id="modalPrice"></p>
            </div>
            <p id="modalDescription"></p>
            <div id="modalReviews">
                <!-- Aquí se cargarán las reseñas del producto -->
                 <!-- Modal para mostrar todas las reseñas -->
            </div>
            
            <!-- Formulario para agregar una reseña -->
            <form id="reviewForm" onsubmit="submitReview(event)">
                @csrf
                <input type="hidden" name="product_id" id="modalProductId">
                <!-- Calificación por estrellas -->
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label for="star5" title="5 estrellas"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4" title="4 estrellas"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3" title="3 estrellas"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2" title="2 estrellas"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1" title="1 estrella"><i class="fas fa-star"></i></label>
                </div>

                <div>
                    <label for="comment">Comentario:</label>
                    <textarea name="comment" id="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Reseña</button>
            </form>

            <!-- Formulario para agregar al carrito -->
           <!-- Formulario para agregar al carrito -->
           <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST" onsubmit="agregarProductoAlCarrito(event); return false;">
    @csrf
    <input type="hidden" name="product_id" id="modalProductId">
    <label for="quantity">Cantidad: <span id="quantityValue">1</span></label>
    <input type="range" id="quantity" name="quantity" min="1" max="10" value="1" oninput="updateQuantityValue(this.value)">
    <button type="submit" class="btn btn-primary" onclick="event.stopPropagation();">Agregar al carrito</button>
</form>

        </div>
    </div>
</div>

<div id="allReviewsModal" class="modal" style="display: none;" onclick="closeModal(event)">
                    <div class="modal-content" onclick="event.stopPropagation();">
                        <span class="close" onclick="closeAllReviewsModal()">&times;</span>
                        <h2>Todas las Reseñas</h2>
                        <div id="allReviewsContainer">
                            <!-- Aquí se cargarán todas las reseñas -->
                        </div>
                    </div>
                </div>





        <!-- Botones de navegación -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <!-- Paginación -->
        <div class="swiper-pagination"></div>
    </div>

        <!-- Inicializa Swiper -->
        <script>
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 3,  // Número de productos que se muestran al mismo tiempo
                spaceBetween: 30,  // Espacio entre cada producto
                loop: true,  // Carrusel infinito
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        </script>

    </section>
    <section>
        <!-- Botón para buscar la tienda más cercana -->
    <button onclick="findNearestStore()">Encontrar Tienda Más Cercana</button>
        <!-- Contenedor para Google Maps -->
        <div id="map" style="height: 500px; width: 100%;"></div>

        <!-- Carga la API de Google Maps con tu clave API -->
        <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWJwOeLKwsZutzYzu9Va5-5fi2AKK5kyc&callback=initMap"></script>

<script>
    // Función de inicialización del mapa
function initMap() {
    // Configuración inicial del mapa
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12, // Nivel de zoom inicial
        center: { lat: 19.4083, lng: -99.1559}, // Centro del mapa en México
    });

    var logoUrl = 'https://i.ibb.co/3p1KkJq/logo.png'; // Reemplaza con la URL de tu logo

       // Lista de ubicaciones con coordenadas para simular tiendas en CDMX
       var locations = [
        { lat: 19.4326, lng: -99.1332, title: "Tienda Centro Histórico" }, // Centro Histórico
        { lat: 19.427, lng: -99.1677, title: "Tienda Condesa" }, // Condesa
        { lat: 19.4258, lng: -99.1903, title: "Tienda Polanco" }, // Polanco
        { lat: 19.3613, lng: -99.1645, title: "Tienda Coyoacán" }, // Coyoacán
        { lat: 19.3977, lng: -99.1726, title: "Tienda Roma" }, // Roma Norte
        { lat: 19.3725, lng: -99.2216, title: "Tienda Santa Fe" }, // Santa Fe
        { lat: 19.4083, lng: -99.1559, title: "Tienda Chapultepec" }, // Chapultepec
        { lat: 19.4529, lng: -99.1269, title: "Tienda Lindavista" }, // Lindavista
        { lat: 19.4842, lng: -99.2252, title: "Tienda Satélite" }, // Ciudad Satélite
        { lat: 19.4592, lng: -99.1425, title: "Tienda Guadalupe Inn" } // Guadalupe Inn
    ];
      // Guarda los marcadores en un array para poder acceder a ellos más tarde
      var markers = [];

    // Agrega los marcadores para cada ubicación
    locations.forEach(function(location) {
        var marker = new google.maps.Marker({
            position: { lat: location.lat, lng: location.lng },
            map: map,
            title: location.title,
            icon: {
                url: logoUrl, // URL del logo
                scaledSize: new google.maps.Size(40, 40) // Escala del tamaño del logo
            }
        });

        // Añadir una ventana de información para cada marcador
        var infowindow = new google.maps.InfoWindow({
            content: `<h3>${location.title}</h3>`
        });

        // Mostrar ventana de información al hacer clic en un marcador
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    });
      // Función para encontrar la tienda más cercana
      window.findNearestStore = function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                var service = new google.maps.DistanceMatrixService();
                service.getDistanceMatrix({
                    origins: [userLocation],
                    destinations: locations.map(loc => ({ lat: loc.lat, lng: loc.lng })),
                    travelMode: google.maps.TravelMode.DRIVING
                }, function(response, status) {
                    if (status === google.maps.DistanceMatrixStatus.OK) {
                        var results = response.rows[0].elements;
                        var closestIndex = 0;
                        var shortestDistance = results[0].distance.value;

                        for (var i = 1; i < results.length; i++) {
                            if (results[i].distance.value < shortestDistance) {
                                shortestDistance = results[i].distance.value;
                                closestIndex = i;
                            }
                        }

                        // Centra el mapa en la tienda más cercana
                        map.setCenter(locations[closestIndex]);
                        map.setZoom(15); // Zoom más cercano

                        // Abre la ventana de información de la tienda más cercana
                        new google.maps.InfoWindow({
                            content: `<h3>${locations[closestIndex].title}</h3>`
                        }).open(map, markers[closestIndex]);
                    }
                });
            }, function(error) {
                console.error('Error obteniendo la geolocalización: ', error);
            });
        } else {
            alert('La geolocalización no es compatible con este navegador.');
        }
    };

}

</script>
    </section>

    <!-- <section>
        <div class="container">
            <div class="left-side hand">
                <img class="gold image" src="{{ asset('img/side-img.jpg') }}" alt="">
            </div>
            <div class="right-side">
                <img src="./img/star.png" class="star star-s2" alt="">
                <div class="title">
                    <h1>Investing for <br> the long term</h1>
                    <h2>Reasons for investing</h2>
                </div>

                <p class="p">
                    People often choose gold bullion as an long term investment.
                    Silver generally follows gold in terms of relative values, and in the past decade, 
                   gold hasdemonstrated a steady overall annual profit.
                </p>

                <div class="line"></div>

                <p class="p">
                    They can be traded in the short and medium term, gold & 
                    silver prices move in the markets.
                </p>
                <button>see directions</button>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="left-side">
                <div class="title">
                    <h1>Timing og gold & <br> silver prices</h1>
                    <h2>An unstoppable duo</h2>
                </div>
                <div class="type g-type">
                    <p>Gold</p>
                    <p>Gold is seen as a hedge against inflation and a store of value through 
                    thick and through thin.</p>
                </div>

                <div class="line line-blue"></div>

                <div class="type s-type">
                    <p>Silver</p>
                    <p>
                        Silver prices are much more `volatile` than those of gold 
                      in the short term.
                    </p>
                </div>
                <div class="line"></div>
            </div>
            <div class="right-side rotation">
                <img class="gold3 image" src="./img/gold3.png" alt="">
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="left-side">
                <img src="./img/star.png" class="star-s4 star" alt="">
                <div class="title">
                    <h1>3 direction</h1>
                    <h2>Choose your gold</h2>
                </div>
            </div>
            <div class="right-side">
                <p>
                    The fineness of gold depends on the amount of ligature - additional metals. 
                    For example, yellow gold 585* is a metal with the addition 
                    of 28% silver and 113.5% copper.
                </p>

                <div class="line"></div>
            </div>
        </div>
        <div class="card-container">
            <div class="card card-1">
                <div class="rotation">
                    <img src="./img/card-1.png" alt="" class="img-card image">
                </div>
                <div class="color">yellow</div>
                <span>585 standard gold</span>
            </div>
            <div class="card card-2">
                <div class="rotation">
                    <img src="./img/card-2.png" alt="" class="img-card image">
                </div>
                <div class="color">white</div>
                <span>585 standard gold</span>
            </div>
            <div class="card card-3">
                <div class="rotation">
                    <img src="./img/card-3.png" alt="" class="img-card image">
                </div>
                <div class="color">pink</div>
                <span>750 standard gold</span>
            </div>
        </div>
    </section> -->

    @include('footer')   

</body>
<script>
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;
    let slideInterval;

    function showNextSlide() {
        const oldSlide = slides[currentSlide];
        oldSlide.classList.remove('active');
        oldSlide.classList.add('old');

        currentSlide = (currentSlide + 1) % slides.length;
        const newSlide = slides[currentSlide];
        newSlide.classList.add('active');

        setTimeout(() => {
            oldSlide.classList.remove('old');
        }, 1000); // Tiempo de transición que coincide con el CSS
    }

    function changeSlide(n) {
        clearInterval(slideInterval); // Detiene el auto-reproducción al cambiar manualmente
        const oldSlide = slides[currentSlide];
        oldSlide.classList.remove('active');
        oldSlide.classList.add('old');

        currentSlide = (currentSlide + n + slides.length) % slides.length; // Cambia de slide
        const newSlide = slides[currentSlide];
        newSlide.classList.add('active');

        setTimeout(() => {
            oldSlide.classList.remove('old');
        }, 1000);

        slideInterval = setInterval(showNextSlide, 5000); // Reinicia el auto-reproducción
    }

    // Inicia la auto-reproducción de las diapositivas
    slideInterval = setInterval(showNextSlide, 5000); // Cambia la imagen cada 5 segundos
</script>

<!-- Incluye SweetAlert desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js" ></script>
<script src="{{ asset('js/script.js') }}"></script>
<script>
    const addProductUrl = "{{ route('cart.add') }}"; // Genera la URL correcta usando Blade
</script>
<script src="{{ asset('js/cart.js') }}"></script>

<script>
function openModal(productId) {
    // Obtén el elemento de la tarjeta clicada
    const productCard = document.querySelector(`.card.card-${productId}`);

    // Obtén los atributos 'data' de la tarjeta
    const image = productCard.getAttribute('data-image');
    const name = productCard.getAttribute('data-name');
    const description = productCard.getAttribute('data-description');
    const price = productCard.getAttribute('data-price');

    // Asigna los valores al modal
    document.getElementById('modalImage').src = image;
    document.getElementById('modalName').textContent = name;
    document.getElementById('modalDescription').textContent = description;
    document.getElementById('modalPrice').textContent = 'Precio: ' + price;
    document.getElementById('modalProductId').value = productId; // Asegura que el ID del producto se establezca correctamente

    // Restablece la cantidad a 1 al abrir el modal
    document.getElementById('quantity').value = 1;
    updateQuantityValue(1);

    // Muestra el modal
    document.getElementById('productModal').style.display = 'flex';

    // Obtener las reseñas del producto usando fetch
    fetch(`{{ url('/reviews') }}/${productId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener las reseñas');
            }
            return response.json();
        })
        .then(reviews => {
            mostrarResenas(reviews); // Llama a la función para mostrar las reseñas en el modal
        })
        .catch(error => console.error('Error al obtener reseñas:', error));
}

function mostrarResenas(reviews) {
    const modalReviews = document.getElementById('modalReviews');
    modalReviews.innerHTML = ''; // Limpia las reseñas anteriores

    // Mostrar solo las primeras 3 reseñas
    const limitedReviews = reviews.slice(0, 3);
    limitedReviews.forEach(review => {
        const stars = generarEstrellas(review.rating); // Genera las estrellas según la calificación
        const reviewElement = document.createElement('div');
        reviewElement.classList.add('review');

        reviewElement.innerHTML = `
            <div class="review-stars">${stars}</div>
            <div class="review-comment"><strong>Comentario:</strong> ${review.comment}</div>
        `;

        modalReviews.appendChild(reviewElement);
    });

    // Si hay más de 3 reseñas, agrega el botón "Mostrar más"
    if (reviews.length > 3) {
        const showMoreButton = document.createElement('button');
        showMoreButton.classList.add('btn', 'btn-primary');
        showMoreButton.textContent = 'Mostrar más';
        showMoreButton.onclick = () => mostrarTodasLasResenas(reviews);

        modalReviews.appendChild(showMoreButton);
    }
}

function mostrarTodasLasResenas(reviews) {
    const allReviewsModal = document.getElementById('allReviewsModal');
    const allReviewsContainer = document.getElementById('allReviewsContainer');
    allReviewsContainer.innerHTML = ''; // Limpia las reseñas anteriores

    // Mostrar todas las reseñas
    reviews.forEach(review => {
        const stars = generarEstrellas(review.rating); // Genera las estrellas según la calificación
        const reviewElement = document.createElement('div');
        reviewElement.classList.add('review');

        reviewElement.innerHTML = `
            <div class="review-stars">${stars}</div>
            <div class="review-comment"><strong>Comentario:</strong> ${review.comment}</div>
        `;

        allReviewsContainer.appendChild(reviewElement);
    });

    // Muestra el modal de todas las reseñas
    allReviewsModal.style.display = 'flex';
}
function closeAllReviewsModal() {
    document.getElementById('allReviewsModal').style.display = 'none';
}

function generarEstrellas(rating) {
    let stars = '';
    for (let i = 1; i <= 5; i++) {
        if (i <= rating) {
            stars += '<i class="fas fa-star filled-star"></i>'; // Estrella llena
        } else {
            stars += '<i class="fas fa-star empty-star"></i>'; // Estrella vacía
        }
    }
    return stars;
}


function updateQuantityValue(value) {
    document.getElementById('quantityValue').innerText = value; // Actualiza el valor mostrado de la cantidad
}
</script>
<script>
    
function submitReview(event) {
    event.preventDefault(); // Evita el envío normal del formulario

    const formData = new FormData(document.getElementById('reviewForm'));

    fetch('{{ route('reviews.store') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(response => {
        // Verifica si la respuesta es exitosa
        if (!response.ok) {
            throw new Error('Error al enviar la reseña');
        }
        return response.json();
    })
    .then(data => {
        // Mostrar SweetAlert al recibir la respuesta del servidor
        Swal.fire({
            title: '¡Reseña Enviada!',
            text: data.message,
            icon: 'success',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            // Actualiza las reseñas mostradas en el modal sin recargar la página
            openModal(formData.get('product_id'));
        });
    })
    .catch(error => {
        console.error('Error al enviar la reseña:', error);
        Swal.fire({
            title: 'Error',
            text: 'Hubo un problema al enviar la reseña.',
            icon: 'error',
            confirmButtonText: 'Intentar de nuevo'
        });
    });
}
</script>




</html>>