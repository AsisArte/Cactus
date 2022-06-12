@extends('layouts.admin.master')

@isset($product)
    @section('title', 'Редактировать товар ' . $product->name)
@else
    @section('title', 'Создать товар')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Редактировать товар <b>{{ $product->name }}</b></h1>
        @else
            <h1>Добавить товар</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($product)
              action="{{ route('products.update', $product) }}"
              @else
              action="{{ route('products.store') }}"
            @endisset
        >
            <div class="font-semibold mb-2">
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="form-group mt-2 row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                    @error('code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        <input type="text" class="form-control" name="code" id="code"
                               value="{{ old('code', isset($product) ? $product->code : null) }}">
                    </div>
                </div>
                <br>
                <div class="form-group mt-2 row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($product){{ $product->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="form-group mt-2 row">
                    <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                    <div class="col-sm-6">
                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @isset($product)
                                        @if($product->category_id == $category->id)
                                        selected
                                    @endif
                                    @endisset
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group mt-2 row">
                    <label for="content" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        <textarea name="content" id="content" cols="72"
                                  rows="7">@isset($product){{ $product->content }}@endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="form-group mt-2 row">
                    <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                    <div class="col-sm-6">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        <input type="text" class="form-control" name="price" id="price"
                               value="@isset($product){{ $product->price }}@endisset">
                    </div>
                </div>
                <br>
                <div class="form-group mt-2 row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <br>
                @foreach ([
                'hit' => 'Хит продаж',
                'new' => 'Новинка',
                'recommend' => 'Рекомендуемые'
                ] as $field => $title)
                    <div class="form-group mt-2 row">
                        <label for="code" class="col-sm-2 col-form-label">{{ $title }}: </label>
                        <div class="col-sm-2 col-md-2">
                            <input type="checkbox" name="{{$field}}" id="{{$field}}"
                            @if(isset($product) && $product->$field === 1)
                                   checked="checked"
                            @endif
                            >
                        </div>
                    </div>
                    <br>
                @endforeach
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection