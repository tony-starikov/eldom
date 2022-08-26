@extends('master')

@section('title', 'ДОСТАВКА И ОПЛАТА')

@section('main')

    <div class="container-fluid">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">{{ __('delivery.breadcrumb_main') }}</a></li>
                        <li class="breadcrumb-item active"><a>{{ __('delivery.breadcrumb_delivery') }}</a></li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-3 d-none d-lg-block ps-5">

                <h5>КАТЕГОРИИ</h5>

                <ul class="list-group">

                    @foreach($categories as $category)

                        <li class="list-group-item border-0">

                            <a class="text-decoration-none text-dark" href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->name) }}</a>

                        </li>

                    @endforeach

                </ul>


            </div>

            <div class="col-12 col-lg-9">

                <h5>{{ __('delivery.breadcrumb_delivery') }}</h5>

                <section>

                    <div class="row">

                        <div class="col-12 col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h6 class="text-uppercase">{{ __('delivery.bank_transfer') }}</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ __('delivery.bank_transfer_paragraph_1') }}</li>
                                    <li class="list-group-item">{{ __('delivery.bank_transfer_paragraph_2') }}</li>
                                    <li class="list-group-item">{{ __('delivery.bank_transfer_paragraph_3') }}</li>
                                    <li class="list-group-item">{{ __('delivery.bank_transfer_paragraph_4') }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h6 class="text-uppercase">{{ __('delivery.requisites') }}</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ __('delivery.requisites_paragraph_1') }}</li>
                                    <li class="list-group-item">{{ __('delivery.requisites_paragraph_2') }}</li>
                                    <li class="list-group-item">{{ __('delivery.requisites_paragraph_3') }}</li>
                                    <li class="list-group-item">{{ __('delivery.requisites_paragraph_4') }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h6 class="text-uppercase">{{ __('delivery.cash') }}</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ __('delivery.cash_paragraph_1') }}</li>
                                    <li class="list-group-item">{{ __('delivery.cash_paragraph_2') }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h6 class="text-uppercase">{{ __('delivery.free_delivery') }}</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ __('delivery.free_delivery_paragraph_1') }}</li>
                                    <li class="list-group-item">{{ __('delivery.free_delivery_paragraph_2') }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h6 class="text-uppercase">{{ __('delivery.nova_delivery') }}</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ __('delivery.nova_delivery_paragraph_1') }}</li>
                                    <li class="list-group-item">{{ __('delivery.nova_delivery_paragraph_2') }}</li>
                                    <li class="list-group-item">{{ __('delivery.nova_delivery_paragraph_3') }}</li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>

@endsection
