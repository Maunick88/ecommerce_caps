@include('headerIndex')   

<body class="bg-star">
    <div class="banner">
        <div class="slides">
            <div class="slide active">
                <img src="{{ asset('img/banner1.jpg') }}" alt="Imagen 1">
                <div class="text-overlay">
                <div class="title">
                    <h1>Tu Estilo Nuestra Pasión Gorras para Todos</h1>
                </div>
                </div>
                <a href="{{ url('/mlb/dodgers') }}" class="button-link">
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
            <div class="slide">
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

    <section>
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
    </section>

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


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js" ></script>
<script src="{{ asset('js/script.js') }}"></script>
</html>