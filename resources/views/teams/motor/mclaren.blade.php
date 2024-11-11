@include('header')   
    <body>
    <section>
        <div class="container">
            <div class="left-side">
                <img src="{{ asset('img/mclaren.png') }}" class="star" alt="">
                <div class="title">
                    <h1> 
                    McLaren F1 Team
                    </h1>
                    <h2>Selecciona tu estilo</h2>
                </div>
            </div>
            <div class="right-side">
                <p> 
                Gorras de McLaren F1 Team para los seguidores más apasionados. Descubre nuestras gorras curvas y planas de los McLaren F1 Team y lleva con orgullo los colores de tu equipo legendario.
                </p>

                <div class="line"></div>
            </div>
        </div>
        <div class="card-container">
            @foreach ($products as $product)
            <div class="card card-{{ $loop->iteration }}" data-id="{{ $product->id }}" onclick="openModal({{ $product->id }})"
                    data-image="{{ route('product.image', ['id' => $product->id]) }}"   
                    data-name="{{ $product->name }}"
                    data-description="{{ $product->description }}"
                    data-price="{{ $product->price }} MXN">
                    <div class="rotation">
                    <img src="{{ route('product.image', ['id' => $product->id]) }}" alt="{{ $product->name }}" class="img-card image">
                    </div>
                    <div class="color">{{ $product->name }}</div>
                   <!-- <span>{{ $product->description }}</span> -->
                    <span>$ {{ $product->price }} MXN</span>
                    <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST" onsubmit="agregarProductoAlCarrito(event, {{ $product->id }}); return false;">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" class="btn btn-primary" onclick="event.stopPropagation();">Agregar al carrito</button>
</form>

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




    </section>
        @include('footer')   

</body>
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
    // Obtén el elemento de la tarjeta clicada usando un atributo de datos en lugar de una clase
    const productCard = document.querySelector(`.card[data-id="${productId}"]`);

    if (!productCard) {
        console.error('No se pudo encontrar la tarjeta del producto');
        return;
    }
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




</html>