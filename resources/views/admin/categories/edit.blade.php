@extends('admin.master')

@section('title', 'ИЗМЕНИТЬ КАТЕГОРИЮ')

@section('main')
    <div class="container-fluid">

        <div class="row">
            <div class="col-6">
                <h4>ИЗМЕНИТЬ КАТЕГОРИЮ</h4>

                <form method="POST" enctype="multipart/form-data" action="{{ route('categories.update', $category) }}">
                    <div>
                        @method('PUT')
                        @csrf

                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">НАЗВАНИЕ</span>
                            </div>
                            <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">SLUG</span>
                            </div>
                            <input type="text" name="slug" id="slug" value="{{ $category->slug }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
                        </div>

                        <button type="submit" class="btn btn-success mt-2">ИЗМЕНИТЬ</button>

                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-3">

            <div class="col-12">

                <h4>ПОДКАТЕГОРИИ - {{ $category->name }}</h4>

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
                    @foreach($category->subcategories as $subcategory)
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
