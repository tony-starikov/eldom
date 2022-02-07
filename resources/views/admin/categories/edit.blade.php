@extends('admin.master')

@section('title', 'ИЗМЕНИТЬ КАТЕГОРИЮ')

@section('main')
    <div class="container-fluid">

        <hr>

        <h1>ИЗМЕНИТЬ КАТЕГОРИЮ</h1>

        <hr>

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

                <button type="submit" class="btn btn-success mt-3">ИЗМЕНИТЬ</button>

            </div>
        </form>

    </div> <!-- /container -->
@endsection
