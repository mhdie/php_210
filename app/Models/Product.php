<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function shopping_list(){
        return $this->belongsToMany(Shopping_list::class);
    }
}
