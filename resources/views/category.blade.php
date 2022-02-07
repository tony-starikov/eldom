@extends('master')

@section('title', $category->name)

@section('main')

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <section class="text-center">

                    <h1>{{ $category->name }}</h1>

                </section>

            </div>

        </div>

    </div>

@endsection
