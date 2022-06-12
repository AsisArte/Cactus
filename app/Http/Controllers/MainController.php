<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsFilterRequest;

class MainController extends Controller
{
    /* отображение страницы каталога с блоками товаров */
    public function index(ProductsFilterRequest $request) {
        /* работа фильтра */
        $productsQuery = Product::with('category');
        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productsQuery->$field();
            }
        }

        $products = $productsQuery->paginate()->withPath("?".$request->getQueryString());
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
    public function product($category, $productCode) {
        $product = Product::byCode($productCode)->first();
        return view('product', compact('product'));
    }

    public  function home(){
        return view('dashboard');
    }

}
