@extends('admin.master')

@section('title', 'ИЗМЕНИТЬ ТОВАР')

@section('main')
    <div class="container-fluid">

        <hr>

        <h1>ИЗМЕНИТЬ ТОВАР</h1>

        <hr>

        <form method="POST" enctype="multipart/form-data" action="{{ route('products.update', $product) }}">
            <div>
                @method('PUT')
                @csrf

                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-group flex-nowrap mb-3">
                    <label class="input-group-text" for="category_id">ПОДКАТЕГОРИЯ</label>
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" @if($subcategory->id == $product->subcategory_id) selected @endif >{{ mb_strtoupper($subcategory->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">НАЗВАНИЕ</span>
                    </div>
                    <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">АРТИКУЛ</span>
                    </div>
                    <input type="text" name="code" id="code" value="{{ $product->code }}" class="form-control" placeholder="s001" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">SLUG</span>
                    </div>
                    <input type="text" name="slug" id="slug" value="{{ $product->slug }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">ЦЕНА</span>
                    </div>
                    <input type="text" name="price" id="price" value="{{ $product->price }}" class="form-control" placeholder="1000" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text">ОПИСАНИЕ</span>
                    <textarea name="description" id="description" class="form-control" aria-label="ОПИСАНИЕ">{{ $product->description }}</textarea>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text">КОРОТКОЕ ОПИСАНИЕ</span>
                    <textarea name="small_description" id="small_description" class="form-control" aria-label="КОРОТКОЕ ОПИСАНИЕ">{{ $product->small_description }}</textarea>
                </div>

                <input type="hidden" name="new" value="0">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="new" id="new" value="1" @if($product->new == 1) checked @endif >
                    <label class="form-check-label" for="new">
                        NEW
                    </label>
                </div>

                <input type="hidden" name="sale" value="0">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sale" id="sale" value="1" @if($product->sale == 1) checked @endif >
                    <label class="form-check-label" for="sale">
                        SALE
                    </label>
                </div>

                <input type="hidden" name="hit" value="0">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hit" id="hit" value="1" @if($product->hit == 1) checked @endif >
                    <label class="form-check-label" for="hit">
                        HIT
                    </label>
                </div>

                <input type="hidden" name="recommend" value="0">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="recommend" id="recommend" value="1" @if($product->recommend == 1) checked @endif >
                    <label class="form-check-label" for="recommend">
                        RECOMMEND
                    </label>
                </div>

                <button type="submit" class="btn btn-success mt-3">ИЗМЕНИТЬ</button>

            </div>
        </form>

    </div> <!-- /container -->
@endsection
