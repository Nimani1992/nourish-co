<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = ['name', 'meal_category_id', 'price','description','calories','quantity','image_path',];

   public function category()
{
    return $this->belongsTo(MealCategory::class, 'meal_category_id');
    
} 
}
