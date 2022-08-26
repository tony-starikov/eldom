@extends('master')

@section('title', mb_strtoupper($main_product->name))

@section('main')

    <div class="container-fluid">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">{{ __('product.breadcrumb_main') }}</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategory', $main_category->slug) }}">{{ mb_strtoupper($main_category->name) }}</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showSubcategory', [$main_category->slug, $main_subcategory->slug]) }}">{{ mb_strtoupper($main_subcategory->name) }}</a></li>
                        <li class="breadcrumb-item active"><a>{{ mb_strtoupper($main_product->name) }}</a></li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row">

            <div class="col-3 d-none d-lg-block ps-5">

                <h5>{{ __('product.categories') }}</h5>

                <ul class="list-group">

                    @foreach($categories as $category)

                        <li class="list-group-item border-0">

                            <a class="text-decoration-none @if($main_category->id == $category->id) text-primary @else text-dark @endif " href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->name) }}</a>

                            @if($main_category->id == $category->id)

                                <ul class="list-group">

                                    @foreach($category->subcategories as $subcategory)

                                        <li class="list-group-item border-0">
                                            <a class="text-decoration-none @if($main_subcategory->id == $subcategory->id) text-primary @else text-dark @endif " href="{{ route('showSubcategory', [$category->slug, $subcategory->slug]) }}">
                                                | {{ mb_strtoupper($subcategory->name) }}
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

                <h5>{{ mb_strtoupper($main_product->name) }}</h5>

                    <div class="row">

                        <div class="col-6 text-center"><img src="{{ $main_product->image }}" class="img-fluid w-75 my-5" alt="{{ $main_product->name }}"></div>

                        <div class="col-6">
                            <hr>
                            <h3 class="card-title w-75">
                                @if($main_product->new == 1) <span class="badge bg-success">NEW</span> @endif
                                @if($main_product->sale == 1) <span class="badge bg-danger">SALE</span> @endif
                                @if($main_product->hit == 1) <span class="badge bg-primary">HIT</span> @endif
                            </h3>
                            <h6>{{ __('product.vendor_code') }} {{ $main_product->code }}</h6>
                            <h6 class="text-primary">@if($main_product->status == 1) {{ __('product.in_stock_true') }} @else {{ __('product.in_stock_false') }} @endif</h6>
                            <hr>
                            <p class="lh-base">{{ $main_product->small_description }}</p>
                            <hr>
                            <h3 class="text-primary">{{ $main_product->price }} грн</h3>
                            <form action="{{ route('basketAdd', $main_product->id) }}" method="POST">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('product.product_basket') }} <span><i class="fas fa-shopping-cart"></i></span>
                                </button>
                                @csrf
                            </form>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-12">

                            <hr>

                            <h4>{{ __('product.description') }}</h4>

                            <h5 class="fw-normal lh-base w-75">{{ $main_product->description }}</h5>

                            <hr>

                            <h4>{{ __('product.features') }}</h4>

                            <ul class="list-group mb-3">

                                @foreach($main_product->features as $feature)

                                    <li class="list-group-item border-0">
                                        <h6 class="m-0 p-0">
                                            {{ $feature->feature }}
                                        </h6>
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                        <hr>

                    </div>

            </div>

        </div>

    </div>

@endsection
