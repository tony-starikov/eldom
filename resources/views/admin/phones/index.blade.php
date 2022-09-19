@extends('admin.master')

@section('title', 'ТЕЛЕФОНЫ')

@section('main')
    <div class="container-fluid">

        <h4>ТЕЛЕФОНЫ</h4>
        <a class="btn btn-success" type="button" href="{{ route('phones.create') }}">ДОБАВИТЬ ТЕЛЕФОН</a>

        <div class="row">

                <div class="col-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ТЕЛЕФОН</th>
                                <th scope="col">ОСНОВНОЙ</th>
                                <th scope="col">ДЕЙСТВИЯ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($phones as $phone)
                            <tr>
                                <th scope="row">{{ $phone->id }}</th>
                                <td>{{ $phone->phone }}</td>
                                <td>@if($phone->main == 1) + @else @endif</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('phones.edit', $phone) }}"><button type="button" class="btn btn-link">ИЗМЕНИТЬ</button></a>
                                        <form id="delete-form" action="{{ route('phones.destroy', $phone) }}" method="POST">
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
