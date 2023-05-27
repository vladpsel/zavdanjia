@extends('layout')

@section('title', 'Увійти')

@section('content')
    <section>
        <div class="wrapper">
            <div class="full-height flex f-center v-center">
                @include('/components/forms/_login')
            </div>
        </div>
    </section>
@endsection
