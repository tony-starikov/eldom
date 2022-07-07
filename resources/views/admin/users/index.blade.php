@extends('admin.master')

@section('title', 'ПОЛЬЗОВАТЕЛИ')

@section('main')
    <div class="container-fluid">

        <h4>ПОЛЬЗОВАТЕЛИ</h4>
        <a class="btn btn-success" type="button" href="{{ route('users.create') }}">СОЗДАТЬ ПОЛЬЗОВАТЕЛЯ</a>

        <div class="row">

                <div class="col-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Фамилия</th>
                                <th scope="col">Email</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @if($user->is_admin == 0)
                                <tr @if($user->status == 1) class="bg-warning" @endif>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('users.edit', $user) }}"><button type="button" class="btn btn-link">ИЗМЕНИТЬ</button></a>
                                            <form id="delete-form" action="{{ route('users.destroy', $user) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-link">УДАЛИТЬ</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>

                </div>
        </div>
    </div> <!-- /container -->
@endsection
