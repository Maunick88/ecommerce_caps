
    @include('headerNfl')   
    
    {{-- Banner Deportivo --}}
    <section class="banner">
        <div class="slides">
            <div class="slide active">
                <img src="{{ asset('img/banner_nfl.webp') }}" alt="Estadio NFL 1">
                <div class="text-overlay">
                    <h1>Bienvenido a la NFL</h1>
                    <p>Descubre nuestros productos exclusivos y siente la emoción del juego.</p>
                </div>
            </div>
            <div class="slide">
                <img src="{{ asset('img/stadium2.jpg') }}" alt="Estadio NFL 2">
                <div class="text-overlay">
                    <h1>Calidad y Pasión</h1>
                    <p>Equipos y accesorios para los verdaderos fans.</p>
                </div>
            </div>
            <!-- Agrega más slides si lo deseas -->
        </div>
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
    </section>

    {{-- Galería de Productos --}}
    <section class="product-gallery">
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        @if($products->isEmpty())
            <p>No hay productos disponibles en las categorías seleccionadas.</p>
        @else
            @foreach($products as $product)
            <div class="product-item">
                <img src="{{ route('product.image', ['id' => $product->id]) }}" alt="Balón de Fútbol Americano {{ $product->name }}" class="img-card image">
                <div class="leather-texture"></div> <!-- Textura de cuero -->
                <div class="stitches">
                    <div class="stitch"></div>
                    <div class="stitch"></div>
                    <div class="stitch"></div>
                    <div class="stitch"></div>
                </div>
                <div class="laces">
                    <div class="lace"></div>
                    <div class="lace"></div>
                    <div class="lace"></div>
                </div>
                <div class="shadow left"></div>
                <div class="shadow right"></div>
                <div class="product-info {{ $loop->even ? 'left' : 'right' }}">
                    <span class="category">{{ $product->category->name }}</span>
                    <h2 class="product-title">{{ $product->name }}</h2>
                    <span class="product-price">$ {{ $product->price }} MXN</span>
            <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST" onsubmit="agregarProductoAlCarrito(event, {{ $product->id }}); return false;">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-primary" onclick="event.stopPropagation();">Agregar al carrito</button>
            </form>
                </div>
            </div>

            </div>
            @endforeach
        @endif
    </section>
@push('scripts')
<script>
    const addProductUrl = "{{ route('cart.add') }}"; // Genera la URL correcta usando Blade
</script>
<script src="{{ asset('js/cart.js') }}"></script>
<script>
    // Simple Slider para el Banner
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            if (i === index) {
                slide.classList.add('active');
            }
        });
    }

    function nextSlide() {
        slideIndex = (slideIndex + 1) % slides.length;
        showSlide(slideIndex);
    }

    function prevSlide() {
        slideIndex = (slideIndex - 1 + slides.length) % slides.length;
        showSlide(slideIndex);
    }

    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', prevSlide);

    // Auto Slide
    setInterval(nextSlide, 5000); // Cambia cada 5 segundos
</script>
@endpush
