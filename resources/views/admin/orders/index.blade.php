@extends('admin.master')

@section('title', 'ЗАКАЗЫ')

@section('main')
    <div class="container-fluid">

        <h3>ЗАКАЗЫ</h3>
{{--        <a class="btn btn-success" type="button" href="{{ route('orders.create') }}">ДОБАВИТЬ ЗАКАЗ</a>--}}

        <div class="row d-none d-lg-block">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Время заказа</th>
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
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->created_at->format('d.m.Y | H:i') }}</td>
                            <td>@if($order->state == 1)В обработке@elseif($order->state == 2)Доставка@elseЗавершен@endif</td>
                            <td>@if($order->delivery == 1)Самовывоз@elseНовая Почта@endif</td>
                            <td>@if($order->payment == 1)Наличными в магазине@elseif($order->payment == 2)Банковский перевод@elseНаложным платежом@endif</td>
                            <td>@if($order->payment_status == 0)<h4>-</h4>@else<h4>+</h4>@endif</td>
                            <td>{{ $order->getFullPrice() }} UAH</td>
                            <td>
                                <a class="btn btn-success mt-1" type="button" href="{{ route('orders.show', $order) }}">ПОКАЗАТЬ</a>
                                <a class="btn btn-success mt-1" type="button" href="{{ route('orders.edit', $order) }}">ИЗМЕНИТЬ</a>
                                <form class="d-inline-block" id="delete-form" action="{{ route('orders.destroy', $order) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-success mt-1">УДАЛИТЬ</button>
                                </form>
                            </td>
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
    </div> <!-- /container -->
@endsection
