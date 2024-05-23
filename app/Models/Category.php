<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'prefix'];

    public function modules()
    {
        return $this->belongsToMany(Module::class)->withTimestamps();
    }

    public function turns()
    {
        return $this->hasMany(Turn::class);
    }
}
