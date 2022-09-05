@extends('admin.master')

@section('title', 'ИЗМЕНИТЬ РЕКВИЗИТЫ')

@section('main')
    <div class="container-fluid">

        <hr>

        <h1>ИЗМЕНИТЬ РЕКВИЗИТЫ</h1>

        <hr>

        <form method="POST" enctype="multipart/form-data" action="{{ route('requisites.update', $requisite) }}">
            <div>
                @method('PUT')
                @csrf

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Код получателя</span>
                    </div>
                    <input type="text" name="code" id="code" value="{{ $requisite->code }}" class="form-control" aria-describedby="addon-wrapping" required>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Р/С получателя</span>
                    </div>
                    <input type="text" name="payment_account" id="payment_account" value="{{ $requisite->payment_account }}" class="form-control" aria-describedby="addon-wrapping" required>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">МФО получателя</span>
                    </div>
                    <input type="text" name="interbranch_turnover" id="interbranch_turnover" value="{{ $requisite->interbranch_turnover }}" class="form-control" aria-describedby="addon-wrapping" required>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Получатель</span>
                    </div>
                    <input type="text" name="recipient" id="recipient" value="{{ $requisite->recipient }}" class="form-control" aria-describedby="addon-wrapping" required>
                </div>

                <button type="submit" class="btn btn-success mt-3">ИЗМЕНИТЬ</button>

            </div>
        </form>

    </div> <!-- /container -->
@endsection
