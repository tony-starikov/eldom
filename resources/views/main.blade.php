@extends('master')

@section('title', 'Electro-dom')

@section('main')

    <div class="container-fluid">

        <div class="row p-2 pt-5">

            <div class="col-3 ps-5">

                <h5>КАТЕГОРИИ</h5>

                <ul class="list-group">

                    @foreach($categories as $category)

                        <li class="list-group-item border-0">

                            <a class="text-decoration-none text-dark" href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->name) }}</a>

                        </li>

                    @endforeach

                </ul>


            </div>

            <div class="col-9">

                <section>

                    <div class="row">

                        <div class="col-4 text-center">

                            <img class="img-fluid" src="/images/promo6.png" alt="">

                            <h2>Скидки и акции</h2>

                            <p class="w-75 mx-auto">Наша компания реализует гибкую систему скидок для постоянных покупателей.</p>

                        </div>

                        <div class="col-4 text-center">

                            <img class="img-fluid" src="/images/promo5.png" alt="">

                            <h2>Гарантия</h2>

                            <p class="w-75 mx-auto">
                                Гарантийным обслуживанием занимаются СЦ, авторизованные производителями. Мы оказываем постояннуюподдержку для покупателей.
                            </p>

                        </div>

                        <div class="col-4 text-center">

                            <img class="img-fluid" src="/images/promo4.jpg" alt="">

                            <h2>Доставка</h2>

                            <p class="w-75 mx-auto">Мы осуществляем доставку в любой регион Украины.</p>

                        </div>


                    </div>

                    <div class="row mt-5">

                        <div class="col-12 text-center">
                            <h2>Рекомендуемые товары</h2>
                            <hr>
                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>

@endsection
