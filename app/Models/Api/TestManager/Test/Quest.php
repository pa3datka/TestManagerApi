<?php

namespace App\Models\Api\TestManager\Test;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    public $timestamps = false;
    protected $table = 'quests';
    protected $fillable = [
        'id',
        'quest',
        'image',
        'number',
        'evaluation',
        'test_id'
    ];
}
