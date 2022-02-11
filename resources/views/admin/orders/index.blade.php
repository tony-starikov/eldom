@extends('admin.master')

@section('title', 'ЗАКАЗЫ')

@section('main')
    <div class="container-fluid">

        <h1>ЗАКАЗЫ</h1>
        <a class="btn btn-success" type="button" href="{{ route('orders.create') }}">ДОБАВИТЬ ЗАКАЗ</a>

        <hr>

        <div class="row">

                <div class="col-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ИМЯ</th>
                                <th scope="col">ТЕЛЕФОН</th>
                                <th scope="col">ОПЛАТА</th>
                                <th scope="col">ДОСТАВКА</th>
                                <th scope="col">СУММА</th>
                                <th scope="col">ДЕЙСТВИЯ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ mb_strtoupper($order->name) }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>@if($order->payment == 1) Наличными в магазине @elseif($order->payment == 2) Банковский перевод @elseif($order->payment == 3) Наложным платежом @endif</td>
                                <td>@if($order->delivery == 1) Самовывоз @elseif($order->delivery == 2) Новой Почтой @endif</td>
                                <td>{{ $order->getFullPrice() }} грн</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('orders.edit', $order) }}"><button type="button" class="btn btn-link">ИЗМЕНИТЬ</button></a>
                                        <a href="{{ route('orders.show', $order) }}"><button type="button" class="btn btn-link">ПОКАЗАТЬ</button></a>
                                        <form id="delete-form" action="{{ route('orders.destroy', $order) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-link">УДАЛИТЬ</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
        </div>
    </div> <!-- /container -->
@endsection
