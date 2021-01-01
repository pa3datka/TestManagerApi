<?php

namespace App\Models\Api\TestManager\Test;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'test_results';
    protected $fillable = [
        'id',
        'user_id',
        'test_id',
        'calculation_id',
        'result'
    ];
}
