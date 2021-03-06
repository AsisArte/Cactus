@extends('layouts.master')

@section('title', 'Оформить заказ')

@section('content')

    <h1>Подтвердите заказ:</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>Общая стоимость: <b>{{ $order->getFullPrice() }} ₽.</b></p>
            <form action="{{ route('basket-confirm') }}" method="POST">
                <div>
                    <p>Укажите свои имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>

                    <div class="container">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">ФИО/Имя* </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефона* </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="adres" class="control-label col-lg-offset-3 col-lg-2">Адрес доставки* </label>
                            <div class="col-lg-4">
                                <input type="text" name="adres" id="adres" value="" class="form-control" required>
                            </div>
                        </div>
                        <br>
                    </div>
                    <br>
                    @csrf
                    <input type="submit" class="btn btn-success" value="Подтвердите заказ">
                </div>
            </form>
        </div>
    </div>
@endsection