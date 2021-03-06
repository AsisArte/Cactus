@extends('layouts.master')

@section('title', 'Товар')

@section('content')

    <div class="col-md-12">
        <h1>{{ $product->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ $product->price }} ₽</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->content }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{ Storage::url($product->image) }}" alt="product"></td>
            <tr>
                <td>Категория</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <td>Лейблы</td>
                <td>
                    @if($product->isNew())
                        <span class="badge badge-success">Новинка</span>
                    @endif

                    @if($product->isRecommend())
                        <span class="badge badge-warning">Рекомендуем</span>
                    @endif

                    @if($product->isHit())
                        <span class="badge badge-danger">Хит продаж!</span>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
        <div class="col-sm-1">
        <form action="{{ route('basket-add', $product) }}" method="POST">
            <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>
         @csrf
        </form>
        </div>
    </div>

@endsection