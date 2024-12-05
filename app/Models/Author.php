<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = [
    'name',
       'email',
            'age',
       'address',
           'date',
           'job',
           'awards'
          ,'image'];

          public function book()
          {
            return $this->hasMany(Book::class);
          }
}
