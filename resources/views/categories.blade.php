@extends('layouts.master')

@section('title', 'Все категории')

@section('content')

<h1>Все категории</h1>

        @foreach($categories as $category)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <div class="panel">
                    <a href="{{ route('category', $category->code) }}">
                    <img src="{{ asset('img/cactus_2.png') }}" alt="categories">
                        <h2>{{ $category->name }}</h2>
                    </a>
                    <p>{{ $category->content }}</p>
                </div>
            </div>
        </div>
        @endforeach
       


@endsection