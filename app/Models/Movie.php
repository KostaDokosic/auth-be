<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'genre', "release_date", "director", "image_url", "duration"
    ];

    public static function search($term, $skip, $take) {
        return self::where('title', 'LIKE', '%'.$term.'%')->skip($skip)->take($take)->get();
    }
}
