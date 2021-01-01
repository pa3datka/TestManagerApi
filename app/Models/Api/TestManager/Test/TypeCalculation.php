<?php

namespace App\Models\Api\TestManager\Test;

use Illuminate\Database\Eloquent\Model;

class TypeCalculation extends Model
{
    public $timestamps = false;
    protected $table = 'type_calculation';
    protected $fillable = [
        'id', 'type', 'slug', 'description'
    ];
}
