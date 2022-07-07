@extends('admin.master')

@section('title', 'ИЗМЕНИТЬ ЗАКАЗ #' . $order->id)

@section('main')
    <div class="container-fluid">

        <h3>ИЗМЕНИТЬ ЗАКАЗ</h3>

        <div class="row">
            <div class="col-6">

                <form method="POST" enctype="multipart/form-data" action="{{ route('orders.update', $order) }}">
                    <div>
                        @method('PUT')
                        @csrf

                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Имя</span>
                            </div>
                            <input type="text" name="name" id="name" value="{{ $order->name }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Телефон</span>
                            </div>
                            <input type="text" name="phone" id="phone" value="{{ $order->phone }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Email</span>
                            </div>
                            <input type="text" name="email" id="email" value="{{ $order->email }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <label class="input-group-text" for="state">Статус</label>
                            <select name="state" id="state" class="form-select">
                                <option value="1" @if($order->state == 1) selected @endif >В обработке</option>
                                <option value="2" @if($order->state == 2) selected @endif >Доставка</option>
                                <option value="3" @if($order->state == 3) selected @endif >Завершен</option>
                            </select>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <label class="input-group-text" for="delivery">Доставка</label>
                            <select name="delivery" id="delivery" class="form-select">
                                <option value="1" @if($order->delivery == 1) selected @endif >Самовывоз</option>
                                <option value="2" @if($order->delivery == 2) selected @endif >Новая Почта</option>
                            </select>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Адрес</span>
                            </div>
                            <input type="text" name="address" id="address" value="{{ $order->address }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <label class="input-group-text" for="payment">Оплата</label>
                            <select name="payment" id="payment" class="form-select">
                                <option value="1" @if($order->payment == 1) selected @endif >Наличными в магазине</option>
                                <option value="2" @if($order->payment == 2) selected @endif >Банковский перевод</option>
                                <option value="3" @if($order->payment == 3) selected @endif >Наложным платежом</option>
                            </select>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <label class="input-group-text" for="payment_status">Статус оплаты</label>
                            <select name="payment_status" id="payment_status" class="form-select">
                                <option value="0" @if($order->payment_status == 0) selected @endif >-</option>
                                <option value="1" @if($order->payment_status == 1) selected @endif >+</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">ИЗМЕНИТЬ</button>

                    </div>
                </form>

            </div>
        </div>

    </div> <!-- /container -->
@endsection
