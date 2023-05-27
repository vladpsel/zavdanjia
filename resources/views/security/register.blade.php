@extends('layout')

@section('title', 'Увійти')

@section('content')
    <section>
        <div class="wrapper">
            <div class="full-height flex f-center v-center">
                <div class="one-of-four mx-w">
                    <div class="img-wrp mb-2">
                        <img src="/dist/img/logo.svg" alt="">
                    </div>
                    @include('/components/forms/_registration')
                </div>
            </div>
        </div>
    </section>
@endsection
