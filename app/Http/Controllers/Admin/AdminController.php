<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /* отображение всех заказов */
    public function index() {
        $orders = Order::active()->get();
        return view('admin.order.index', compact('orders'));
    }

    /* отображение заказа */
    public function show(Order $order) {
        return view('admin.order.show', compact('order'));
    }
}
