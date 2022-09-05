@extends('admin.master')

@section('title', 'ДОБАВИТЬ ТОВАР')

@section('main')
    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <h1>ДОБАВИТЬ ТОВАР</h1>

                <hr>

                <form method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
                    @csrf

                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group flex-nowrap mb-3">
                        <label class="input-group-text" for="category_id">ПОДКАТЕГОРИЯ</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-select">
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ mb_strtoupper($subcategory->name_ru) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">НАЗВАНИЕ RU</span>
                        </div>
                        <input type="text" name="name_ru" id="name_ru" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping" required>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">НАЗВАНИЕ UA</span>
                        </div>
                        <input type="text" name="name_ua" id="name_ua" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping" required>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">АРТИКУЛ</span>
                        </div>
                        <input type="text" name="code" id="code" class="form-control" placeholder="s001" aria-describedby="addon-wrapping" required>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">SLUG</span>
                        </div>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="SLUG" aria-describedby="addon-wrapping" required>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">ЦЕНА</span>
                        </div>
                        <input type="text" name="price" id="price" class="form-control" placeholder="1000" aria-describedby="addon-wrapping" required>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text">ОПИСАНИЕ RU</span>
                        <textarea name="description_ru" id="description_ru" class="form-control" aria-label="ОПИСАНИЕ"></textarea>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text">ОПИСАНИЕ UA</span>
                        <textarea name="description_ua" id="description_ua" class="form-control" aria-label="ОПИСАНИЕ"></textarea>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text">КАРТИНКА</span>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>

                    <input type="hidden" name="new" value="0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="new" id="new" value="1">
                        <label class="form-check-label" for="new">
                            NEW
                        </label>
                    </div>

                    <input type="hidden" name="sale" value="0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sale" id="sale" value="1">
                        <label class="form-check-label" for="sale">
                            SALE
                        </label>
                    </div>

                    <input type="hidden" name="hit" value="0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hit" id="hit" value="1">
                        <label class="form-check-label" for="hit">
                            HIT
                        </label>
                    </div>

                    <input type="hidden" name="recommend" value="0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="recommend" id="recommend" value="1">
                        <label class="form-check-label" for="recommend">
                            RECOMMEND
                        </label>
                    </div>

                    <input type="hidden" name="recommend" value="0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="status" id="status" value="1">
                        <label class="form-check-label" for="status">
                            В НАЛИЧИИ
                        </label>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">ДОБАВИТЬ</button>
                </form>

            </div>

        </div>

    </div> <!-- /container -->
@endsection
