@include('headerFooter')   

<body class="bg-star">
    <br>
    <br>
<div class="barra1">
    <h2>Objetivos</h2>
</div>
    <section class="section-wrapper">

           <!-- Swiper Container -->
<div class="swiper-container">
    <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/obj1.webp') }}">
                <div class="value-content">
                    <h2 class="value-title">Aprender a utilizar Laravel y JavaScript de manera práctica</h2>
                    <p class="value-description">Implementar las funcionalidades esenciales del e-commerce (como gestión de productos, usuarios y pagos) utilizando estas herramientas en un período de 3 meses.</p>
                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/obj2.webp') }}">
                <div class="value-content">
                    <h2 class="value-title">Desarrollar un e-commerce funcional</h2>
                    <p class="value-description">Crear un sitio web de e-commerce que permita a los usuarios navegar, seleccionar y comprar gorras en línea, cubriendo todos los aspectos desde el front-end hasta el back-end.</p>
                </div>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/obj3.webp') }}">
                <div class="value-content">
                    <h2 class="value-title">Optimizar el rendimiento del sitio web</h2>
                    <p class="value-description">Mejorar la velocidad y la eficiencia del sitio mediante técnicas de optimización de código y uso de bases de datos eficientes en los próximos 2 meses.
                    </p>
                </div>
            </div>
        </div>
        <!-- Continúa añadiendo todas las slides de la misma manera -->
        <!-- Slide 4 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/obj4.webp') }}">
                <div class="value-content">
                    <h2 class="value-title">Documentar el proceso de desarrollo</h2>
                    <p class="value-description">Crear una guía detallada del proyecto, incluyendo problemas encontrados, soluciones aplicadas y aprendizajes clave, para entregar como complemento al trabajo final.
                    </p>
                </div>
            </div>
        </div>
        <!-- Slide 5 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/obj5.webp') }}" alt="Curiosidad">
                <div class="value-content">
                    <h2 class="value-title">Recibir y aplicar retroalimentación del profesor</h2>
                    <p class="value-description">Presentar avances periódicos del proyecto al profesor y aplicar sus sugerencias para mejorar el e-commerce, completando al menos 3 sesiones de revisión.
                    </p>
                </div>
            </div>
        </div>
        <!-- Slide 6 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/obj6.webp') }}" alt="Documentación exhaustiva">
                <div class="value-content">
                    <h2 class="value-title">Realizar pruebas de usabilidad</h2>
                    <p class="value-description">Obtener retroalimentación sobre la experiencia del usuario (UX) de al menos 5 personas para realizar mejoras en la interfaz y funcionalidad del sitio.
                    </p>
                </div>
            </div>
        </div>
        <!-- Slide 7 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/obj7.webp') }}" alt="Flexibilidad">
                <div class="value-content">
                    <h2 class="value-title">Implementar medidas de seguridad básica</h2>
                    <p class="value-description">Asegurar que el sitio cumpla con las mejores prácticas de seguridad web, protegiendo los datos de los usuarios y transacciones en línea.
                    </p>
                </div>
            </div>
        </div>
        <!-- Slide 8 -->
        <div class="swiper-slide">
            <div class="value-card">
                <img src="{{ asset('img/obj8.webp') }}" alt="Orientación al detalle">
                <div class="value-content">
                    <h2 class="value-title">Preparar una presentación final del proyecto</h2>
                    <p class="value-description">Crear una presentación para exponer el proceso de desarrollo, los logros, los desafíos superados y los aprendizajes obtenidos, que será entregada al profesor al final del curso.
                    </p>
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


