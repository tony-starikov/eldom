@extends('master')

@section('title', $page_info->__('title'))

@section('description', $page_info->description)

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Заказы</h1>
            </div>

            @if($orders->count() != 0)
                @foreach($orders as $order)
                    <div class="col-12 col-sm-6 col-md-4">
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
            @else
                <div class="col-12">
                    <h2>Заказов еще нет</h2>
                </div>
            @endif
        </div>

        <div class="row">
            <nav class="d-flex justify-content-center mt-3">
                {{ $orders->links() }}
            </nav>
        </div>
    </div>
@endsection
