@extends('layouts.master')

@section('title', 'Личный кабинет')

@section('content')

<h1>Личный кабинет пользователя {{ auth()->user()->name }}</h1>

    <div class="col-md-12">
        <h2 class="col-md-3">Мои заказы</h2>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    ФИО (Имя)
                </th>
                <th>
                    Телефон
                </th>
                <th>
                    Когда отправлен
                </th>
                <th>
                    Сумма
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id}}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                    <td>{{ $order->getFullPrice() }} ₽</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-success" type="button" href="{{ route('dashboard.show', $order) }}">Открыть</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-warning">Выйти из акаунта</button>
    </form>

@endsection