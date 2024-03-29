@extends('admin.master')

@section('title', 'ХАРАКТЕРИСТИКИ')

@section('main')
    <div class="container-fluid">

        <h4>ХАРАКТЕРИСТИКИ ТОВАРОВ</h4>
        <a class="btn btn-success" type="button" href="{{ route('features.create') }}">ДОБАВИТЬ ХАРАКТЕРИСТИКУ</a>

        <div class="row">

                <div class="col-12">

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
                        @foreach($features as $feature)
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
