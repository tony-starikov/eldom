@extends('master')

@section('title', 'КОНТАКТЫ')

@section('main')

    <div class="container-fluid d-none d-lg-block">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                        <li class="breadcrumb-item active"><a>КОНТАКТЫ</a></li>
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

                            <a class="text-decoration-none text-dark" href="{{ route('showCategory', $category->slug) }}">{{ mb_strtoupper($category->name) }}</a>

                        </li>

                    @endforeach

                </ul>


            </div>

            <div class="col-9">

                <h5>КОНТАКТЫ</h5>

                <section>

                    <div class="row">

                        <div class="col-12">
                            <h6>ОАО ЭлектроДом</h6>
                            <h6>+38 (048) 772-24-08</h6>
                            <h6>+38 (067) 141-73-18</h6>
                            <h6>akimovdenis87@ukr.net</h6>
                            <h6>пн-вс, 9:00 - 16:00</h6>
                        </div>

                        <div class="col-12">

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2747.48471744525!2d30.710610065591663!3d46.4787136791261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c631f33c9fa6ef%3A0xc656b549d0285c1a!2z0K3Qu9C10LrRgtGA0L4t0LTQvtC8!5e0!3m2!1sru!2sua!4v1644533044935!5m2!1sru!2sua" style="border:0; min-height: 60vh; width: 100%" allowfullscreen="" loading="lazy"></iframe>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>

{{--    ////////////////////////////////////////////--}}

    <div class="container-fluid d-block d-lg-none">

        <div class="row p-2">

            <div class="col-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('main') }}">ГЛАВНАЯ</a></li>
                        <li class="breadcrumb-item active"><a>КОНТАКТЫ</a></li>
                    </ol>
                </nav>

            </div>

        </div>

        <div class="row p-2">

            <div class="col-12">

                <h5>КОНТАКТЫ</h5>

                <section>

                    <div class="row">

                        <div class="col-12">
                            <h6>ОАО ЭлектроДом</h6>
                            <h6>+38 (048) 772-24-08</h6>
                            <h6>+38 (067) 141-73-18</h6>
                            <h6>akimovdenis87@ukr.net</h6>
                            <h6>пн-вс, 9:00 - 16:00</h6>
                        </div>

                        <div class="col-12">

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2747.48471744525!2d30.710610065591663!3d46.4787136791261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c631f33c9fa6ef%3A0xc656b549d0285c1a!2z0K3Qu9C10LrRgtGA0L4t0LTQvtC8!5e0!3m2!1sru!2sua!4v1644533044935!5m2!1sru!2sua" style="border:0; min-height: 60vh; width: 100%" allowfullscreen="" loading="lazy"></iframe>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>

@endsection
