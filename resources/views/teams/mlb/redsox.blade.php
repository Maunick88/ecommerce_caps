@include('header')  
    <body>
    <section>
        <div class="container">
            <div class="left-side">
                <img src="{{ asset('img/bostonsox.png') }}" class="star" alt="">
                <div class="title">
                    <h1>Boston Red Sox</h1>
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
            <div class="card card-1">
                <div class="rotation">
                    <img src="{{ asset('img/capla1.png') }}" alt="" class="img-card image">
                </div>
                <div class="color">yellow</div>
                <span>585 standard gold</span>
            </div>
            <div class="card card-2">
                <div class="rotation">
                    <img src="{{ asset('img/capla2.png') }}" alt="" class="img-card image">
                </div>
                <div class="color">white</div>
                <span>585 standard gold</span>
            </div>
            <div class="card card-3">
                <div class="rotation">
                    <img src="{{ asset('img/capla3.png') }}" alt="" class="img-card image">
                </div>
                <div class="color">pink</div>
                <span>750 standard gold</span>
            </div>
        </div>
    </section>
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