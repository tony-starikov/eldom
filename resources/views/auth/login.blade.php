@extends('master')

@section('title', 'LOGIN')

@section('main')
    <!--Main layout-->
        <div class="container mt-5">
            <!--Section: Content-->
            <section class="text-center">

                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary m-3">Submit</button>
                        </form>
                    </div>
                </div>

            </section>

        </div>
    <!--Main layout-->
@endsection
