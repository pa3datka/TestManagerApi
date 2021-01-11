<?php

namespace App\Models\Api\TestManager\Test;

use App\Models\Api\TestManager\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Test extends Model
{
    protected $table = 'tests';
    protected $fillable = [
        'head',
        'description',
        'access_id',
        'calculation_id',
        'category_id',
        'time',
        'attempts',
        'image',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function access(): BelongsTo
    {
        return $this->belongsTo(TypeAccess::class, 'access_id', 'id');
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function calculation(): BelongsTo
    {
        return $this->belongsTo(TypeCalculation::class, 'calculation_id', 'id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Quest::class, 'test_id', 'id');
    }

    public function results(): HasMany
    {
        return $this->hasMany(Result::class, 'test_id', 'id');
    }
}
