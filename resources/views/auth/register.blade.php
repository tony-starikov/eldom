@extends('auth.master')

@section('title', 'REGISTER')

@section('main')
    <!--Main layout-->
    <div class="container-fluid mt-5">
        <!--Section: Content-->
        <section class="text-center">

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Имя</label>
                            <input name="name" type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Имя">
                        </div>

                        <div class="form-group mb-3">
                            <label for="surname">Фамилия</label>
                            <input name="surname" type="text" class="form-control" id="surname" aria-describedby="emailHelp" placeholder="Фамилия">
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите email">
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Телефон</label>
                            <input name="phone" type="tel" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="+380634139684">
                        </div>

                        <div class="form-group mb-3">
                            <label for="Password">Пароль</label>
                            <input name="password" type="password" class="form-control" id="Password" placeholder="Введите пароль">
                            <small id="emailHelp" class="form-text text-muted">Пароль должен содержать не менее 8 символов</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation">Подтвердите пароль</label>
                            <input name="password_confirmation" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите пароль">
                            <small id="emailHelp" class="form-text text-muted">Пароль должен содержать не менее 8 символов</small>
                        </div>

                        <button type="submit" class="btn btn-primary m-3">Зарегистрироваться</button>
                    </form>
                </div>
            </div>

        </section>

    </div>
    <!--Main layout-->
@endsection
