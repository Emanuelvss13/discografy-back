<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $table = "tracks";
    public $timestamps = true;

    use HasFactory;

    protected $fillable = [
        'name',
        'duration',
        'album_id'
    ];

    public function album() {
        return $this->belongsTo(Album::class);
    }

}
