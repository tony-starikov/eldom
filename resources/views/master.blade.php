<!doctype html>
<html lang="ua">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <base href="https://electro-dom.od.ua/" />
    <meta name="description" content="@yield('description')" />

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
</head>
<body>

<!-- The overlay -->
<div id="myNav" class="overlay">

    <div class="row">
        <a href="javascript:void(0)" class="text-decoration-none text-white" onclick="closeNav()"><h1>&times;</h1></a>
    </div>

    <div class="row text-white">

        <div class="col-12">

            <section class="d-block d-lg-none">
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
            </section>

            <h5>КАТЕГОРИИ</h5>

            <div class="row" style="background-color: rgba(0,0,0, 0.9);">

                @foreach(\App\Category::all() as $category)

                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 my-3" style="background-color: rgba(0,0,0, 0.9);">

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

<div class="container-fluid px-0">

    <nav class="navbar navbar-expand-lg navbar-light bg-light py-0">
        <div class="container-fluid">
            <div class="row w-100 mx-1 mx-sm-2">

                <div class="col-3 col-xl-4 p-0">
                    <ul class="nav justify-content-start">
                        <li class="nav-item">
                            <a class="navbar-brand" href="{{ route('main') }}"><span class="fs-4 fw-bold text-primary">ELECTRO-DOM</span></a>
                        </li>
                    </ul>
{{--                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                        <span onclick="myOpenNav()" class="navbar-toggler-icon"></span>--}}
{{--                    </button>--}}
                </div>

                <div class="col-12 col-xl-4 order-3 order-xl-2 p-0">
                    <ul class="nav justify-content-between justify-content-sm-evenly">
                        <li class="nav-item">
                            <a class="nav-link text-secondary fw-bold p-1" href="{{ route('main') }}">{{ __('master.main_menu') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary fw-bold p-1" href="{{ route('delivery') }}">{{ __('master.delivery_menu') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary fw-bold p-1" href="{{ route('contacts') }}">{{ __('master.contacts_menu') }}</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a onclick="myOpenNav()" class="nav-link text-dark" href="#">{{ __('master.catalogue') }}</a>--}}
{{--                        </li>--}}
                    </ul>
                </div>

                <div class="col-9 col-xl-4 order-2 order-xl-3 p-0">
                    <ul class="nav justify-content-end">

                        <li class="nav-item dropdown">
                            <a class="nav-link text-secondary dropdown-toggle fw-bold p-1 p-sm-2" id="navbarDropdownw2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span><i class="fas fa-phone"></i></span>
                                <span class="clearfix d-none d-sm-inline-block">+38 (048) 772-24-08</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownw2">

                                <li>
                                    <a class="dropdown-item" href="tel:+38 (048) 772-24-08">
                                        <span><i class="fas fa-phone"></i></span>
                                        <span class="clearfix">+38 (048) 772-24-08</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="tel:+38 (067) 141-73-18">
                                        <span><i class="fas fa-phone"></i></span>
                                        <span class="clearfix">+38 (067) 141-73-18</span>
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link text-secondary dropdown-toggle fw-bold p-1 p-sm-2" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(App::getLocale() == 'ua') UA @else RU @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end w-50" aria-labelledby="navbarDropdown3">
                                <li>
                                    <a class="dropdown-item d-inline-block" href="{{ route('locale', 'ru') }}">RU</a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-inline-block" href="{{ route('locale', 'ua') }}">UA</a>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light pt-0">

        <div class="container-fluid">

            <div class="row w-100 mx-1 mx-md-2">

                <div class="order-2 order-md-1 col-8 col-md-3 p-0">

                    <ul class="nav justify-content-start">

                        <li class="nav-item w-75 dropdown">

                            <a class="btn btn-primary w-100 rounded-pill dropdown-toggle fw-bold" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                <span><i class="fas fa-bars d-none d-md-inline-block"></i> {{ __('master.categories') }}</span>
                            </a>

                            <ul class="dropdown-menu">
                                @foreach($categories as $category)
                                    <li>
                                        <a class="dropdown-item text-secondary fw-bold my-2" href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->__('name')) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>

                </div>

                <div class="order-1 order-md-2 col-12 col-md-6 px-0 px-sm-1 mb-2 mb-sm-3 mb-md-0">
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <div class="input-group">
{{--                            {{ __('master.search') }}--}}
                            <label class="input-group-text text-secondary fw-bold" for="inputGroupFile01"><i class="fas fa-search"></i></label>
                            <input type="text" name="search_string"  class="form-control" id="inputGroupFile01" placeholder="{{ __('master.search_placeholder') }}">
                            <button class="btn btn-outline-primary fw-bold" type="submit" id="inputGroupFileAddon04">{{ __('master.search_button') }}</button>
                        </div>
                    </form>
                </div>

                <div class="order-3 col-4 col-md-3 p-0">
                    <ul class="nav justify-content-end">

                        <li class="nav-item dropdown">
                            <a class="nav-link text-secondary dropdown-toggle fw-bold p-1 p-sm-2" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-lg fa-user"></i>
                                <span class="clearfix d-none d-xl-inline-block">{{ __('master.cabinet') }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown3">
                                @auth()

                                    @if(Auth::user()->isAdmin())
                                        <li><a class="dropdown-item" href="{{ route('adminHome') }}">ADMIN</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="{{ route('userHome') }}">{{ __('master.cabinet') }}</a></li>
                                    @endif

                                        <li>
                                            <form class="d-inline" id="logout-form" action="{{ url('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">{{ __('master.logout') }}</button>
                                            </form>
                                        </li>

                                @endauth

                                @guest()
                                    <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('master.login') }}</a></li>
                                    <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('master.register') }}</a></li>
                                @endguest

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-bold p-1 p-sm-2" href="{{ route('basket') }}">
                                @if($quantity)<span class="badge badge-pill bg-primary">{{ $quantity }}</span>@endif
                                <span><i class="fas fa-lg fa-shopping-cart"></i></span>
                                <span class="clearfix d-none d-xl-inline-block">{{ __('master.basket') }}</span>
                            </a>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </nav>

    <main style="min-height: 80vh" role="main">

        @if(session()->has('message'))
            <p class="alert alert-success text-center text-uppercase mb-0">{{ session()->get('message') }}</p>
        @endif

        @if($messages)
            @foreach($messages as $message)
                <p class="alert alert-warning text-center text-uppercase mb-0">{{ $message->__('message') }}</p>
            @endforeach
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
                        <h6 class="text-uppercase fw-bold mb-4">Electro-Dom</h6>
                        <p>{{ __('master.electro_dom_info') }}</p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">{{ __('master.information') }}</h6>
                        <p><a href="{{ route('delivery') }}" class="text-reset text-decoration-none">{{ __('master.delivery_and_payment') }}</a></p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">{{ __('master.news') }}</h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">{{ __('master.contacts_menu') }}</h6>
                        <p>{{ __('master.city') }}<br>{{ __('master.market') }}<br>{{ __('master.pavilion') }}</p>
                        <p><i class="fas fa-envelope me-3"></i>akimovdenis87@ukr.net</p>
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
            © 2010 - 2022 <a class="text-reset text-decoration-none" href="{{ route('main') }}">Electro-Dom. {{ __('master.rights') }}.</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
