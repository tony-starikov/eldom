<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        rel="stylesheet"
    />

    <title>@yield('title')</title>
</head>
<body>


<div class="container-fluid px-0">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('main') }}"><span class="fs-4 fw-bold text-primary">ELECTRO-DOM</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('main') }}">ГЛАВНАЯ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">ДОСТАВКА</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">КОНТАКТЫ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            КАТАЛОГ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach(\App\Category::all() as $category)
                                <li><a class="dropdown-item" href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->name) }}</a></li>
                                @foreach($category->subcategories as $subcategory)
                                    <li><a class="dropdown-item" href="{{ route('showSubcategory', [$category->slug, $subcategory->slug]) }}">| {{ mb_strtoupper($subcategory->name) }}</a></li>
                                @endforeach
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <!-- Right links -->
                <ul class="navbar-nav d-flex flex-row">
                    <!-- Icons -->
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="tel:+38 (048) 772-24-08">
                            <span><i class="fas fa-phone"></i></span>
                            <span class="clearfix d-none d-sm-inline-block">+38 (048) 772-24-08</span>
                        </a>
                    </li>
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="tel:+38 (067) 141-73-18">
                            <span><i class="fas fa-phone"></i></span>
                            <span class="clearfix d-none d-sm-inline-block">+38 (067) 141-73-18</span>
                        </a>
                    </li>
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="{{ route('basket') }}">
{{--                            @if($quantity)<span class="badge badge-pill bg-danger">{{ $quantity }}</span>@endif--}}
                            <span><i class="fas fa-shopping-cart"></i></span>
                            <span class="clearfix d-none d-sm-inline-block">КОРЗИНА</span>
                        </a>
                    </li>
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>

                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <!-- Icon dropdown -->
                    <li class="nav-item dropstart">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @auth()

                                @if(Auth::user()->isAdmin())
                                    <a class="dropdown-item" href="{{ route('adminHome') }}">ADMIN</a>
                                @else
                                    <a class="dropdown-item" href="{{ route('userHome') }}">КАБИНЕТ</a>
                                @endif

                                <form class="d-inline" id="logout-form" action="{{ url('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">ВЫЙТИ</button>
                                </form>

                            @endauth

                            @guest()
                                <li><a class="dropdown-item" href="{{ route('login') }}">ВОЙТИ</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}">РЕГИСТРАЦИЯ</a></li>
                            @endguest
                        </ul>
                    </li>
                </ul>
                <!-- Right links -->
            </div>
        </div>
    </nav>

    <main style="min-height: 50vh" role="main">
        @if(session()->has('message'))
            <p class="alert alert-success text-center text-uppercase">{{ session()->get('message') }}</p>
        @endif

        @yield('main')
    </main>

</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
