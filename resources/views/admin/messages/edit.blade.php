@extends('admin.master')

@section('title', 'ИЗМЕНИТЬ СООБЩЕНИЕ')

@section('main')
    <div class="container-fluid">

        <hr>

        <h1>ИЗМЕНИТЬ СООБЩЕНИЕ</h1>

        <hr>

        <form method="POST" enctype="multipart/form-data" action="{{ route('messages.update', $message) }}">
            <div>
                @method('PUT')
                @csrf

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">СООБЩЕНИЕ RU</span>
                    </div>
                    <input type="text" name="message_ru" id="message_ru" value="{{ $message->message_ru }}" class="form-control" aria-describedby="addon-wrapping" required>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">СООБЩЕНИЕ UA</span>
                    </div>
                    <input type="text" name="message_ua" id="message_ua" value="{{ $message->message_ua }}" class="form-control" aria-describedby="addon-wrapping" required>
                </div>

                <button type="submit" class="btn btn-success mt-3">ИЗМЕНИТЬ</button>

            </div>
        </form>

    </div> <!-- /container -->
@endsection
