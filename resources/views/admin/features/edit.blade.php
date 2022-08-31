@extends('admin.master')

@section('title', 'ИЗМЕНИТЬ ХАРАКТЕРИСТИКУ')

@section('main')
    <div class="container-fluid">

        <hr>

        <h1>ИЗМЕНИТЬ ХАРАКТЕРИСТИКУ</h1>

        <hr>

        <form method="POST" enctype="multipart/form-data" action="{{ route('features.update', $feature) }}">
            <div>
                @method('PUT')
                @csrf

                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-group flex-nowrap mb-3">
                    <label class="input-group-text" for="product_id">ТОВАР</label>
                    <select name="product_id" id="product_id" class="form-select">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" @if($product->id == $feature->product_id) selected @endif >{{ $product->id }} | {{ mb_strtoupper($product->name_ru) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">ХАРАКТЕРИСТИКА RU</span>
                    </div>
                    <input type="text" name="feature_ru" id="feature_ru" value="{{ $feature->feature_ru }}" class="form-control" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">ХАРАКТЕРИСТИКА UA</span>
                    </div>
                    <input type="text" name="feature_ua" id="feature_ua" value="{{ $feature->feature_ua }}" class="form-control" aria-describedby="addon-wrapping">
                </div>

                <button type="submit" class="btn btn-success mt-3">ИЗМЕНИТЬ</button>

            </div>
        </form>

    </div> <!-- /container -->
@endsection
