@extends('admin.master')

@section('title', 'ДОБАВИТЬ СООБЩЕНИЕ')

@section('main')
    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <h4>ДОБАВИТЬ СООБЩЕНИЕ</h4>

                <form method="POST" action="{{ route('messages.store') }}">
                    @csrf

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">СООБЩЕНИЕ RU</span>
                        </div>
                        <input type="text" name="message_ru" id="message_ru" class="form-control" aria-describedby="addon-wrapping" required>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">СООБЩЕНИЕ UA</span>
                        </div>
                        <input type="text" name="message_ua" id="message_ua" class="form-control" aria-describedby="addon-wrapping" required>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">ДОБАВИТЬ</button>
                </form>

            </div>

        </div>

    </div> <!-- /container -->
@endsection
