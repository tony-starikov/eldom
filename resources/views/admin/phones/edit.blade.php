@extends('admin.master')

@section('title', 'ИЗМЕНИТЬ ТЕЛЕФОН')

@section('main')
    <div class="container-fluid">

        <hr>

        <h1>ИЗМЕНИТЬ ТЕЛЕФОН</h1>

        <hr>

        <form method="POST" enctype="multipart/form-data" action="{{ route('phones.update', $phone) }}">
            <div>
                @method('PUT')
                @csrf

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">ТЕЛЕФОН</span>
                    </div>
                    <input type="text" name="phone" id="phone" value="{{ $phone->phone }}" class="form-control" aria-describedby="addon-wrapping" required>
                </div>

                <input type="hidden" name="main" value="0">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="main" id="main" value="1" @if($phone->main == 1) checked @endif>
                    <label class="form-check-label" for="main">
                        ОСНОВНОЙ
                    </label>
                </div>

                <button type="submit" class="btn btn-success mt-3">ИЗМЕНИТЬ</button>

            </div>
        </form>

    </div> <!-- /container -->
@endsection
