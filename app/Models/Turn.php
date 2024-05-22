<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turn extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'turn_prefix',
        'user_id',
        'category_id',
        'status'
    ];

    // Enums status => Turn::STATUS_PENDING, Turn::STATUS_IN_PROGRESS, etc.
    const STATUS_PENDING = 'pending';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELED = 'canceled';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
