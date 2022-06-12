<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    /* отображение страницы корзина */
    public function basket() {
        /* проверка корзины на наличие товаров */
        $orderId = session('orderId');
        if (is_null($orderId)){
            session()->flash('warning', 'Ваша корзина пуста!');
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('basket', compact('order'));
    }

    /* оформление заказа */
    public function basketConfirm(Request $request) {
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone, $request->adres);

        if ($success) {
            session()->flash('success', 'Ваш заказ принят в обработку!');
        } else {
            session()->flash('warning', 'Случилась ошибка');
        }

        return redirect()->route('index');
    }

    /* отображение страницы оформления заказа */
    public function basketPlace() {
        /* перессылка итоговой суммы из корзины в оформление заказа */
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));
    }

    /* добавление товара в корзину или увеличение его количества */
    public function basketAdd($productId) {
        /* проверка корзины на товар */
        $orderId = session('orderId');
        if (is_null($orderId)){
            $order = Order::create();
            session(['orderId'=>$order->id]);
        } else {
            $order = Order::find($orderId);
        }

        /* проверка корзины на количество товара */
        if ($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        /* проверка зарегистрированого пользователя */
        if (Auth::check()){
            $order->user_id = Auth::id();
            $order->save();
        }

        $product = Product::find($productId);

        session()->flash('success', 'Добавлен товар ' . $product->name);

        return redirect()->route('basket');
    }

    /* удаление товара из корзины или уменьшение его количества */
    public function basketRemove($productId){
        /* проверка корзины на товар */
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);

        /* проверка корзины на количество товара */
        if ($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2){
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            } 
        } 

        $product = Product::find($productId);

        session()->flash('warning', 'Удален товар ' . $product->name);

        return redirect()->route('basket');
    }
}
