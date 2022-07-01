<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function date()
    {
        return $this->belongsToMany(Date::class)->withPivot('tackled')->withTimestamps();
    }
}
