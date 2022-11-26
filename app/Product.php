<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'user_id','fullName','emailAddress','subject','message',
    ];

    public function users(){
        $this->hasMany(App\User::class);
    }
}
