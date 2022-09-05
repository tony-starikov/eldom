@extends('admin.master')

@section('title', 'РЕКВИЗИТЫ')

@section('main')
    <div class="container-fluid">

        <h4>РЕКВИЗИТЫ</h4>

        <div class="row">

                <div class="col-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Код получателя</th>
                                <th scope="col">Р/С получателя</th>
                                <th scope="col">МФО получателя</th>
                                <th scope="col">Получатель</th>
                                <th scope="col">ДЕЙСТВИЯ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $requisites->code }}</td>
                                <td>{{ $requisites->payment_account }}</td>
                                <td>{{ $requisites->interbranch_turnover }}</td>
                                <td>{{ $requisites->recipient }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('requisites.edit', $requisites) }}"><button type="button" class="btn btn-link">ИЗМЕНИТЬ</button></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
        </div>
    </div> <!-- /container -->
@endsection
