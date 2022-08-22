@extends('master')

@section('title', 'Вхід')

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
                                <label for="email">{{ __('login.email') }}</label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{ __('login.email_placeholder') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">{{ __('login.password') }}</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="{{ __('login.password_placeholder') }}">
                            </div>

                            <button type="submit" class="btn btn-primary m-3">{{ __('login.button') }}</button>
                        </form>
                    </div>
                </div>

            </section>

        </div>
    <!--Main layout-->
@endsection
