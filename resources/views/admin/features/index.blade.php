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
                                <td>{{ mb_strtoupper($feature->product->name ) }}</td>
                                <td>{{ $feature->feature }}</td>

                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('features.edit', $feature) }}"><button type="button" class="btn btn-link">ИЗМЕНИТЬ</button></a>
                                        {{--                                            <a href="{{ route('users.show', $user) }}"><button type="button" class="btn btn-link">@if($user->status == 1) UNBLOCK @else BLOCK @endif</button></a>--}}
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
