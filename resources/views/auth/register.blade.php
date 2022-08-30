@extends('master')

@section('title', $page_info->__('title'))

@section('description', $page_info->description)

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
                            <label for="name">{{ __('register.name') }}</label>
                            <input name="name" type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="{{ __('register.name_placeholder') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="surname">{{ __('register.surname') }}</label>
                            <input name="surname" type="text" class="form-control" id="surname" aria-describedby="emailHelp" placeholder="{{ __('register.surname_placeholder') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">{{ __('register.email') }}</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('register.email_placeholder') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">{{ __('register.phone') }}</label>
                            <input name="phone" type="tel" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="{{ __('register.phone_placeholder') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="Password">{{ __('register.password') }}</label>
                            <input name="password" type="password" class="form-control" id="Password" placeholder="{{ __('register.password_placeholder') }}" required>
                            <small id="emailHelp" class="form-text text-muted">{{ __('register.password_warning') }}</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation">{{ __('register.password_confirm') }}</label>
                            <input name="password_confirmation" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('register.password_confirm_placeholder') }}" required>
                            <small id="emailHelp" class="form-text text-muted">{{ __('register.password_confirm_warning') }}</small>
                        </div>

                        <button type="submit" class="btn btn-primary m-3">{{ __('register.button') }}</button>
                    </form>
                </div>
            </div>

        </section>

    </div>
    <!--Main layout-->
@endsection
