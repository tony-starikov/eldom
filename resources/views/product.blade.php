@extends('master')

@section('title', $main_subcategory->name)

@section('main')

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategory', $main_category->slug) }}">{{ mb_strtoupper($main_category->name) }}</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showSubcategory', [$main_category->slug, $main_subcategory->slug]) }}">{{ mb_strtoupper($main_subcategory->name) }}</a></li>
                        <li class="breadcrumb-item active"><a>{{ mb_strtoupper($main_product->name) }}</a></li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row">

            <div class="col-3">

                <h5>КАТЕГОРИИ</h5>

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

            <div class="col-9">

                <h5>{{ mb_strtoupper($main_product->name) }}</h5>

                    <div class="row">

                        <div class="col-6 text-center"><img src="/images/1.png" class="img-fluid w-75 my-5" alt="{{ $main_product->name }}"></div>

                        <div class="col-6">
                            <h6>АРТИКУЛ: {{ $main_product->code }}</h6>
                            <h6 class="text-primary">@if($main_product->status == 1) В НАЛИЧИИ @else ОЖИДАЕТСЯ ПОСТАВКА @endif</h6>
                            <p>{{ $main_product->small_description }}</p>
                            <h3 class="text-primary">{{ $main_product->price }} грн</h3>
                            <form action="{{ route('basketAdd', $main_product->id) }}" method="POST">
                                <button type="submit" class="btn btn-primary">
                                    В КОРЗИНУ <span><i class="fas fa-shopping-cart"></i></span>
                                </button>
                                @csrf
                            </form>
                        </div>

                    </div>

            </div>

        </div>

    </div>

@endsection
