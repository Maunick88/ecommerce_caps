<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MauCap</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}">
</head>
<header>
        <div class="barra">
            <div class="text-wrapper">
                <span id="cambio-texto">DISFRUTA <strong>ENVÍO GRATIS</strong> A PARTIR DE <strong>$649</strong> </span>
            </div>
        </div>
        <nav class="nav-bar">
            <a href="{{ url('./') }}">   
            <div class="logo">
            <span class="icon-text"> 
            <img class="star" src="{{ asset('img/logo.png') }}" alt="">
                MauCap</span>
            </div>
            </a>
            <ul class="menu-items">
                <li class="dropdown">
                    <a href="{{ url('/baseball/9,10,11,12,8,7') }}">
                    <span class="icon-text">
                        <img src="{{ asset('img/mlb.png') }}" alt="Baseball" class="icon">
                        MLB
                    </span>
                    </a>
                    <ul class="dropdown-content">
                        <li>
                            <a href="{{ url('/mlb/dodgers') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/ladodgers.png') }}" alt="Baseball" class="icon">
                                    Los Angeles Dodgers
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/mlb/mets') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/mets.png') }}" alt="Baseball" class="icon">
                                    New York Mets
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/mlb/redsox') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/bostonsox.png') }}" alt="Baseball" class="icon">
                                    Boston Red Sox
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/mlb/marlins') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/miami.png') }}" alt="Baseball" class="icon">
                                    Miami Marlins
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/mlb/yankees') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/yankees.png') }}" alt="Baseball" class="icon">
                                    Yankees
                                </span>
                            </a>
                        </li>
                        <!-- Add more items as needed -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{ url('/americano/13,14,15,16,17') }}">
                    <span class="icon-text">
                        <img src="{{ asset('img/nfl.png') }}" alt="Basketball" class="icon">
                        NFL
                    </span>
                    </a>
                    <ul class="dropdown-content">
                        <li>
                            <a href="{{ url('/nfl/chiefs') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/kansas.png') }}" alt="Baseball" class="icon">
                                    Kansas City Chiefs
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/nfl/eagles') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/eagles.png') }}" alt="Baseball" class="icon">
                                    Philadelphia Eagles
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/nfl/patriots') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/patriots.png') }}" alt="Baseball" class="icon">
                                    New England Patriots
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/nfl/cowboys') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/cowboys.png') }}" alt="Baseball" class="icon">
                                    Dallas Cowboys
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/nfl/steelers') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/steelers.png') }}" alt="Baseball" class="icon">
                                    Pittsburgh Steelers
                                </span>
                            </a>
                        </li>
                        <!-- Add more items as needed -->
                    </ul>
                </li>
                <li class="dropdown">
                <a href="{{ url('/basket/11,18,19,22,23') }}">
                <span class="icon-text">
                        <img src="{{ asset('img/nba.png') }}" alt="Fútbol" class="icon">
                        NBA
                    </span>
                    </a>
                    <ul class="dropdown-content">
                        <li>
                            <a href="{{ url('/nba/lakers') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/lakers.png') }}" alt="Baseball" class="icon">
                                    Los Angeles Lakers
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/nba/bulls') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/bulls.png') }}" alt="Baseball" class="icon">
                                    Chicago Bulls
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/nba/timber') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/raptors.png') }}" alt="Baseball" class="icon">
                                    Timberwolves
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/nba/grizzlies') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/grizzlies.png') }}" alt="Baseball" class="icon">
                                    Memphis Grizzlies
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/nba/hornets') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/hornets.png') }}" alt="Baseball" class="icon">
                                    Charlotte Hornets
                                </span>
                            </a>
                        </li>
                        <!-- Add more items as needed -->
                    </ul>
                </li>
                <li class="dropdown">
                <a href="{{ url('/beis/24,25,26,27,28') }}">
                    <span class="icon-text">
                        <img src="{{ asset('img/lmb.png') }}" alt="Fórmula 1" class="icon">
                        LMB
                        </span>
                    </a>
                    <ul class="dropdown-content">
                        <li>
                            <a href="{{ url('/lmb/diablos') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/diablos.png') }}" alt="Baseball" class="icon">
                                    Diablos Rojos del México
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/lmb/pericos') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/pericos.png') }}" alt="Baseball" class="icon">
                                    Pericos de Puebla
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/lmb/tigres') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/tigresqr.png') }}" alt="Baseball" class="icon">
                                    Tigres de Quintana Roo
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/lmb/piratas') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/piratas.png') }}" alt="Baseball" class="icon">
                                    Piratas de Campeche
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/lmb/sultanes') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/sultanes.png') }}" alt="Baseball" class="icon">
                                    Sultanes de Monterrey
                                </span>
                            </a>
                        </li>
                        <!-- Add more items as needed -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{ url('/fut/29,30,31,33,34') }}">
                    <span class="icon-text">
                        <img src="{{ asset('img/fut.png') }}" alt="México" class="icon">
                        Futbol
                    </span>
                    </a>
                    <ul class="dropdown-content">
                        <li>
                            <a href="{{ url('/fifa/chivas') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/chivas.png') }}" alt="Baseball" class="icon">
                                    Chivas de Guadalajara
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/fifa/azul') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/cruzazul.png') }}" alt="Baseball" class="icon">
                                    Cruz Azul
                                </span>
                            </a>
                        </li>
                        <li>
                        <a href="{{ url('/fifa/america') }}">
                            <span class="icon-text">
                                    <img src="{{ asset('img/america.png') }}" alt="Baseball" class="icon">
                                    América
                                </span>
                            </a>
                        </li>
                        <li>
                        <a href="{{ url('/fifa/uanl') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/tigres.png') }}" alt="Baseball" class="icon">
                                    Tigres de la UANL
                                </span>
                            </a>
                        </li>
                        <li>
                        <a href="{{ url('/fifa/rayados') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/rayados.png') }}" alt="Baseball" class="icon">
                                    Rayados de Monterrey
                                </span>
                            </a>
                        </li>
                        <!-- Add more items as needed -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{ url('/race/35,37') }}">
                    <span class="icon-text">
                        <img src="{{ asset('img/f1.png') }}" alt="México" class="icon">
                        Deporte motor
                    </span>
                    </a>
                    <ul class="dropdown-content">
                        <li>
                            <a href="{{ url('/motor/redbull') }}">
                                <span class="icon-text">
                                    <img src="{{ asset('img/redbull.png') }}" alt="Baseball" class="icon">
                                    Oracle Red Bull Racing
                                </span>
                            </a>
                        </li>
                        <li>
                        <a href="{{ url('/motor/mclaren') }}">
                            <span class="icon-text">
                                    <img src="{{ asset('img/mclaren.png') }}" alt="Baseball" class="icon">
                                    McLaren F1 Team
                                </span>
                            </a>
                        </li>                
                        <!-- Add more items as needed -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{ url('/mexico/38') }}">
                    <span class="icon-text">
                        <img src="{{ asset('img/mex.png') }}" alt="México" class="icon">
                        México
                    </span>
                    </a>
                    <ul class="dropdown-content">
                        <li>
                            <a href="{{ url('/motor/mex') }}">
                                <span class="icon-text">
                                    México M
                                </span>
                            </a>
                        </li>            
                        <!-- Add more items as needed -->
                    </ul>
                </li>
            </ul>
            <ul class="menu-items">

            @if (Route::has('login'))                                
                                @auth
                                    <!-- Mostrar Dashboard solo si el usuario es admin -->
                                    @if (auth()->user()->role === 'admin')
                                        <li>
                                            <a href="{{ url('/dashboard') }}">
                                                Dashboard
                                            </a>
                                        </li>
                                    @endif
                                    <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                    <i class="fas fa-user-shield"></i> <!-- Ícono de usuario con escudo -->
                                    </x-dropdown-link>  
                                    <li>
                                            <a href="{{ url('/cart') }}">
                                            <i class="fas fa-shopping-cart"></i> <!-- Ícono de carrito de Font Awesome -->
                                            </a>
                                        </li>
                                            <!-- Enlace de Logout -->
                                        <li>
                                        <a href="{{ route('logout') }}" 
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                        > <span class="icon-text">
                                        <i class="fas fa-sign-out-alt"></i> <!-- Ícono de cerrar sesión -->
                                        </span>
                                        </a>
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @else
                                    <li>
                                        <a
                                            href="{{ route('login') }}"
                                            > <span class="icon-text">
                                            <i class="fas fa-user-circle"></i> <!-- Ícono de usuario en un círculo -->
                                            </span>
                                        </a>
                                    </li>

                                    @if (Route::has('register'))
                                        <li>
                                            <a
                                                href="{{ route('register') }}"
                                                > <span class="icon-text">
                                                <i class="fas fa-user-plus"></i> <!-- Ícono de usuario con signo más, ideal para "Registrar" o "Crear cuenta" -->
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                @endauth
                        @endif
            </ul>
        </nav>

       

        <!-- Resto del contenido de la página -->
</header>