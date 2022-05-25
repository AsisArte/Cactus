@extends('layouts.master')

@section('title', 'Товар')

@section('content')

        <h1>Название Кактуса</h1>
        <!--<h2>{{$product}}</h2>-->
        <h2>Категория Кактуса</h2>
        <p>Цена: <b>199 ₽</b></p>
        <img src="{{ asset('img/cactus.png') }}" alt="product">
        <p>Описание кактуса</p>
            <form action="#" method="POST">
                <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>
                @csrf
            </form>

@endsection