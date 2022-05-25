<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /* отображение страницы каталога с блоками товаров */
    public function index() {
        $products = Product::get();
        return view('index', compact('products'));
    }

    /* отображение страницы категорий с блоками категорий */
    public function categories() {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    /* отображение страницы категория с блоками товаров */
    public function category($code) {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    /* отображение страницы карточка товара */
    public function product($category, $product) {
        return view('product', ['product'=>$product]);
    }

    public  function home(){
        return view('dashboard');
    }

}
