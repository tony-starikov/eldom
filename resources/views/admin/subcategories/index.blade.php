@extends('admin.master')

@section('title', 'ПОДКАТЕГОРИИ')

@section('main')
    <div class="container-fluid">

        <h4>ПОДКАТЕГОРИИ</h4>
        <a class="btn btn-success" type="button" href="{{ route('subcategories.create') }}">ДОБАВИТЬ ПОДКАТЕГОРИЮ</a>

        <div class="row">

                <div class="col-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">КАТЕГОРИЯ</th>
                                <th scope="col">НАЗВАНИЕ ПОДКАТЕГОРИИ</th>
                                <th scope="col">SLUG</th>
                                <th scope="col">ДЕЙСТВИЯ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($subcategories as $subcategory)
                            <tr>
                                <th scope="row">{{ $subcategory->id }}</th>
                                <td>{{ mb_strtoupper($subcategory->category->name) }}</td>
                                <td>{{ mb_strtoupper($subcategory->name) }}</td>
                                <td>{{ $subcategory->slug }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('subcategories.edit', $subcategory) }}"><button type="button" class="btn btn-link">ИЗМЕНИТЬ</button></a>
                                        {{--                                            <a href="{{ route('users.show', $user) }}"><button type="button" class="btn btn-link">@if($user->status == 1) UNBLOCK @else BLOCK @endif</button></a>--}}
                                        <form id="delete-form" action="{{ route('subcategories.destroy', $subcategory) }}" method="POST">
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
