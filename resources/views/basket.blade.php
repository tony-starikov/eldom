@extends('master')

@section('title', 'КОРЗИНА')

@section('main')

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                        <li class="breadcrumb-item active"><a>КОРЗИНА</a></li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row">

            <div class="col-3">

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

                <h5>КОРЗИНА</h5>

                <section>

                    <div class="row">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6 mx-auto text-center">
                                    <h5>ОБЩАЯ СТОИМОСТЬ: {{ $order->getFullPrice() }} грн</h5>
                                    <a type="button" class="btn btn-success btn-lg" href="{{ route('orderCheck') }}">ОФОРМИТЬ ЗАКАЗ</a>
                                </div>
                            </div>
                        </div>

                        @foreach($order->products as $product)
                            <div class="col-4 p-3">

                                <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">
                                    <div class="card h-100">
                                        <img src="/images/1.png" class="card-img-top img-fluid" alt="...">
                                        <div class="card-body text-center">
                                            <p class="card-title w-75 mx-auto text-dark">{{ mb_strtoupper($product->name) }}</p>
                                            <h3 class="card-title w-75 mx-auto">{{ $product->price }} грн</h3>
                                            <h5 class="text-decoration-none text-dark"> ЦЕНА {{ $product->price }} грн / ИТОГ {{ $product->getPriceForCount() }} грн</h5>
                                            <div class="btn-group" role="group">
                                                <form action="{{ route('basketAdd', $product->id) }}" method="POST">
                                                    <button type="submit" class="btn btn-link btn-lg"><span><i class="fas fa-plus"></i></span></button>
                                                    @csrf
                                                </form>
                                                <button class="btn btn-link btn-lg text-decoration-none">{{ $product->pivot->count }}</button>
                                                <form action="{{ route('basketRemove', $product->id) }}" method="POST">
                                                    <button type="submit" class="btn btn-link btn-lg"><i class="fas fa-minus"></i></button>
                                                    @csrf
                                                </form>
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

