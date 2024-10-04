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
            <h1>Acerca De</h1>
        </header>

        <div class="content">
<p>Soy Mauricio Nicolás, estudiante de la Licenciatura en Informática. Actualmente estoy desarrollando MauCap, un ecommerce dedicado a la venta de gorras de equipos de varios deportes. Este proyecto comenzó como parte de una materia de Comercio Electrónico en mi universidad, y aunque todavía estamos en fase de desarrollo y no hemos realizado ventas, la idea ya está tomando forma.</p>
    
    <h2>Fundación de la empresa:</h2>
    <p><strong>Fecha:</strong> MauCap comenzó oficialmente en octubre de 2024.</p>
    <p><strong>¿Quién la funda?:</strong> Yo, Mauricio Nicolás, soy el fundador de MauCap.</p>
    <p><strong>¿Dónde?:</strong> El proyecto lo estoy gestionando desde Cuautitlán, Estado de México, aprovechando mi cercanía a varias instituciones educativas y áreas con alto interés en deportes.</p>
    <p><strong>¿Por qué la ubicación?:</strong> La ubicación es ideal para captar a jóvenes y estudiantes que practican deportes o son seguidores de diferentes equipos, ya que Cuautitlán es un área donde la actividad deportiva es bastante frecuente.</p>

    <h2>Historia:</h2>
    <p>El concepto de MauCap surgió de una charla que tuve con algunos compañeros de clase sobre lo mucho que nos gusta el deporte y cómo los accesorios como las gorras siempre son un elemento esencial para los aficionados. Al principio, pensé en crear una tienda online que vendiera gorras personalizadas, pero luego la idea evolucionó a especializarnos en gorras de equipos de varios deportes, como fútbol, básquetbol y béisbol, que son muy populares en México.</p>

    <h2>Anécdota:</h2>
    <p>Recuerdo una conversación con mi profesor de Comercio Electrónico, quien me animó a enfocarme en un nicho más específico. Fue entonces cuando pensé en combinar mi pasión por el deporte y mi interés en el ecommerce, y así fue como decidí que MauCap se especializaría en gorras de equipos deportivos.</p>

    <h2>¿Cómo surgió la empresa o plan de negocio?</h2>
    <p>El plan de negocio de MauCap surgió en mis clases de Comercio Electrónico. Mientras desarrollaba la idea, me di cuenta de que había un mercado potencial entre estudiantes y jóvenes apasionados por los deportes, que buscan representar a sus equipos favoritos a través de productos accesibles y de calidad como nuestras gorras.</p>

    <h2>¿Qué razón los motivó a asociarse?</h2>
    <p>Hasta el momento, soy el único fundador de MauCap, pero la razón principal que me motiva es combinar mi interés por la tecnología, el ecommerce y el deporte. Me encanta la idea de ofrecer productos que conecten a las personas con sus pasiones deportivas.</p>

    <h2>¿Dónde viven los fundadores, hobbies?</h2>
    <p>Vivo en Cuautitlán, Estado de México, y mis hobbies son el desarrollo de software, jugar fútbol y el diseño gráfico. Todo esto ha influido mucho en la visión que tengo para MauCap, ya que quiero que sea una marca que refleje tanto mi pasión por el deporte como mi capacidad técnica.</p>

    <h2>Datos relevantes que la convierten en una buena empresa:</h2>
    <ul>
        <li>MauCap ofrece gorras oficiales de equipos de diversos deportes, lo que lo convierte en un ecommerce especializado.</li>
        <li>Nos dirigimos a un público joven y dinámico, que busca artículos de moda deportiva para expresar su afición por sus equipos favoritos.</li>
        <li>A futuro, queremos integrar herramientas tecnológicas que permitan la personalización de las gorras, algo innovador en este tipo de ecommerce.</li>
        <li>Utilizamos un modelo de negocio digital, lo que nos da flexibilidad y la capacidad de llegar a clientes de cualquier parte de México.</li>
        <li>El deporte es una tendencia creciente, por lo que siempre habrá demanda de productos relacionados.</li>
    </ul>

    <h2>Experiencias con otros clientes:</h2>
    <p>Aunque aún no hemos hecho ventas oficiales, hemos recibido mucho interés de compañeros de la universidad y amigos. Algunos ya me han preguntado si pueden preordenar gorras de sus equipos favoritos. También estoy planeando lanzar una encuesta entre estudiantes para obtener retroalimentación sobre qué equipos y estilos de gorras les gustaría ver en la tienda.</p>

    <h2>Ventajas o beneficios que tiene el cliente al solicitar sus servicios o comprar sus productos:</h2>
    <ul>
        <li>Gorras de equipos de varios deportes, disponibles en un solo lugar.</li>
        <li>Acceso a productos exclusivos que no se encuentran fácilmente en tiendas físicas.</li>
        <li>Un servicio al cliente cercano, donde realmente escuchamos a los aficionados y sus necesidades.</li>
        <li>Posibilidad de personalización futura, para que los fanáticos puedan agregar toques únicos a sus gorras.</li>
        <li>Precios competitivos y productos de alta calidad que duran mucho tiempo.</li>
    </ul>
            </p>
            </div>
    </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js" ></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
