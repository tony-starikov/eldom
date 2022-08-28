@extends('master')

@section('title', 'Заказы')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Заказы</h1>
            </div>
        </div>

        <div class="row d-flex d-lg-none">
            @foreach($orders as $order)
            <div class="col-12 col-sm-6 col-md-6 my-2">
                <div class="card h-100">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                #{{ $order->id }}
                            </li>
                            <li class="list-group-item">
                                Создан: {{ $order->created_at->format('H:i d.m.Y') }}
                            </li>
                            <li class="list-group-item">
                                Статус: @if($order->state == 1)В обработке@elseif($order->state == 2)Доставка@elseЗавершен@endif
                            </li>
                            <li class="list-group-item">
                                @if($order->delivery == 1)Самовывоз@elseНовая Почта@endif
                            </li>
                            <li class="list-group-item">
                                Оплата: @if($order->payment == 1)Наличными в магазине@elseif($order->payment == 2)Банковский перевод@elseНаложным платежом@endif
                            </li>
                            <li class="list-group-item">
                                СУММА: {{ $order->getFullPrice() }} UAH
                            </li>
                            <li class="list-group-item">
                                <a class="btn btn-success" type="button" href="{{ route('userOrdersShow', $order) }}">ОТКРЫТЬ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row d-none d-lg-block">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Время создания заказа</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Доставка</th>
                            <th scope="col">Оплата</th>
                            <th scope="col">Статус оплаты</th>
                            <th scope="col">Сумма</th>
                            <th scope="col">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->created_at->format('H:i d.m.Y') }}</td>
                            <td>@if($order->state == 1)В обработке@elseif($order->state == 2)Доставка@elseЗавершен@endif</td>
                            <td>@if($order->delivery == 1)Самовывоз@elseНовая Почта@endif</td>
                            <td>@if($order->payment == 1)Наличными в магазине@elseif($order->payment == 2)Банковский перевод@elseНаложным платежом@endif</td>
                            <td>@if($order->payment_status == 0)<h4>-</h4>@else<h4>+</h4>@endif</td>
                            <td>{{ $order->getFullPrice() }} UAH</td>
                            <td><a class="btn btn-success" type="button" href="{{ route('userOrdersShow', $order) }}">ОТКРЫТЬ</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <nav class="d-flex justify-content-center mt-3">
                {{ $orders->links() }}
            </nav>
        </div>
    </div>
@endsection
