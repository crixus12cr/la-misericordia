<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'number'];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function turns()
    {
        return $this->hasMany(Turn::class);
    }
}
