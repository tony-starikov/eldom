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

    <style>
        /* The Overlay (background) */
        .overlay {
            /* Height & width depends on how you want to reveal the overlay (see JS below) */
            display: none;
            height: 100%;
            width: 100%;
            position: fixed; /* Stay in place */
            z-index: 100; /* Sit on top */
            left: 0;
            top: 0;
            padding: 20px;
            background-color: rgba(0,0,0, 1); /* Black w/opacity */
            overflow-x: hidden; /* Disable horizontal scroll */
            transition: 0.5s; /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
        }
    </style>

    <title>@yield('title')</title>
</head>
<body>

<!-- The overlay -->
<div id="myNav" class="overlay">

    <div class="row">
        <a href="javascript:void(0)" class="text-decoration-none text-white" onclick="closeNav()"><h1>&times;</h1></a>
    </div>

    <section class="d-none d-xl-block">

        <div class="row text-white">
            <div class="col-12">

                <h5>КАТЕГОРИИ</h5>

                <div class="row" style="background-color: rgba(0,0,0, 0.9);">

                    @foreach(\App\Category::all() as $category)

                        <div class="col-3 my-3" style="background-color: rgba(0,0,0, 0.9);">

                            <ul class="list-group"style="background-color: rgba(0,0,0, 0.9);">

                                <li class="list-group-item border-0" style="background-color: rgba(0,0,0, 0.9);">

                                    <a class="text-decoration-none text-white" style="background-color: rgba(0,0,0, 0.9);" href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->name) }}</a>

                                    <ul class="list-group" style="background-color: rgba(0,0,0, 0.9);">

                                        @foreach($category->subcategories as $subcategory)

                                            <li class="list-group-item border-0" style="background-color: rgba(0,0,0, 0.9);">
                                                <a class="text-decoration-none text-white" style="background-color: rgba(0,0,0, 0.9);" href="{{ route('showSubcategory', [$category->slug, $subcategory->slug]) }}">
                                                    | {{ mb_strtoupper($subcategory->name) }}
                                                </a>
                                            </li>

                                        @endforeach

                                    </ul>

                                </li>

                            </ul>

                        </div>

                    @endforeach

                </div>


            </div>
        </div>

    </section>

{{--    ////////////////////////////////////--}}

    <section class="d-none d-md-block d-xl-none">

        <div class="row text-white">
            <div class="col-12">

                <a class="text-white text-decoration-none" href="{{ route('main') }}"><h5>ГЛАВНАЯ</h5></a>
                <a class="text-white text-decoration-none" href="{{ route('delivery') }}"><h5>ДОСТАВКА</h5></a>
                <a class="text-white text-decoration-none" href="{{ route('contacts') }}"><h5>КОНТАКТЫ</h5></a>

                <a class="text-white text-decoration-none" href="{{ route('basket') }}">
                    @if($quantity)<span class="badge badge-pill bg-danger">{{ $quantity }}</span>@endif
                    <span><i class="fas fa-shopping-cart"></i></span>
                    <h5 class="clearfix d-inline-block">КОРЗИНА</h5>
                </a>

                @auth()

                    @if(Auth::user()->isAdmin())
                        <a class="text-white text-decoration-none" href="{{ route('adminHome') }}"><h5>ADMIN</h5></a>
                    @else
                        <a class="text-white text-decoration-none" href="{{ route('userHome') }}"><h5>КАБИНЕТ</h5></a>
                    @endif

                    <form class="d-inline" id="logout-form" action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="h5 btn btn-link text-white text-decoration-none">ВЫЙТИ</button>
                    </form>

                @endauth

                @guest()
                    <a class="text-white text-decoration-none" href="{{ route('login') }}"><h5>ВОЙТИ</h5></a>
                    <a class="text-white text-decoration-none" href="{{ route('register') }}"><h5>РЕГИСТРАЦИЯ</h5></a>
                @endguest

                <h5>КАТЕГОРИИ</h5>


                <div class="row" style="background-color: rgba(0,0,0, 0.9);">

                    @foreach(\App\Category::all() as $category)

                        <div class="col-6 my-3" style="background-color: rgba(0,0,0, 0.9);">

                            <ul class="list-group"style="background-color: rgba(0,0,0, 0.9);">

                                <li class="list-group-item border-0" style="background-color: rgba(0,0,0, 0.9);">

                                    <a class="text-decoration-none text-white" style="background-color: rgba(0,0,0, 0.9);" href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->name) }}</a>

                                    <ul class="list-group" style="background-color: rgba(0,0,0, 0.9);">

                                        @foreach($category->subcategories as $subcategory)

                                            <li class="list-group-item border-0" style="background-color: rgba(0,0,0, 0.9);">
                                                <a class="text-decoration-none text-white" style="background-color: rgba(0,0,0, 0.9);" href="{{ route('showSubcategory', [$category->slug, $subcategory->slug]) }}">
                                                    | {{ mb_strtoupper($subcategory->name) }}
                                                </a>
                                            </li>

                                        @endforeach

                                    </ul>

                                </li>

                            </ul>

                        </div>

                    @endforeach

                </div>


            </div>
        </div>

    </section>

{{--    ////////////////////////////////////--}}

    <section class="d-block d-md-none">

        <div class="row text-white">
            <div class="col-12">

                <a class="text-white text-decoration-none" href="{{ route('main') }}"><h5>ГЛАВНАЯ</h5></a>
                <a class="text-white text-decoration-none" href="{{ route('delivery') }}"><h5>ДОСТАВКА</h5></a>
                <a class="text-white text-decoration-none" href="{{ route('contacts') }}"><h5>КОНТАКТЫ</h5></a>

                <a class="text-white text-decoration-none" href="{{ route('basket') }}">
                    @if($quantity)<span class="badge badge-pill bg-danger">{{ $quantity }}</span>@endif
                    <span><i class="fas fa-shopping-cart"></i></span>
                    <h5 class="clearfix d-inline-block">КОРЗИНА</h5>
                </a>

                @auth()

                    @if(Auth::user()->isAdmin())
                        <a class="text-white text-decoration-none" href="{{ route('adminHome') }}"><h5>ADMIN</h5></a>
                    @else
                        <a class="text-white text-decoration-none" href="{{ route('userHome') }}"><h5>КАБИНЕТ</h5></a>
                    @endif

                    <form class="d-inline" id="logout-form" action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="h5 btn btn-link text-white text-decoration-none">ВЫЙТИ</button>
                    </form>

                @endauth

                @guest()
                    <a class="text-white text-decoration-none" href="{{ route('login') }}"><h5>ВОЙТИ</h5></a>
                    <a class="text-white text-decoration-none" href="{{ route('register') }}"><h5>РЕГИСТРАЦИЯ</h5></a>
                @endguest

                <h5>КАТЕГОРИИ</h5>

                <div class="row" style="background-color: rgba(0,0,0, 0.9);">

                    @foreach(\App\Category::all() as $category)

                        <div class="col-12 my-3" style="background-color: rgba(0,0,0, 0.9);">

                            <ul class="list-group"style="background-color: rgba(0,0,0, 0.9);">

                                <li class="list-group-item border-0" style="background-color: rgba(0,0,0, 0.9);">

                                    <a class="text-decoration-none text-white" style="background-color: rgba(0,0,0, 0.9);" href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->name) }}</a>

                                    <ul class="list-group" style="background-color: rgba(0,0,0, 0.9);">

                                        @foreach($category->subcategories as $subcategory)

                                            <li class="list-group-item border-0" style="background-color: rgba(0,0,0, 0.9);">
                                                <a class="text-decoration-none text-white" style="background-color: rgba(0,0,0, 0.9);" href="{{ route('showSubcategory', [$category->slug, $subcategory->slug]) }}">
                                                    | {{ mb_strtoupper($subcategory->name) }}
                                                </a>
                                            </li>

                                        @endforeach

                                    </ul>

                                </li>

                            </ul>

                        </div>

                    @endforeach

                </div>


            </div>
        </div>

    </section>

</div>

<script>
    /* Open */
    function myOpenNav() {
        document.getElementById("myNav").style.display = "block";
    }

    /* Close */
    function closeNav() {
        document.getElementById("myNav").style.display = "none";
    }
</script>

<div class="container-fluid px-0 d-none d-xxl-block">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('main') }}"><span class="fs-4 fw-bold text-primary">ELECTRO-DOM</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span onclick="myOpenNav()" class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('main') }}">ГЛАВНАЯ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('delivery') }}">ДОСТАВКА</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('contacts') }}">КОНТАКТЫ</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="myOpenNav()" class="nav-link text-dark" href="#">КАТАЛОГ</a>
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
                            @if($quantity)<span class="badge badge-pill bg-danger">{{ $quantity }}</span>@endif
                            <span><i class="fas fa-shopping-cart"></i></span>
                            <span class="clearfix d-none d-sm-inline-block">КОРЗИНА</span>
                        </a>
                    </li>
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#">
                            <i class="fab fa-lg fa-facebook"></i>
                        </a>
                    </li>

                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#">
                            <i class="fab fa-lg fa-instagram"></i>
                        </a>
                    </li>
                    <!-- Icon dropdown -->
                    <li class="nav-item dropstart">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-lg fa-user"></i>
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

    <main class="px-5" style="min-height: 80vh" role="main">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="inputGroupFile01">ПОИСК</label>
                        <input type="text" name="search_string" class="form-control" id="inputGroupFile01" placeholder="ВВЕДИТЕ НАЗВАНИЕ ТОВАРА">
                        <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">ИСКАТЬ</button>
                    </div>
                </form>
            </div>
        </div>

        @if(session()->has('message'))
            <p class="alert alert-success text-center text-uppercase mt-3">{{ session()->get('message') }}</p>
        @endif

        @yield('main')
    </main>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Links  -->
        <section class="pt-3">
            <div class="container text-center text-md-start">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Electro-Dom
                        </h6>
                        <p>
                            Магазин электротехнических товаров Электродом является одним из ведущих поставщиков монтажно-технической продукции.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Информация
                        </h6>
                        <p>
                            <a href="{{ route('delivery') }}" class="text-reset">Доставка и оплата</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Новости
                        </h6>
                        {{--                        <p>--}}
                        {{--                            <a href="#!" class="text-reset">Pricing</a>--}}
                        {{--                        </p>--}}
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Контакты
                        </h6>
                        <p>
                            г. Одесса<br>Староконный рынок<br>Павильон ПП-40</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            akimovdenis87@ukr.net
                        </p>
                        <p><i class="fas fa-phone me-3"></i> +38 (048) 772-24-08</p>
                        <p><i class="fas fa-phone me-3"></i> +38 (067) 141-73-18</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2010 - 2022
            <a class="text-reset text-decoration-none" href="{{ route('main') }}">Electro-Dom. Все права защищены.</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

</div>

{{--/////////////////////////////////////////////////////////--}}

<div class="container-fluid px-0 d-block d-md-block d-lg-block d-xl-block d-xxl-none">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('main') }}"><span class="fs-4 fw-bold text-primary">ELECTRO-DOM</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span onclick="myOpenNav()" class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            МЕНЮ САЙТА
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li><a class="dropdown-item" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                            <li><a class="dropdown-item" href="{{ route('delivery') }}">ДОСТАВКА</a></li>
                            <li><a class="dropdown-item" href="{{ route('contacts') }}">КОНТАКТЫ</a></li>
                            <li><a class="dropdown-item" onclick="myOpenNav()">КАТЕГОРИИ</a></li>

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
                            @if($quantity)<span class="badge badge-pill bg-danger">{{ $quantity }}</span>@endif
                            <span><i class="fas fa-shopping-cart"></i></span>
                            <span class="clearfix d-none d-sm-inline-block">КОРЗИНА</span>
                        </a>
                    </li>
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#">
                            <i class="fab fa-lg fa-facebook"></i>
                        </a>
                    </li>

                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#">
                            <i class="fab fa-lg fa-instagram"></i>
                        </a>
                    </li>
                    <!-- Icon dropdown -->
                    <li class="nav-item dropstart">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-lg fa-user"></i>
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

    <main class="px-2" style="min-height: 80vh" role="main">
        <div class="row d-none d-sm-block">
            <div class="col-9 mx-auto">
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="inputGroupFile01">ПОИСК</label>
                        <input type="text" name="search_string" class="form-control" id="inputGroupFile01" placeholder="ВВЕДИТЕ НАЗВАНИЕ ТОВАРА">
                        <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">ИСКАТЬ</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row d-block d-sm-none">
            <div class="col-12 mx-auto">
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="inputGroupFile01">ПОИСК</label>
                        <input type="text" name="search_string" class="form-control" id="inputGroupFile01" placeholder="ВВЕДИТЕ НАЗВАНИЕ ТОВАРА">
                        <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">ИСКАТЬ</button>
                    </div>
                </form>
            </div>
        </div>
        @if(session()->has('message'))
            <p class="alert alert-success text-center text-uppercase">{{ session()->get('message') }}</p>
        @endif

        @yield('main')
    </main>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Links  -->
        <section class="pt-3">
            <div class="container text-center text-md-start">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Electro-Dom
                        </h6>
                        <p>
                            Магазин электротехнических товаров Электродом является одним из ведущих поставщиков монтажно-технической продукции.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Информация
                        </h6>
                        <p>
                            <a href="{{ route('delivery') }}" class="text-reset">Доставка и оплата</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Новости
                        </h6>
                        {{--                        <p>--}}
                        {{--                            <a href="#!" class="text-reset">Pricing</a>--}}
                        {{--                        </p>--}}
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Контакты
                        </h6>
                        <p>
                            г. Одесса<br>Староконный рынок<br>Павильон ПП-40</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            akimovdenis87@ukr.net
                        </p>
                        <p><i class="fas fa-phone me-3"></i> +38 (048) 772-24-08</p>
                        <p><i class="fas fa-phone me-3"></i> +38 (067) 141-73-18</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2010 - 2022
            <a class="text-reset text-decoration-none" href="{{ route('main') }}">Electro-Dom. Все права защищены.</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
