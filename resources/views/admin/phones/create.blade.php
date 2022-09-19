@extends('admin.master')

@section('title', 'ДОБАВИТЬ ТЕЛЕФОН')

@section('main')
    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <h4>ДОБАВИТЬ ТЕЛЕФОН</h4>

                <form method="POST" action="{{ route('phones.store') }}">
                    @csrf

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">ТЕЛЕФОН</span>
                        </div>
                        <input type="text" name="phone" id="phone" class="form-control" aria-describedby="addon-wrapping" required>
                    </div>

                    <input type="hidden" name="main" value="0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="main" id="main" value="1">
                        <label class="form-check-label" for="main">
                            ОСНОВНОЙ
                        </label>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">ДОБАВИТЬ</button>
                </form>

            </div>

        </div>

    </div> <!-- /container -->
@endsection
