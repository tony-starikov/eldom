@extends('admin.master')

@section('title', 'ДОБАВИТЬ КАТЕГОРИЮ')

@section('main')
    <div class="container-fluid">

        <div class="row">

            <div class="col-6">

                <h4>ДОБАВИТЬ КАТЕГОРИЮ</h4>

                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf

                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

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
