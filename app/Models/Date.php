<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $guarded = [];
    

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function attentions()
    {
        return $this->belongsToMany(Attention::class)->withPivot('tackled')->withTimestamps();
    }
}
