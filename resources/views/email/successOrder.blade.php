<!DOCTYPE html>
<html lang="ua">
<head>
    <title>Electro-dom | Інтернет магазин електротехніки та електрики</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

<h1>Electro-dom | Замовлення оформлене успішно!</h1>

<h4>Замовлення #{{ $order->id }}</h4>
<p>Ім'я: <b>{{ $order->name }}</b></p>
<p>Телефон: <b>{{ $order->phone }}</b></p>
<p>Email: <b>{{ $order->email }}</b></p>
<p>Час замовлення: <b>{{ $order->created_at->format('d.m.Y | H:i') }}</b></p>
<p>Доставка: <b>@if($order->delivery == 1)Самовивіз@elseНова Пошта@endif</b></p>
<p>Адреса: <b>{{ $order->address }}</b></p>
<p>Оплата: <b>@if($order->payment == 1)Готівкою у магазині@elseif($order->payment == 2)Банківський переказ@elseНакладним платежем@endif</b></p>
<p>Загальна вартість: <b>{{ $order->getFullPrice() }} UAH</b></p>

<hr>

<h4>Товари:</h4>

<table>
    <tr>
        <th>Назва товару</th>
        <th>Кількість</th>
        <th>Ціна</th>
        <th>Вартість</th>
    </tr>
    @foreach($order->products as $product)
        <tr>
            <td>{{ mb_strtoupper($product->name_ua) }}</td>
            <td>{{ $product->pivot->count }}</td>
            <td>{{ $product->price }} UAH</td>
            <td>{{ $product->getPriceForCount() }} UAH</td>
        </tr>
    @endforeach

</table>

<p>Загальна вартість: <b>{{ $order->getFullPrice() }} UAH</b></p>

<hr>

<h4>Реквізити для оплати банківським переказом</h4>

<p>Код отримувача: <b>{{ $requisite->code }}</b></p>
<p>Р/P отримувача: <b>{{ $requisite->payment_account }}</b></p>
<p>МФО одержувача: <b>{{ $requisite->interbranch_turnover }}</b></p>
<p>Отримувач: <b>{{ $requisite->recipient }}</b></p>

</body>
</html>
