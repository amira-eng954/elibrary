<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //

    protected $fillable = [
        'name',
           'email',
                
           'address',
               'date',
               'job'
               
              ,'image'];
    
              public function book()
              {
                return $this->hasMany(Book::class);
              }
}
