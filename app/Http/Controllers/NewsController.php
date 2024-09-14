<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        // Llama a las APIs de noticias
        $nflNews = $this->getNFLNews();
        $skateNews = $this->getSkateNews();

        // Limita a 20 noticias de cada tipo
        $nflNews = array_slice($nflNews, 0, 6);
        $skateNews = array_slice($skateNews, 0, 6);

        return view('news', compact('nflNews', 'skateNews'));
    }

    private function getNFLNews()
    {
        // Utiliza una API para obtener noticias de la NFL
        $response = Http::get('https://newsapi.org/v2/everything', [
            'q' => 'NFL',
            'apiKey' => '5de002f257d94c9d92cbb417abc51e78', // Reemplaza con tu clave de NewsAPI
        ]);

        return $response->json()['articles'] ?? [];
    }

    private function getSkateNews()
    {
        // Utiliza una API para obtener noticias de Skate
        $response = Http::get('https://newsapi.org/v2/everything', [
            'q' => 'skateboarding',
            'apiKey' => '5de002f257d94c9d92cbb417abc51e78', // Reemplaza con tu clave de NewsAPI
        ]);

        return $response->json()['articles'] ?? [];
    }
}
