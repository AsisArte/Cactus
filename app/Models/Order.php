<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /* связь многие-ко-многим для корзины */
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    /* общая цена товаров */
    public function getFullPrice(){
        $sum = 0;
        foreach ($this->products as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    /* оформление заказа */
    public function saveOrder($name, $phone){
        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }
}
