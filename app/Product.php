<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Product extends Model
{
    
    protected $fillable = [
        'product_name', 'category_id', 'price', 'image','desc'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }

   
}
