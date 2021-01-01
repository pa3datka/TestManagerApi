<?php

namespace App\Models\Api\TestManager\Test;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $table = 'categories';
    protected $fillable = [
        'id', 'title', 'slug'
    ];
}
