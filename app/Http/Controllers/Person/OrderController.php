<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /* отображение заказов пользователя */
    public function index() {
        $orders = Auth::user()->orders()->active()->get();
        return view('dashboard', compact('orders'));
    }

    /* отображение заказа пользавателя */
    public function show(Order $order) {
        if (!Auth::user()->orders->contains($order)){
            return back();
        }
        return view('show', compact('order'));
    }
}
