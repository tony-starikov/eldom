@extends('admin.master')

@section('title', 'ADMIN-USERS')

@section('main')
    <div class="container-fluid">

        <h1>USERS</h1>
        <a class="btn btn-success" type="button" href="{{ route('users.create') }}">ADD USER</a>

        <hr>

        <div class="row">

                <div class="col-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Email</th>
{{--                                <th scope="col">Last visit</th>--}}
                                <th scope="col">Functions</th>
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
{{--                                    <td>{{ date("Y-m-d G:i:s", $user->last_visit)  }}</td>--}}
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('users.edit', $user) }}"><button type="button" class="btn btn-link">EDIT</button></a>
{{--                                            <a href="{{ route('users.show', $user) }}"><button type="button" class="btn btn-link">@if($user->status == 1) UNBLOCK @else BLOCK @endif</button></a>--}}
                                            <form id="delete-form" action="{{ route('users.destroy', $user) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-link">DELETE</button>
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
