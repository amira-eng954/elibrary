<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    //
    protected $fillable = [
    'namecat',
       'body'];

       public function book()
       {
         return $this->hasMany(Book::class);
       }
}
