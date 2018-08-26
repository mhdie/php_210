<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shopping_list extends Model
{
    public function product(){
        return $this->hasMany(Product::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
