<?php

namespace App\Models\Cms\Image;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'name', 'origin', 'medium', 'small', 'album_id', 'alt_tag'
    ];
}
