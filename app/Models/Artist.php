<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model {
    protected $table = "artists";
    public $timestamps = true;

    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function albums(): HasMany {
        return $this->hasMany(Album::class);
    }
}
