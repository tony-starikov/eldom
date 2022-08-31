@extends('admin.master')

@section('title', 'ИЗМЕНИТЬ ТОВАР')

@section('main')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h4>ИЗМЕНИТЬ ТОВАР</h4>

                <form method="POST" enctype="multipart/form-data" action="{{ route('products.update', $product) }}">
                    <div>
                        @method('PUT')
                        @csrf

                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="input-group flex-nowrap mb-3">
                            <label class="input-group-text" for="subcategory_id">ПОДКАТЕГОРИЯ</label>
                            <select name="subcategory_id" id="subcategory_id" class="form-select">
                                @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" @if($subcategory->id == $product->subcategory_id) selected @endif >{{ mb_strtoupper($subcategory->name_ru) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">НАЗВАНИЕ RU</span>
                            </div>
                            <input type="text" name="name_ru" id="name_ru" value="{{ $product->name_ru }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping" required>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">НАЗВАНИЕ UA</span>
                            </div>
                            <input type="text" name="name_ua" id="name_ua" value="{{ $product->name_ua }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping" required>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">АРТИКУЛ</span>
                            </div>
                            <input type="text" name="code" id="code" value="{{ $product->code }}" class="form-control" placeholder="s001" aria-describedby="addon-wrapping" required>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">SLUG</span>
                            </div>
                            <input type="text" name="slug" id="slug" value="{{ $product->slug }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping" required>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">ЦЕНА</span>
                            </div>
                            <input type="text" name="price" id="price" value="{{ $product->price }}" class="form-control" placeholder="1000" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text">ОПИСАНИЕ RU</span>
                            <textarea name="description_ru" id="description_ru" class="form-control" aria-label="ОПИСАНИЕ">{{ $product->description_ru }}</textarea>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text">ОПИСАНИЕ UA</span>
                            <textarea name="description_ua" id="description_ua" class="form-control" aria-label="ОПИСАНИЕ">{{ $product->description_ua }}</textarea>
                        </div>

                        @if($product->image)
                            <img src="/images/{{ $product->image }}" class="img-thumbnail mb-3 w-25" alt="{{ $product->image }}">
                        @endif

                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text">КАРТИНКА</span>
                            <input class="form-control" type="file" name="image" id="image">
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

                        <button type="submit" class="btn btn-success mt-3">ИЗМЕНИТЬ ТОВАР</button>

                    </div>
                </form>
            </div>
        </div>

        <div class="row my-3">

            <div class="col-12">

                <h4>ХАРАКТЕРИСТИКИ ТОВАРА - {{ mb_strtoupper($product->name_ru) }}</h4>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ТОВАР</th>
                        <th scope="col">ХАРАКТЕРИСТИКА</th>
                        <th scope="col">ДЕЙСТВИЯ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product->features as $feature)
                        <tr>
                            <th scope="row">{{ $feature->id }}</th>
                            <td>{{ mb_strtoupper($feature->product->name_ru ) }}</td>
                            <td>{{ $feature->feature_ru }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('features.edit', $feature) }}"><button type="button" class="btn btn-link">ИЗМЕНИТЬ</button></a>
                                    <form id="delete-form" action="{{ route('features.destroy', $feature) }}" method="POST">
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
