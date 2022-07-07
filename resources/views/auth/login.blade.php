@extends('auth.master')

@section('title', 'LOGIN')

@section('main')
    <!--Main layout-->
        <div class="container-fluid mt-5">
            <!--Section: Content-->
            <section class="text-center">

                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Введите email">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Пароль</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Введите пароль">
                            </div>

                            <button type="submit" class="btn btn-primary m-3">Войти</button>
                        </form>
                    </div>
                </div>

            </section>

        </div>
    <!--Main layout-->
@endsection
