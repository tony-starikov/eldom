@extends('master')

@section('title', $page_info->__('title'))

@section('description', $page_info->description)

@section('main')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Заказ №{{ $order->id }}</h1>
                    <p>Заказчик: <b>{{ $order->name }}</b></p>
                    <p>Номер теелфона: <b>{{ $order->phone }}</b></p>
                    <p>Адрес доставки: <b>{{ $order->address }}</b></p>
                    <p>Общая стоимость:: <b>{{ $order->getFullPrice() }} UAH</b></p>

                    <section class="text-center my-4">
                        <div class="container">
                            <div class="row">
                                @foreach($order->products as $product)
                                    <div class="col-lg-3 col-md-6 my-2">
                                        <div class="card h-100">
                                            <img src="/images/1.png" class="card-img-top img-fluid" alt="...">
                                            <div class="card-body">
                                                <h6>{{ $product->name }}</h6>
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        КОЛ-ВО : <button class="btn btn-primary btn-sm">{{ $product->pivot->count }}</button>
                                                    </li>
                                                    <li class="list-group-item">
                                                        ЦЕНА : {{ $product->price }} UAH
                                                    </li>
                                                    <li class="list-group-item">
                                                        СТОИМОСТЬ : {{ $product->getPriceForCount()}} UAH
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- /container -->
@endsection
