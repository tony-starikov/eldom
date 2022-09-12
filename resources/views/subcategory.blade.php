@extends('master')

@section('title', mb_strtoupper($main_subcategory->__('name')) . ' | Electro-dom')

@section('description', mb_strtoupper($main_subcategory->__('name')) . ' | Заказать электротехнику и электрику в интернет-магазине Electro-dom; Широкий выбор; Лучшие цены в Одессе; Доставка по Украине;')

@section('keywords', 'Все о ' . mb_strtoupper($main_subcategory->__('name')))

@section('main')

    <div class="container-fluid">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">{{ __('subcategory.breadcrumb_main') }}</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategory', $main_category->slug) }}">{{ mb_strtoupper($main_category->__('name')) }}</a></li>
                        <li class="breadcrumb-item active"><a>{{ mb_strtoupper($main_subcategory->__('name')) }}</a></li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-3 d-none d-lg-block ps-5">

                <h5>{{ __('subcategory.categories') }}</h5>

                <ul class="list-group">

                    @foreach($categories as $category)

                        <li class="list-group-item border-0">

                            <a class="text-decoration-none @if($main_category->id == $category->id) text-primary @else text-dark @endif " href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->__('name')) }}</a>

                            @if($main_category->id == $category->id)

                                <ul class="list-group">

                                    @foreach($category->subcategories as $subcategory)

                                        <li class="list-group-item border-0">
                                            <a class="text-decoration-none @if($main_subcategory->id == $subcategory->id) text-primary @else text-dark @endif " href="{{ route('showSubcategory', [$category->slug, $subcategory->slug]) }}">
                                                | {{ mb_strtoupper($subcategory->__('name')) }}
                                            </a>
                                        </li>

                                    @endforeach

                                </ul>

                            @endif

                        </li>

                    @endforeach

                </ul>


            </div>

            <div class="col-12 col-lg-9">

                <section>

                    <div class="row px-2 py-0">
                        <div class="col-12 mt-0">

                            <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><h5>{{ __('subcategory.filters') }}</h5></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showSubcategoryByPriceUp', [$main_category->slug, $main_subcategory->slug]) }}"><h6 class="mt-1">{{ __('subcategory.filters_price') }} <i class="fas fa-chevron-up"></i></h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showSubcategoryByPriceDown', [$main_category->slug, $main_subcategory->slug]) }}"><h6 class="mt-1">{{ __('subcategory.filters_price') }} <i class="fas fa-chevron-down"></i></h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showSubcategoryByNameA', [$main_category->slug, $main_subcategory->slug]) }}"><h6 class="mt-1">{{ __('subcategory.filters_name') }} А-Я</h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showSubcategoryByNameZ', [$main_category->slug, $main_subcategory->slug]) }}"><h6 class="mt-1">{{ __('subcategory.filters_name') }} Я-А</h6></a></li>
                                </ol>
                            </nav>

                        </div>
                    </div>

                    <h5 class="px-2">{{ mb_strtoupper($main_subcategory->__('name')) }}</h5>

                    <div class="row">

                        @foreach($subcategory_products as $product)

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
                                                    <span class="d-inline d-sm-none d-md-inline">{{ __('subcategory.product_basket') }}</span> <span><i class="fas fa-shopping-cart"></i></span>
                                                </button>
                                                @csrf
                                            </form>
                                        </div>
                                    </div>

                                </a>

                            </div>

                        @endforeach

                    </div>

                    <div class="row ">
                        <nav class="d-flex justify-content-center mt-3">
                            {{ $subcategory_products->links() }}
                        </nav>
                    </div>

                </section>

            </div>

        </div>

    </div>

@endsection
