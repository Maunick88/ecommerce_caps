<!-- resources/views/cart.blade.php -->
<style>
    body {
        font-family: 'Georgia', serif;
        background-color: #f4f1e5; /* Color base similar al papel envejecido */
        background-image: url('{{ asset('img/news.png') }}'); /* Ruta a tu textura de papel */
        background-size: cover;
        background-repeat: repeat; /* Cambia a repeat para que la textura se repita */
        background-attachment: fixed; /* Hace que el fondo permanezca fijo mientras se hace scroll */
        color: #333;
        line-height: 1.6;
        padding: 20px;
    }

    .newspaper-container {
        max-width: 1500; /* Reduce el ancho máximo para una sola columna más estrecha */
        margin: 20px auto;
        padding: 30px;
        background-color: rgba(255, 255, 255, 0.95); /* Fondo semitransparente para simular papel */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .newspaper-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .newspaper-header h1 {
        font-size: 2.5rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #333;
        border-bottom: 2px solid #444;
        padding-bottom: 10px;
    }

    .content {
        font-size: 1rem;
        color: #333;
        margin-top: 20px;
        display: flex;
        flex-direction: column; /* Alinea el contenido en una sola columna */
        text-align: justify; /* Justifica todo el texto */
    }

    h2 {
        font-size: 1.5rem;
        font-weight: bold;
        margin-top: 30px;
        margin-bottom: 15px;
        color: #b22222; /* Color rojo oscuro para los subtítulos */
        border-bottom: 1px solid #444;
        padding-bottom: 5px;
        text-align: left; /* Encabezados alineados a la izquierda */
    }

    p, ul {
        margin-bottom: 15px;
        text-align: justify; /* Justifica todo el texto de los párrafos y listas */
    }

    ul {
        padding-left: 20px; /* Añade espacio a la izquierda para las listas */
    }

    @media (max-width: 768px) {
        .newspaper-container {
            padding: 15px;
            max-width: 95%;
        }

        .newspaper-header h1 {
            font-size: 2rem;
        }

        h2 {
            font-size: 1.25rem;
        }
    }
</style>
<body>
        <!-- Botón de logo que redirige a index -->
        <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ url('/') }}" style="text-decoration: none;">
            <img src="{{ asset('img/logo.png') }}" alt="Logo de tu Empresa" style="width: 100px; height: auto;">
        </a>
    </div>
    <div class="newspaper-container">
        <header class="newspaper-header">
            <h1>Política de Privacidad</h1>
        </header>

        <div class="content">
            <p>Última actualización: [Fecha]</p>
            
            <p>En [Tu Empresa], valoramos su privacidad y nos comprometemos a proteger su información personal. Esta política de privacidad describe cómo recopilamos, usamos y compartimos su información cuando utiliza nuestro sitio web y servicios.</p>

            <h2>Información que Recopilamos</h2>
            <p>Podemos recopilar la siguiente información cuando utiliza nuestro sitio web:</p>
            <ul>
                <li>Información de contacto, como su nombre, dirección de correo electrónico, y número de teléfono.</li>
                <li>Datos de uso, como su dirección IP, tipo de navegador, y páginas visitadas.</li>
                <li>Información que proporciona directamente, como cuando se registra, completa formularios o participa en encuestas.</li>
            </ul>

            <h2>Uso de su Información</h2>
            <p>Utilizamos su información para los siguientes propósitos:</p>
            <ul>
                <li>Proporcionar y mejorar nuestros servicios.</li>
                <li>Comunicarle información importante, como actualizaciones de productos o cambios en nuestros términos de servicio.</li>
                <li>Personalizar su experiencia en nuestro sitio web.</li>
                <li>Cumplir con las leyes y regulaciones aplicables.</li>
            </ul>

            <h2>Compartir su Información</h2>
            <p>No compartiremos su información personal con terceros, excepto en los siguientes casos:</p>
            <ul>
                <li>Con su consentimiento explícito.</li>
                <li>Para cumplir con las leyes o responder a solicitudes legales.</li>
                <li>Para proteger la seguridad, derechos, o propiedad de nuestra empresa o nuestros usuarios.</li>
            </ul>

            <h2>Seguridad de su Información</h2>
            <p>Tomamos medidas razonables para proteger su información personal contra el acceso no autorizado, alteración, divulgación o destrucción. Sin embargo, ningún método de transmisión por Internet o método de almacenamiento electrónico es completamente seguro.</p>

            <h2>Cambios en esta Política</h2>
            <p>Podemos actualizar esta política de privacidad periódicamente para reflejar cambios en nuestras prácticas. Le notificaremos sobre cualquier cambio importante publicando la nueva política en nuestro sitio web.</p>

            <h2>Contáctenos</h2>
            <p>Si tiene alguna pregunta sobre esta política de privacidad, por favor contáctenos a través de [Tu información de contacto].</p>
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js" ></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
