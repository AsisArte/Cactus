<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /* добавление категории */
    protected $fillable = ['code', 'name', 'content', 'image'];

    /* связь с таблицей продуктов */
    public function products(){
        return $this->hasMany(Product::class);
    }
}
