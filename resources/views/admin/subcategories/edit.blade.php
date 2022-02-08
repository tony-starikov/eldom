@extends('admin.master')

@section('title', 'ИЗМЕНИТЬ ПОДКАТЕГОРИЮ')

@section('main')
    <div class="container-fluid">

        <hr>

        <h1>ИЗМЕНИТЬ ПОДКАТЕГОРИЮ</h1>

        <hr>

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

    </div> <!-- /container -->
@endsection
