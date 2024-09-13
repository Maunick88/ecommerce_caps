@include('headerFooter')   

<body class="bg-star">
<br>
    <br>
<div class="barra1">
    <h2>Valores</h2>
</div>
    <section class="section-wrapper">
           <!-- Swiper Container -->
<div class="swiper-container">
    <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/autodic.webp') }}">
                <div class="value-content">
                    <h2 class="value-title">Autodidactismo</h2>
                    <p class="value-description">Promover el aprendizaje autónomo y proactivo, explorando nuevas tecnologías y herramientas de desarrollo web de manera independiente. Este valor se aplica investigando, practicando y resolviendo problemas por cuenta propia.</p>
                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/innova.webp') }}">
                <div class="value-content">
                    <h2 class="value-title">Innovación en el aprendizaje</h2>
                    <p class="value-description">Adoptar tecnologías como Laravel y JavaScript para crear una solución innovadora de e-commerce, probando nuevas formas de abordar el desarrollo de software y diseño web. Este valor se refleja en la experimentación y el uso de funcionalidades avanzadas en el proyecto.</p>
                </div>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/perser.webp') }}">
                <div class="value-content">
                    <h2 class="value-title">Perseverancia</h2>
                    <p class="value-description">Afrontar los desafíos técnicos y académicos con determinación, aprendiendo de los errores y buscando soluciones hasta alcanzar los objetivos del proyecto. Este valor se aplica en la constancia y el esfuerzo continuo para resolver problemas.</p>
                </div>
            </div>
        </div>
        <!-- Continúa añadiendo todas las slides de la misma manera -->
        <!-- Slide 4 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/respon.webp') }}">
                <div class="value-content">
                    <h2 class="value-title">Responsabilidad personal</h2>
                    <p class="value-description">Asumir la responsabilidad del desarrollo completo del proyecto, desde la planificación hasta la implementación y el análisis de resultados, cumpliendo con los plazos establecidos por la materia. Este valor se refleja en la gestión del tiempo y la organización del trabajo.</p>
                </div>
            </div>
        </div>
        <!-- Slide 5 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/curiosidad.webp') }}" alt="Curiosidad">
                <div class="value-content">
                    <h2 class="value-title">Curiosidad</h2>
                    <p class="value-description">Fomentar una actitud de curiosidad y deseo de entender en profundidad las herramientas y tecnologías empleadas en el proyecto. Este valor se aplica investigando continuamente y haciendo preguntas críticas sobre cada etapa del desarrollo.</p>
                </div>
            </div>
        </div>
        <!-- Slide 6 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/docum.webp') }}" alt="Documentación exhaustiva">
                <div class="value-content">
                    <h2 class="value-title">Documentación exhaustiva</h2>
                    <p class="value-description">Documentar cada paso del proyecto de manera detallada para facilitar el aprendizaje personal y potencialmente ayudar a otros estudiantes. Este valor se refleja en la creación de una guía o blog sobre el desarrollo y los desafíos superados.</p>
                </div>
            </div>
        </div>
        <!-- Slide 7 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/flexi.webp') }}" alt="Flexibilidad">
                <div class="value-content">
                    <h2 class="value-title">Flexibilidad</h2>
                    <p class="value-description">Adaptarse a nuevas herramientas, técnicas y métodos de aprendizaje que surjan durante el proyecto, ajustando el enfoque según sea necesario. Este valor se aplica siendo abierto a cambiar de estrategia o herramientas si resulta más efectivo.</p>
                </div>
            </div>
        </div>
        <!-- Slide 8 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/detalle.webp') }}" alt="Orientación al detalle">
                <div class="value-content">
                    <h2 class="value-title">Orientación al detalle</h2>
                    <p class="value-description">Prestar atención a los pequeños detalles que afectan la calidad y la funcionalidad del e-commerce, desde el código hasta el diseño de la interfaz. Este valor se refleja en la revisión cuidadosa del código y el diseño visual del sitio.</p>
                </div>
            </div>
        </div>
        <!-- Slide 9 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/profesora.webp') }}" alt="Colaboración con el profesor">
                <div class="value-content">
                    <h2 class="value-title">Colaboración con profesora</h2>
                    <p class="value-description">Utilizar de manera efectiva la orientación del profesor para mejorar el proyecto, buscando activamente retroalimentación y aplicándola de manera constructiva. Este valor se aplica a través de reuniones regulares y comunicación abierta.</p>
                </div>
            </div>
        </div>
        <!-- Slide 10 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/pasion.webp') }}" alt="Pasión por el desarrollo web">
                <div class="value-content">
                    <h2 class="value-title">Pasión por el desarrollo web</h2>
                    <p class="value-description">Demostrar entusiasmo y dedicación por aprender y aplicar habilidades de desarrollo web en un entorno de e-commerce, usando el proyecto como una oportunidad para crecer profesionalmente. Este valor se refleja en el compromiso y la energía invertidos en cada fase del proyecto.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Botones de navegación del carrusel -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
   </section>


@include('footerStar')

<script src="{{ asset('js/script.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
<!-- Scripts de Swiper.js -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper-container', {
            loop: true, // Habilita el carrusel infinito
            autoplay: {
                delay: 4000, // Cambia de slide cada 4 segundos
                disableOnInteraction: false, // Continúa después de la interacción del usuario
            },
            slidesPerView: 3, // Muestra 3 tarjetas al mismo tiempo
            spaceBetween: 20, // Espacio entre las tarjetas
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 4, // Muestra 2 slides en pantallas medianas
                },
                576: {
                    slidesPerView: 1, // Muestra 1 slide en pantallas pequeñas
                }
            }
        });
    });
</script>

</body>


