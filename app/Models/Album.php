<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = "albums";
    public $timestamps = true;
    use HasFactory;

    protected $fillable = [
        'name',
        'artist_id'
    ];

    public function artists()
    {
        return $this->belongsTo(Artist::class);
    }

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }
}
