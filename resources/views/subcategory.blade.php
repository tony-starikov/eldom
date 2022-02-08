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

                <ul>

                    @foreach($categories as $category)

                        <li>

                            <a class="text-decoration-none text-dark @if($main_category->id == $category->id) bg-warning @endif " href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->name) }}</a>

                            @if($main_category->id == $category->id)

                                <ul>

                                    @foreach($category->subcategories as $subcategory)

                                        <li>
                                            <a class="text-decoration-none text-dark @if($main_subcategory->id == $subcategory->id) bg-warning @endif  " href="{{ route('showSubcategory', [$category->slug, $subcategory->slug]) }}">
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



                    </div>

                </section>

            </div>

        </div>

    </div>

@endsection
