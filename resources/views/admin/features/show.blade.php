@extends('admin.master')

@section('title', 'SHOW ' . $software->name)

@section('content')
    <div class="container">

        <hr>

        <h1>SHOW SOFTWARE</h1>

        <hr>

        <img src="{{ Storage::url($software->image) }}" alt="{{ $software->name }}" class="img-fluid" height="50px">

        <h2>name: {{ $software->name }}</h2>

        <h2>id: {{ $software->id }}</h2>

        <hr>

    </div> <!-- /container -->
@endsection
