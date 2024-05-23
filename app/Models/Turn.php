<?php

namespace App\Models;

use Carbon\Carbon;
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
        'module_id',
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

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    protected static function booted()
    {
        static::creating(function ($turn) {
            $date = Carbon::now()->format('Y-m-d');
            $count = Turn::where('category_id', $turn->category_id)
                ->whereDate('created_at', $date)
                ->count();

            $turn->turn_prefix = $turn->category->prefix . '-' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);
        });
    }
}
