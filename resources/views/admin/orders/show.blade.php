@extends('admin.master')

@section('title', 'Заказ #' . $order->id)

@section('main')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Заказ #{{ $order->id }}</h1>
                    <p>Имя: <b>{{ $order->name }}</b></p>
                    <p>Телефон: <b>{{ $order->phone }}</b></p>
                    <p>Email: <b>{{ $order->email }}</b></p>
                    <p>Время заказа: <b>{{ $order->created_at->format('d.m.Y | H:i') }}</b></p>
                    <p>Статус: <b>@if($order->state == 1)В обработке@elseif($order->state == 2)Доставка@elseЗавершен@endif</b></p>
                    <p>Доставка: <b>@if($order->delivery == 1)Самовывоз@elseНовая Почта@endif</b></p>
                    <p>Адрес: <b>{{ $order->address }}</b></p>
                    <p>Оплата: <b>@if($order->payment == 1)Наличными в магазине@elseif($order->payment == 2)Банковский перевод@elseНаложным платежом@endif</b></p>
                    <p>Статус оплаты: @if($order->payment_status == 0)<b class="h3">-</b>@else<b class="h3">+</b>@endif</p>
                    <p>Общая стоимость: <b>{{ $order->getFullPrice() }} UAH</b></p>

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
