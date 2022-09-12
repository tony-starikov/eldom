@extends('master')

@section('title', $page_info->__('title'))

@section('description', $page_info->description)

@section('keywords', $page_info->description)

@section('main')

    <div class="container-fluid">

        <h1 class="d-none">{{ __('search.breadcrumb_search') }}</h1>

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">{{ __('search.breadcrumb_main') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('search.breadcrumb_search') }}</li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-3 d-none d-lg-block ps-5">

                <h5>{{ __('search.categories') }}</h5>

                <ul class="list-group">

                    @foreach($categories as $category)

                        <li class="list-group-item border-0">

                            <a class="text-decoration-none text-dark" href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->__('name')) }}</a>

                        </li>

                    @endforeach

                </ul>

            </div>

            <div class="col-12 col-lg-9">

                <section>

                    <div class="row p-2">

                        <div class="col-12">

                            <section>

                                <div class="row">

                                    @foreach($products as $product)

                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 p-3">

                                            <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">

                                                <div class="card h-100">

                                                    <div class="text-center mt-3 p-1" style="max-height: 60%;">
                                                        <img src="{{ asset('images/'.$product->image) }}" class="img h-100" style="max-width: 100%;" alt="...">
                                                    </div>

                                                    <div class="card-img-overlay">
                                                        <h5 class="card-title">
                                                            @if($product->new == 1) <span class="badge bg-success">NEW</span> @endif
                                                            @if($product->sale == 1) <span class="badge bg-danger">SALE</span> @endif
                                                            @if($product->hit == 1) <span class="badge bg-primary">HIT</span> @endif
                                                        </h5>
                                                    </div>

                                                    <div class="card-body text-center pb-0 px-1">
                                                        <h6 class="card-title text-secondary fw-bold">
                                                            {{ mb_strtoupper($product->__('name')) }}
                                                        </h6>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-between">
                                                        <h4 class="card-text d-inline-block fw-bold text-secondary">
                                                            {{ $product->price }} грн
                                                        </h4>
                                                        <form class="d-inline-block" style="z-index: 2000;" action="{{ route('basketAdd', $product->id) }}" method="POST">
                                                            <button type="submit" class="btn btn-primary">
                                                                <span class="d-inline d-sm-none d-md-inline">{{ __('search.product_basket') }}</span> <span><i class="fas fa-shopping-cart"></i></span>
                                                            </button>
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>

                                            </a>

                                        </div>

                                    @endforeach

                                </div>

                            </section>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>

@endsection
