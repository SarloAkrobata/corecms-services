<?php

namespace App\Models\Cms\Image;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    protected $table = 'albums';
    protected $fillable = [
        'name', 'position'
    ];

    /**
     * @return HasMany
     */
    public function image(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
