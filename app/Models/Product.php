<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
//    public function getCategory(){
//        return Category::find($this->category_id);
//    }

    /* связь с таблицей категорий */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /* цена товара на его количество */
    public function getPriceForCount(){
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }
}
