<!-- resources/views/cart.blade.php -->
@include('header')
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
    }

    .newspaper-container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.9); /* Aumenta la opacidad del fondo */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .newspaper-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .newspaper-header h1 {
        font-size: 3rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #333;
        border-bottom: 2px solid #444;
        padding-bottom: 10px;
    }

    .news-section {
        /* margin-bottom: 40px; */
    }

    .section-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
        border-bottom: 1px solid #444;
        padding-bottom: 5px;
        text-transform: uppercase;
        color: #333;
    }

    .news-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .news-article {
        flex: 1 1 calc(33.333% - 20px); /* Ajusta el tamaño de las columnas */
        background-color: rgba(255, 255, 255, 0.95); /* Aumenta la opacidad del fondo */
        border: 1px solid #ddd;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .news-article:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .article-image {
        width: 100%;
        height: auto;
        margin-bottom: 15px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .article-title {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .article-description {
        font-size: 1rem;
        margin-bottom: 15px;
    }

    .read-more {
        font-size: 1rem;
        color: #0056b3;
        text-decoration: none;
        font-weight: bold;
        align-self: flex-start;
    }

    .read-more:hover {
        text-decoration: underline;
        color: #003f7f;
    }

    @media (min-width: 768px) {
        .news-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .news-article {
            margin-bottom: 20px;
        }
    }
</style>


<body>
    <div class="newspaper-container">
        <header class="newspaper-header">
            <h1>Noticias de Hoy</h1>
        </header>

        <section class="news-section">
            <h2 class="section-title">Noticias de la NFL</h2>
            <div class="news-row">
                @foreach ($nflNews as $news)
                    <article class="news-article">
                        <img src="{{ $news['urlToImage'] }}" class="article-image" alt="...">
                        <div class="article-content">
                            <h3 class="article-title">{{ $news['title'] }}</h3>
                            <p class="article-description">{{ \Illuminate\Support\Str::limit($news['description'], 150) }}</p>
                            <a href="{{ $news['url'] }}" class="read-more" target="_blank">Leer más</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="news-section">
            <h2 class="section-title">Noticias de Skateboarding</h2>
            <div class="news-row">
                @foreach ($skateNews as $news)
                    <article class="news-article">
                        <img src="{{ $news['urlToImage'] }}" class="article-image" alt="...">
                        <div class="article-content">
                            <h3 class="article-title">{{ $news['title'] }}</h3>
                            <p class="article-description">{{ \Illuminate\Support\Str::limit($news['description'], 150) }}</p>
                            <a href="{{ $news['url'] }}" class="read-more" target="_blank">Leer más</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
    @include('footerStar')   


<!-- Incluye SweetAlert desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js" ></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>