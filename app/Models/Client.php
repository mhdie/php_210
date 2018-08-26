<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function shopping_list(){
      return $this->hasMany(Shopping_list::class);
}
}
