@extends('master')

@section('title', 'Результаты поиска')

@section('main')

    <div class="container-fluid d-none d-xl-block">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                        <li class="breadcrumb-item active">ПОИСК</li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-3 ps-5">

                <h5>КАТЕГОРИИ</h5>

                <ul class="list-group">

                    @foreach($categories as $category)

                        <li class="list-group-item border-0">

                            <a class="text-decoration-none text-dark" href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->name) }}</a>

                        </li>

                    @endforeach

                </ul>


            </div>

            <div class="col-9">

                <section>

                    <div class="row p-2">

                        <div class="col-12">

                            <section>

                                <div class="row">

                                    @foreach($products as $product)

                                        <div class="col-4 p-3">

                                            <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">
                                                <div class="card h-100">
                                                    <img src="/images/1.png" class="card-img-top img-fluid" alt="...">
                                                    <div class="card-body text-center">
                                                        <div class="row p-0 m-0">
                                                            <h6 class="card-title p-0 m-0 w-100 text-dark" style="min-height: 60px">{{ mb_strtoupper($product->name) }}</h6>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h3 class="card-title w-75 mx-auto">
                                                                    @if($product->new == 1) <span class="badge bg-success">NEW</span> @endif
                                                                    @if($product->sale == 1) <span class="badge bg-danger">SALE</span> @endif
                                                                    @if($product->hit == 1) <span class="badge bg-primary">HIT</span> @endif
                                                                </h3>
                                                                <h3 class="card-title w-75 mx-auto text-dark">
                                                                    {{ $product->price }} грн
                                                                </h3>
                                                            </div>
                                                            <div class="col-12">
                                                                <form action="{{ route('basketAdd', $product->id) }}" method="POST">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        В КОРЗИНУ <span><i class="fas fa-shopping-cart"></i></span>
                                                                    </button>
                                                                    @csrf
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </a>

                                        </div>

                                    @endforeach

                                </div>

                            </section>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>

{{--    //////////////////////////////////////--}}

    <div class="container-fluid d-none d-lg-block d-xl-none">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                        <li class="breadcrumb-item active">ПОИСК</li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-12">

                <section>

                    <div class="row">

                        @foreach($products as $product)

                            <div class="col-4 p-3">

                                <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">
                                    <div class="card h-100">
                                        <img src="/images/1.png" class="card-img-top img-fluid" alt="...">
                                        <div class="card-body text-center">
                                            <div class="row p-0 m-0">
                                                <h6 class="card-title p-0 m-0 w-100 text-dark" style="min-height: 60px">{{ mb_strtoupper($product->name) }}</h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="card-title w-75 mx-auto">
                                                        @if($product->new == 1) <span class="badge bg-success">NEW</span> @endif
                                                        @if($product->sale == 1) <span class="badge bg-danger">SALE</span> @endif
                                                        @if($product->hit == 1) <span class="badge bg-primary">HIT</span> @endif
                                                    </h3>
                                                    <h3 class="card-title w-75 mx-auto text-dark">
                                                        {{ $product->price }} грн
                                                    </h3>
                                                </div>
                                                <div class="col-12">
                                                    <form action="{{ route('basketAdd', $product->id) }}" method="POST">
                                                        <button type="submit" class="btn btn-primary">
                                                            В КОРЗИНУ <span><i class="fas fa-shopping-cart"></i></span>
                                                        </button>
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </a>

                            </div>

                        @endforeach

                    </div>

                </section>

            </div>

        </div>

    </div>

{{--    /////////////////////////////////////--}}

    <div class="container-fluid d-none d-md-block d-lg-none">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                        <li class="breadcrumb-item active">ПОИСК</li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-12">

                <section>

                    <div class="row p-0">

                        @foreach($products as $product)

                            <div class="col-6 p-1">

                                <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">
                                    <div class="card h-100">
                                        <img src="/images/1.png" class="card-img-top img-fluid" alt="...">
                                        <div class="card-body text-center">
                                            <div class="row p-0 m-0">
                                                <h6 class="card-title p-0 m-0 w-100 text-dark" style="min-height: 60px">{{ mb_strtoupper($product->name) }}</h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="card-title w-75 mx-auto">
                                                        @if($product->new == 1) <span class="badge bg-success">NEW</span> @endif
                                                        @if($product->sale == 1) <span class="badge bg-danger">SALE</span> @endif
                                                        @if($product->hit == 1) <span class="badge bg-primary">HIT</span> @endif
                                                    </h3>
                                                    <h3 class="card-title w-75 mx-auto text-dark">
                                                        {{ $product->price }} грн
                                                    </h3>
                                                </div>
                                                <div class="col-12">
                                                    <form action="{{ route('basketAdd', $product->id) }}" method="POST">
                                                        <button type="submit" class="btn btn-primary">
                                                            В КОРЗИНУ <span><i class="fas fa-shopping-cart"></i></span>
                                                        </button>
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </a>

                            </div>

                        @endforeach

                    </div>

                </section>

            </div>

        </div>

    </div>

{{--    ///////////////////////////////////////////--}}

    <div class="container-fluid d-block d-md-none">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                        <li class="breadcrumb-item active">ПОИСК</li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-12">

                <section>

                    <div class="row p-0">

                        @foreach($products as $product)

                            <div class="col-12 p-1">

                                <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">
                                    <div class="card h-100">
                                        <img src="/images/1.png" class="card-img-top img-fluid w-75 mx-auto" alt="...">
                                        <div class="card-body text-center">
                                            <div class="row p-0 m-0">
                                                <h6 class="card-title p-0 m-0 w-100 text-dark" style="min-height: 60px">{{ mb_strtoupper($product->name) }}</h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="card-title w-75 mx-auto">
                                                        @if($product->new == 1) <span class="badge bg-success">NEW</span> @endif
                                                        @if($product->sale == 1) <span class="badge bg-danger">SALE</span> @endif
                                                        @if($product->hit == 1) <span class="badge bg-primary">HIT</span> @endif
                                                    </h3>
                                                    <h3 class="card-title w-75 mx-auto text-dark">
                                                        {{ $product->price }} грн
                                                    </h3>
                                                </div>
                                                <div class="col-12">
                                                    <form action="{{ route('basketAdd', $product->id) }}" method="POST">
                                                        <button type="submit" class="btn btn-primary">
                                                            В КОРЗИНУ <span><i class="fas fa-shopping-cart"></i></span>
                                                        </button>
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </a>

                            </div>

                        @endforeach

                    </div>

                </section>

            </div>

        </div>

    </div>

@endsection
