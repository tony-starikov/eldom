@extends('master')

@section('title', $page_info->__('title'))

@section('description', $page_info->description)

@section('main')

    <div class="container-fluid">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">{{ __('basket.breadcrumb_main') }}</a></li>
                        <li class="breadcrumb-item active"><a>{{ __('basket.breadcrumb_basket') }}</a></li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-3 d-none d-lg-block ps-5">

                <h5>{{ __('basket.categories') }}</h5>

                <ul class="list-group">

                    @foreach($categories as $category)

                        <li class="list-group-item border-0">

                            <a class="text-decoration-none text-dark" href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->__('name')) }}</a>

                        </li>

                    @endforeach

                </ul>


            </div>

            <div class="col-12 col-lg-9">

                <h5>{{ __('basket.breadcrumb_basket') }}</h5>

                <section>

                    <div class="row">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6 mx-auto text-center">
                                    <h5>{{ __('basket.total_cost') }}{{ $order->getFullPrice() }} грн</h5>
                                    <a type="button" class="btn btn-success btn-lg" href="{{ route('orderCheck') }}">{{ __('basket.checkout_button') }}</a>
                                </div>
                            </div>
                        </div>

                        @foreach($order->products as $product)
                            <div class="col-12 col-sm-6 col-lg-4 col-xxl-3 p-3">

                                <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">
                                    <div class="card h-100">
                                        <div class="text-center mt-3 p-1" style="height: 60%;">
                                            <img src="{{ asset('images/'.$product->image) }}" class="img h-100" style="max-width: 100%;" alt="...">
                                        </div>
                                        <div class="card-body text-center pb-0 px-1">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">{{ mb_strtoupper($product->__('name')) }}</li>
                                                <li class="list-group-item fw-bold">{{ __('basket.price') }}{{ $product->price }} грн</li>
                                                <li class="list-group-item fw-bold">{{ __('basket.total') }}{{ $product->getPriceForCount() }} грн</li>
                                            </ul>
                                        </div>
                                        <div class="card-footer text-center">
                                            <div class="btn-group" role="group">
                                                <form action="{{ route('basketAdd', $product->id) }}" method="POST">
                                                    <button type="submit" class="btn btn-link btn-lg"><span><i class="fas fa-plus"></i></span></button>
                                                    @csrf
                                                </form>
                                                <button class="btn btn-link btn-lg text-decoration-none fw-bold">{{ $product->pivot->count }}</button>
                                                <form action="{{ route('basketRemove', $product->id) }}" method="POST">
                                                    <button type="submit" class="btn btn-link btn-lg"><i class="fas fa-minus"></i></button>
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endforeach

                    </div>

                </section>

            </div>


        </div>

    </div>

@endsection

