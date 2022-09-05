@extends('master')

@section('title', $page_info->__('title'))

@section('description', $page_info->description)

@section('main')

    <div class="row p-0 w-100">

        <h1 class="d-none">{{ __('master.main_menu') }}</h1>

        <div class="col-12 p-0">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img style="max-height: 35vh" src="/images/flag.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption h-100">
                            <h2 class="mt-4 mt-md-5">Ми продовжуємо працювати. Ціни та наявність товару уточнюйте у менеджерів.</h2>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img style="max-height: 35vh" src="/images/flag.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption h-100">
                            <h2 class="mt-4 mt-md-5">Все буде Україна! Працюємо для перемоги!</h2>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="col-12 p-0">

            <section>

                <div class="row d-flex flex-wrap px-5">

                    <div class="col-12 col-sm-6 col-xl-3 mt-3 text-center align-self-stretch">

                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-subtitle my-4"><i class="fas fa-percent fa-7x text-primary"></i></h6>
                                <h4 class="card-title text-secondary fw-bold mb-2">{{ __('master.discount') }}</h4>
                                <p class="card-text">{{ __('master.discount_text') }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-xl-3 mt-3 text-center align-self-stretch">

                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-subtitle my-4"><i class="fas fa-check fa-7x text-primary"></i></h6>
                                <h4 class="card-title text-secondary fw-bold mb-2">{{ __('master.guarantee') }}</h4>
                                <p class="card-text">{{ __('master.guarantee_text') }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-xl-3 mt-3 text-center align-self-stretch">

                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-subtitle my-4"><i class="fas fa-truck fa-7x text-primary"></i></h6>
                                <h4 class="card-title text-secondary fw-bold mb-2">{{ __('master.delivery') }}</h4>
                                <p class="card-text">{{ __('master.delivery_text') }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-xl-3 mt-3 text-center align-self-stretch">

                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-subtitle my-4"><i class="fas fa-shopping-cart fa-7x text-primary"></i></h6>
                                <h4 class="card-title text-secondary fw-bold mb-2">{{ __('master.payment') }}</h4>
                                <p class="card-text">{{ __('master.payment_text') }}</p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row d-flex flex-wrap px-5 mt-4">

                    <div class="col-12 text-center">
                        <h3 class="fw-bold text-secondary">{{ __('master.recommended_products') }}</h3>
                        <hr>
                    </div>

                    @foreach($recommended_products as $product)

                        <div class="col-12 col-sm-6 col-lg-4 col-xxl-3 p-3">

                            <a class="text-decoration-none" href="{{ route('showProduct', [$product->subcategory->category->slug, $product->subcategory->slug, $product->slug]) }}">

                                <div class="card h-100">

                                    <div class="text-center mt-3 p-1" style="max-height: 60%;">
                                        <img src="{{ asset('images/'.$product->image) }}" class="img h-100" style="max-width: 100%;" alt="{{ $product->image }}">
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
                                                <span class="d-inline d-sm-none d-md-inline">{{ __('master.product_basket') }}</span> <span><i class="fas fa-shopping-cart"></i></span>
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
@endsection
