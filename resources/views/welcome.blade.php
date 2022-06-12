@extends('layouts.master')

@section('title', 'Главная')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <img class="img img-responsive" src="{{ asset('img/fon.png') }}" alt="fon">
    </div>
    <br>
    <br>
    <br>
    <br>
    <h2>О нас</h2>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h4>Интернет-магазин «CactusHub» - это сайт для любителей кактусов и суккулентов.
            Наш сайт может предложить вам наши товары с подробными описаниями, характеристиками и фотографиями. 
            У нас Вы можете купить замечательные кактусы и суккуленты, грунты и удобрения.
            Продажа ассортимента разнообразных растений – основная специализация нашего интернет-магазина.
            Мы доставим Ваш заказ в любой уголок Удмуртской Республики, осуществим подробную консультацию по товарам и поможем 
            с выбором именно Вашего растения.</h4>
        </div>
        <div class="col-md-2">
            <img src="{{ asset('img/image _2.png') }}" alt="fon_3">
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>            
    <h2>Наши преимущества</h2>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-6 col-md-4">         
                    <img src="{{ asset('img/prem_2.png') }}" alt="preimyshstvo_1">
                    <h4>разнообразный ассортимент товаров</h4>
                    <p>Вы можете купить замечательные кактусы и суккуленты, грунты и удобрения</p>
        </div>
        <div class="col-sm-6 col-md-4">
                    <img src="{{ asset('img/prem_3.png') }}" alt="preimyshstvo_2">
                    <h4>доставка по всей республике</h4>
                    <p>Мы доставим Ваш заказ в любой уголок Удмуртской Республики, со всей заботой к товару</p>
        </div>
        <div class="col-sm-6 col-md-4">
                    <img src="{{ asset('img/prem.png') }}" alt="preimyshstvo_3">
                    <h4>оформление заказа на сайте</h4>
                    <p>Отсутствие необходимости звонить и связываться с работником магазина</p>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="row justify-content-center">
        <img class="img img-responsive" src="{{ asset('img/fon_2.png') }}" alt="fon_2">
    </div>
</div>    
@endsection