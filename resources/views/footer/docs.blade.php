@include('headerFooter')   
<body class="bg-star">
    <div class="barra1">
    <h1 class="main-title">Documento</h1>

    </div>

<section class="section-wrapper">
    <!-- Usar un iframe para mostrar el PDF -->
    <iframe src="{{ asset('pdf/Documentación MauCap.pdf') }}" width="100%" height="600px"></iframe>

    </section>
</body>
@include('footerStar')   

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js" ></script>
<script src="{{ asset('js/script.js') }}"></script>
</html>
