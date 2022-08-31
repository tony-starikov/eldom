@extends('admin.master')

@section('title', 'КАТЕГОРИИ')

@section('main')
    <div class="container-fluid">

        <h4>КАТЕГОРИИ</h4>
        <a class="btn btn-success" type="button" href="{{ route('categories.create') }}">ДОБАВИТЬ КАТЕГОРИЮ</a>

        <hr>

        <div class="row">

                <div class="col-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">НАЗВАНИЕ RU</th>
                                <th scope="col">SLUG</th>
                                <th scope="col">ДЕЙСТВИЯ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name_ru }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('categories.edit', $category) }}"><button type="button" class="btn btn-link">ИЗМЕНИТЬ</button></a>
                                        {{--                                            <a href="{{ route('users.show', $user) }}"><button type="button" class="btn btn-link">@if($user->status == 1) UNBLOCK @else BLOCK @endif</button></a>--}}
                                        <form id="delete-form" action="{{ route('categories.destroy', $category) }}" method="POST">
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
