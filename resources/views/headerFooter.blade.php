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
    <link rel="stylesheet" href="{{ asset('css/style_footer.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                    <x-dropdown-link :href="route('profile.edit')" class="perfil-link">
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