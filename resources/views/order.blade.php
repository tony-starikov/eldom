@extends('master')

@section('title', 'Корзина')

@section('main')

    <div class="container-fluid mt-5">
        <!--Section: Content-->
        <section class="text-center">

            <div class="row d-flex justify-content-center">
                <div class="col-6 text-center">

                    <h3>Подтвердите заказ.</h3>

                    <p>
                        Общая стоимость заказа: <b>{{ $order->getFullPrice() }}</b> UAH
                    </p>

                    <p>
                        Укажите имя и номер телефона, чтоб мы могли с вами связаться.
                    </p>

                    <form method="POST" action="{{ route('orderConfirm') }}">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                        </div>

                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Имя</label>
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>

                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="address">Адрес доставки</label>
                            <input type="text" name="address" id="address" class="form-control" />
                        </div>

                        <!-- Phone input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example2">Телефон</label>
                            <input type="text" name="phone" id="phone" class="form-control" />
                        </div>

                        <!-- Phone input -->
                        <div class="form-outline mb-4 text-start">
                            <label class="form-label" for="form1Example2">Оплата</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" value="1" id="payment1" checked >
                                <label class="form-check-label" for="payment1">
                                    Наличными в магазине
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" value="2" id="payment2">
                                <label class="form-check-label" for="payment2">
                                    Банковский перевод
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" value="3" id="payment3">
                                <label class="form-check-label" for="payment3">
                                    Наложным платежом
                                </label>
                            </div>
                        </div>

                        <!-- Phone input -->
                        <div class="form-outline mb-4 text-start">
                            <label class="form-label" for="form1Example2">Доставка</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery" value="1" id="delivery1" checked >
                                <label class="form-check-label" for="delivery1">
                                    Самовывоз - Только по Одессе
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery" value="2" id="delivery2">
                                <label class="form-check-label" for="delivery2">
                                    Доставка "Новой Почтой"
                                </label>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Заказать</button>
                    </form>

                </div>
            </div>

        </section>

    </div>

@endsection

