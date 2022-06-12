<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /* добавление товара */
    protected $fillable = ['name', 'code', 'price', 'category_id', 'content', 'image', 'hit', 'new', 'recommend'];

    /* связь с таблицей категорий */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /* связь с таблицей товаров */
    public function scopeByCode($query, $code)
    {
        return $query->where('code', $code);
    }

    /* цена товара на его количество */
    public function getPriceForCount(){
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    /* проверяет помечен ли товар хитом */
    public function scopeHit($query)
    {
        return $query->where('hit', 1);
    }

    /* проверяет помечен ли товар новинкой */
    public function scopeNew($query)
    {
        return $query->where('new', 1);
    }

    /* проверяет помечен ли товар рекомендуемым */
    public function scopeRecommend($query)
    {
        return $query->where('recommend', 1);
    }

    /* проверяет помечен ли товар новинкой */
    public function setNewAttribute($value)
    {
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }

    /* проверяет помечен ли товар хитом */
    public function setHitAttribute($value)
    {
        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
    }

    /* проверяет помечен ли товар рекомендуемым */
    public function setRecommendAttribute($value)
    {
        $this->attributes['recommend'] = $value === 'on' ? 1 : 0;
    }

    /* проверяет является ли товар хитом */
    public function isHit()
    {
        return $this->hit === 1;
    }

    /* проверяет является ли товар новинкой */
    public function isNew()
    {
        return $this->new === 1;
    }

    /* проверяет является ли товар рекомендуемым */
    public function isRecommend()
    {
        return $this->recommend === 1;
    }

}
