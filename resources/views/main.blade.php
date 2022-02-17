@extends('master')

@section('title', 'Electro-dom')

@section('main')

    <div class="container-fluid d-none d-xxl-block">

        <div class="row p-2 pt-5">

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

                    <div class="row">

                        <div class="col-4 text-center">

                            <img class="img-fluid my-3" src="/images/promo6.png" alt="">

                            <h2>СКИДКИ И АКЦИИ</h2>

                            <p class="w-75 mx-auto">Гибкая система скидок для постоянных покупателей</p>

                        </div>

                        <div class="col-4 text-center">

                            <img class="img-fluid my-3" src="/images/promo5.png" alt="">

                            <h2>ГАРАНТИЯ</h2>

                            <p class="w-75 mx-auto">
                                Оказываем постоянную поддержку для покупателей
                            </p>

                        </div>

                        <div class="col-4 text-center">

                            <img class="img-fluid my-3" src="/images/promo4.jpg" alt="">

                            <h2>ДОСТАВКА</h2>

                            <p class="w-75 mx-auto">Осуществляем доставку в любой регион Украины</p>

                        </div>


                    </div>

                    <div class="row mt-5">

                        <div class="col-12 text-center">
                            <h2>РЕКОМЕНДУЕМЫЕ ТОВАРЫ</h2>
                            <hr>
                        </div>

                        @foreach($recommended_products as $product)

                            <div class="col-4 p-3">

                                <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">

                                    <div class="card h-100">

                                        <img src="/images/1.png" class="card-img-top img-fluid my-2" alt="...">
                                        <div class="card-body text-center">

                                            <div class="row p-0 m-0">
                                                <h6 class="card-title p-0 m-0 w-100 text-dark" style="min-height: 80px">{{ mb_strtoupper($product->name) }}</h6>
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

{{--    ///////////////////////////////////////--}}

    <div class="container-fluid d-none d-lg-block d-xl-block d-xxl-none">

    <div class="row p-1 pt-4">

        <div class="col-3 ps-0">

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

                <div class="row">

                    <div class="col-4 text-center">

                        <img class="img-fluid my-3" src="/images/promo6.png" alt="">

                        <h2>СКИДКИ</h2>

                        <p class="w-75 mx-auto">Гибкая система скидок для постоянных покупателей</p>

                    </div>

                    <div class="col-4 text-center">

                        <img class="img-fluid my-3" src="/images/promo5.png" alt="">

                        <h2>ГАРАНТИЯ</h2>

                        <p class="w-75 mx-auto">
                            Оказываем постоянную поддержку для покупателей
                        </p>

                    </div>

                    <div class="col-4 text-center">

                        <img class="img-fluid my-3" src="/images/promo4.jpg" alt="">

                        <h2>ДОСТАВКА</h2>

                        <p class="w-75 mx-auto">Осуществляем доставку в любой регион Украины</p>

                    </div>


                </div>

                <div class="row mt-5">

                    <div class="col-12 text-center">
                        <h2>РЕКОМЕНДУЕМЫЕ ТОВАРЫ</h2>
                        <hr>
                    </div>

                    @foreach($recommended_products as $product)

                        <div class="col-6 p-3">

                            <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">

                                <div class="card h-100">

                                    <img src="/images/1.png" class="card-img-top img-fluid my-2" alt="...">
                                    <div class="card-body text-center">

                                        <div class="row p-0 m-0">
                                            <h6 class="card-title p-0 m-0 w-100 text-dark" style="min-height: 80px">{{ mb_strtoupper($product->name) }}</h6>
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

{{--    //////////////////////////////////////--}}

    <div class="container-fluid d-none d-sm-block d-md-block d-lg-none">

        <div class="row p-0 pt-4">

            <div class="col-12">

                <section>

                    <div class="row">

                        <div class="col-4 text-center">

                            <img class="img-fluid my-3" src="/images/promo6.png" alt="">

                            <h2>СКИДКИ</h2>

                            <p class="w-75 mx-auto">Гибкая система скидок для постоянных покупателей</p>

                        </div>

                        <div class="col-4 text-center">

                            <img class="img-fluid my-3" src="/images/promo5.png" alt="">

                            <h2>ГАРАНТИЯ</h2>

                            <p class="w-75 mx-auto">
                                Оказываем постоянную поддержку для покупателей
                            </p>

                        </div>

                        <div class="col-4 text-center">

                            <img class="img-fluid my-3" src="/images/promo4.jpg" alt="">

                            <h2>ДОСТАВКА</h2>

                            <p class="w-75 mx-auto">Осуществляем доставку в любой регион Украины</p>

                        </div>


                    </div>

                    <div class="row mt-5">

                        <div class="col-12 text-center">
                            <h2>РЕКОМЕНДУЕМЫЕ ТОВАРЫ</h2>
                            <hr>
                        </div>

                        @foreach($recommended_products as $product)

                            <div class="col-6 p-3">

                                <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">

                                    <div class="card h-100">

                                        <img src="/images/1.png" class="card-img-top img-fluid my-2" alt="...">
                                        <div class="card-body text-center">

                                            <div class="row p-0 m-0">
                                                <h6 class="card-title p-0 m-0 w-100 text-dark" style="min-height: 80px">{{ mb_strtoupper($product->name) }}</h6>
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

{{--    //////////////////////////////////////////--}}

    <div class="container-fluid d-block d-sm-none">

        <div class="row p-0 pt-4">

            <div class="col-12">

                <section>

                    <div class="row">

                        <div class="col-12 text-center">

                            <img class="img-fluid my-3" src="/images/promo6.png" alt="">

                            <h2>СКИДКИ</h2>

                            <p class="w-75 mx-auto">Гибкая система скидок для постоянных покупателей</p>

                        </div>

                        <div class="col-12 text-center">

                            <img class="img-fluid my-3" src="/images/promo5.png" alt="">

                            <h2>ГАРАНТИЯ</h2>

                            <p class="w-75 mx-auto">
                                Оказываем постоянную поддержку для покупателей
                            </p>

                        </div>

                        <div class="col-12 text-center">

                            <img class="img-fluid my-3" src="/images/promo4.jpg" alt="">

                            <h2>ДОСТАВКА</h2>

                            <p class="w-75 mx-auto">Осуществляем доставку в любой регион Украины</p>

                        </div>


                    </div>

                    <div class="row mt-5">

                        <div class="col-12 text-center">
                            <h2>РЕКОМЕНДУЕМЫЕ ТОВАРЫ</h2>
                            <hr>
                        </div>

                        @foreach($recommended_products as $product)

                            <div class="col-12 p-1">

                                <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">

                                    <div class="card h-100">

                                        <img src="/images/1.png" class="card-img-top img-fluid my-2" alt="...">
                                        <div class="card-body text-center">

                                            <div class="row p-0 m-0">
                                                <h6 class="card-title p-0 m-0 w-100 text-dark" style="min-height: 80px">{{ mb_strtoupper($product->name) }}</h6>
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
