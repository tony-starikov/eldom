@extends('admin.master')

@section('title', 'ДОБАВИТЬ ПОДКАТЕГОРИЮ')

@section('main')
    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <h4>ДОБАВИТЬ ПОДКАТЕГОРИЮ</h4>

                <form method="POST" action="{{ route('subcategories.store') }}">
                    @csrf

                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group flex-nowrap mb-3">
                        <label class="input-group-text" for="category_id">КАТЕГОРИЯ</label>
                        <select name="category_id" id="category_id" class="form-select">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ mb_strtoupper($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">НАЗВАНИЕ</span>
                        </div>
                        <input type="text" name="name" id="name" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping" required>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">SLUG</span>
                        </div>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="SLUG" aria-describedby="addon-wrapping" required>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">ДОБАВИТЬ</button>
                </form>

            </div>

        </div>

    </div> <!-- /container -->
@endsection
