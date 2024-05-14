<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
