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
                        <li class="breadcrumb-item active"><a>{{ mb_strtoupper($main_subcategory->name) }}</a></li>
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

                <h5>{{ mb_strtoupper($main_subcategory->name) }}</h5>

                <section>

                    <div class="row">


                        @foreach($main_subcategory->products as $product)

                            <div class="col-4 p-3">

                                <a class="text-decoration-none" href="{{ route('showProduct', [$main_category->slug, $main_subcategory->slug, $product->slug]) }}">
                                    <div class="card h-100">
                                        <img src="/images/1.png" class="card-img-top img-fluid" alt="...">
                                        <div class="card-body text-center">
                                            <p class="card-title w-75 mx-auto text-dark">{{ mb_strtoupper($product->name) }}</p>
                                            <h3 class="card-title w-75 mx-auto">{{ $product->price }} грн</h3>
                                            <form action="{{ route('basketAdd', $product->id) }}" method="POST">
                                                <button type="submit" class="btn btn-primary">
                                                    В КОРЗИНУ <span><i class="fas fa-shopping-cart"></i></span>
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

    </div>

@endsection
