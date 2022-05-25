@extends('layouts.master')

@section('title', 'Каталог')

@section('content')
        <h1>Все товары</h1>
    
    <div class="row">
        @foreach($products as $product)
            @include('layouts.card', compact('product'))
        @endforeach
    </div>

@endsection