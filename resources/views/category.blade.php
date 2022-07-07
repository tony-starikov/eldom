@extends('master')

@section('title', $main_category->name)

@section('main')

    <div class="container-fluid d-none d-xl-block">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                        <li class="breadcrumb-item active"><a>{{ mb_strtoupper($main_category->name) }}</a></li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-3 ps-5">

                <h5>КАТЕГОРИИ</h5>

                <ul class="list-group">

                    @foreach($categories as $category)

                        <li class="list-group-item border-0">

                            <a class="text-decoration-none @if($main_category->id == $category->id) text-primary @else text-dark @endif " href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->name) }}</a>

                            @if($main_category->id == $category->id)

                                <ul class="list-group">

                                    @foreach($category->subcategories as $subcategory)

                                        <li class="list-group-item border-0">
                                            <a class="text-decoration-none text-dark" href="{{ route('showSubcategory', [$category->slug, $subcategory->slug]) }}">
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

                <section>

                    <div class="row px-2 py-0">
                        <div class="col-12 mt-0">

                            <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><h5>ФИЛЬТРЫ:</h5></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByPriceUp', $main_category->slug) }}"><h6 class="mt-1">ЦЕНА <i class="fas fa-chevron-up"></i></h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByPriceDown', $main_category->slug) }}"><h6 class="mt-1">ЦЕНА <i class="fas fa-chevron-down"></i></h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByNameA', $main_category->slug) }}"><h6 class="mt-1">НАЗВАНИЕ А-Я</h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByNameZ', $main_category->slug) }}"><h6 class="mt-1">НАЗВАНИЕ Я-А</h6></a></li>
                                </ol>
                            </nav>

                        </div>
                    </div>

                    <div class="row">

                        @foreach($main_subcategories as $subcategory)

                            <div class="col-4">

                                <div class="card m-2 mt-0">

                                    <a class="text-decoration-none text-dark" href="{{ route('showSubcategory', [$main_category->slug, $subcategory->slug]) }}">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ mb_strtoupper($subcategory->name) }}</h5>
                                        </div>
                                    </a>

                                </div>

                            </div>

                        @endforeach


                    </div>

                    <div class="row p-2">

                        <div class="col-12">

                            <section>

                                <div class="row">

                                    @foreach($category_products as $product)

                                        <div class="col-4 p-3">

                                            <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">
                                                <div class="card h-100">
                                                    <img src="/images/1.png" class="card-img-top img-fluid" alt="...">
                                                    <div class="card-body text-center">
                                                        <div class="row p-0 m-0">
                                                            <h6 class="card-title p-0 m-0 w-100 text-dark" style="min-height: 60px">{{ mb_strtoupper($product->name) }}</h6>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h3 class="card-title w-75 mx-auto">
                                                                    @if($product->new == 1) <span class="badge bg-success">NEW</span> @endif
                                                                    @if($product->sale == 1) <span class="badge bg-danger">SALE</span> @endif
                                                                    @if($product->hit == 1) <span class="badge bg-primary">HIT</span> @endif
                                                                </h3>
                                                                <h3 class="card-title w-75 mx-auto text-dark">
                                                                    {{ $product->price }} грн
                                                                </h3>
                                                            </div>
                                                            <div class="col-12">
                                                                <form action="{{ route('basketAdd', $product->id) }}" method="POST">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        В КОРЗИНУ <span><i class="fas fa-shopping-cart"></i></span>
                                                                    </button>
                                                                    @csrf
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </a>

                                        </div>

                                    @endforeach

                                </div>

                                <div class="row ">
                                    <nav class="d-flex justify-content-center mt-3">
                                        {{ $category_products->links() }}
                                    </nav>
                                </div>

                            </section>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>

{{--    //////////////////////////////////////--}}

    <div class="container-fluid d-none d-lg-block d-xl-none">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                        <li class="breadcrumb-item active"><a>{{ mb_strtoupper($main_category->name) }}</a></li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-12">

                <section>

                    <div class="row px-2 py-0">
                        <div class="col-12 mt-0">

                            <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><h5>ФИЛЬТРЫ:</h5></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByPriceUp', $main_category->slug) }}"><h6 class="mt-1">ЦЕНА <i class="fas fa-chevron-up"></i></h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByPriceDown', $main_category->slug) }}"><h6 class="mt-1">ЦЕНА <i class="fas fa-chevron-down"></i></h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByNameA', $main_category->slug) }}"><h6 class="mt-1">НАЗВАНИЕ А-Я</h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByNameZ', $main_category->slug) }}"><h6 class="mt-1">НАЗВАНИЕ Я-А</h6></a></li>
                                </ol>
                            </nav>

                        </div>
                    </div>

                    <div class="row">

                        @foreach($main_subcategories as $subcategory)

                            <div class="col-4">

                                <div class="card m-2">

                                    <a class="text-decoration-none text-dark" href="{{ route('showSubcategory', [$main_category->slug, $subcategory->slug]) }}">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ mb_strtoupper($subcategory->name) }}</h5>
                                        </div>
                                    </a>

                                </div>

                            </div>

                        @endforeach


                    </div>

                    <div class="row ">
                        <nav class="d-flex justify-content-center mt-3">
                            {{ $category_products->links() }}
                        </nav>
                    </div>

                </section>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-12">

                <section>

                    <div class="row">

                        @foreach($category_products as $product)

                            <div class="col-4 p-3">

                                <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">
                                    <div class="card h-100">
                                        <img src="/images/1.png" class="card-img-top img-fluid" alt="...">
                                        <div class="card-body text-center">
                                            <div class="row p-0 m-0">
                                                <h6 class="card-title p-0 m-0 w-100 text-dark" style="min-height: 60px">{{ mb_strtoupper($product->name) }}</h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="card-title w-75 mx-auto">
                                                        @if($product->new == 1) <span class="badge bg-success">NEW</span> @endif
                                                        @if($product->sale == 1) <span class="badge bg-danger">SALE</span> @endif
                                                        @if($product->hit == 1) <span class="badge bg-primary">HIT</span> @endif
                                                    </h3>
                                                    <h3 class="card-title w-75 mx-auto text-dark">
                                                        {{ $product->price }} грн
                                                    </h3>
                                                </div>
                                                <div class="col-12">
                                                    <form action="{{ route('basketAdd', $product->id) }}" method="POST">
                                                        <button type="submit" class="btn btn-primary">
                                                            В КОРЗИНУ <span><i class="fas fa-shopping-cart"></i></span>
                                                        </button>
                                                        @csrf
                                                    </form>
                                                </div>
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

{{--    /////////////////////////////////////--}}

    <div class="container-fluid d-none d-md-block d-lg-none">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                        <li class="breadcrumb-item active"><a>{{ mb_strtoupper($main_category->name) }}</a></li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-12">

                <section>

                    <div class="row px-2 py-0">
                        <div class="col-12 mt-0">

                            <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><h5>ФИЛЬТРЫ:</h5></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByPriceUp', $main_category->slug) }}"><h6 class="mt-1">ЦЕНА <i class="fas fa-chevron-up"></i></h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByPriceDown', $main_category->slug) }}"><h6 class="mt-1">ЦЕНА <i class="fas fa-chevron-down"></i></h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByNameA', $main_category->slug) }}"><h6 class="mt-1">НАЗВАНИЕ А-Я</h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByNameZ', $main_category->slug) }}"><h6 class="mt-1">НАЗВАНИЕ Я-А</h6></a></li>
                                </ol>
                            </nav>

                        </div>
                    </div>

                    <div class="row">

                        @foreach($main_subcategories as $subcategory)

                            <div class="col-6">

                                <div class="card m-2">

                                    <a class="text-decoration-none text-dark" href="{{ route('showSubcategory', [$main_category->slug, $subcategory->slug]) }}">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ mb_strtoupper($subcategory->name) }}</h5>
                                        </div>
                                    </a>

                                </div>

                            </div>

                        @endforeach


                    </div>

                </section>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-12">

                <section>

                    <div class="row p-0">

                        @foreach($category_products as $product)

                            <div class="col-6 p-1">

                                <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">
                                    <div class="card h-100">
                                        <img src="/images/1.png" class="card-img-top img-fluid" alt="...">
                                        <div class="card-body text-center">
                                            <div class="row p-0 m-0">
                                                <h6 class="card-title p-0 m-0 w-100 text-dark" style="min-height: 60px">{{ mb_strtoupper($product->name) }}</h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="card-title w-75 mx-auto">
                                                        @if($product->new == 1) <span class="badge bg-success">NEW</span> @endif
                                                        @if($product->sale == 1) <span class="badge bg-danger">SALE</span> @endif
                                                        @if($product->hit == 1) <span class="badge bg-primary">HIT</span> @endif
                                                    </h3>
                                                    <h3 class="card-title w-75 mx-auto text-dark">
                                                        {{ $product->price }} грн
                                                    </h3>
                                                </div>
                                                <div class="col-12">
                                                    <form action="{{ route('basketAdd', $product->id) }}" method="POST">
                                                        <button type="submit" class="btn btn-primary">
                                                            В КОРЗИНУ <span><i class="fas fa-shopping-cart"></i></span>
                                                        </button>
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </a>

                            </div>

                        @endforeach

                    </div>

                    <div class="row ">
                        <nav class="d-flex justify-content-center mt-3">
                            {{ $category_products->links() }}
                        </nav>
                    </div>

                </section>

            </div>

        </div>

    </div>

{{--    ///////////////////////////////////////////--}}

    <div class="container-fluid d-block d-md-none">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                        <li class="breadcrumb-item active"><a>{{ mb_strtoupper($main_category->name) }}</a></li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-12">

                <section>

                    <div class="row px-2 py-0">
                        <div class="col-12 mt-0">

                            <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><h5>ФИЛЬТРЫ:</h5></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByPriceUp', $main_category->slug) }}"><h6 class="mt-1">ЦЕНА <i class="fas fa-chevron-up"></i></h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByPriceDown', $main_category->slug) }}"><h6 class="mt-1">ЦЕНА <i class="fas fa-chevron-down"></i></h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByNameA', $main_category->slug) }}"><h6 class="mt-1">НАЗВАНИЕ А-Я</h6></a></li>
                                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('showCategoryByNameZ', $main_category->slug) }}"><h6 class="mt-1">НАЗВАНИЕ Я-А</h6></a></li>
                                </ol>
                            </nav>

                        </div>
                    </div>

                    <div class="row">

                        @foreach($main_subcategories as $subcategory)

                            <div class="col-12">

                                <div class="card m-2">

                                    <a class="text-decoration-none text-dark" href="{{ route('showSubcategory', [$main_category->slug, $subcategory->slug]) }}">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ mb_strtoupper($subcategory->name) }}</h5>
                                        </div>
                                    </a>

                                </div>

                            </div>

                        @endforeach


                    </div>

                </section>

            </div>



        </div>

        <div class="row p-2">

            <div class="col-12">

                <section>

                    <div class="row p-0">

                        @foreach($category_products as $product)

                            <div class="col-12 p-1">

                                <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">
                                    <div class="card h-100">
                                        <img src="/images/1.png" class="card-img-top img-fluid w-75 mx-auto" alt="...">
                                        <div class="card-body text-center">
                                            <div class="row p-0 m-0">
                                                <h6 class="card-title p-0 m-0 w-100 text-dark" style="min-height: 60px">{{ mb_strtoupper($product->name) }}</h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="card-title w-75 mx-auto">
                                                        @if($product->new == 1) <span class="badge bg-success">NEW</span> @endif
                                                        @if($product->sale == 1) <span class="badge bg-danger">SALE</span> @endif
                                                        @if($product->hit == 1) <span class="badge bg-primary">HIT</span> @endif
                                                    </h3>
                                                    <h3 class="card-title w-75 mx-auto text-dark">
                                                        {{ $product->price }} грн
                                                    </h3>
                                                </div>
                                                <div class="col-12">
                                                    <form action="{{ route('basketAdd', $product->id) }}" method="POST">
                                                        <button type="submit" class="btn btn-primary">
                                                            В КОРЗИНУ <span><i class="fas fa-shopping-cart"></i></span>
                                                        </button>
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </a>

                            </div>

                        @endforeach

                    </div>

                    <div class="row ">
                        <nav class="d-flex justify-content-center mt-3">
                            {{ $category_products->links() }}
                        </nav>
                    </div>

                </section>

            </div>

        </div>

    </div>

@endsection
