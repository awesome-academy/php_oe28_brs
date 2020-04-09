<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'name',
        'author',
        'publish_date',
        'title',
        'image',
        'category_id',
        'creator_id',
    ];
}
