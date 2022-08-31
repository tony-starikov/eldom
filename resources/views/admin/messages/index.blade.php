@extends('admin.master')

@section('title', 'СООБЩЕНИЯ')

@section('main')
    <div class="container-fluid">

        <h4>СООБЩЕНИЯ</h4>
        <a class="btn btn-success" type="button" href="{{ route('messages.create') }}">ДОБАВИТЬ СООБЩЕНИЕ</a>

        <div class="row">

                <div class="col-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">СООБЩЕНИЕ</th>
                                <th scope="col">ДЕЙСТВИЯ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <th scope="row">{{ $message->id }}</th>
                                <td>{{ $message->message_ru }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('messages.edit', $message) }}"><button type="button" class="btn btn-link">ИЗМЕНИТЬ</button></a>
                                        <form id="delete-form" action="{{ route('messages.destroy', $message) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-link">УДАЛИТЬ</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
        </div>
    </div> <!-- /container -->
@endsection
