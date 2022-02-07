@extends('master')

@section('title', 'REGISTER')

@section('main')
    <!--Main layout-->
    <div class="container mt-5">
        <!--Section: Content-->
        <section class="text-center">

            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="First name">
                            {{--                            <small id="emailHelp" class="form-text text-muted">Some text.</small>--}}
                        </div>

                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input name="surname" type="text" class="form-control" id="surname" aria-describedby="emailHelp" placeholder="Last name">
                            {{--                            <small id="emailHelp" class="form-text text-muted">Some text.</small>--}}
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input name="phone" type="tel" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="+380634139684">
{{--                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                        </div>

                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input name="password" type="password" class="form-control" id="Password" placeholder="Enter password">
                            <small id="emailHelp" class="form-text text-muted">Minimum 8 symbols.</small>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Password confirm</label>
                            <input name="password_confirmation" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">
{{--                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                        </div>

                        <button type="submit" class="btn btn-primary m-3">Submit</button>
                    </form>
                </div>
            </div>

        </section>

    </div>
    <!--Main layout-->
@endsection
