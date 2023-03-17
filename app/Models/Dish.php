<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'restaurant_id', 'category_id', 'slug', 'description', 'ingredients', 'price', 'is_visible'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getABooleanFromNumber($num)
    {
        return ($num) ? 'true' : 'false';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
