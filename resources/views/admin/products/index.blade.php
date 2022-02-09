@extends('admin.master')

@section('title', 'ТОВАРЫ')

@section('main')
    <div class="container-fluid">

        <h1>ТОВАРЫ</h1>
        <a class="btn btn-success" type="button" href="{{ route('products.create') }}">ДОБАВИТЬ ТОВАР</a>

        <hr>

        <div class="row">

                <div class="col-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ПОДКАТЕГОРИЯ</th>
                                <th scope="col">НАЗВАНИЕ ТОВАРА</th>
{{--                                <th scope="col">SLUG</th>--}}
                                <th scope="col">АРТИКУЛ</th>
                                <th scope="col">ЦЕНА</th>
                                <th scope="col">ДЕЙСТВИЯ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ mb_strtoupper($product->subcategory->name) }}</td>
                                <td>{{ mb_strtoupper($product->name) }}</td>
{{--                                <td>{{ $product->slug }}</td>--}}
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('products.edit', $product) }}"><button type="button" class="btn btn-link">ИЗМЕНИТЬ</button></a>
                                        {{--                                            <a href="{{ route('users.show', $user) }}"><button type="button" class="btn btn-link">@if($user->status == 1) UNBLOCK @else BLOCK @endif</button></a>--}}
                                        <form id="delete-form" action="{{ route('products.destroy', $product) }}" method="POST">
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
