@extends('master')

@section('title', 'Корзина')

@section('main')

    <div class="container-fluid mt-5">
        <!--Section: Content-->
        <section>

            <div class="row mb-5">

                <div class="row mb-4">
                    <div class="col-12 text-center">

                        <h3>Подтвердите заказ.</h3>

                        <p>
                            Общая стоимость заказа: <b>{{ $order->getFullPrice() }}</b> UAH
                        </p>

                    </div>
                </div>

                <form method="POST" action="{{ route('orderConfirm') }}">
                @csrf

                    <div class="row mb-4">

                        <div class="col-6">

                            <div class="card">
                                <h5 class="card-header">Контактные данные</h5>
                                <div class="card-body">

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


                                </div>
                            </div>

                        </div>

                        <div class="col-6">

                            <div class="card mb-4">
                                <h5 class="card-header">Доставка</h5>
                                <div class="card-body">

                                    <!-- Phone input -->
                                    <div class="form-outline mb-4 text-start">
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

                                </div>
                            </div>

                            <div class="card mb-4">
                                <h5 class="card-header">Оплата</h5>
                                <div class="card-body">

                                    <!-- Phone input -->
                                    <div class="form-outline mb-4 text-start">
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

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary btn-block mb-4">Заказать</button>
                        </div>
                    </div>

                </form>

            </div>

        </section>

    </div>

@endsection

