@include('header')  
    <body>
    <section>
        <div class="container">
            <div class="left-side">
                <img src="{{ asset('img/ladodgers.png') }}" class="star" alt="">
                <div class="title">
                    <h1>Los Angeles Dodgers</h1>
                    <h2>Selecciona tu estilo</h2>
                </div>
            </div>
            <div class="right-side">
                <p> 
                Gorras de los Dodgers, playeras, sudaderas y más. Gorras planas de Los Angeles Dodgers, curvas, buckets, gorritos, etc.
                </p>

                <div class="line"></div>
            </div>
        </div>
        <div class="card-container">
            @foreach ($products as $product)
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
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                    </form>
                </div>
            @endforeach
        </div>


        <!-- Modal de información del producto -->
        <div id="productModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-left">
            <img id="modalImage" src="" alt="Product Image" class="modal-img">
        </div>
        <div class="modal-right">
            <h2 id="modalName"></h2>
            <p id="modalPrice"></p>
            <p id="modalDescription"></p>
            <div id="modalReviews">
                <!-- Aquí se cargarán las reseñas del producto -->
            </div>
            
            <!-- Formulario para agregar una reseña -->
            <form id="reviewForm" onsubmit="submitReview(event)">
                @csrf
                <input type="hidden" name="product_id" id="modalProductId">
                   <!-- Calificación por estrellas -->
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Excelente">5 estrellas</label>
                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Muy bueno">4 estrellas</label>
                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Bueno">3 estrellas</label>
                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Regular">2 estrellas</label>
                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Malo">1 estrella</label>
                </div>
                <div>
                    <label for="comment">Comentario:</label>
                    <textarea name="comment" id="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Reseña</button>
            </form>

            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" id="modalProductId">
                <label for="quantity">Cantidad</label>
                <div class="quantity-controls">
                    <button type="button" onclick="decreaseQuantity()">-</button>
                    <input type="number" name="quantity" id="quantity" value="1" min="1">
                    <button type="button" onclick="increaseQuantity()">+</button>
                </div>
                <button type="submit" class="btn btn-primary">Agregar al carrito</button>
            </form>
        </div>
    </div>
</div>


    </section>
    <section class="footer-section">
        <div class="line"></div>

        <div class="container sides">
            <div class="left-side">
                <div class="logo">
                    <img src="./img/star.png" class="star" alt="">
                    <div>Frost Inv.</div>
                </div>

                <p class="p">
                    We are based in Los Angeles, USA.<br>
                    our motto is -investing in knowledge <br>
                    pays the best dividends.
                </p>
            </div>
            <div class="right-side">
                <ul class="menu">
                    <li><a href="#">Resources</a></li>
                    <li><a href="#">company</a></li>
                    <li><a href="#">help</a></li>
                    <li><a href="#">client</a></li>
                    <li><a href="#">about</a></li>
                    <li><a href="#">support</a></li>
                    <li><a href="#">blog</a></li>
                    <li><a href="#">services</a></li>
                    <li><a href="#">jobs</a></li>
                    <li><a href="#">docs</a></li>
                    <li><a href="#">news</a></li>
                    <li><a href="#">privacy policy</a></li>
                </ul>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="left-side">
                <p> &copy; copyright 2022 . All rights reserved</p>
            </div>
            <div class="right-side center">
                <p>Term and Conditions</p>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js" ></script>
<script src="{{ asset('js/script.js') }}"></script>
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
        document.getElementById('modalProductId').value = productId;

        // Muestra el modal
        document.getElementById('productModal').style.display = 'flex';
        
    }

    function closeModal() {
        document.getElementById('productModal').style.display = 'none';
    }

    function decreaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        if (quantityInput.value > 1) {
            quantityInput.value--;
        }
    }

    function increaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        quantityInput.value++;
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
        .then(response => response.json())
        .then(data => {
            alert(data.message);

            // Actualiza las reseñas mostradas en el modal sin recargar la página
            openModal(formData.get('product_id'));
        })
        .catch(error => console.error('Error al enviar la reseña:', error));
    }
</script>




</html>