@include('header')  
    <body>
    <div class="banner">
        <div class="slides">
            <div class="slide active">
                <img src="{{ asset('img/banner1.jpg') }}" alt="Imagen 1">
                <div class="text-overlay">
                    <h1>Texto sobre la Imagen 1</h1>
                    <p>Descripción adicional para la Imagen 1</p>
                </div>
            </div>
            <div class="slide">
                <img src="{{ asset('img/banner3.jpg') }}" alt="Imagen 2">
                <div class="text-overlay1">
                    <h1>Texto sobre la Imagen 1</h1>
                    <p>Descripción adicional para la Imagen 1</p>
                </div>
            </div>
            <div class="slide">
                <img src="{{ asset('img/banner7.webp') }}" alt="Imagen 2">
                <div class="text-overlay2">
                    <h1>Texto sobre la Imagen 1</h1>
                    <p>Descripción adicional para la Imagen 1</p>
                </div>
            </div>
            <div class="slide">
                <img src="{{ asset('img/banner5.webp') }}" alt="Imagen 3">
                <div class="text-overlay3">
                    <h1>Texto sobre la Imagen 1</h1>
                    <p>Descripción adicional para la Imagen 1</p>
                </div>
            </div>
            <div class="slide">
                <img src="{{ asset('img/checo.webp') }}" alt="Imagen 3">
                <div class="text-overlay4">
                    <h1>Texto sobre la Imagen 1</h1>
                    <p>Descripción adicional para la Imagen 1</p>
                </div>
            </div>
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

    <section class="footer-section">
        <div class="container" style="padding-bottom:5rem;">
            <img src="./img/star.png" alt="" class="star star-s5">
            <div class="left-side">
                <div class="title">
                    <h1>stay up-to date</h1>
                    <h2>With everything precious metals</h2>
                </div>
            </div>
            <div class="right-side">
                <p class="txt">
                    Replenish <span>your portfolio</span>
                    with gold and silver <span>to diversity</span>
                    your investment portfolio.
                </p>
            </div>
        </div>

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