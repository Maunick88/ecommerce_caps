@include('headerNba')   
<body>

{{-- Banner Deportivo --}}
<section class="banner">
    <div class="slides">
        <div class="slide active">
            <!-- <img src="{{ asset('img/banner_nfl.webp') }}" alt="Estadio NFL 1"> -->
            <div class="text-overlay">
                <h1>Bienvenido a la NBA</h1>
                <p>Descubre nuestros productos exclusivos y siente la emoción del juego.</p>
            </div>
        </div>
        <div class="slide">
            <!-- <img src="{{ asset('img/bannernfl.webp') }}" alt="Estadio NFL 2"> -->
            <div class="text-overlay">
                <h1>Calidad y Pasión</h1>
                <p>Equipos y accesorios para los verdaderos fans.</p>
            </div>
        </div>
        <!-- Agrega más slides si lo deseas -->
    </div>
</section>

{{-- Galería de Productos --}}
<section class="product-gallery">
   

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
                <span class="product-price">$ {{ number_format($product->price, 2) }} MXN</span>
                <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST" onsubmit="agregarProductoAlCarrito(event, {{ $product->id }}); return false;">
                @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" class="btn btn-primary">Agregar al carrito</button>
</form>


            </div>
        </div>
        @endforeach
    @endif
</section>
</body>


<!-- Incluye SweetAlert desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" ></script>
<script src="{{ asset('js/script.js') }}"></script>
<script>
    const addProductUrl = "{{ route('cart.add') }}"; // Genera la URL correcta usando Blade
</script>
<script src="{{ asset('js/cart.js') }}"></script>

</html>