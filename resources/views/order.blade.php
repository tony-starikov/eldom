@extends('master')

@section('title', $page_info->__('title'))

@section('description', $page_info->description)

@section('main')

    <div class="container-fluid">

        <h1 class="d-none">{{ __('order.breadcrumb_order') }}</h1>

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">{{ __('order.breadcrumb_main') }}</a></li>
                        <li class="breadcrumb-item active"><a>{{ __('order.breadcrumb_order') }}</a></li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-3 d-none d-lg-block ps-5">

                <h5>{{ __('order.categories') }}</h5>

                <ul class="list-group">

                    @foreach($categories as $category)

                        <li class="list-group-item border-0">

                            <a class="text-decoration-none text-dark" href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->__('name')) }}</a>

                        </li>

                    @endforeach

                </ul>


            </div>

            <div class="col-12 col-lg-9">

                <h5>{{ __('order.breadcrumb_order') }}</h5>

                <section>

                    <div class="row">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6 mx-auto text-center">
                                    <h5>{{ __('order.total_cost') }}{{ $order->getFullPrice() }} грн</h5>
                                </div>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('orderConfirm') }}">
                            @csrf

                            <div class="row mb-3">

                                <div class="col-lg-8">

                                    <div class="card mb-4">
                                        <h5 class="card-header">{{ __('order.contact_details') }}</h5>
                                        <div class="card-body">

                                            <div class="form-group mb-3">
                                                <label for="email">{{ __('order.email') }}</label>
                                                <input value="{{ old('email', $user_email) }}" name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" required/>
                                            </div>

                                            <!-- Name input -->
                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="name">{{ __('order.name') }}</label>
                                                <input value="{{ old('name', $user_name) }}" type="text" name="name" id="name" class="form-control" required/>
                                            </div>

                                            <!-- Name input -->
                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="address">{{ __('order.address') }}</label>
                                                <input value="{{ old('address') }}" type="text" name="address" id="address" class="form-control" />
                                                <small id="emailHelp" class="form-text text-muted">{{ __('order.address_info') }}</small>
                                            </div>

                                            <!-- Phone input -->
                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="form1Example2">{{ __('order.phone') }}</label>
                                                <input value="{{ old('phone', $user_phone) }}" type="text" name="phone" id="phone" class="form-control" required/>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="card mb-4">
                                        <h5 class="card-header">{{ __('order.delivery') }}</h5>
                                        <div class="card-body">

                                            <!-- Phone input -->
                                            <div class="form-outline mb-4 text-start">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="delivery" value="1" id="delivery1" @if(old('delivery') == 1) checked @endif />
                                                    <label class="form-check-label" for="delivery1">
                                                        {{ __('order.pickup') }}
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="delivery" value="2" id="delivery2" @if(old('delivery') == 2) checked @endif/>
                                                    <label class="form-check-label" for="delivery2">
                                                        {{ __('order.new_post') }}
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card mb-4">
                                        <h5 class="card-header">{{ __('order.payment') }}</h5>
                                        <div class="card-body">

                                            <!-- Phone input -->
                                            <div class="form-outline mb-4 text-start">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment" value="1" id="payment1" @if(old('payment') == 1) checked @endif/>
                                                    <label class="form-check-label" for="payment1">
                                                        {{ __('order.cash') }}
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment" value="2" id="payment2" @if(old('payment') == 2) checked @endif/>
                                                    <label class="form-check-label" for="payment2">
                                                        {{ __('order.bank_transfer') }}
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment" value="3" id="payment3" @if(old('payment') == 3) checked @endif/>
                                                    <label class="form-check-label" for="payment3">
                                                        {{ __('order.cash_on_delivery') }}
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row mb-4">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success btn-lg btn-block">{{ __('order.button') }}</button>
                                </div>
                            </div>

                        </form>



                    </div>

                </section>

            </div>


        </div>

    </div>

@endsection

