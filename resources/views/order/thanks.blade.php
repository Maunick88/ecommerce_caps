@include('headerFooter')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
    .container-custom {
        max-width: 1100px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
        text-align: center;
    }

    .thank-you-message {
        font-size: 36px;
        font-weight: bold;
        color: #007bff;
        margin-top: 20px;
    }

    .sub-message {
        font-size: 24px;
        color: #333;
        margin-top: 10px;
    }
</style>

<body>
    <div class="container mt-4">
        <div class="right-side pyramid">
            <img src="{{ asset('img/logo.png') }}" alt="" class="gold glow image">
        </div>

        <!-- Contenedor del mensaje de agradecimiento -->
        <div class="container-custom">
            <h1 class="thank-you-message">¡Gracias por tu compra!</h1>
            <p class="sub-message">Tu transacción ha sido exitosa.</p>
        </div>
    </div>

    <!-- Incluir la biblioteca de confeti -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>

    <script>
        // Función para lanzar confeti
        function lanzarConfeti() {
            confetti({
            particleCount: 500,   // Número de partículas
            spread: 360,           // Ángulo de dispersión de las partículas
            origin: { y: .7 },   // Punto de origen desde donde aparece el confeti
            scalar: 3           // Escala de tamaño de las partículas (1.5 es más grande, ajusta según prefieras)
        });
    }
        // Ejecutar la función de confeti al cargar la página
        window.onload = function() {
            lanzarConfeti();
            // Repetir la animación de confeti
            // setInterval(lanzarConfeti, 5000); // Confeti cada 2 segundos (opcional, puedes ajustar)
        };
    </script>
</body>
