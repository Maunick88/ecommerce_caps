@include('header')  
    <body>
    <section>
        <div class="container">
            <div class="left-side">
                <img src="{{ asset('img/miami.png') }}" class="star" alt="">
                <div class="title">
                    <h1>Miami Marlins</h1>
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
                <div class="card card-{{ $loop->iteration }}">
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
</html>