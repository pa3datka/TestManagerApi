<?php

namespace App\Models\Api\TestManager\Test;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'answer',
        'status',
        'image',
        'variant',
        'quest_id'
    ];
}
