<?php

namespace App\Models\Api\TestManager\Test;

use Illuminate\Database\Eloquent\Model;

class TypeAccess extends Model
{
    public $timestamps = false;
    protected $table = 'types_access_tests';
    protected $fillable = [
        'id', 'type', 'description'
    ];
}
