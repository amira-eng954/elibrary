<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'title',
           'desc',
           'image',
           'date',
           'pages',
           'Language',
           'author_id',
           'cat_id',
           'publisher_id'
        ];
        public function author(){
            return $this->belongsTo(Author::class);
        }

        public function cat(){
            return $this->belongsTo(Cat::class);
        }

        public function publisher(){
            return $this->belongsTo(Publisher::class);
        }
}
