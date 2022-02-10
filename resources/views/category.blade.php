@extends('master')

@section('title', $main_category->name)

@section('main')

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                        <li class="breadcrumb-item active"><a>{{ mb_strtoupper($main_category->name) }}</a></li>
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

                </section>

            </div>

        </div>

    </div>

@endsection
