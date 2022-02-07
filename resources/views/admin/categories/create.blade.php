@extends('admin.master')

@section('title', 'ДОБАВИТЬ КАТЕГОРИЮ')

@section('main')
    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <h1>ДОБАВИТЬ КАТЕГОРИЮ</h1>

                <hr>

                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf

                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">НАЗВАНИЕ</span>
                        </div>
                        <input type="text" name="name" id="name" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">SLUG</span>
                        </div>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="SLUG" aria-describedby="addon-wrapping">
                    </div>

                    <button type="submit" class="btn btn-success mt-3">ДОБАВИТЬ</button>
                </form>

            </div>

        </div>

    </div> <!-- /container -->
@endsection
