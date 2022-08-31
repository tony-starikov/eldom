@extends('admin.master')

@section('title', 'ДОБАВИТЬ ХАРАКТЕРИСТИКУ')

@section('main')
    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <h4>ДОБАВИТЬ ХАРАКТЕРИСТИКУ</h4>

                <form method="POST" action="{{ route('features.store') }}">
                    @csrf

                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group flex-nowrap mb-3">
                        <label class="input-group-text" for="product_id">ТОВАР</label>
                        <select name="product_id" id="product_id" class="form-select">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->id }} | {{ mb_strtoupper($product->name_ru) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">ХАРАКТЕРИСТИКА RU</span>
                        </div>
                        <input type="text" name="feature_ru" id="feature_ru" class="form-control" aria-describedby="addon-wrapping" required>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">ХАРАКТЕРИСТИКА UA</span>
                        </div>
                        <input type="text" name="feature_ua" id="feature_ua" class="form-control" aria-describedby="addon-wrapping" required>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">ДОБАВИТЬ</button>
                </form>

            </div>

        </div>

    </div> <!-- /container -->
@endsection
