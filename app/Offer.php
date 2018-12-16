<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Offer extends Model
{
    protected $table = "offers";

    protected $fillable = [
        'offer_name', 'category_id', 'discount', 'offer_time'
    ];
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
