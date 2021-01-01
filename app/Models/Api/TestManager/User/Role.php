<?php

namespace App\Models\Api\TestManager\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'roles';
    protected $fillable = [
        'id', 'role', 'slug', 'description'
    ];


    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'role_id', 'id');
    }
}
