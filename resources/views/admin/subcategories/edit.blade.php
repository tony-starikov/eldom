@extends('admin.master')

@section('title', 'ИЗМЕНИТЬ ПОДКАТЕГОРИЮ')

@section('main')
    <div class="container-fluid">

        <div class="row">
            <div class="col-6">
                <h4>ИЗМЕНИТЬ ПОДКАТЕГОРИЮ</h4>

                <form method="POST" enctype="multipart/form-data" action="{{ route('subcategories.update', $subcategory) }}">
                    <div>
                        @method('PUT')
                        @csrf

                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="input-group flex-nowrap mb-3">
                            <label class="input-group-text" for="category_id">КАТЕГОРИЯ</label>
                            <select name="category_id" id="category_id" class="form-select">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == $subcategory->category_id) selected @endif >{{ mb_strtoupper($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">НАЗВАНИЕ</span>
                            </div>
                            <input type="text" name="name" id="name" value="{{ $subcategory->name }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">SLUG</span>
                            </div>
                            <input type="text" name="slug" id="slug" value="{{ $subcategory->slug }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
                        </div>

                        <button type="submit" class="btn btn-success mt-3">ИЗМЕНИТЬ</button>

                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-3">

            <div class="col-12">

                <h4>ТОВАРЫ - {{ $subcategory->name }}</h4>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ПОДКАТЕГОРИЯ</th>
                        <th scope="col">НАЗВАНИЕ ТОВАРА</th>
                        <th scope="col">NEW</th>
                        <th scope="col">SALE</th>
                        <th scope="col">HIT</th>
                        <th scope="col">RECOMMEND</th>
                        <th scope="col">АРТИКУЛ</th>
                        <th scope="col">ЦЕНА</th>
                        <th scope="col">ДЕЙСТВИЯ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subcategory->products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ mb_strtoupper($product->subcategory->name) }}</td>
                            <td>{{ mb_strtoupper($product->name) }}</td>
                            <td>@if($product->new == 1) YES @endif</td>
                            <td>@if($product->sale == 1) YES @endif</td>
                            <td>@if($product->hit == 1) YES @endif</td>
                            <td>@if($product->recommend == 1) YES @endif</td>
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
